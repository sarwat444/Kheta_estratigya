<?php

namespace App\Http\Controllers\Web\Site;

use App\Http\Controllers\Controller;
use App\Traits\ResponseJson;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
class HomeController extends Controller
{
    use ResponseJson;

    public function index()
    {
        return view('gehat.dashboard.index');
    }
    public function login()
    {
     return view('gehat.auth.login') ;
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
            return view('gehat.auth.login')->with('error', 'Invalid credentials');
        }
    }
}
