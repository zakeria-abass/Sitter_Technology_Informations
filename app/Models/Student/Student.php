<?php

namespace App\Models\Student;

use App\Models\Attendance\Attendance;
use App\Models\Courses\Courses;
use App\Notifications\StudentRegisterMailNotification;
use App\Notifications\StudentResetPasswordNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory ;
use Illuminate\Foundation\Auth\User  as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

;

class Student extends Authenticatable  implements MustVerifyEmail
{

    use HasApiTokens, HasFactory, Notifiable;

    protected $guard = 'student';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name_ar',
        'name_en',
        'email',
        'n_university',
        'phone',
        'specialty',
        'stage',
        'gender',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new StudentRegisterMailNotification);
    }


    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new StudentResetPasswordNotification($token));
    }



    /*         Course        */

    public  function Course(){

        return $this->belongsToMany(Courses::class,'student_course','student_id','course_id');
    }



    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
}
