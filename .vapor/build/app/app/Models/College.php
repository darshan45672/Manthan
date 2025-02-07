<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone', 'address', 'logo', 'website', 'college_code'];

    public function students(){
        return $this->hasMany(Student::class);
    }

    public function faculties(){
        return $this->hasMany(Faculty::class);
    }

    public function hod(){
        return $this->hasMany(Hod::class);
    }

    public function principle(){
        return $this->hasOne(Principal::class);
    }
}
