<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Article
 *
 * @method static whereContent($null)
 * @property int $id
 * @property int $post_id 웹 페이지의 고유 id
 * @property string $href 웹사이트에서의 글 주소
 * @property string|null $thumbnail 썸네일 이미지
 * @property int $width width
 * @property int $height height
 * @property string|null $sizes css sizes
 * @property string $title 제목
 * @property string $description 설명
 * @property string $publish_date 작성일
 * @property string $author 작성자
 * @property string|null $author_avatar 작성자 아바타 URL
 * @property string|null $content 내용
 * @property mixed|null $tags 태그
 * @property string $category 카테고리
 * @property string|null $slug 슬러그
 * @property string|null $translated_title 번역된 제목
 * @property string|null $translated_url 번역된 파일 URL
 * @property string|null $translated_description 번역된 설명
 * @property int $is_translation 번역 상태
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Article newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Article newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Article query()
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereAuthor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereAuthorAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereHref($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereIsTranslation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article wherePostId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article wherePublishDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereSizes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereTags($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereThumbnail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereTranslatedDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereTranslatedTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereTranslatedUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereWidth($value)
 * @mixin \Eloquent
 */
class Article extends Model
{

    protected $fillable = [
        'post_id',
        'href',
        'thumbnail',
        'width',
        'height',
        'sizes',
        'title',
        'description',
        'publish_date',
        'author',
        'author_avatar',
        'content',
        'tags',
        'category',
        'slug',
        'translated_title',
        'translated_url',
        'translated_description',
        'is_translation',
    ];

}
