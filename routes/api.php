<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CrawlingController;
use App\Http\Controllers\TranslationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('v1')->group(function () {

    // 신규 포스트 목록을 크롤링 함 (내용 외 부가 정보)
    Route::get("/crawling", [CrawlingController::class, 'getNewPostCrawling']);
    // 내용을 가져 오지 않은 포스트 크롤링 함 (내용)
    Route::get("/crawling/content", [CrawlingController::class, 'getContentCrawling']);
    // 포스트 부가 정보 번역
    Route::get('/translate', [TranslationController::class, 'translateTheDetails']);
    // 포스트 내용 번역
    Route::get('/translate/content', [TranslationController::class, 'translateTheContent']);

    // 포스트 목록을 가져 오는 API => 추후 API 내 페이징 추가 해야함
    Route::get('/articles', [ArticleController::class, 'allArticle']);
    Route::get('/articles/{category}', [ArticleController::class, 'articles']);
    Route::get('/articles/{category}/{post_id}', [ArticleController::class, 'articlePost']);

    // 마크다운 생성
    Route::get('markdown-format', [\App\Http\Controllers\MarkdownController::class, 'createMarkdown']);

    // 썸네일 생성을 위한 테스트 api
    Route::get('test', [\App\Http\Controllers\MarkdownController::class, 'test']);
});
