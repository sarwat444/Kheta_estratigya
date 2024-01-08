<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    use HasFactory;

    public  function programs()
    {
        return $this->hasMany(Program::class) ;
    }
    public  function objective()
    {
        $this->belongsTo(Objective::class , 'objective_id' , 'id') ;
    }
}
