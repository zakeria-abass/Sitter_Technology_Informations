<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\Courses\Courses;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('show_users');


        return view('admin_dashboard.user.user');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('add_users');

        return view('admin_dashboard.user.add_user');
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
            'type'=>['required'],
            'email'=>['required','unique:users'],
            'password'=>['required','confirmed','min:9'],

        ]);

        User::create([
            'name_ar'=>$request->name_ar,
            'name_en'=>$request->name_en,
            'email'=>$request->email,
            'type'=>$request->type,
            'password'=>Hash::make($request->password),
        ]);

        return redirect()->route('user.index')->with('add',__('messages.Add successfully'));
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

        Gate::authorize('edit_users');
        $user=User::where('id',$id)->first();
        return view('admin_dashboard.user.edit_user',compact('user'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {


        if (empty($request->password)){
            $request->validate([
                'name'=>['required'],
                'type'=>['required'],

            ]);

            User::where('id',$id)->update([
                'name'=>$request->name,
                'type'=>$request->type,
                'password'=>Hash::make($request->password),

            ]);
        }else{
            $request->validate([
                'name'=>['required'],
                'type'=>['required'],
                'password'=>['required','confirmed','min:9']

            ]);

            User::where('id',$id)->update([
                'name'=>$request->name,
                'type'=>$request->type,
                'password'=>$request->password,
            ]);

        }

        return redirect()->route('user.index')->with('edit',__('messages.Edit successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gate::authorize('delet_users');

        User::destroy($id);

        return back()->with('delete',__('messages.Delete successfully'));
    }





}
