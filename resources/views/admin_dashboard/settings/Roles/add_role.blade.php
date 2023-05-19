<?php
$name='name_'.app()->currentLocale();
?>
@extends('admin_dashboard.layouts.master')

@section('title',)
@section('name-header','عرض القدرات  ')



@section('content')


    <!-- /row -->
    <div class="row mt-3">
        <div class="col-xl-12 col-md-12">
            <div class="card">
                <div class="card-body">

                    <!-- Shopping Cart-->
                    <form action="{{route('role.store')}}" method="post" >
                        @csrf


                        <div class="col-sm-12 text-center">
                            <h2>Name : <span class="text-danger">{{$NameUser->$name}}</span></h2>
                            <input type="text" class="form-control" name="user_id" value="{{$NameUser->id}}" hidden>
                        </div>
                            <div class="row p-5 mt-2">
                                <div class="custom-control custom-checkbox col-sm-12 mb-3">
                                    <input type="checkbox"   class="custom-control-input"   id="checked_all">
                                    <label class="custom-control-label" for="checked_all">{{__('admin.Select All')}}</label>
                                </div>
                                @foreach($abilits as $abilit)

                                    <div class="custom-control custom-checkbox col-sm-3 mt-2">
                                        <input type="checkbox" class="custom-control-input"  name="ability[]" value="{{$abilit->id}}" id="customControlInline{{$abilit->id}}">
                                        <label class="custom-control-label" for="customControlInline{{$abilit->id}}">{{__('admin.'.$abilit->name)}}</label>
                                    </div>
                                @endforeach

                            </div>

                        <div class="col-sm-12 ">
                            <button type="submit" class="btn btn-primary-gradient col-sm-12 font-weight-bold">{{__('admin.أضافة')}}</button>
                        </div>
                </form>
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
    <script>
        $('#checked_all').on('change',function (){
            $('input[type=checkbox]').prop('checked',$(this).prop('checked'));
        })
    </script>
@endsection
