<?php
use App\Http\Controllers\Web\Auth\User\{ForgetPasswordController, LoginController, NewPasswordController};
use App\Http\Controllers\Web\SetLanguageController;
use App\Http\Controllers\Web\Site\{
    HomeController,
    UserCourseController ,
    ObjectiveController ,
    GoalController ,
    ProgramController ,
    MangementController ,
    MokasherController
};

use Illuminate\Support\Facades\Route;

/** site routes */
Route::get('/login', [HomeController::class, 'login'])->name('login');
Route::post('/login', [HomeController::class, 'authenticate'])->name('authenticate');

Route::group(['as' => 'gehat.'  ,'middleware' => 'auth'], function () {

    Route::get('/', [HomeController::class, 'index'])->name('index');

    /** Objectives  routes */

    Route::resource('objectives', ObjectiveController::class);

    /** Goals  routes */
    Route::resource('goals', GoalController::class);

    /** Programs  routes */
    Route::resource('programs', ProgramController::class);

    /** Mokshrat  routes */
    Route::resource('moksherat', MokasherController::class);

    /** Mangements */

    Route::resource('mangements',MangementController::class);

});
Route::get('language/{lang}',SetLanguageController::class)->name('language')->whereIn('lang', ['de', 'en']);
