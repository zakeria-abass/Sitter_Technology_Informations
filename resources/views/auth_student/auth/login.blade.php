@extends('auth_student.auth.mastar')

@section('title',"login")


@section('form')

    <form id="signUpForm" method="POST" action="{{ route('student.login') }}">
        @csrf
        @error (session('email'))
        <div class="alert alert-danger alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>{{ $message}}</strong>
        </div>
        @enderror

        <div class="text-center col-sm-12">
            <img  src="{{asset('assset_min/imge/cis.png')}}" alt="" width="120px" height="90px" >

        </div>

        <div class="user-box" >
            <input type="email"  name="email" value="{{old('email')}}" placeholder="Enter you Email" required>
        </div>
        <div class="user-box">
            <input   type="password"   name="password" placeholder="Enter you Password" required autocomplete="current-password">

        </div>
        <div class="d-flex justify-content-between mt-2">
            <div class="custom-control custom-checkbox mt-2">
                <input type="checkbox" class="custom-control-input" id="customCheck" name="remember">
                <label class="custom-control-label text-black-50" for="customCheck">Remember me</label>
                <br>
                <br>
            </div>
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('student.password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>
        <button type="submit"   class="btn btn-primary text-white p-2 col-sm-12 mt-2" >LOG IN</button>


    </form>

@endsection
