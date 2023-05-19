<?php

namespace App\Http\Controllers\Admin\Pdf;

use App\Http\Controllers\Controller;
use App\Models\Courses\Courses;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Gate;

class Pdf_StudentController extends Controller
{

    public function student($id){
        Gate::authorize('student_record');

        $students= Courses::with('student')->where('id',$id)->first();
        $pdf = Pdf::loadView('admin_dashboard.pdf.pdf',compact('students'));
        return $pdf->download('admin_dashboard.pdf');


    }
}
