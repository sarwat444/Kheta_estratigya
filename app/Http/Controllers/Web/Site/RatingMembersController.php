<?php

namespace App\Http\Controllers\web\site;

use App\Http\Controllers\Controller;
use App\Models\Mokasher;
use App\Models\MokasherInput;
use App\Models\RatingMember;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth ;

class RatingMembersController extends Controller
{
    public function login()
    {
       return view('ratingMembers.auth.login') ;
    }
    public  function ratingLogin(Request $request)
    {
        $credentials = $request->only('job_number', 'password');
        if(Auth::guard('ratingMember')->attempt($credentials)) {
            //custom
            $responsable_gehat = json_decode(Auth::guard('ratingMember')->user()->gehat);
            $users =  User::whereIn('id' ,$responsable_gehat)->get() ;
            return  view('ratingMembers.geaht.index' , compact('users')) ;
        }
        else {
            return view('ratingMembers.auth.login')->with('error', 'Invalid credentials');
        }
    }
    public  function logout()
    {
        Auth::logout();
        return redirect()->intended(route('login')) ;
    }
    public function rating_gehat()
    {
        $responsable_gehat = json_decode(Auth::guard('ratingMember')->user()->gehat);
        $users =  User::whereIn('id' ,$responsable_gehat)->get() ;


        return  view('ratingMembers.geaht.index' ,  compact('users'));
    }
    public function rating_mokshart($user_id)
    {
        $mokashert = Mokasher::whereHas('mokasher_geha_inputs', function ($query) use ($user_id) {
            // Assuming 'geha_id' is the column you want to compare with $user_id
            $query->where('geha_id', $user_id);
        })->get();
        return  view('ratingMembers.moksherat.index' ,compact('mokashert'));
    }
    public function ratinginput ($mokasher_id)
    {
        $mokaser_data = MokasherInput::where('mokasher_id' ,$mokasher_id )->first() ;
        return view('ratingMembers.moksherat.view_achived_mokasher' , compact('mokasher_id' , 'mokaser_data')) ;
    }
}
