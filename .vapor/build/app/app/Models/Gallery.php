<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    /** @use HasFactory<\Database\Factories\GalleryFactory> */
    use HasFactory;

    protected $fillable = ['name', 'image', 'description', 'meta_description', 'meta_keywords', 'meta_title', 'gallery_images', 'is_published'] ;

    protected $casts = [
        'is_published' => 'boolean',
        'gallery_images' => 'array',
    ];
}
