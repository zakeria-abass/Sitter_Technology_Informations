<?php
$Name='name_'.app()->currentLocale();

?>

@extends('layout.master')

@section('title','الدورات المتاحة')

@section('css')

    <style>

        /**********************************************/
        .webpage {
            position: relative;
            margin: auto;
            display: block;
            margin-top: 3%;
            width: 400px;
            height: 320px;
            background: linear-gradient(rgba(38, 38, 43, 0.85), rgba(38, 38, 43, 0.95));
            z-index: 1;
            -webkit-box-shadow: 10px 10px 18px 0px rgba(0, 0, 0, 0.37);
            -moz-box-shadow: 10px 10px 18px 0px rgba(0, 0, 0, 0.336);
            box-shadow: 10px 10px 18px 0px rgba(0, 0, 0, 0.377);
        }

        .right-triangle {
            position: absolute;
            bottom: 0%;
            right: 0%;
            height: 100%;
            width: 50%;
            background: linear-gradient(rgba(255, 255, 255, 0.8), rgba(255, 255, 255, 0.9)), url("https://images.pexels.com/photos/114907/pexels-photo-114907.jpeg?h=350&auto=compress");
            -webkit-clip-path: polygon(100% 0, 0% 100%, 100% 100%);
            clip-path: polygon(100% 0, 0% 100%, 100% 100%);
        }

        .red-brand-box {
            position: absolute;
            width: 8%;
            height: 10%;
            top: 10%;
            left: 10%;
            background: #ffffff;
            z-index: 1;
        }

        .white-brand-box {
            position: absolute;
            width: 80%;
            height: 80%;
            top: 15%;
            left: 15%;
            border: solid 6px #104b98;
            z-index: 2;
        }

        .presents-text {
            position: absolute;
            top: 25%;
            left: 10%;
            font-family: "Open Sans Condensed";
            color: #a19e9f;
            font-size: 16px;
            font-weight: 300;
        }

        .title {
            position: absolute;
            top: 25%;
            left: 10%;
            margin-top: 20px;
            font-family: "Ubuntu";
            font-size: 30px;
            font-weight: 900;
            color: #ffffff;
            text-transform: capitalize;
        }


        .cta-button {
            position: absolute;
            width: 40%;
            height: 10%;
            bottom: 25%;
            left: 10%;
            background: #1256bd;
            border-radius: 0%;
            border: none;
            padding: 10;
            font-family: "Ubuntu";
            font-size: 16px;
            font-weight: 700;
            color: #ffffff;
            text-transform: uppercase;
        }

        @media all and (max-width: 600px) {
            .webpage {
                position: relative;
                margin: auto;
                display: block;
                margin-top: 10px;
                width: 300px;
                height: 200px;
                z-index: 1;
            }


            .presents-text {
                font-size: 8px;
            }

            .title {
                font-size: 24px;
            }

            .cta-button {
                font-size: 6px;
            }

            .branding-logo {
                border: solid 3px #ffffff;
            }
        }

    </style>

@stop

@section('content_before')


    <!--Waves Container-->
    <div class="inner-header flex">
        <!--Just the logo.. Don't mind this-->
        <div class="mr-5 col-sm-11 " >
           <form   method="get" class="d-flex  align-items-center justify-content-center ">
               <input type="search" name="search"  class="form-control col-sm-5 p-4"style="border-radius:5px 0px " placeholder="{{__('main.أبحث')}}" value="{{request()->search}}">
               <button type="submit" class="btn btn-light  align-items-center" style="padding: 12px ;border-radius:0px 5px "><i class="fa fa-search text-primary"></i></button>
           </form>
        </div>

        <div style="" class="position-absolute wrap_circle">
            <div class="wrap">
                <div class="circle horizontal c1">
                    <div class="wrap-electron">
                        <div class="circle electron"></div>
                    </div>
                </div>
                <div class="circle vertical c1">
                    <div class="wrap-electron">
                        <div class="circle electron"></div>
                    </div>
                </div>
            </div>
            <div class="wrap r">
                <div class="circle horizontal c2">
                    <div class="wrap-electron">
                        <div class="circle electron"></div>
                    </div>
                </div>
                <div class="circle vertical c2">
                    <div class="wrap-electron">
                        <div class="circle electron"></div>
                    </div>
                </div>
                <div class="circle center"></div>
            </div>
        </div>
    </div>
    <div>
        <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
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
@stop


@section('content')


    <div class="container">
        <div class="row ">


            @forelse($searchs as $course)
                <div class="col-sm-4 m-5 " dir="rtl">
                    <!-- Begin Webpage -->
                    <div class="webpage">
                        <div class="red-brand-box">

                            <div class="white-brand-box"></div>
                        </div>

                        <h3 class="presents-text">Information Technology</h3>

                        <h3 class="title ">{{$course->$Name}} </h1>
                            <a href="{{$course->url_course}}" class="cta-button btn btn-primary">
                                {{__('admin.تسجيل')}}
                            </a>

                            <div class="right-triangle">
                            </div>

                    </div>

                </div>
                @empty

                <div class="col-sm-12 text-center">
                    <img width="200px"  src="{{asset('assset_min/imge/rag.jpg')}}" alt="">
                    <h3 class="mt-4">{{__('main.معذرة ، لم نتمكن من العثور على نتائج لبحثك')}}:</h3>
                    <h4 class="text-danger">{{request()->search}}</h4>
                </div>

                @endforelse

        </div>
         <div class="justify-content-center align-items-center">
            <div>
                {{$searchs->appends($_GET)->links()}}
            </div>
         </div>

    </div>

@stop

