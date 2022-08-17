<?php

namespace App\Services;

use App\Models\Article;
use Google\Cloud\Translate\V2\TranslateClient;
use Illuminate\Support\Facades\DB;
use Throwable;

class WebhookService
{

    public function run($article)
    {
        $content = "$article->category 에 새로운 글이 등록 되었습니다.";
        $title = json_decode($article->translated_title)->text;
        $description = json_decode($article->translated_description)->text;
        $article_url = "https://www.php-news.com/$article->category/$article->id";
        $thumbnail_url = $article->translated_thumbnail;
        $webhookurl = env('WEBHHOOK_URL');
        $timestamp = date("c", strtotime("now"));
        $json_data = json_encode([
            // Message
            "content" => $content,

            // Username
            "username" => "PHP Annotated",

            // Avatar URL.
            "avatar_url" => "https://blogpfthumb-phinf.pstatic.net/MjAyMjAzMjFfMTg4/MDAxNjQ3ODcwNzA0OTk2.3OPpiyzi3bJwmvWEDV3d4sZ7N_KbJctXrhQDjObzh_8g.cAK9OOV69Wrhu_Yp1C8_-3cKsQnrcJi0uFWYmjZXwtYg.PNG.modernpug/%EC%8A%A4%ED%81%AC%EB%A6%B0%EC%83%B7_2022-03-21_%EC%98%A4%ED%9B%84_10.48.29.png/%3F%3F%3F%3F%3F%3F%3F%3F%3F%3F+2022-03-21+%3F%3F%3F%3F+10.48.29.png?type=w161",

            "tts" => false,
            "embeds" => [
                [
                    // Embed Title
                    "title" => $title,
                    // Embed Type
                    "type" => "rich",
                    // Embed Description
                    "description" => $description,
                    // URL of title link
                    "url" => $article_url,
                    // Timestamp of embed must be formatted as ISO8601
                    "timestamp" => $timestamp,
                    // Embed left border color in HEX
                    "color" => hexdec("#5e4996"),
                    // Image to send
                    "image" => [
                        "url" => $thumbnail_url,
                    ],
                ]
            ]

        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );


        $ch = curl_init( $webhookurl );
        curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
        curl_setopt( $ch, CURLOPT_POST, 1);
        curl_setopt( $ch, CURLOPT_POSTFIELDS, $json_data);
        curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt( $ch, CURLOPT_HEADER, 0);
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);

        $response = curl_exec( $ch );
        // echo $response;
        curl_close( $ch );
    }
}
