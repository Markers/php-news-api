<?php

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

Route::get('/user', function (Request $request) {
    // jetbrains API
    $aaa =  Http::acceptJson()->post('https://blog.jetbrains.com/wp-admin/admin-ajax.php?wpml_lang=en', [
        'data' => [
            'action' => 'loadmore',
            'post_data[category_name]' => 'news',
            'post_data[post_type]' => 'phpstorm',
            'page' => 1,
            'category_name' => 'news',
            'post_type' => '',
            'search' => '',
            'author_id' => ''
        ]
    ]);

    // TODO: 현재 400 뜨고 있음
    dd($aaa);
});
