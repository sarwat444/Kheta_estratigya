<?php

use App\Http\Controllers\Web\Auth\Admin\{ForgetPasswordController, LoginController, NewPasswordController};
use App\Http\Controllers\Web\Admin\{CourseController,
    CourseSectionController,
    LessonController,
    SectionController,
    CategoryController,
    DashboardController,
    VimeoFolderController,
    InstructorRequestController ,
    objectivesController ,
    GoalController ,
    ProgramController ,
    MokasherController ,
    UsersController ,
    MangementController ,
    KhetaController ,
    RatingMembersController
};

use App\Http\Controllers\Web\Admin\Setting\{CourseSettingController};
use Illuminate\Support\Facades\Route;

/** admin auth routes */
Route::controller(LoginController::class)->prefix('admins')->group(function () {
    Route::get('login', 'create')->name('admins.login')->middleware('guest:admin');
    Route::post('login', 'store')->middleware('throttle:5,1');
    Route::post('logout', 'destroy')->name('admins.logout')->middleware('auth:admin');
});


/** admin reset password routes */
Route::controller(ForgetPasswordController::class)->prefix('admins')->middleware('guest:admin')->group(function () {
    Route::get('forget-password', 'create')->name('admins.password.request');
    Route::post('forget-password', 'store')->name('admins.password.email')->middleware('throttle:5,1');;
});

/** admin new password routes */
Route::controller(NewPasswordController::class)->prefix('admins')->middleware('guest:admin')->group(function () {
    Route::get('reset-password/{token}', 'create')->name('admins.password.reset');
    Route::post('reset-password', 'store')->name('admins.password.update');
});


/** admin dashboard routes */
Route::group(['prefix' => 'admins/dashboard', 'middleware' => 'auth:admin', 'as' => 'dashboard.'], function () {

    Route::get('/', [DashboardController::class, 'index'])->name('index');

    /** Kehat Routes */
    Route::resource('kheta', KhetaController::class);

    /** Rating Members */
    Route::resource('ratingMembers', RatingMembersController::class);

    route::get('CreateratingMembers/{id}' ,[RatingMembersController::class , 'CreateratingMembers'])->name('CreateratingMembers') ;

    /** categories routes */
    Route::resource('categories', CategoryController::class);

        /** Objectives  routes */
    Route::resource('objectives', objectivesController::class);

    /** Goals  routes */
    Route::resource('goals', GoalController::class);

    /** Programs  routes */
    Route::resource('programs', ProgramController::class);

    /** Mokshrat  routes */
    Route::resource('moksherat', MokasherController::class);

    /** Mangements */

    Route::resource('mangements',MangementController::class);

    /** Mokshrat  routes */

    Route::resource('users', UsersController::class);
    Route::post('change_execution_year' , [UsersController::class ,'change_execution_year'])->name('change_execution_year');

    /** Admins Routes */

    Route::get('admins', [UsersController::class, 'admins'])->name('users.admins');
    Route::get('editadmin', [UsersController::class, 'editadmin'])->name('admins.edit');
     Route::get('createadmin', [UsersController::class, 'createadmin'])->name('admins.create');
    Route::get('destory_admin', [UsersController::class, 'destory_admin'])->name('admins.destroy');
    Route::post('storeadmin', [UsersController::class, 'storeadmin'])->name('admins.storeAdmin');




    /** Mokshrat  Input  */
    Route::get('get_mokaseerinput/{id}', [MokasherController::class , 'mokaseerinput'])->name('moksherat.mokaseerinput');
    Route::post('store_mokaseerinput', [MokasherController::class , 'store_mokaseerinput'])->name('moksherat.store_mokaseerinput');

    /** sections routes */
    Route::resource('sections', SectionController::class);
    Route::get('sections-datatables', [SectionController::class, 'sectionsDatatables'])->name('sections.datatables');
    Route::post('sections/{section}/update-lessons-order', [SectionController::class, 'updateLessonsOrder'])->name('sections.update.order');


    /** lessons routes */
    Route::resource('lessons', LessonController::class);
    Route::get('lessons-datatables', [LessonController::class, 'lessonsDatatables'])->name('lessons.datatables');
    Route::post('store-document-lesson', [LessonController::class, 'documentStore'])->name('lessons.store.document');
    Route::put('update-document-lesson/{lesson}', [LessonController::class, 'documentUpdate'])->name('lessons.update.document');
    Route::put('update-video-lesson/{lesson}', [LessonController::class, 'videoUpdate'])->name('lessons.update.video');


    Route::post('store-video-lesson', [LessonController::class, 'videoStore'])->name('lessons.store.video');
    Route::post('lessons/{lesson}/video/uploaded', [LessonController::class, 'assignVideoLessonToFolder'])->name('lessons.video.uploaded');
    Route::get('lessons/{lesson}/video/status', [LessonController::class, 'checkLessonVideoStatus'])->name('lessons.video.check');
    Route::get('lessons/{lesson}/comments', [LessonController::class, 'comments'])->name('lessons.comments');
    Route::get('lessons/{lesson}/comments-datatables', [LessonController::class, 'lessonCommentsDatatable'])->name('lessons.comments.datatables');
    Route::get('lessons/{lesson}/likes', [LessonController::class, 'likes'])->name('lessons.likes');
    Route::get('lessons/{lesson}/likes-datatables', [LessonController::class, 'lessonLikesDatatable'])->name('lessons.likes.datatables');
    Route::get('lessons/{lesson}/views', [LessonController::class, 'views'])->name('lessons.views');
    Route::get('lessons/{lesson}/views-datatables', [LessonController::class, 'lessonViewsDatatable'])->name('lessons.views.datatables');


    /** vimeo-folders routes */
    Route::resource('vimeo-folders', VimeoFolderController::class);
    Route::get('load-vimeo-folders', [VimeoFolderController::class, 'loadVimeoFolders'])->name('vimeo-folders.load');

    /** courses routes */
    Route::resource('courses', CourseController::class);
    Route::get('courses-datatables', [CourseController::class, 'coursesDatatables'])->name('courses.datatables');
    Route::get('courses/{course}/video', [CourseController::class, 'courseVideo'])->name('courses.video');
    Route::post('courses/{course}/video/upload', [CourseController::class, 'courseVideoUpload'])->name('courses.video.upload');
    Route::delete('courses/{course}/video/delete', [CourseController::class, 'courseVideoDelete'])->name('courses.video.delete');
    Route::post('courses/{course}/video/uploaded', [CourseController::class, 'assignVideoCourseToFolder'])->name('courses.video.uploaded');
    Route::get('courses/{course}/sections', [CourseSectionController::class, 'courseSections'])->name('courses.sections');


    /** instructors requests routes */
    Route::resource('instructor-requests', InstructorRequestController::class);
    Route::get('instructors-requests-datatables', [InstructorRequestController::class, 'instructorRequestDatatables'])->name('instructors.requests.datatables');
    Route::get('instructors-requests-view-details/{instractor}', [InstructorRequestController::class, 'instractorDetails'])->name('instructors.requests.view-details');
    Route::post('instructors-requests/{instructorRequest}/update/status', [InstructorRequestController::class, 'updateStatus'])->name('instructors.requests.update.status');


    /** admin settings routes */
    Route::group(['prefix' => 'settings', 'as' => 'settings.courses.homepage.'], function () {
        Route::get('/courses', [CourseSettingController::class, 'index'])->name('index');
        Route::put('/courses/{course}/course-top', [CourseSettingController::class, 'updateTopCourse'])->name('top');
    });

});
