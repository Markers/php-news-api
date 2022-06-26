<?php

namespace App\Http\Controllers;

use App\Models\Article;
use DOMDocument;
use DOMXPath;
use GuzzleHttp\Exception\GuzzleException;
use Symfony\Component\DomCrawler\Crawler;

class CrawlingController extends Controller
{
    public function getContentCrawling()
    {
        $articles = Article::whereContent(null)->get();
        foreach ($articles as $article) {
            try {
                $html = $this->getContent('https://blog.jetbrains.com/phpstorm/2022/06/php-annotated-june-2022/');
            } catch (GuzzleException $e) {
                return $e->getMessage();
            }
            $content = $this->replaceInnerText($html);
            return $content;
        }

    }

    /**
     * @param $html
     * @return void
     */
    private function replaceInnerText($html)
    {
        $doc = new DOMDocument;
        @$doc->loadHTML($html);
        $crawler = new Crawler($doc);
        $crawler
            ->filter('div.content')
            ->each(function (Crawler $crawler) use ($doc) {
                foreach ($crawler as $node) {
                    $span = $doc->createElement('span', 'test');
                    $node->parentNode->insertBefore($span, $node);
                }
            });
        echo ($crawler->html());
        exit;
        $content = $crawler->filter('.content')->html();
        return $content;



        $dom = new DOMDocument();
        @$dom->loadHTML($html);
        $xpath = new DOMXPath($dom);
        $nodes = $xpath->query('//*[@class="content"]');
//        foreach ($nodes as $node) {
////            $node->nodeValue = $this->replaceText($node->nodeValue);
//        }
        return $dom->saveHTML();
    }


