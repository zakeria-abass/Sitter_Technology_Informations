<?php

namespace App\Http\Controllers;

use App\Exports\StudentsExport;
use App\Exports\UsersExport;
use App\Models\Courses\Courses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Maatwebsite\Excel\Facades\Excel;

class ExselController extends Controller
{
    /**========================================
     * ==========
     * ========     {{Export  Excel User}}
     *
     * ======
     * ======
     */

    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');

    }

    /**========================================
     * ==========
     * ========     {{Export  Excel Students}}
     *
     * ======
     * ======
     */

    public function importStudent($id)
    {
        Gate::authorize('print_exsel_student');

//        $course=Courses::select('name_en')->first($id);
//        $name=$course->name_en;
        $courses= Courses::with('Student')->where('id',$id)->first();

        return Excel::download(new StudentsExport($courses), $courses->name_en.'.xlsx');

    }
}
