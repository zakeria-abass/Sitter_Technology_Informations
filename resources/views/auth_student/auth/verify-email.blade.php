@extends('auth_student.auth.mastar')

@section('title',"login")


@section('form')


    <form id="signUpForm" method="POST" action="{{ route('student.verification.send') }}">
        @csrf
        @if (session('status') == 'verification-link-sent')
            <div class="alert alert-success">
                <strong>تم إرسال رابط تحقق جديد إلى عنوان البريد الإلكتروني </strong>
            </div>
        @endif
        <div class="text-center col-sm-12">
            <img  src="{{asset('assset_min/imge/cis.png')}}" alt="" width="120px" height="90px" >

        </div>

   <p style="font-size: small;" class="mt-3">Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.</p>


        <main class="d-flex justify-content-between mt-5">
        <button type="submit"   class="btn btn-primary text-white p-2" >Resend Verification Email</button>
    </form>

    <form action="{{route('student.logout')}}" method="post">
        @csrf
        <button type="submit"   class="btn btn-danger text-white p-2" >Log out</button>

    </form>
    </main>
@endsection
