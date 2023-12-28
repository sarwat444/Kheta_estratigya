<?php
use App\Http\Controllers\Web\Auth\User\{ForgetPasswordController, LoginController, NewPasswordController};
use App\Http\Controllers\Web\SetLanguageController;
use App\Http\Controllers\Web\Site\{
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
Route::group(['as' => 'gehat.'], function () {
    Route::get('/login', [HomeController::class, 'login'])->name('login');
    Route::post('/login', [HomeController::class, 'authenticate']);

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/login', [HomeController::class, 'login'])->name('moksherat.index');
    });
});




Route::get('language/{lang}',SetLanguageController::class)->name('language')->whereIn('lang', ['de', 'en']);
