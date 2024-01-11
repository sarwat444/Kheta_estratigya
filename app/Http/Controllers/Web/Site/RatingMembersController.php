<?php

namespace App\Http\Controllers\web\site;

use App\Http\Controllers\Controller;
use App\Models\Mokasher;
use Illuminate\Http\Request;

class RatingMembersController extends Controller
{
   public function mokshrat()
   {
       $mokashert = Mokasher::with('mokasher_geha_inputs' , function ($query){
           $query->where('id', auth()->user()->id);
       })->get() ;
       return  view ('ratingMembers.moksherat.index' , compact('mokashert')) ;
   }
}
