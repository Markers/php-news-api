<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Google\Cloud\Translate\V2\TranslateClient;

class TranslationController extends Controller
{
    public function translateTheDetails()
    {
        $articles = Article::where('is_translation', false)->get();
        foreach ($articles as $article) {
            $translated_title = $this->executeTranslation($article->title);
            $slug = trim($translated_title->text);
            $slug = strtolower(preg_replace('/[^a-zA-Z가-힣0-9]+/', '-', $slug));
            $slug = $this->replaceDoubleHyphen($slug);
            $article->translated_title = $translated_title;
            $article->translated_description = $this->executeTranslation($article->description);
            $article->slug = $slug;
            $article->is_translation = true;
            $article->save();
        }
    }

    private function replaceDoubleHyphen($str)
    {
        $str = preg_replace('/--/', '-', $str);
        if (str_contains($str, '--')) {
            $this->replaceDoubleHyphen($str);
        }
        return $str;
    }

    public function translateTheContent()
    {
        $articles = Article::whereNull('translated_content')->whereNotNull('content')->get();
        foreach ($articles as $article) {
            $article->translated_content = $this->executeTranslation($article->content);
            $article->is_translation = true;
            $article->save();
        }
    }

    private function executeTranslation($html)
    {
        try {
            $translate = new TranslateClient(['key' => env('GOOGLE_TRANSLATE_API_KEY')]);
            return $translate->translate(
                $html,
                ['target' => 'ko']
            );
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
