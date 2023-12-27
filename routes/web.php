<?php

use App\Http\Controllers\Apis\site\Instructor\InstructorRequestController;
use App\Http\Controllers\Web\Auth\User\{ForgetPasswordController, LoginController, NewPasswordController};
use App\Http\Controllers\Web\SetLanguageController;
use App\Http\Controllers\Web\Site\{CartController,
    CheckoutController,
    CourseController,
    CourseLessonController,
    HomeController,
    UserCourseController};
use Illuminate\Support\Facades\Route;

/** users auth routes */
Route::controller(LoginController::class)->prefix('users')->group(function () {
    Route::post('login', 'store')->name('users.login')->middleware('throttle:5,1');
    Route::post('logout', 'destroy')->name('users.logout')->middleware('auth');
});

/** users reset password routes */
Route::controller(ForgetPasswordController::class)->prefix('users')->middleware('guest')->group(function () {
    Route::get('forget-password', 'create')->name('password.request');
    Route::post('forget-password', 'store')->name('password.email')->middleware('throttle:5,1');;
});

/** users new password routes */
Route::controller(NewPasswordController::class)->prefix('users')->middleware('guest')->group(function () {
    Route::get('reset-password/{token}', 'create')->name('password.reset');
    Route::post('reset-password', 'store')->name('password.update');
});


/** site routes */
Route::group(['as' => 'site.'], function () {

    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::get('courses/{course}/information', [CourseController::class, 'course'])->name('courses.information');
    //Route::get('courses/{course}/checkout', [CourseController::class, 'checkout'])->name('courses.checkout');
    Route::get('courses/{course}', [CourseController::class, 'show'])->name('courses.show');
    Route::get('courses', [CourseController::class, 'index'])->name('courses');

    Route::get('courses/{course}/lessons/preview', [CourseLessonController::class, 'preview'])->name('courses.lessons.preview');

    Route::group(['middleware' => 'auth'], function () {

        Route::get('courses/{course}/enroll', [UserCourseController::class, 'enroll'])->name('courses.enroll');
        Route::get('courses/enrolled/me', [UserCourseController::class, 'myCourses'])->name('courses.me');
        Route::get('courses/{course}/watch', [UserCourseController::class, 'watchCourse'])->name('courses.me.watch');
        Route::get('courses/{course}/sections/{section}/lessons/{lesson}/watch', [UserCourseController::class, 'watchLesson'])->scopeBindings()->name('courses.me.watch.lesson');
        Route::post('courses/{course}/sections/{section}/lessons/{lesson}/progress', [UserCourseController::class, 'watchLessonProgress'])->scopeBindings()->name('courses.me.watch.lesson.progress');
        Route::post('courses/{course}/sections/{section}/lessons/{lesson}/complete', [UserCourseController::class, 'completeLesson'])->scopeBindings()->name('courses.me.mark.complete.lesson');


        Route::get('instructors/request', [InstructorRequestController::class, 'index'])->name('instructors.request.index');
        Route::post('instructors/request/store', [InstructorRequestController::class, 'store'])->name('instructors.request.store');

        Route::post('cart/{course}/store', [CartController::class, 'store'])->name('cart.store');
        Route::get('cart/{course}/destroy', [CartController::class, 'destroy'])->name('cart.destroy');

        Route::get('checkout', [CheckoutController::class, 'index'])->name('checkout.index');
        Route::post('checkout/completed', [CheckoutController::class, 'store'])->name('checkout.store');
    });
});




Route::get('language/{lang}',SetLanguageController::class)->name('language')->whereIn('lang', ['de', 'en']);
