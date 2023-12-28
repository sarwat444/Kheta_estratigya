<?php

namespace App\Http\Controllers\Web\Site;

use App\Http\Controllers\Controller;
use App\Traits\ResponseJson;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    use ResponseJson;

    public function index()
    {}
    public function login()
    {
        if(Auth::check())
        {
            return view('gehat.auth.login') ;
        }
        else
        {
            return view('gehat.moksherat.index') ;
        }
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->only('job_number', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->is_manager == 0 ) {
                return redirect()->route('gehat.moksherat.index');
            } else {
                return redirect()->route('gehat.moksherat.manger');
            }
        } else {
            return view('login')->with('error', 'Invalid credentials');
        }
    }
}
