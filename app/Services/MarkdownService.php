<?php

namespace App\Services;

use App\Models\Article;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use League\HTMLToMarkdown\HtmlConverter;

class MarkdownService
{
    protected HtmlConverter $converter;
    protected GithubService $githubService;

    public function __construct()
    {
        $this->converter = new HtmlConverter();
        $this->githubService = new GithubService();
    }

    /**
     * @throws \Throwable
     */
    public function run(): array
    {
        $markdown_files = [];
        try {
            DB::beginTransaction();
            Article::where('translated_url', null)->chunk(100, function ($articles) {
                foreach ($articles as $article) {
                    $post_id = $article->post_id;
                    $publish_date = $article->publish_date;
                    $publish_year = substr($article->publish_date, 0, 4);
                    $title = $this->replaceText($article->slug);
                    $title = $this->replaceDoubleHyphen($title);
                    $category = $article->category;
                    $content = json_decode($article->translated_content)->text;
                    // 파일 저장 경로
                    $file_path = $category . '/' . $publish_year . '/' . $publish_date . '-' . $title . '.md';
                    $markdown = $this->converter->convert($content);

                    try {
                        Storage::disk('local')->put($file_path, $markdown);
                    } catch (\Throwable $th) {
                        return $th;
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
                    $this->githubService->commitFiles('[BOT]: PHP-NEWS', 'php-news', 'main', "API: " . $dt . "에 $file_count 개 업로드", $markdown_files);
                }
            });
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            \Log::error("markdown error => ", $th->getMessage());
        }
    }

    private function replaceDoubleHyphen($str): string
    {
        $str = str_replace('--', '-', $str);
        if (strpos($str, '--')) {
            $this->replaceDoubleHyphen($str);
        }
        return $str;
    }

    private function replaceText(string $string): string
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
