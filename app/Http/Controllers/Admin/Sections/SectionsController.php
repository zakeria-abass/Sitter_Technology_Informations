<?php

namespace App\Http\Controllers\Admin\Sections;

use App\Http\Controllers\Controller;
use App\Models\Sections\Sections;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SectionsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        Gate::authorize('show_sections');
        return view('admin_dashboard.section.show_section');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('add_sections');

        return view('admin_dashboard.section.add_section');


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
        ]);

        Sections::create([
            'name_ar'=>$request->name_ar,
            'name_en'=>$request->name_en,
            'about_ar'=>$request->about_ar,
            'about_en'=>$request->about_en,
            'user_id'=>auth()->user()->id
        ]);;

        return redirect()->route('section.index')->with('add',__('messages.Add successfully'));
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
        Gate::authorize('edit_sections');
        $sections =sections::where('id',$id)->first();
        return view('admin_dashboard.section.edit_section',compact('sections'));
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
       Sections::where('id',$id)->update([
           'name_ar'=>$request->name_ar,
           'name_en'=>$request->name_en,
           'about_ar'=>$request->about_ar,
           'about_en'=>$request->about_en,
       ]);

        return redirect()->route('section.index')->with('edit',__('messages.Modified successfully'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gate::authorize('delet_sections');
        Sections::destroy($id);
        return redirect()->route('section.index')->with('delete',__('messages.Delete successfully'));

    }
}
