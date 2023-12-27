<?php

namespace App\Http\Controllers\Web\Site;

use App\Http\Controllers\Controller;
use App\Traits\ResponseJson;
use App\Models\Course;

class HomeController extends Controller
{
    use ResponseJson;

    public function index(Course $course): \Illuminate\View\View
    {
        $topCourses = $course->ActiveCourses()->TopCourses()->with(['category', 'media', 'user:id,first_name,last_name'])
            ->withAvg('rates', 'rate')
            ->withSum('lessons', 'duration')
            ->withCount('lessons', 'rates')
            ->get();
        return view('site.home.index', compact('topCourses'));
    }

}
