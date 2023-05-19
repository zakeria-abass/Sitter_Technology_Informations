<?php

namespace App\Models;

use App\Models\Courses\Courses;
use App\Models\Roles\Roles;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable    implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name_ar',
        'name_en',
        'imge',
        'email',
        'type',
        'password',
        'role_id',
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




    public  function role()
    {

        return $this->belongsTo(Roles::class)->withDefault();
    }


    /**      Courses   Students        */

    public  function CoursesStudent(){

        return $this->belongsToMany(Courses::class,'user_course','user_id','course_id');
    }



    public  function cours()
    {
        return $this->hasOne(Courses::class)->withDefault();
    }
}
