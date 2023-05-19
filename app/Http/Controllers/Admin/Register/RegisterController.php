<?php

namespace App\Http\Controllers\Admin\Register;

use App\Http\Controllers\Controller;
use App\Models\Courses\Courses;
use App\Models\Student\Student;
use App\Models\User;
use App\Notifications\RegistrationStudentsCourses;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('student_dashboard.course');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $TimelectureStudent=auth()->guard('student')->user()->Course()->with('lecture')->get() ;

        return view('student_dashboard.student.lecturesTime',compact('TimelectureStudent'));


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
            $course= Courses::select('id','name_ar','name_en')->find($id);

                    return view('student_dashboard.student.registerCourse',compact('course'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $course=Courses::with('user')->find($id);

        if (Carbon::now()->lessThan($course->data_expiry)){
            try {
                $student = Student::select('id','name_ar','name_en')->find(auth()->guard('student')->user()->id);
                $student->Course()->attach($id);

                $course->user->notify(new RegistrationStudentsCourses($course,$student));

                return redirect()->route('register.index');
            }catch (\Exception $e){
                return back()->with('error',__('admin.You Cannot Register Again'));
            }

        }else{

            return back()->with('error',__('admin.Course Registration Has Ended'));
        }



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
