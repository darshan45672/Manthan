<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonials extends Model
{
    /** @use HasFactory<\Database\Factories\TestimonialsFactory> */
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'testimonial', 'is_published'] ;

    protected $casts = [
        'is_published' => 'boolean',
    ];
    
    public function user(){
        return $this->belongsTo(User::class);
    }

}
