<?php

use App\Http\Controllers\Admin\Register\RegisterController;
use App\Http\Controllers\Student\ProfileController;
use App\Http\Controllers\Student\StudentDashboardController;
use App\Http\Controllers\StudentAuth\AuthenticatedSessionController;
use App\Http\Controllers\StudentAuth\ConfirmablePasswordController;
use App\Http\Controllers\StudentAuth\EmailVerificationNotificationController;
use App\Http\Controllers\StudentAuth\EmailVerificationPromptController;
use App\Http\Controllers\StudentAuth\NewPasswordController;
use App\Http\Controllers\StudentAuth\PasswordResetLinkController;
use App\Http\Controllers\StudentAuth\RegisteredUserController;
use App\Http\Controllers\StudentAuth\VerifyEmailController;
use App\Models\Student\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use App\Traits\ShowVideosTrait;

Route::group(['middleware' => ['guest:student'],'prefix'=>'student','as'=>'student.'],function(){

    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.update');
});

Route::group(['middleware' => ['auth:student'],'prefix'=>'student','as'=>'student.'],function(){

    Route::get('verify-email', [EmailVerificationPromptController::class, '__invoke'])
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
                ->middleware(['signed:student', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');




    /**================================{{ Delete Account Student }}===========================================*/
    Route::delete('destroy',function (Request $request){

        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    })->name('destroy');
    /**===========================================================================*/

});

Route::get('NewAcount',function (){

    return view('auth_student.auth.NewAcount');
})->name('NewAcount');

/**
 *  Routes Dashboard  Students
 *
 */

Route::group(['middleware' => ['auth:student','verified:student.verification.notice']],function() {


    Route::controller(StudentDashboardController::class)->group(function (){

        Route::get('student/dashboard','index')->name('student.dashboard');

        Route::get('Video/{id}','video')->name('video');

        Route::get('Course/View/{id}','show')->name('showCourse');

        Route::get('exam/{id}','exam')->name('exam');
        Route::post('exam','exam_data')->name('exam_data');

        Route::get('Grades-Exam','grades')->name('grades');


    });


    /*===============================StudentController====================*/
    Route::resource('register',RegisterController::class);
    /*===============================StudentController====================*/

    /*===============================StudentController====================*/
    Route::resource('profile',profileController::class);
    /*===============================StudentController====================*/

});
