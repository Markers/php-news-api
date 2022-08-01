<?php

namespace App\Services;

use App\Models\Article;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use League\HTMLToMarkdown\Converter\BlockquoteConverter;
use League\HTMLToMarkdown\Converter\CodeConverter;
use League\HTMLToMarkdown\Converter\CommentConverter;
use League\HTMLToMarkdown\Converter\DivConverter;
use League\HTMLToMarkdown\Converter\EmphasisConverter;
use League\HTMLToMarkdown\Converter\HardBreakConverter;
use League\HTMLToMarkdown\Converter\HeaderConverter;
use League\HTMLToMarkdown\Converter\HorizontalRuleConverter;
use League\HTMLToMarkdown\Converter\ImageConverter;
use League\HTMLToMarkdown\Converter\LinkConverter;
use League\HTMLToMarkdown\Converter\ListBlockConverter;
use League\HTMLToMarkdown\Converter\ListItemConverter;
use League\HTMLToMarkdown\Converter\PreformattedConverter;
use League\HTMLToMarkdown\Converter\TextConverter;
use League\HTMLToMarkdown\Environment;
use League\HTMLToMarkdown\HtmlConverter;

class MarkdownService
{
    protected HtmlConverter $converter;
    protected GithubService $githubService;

    public function __construct()
    {
        $this->converter = new HtmlConverter();
        $this->converter->getConfig()->setOption('strip_placeholder_links', true);
        $this->converter->getConfig()->setOption('remove_nodes', 'style');
        $this->converter->getConfig()->setOption('remove_nodes', 'script');
        $this->converter->getConfig()->setOption('strip_tags', true);
        $this->githubService = new GithubService();
    }

    /**
     * @throws \Throwable
     */
    public function run(): string
    {
        $markdown_files = [];
        try {
            DB::beginTransaction();
            Article::where('translated_url', null)->chunk(100, function ($articles) {
                foreach ($articles as $article) {
                    $post_id = $article->post_id;
                    $publish_date = $article->publish_date;
                    $publish_year = substr($article->publish_date, 0, 4);
                    \Log::info(">>>>>>>>>>>>>>>>>>" . $article->id);
                    $title = $this->replaceText($article->slug);
                    $title = $this->replaceDoubleHyphen($title);
                    $category = $article->category;
                    $content = $this->replacePreTag(json_decode($article->translated_content)->text, json_decode($article->translated_content)->input);
                    // 파일 저장 경로
                    $file_path = $category . '/' . $publish_year . '/' . $publish_date . '-' . $title . '.md';

                    $markdown = $this->converter->convert($content);
                    \Log::info($markdown);
                    exit;
                    try {
                        Storage::disk('local')->put($file_path, $markdown);
                    } catch (\Throwable $th) {
                        \Log::error("message : $th");
                        throw $th;
                    }

                    $article->translated_url = $file_path;
                    $article->save();

                    $markdown_files[] = array(
                        'path' => 'mock/' . $file_path,
                        'content' => $markdown
                    );
                }
                $file_count = count($markdown_files);
                if ($file_count > 0) {
                    $dt = \Carbon\Carbon::now();
                    $this->githubService->commitFiles(
                        'Kyungseo-Park',
                        'php-news',
                        'main',
                        "API: " . $dt . "에 $file_count 개 업로드",
                        $markdown_files
                    );
                }
            });
            DB::commit();
            return 'success';
        } catch (\Throwable $th) {
            DB::rollBack();
            \Log::error("markdown error => $th");
            return 'fail';
        }
    }

    private function replacePreTag($content, $en)
    {
        // dd($content);
        return $this->replaceCenter($content, $en);
    }

    // 아 이거 괜히 만듬
    private function replaceCenter($ko, $en)
    {
        $kos = $this->parserDomContent($ko); // ->getElementsByTagName('pre');
        $targets = $this->parserDomContent($en);
        for ($j = 0; $j < $kos->length; $j++) {
            $target = $targets[$j]->getElementsByTagName('pre');
            for ($i = 0; $i < $kos[$j]->getElementsByTagName('pre')->length; $i++) {
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

    private function replaceDoubleHyphen($str): string
    {
        $str = str_replace('--', '-', $str);
        if (strpos($str, '--')) {
            $this->replaceDoubleHyphen($str);
        }
        return $str;
    }

    private function replaceText($string): string
    {
        \Log::info('replaceText: ' . gettype($string));
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

    private function commitFiles(string $github_nickname, string $repo_name, string $branch, string $commit_message, array $files)
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
}
