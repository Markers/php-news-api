<?php

namespace App\Http\Controllers;
// ini_set('memory_limit','-1');

use App\Models\Article;
use GrahamCampbell\GitHub\GitHubManager;
use Illuminate\Support\Facades\Storage;
use League\HTMLToMarkdown\HtmlConverter;
use Intervention\Image\ImageManagerStatic as Image;

class MarkdownController extends Controller
{
    protected HtmlConverter $converter;
    protected GitHubManager $github;

    public function __construct(GitHubManager $github)
    {
        try {
            // How to used Environment ?
            // $environment = new c(array(
            //     // your configuration here
            // ));
            // $environment->addConverter(new HeaderConverter()); // optionally - add converter manually
            // $converter = new HtmlConverter($environment);

            $converter = new HtmlConverter();
            // $converter->getConfig()->setOption('strip_tags', true);
            // $converter->getConfig()->setOption('strip_placeholder_links', true);
            // $converter->getConfig()->setOption('hard_break', true);
            $this->converter = $converter;
            $this->github = $github;
        } catch (\Throwable $e) {
            print_r($e);
            exit;
        }
    }

    public function createMarkdown()
    {
        $markdown_files = [];
        Article::chunk(100, function ($articles) {
            foreach ($articles as $article) {
                $post_id = $article->post_id;
                $publish_date = $article->publish_date;
                $publish_year = substr($article->publish_date, 0, 4);
                $title = $this->replaceText($article->slug);
                $title = $this->replaceDoubleHyphen($title);
                $category = $article->category;
                $content = $this->replacePreTag(json_decode($article->translated_content)->text, json_decode($article->translated_content)->input);
                // 파일 저장 경로
                $file_path = $category . '/' . $publish_year . '/' . $publish_date . '-' . $title . '.md';
                
                echo "<pre>";
                print_r($content);
                echo "</pre>";
                $markdown = $this->converter->convert($content);

                exit;
                try {
                    Storage::disk('local')->put($file_path, $markdown);
                } catch (\Throwable $th) {
                    echo 'asd';
                    print_r($th);
                    exit;
                }
                exit;

                $article->translated_url = $file_path;
                $article->save();

                $markdown_files[] = array(
                    'path' => 'mock/' . $file_path,
                    'content' => $markdown
                );
            }
            // 배열에 추가된 것이 있으면 Upload
            $file_count = count($markdown_files);
            if ($file_count > 0) {
                $dt = \Carbon\Carbon::now();
                // $this->commitFiles('kyungseo-park', 'php-news', 'main', "API: " . $dt . "에 $file_count 개 업로드", $markdown_files);
            }
        });
    }

    public function replacePreTag($content, $en)
    {
        // dd($content);
        return $this->replaceCenter($content, $en);
    }

    // 아 이거 괜히 만듬
    public function replaceCenter($ko, $en)
    {
        $kos = $this->parserDomContent($ko); // ->getElementsByTagName('pre');
        $targets = $this->parserDomContent($en);
        for ($j=0; $j < $kos->length; $j++) { 
            $target = $targets[$j]->getElementsByTagName('pre');
            for ($i=0; $i < $kos[$j]->getElementsByTagName('pre')->length; $i++) {
                $kos[$j]->getElementsByTagName('pre')[$i]->childNodes[0]->data = $target[$i]->childNodes[0]->data;
            }
        }

        foreach ($kos as $node) {
            return $node->ownerDocument->saveHtml();
        }
        return $kos->ownerDocument->saveHtml();
    }

    public function parserDomContent($content)
    {
        $dom = new \DOMDocument();
        @$dom->loadHTML(mb_convert_encoding(strval($content), 'HTML-ENTITIES', 'UTF-8'));
        $xpath = new \DOMXPath($dom);
        $doms = $xpath->query('//div[@class="content"]');
        return $doms;
    }

    public function commitFiles(string $github_nickname, string $repo_name, string $branch, string $commit_message, array $files)
    {
        $master_branch = $this->github->repo()->branches($github_nickname, $repo_name, $branch);
        $commit_parent = $master_branch["commit"]["sha"];
        $base_tree = $master_branch["commit"]["commit"]["tree"]["sha"];

        $commit_tree = array();
        foreach ($files as $file) {
            $file_blob = [
                "path" => $file["path"],
                "mode" => "100644",
                "type" => "file",
                "content" => $file["content"],
            ];
            $commit_tree[] = $file_blob;
        }

        $new_commit_tree_response = $this->github->git()->trees()->create($github_nickname, $repo_name, [
            "base_tree" => $base_tree,
            "tree" => $commit_tree
        ]);

        $new_commit_response = $this->github->git()->commits()->create($github_nickname, $repo_name, [
            "message" => $commit_message,
            "parents" => [$commit_parent],
            "tree" => $new_commit_tree_response["sha"],
        ]);
        $this->github->git()->references()->update($github_nickname, $repo_name, "heads/" . $branch, [
            "sha" => $new_commit_response["sha"],
            "force" => false,
        ]);
    }

    private function replaceDoubleHyphen($str)
    {
        $str = str_replace('--', '-', $str);
        if (strpos($str, '--')) {
            $this->replaceDoubleHyphen($str);
        }
        return $str;
    }

    private function replaceText(string $string)
    {
        $string = str_replace('&#147;', '“', $string);
        $string = str_replace('&#128;', '€', $string);
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
        return str_replace('&#8219;', '‛', $string);
    }
}
