<?php

namespace App\Http\Controllers\StudentAuth;

use App\Events\StudentRegisterMailEvent;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Student\Student;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth_student.auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_ar' => ['required', 'string', 'max:255'],
            'name_en' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string'],
            'specialty' => ['required'],
            'n_university' => ['required', 'int'],
            'phone' => ['required', 'max:10','min:10'],
            'stage' => ['required',],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:students'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = Student::create([
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'email' =>$request->email,
           'gender' => $request->gender,
            'n_university' => $request->n_university,
            'specialty' => $request->specialty,
           'phone' => $request->phone,
            'stage' => $request->stage,
            'password' => Hash::make($request->password),

        ]);

        event(new StudentRegisterMailEvent($user));

        Auth::guard('student')->login($user);


        return redirect(RouteServiceProvider::Student);
    }
}
