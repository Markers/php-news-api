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
        $aaa = [
            'data' => [
                [
                    "href" => "https://blog.jetbrains.com/phpstorm/2022/05/php-annotated-may-2022/",
                    "thubnamil" => [
                        'src' => "https://blog.jetbrains.com/wp-content/uploads/2022/06/Blog_Featured_image_1280x600_PhpStorm-2x-1.png",
                        'width'=> '2560',
                        'height'=> '1200',
                        'sizes' => '(max-width: 768px) 768px , 525px',
                    ],
                    "datetime" => '2022-06-13',
                    "title" => 'PhpStorm 2022.2 EAP #3: Creating Enums',
                    "description" => 'Welcome back to the 2022.2 EAP series! If you’re new or unsure what our Early Access Program is, make sure to read th…',
                    "writer_img" => 'https://secure.gravatar.com/avatar/cef66d348f7def8f4634963a7e7a05e4?s=200&r=g',
                    "writer" => 'Brent Roose',
                ],
                [
                    "href" => "https://blog.jetbrains.com/phpstorm/2022/05/php-annotated-may-2022/",
                    "thubnamil" => [
                        'src' => "https://blog.jetbrains.com/wp-content/uploads/2022/06/Blog_Featured_image_1280x600_PhpStorm-2x-1.png",
                        'width'=> '2560',
                        'height'=> '1200',
                        'sizes' => '(max-width: 768px) 768px , 525px',
                    ],
                    "datetime" => '2022-06-13',
                    "title" => 'PhpStorm 2022.2 EAP #3: Creating Enums',
                    "description" => 'Welcome back to the 2022.2 EAP series! If you’re new or unsure what our Early Access Program is, make sure to read th…',
                    "writer_img" => 'https://secure.gravatar.com/avatar/cef66d348f7def8f4634963a7e7a05e4?s=200&r=g',
                    "writer" => 'Brent Roose',
                ],
                [
                    "href" => "https://blog.jetbrains.com/phpstorm/2022/05/php-annotated-may-2022/",
                    "thubnamil" => [
                        'src' => "https://blog.jetbrains.com/wp-content/uploads/2022/06/Blog_Featured_image_1280x600_PhpStorm-2x-1.png",
                        'width'=> '2560',
                        'height'=> '1200',
                        'sizes' => '(max-width: 768px) 768px , 525px',
                    ],
                    "datetime" => '2022-06-13',
                    "title" => 'PhpStorm 2022.2 EAP #3: Creating Enums',
                    "description" => 'Welcome back to the 2022.2 EAP series! If you’re new or unsure what our Early Access Program is, make sure to read th…',
                    "writer_img" => 'https://secure.gravatar.com/avatar/cef66d348f7def8f4634963a7e7a05e4?s=200&r=g',
                    "writer" => 'Brent Roose',
                ]
            ]
        ];
        return response($aaa, 200);
    });
});
