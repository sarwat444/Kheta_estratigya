<?php
use App\Http\Controllers\Web\Auth\User\{ForgetPasswordController, LoginController, NewPasswordController};
use App\Http\Controllers\Web\SetLanguageController;
use App\Http\Controllers\Web\gehat\MokasherController;
use App\Http\Controllers\Web\Site\{
    HomeController,
    UserCourseController
};

use Illuminate\Support\Facades\Route;

/** site routes */
Route::get('/login', [HomeController::class, 'login'])->name('login');
Route::post('/login', [HomeController::class, 'authenticate'])->name('authenticate');
Route::group(['as' => 'gehat.'  ,'middleware' => 'auth'], function () {
    Route::get('/mokashrt_geha', [MokasherController::class, 'mokashrt_geha'])->name('moksherat.index');
});
Route::get('language/{lang}',SetLanguageController::class)->name('language')->whereIn('lang', ['de', 'en']);
