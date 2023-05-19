<?php
$Name = 'name_' . app()->currentLocale();
?>
@extends('admin_dashboard.layouts.master')

@section('title',__('admin.الكورس'))

@section('name-header')

@section('content')

    <!-- /row -->
    <div class="row mt-3">
        <div class="col-xl-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    @if(isset($attendances))
                        <div class="row justify-content-center">
                            <div class="card col-xl-4 col-lg-6 col-md-12 col-xm-12 mr-2 bg-danger ">
                                <div class="card-body d-flex text-center align-items-center">
                                        <p class="text-white card-title col-sm-10">غياب</p>

                                    <div class="card-title col-sm-2 bg-white">
                                        {{$present}}
                                    </div>
                                </div>

                            </div>

                            <div class="card col-xl-4 col-lg-6 col-md-12 col-xm-12 mr-2 bg-success ">
                                <div class="card-body d-flex text-center align-items-center">
                                    <p class="text-white card-title col-sm-10">حضور</p>

                                    <div class="card-title col-sm-2 bg-white">
                                        {{$absent}}
                                    </div>
                                </div>

                            </div>

                        </div>
                    @endif

                        <div class="table-responsive container">
                    <form class="row justify-content-center"  method="get">
                        <input type="text" hidden value="{{$id}}" name="course_id">
                        <input type="search" class="form-control col-sm-8" name="search" value="{{request()->search}}" placeholder="search :">
                        <button type="submit" class="btn btn-info col-sm-2"><i class="fa fa-search"></i></button>
                    </form>


                    @if(isset($attendances))
                            <table class="table table-bordered mt-5">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>اليوم</th>
                                    <th>التاريخ</th>
                                    <th>Email</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($attendances as $attendance)
                                <tr>
                                    <td>{{$i=1}}</td>
                                    <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $attendance->attendence_date)->englishDayOfWeek}}</td>
                                    <td>{{$attendance->attendence_date}}</td>
                                    <td class="text-center">
                                        @if($attendance->status==0)
                                              <p class="btn btn-danger  text-white">غائب</p>
                                        @else
                                            <p class="text-success">حاضر</p>

                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>

                        @else
                                <div class="text-center m-5 ">
                                    <h3>No attendances found</h3>
                                </div>
                        @endif
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

