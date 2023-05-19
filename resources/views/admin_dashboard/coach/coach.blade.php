<?php
$Name = 'name_' . app()->currentLocale();
?>
@extends('admin_dashboard.layouts.master')

@section('title',__('ADMIN.Gate Coach'))
@section('name-header',__('ADMIN.Page Coach'))

@section('name-header',__('ADMIN.Page Coach'))

@section('content')

    <!-- /row -->
    <div class="row mt-3">
        <div class="col-xl-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    @if(session('add'))
                        <div class="alert alert-success">
                            <strong>{{session('add')}}</strong>
                        </div>
                    @endif

                    <!-- row opened -->
                    <div class="row row-sm">
                        <div class="col-sm-12  grid-margin">
                            <div class="card">
                                <div class="card-header pb-0">
                                    <div class="d-flex justify-content-between">
                                        <h4 class="card-title mg-b-0">{{__('admin.Welcome')." : ".auth()->user()->$Name}}</h4>
                                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                                    </div>
                                </div>
                                <div class="card-body">

                                    <div class="panel panel-primary tabs-style-2 mt-5">
                                        <div class=" tab-menu-heading">
                                            <div class="tabs-menu1">
                                                <!-- Tabs -->
                                                <ul class="nav panel-tabs main-nav-line">
                                                    <li><a href="#tab4" class="nav-link active" data-toggle="tab">{{__('admin.Coach Info')}}</a></li>
                                                    <li><a href="#tab5" class="nav-link" data-toggle="tab">{{__('admin.الدورات')}}</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="panel-body tabs-menu-body main-content-body-right border">
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="tab4">
                                                    <div class="card-body">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered mg-b-0 text-md-nowrap">
                                                                <tbody>
                                                                <tr>
                                                                    <td class="bg-primary text-white">{{__('admin.Name Coach')}}</td>
                                                                    <td>{{auth()->user()->$Name}}</td>
                                                                    <td class="bg-primary text-white">{{__('admin.Email')}}</td>
                                                                    <td>{{auth()->user()->email}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="bg-primary text-white">{{__('admin.الدورات')}}</td>
                                                                    <td>{{auth()->user()->cours->$Name}}</td>
                                                                    <td class="bg-primary text-white">عدد الطلاب
                                                                        المسجلين
                                                                    </td>
                                                                    <td>
                                                                        <a href="{{route('lecture.index')}}">عرض جدول المحاضرات</a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="bg-primary text-white">تفاصيل الدورات</td>
                                                                    <td><a href="#" data-toggle="modal" data-target="#myModal">اختر الدورة</a></td>

                                                                </tr>

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="tab-pane" id="tab5">
                                                    <div class="card-body">
                                                        <div class="row">

                                                            @foreach($CoursesCoach as $course)
                                                                <div
                                                                    class="card col-xl-4 col-lg-6 col-md-12 col-xm-12 mr-2 bg-primary ">
                                                                    <div
                                                                        class="card-body d-flex text-center align-items-center">
                                                                        <a href="{{route('index.Videos',$course->id)}}"
                                                                           class="card-title col-sm-10">
                                                                            <p class="text-white">{{$course->$Name}}</p>
                                                                        </a>
                                                                        <div class="card-title col-sm-2 bg-white">
                                                                            {{$course->Student->count()}}
                                                                        </div>
                                                                    </div>

                                                                </div>


                                                            @endforeach


                                                        </div>
                                                        {{$CoursesCoach->appends($_GET)->links()}}

                                                    </div>

                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- COL END -->
                        </div>
                        <!-- row closed -->


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


    <!-- The Modal -->
    <div class="modal" id="myModal" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Modal Heading</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    /****//*

                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>










    <script>
        // var select = document.getElementById("mySelect");
        // select.addEventListener("change", function() {
        //     window.location = select.value;
        // });

        // document.getElementById("search").addEventListener("input", function() {
        //     var options = select.options;
        //     for (var i = 0; i < options.length; i++) {
        //         if (options[i].text.toLowerCase().includes(this.value.toLowerCase())) {
        //             options[i].style.display = "block";
        //         } else {
        //             options[i].style.display = "none";
        //         }
        //     }
        // });

    </script>
@endsection


