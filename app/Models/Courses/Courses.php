<?php

namespace App\Models\Courses;

use App\Models\Attendance\Attendance;
use App\Models\Exam\Exams;
use App\Models\Lectures\Lectures;
use App\Models\Sections\Sections;
use App\Models\Student\Student;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    use HasFactory;

    protected $fillable=['name_en','name_ar','user_id','img','data_expiry','section_id','url_course'];
    /*         Sections        */
    public function section(){

        return $this->belongsTo(Sections::class,'section_id','id');
    }

    /*         Students        */

    public  function Student(){

        return $this->belongsToMany(Student::class,'student_course','course_id','student_id');

    }



    /*         lecture        */

    public function lecture(){

        return $this->hasMany(Lectures::class,'course_id','id');
    }

    /*         user        */

    public function user(){

        return $this->belongsTo(User::class,'user_id','id');
    }



    /*         video        */

    public function videos()
    {
        return $this->hasMany(VideosCourses::class);
    }



    /*         Exams        */

    public function exams(){

        return $this->belongsTo(Exams::class,'id','course_id');
    }



}
