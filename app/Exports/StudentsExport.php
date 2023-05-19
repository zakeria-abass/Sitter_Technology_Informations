<?php

namespace App\Exports;

use App\Models\Courses\Courses;
use App\Models\Student\Student;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class StudentsExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */

       //private $id;

       public function __construct($courses)
       {
           $this->courses=$courses;
       }

    public function view():View
    {
       //$courses= Courses::with('Student')->where('id',$this->id)->first();


        return view('admin_dashboard.Exsel.student',[
            'courses'=>$this->courses
        ]);
    }
}
