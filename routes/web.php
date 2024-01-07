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

    Route::resource('users', UsersController::class);


    Route::get('mokaseerinput/{id}' , [MokasherController::class , 'mokaseerinput'])->name('mokaseerinput') ;

    Route::post('redirect_mokasher/{id}' , [MokasherController::class , 'redirect_mokasher'])->name('redirect_mokasher') ;

    /** Mangements */

    Route::resource('mangements',MangementController::class);

});




Route::group(['as' => 'sub_geha.'  ,'middleware' => 'auth'], function () {
    Route::get('sub_geha_moksherat', [MokasherController::class , 'sub_geha_moksherat'])->name('sub_geha_moksherat');
    Route::get('sub_geha_mokaseerinput/{id}' , [MokasherController::class , 'sub_geha_mokaseerinput'])->name('sub_geha_mokaseerinput') ;
    Route::post('store_sub_geha_mokasher_input/{id}' ,   [MokasherController::class , 'store_sub_geha_mokasher_input'])->name('store_sub_geha_mokasher_input') ;
    Route::delete('/delete-file/{id}',[MokasherController::class , 'delete_file'])->name('delete.file');
});


Route::get('language/{lang}',SetLanguageController::class)->name('language')->whereIn('lang', ['de', 'en']);
