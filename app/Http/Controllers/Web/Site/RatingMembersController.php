<?php

namespace App\Http\Controllers\web\site;

use App\Http\Controllers\Controller;
use App\Models\Mokasher;
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
            return redirect()->intended(route('rating.gehat')) ;
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
    public function gehat()
    {
        $responsable_gehat = json_decode(Auth::guard('ratingMember')->user()->gehat);
        $users =  User::whereIn('id' ,$responsable_gehat)->get() ;
        return  view('ratingMembers.geaht.index' ,  compact('users'));
    }
    public  function mokshrat($user_id)
    {

    }
}
