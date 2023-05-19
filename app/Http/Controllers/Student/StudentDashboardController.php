<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Courses\Courses;
use App\Models\Exam\Exams;
use App\Models\Exam\Questions;
use App\Models\Exam\Students_grades;
use App\Models\Student\Student;
use App\Traits\ShowVideosTrait;
use App\Traits\StudentsGradesTraits;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class StudentDashboardController extends Controller
{
    use  ShowVideosTrait ,StudentsGradesTraits;
    //



    public function index(){

        $coursesStudent=Student::with('Course')->where('id',Auth()->user()->id)->first();
        return view('student_dashboard.index',compact('coursesStudent'));
    }

    //

    public function video($id){

        $videos=$this->view($id);
        $name=Courses::where('id',$id)->select('name_ar','name_en')->first();

        return view('student_dashboard.Videos',compact('videos','name'));
    }


    public function show($id){

             $course= Courses::select('id','name_ar','name_en')->find($id);

            $exams= Exams::with('question','grades')->where('course_id',$id)->orderByDesc('id')->get();

           return view('student_dashboard.ViewCourse',compact('course','exams'));
    }


    public function exam($id)
    {

//        $Exams = Exams::with(['question' => function ($query) {
//            $query->orderBy('id', 'asc')->paginate(3);
//        }, 'course'])->where('id', $id)->get();

        $Exams=Questions::with(['exam'=>function($query) use($id){
            $query->where('id',$id)->get();
        }])->get();

        $exam=Exams::find($id);
        return view('student_dashboard.exam',compact('Exams','id','exam'));

    }


    public function exam_data(Request  $request)
    {
        $totla=0;
        $wrong=0;
        $correct=0;


        if ($request->attendences === Null){

            $this->grade($request,0,0,0);

        }else{

            foreach ($request->attendences as $key => $value) {


                $Questions= Questions::where('id',$key)->first();
                if ($Questions->answer_correct != $value){

                    $wrong=$wrong+1;

                }elseif ($Questions->answer_correct === $value){
                    $correct=$correct+1;

                    $totla=$totla+$request->correct;

                }

            }

            $this->grade($request,$correct,$wrong,$totla);

        }


        return redirect()->route('student.dashboard');

    }


    public  function grades(){

       $grades= Students_grades::with('course','exam')->where('student_id',auth()->guard('student')->user()->id)->get();

        return view('student_dashboard.grades_exam',compact('grades'));
    }

}
