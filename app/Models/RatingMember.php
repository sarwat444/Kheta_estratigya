<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RatingMember extends Model
{
    use HasFactory;
    public function kheta()
    {
        return $this->belongsTo(Kheta::class ) ;
    }
}
