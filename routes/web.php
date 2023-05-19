<?php

use App\Http\Controllers\Admin\Register\RegisterController;
use App\Http\Controllers\Main\MainController;
use App\Http\Controllers\Main\ProjectMainController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


    Route::group(['prefix' => LaravelLocalization::setLocale()], function()
    {


        /**========================= Main    =======================================================*/
        Route::controller(MainController::class)->group(function (){
            Route::get('/','index')->name('index');
            Route::get('View-Courses','all_courses')->name('all_courses');


        });

        Route::controller(ProjectMainController::class)->group(function (){
            Route::get('View-project','project')->name('View-project');
            Route::get("project_details/{id}",'details')->name('project_details');

        });

        /**=========================End Main    =======================================================*/




        /**
        |--------------------------------------------------------------------------
        | User Dashboard Routes
        |--------------------------------------------------------------------------
        |
        | Here are all the links for the admin control panel
        |
         */
        require  __DIR__.'/User_Dashboard.php';

        /**
        |-----------------------------------------------------------------------------------
        | Login links, verify the email, and reset the password inside {{ auth.php }} => User
        |-----------------------------------------------------------------------------------
        |
         */
        require __DIR__.'/auth.php';


        /**
         *
         * {{{{  Student  }}}}}
         *
         *
         */

        require __DIR__ . '/student_auth.php';

    });


