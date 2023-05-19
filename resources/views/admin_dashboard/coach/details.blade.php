<?php
$Name = 'name_' . app()->currentLocale();
?>
@extends('admin_dashboard.layouts.master')

@section('title','تفاصيل الطالب')
@section('name-header','تفاصيل الطالب')

@section('content')

    <!-- /row -->
    <div class="row mt-3">
        <div class="col-xl-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <!-- row opened -->
                    <div class="row row-sm">
                        <div class="col-sm-12  grid-margin">
                            <div class="card">
                                <div class="card-header pb-0">
                                    <div class="d-flex justify-content-between">
                                        <h4 class="card-title mg-b-0">مرحبا المدرب</h4>
                                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                                    </div>
                                </div>
                                <div class="card-body">

                                    <div class="panel panel-primary tabs-style-2 mt-5">
                                        <div class=" tab-menu-heading">
                                            <div class="tabs-menu1">
                                                <!-- Tabs -->
                                                <ul class="nav panel-tabs main-nav-line">
                                                    <li><a href="#tab4" class="nav-link active" data-toggle="tab">معلومات المدرب</a></li>

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
                                                                    <td class="bg-primary text-white">اسم الطالب</td>
                                                                    <td>{{$student->$Name}}</td>
                                                                    <td class="bg-primary text-white">رقم الجامعي</td>
                                                                    <td>{{$student->n_university}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="bg-primary text-white">الايميل</td>
                                                                    <td>{{$student->email }}</td>
                                                                    <td class="bg-primary text-white">رقم الجوال</td>
                                                                    <td>{{$student->phone}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="bg-primary text-white">التخصص</td>
                                                                    <td>{{$student->specialty}}</td>
                                                                    <td class="bg-primary text-white">الجنس</td>
                                                                    <td>{{$student->gender}}</td>

                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
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
    <!-- main-content closed -->
@endsection

