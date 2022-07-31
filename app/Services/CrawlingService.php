<?php

namespace App\Services;

use App\Models\Article;
use DOMDocument;
use DOMXPath;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\DB;
use Symfony\Component\DomCrawler\Crawler;
use Throwable;

class CrawlingService
{
    protected array $crawlingUrl = [
        'php-annotated-monthly' => 'https://blog.jetbrains.com/phpstorm/tag/php-annotated-monthly/',
        'videos' => 'https://blog.jetbrains.com/phpstorm/category/videos/',
        'tutorials' => 'https://blog.jetbrains.com/phpstorm/category/tutorials/',
        'news' => 'https://blog.jetbrains.com/phpstorm/category/news/',
        'features' => 'https://blog.jetbrains.com/phpstorm/category/features/',
        'events' => 'https://blog.jetbrains.com/phpstorm/category/events/',
        'eap' => 'https://blog.jetbrains.com/phpstorm/category/eap/'
    ];

    /**
     * @throws Throwable
     */
    public function run()
    {
        try {
            DB::beginTransaction();
            // 새로 등록된 글이 있나 조회
            $crawlingUrl = $this->crawlingUrl;
            foreach ($crawlingUrl as $key => $value) {
                $this->CrawlingTargetURLMetadata($value, $key);
            }

            // 새로 등록된 글이 있나 조회
            $articles = Article::whereContent(null)->get();
            foreach ($articles as $article) {
                $article->content = $this->getContent($article->href);
                $article->save();
            }

            // 메세지 보내야 함
            DB::commit();
            return 'success';
        } catch (GuzzleException $e) {
            DB::rollBack();
            \Log::error("crawling error", $e->getMessage());
            return 'fail';
        }
    }

    private function CrawlingTargetURLMetadata(string $url, string $category): void
    {
        try {
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
                    $has_post = Article::where('post_id', $post_id)->where('category', $category)->count();
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
            }
        } catch (GuzzleException $e) {
            \Log::error("번역 에러", $e->getMessage());
        }
    }

    private function getContent(string $url): array|string|null
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', $url);
        $body = $response->getBody();
        $html = $body->getContents();
        $crawler = new Crawler($html);
        return $crawler->filter('.article-section')->html();
    }

    private function getElementsByClassName($dom, $ClassName, $tagName = null): array
    {
        $elements = $tagName ? $dom->getElementsByTagName($tagName) : $dom->getElementsByTagName("*");
        $matchedList = array();
        for ($i = 0; $i < $elements->length; $i++) {
            if ($elements->item($i)->attributes->getNamedItem('class')) {
                if ($elements->item($i)->attributes->getNamedItem('class')->nodeValue == $ClassName) {
                    $matchedList[] = $elements->item($i);
                }
            }
        }
        return $matchedList;
    }
}
