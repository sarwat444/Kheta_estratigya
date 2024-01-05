<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mokasher extends Model
{
    use HasFactory;
    public function addedBy_fun()
    {
        return $this->belongsTo(User::class , 'addedBy' , 'id') ;
    }
    public function mokasher_inputs()
    {
        return $this->hasMany(MokasherInput::class , 'mokasher_id' , 'id') ;
    }
}
