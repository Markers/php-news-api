<?php

namespace App\Services;

use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;

class ThumbnailService
{
    public function thumbnailUpload($articles)
    {

        foreach ($articles as $article) {
            $post_id = $article->post_id;
            $category = $article->category;
            $publish_date = $article->publish_date;
            $title = $article->title;
            $img = $this->makeThumbnail($category, $publish_date, $title);
        }
    }

    public function fileUpload($path, $img)
    {
        try {
            //code...
            $aa = (string)$img->encode('png');
            $bb = Storage::disk('s3')->put("$path", $aa);
            dd($path);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function makeThumbnail($category, $publish, $title)
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
