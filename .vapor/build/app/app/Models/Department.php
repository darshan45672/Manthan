<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image', 'dept_code'];

    public function faculties(){
        return $this->hasMany(Faculty::class);
    }

    public function hod(){
        return $this->hasOne(Hod::class);
    }

    public function students(){
        return $this->hasMany(Student::class);
    }
}
