<?php
$Name='name_'.app()->currentLocale();
?>
@extends('student_dashboard.layouts.master')

@section('title',__('admin.Course Schedule'))

@section('content')
    <div class="row row-sm">


        <div class="col-12  grid-margin">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0"></h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive border-top userlist-table" style="font-size:1.4em ">

                        <table class="table text-md-nowrap" id="example1">
                            <thead>
                            <tr>
                                <th style="font-size:0.7em">{{__('admin.Today')}}</th>
                                <th style="font-size:0.7em">{{__('admin.Time')}}</th>
                                <th style="font-size:0.7em">{{__('admin.Presenter Course')}}</th>
                                <th style="font-size:0.7em">{{__('admin.Material')}}</th>
                                <th style="font-size:0.7em">{{__('admin.Hall')}}</th>
                                <th style="font-size:0.7em">{{__('admin.Last updated')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($TimelectureStudent as $lectures)
                            @foreach($lectures->lecture as $lecture)

                            <tr  class="{{\Carbon\Carbon::now()->dayName === __('admin.'.$lecture->today)?'bg-danger  text-white':'' }} ">

                                <td>{{__('admin.'.$lecture->today)}}</td>
                                <td>{{$lecture->time}}</td>
                                <td >{{$lectures->user->$Name}}</td>
                                <td>{{$lectures->$Name}}</td>
                                <td>{{__('admin.'.$lecture->place)}}</td>
                                <td>{{$lecture->updated_at->diffForHumans()}}</td>
                            </tr>
                            @endforeach
                            @endforeach
                            </tbody>

                        </table>

                    </div>
                </div>
            </div>
        </div><!-- COL END -->


    </div>
</div>
    </div>
</div>

@stop
