@extends('auth_student.auth.mastar')

@section('title',"هل نسيت كلمة السر")


@section('form')

    <form id="signUpForm" class="mt-2" method="POST" action="{{ route('student.password.email') }}">
        @csrf
        @error (session('email'))
        <div class="alert alert-danger">
            <ul>
                <li>{{ $message}}</li>

            </ul>
        </div>
        @enderror
        <div class="text-center col-sm-12 ">
            <img  src="{{asset('assset_min/imge/cis.png')}}" alt="" width="120px" height="90px" >

        </div>
        <p style="font-size: small;" class="mt-3">Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p>
        <div class="user-box" style="margin-top: 10px;">
            <input type="email"  name="email" value="{{old('email')}}" placeholder="Enter you Email" equired autofocus>

        </div>

        <button type="submit" class="btn btn-primary text-center col-sm-12 mt-3">

            Email Password Reset Link
        </button>

    </form>

@endsection




