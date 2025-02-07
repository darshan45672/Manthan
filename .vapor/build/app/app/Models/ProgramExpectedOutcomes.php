<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramExpectedOutcomes extends Model
{
    use HasFactory;

    protected $fillable = ['label', 'name', 'description'];

    public function activities(){
        return $this->hasMany(Activity::class);
    }
}
