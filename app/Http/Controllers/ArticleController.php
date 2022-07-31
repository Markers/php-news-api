<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArticleCollection;
use App\Http\Resources\ArticleResource;
use App\Models\Article;

class ArticleController extends Controller
{
    public function articles(string $category)
    {
        $articles = Article::where('category', $category)->first();
        if (!$articles) {
            return response()->json([
                'message' => '지원하는 항목은 총 7가지 입니다.',
                'item' => 'news, tutorials, videos, php-annotated-monthly, features, events, eap'
            ], 400);
        }
        $articles = Article::where('category', $category)->orderByDesc('publish_date')->get();
        return new ArticleCollection($articles);
    }

    public function allArticle()
    {
        $articles = Article::orderByDesc('publish_date')->get();
        return new ArticleCollection($articles);
    }

    public function articlePost($category, $post_id)
    {
        $articles = Article::wherePostId($post_id)->whereCategory($category)->first();
        return new ArticleResource($articles);
    }
}
