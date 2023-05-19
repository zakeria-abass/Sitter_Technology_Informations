<?php

namespace App\Models\Exam;

use App\Models\Courses\Courses;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exams extends Model
{
    use HasFactory;

    protected  $guarded=[];


    public function question(){

        return $this->hasMany(Questions::class,'exam_id','id');
    }

    public function course(){

        return $this->hasOne(Courses::class,'id','course_id');
    }


    public function grades(){

        return $this->hasMany(Students_grades::class,'exam_id','id');
    }
}
