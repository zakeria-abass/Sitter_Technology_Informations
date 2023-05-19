@extends('layout.master')

@section('css')
<style>
    #signUpForm {
        max-width: 800px;
        background-color: #ffffff;
        margin: 40px auto;
        padding: 40px;
        box-shadow: 0px 6px 18px rgb(0 0 0 / 9%);
        border-radius: 12px;
    }

    #signUpForm input {
        padding: 15px 20px;
        margin-top: 13px;
        width: 100%;
        font-size: 1em;
        border: 1px solid #e3e3e3;
        border-radius: 5px;
    }

    #signUpForm input:focus {
        border: 1px solid #1b53bd;
        outline: 0;
    }
</style>


@stop

@section('content_before')


    <!--Waves Container-->
    <div class="inner-header flex">
        <!--Just the logo.. Don't mind this-->
        <div class="container">

            @yield('form')
        </div>
    </div>
    <div>
        <svg  class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
            <defs>
                <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
            </defs>
            <g class="parallax">
                <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7" />
                <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)" />
                <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)" />
                <use xlink:href="#gentle-wave" x="48" y="7" fill="#fff" />
            </g>
        </svg>
    </div>
    <!--Waves end-->

    <script>
        let  alert =document.querySelector('.alert');

        setTimeout(()=>{
            alert.remove();
        },2000)
    </script>
@stop




