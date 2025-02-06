<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventObjectives extends Model
{
    /** @use HasFactory<\Database\Factories\EventObjectivesFactory> */
    use HasFactory;

    protected $fillable = [ 'name', 'description', 'program_id' ] ;

    public function program(){
        return $this->belongsTo(Program::class);
    }
}
