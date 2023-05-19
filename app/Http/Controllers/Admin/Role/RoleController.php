<?php

namespace App\Http\Controllers\Admin\Role;

use App\Http\Controllers\Controller;
use App\Models\Roles\Ability;
use App\Models\Roles\Roles;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Mockery\CountValidator\Exception;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin_dashboard.settings.Roles.show_role');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('add_role');

        return view('admin_dashboard.settings.Roles.add_role');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , User $user)
    {
        $name =$user->select('name_ar')->find($request->user_id);

        $request->validate([
            'user_id'=>['required']
        ]);

        $role=Roles::create([
            'name'=>$name->name_ar,
        ]);



        $role->abilites()->attach($request->ability);

        $user->where('id',$request->user_id)->update([
            'role_id'=>$role->id,
        ]);

         return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $NameUser=User::select('name_ar','name_en','id')->find($id);

        return view('admin_dashboard.settings.Roles.add_role',compact('NameUser'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Roles $role)
    {
        Gate::authorize('edit_role');

        return view('admin_dashboard.settings.Roles.edit_role',compact('role'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Roles $role)
    {

        $role->abilites()->sync($request->ability);

        return redirect()->route('user.index')->with('edit',__('messages.Edit successfully'));



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Roles $role)
    {
        Gate::authorize('delet_role');

            $role->user()->update([
                'role_id'=>Null,
            ]);
            $role->abilites()->detach();
            $role->delete();


         return redirect()->route('role.index')->with('delete',"تم الحدف");
    }
}
