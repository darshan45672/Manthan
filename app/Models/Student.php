<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; 

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','college_id','department_id', 'usn', 'semester'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function college(){
        return $this->belongsTo(College::class);
    }

    public function department(){
        return $this->belongsTo(Department::class);
    }

    public function activities(){
        return $this->hasMany(Activity::class);
    }
}
