<?php
use App\Http\Controllers\Web\Site\{
    RatingMembersController,
};
use Illuminate\Support\Facades\Route;

Route::get('/ratingLogin' , [RatingMembersController::class , 'login'])->name('ratingLogin');
Route::post('/ratingLogin', [RatingMembersController::class ,'ratingLogin'])->name('ratingLogin') ;
/** admin dashboard routes */
Route::group(['middleware' => 'auth:ratingMember', 'as' => 'rating.'], function () {
    Route::get('/gehat', [RatingMembersController::class, 'gehat'])->name('gehat');
    Route::get('mokshart' , [RatingMembersController::class, 'mokshrat'])->name('mokshrat.view') ;
});
