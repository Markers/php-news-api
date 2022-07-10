<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'post_id' => $this->post_id,
            'href' => $this->href,
            'thumbnail' => $this->thumbnail,
            'width' => $this->width,
            'height' => $this->height,
            'sizes' => $this->sizes,
            'title' => $this->title,
            'description' => $this->description,
            'publish_date' => $this->publish_date,
            'author' => $this->author,
            'author_avatar' => $this->author_avatar,
            // TODO: 네트워크 속도 생각해서 뺌 (서버가 좋지 않다.)
            'content' => $this->content,
            'tags' => $this->tags,
            'category' => $this->category,
            'slug' => $this->slug,
            'translated_url' => $this->translated_url,
            'translated_title' => json_decode($this->translated_title)->text,
            'translated_description' => json_decode($this->translated_description)->text,
            'translated_content' => json_decode($this->translated_content)->text,
            'is_translation' => $this->is_translation,
        ];
    }
}
