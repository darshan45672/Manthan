<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'banner',
        'name',
        'description',
        'type',
        'start_date',
        'end_date',
        'start_time',
        'end_time',
        'duration',
        'fees',
        'location',
        'is_featured',
        'address',
        'requires_registration',
        'venue',
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'is_featured' => 'boolean',
        'requires_registration' => 'boolean',
    ];
    public function speakers(){
        return $this->hasMany(Speakers::class);
    }

    public function objectives(){
        return $this->hasMany(EventObjectives::class);
    }
}
