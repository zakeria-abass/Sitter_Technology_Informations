<?php

namespace App\Http\Controllers\Admin\Projects;

use App\Http\Controllers\Controller;
use App\Models\Projects\Projects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin_dashboard.project.project');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin_dashboard.project.add_project');

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
            'name_ar'=>['required'],
            'name_en'=>['required'],
            'about_ar'=>['required'],
            'about_en'=>['required'],
            'pic'=>['required'],
            'url'=>['required'],
        ]);



            if ($request->attachment){
                $attachment = rand().time().$request->file('attachment')->getClientOriginalName();
                $request->file('attachment')->move(public_path('assets_admin_dashboard/img_project/'.$request->name_en),$attachment);
            }else{
                $attachment=Null;
            }

            if ($request->download){
                $download=1;
            }else{
                $download=0;

            }

        $pic = rand().time().$request->file('pic')->getClientOriginalName();
        $request->file('pic')->move(public_path('assets_admin_dashboard/img_project/'.$request->name_en),$pic);


        Projects::create([
                'name_ar'=>$request->name_ar,
                'name_en'=>$request->name_en,
                'about_ar'=>$request->about_ar,
                'about_en'=>$request->about_en,
                'student_ar'=>$request->student_ar,
                'student_en'=>$request->student_en,
                'attachment'=>$attachment,
                'progr_lang'=>$request->progr_lang,
                'url'=>$request->url,
                'imge'=>$pic,
                 'download'=>$download,

        ]);
        return redirect()->route('project.index')->with('add',__('messages.Add successfully'));




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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $projects= Projects::findOrFail($id);
        File::deleteDirectory(public_path('assets_admin_dashboard/img_project/'.$projects->name_en));
        $projects->delete();
        return  back();

    }
}
