<?php

namespace App\Services;

use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;

class ThumbnailService
{
    public function run()
    {
        $article = \App\Article::where('translated_thumbnail', null)->fisrt();
        $post_id = $article->post_id;
        $category = $article->category;
        $publish_date = $article->publish_date;
        $title = $article->title;
        $img = $this->makeThumbnail($category, $publish_date, $title);
        $static_url = config('url');
        $this->fileUpload("$category/$post_id.png", $img);
        $article->translated_thumbnail = "$static_url/$category/$post_id.png";
        $article->save();
    }

    private function fileUpload($path, $img)
    {
        try {
            $binaryImage = (string)$img->encode('png');
            Storage::disk('s3')->put("$path", $binaryImage);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    private function makeThumbnail($category, $publish, $title)
    {
        try {
            $img = Image::make(public_path("storage/images/$category.png"));
            $img->text(strtoupper(str_replace('-', ' ', $category)), 960, 239, function ($font) {
                $font->file(public_path('storage/images/NanumGothicCoding-Bold.ttf'));
                $font->size(120);
                $font->color('#fdf6e3');
                $font->align('center');
                $font->valign('middle');
            });
            $img->text($publish, 960, 390, function ($font) {
                $font->file(public_path('storage/images/NanumGothicCoding-Bold.ttf'));
                $font->size(60);
                $font->color('#fdf6e3');
                $font->align('center');
                $font->valign('middle');
            });
            $img->text($title, 960, 639, function ($font) {
                $font->file(public_path('storage/images/NanumGothicCoding-Bold.ttf'));
                $font->size(50);
                $font->color('#fdf6e3');
                $font->align('center');
                $font->valign('middle');
            });
            return $img;
        } catch (\Exception $e) {
            return $e->getMessage();
            return $e;
        }
    }
}
