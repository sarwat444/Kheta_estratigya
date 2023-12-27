<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(): \Illuminate\View\View
    {
        return view('admins.dashboard.index');
    }
}