    /**
     * 새로 등록된 포스트의 내용을 가져오는 함수
     * @param string $url
     * @return array|string|string[]|null
     * @throws GuzzleException
     */
    private function getContent(string $url)
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', $url);
        $body = $response->getBody();
        $html = $body->getContents();
        $crawler = new Crawler($html);
        $content = $crawler->filter('.article-section')->html();
//        $content = preg_replace('/\r\n|\r|\n/', '', $content);
        return $content;
    }

    /**
     * 새로 등록된 글 목록을 가지고 오는 API
     * @return void
     * @throws GuzzleException
     */
    public function getNewPostCrawling(): void
    {
        $phpAnnotatedMonthly = $this->CrawlingProjectTag('https://blog.jetbrains.com/phpstorm/category/videos/', 'php-annotated-monthly');
        if ($phpAnnotatedMonthly) {
            // 성공 메세지 Discord 로 훅한다.
        }
        $videos = $this->CrawlingProjectTag('https://blog.jetbrains.com/phpstorm/category/videos/', 'videos');
        if ($videos) {
            // 성공 메세지 Discord 로 훅한다.
        }
        $tutorials = $this->CrawlingProjectTag('https://blog.jetbrains.com/phpstorm/category/tutorials/', 'tutorials');
        if ($tutorials) {
            // 성공 메세지 Discord 로 훅한다.
        }
        $news = $this->CrawlingProjectTag('https://blog.jetbrains.com/phpstorm/category/news/', 'news');
        if ($news) {
            // 성공 메세지 Discord 로 훅한다.
        }
        $features = $this->CrawlingProjectTag('https://blog.jetbrains.com/phpstorm/category/features/', 'features');
        if ($features) {
            // 성공 메세지 Discord 로 훅한다.
        }
        $events = $this->CrawlingProjectTag('https://blog.jetbrains.com/phpstorm/category/events/', 'events');
        if ($events) {
            // 성공 메세지 Discord 로 훅한다.
        }
        $eap = $this->CrawlingProjectTag('https://blog.jetbrains.com/phpstorm/category/eap/', 'eap');
        if ($eap) {
            // 성공 메세지 Discord 로 훅한다.
        }
    }


    /**
     * @param string $url
     * @param string $category
     * @return array|false
     * @throws GuzzleException
     */
    private function CrawlingProjectTag(string $url, string $category)
    {
        $res = array();
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', $url);

        if ($response->getStatusCode() == 200) {
            // HTML 가져옴
            $html = strval($response->getBody());
            // 검색
            $dom = new DOMDocument();
            @$dom->loadHTML($html);
            $xpath = new DOMXPath($dom);
            $articleList = $xpath->query('//div[@class="row card_container"]/div[@class="col"]');
            foreach ($articleList as $article) {
                $post_id = $article->getAttribute('post_id');
                $has_post = Article::where('post_id', $post_id)->count();
                if ($has_post == 0) {
                    $href = $article->getElementsByTagName('a')->item(0)->getAttribute('href');
                    $thumbnail = $article->getElementsByTagName('img')->item(0)->getAttribute('src');
                    $width = $article->getElementsByTagName('img')->item(0)->getAttribute('width');
                    $height = $article->getElementsByTagName('img')->item(0)->getAttribute('height');
                    $sizes = $article->getElementsByTagName('img')->item(0)->getAttribute('sizes');

                    $card_header = $this->getElementsByClassName($article, 'card__header', 'div');
                    foreach ($card_header as $header) {
                        $publish_date = $header->getElementsByTagName('time')->item(0)->getAttribute('datetime');
                        $title = $header->getElementsByTagName('h3')->item(0)->nodeValue;
                    }
                    $card_body = $this->getElementsByClassName($article, 'card__body', 'div');
                    foreach ($card_body as $body) {
                        $description = $body->getElementsByTagName('p')->item(0)->nodeValue;
                        $description = preg_replace('/\r\n|\r|\n/', '', $description);
                    }
                    $card_footer = $this->getElementsByClassName($article, 'card__footer', 'div');
                    foreach ($card_footer as $footer) {
                        $author = $footer->getElementsByTagName('span')->item(0)->nodeValue;
                        $author_avatar = $footer->getElementsByTagName('img')->item(0)->getAttribute('src');
                    }
                    $res[] = [
                        'post_id' => (int)$post_id,
                        'href' => $href,
                        'thumbnail' => $thumbnail,
                        'width' => (int)$width,
                        'height' => (int)$height,
                        'sizes' => $sizes,
                        'title' => $title,
                        'description' => $description,
                        'publish_date' => $publish_date,
                        'author' => $author,
                        'author_avatar' => $author_avatar,
                        'category' => $category,
                        'created_at' => \Carbon\Carbon::now(),
                        'updated_at' => \Carbon\Carbon::now(),
                    ];
                }
            }
            if (count($res) > 0) {
                Article::insert($res);
            }
            return $res;
        }
        // TODO Exception 처리 해서 메세지 오도록 할 예정
        return false;
    }

    private function getElementsByClassName($dom, $ClassName, $tagName = null)
    {
        if ($tagName) {
            $Elements = $dom->getElementsByTagName($tagName);
        } else {
            $Elements = $dom->getElementsByTagName("*");
        }
        $Matched = array();
        for ($i = 0; $i < $Elements->length; $i++) {
            if ($Elements->item($i)->attributes->getNamedItem('class')) {
                if ($Elements->item($i)->attributes->getNamedItem('class')->nodeValue == $ClassName) {
                    $Matched[] = $Elements->item($i);
                }
            }
        }
        return $Matched;
    }

    private function replaceText(string $string)
    {
        $string = str_replace('&nbsp;', ' ', $string);
        $string = str_replace('&amp;', '&', $string);
        $string = str_replace('&quot;', '"', $string);
        $string = str_replace('&lt;', '<', $string);
        $string = str_replace('&gt;', '>', $string);
        $string = str_replace('&#039;', "'", $string);
        $string = str_replace('&#8230;', '…', $string);
        $string = str_replace('&#8221;', '”', $string);
        $string = str_replace('&#8217;', '’', $string);
        $string = str_replace('&#8216;', '‘', $string);
        $string = str_replace('&#8220;', '“', $string);
        $string = str_replace('&#8222;', '”', $string);
        $string = str_replace('&#8211;', '–', $string);
        $string = str_replace('&#8212;', '—', $string);
        $string = str_replace('&#8230;', '…', $string);
        $string = str_replace('&#8242;', '′', $string);
        $string = str_replace('&#8243;', '″', $string);
        $string = str_replace('&#8249;', '‹', $string);
        $string = str_replace('&#8250;', '›', $string);
        $string = str_replace('&#8216;', '‘', $string);
        $string = str_replace('&#8217;', '’', $string);
        $string = str_replace('&#8218;', '‚', $string);
        $string = str_replace('&#8219;', '‛', $string);
        return $string;
    }
}
