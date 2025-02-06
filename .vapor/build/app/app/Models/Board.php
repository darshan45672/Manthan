<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'is_active'];

    public function members()
    {
        return $this->hasMany(BoardMembers::class);
    }

    public function president()
    {
        return $this->hasOne(BoardPresidents::class);
    }
}
