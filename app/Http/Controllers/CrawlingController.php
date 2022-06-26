<?php

namespace App\Http\Controllers;

use App\Models\Article;
use DOMDocument;
use DOMXPath;
use GuzzleHttp\Exception\GuzzleException;
use Symfony\Component\DomCrawler\Crawler;

class CrawlingController extends Controller
{
    public function crawling()
    {
        // URL로부터 DOM 객체를 생성
        // 모든 이미지 태그를 검색 후 주소 출력
        $res = $this->CrawlingProjectTag('https://blog.jetbrains.com/phpstorm/', '.latest_posts_section');
    }

    public function CrawlingProjectTag($url, $tag)
    {
        $res = [];
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', $url);

        if ($response->getStatusCode() == 200) {
            // HTML 가져옴
            $html = strval($response->getBody());
            // 검색
            $dom = new DOMDocument();
            @$dom->loadHTML($html);
            $xpath = new DOMXPath($dom);
            $articleList = $xpath->query('//div[@class="row latest latest_posts_section"]/div[@class="col"]');
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
                        $description = preg_replace('/\r\n|\r|\n/','',$description);
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
                        'height' =>(int)$height,
                        'sizes' => $sizes,
                        'title' => $title,
                        'description' => $description,
                        'publish_date' => $publish_date,
                        'author' => $author,
                        'author_avatar' => $author_avatar,
                    ];
                    $resilt = Article::create($res[count($res) - 1]);
                }
            }
        }
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
}
