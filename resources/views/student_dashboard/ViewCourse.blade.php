<?php
$Name = 'name_' . app()->currentLocale();
?>
@extends('student_dashboard.layouts.master')

@section('title',"View" . $course->$Name)

@section('name-header',$course->$Name)

@section('content')

    <!-- /row --bg-light-->
    <div class="row mt-3">
        <div class="col-xl-12 col-md-12">
            <div class="card">
                <div class="card-body">

                        <h5> <a href="{{route('student.dashboard')}}">الرئسية</a> / مقرراتي الدراسية/ <a href="{{route('showCourse',$course->id)}}">{{$course->$Name}}</a> </h5>

                </div>
            </div>


            <div class="row ">
                <div class="card p-3 col-sm-8">
                    <div class="card-body bg-light d-flex justify-content-between align-content-center ">
                        <h5><a href="{{route('video',$course->id)}}"> فديوهات الكورس </a></h5>
                        <h2><i class="fa fa-video text-primary"></i></h2>
                    </div>


                    @foreach($exams as $exam)

                    <div class="card-body bg-light d-flex justify-content-between align-content-center mt-3">
                        @if(count($exam->grades)==0 && $exam->status==1)
                        <h5><a href="{{route('exam',$exam->id)}}"> {{$exam->$Name}}  </a> <i class="fa fa-lock-open text-success"></i></h5>
                            <h2><i class="fa fa-folder-open text-warning"></i></h2>
                            <h2>
                                <span>مدة الاختبار  : {{ $exam->time}}</span>
                            </h2>

                        @else
                            <h5><a href="#"> {{$exam->$Name}}  </a> <i class="fa fa-lock text-danger"></i></h5>
                            <h2><i class="fa fa-folder text-warning"></i></h2>

                        @endif
                    </div>
                    @endforeach


                    <div class="card-body bg-light d-flex justify-content-between align-content-center mt-3">
                        <h5><a href="#"> pdf  </a></h5>
                        <h2><i class="fa fa-file-pdf text-danger" ></i></h2>
                    </div>

                </div>

                <div class="col-sm-3  mr-5 ml-5 p-2">
                    <div class="card  " style="height: 300px">

                        <video width="100%" height="100%" autoplay loop muted >
                            <source src="{{asset('assset_min/imge/Al-Azhar-Incubator.mp4')}}" type="video/mp4" >
                        </video>

                        <h6 class="text-center" style="text-decoration: none;" >{{__('ADMIN.INFORMATION TECHNOLOGY INCUBATOR')}}
                            <p class="">{{__('main.Al-Azhar University')}}</p>
                            <p class="">نتمنا لكم كل النجاح و التفوق</p>
                        </h6>

                    </div>


                </div>


            </div>
        </div>
        <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    </div>
    <!-- main-content closed -->




@endsection
