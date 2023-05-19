<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\supporting_companies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       $companies= supporting_companies::paginate(25);
        return  view('admin_dashboard.settings.Companie.show',compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('admin_dashboard.settings.Companie.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $logo = rand().time().$request->file('logo')->getClientOriginalName();
        $request->file('logo')->move(public_path('assets_admin_dashboard/companies/'),$logo);

        supporting_companies::create([

         'name_en'=>$request->name_en,
         'name_ar'=>$request->name_ar,
         'logo'=>$logo,
        ]);

        return redirect()->route('companie.index')->with('add',__('messages.Add successfully'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $companie = supporting_companies::select('name_ar','name_en','id','logo')->find($id);
        return  view('admin_dashboard.settings.Companie.edit',compact('companie'));

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

        $companie = supporting_companies::find($id);

        if ($request->logo){
            File::delete(public_path('assets_admin_dashboard/companies/'.$companie->logo));
        }
        $logo = rand().time().$request->file('logo')->getClientOriginalName();
        $request->file('logo')->move(public_path('assets_admin_dashboard/companies/'),$logo);

        $companie->update([

            'name_en'=>$request->name_en,
            'name_ar'=>$request->name_ar,
            'logo'=>$logo,
        ]);
        return redirect()->route('companie.index')->with('edit',__('messages.Edit successfully'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

       $companie= supporting_companies::select('logo','id')->find($id);
        File::delete(public_path('assets_admin_dashboard/companies/'.$companie->logo));
        $companie->delete();
        return back()->with('delete',__('messages.Delete successfully'));
    }
}
