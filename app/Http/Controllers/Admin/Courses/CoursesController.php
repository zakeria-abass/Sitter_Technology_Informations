<?php

namespace App\Http\Controllers\Admin\Courses;

use App\Http\Controllers\Controller;
use App\Jobs\SendEmailJob;
use App\Models\Courses\Courses;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('show_courses');
        return view('admin_dashboard.course.show_course');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('add_courses');

        return view('admin_dashboard.course.add_course');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_en'=>['required'],
            'name_ar'=>['required'],
            'presenter'=>['required'],
            'data_expiry'=>['required'],
            'section'=>['required'],
        ]);



        if ($request->data_expiry < date('Y-m-d')){
              $data_er = "التاريخ قديم لايمكنك اختيارة";
            return  back()->with('data_er',$data_er);

        }else{
            $data =$request->data_expiry;
        }



        Courses::create([
            'name_en'=>$request->name_en,
            'name_ar'=>$request->name_ar,
            //'img'=>'img',
            'user_id'=>$request->presenter,
            'data_expiry'=>$data,
            'section_id'=>$request->section,

        ]);

        $courses=Courses::latest()->first();
        Courses::where('id',$courses->id)->update([
            'url_course'=>route('register.show',$courses->id),
        ]);

        SendEmailJob::dispatch($courses->user->name_ar,$courses->name_ar,route('register.show',$courses->id));
        return redirect()->route('courses.index')->with('add',__('messages.Add successfully'));


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     //
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Gate::authorize('edit_courses');

        $edit= Courses::with('section')->find($id);
        return view('admin_dashboard.course.edit_course',compact('edit'));


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
        $request->validate([
            'name_en'=>['required'],
            'name_ar'=>['required'],
            'presenter'=>['required'],
            'data_expiry'=>['required'],
            'section'=>['required'],
        ]);

        if ($request->data_expiry < date('Y-m-d')){
            $data_er = "التاريخ قديم لايمكنك اختيارة";
            return  back()->with('data_er',$data_er);

        }else{
            $data =$request->data_expiry;
        }

        Courses::where('id',$id)->update([
            'name_en'=>$request->name_en,
            'name_ar'=>$request->name_ar,
            //'img'=>'img',
            'user_id'=>$request->presenter,
            'data_expiry'=>$data,
            'section_id'=>$request->section,

        ]);

        return redirect()->route('courses.index')->with('edit',__('messages.Edit successfully'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gate::authorize('delet_courses');

        Courses::destroy($id);
        return redirect()->route('courses.index')->with('delete',__('messages.Delete successfully'));
    }



}
