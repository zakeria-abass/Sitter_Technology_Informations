<?php

namespace App\Traits;

use App\Models\Student\Student;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

trait updateProfileTrait
{

    public function updateProfile($request,$id){

        if ($request->imge){
            File::delete(public_path('assets_admin_dashboard/img/user/'.auth()->user()->imge));
            $imge=rand().time().$request->file('imge')->getClientOriginalName();
            $request->file('imge')->move(public_path('assets_admin_dashboard/img/user/'),$imge);
        }else{
            $imge=auth()->user()->imge;
        }



        if (empty($request->password)){
            $request->validate([
                'name_ar'=>['required'],
                'name_en'=>['required'],
                'email'=>['required','unique:users,email,'.$id],
            ]);

            User::where('id',$id)->update([
                'name_ar'=>$request->name_ar,
                'name_en'=>$request->name_en,
                'email'=>$request->email,
                'imge'=>$imge
            ]);
        }else{
            $request->validate([
                'name_ar'=>['required'],
                'name_en'=>['required'],
                'email'=>['required','unique:users,email,'.$id],
                'password'=>['required','confirmed','min:9']
            ]);
            User::where('id',$id)->update([
                'name_ar'=>$request->name_ar,
                'name_en'=>$request->name_en,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
                'imge'=>$imge

            ]);

            Auth::guard('web')->logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect()->route('login');


        }

    }


    public function updateProfileStudent($request,$id){
        if ($request->imge){
            File::delete(public_path('assets_admin_dashboard/img/user/'.auth()->guard('student')->user()->imge));
            $imge=rand().time().$request->file('imge')->getClientOriginalName();
            $request->file('imge')->move(public_path('assets_admin_dashboard/img/user/'),$imge);
        }else{
            $imge=auth()->guard('student')->user()->imge;
        }

        if (empty($request->password)) {

            $request->validate([
                'name_ar' => ['required', 'string', 'max:255'],
                'name_en' => ['required', 'string', 'max:255'],
                'gender' => ['required', 'string'],
                'specialty' => ['required'],
                'n_university' => ['required', 'int'],
                'phone' => ['required', 'max:10', 'min:10'],
                'stage' => ['required',],
                'email' => ['required', 'string', 'unique:students,email,' . $id],
            ]);

            Student::where('id', $id)->update([
                'name_ar' => $request->name_ar,
                'name_en' => $request->name_en,
                'imge' => $imge,
                'email' => $request->email,
                'gender' => $request->gender,
                'n_university' => $request->n_university,
                'specialty' => $request->specialty,
                'phone' => $request->phone,
                'stage' => $request->stage,
            ]);

        }else{

            $request->validate([
                'name_ar' => ['required', 'string', 'max:255'],
                'name_en' => ['required', 'string', 'max:255'],
                'gender' => ['required', 'string'],
                'specialty' => ['required'],
                'n_university' => ['required', 'int'],
                'phone' => ['required', 'max:10', 'min:10'],
                'stage' => ['required',],
                'email' => ['required', 'string', 'unique:students,email,' . $id],
                'password' => ['required', 'confirmed'],
            ]);

            Student::where('id', $id)->update([
                'name_ar' => $request->name_ar,
                'name_en' => $request->name_en,
                'imge' => $imge,
                'email' => $request->email,
                'gender' => $request->gender,
                'n_university' => $request->n_university,
                'specialty' => $request->specialty,
                'phone' => $request->phone,
                'stage' => $request->stage,
                'password' => Hash::make($request->password),
            ]);


        }
    }
}
