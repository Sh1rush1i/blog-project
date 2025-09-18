<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $table = 'post';

    protected $fillable = [
        'title',
        'content',
        'picture',
    ];

    protected static function booted()
    {
        static::saving(function ($post) {
            // kalau baru atau title berubah → regen slug
            if (!$post->slug || $post->isDirty('title')) {
                $post->slug = Str::slug($post->title);
            }
        });
    }
}
