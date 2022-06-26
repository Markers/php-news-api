<?php

use App\Http\Controllers\CrawlingController;
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
        $data =  Storage::get('mock/php-annotated-monthly.json');
        return response($data, 200);
    });

    Route::get('/php-annotated-daily/{id}', function ($id) {
        // ID 로 접속하면 => slug 로 이동
   });

    Route::get('/php-annotated-daily/{id}/{slug}', function ($id, $slug) {

    });

    // jetbrains 크롤링 해서 post_id 검색 결과 받아 오기
    Route::get("/crawling", [CrawlingController::class, 'getNewPostCrawling']);
    Route::get("/crawling/content", [CrawlingController::class, 'getContentCrawling']);
});
