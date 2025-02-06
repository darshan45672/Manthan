<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;

    protected $fillable = [
        'image',
        'title',
        'slug',
        'content',
        'tags',
        'category_id',
        'published',
        'user_id',
    ];

    protected $casts = [
        'published' => 'boolean',
        'tags' => 'array',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
