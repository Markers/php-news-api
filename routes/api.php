<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CrawlingController;
use App\Http\Controllers\TranslationController;
use Illuminate\Http\Request;
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
    Route::get('/php-annotated-monthly', function (Request $request) {
        // jetbrains API
        $data = Storage::get('mock/php-annotated-monthly.json');
        return response($data, 200);
    });

    Route::get('/php-annotated-daily/{id}', function ($id) {
        // ID 로 접속하면 => slug 로 이동
    });

    Route::get('/php-annotated-daily/{id}/{slug}', function ($id, $slug) {

    });

    // 신규 포스트 목록을 크롤링 함 (내용 외 부가 정보)
    Route::get("/crawling", [CrawlingController::class, 'getNewPostCrawling']);
    // 내용을 가져 오지 않은 포스트 크롤링 함 (내용)
    Route::get("/crawling/content", [CrawlingController::class, 'getContentCrawling']);

    Route::get('/translate', [TranslationController::class, 'translateTheDetails']);

    Route::get('/article/{category}', [ArticleController::class, 'articles']);
});
