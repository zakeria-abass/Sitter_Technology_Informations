<?php

namespace App\Traits;

use App\Models\Exam\Students_grades;

trait StudentsGradesTraits
{

    public   function  grade($request,$correct,$wrong,$totla){


        Students_grades::create([
            'course_id'=>$request->course,
            'exam_id'=>$request->exam_id,
            'student_id'=>auth()->guard('student')->user()->id,
            'correct'=>$correct,
            'wrong'=>$wrong,
            'total'=>$totla,
        ]);

    }

}
