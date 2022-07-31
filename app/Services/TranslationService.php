<?php

namespace App\Services;

use App\Models\Article;
use Google\Cloud\Translate\V2\TranslateClient;
use Illuminate\Support\Facades\DB;
use Throwable;

class TranslationService
{
    /**
     * @throws Throwable
     */
    public function run(): string
    {
        try {
            DB::beginTransaction();
            $articles = Article::where('is_translation', false)->get();
            $article_length = count($articles);
            \Log::info("$article_length articles are found.");
            foreach ($articles as $article) {
                $translated_title = $this->executeTranslation($article->title);
                $slug = trim($translated_title['text']);
                $slug = strtolower(preg_replace('/[^a-zA-Z가-힣0-9]+/', '-', $slug));
                $slug = $this->replaceDoubleHyphen($slug);
                $article->translated_title = $translated_title;
                $article->translated_description = $this->executeTranslation($article->description);
                $article->slug = $slug;
                $article->is_translation = true;
                $article->save();
            }
            foreach ($articles as $article) {
                $article->translated_content = $this->executeTranslation($article->content);
                $article->is_translation = true;
                $article->save();
            }
            DB::commit();
            return 'success';
        } catch (Throwable $th) {
            DB::rollBack();
            \Log::error("translation error => " . $th->getMessage());
            return 'fail';
        }
    }

    private function replaceDoubleHyphen($str): string
    {
        $str = preg_replace('/--/', '-', $str);
        if (str_contains($str, '--')) {
            $this->replaceDoubleHyphen($str);
        }
        return $str;
    }

    private function executeTranslation($html)
    {
        try {
            $translate = new TranslateClient(['key' => env('GOOGLE_TRANSLATE_API_KEY')]);
            return $translate->translate(
                $html,
                ['target' => 'ko']
            );
        } catch (Throwable $th) {
            \Log::error("번역 API 에러" . $th->getMessage());
        }
    }
}
