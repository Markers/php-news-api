<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ArticleCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection,
            'message' => '지원하는 카테고리는 총 7가지 입니다.',
            'item' => 'news, tutorials, videos, php-annotated-monthly, features, events, eap',
            'total' => $this->collection->count(),
//            'per_page' => $this->perPage(),
//            'current_page' => $this->currentPage(),
//            'last_page' => $this->lastPage(),
//            'next_page_url' => $this->nextPageUrl(),
//            'prev_page_url' => $this->previousPageUrl(),
//            'from' => $this->firstItem(),
//            'to' => $this->lastItem(),
        ];
    }
}
