<?php
$name='name_'.app()->currentLocale();
?>
@extends('admin_dashboard.layouts.master')

@section('title',__('admin.Courses dates'))
@section('name-header',__('admin.Courses dates'))

@section('content')


    <!-- /row -->
    <div class="row mt-3">
        <div class="col-xl-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive border-top userlist-table">

                        <div class="table-responsive border-top userlist-table">

                            <table class="table text-md-nowrap" id="example1">
                                <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">{{__('admin.Today')}}</th>
                                    <th class="wd-15p border-bottom-0">{{__('admin.Time')}}</th>
                                    <th class="wd-15p border-bottom-0">{{__('admin.Presenter Course')}}</th>
                                    <th class="wd-15p border-bottom-0">{{__('admin.Material')}}</th>
                                    <th class="wd-20p border-bottom-0">{{__('admin.Hall')}}</th>
                                    <th class="wd-20p border-bottom-0">{{__('admin.Last updated')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($Timelecture as $lectures)
                                @foreach($lectures->lecture as $lecture)

                                    <tr  class="{{\Carbon\Carbon::now()->dayName === __('admin.'.$lecture->today)?'bg-danger  text-white':'' }} ">

                                        <td>{{__('admin.'.$lecture->today)}}</td>
                                        <td>{{$lecture->time}}</td>
                                        <td >{{$lectures->user->$name}}</td>
                                        <td>{{$lectures->$name}}</td>
                                        <td>{{__('admin.'.$lecture->place)}}</td>
                                        <td>{{$lecture->updated_at->diffForHumans()}}</td>
                                    </tr>


                                @endforeach
                                @endforeach
                                </tbody>

                            </table>

                        </div>

                    </div>

                    <!-- Shopping Cart-->
{{--                    <form action="{{route('lecture.store')}}" method="post">--}}
{{--                        @csrf--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-sm-6 mt-2">--}}
{{--                                <label>اليوم </label>--}}
{{--                                <select class="form-control" name="today">--}}
{{--                             <option {{request()->today == "السبت"?'selected':''}} value="السبت">السبت</option>--}}
{{--                             <option {{request()->today == "الاحد"?'selected':''}} value="الاحد">الاحد</option>--}}
{{--                             <option {{request()->today == "الاثنين"?'selected':''}} value="الاثنين">الاثنين</option>--}}
{{--                             <option {{request()->today == "الثلاثاء"?'selected':''}} value="الثلاثاء">الثلاثاء</option>--}}
{{--                             <option {{request()->today == "الاربعاء"?'selected':''}} value="الاربعاء">الاربعاء</option>--}}
{{--                             <option {{request()->today == "الخميس"?'selected':''}} value="الخميس">الخميس</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                            <div class="col-sm-6 mt-2">--}}
{{--                                <label>الموعد </label>--}}
{{--                                <input type="text" class="form-control @error('time') is-invalid @enderror" name="time" value="{{old('time')}}" >--}}
{{--                            </div>--}}


{{--                        </div>--}}


{{--                        <div class="col-sm-12 mt-3">--}}
{{--                            <button type="submit" class="btn btn-primary-gradient col-sm-12 font-weight-bold">{{__('admin.أضافة')}}</button>--}}
{{--                        </div>--}}

{{--                    </form>--}}
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
@section('js')

@endsection
