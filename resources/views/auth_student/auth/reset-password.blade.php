@extends('auth_student.auth.mastar')

@section('title',"login")


@section('form')

<div class="container">
    <form id="signUpForm" method="POST" action="{{ route('student.password.update') }}">
        @csrf
        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="text-center col-sm-12">
            <img  src="{{asset('assset_min/imge/cis.png')}}" alt="" width="120px" height="90px" >

        </div>

        <div class="user-box" >
            <input type="email"  name="email" value="{{old('email', $request->email)}}" placeholder="Enter you Email" required>
        </div>
        <div class="user-box">
            <input   type="password"   name="password" placeholder="Enter you Password" required autocomplete="current-password">
        </div>

        <div class="user-box">
            <input   type="password"   name="password_confirmation" placeholder="Enter you Password" >
        </div>
        <button type="submit"   class="btn btn-primary text-white p-2 col-sm-12 mt-2" >Reset Password</button>


    </form>

</div>
@endsection
