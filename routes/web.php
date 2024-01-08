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
    MokasherController ,
    UsersController
};

use Illuminate\Support\Facades\Route;

/** site routes */
Route::get('/login', [HomeController::class, 'login'])->name('login')->middleware('checkIsManger');
Route::post('/login', [HomeController::class, 'authenticate'])->name('authenticate');

Route::group(['as' => 'gehat.', 'middleware' => ['auth' , 'checkIsManger']  ], function () {

    Route::get('/gehat', [HomeController::class, 'index'])->name('index');

    /** Objectives  routes */
    Route::resource('objectives', ObjectiveController::class);

    /** Goals  routes */
    Route::resource('goals', GoalController::class);

    /** Programs  routes */
    Route::resource('programs', ProgramController::class);

    /** Mokshrat  routes */
    Route::resource('moksherat', MokasherController::class);

    Route::resource('users', UsersController::class);

    Route::get('mokaseerinput/{id}' , [MokasherController::class , 'mokaseerinput'])->name('mokaseerinput') ;

    Route::post('redirect_mokasher/{id}' , [MokasherController::class , 'redirect_mokasher'])->name('redirect_mokasher') ;

    Route::get('mokasherData/{id}' , [MokasherController::class , 'mokasherData'])->name('mokasherData') ;


    Route::post('/gehat_logout' , [HomeController::class ,  'logout'])->name('Gehtlogout');

});

Route::group(['as' => 'sub_geha.'  ,'middleware' => 'auth' , 'checkIsManger'], function () {

    Route::post('/logout' , [HomeController::class ,  'logout'])->name('logout') ;
    Route::get('/', [HomeController::class, 'subgeha'])->name('index');
    Route::get('sub_geha_moksherat', [MokasherController::class , 'sub_geha_moksherat'])->name('sub_geha_moksherat');
    Route::get('sub_geha_mokaseerinput/{id}' , [MokasherController::class , 'sub_geha_mokaseerinput'])->name('sub_geha_mokaseerinput') ;
    Route::post('store_sub_geha_mokasher_input/{id}' ,   [MokasherController::class , 'store_sub_geha_mokasher_input'])->name('store_sub_geha_mokasher_input') ;
    Route::delete('/delete-file/{id}',[MokasherController::class , 'delete_file'])->name('delete.file');

});

Route::get('language/{lang}',SetLanguageController::class)->name('language')->whereIn('lang', ['de', 'en']);
