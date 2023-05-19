@extends('student_dashboard.layouts.master')

<?php
$Name='name_'.app()->currentLocale();

?>


@section('title',__('admin.Student Portal'))



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
                    <div class="row justify-content-between">
{{--                        <a href="{{route('video',$co->id)}}">--}}

                    @foreach($coursesStudent->Course as $co)
                            <div class="card col-sm-3 bg-light mr-5 ml-5 p-2 " style="height: 300px">
                                <a href="{{route('showCourse',$co->id)}}" class=" mt-1 btn btn-success" style="position: absolute;margin-right:-20px "><i class="fa fa-arrow-circle-left"></i></a>

                                <img src="https://ezbrt4adg6k.exactdn.com/wp-content/uploads/2021/04/online-3412498_1920.jpg" width="100%" height="150px">

                                <h5 class="text-center mt-4" style="text-decoration: none;" >{{__('ADMIN.INFORMATION TECHNOLOGY INCUBATOR')}}
                                    <p class="mt-2">أسم الكورس : {{$co->$Name}}</p>
                                </h5>

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
