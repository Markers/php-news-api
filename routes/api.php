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

Route::prefix('v1')->group(function () {

    Route::get('/php-annotated-monthly', function (Request $request) {
        // jetbrains API
        $data =  Storage::get('mock/php-annotated-monthly.json');
        return response($data, 200);
    });
});
