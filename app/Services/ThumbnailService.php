<?php

namespace App\Services;

use App\Models\Article;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class ThumbnailService
{
    public function run(): string
    {
        try {
            DB::beginTransaction();
            $articles = Article::where('translated_thumbnail', null)->get();
            foreach ($articles as $article) {
                # code...
                $post_id = $article->post_id;
                $category = $article->category;

                $img = $this->makeThumbnail(
                    $category, $article->publish_date, $article->title
                );

                $static_url = "https://static.php-news.com";
                $this->fileUpload("$category/$post_id.png", $img);

                Article::where('id', $article->id)->update(['translated_thumbnail' => "$static_url/$category/$post_id.png"]);
            }
            DB::commit();
            return 'success';
        } catch (\Throwable $th) {
            DB::rollBack();
            \Log::error($th->getMessage());
            return 'fail';
        }
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
            \Log::error($e->getMessage());
            return $e->getMessage();
        }
    }
}
