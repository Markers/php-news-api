<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static whereContent($null)
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
