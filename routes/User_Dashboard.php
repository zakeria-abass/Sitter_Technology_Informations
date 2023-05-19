<?php


/*========================= Dashboard    =======================================================*/

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\Coach\CoachController;
use App\Http\Controllers\Admin\CompaniesController;
use App\Http\Controllers\Admin\Courses\CoursesController;
use App\Http\Controllers\Admin\Dashboard\DashboardController;
use App\Http\Controllers\Admin\NotificationsDataBase\NotificationController;
use App\Http\Controllers\Admin\Pdf\Pdf_StudentController;
use App\Http\Controllers\Admin\Profile\ProfileController;
use App\Http\Controllers\Admin\Projects\ProjectsController;
use App\Http\Controllers\Admin\Role\RoleController;
use App\Http\Controllers\Admin\Sections\SectionsController;
use App\Http\Controllers\Admin\User\UserController;
use App\Http\Controllers\Admin\VideoCourse\VideosController;
use App\Http\Controllers\Attendance\AttendanceController;
use App\Http\Controllers\Exam\ExamController;
use App\Http\Controllers\ExselController;
use App\Http\Controllers\Lectures\LecturesController;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => ['auth','verified'],'prefix'=>'dashboard'],function() {

    /*===============================DashboardController====================*/
    Route::resource('dashboard',DashboardController::class);


    /*===========================End====DashboardController====================*/

    /*===============================SectionsController====================*/
    Route::resource('section',SectionsController::class);
    /*===============================SectionsController====================*/

    /*===============================CoursesController====================*/
    Route::resource('courses',CoursesController::class);

    /*===============================CoursesController====================*/

    /*===============================StudentController====================*/
//            Route::resource('student',StudentController::class)->middleware('auth');
//            Route::get('details/{id}',[StudentController::class,'details'])->name('details');
    /*===============================StudentController====================*/

    /*===============================Pdf_StudentController====================*/

    Route::controller(Pdf_StudentController::class)->group(function (){
        Route::post('pdf_student/{id}','student')->name('pdf_student');
    });
    /*===============================Pdf_StudentController====================*/

    /*===============================UserController====================*/
    Route::resource('user',UserController::class);

    /*===============================UserController====================*/

    /*===============================ProjectsController====================*/
    Route::resource('project',ProjectsController::class);
    /*===============================ProjectsController====================*/


    /*===============================settings====================*/
    Route::get('settings',function (){
        return view('admin_dashboard.settings.settings');
    })->name('settings');
    /*===============================settings====================*/


    /*===============================AboutController====================*/
    Route::resource('About',AboutController::class);

    /*=============================End==AboutController====================*/


    /*===============================ProfileController====================*/
    Route::resource('profileUsers',ProfileController::class);
    /*===============================ProfileController====================*/


    /*===============================RoleController====================*/
    Route::resource('role',RoleController::class);
    /*===============================RoleController====================*/



    /*===============================CoachController====================*/
    Route::resource('coach',CoachController::class);

    /*===============================VideosController====================*/
    Route::get('index/{id}',[VideosController::class,'index'])->name('index.Videos');
    Route::post('index/{id}',[VideosController::class,'StoreVideos'])->name('Store.Videos');
    Route::get('ShowVideos/{id}',[VideosController::class,'ShowVideos'])->name('Show.Videos');

    Route::put('ShowVideos/{id}',[VideosController::class,'UpdateVideos'])->name('Update.Videos');
    Route::delete('DestroyVideos/{id}',[VideosController::class,'DestroyVideos'])->name('Destroy.Videos');

    /*===============================VideosController====================*/

    /*===============================ExamController====================*/
    Route::controller(ExamController::class)->group(function (){
        Route::get('Exam/{id}','index')->name('index_Exam');
        Route::get('Create Exam/{id}','create')->name('create_Exam');
        Route::get('Create questions/{id}','createQuestions')->name('create_question');
        Route::post('Exam/{id}','store')->name('exam_store');
        Route::post('Question/{id}','storeQuestion')->name('question_store');
        Route::get('Show Answer/{id}','showAnswer')->name('show_answer');

        Route::get('Edit Answer/{id}','edit')->name('edit_answer');
        Route::put('Edit Answer/{id}','update')->name('update_answer');
        Route::delete('Destroy Answer/{id}','destroy')->name('destroy_answer');


        Route::get('Edit Exam/{id}','edit_Exam')->name('edit_Exam');
        Route::put('Edit Exam/{id}','update_Exam')->name('update_Exam');
    });
    /*===============================ExamController====================*/

    /*===============================VideosController====================*/


    /*===============================AttendanceController====================*/
     Route::controller(AttendanceController::class)->group(function (){
         Route::get('Attendance/{id}','index')->name('index_Attendance');
         Route::post('store','store')->name('store');
     });
    /*===============================AttendanceController====================*/


    /*===============================LecturesController====================*/
    Route::resource('lecture',LecturesController::class);
    Route::post('store/{id}',[LecturesController::class,'storelecture'])->name('storelecture');
    /*===============================LecturesController====================*/



    /*===============================Exsel====================*/
    Route::get('export', [ExselController::class, 'export'])->name('export');
    Route::post('import', [ExselController::class, 'import'])->name('import');
    Route::get('importStudent/{id}', [ExselController::class, 'importStudent'])->name('importStudent');


    //========================{{ Read Notifications}}===================
    Route::controller(NotificationController::class)->group(function (){
        Route::get('read/{id}','read')->name('read');
        Route::get('read_all','read_all')->name('read_all');

        Route::get('notification_all','notification_all')->name('notification_all');
        Route::delete('deletenotification','deletenotification')->name('deletenotification');

    });
    //========================{{ End Read Notifications}}===================



    /*===============================CompaniesController====================*/
    Route::resource('companie',CompaniesController::class);
    /*===============================CompaniesController====================*/


});

