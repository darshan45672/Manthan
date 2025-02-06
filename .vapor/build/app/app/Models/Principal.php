<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Principal extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'college_id', 'qualification', 'specialization', 'experience','joining_date'];

    protected $casts = [
        'qualification' => 'array',
        'specialization' => 'array',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function college(){
        return $this->belongsTo(College::class);
    }
}
