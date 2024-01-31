<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MokasherGehaInput extends Model
{
    use HasFactory;
    public function mokasher()
    {
        return $this->belongsTo(Mokasher::class , 'mokasher_id' , 'id') ;
    }
    public function ex_year()
    {
        $this->belongsTo(Execution_year::class , 'year_id' , 'id');
    }
}
