@extends('student_dashboard.layouts.master')
<?php
$Name='name_'.app()->currentLocale();
?>
@section('title',__('admin.Available Courses'))

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


@section('content')


    <!-- /row -->
    <div class="row mt-3">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                </div>
                <div class="card-body">

                    <div class="row">
                        @foreach($courses as $course)
                            <div class="col-sm-4 m-5 " dir="rtl">
                                <!-- Begin Webpage -->
                                <div class="webpage">
                                    <div class="red-brand-box">

                                        <div class="white-brand-box"></div>
                                    </div>

                                    <h3 class="presents-text">
                                        @php
                                            $time_left=strtotime($course->data_expiry)-time();
                                            $days_left=floor($time_left/86400);
                                         if ($days_left >0){
                                        echo __('admin.Days Left To Finish Registration :').$days_left;
                                         }else{
                                          echo __('admin.Course Registration Has Ended');
                                         }
                                        @endphp
                                    </h3>

                                    <h3 class="title ">{{$course->$Name}} </h3>
                                    <a href="{{$course->url_course}}" class="cta-button btn btn-primary">
                                        {{__('admin.تسجيل')}}
                                    </a>



                                    <div class="right-triangle">

                                    </div>

                                </div>

                            </div>
                        @endforeach

                    </div>

                </div>
            </div>
        </div>

    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->

@endsection



