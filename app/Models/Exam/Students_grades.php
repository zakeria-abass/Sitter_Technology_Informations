<?php

namespace App\Models\Exam;

use App\Models\Courses\Courses;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students_grades extends Model
{
    use HasFactory;

    protected $guarded=[];


    public function course(){

        return $this->belongsTo(Courses::class,'course_id','id');
    }

    public function exam(){

        return $this->belongsTo(Exams::class,'exam_id','id');
    }
}
