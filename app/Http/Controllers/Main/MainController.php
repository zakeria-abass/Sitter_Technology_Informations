<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Traits\create;
use App\Models\Courses\Courses;
use App\Models\supporting_companies;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
    public function index()
    {
       $companies= supporting_companies::select('logo')->get();
        return view('index',compact('companies'));
    }

    /**
     * @page courses
     *
     */
    public function all_courses(Request $request)
    {

        $search = $request->search;
        if ($search) {


            $searchs = Courses::where('name_ar', 'like', '%' . $search . '%')
                ->orwhere('name_en', 'like', '%' . $search . '%')->paginate(4);
        } else {
            $searchs = Courses::paginate(4);

        }
        return view('courses', compact('searchs'));
    }





}
