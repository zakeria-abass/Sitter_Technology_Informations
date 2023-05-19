<?php

namespace App\Http\Controllers\Attendance;

use App\Http\Controllers\Controller;
use App\Models\Attendance\Attendance;
use App\Models\Student\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AttendanceController extends Controller
{


    public  function  index(Request  $request ,$id){



        try {
            if ($request->search){
                $student=Student::where('n_university',$request->search)->first();

                if ($student) {
                    $attendances = Attendance::with('course')->where('course_id', $request->course_id)->where('student_id', $student->id)->where('user_id',auth()->user()->id)->get();
                    $present = Attendance::where('course_id', $request->course_id)->where('student_id', $student->id)->where('status',1)->where('user_id',auth()->user()->id)->count();
                    $absent = Attendance::where('course_id', $request->course_id)->where('student_id', $student->id)->where('status',0)->where('user_id',auth()->user()->id)->count();

                }

            }
            return view('admin_dashboard.Attendance.Attendance',compact('attendances','present','absent'))->with('id',$id);
        }catch (\Exception $exception){

            return view('admin_dashboard.Attendance.Attendance')->with('id',$id);
        }



    }


    //store

    public function  store(Request  $request){

        $attenddate= date('Y-m-d');



        $request->validate([
            'course'      => 'required|numeric',
            'attendences'   => 'required'
        ]);

        foreach ($request->attendences as $studentid => $attendence) {

            $dataexist = Attendance::whereDate('attendence_date',$attenddate)
                ->where('course_id',$request->course)->where('student_id',$studentid)
                ->get();

            if (count($dataexist) !== 0 ) {
                return 'Attendance already taken!';
            }

            if( $attendence == 'present' ) {
                $attendence_status = true;
            } else if( $attendence == 'absent' ){
                $attendence_status = false;
            }

            Attendance::create([
                'student_id'=> $studentid,
                'course_id'=> $request->course,
                'user_id'=> auth()->user()->id,
                'attendence_date'=> $attenddate ,
                'status' => $attendence_status
            ]);
        }


        return redirect()->back()->with('success', 'Attendance saved successfully');
    }




}
