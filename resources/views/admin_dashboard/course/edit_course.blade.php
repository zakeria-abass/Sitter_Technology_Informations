<?php
$name='name_'.app()->currentLocale();
?>
@extends('admin_dashboard.layouts.master')

@section('title',__('admin.تعديل الكورس'))
@section('name-header',__('admin.تعديل الكورس'))

@section('content')


<!-- /row -->
<div class="row mt-3">
    <div class="col-xl-12 col-md-12 ">
        <div class="card">
            <div class="card-body">

                <!-- Shopping Cart-->
                <form action="{{route('courses.update',$edit->id)}}" method="post">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-sm-4 mt-3">
                            <label>{{__('admin.أسم الدورة انجليزي')}} </label>
                            <input type="text" class="form-control @error('name_en') is-invalid @enderror" name="name_en" value="{{$edit->name_en}}" >
                            <span class="text-danger">
                                @error('name_en')
                                {{'حقل الاسم مطلوب'}}
                                @enderror
                            </span>
                        </div>
                        <div class="col-sm-4 mt-3">
                            <label>{{__('admin.أسم الدورة عربي')}} </label>
                            <input type="text" class="form-control @error('name_ar') is-invalid @enderror" name="name_ar" value="{{$edit->name_ar}}" >
                            <span class="text-danger">
                                @error('name_ar')
                                {{'حقل الاسم مطلوب'}}
                                @enderror
                            </span>
                        </div>

                        <!-----------------------------------presenter------------------------------------->
                        <div class="col-sm-4 mt-3">
                            <label>{{__('admin.مقدم الدورة انجليزي')}}</label>
                            <select class="form-control @error('presenter') is-invalid @enderror" name="presenter" >
                                @foreach($users->where('type',2) as $user)
                                    <option value="{{$user->id}}" {{$edit->user->id == $user->id?'selected':''}} >{{$user->$name}}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">
                                @error('presenter')
                                {{'يرجي اختيار قسم'}}
                                @enderror
                            </span>
                        </div>

                    </div>
                    <div class="row mt-3">
                        <div class="col-sm-6">
                            <label>{{__('admin.للانتهاء التسجيل')}}</label>
                            <input type="date" class="form-control @error('data_expiry') is-invalid @enderror" name="data_expiry"  value="{{$edit->data_expiry}}" >
                            <span class="text-danger">
                                @error('data_expiry')
                                {{'حقل تاريخ انتهاء التسجيل مطلوب'}}
                                @enderror
                            </span>
                            <span class="text-danger">

                               @if(session('data_er'))
                                    {{session('data_er')}}
                                @endif
                            </span>
                        </div>
                        <div class="col-sm-6">
                            <label>{{__('admin.أسم القسم')}} </label>
                            <select class="form-control @error('section') is-invalid @enderror" name="section" >
                                @foreach($sections as $section)
                                    <option value="{{$section->id}}" {{$edit->section->id == $user->id?'selected':''}}>{{$section->$name}}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">
                                @error('section')
                                {{'يرجي اختيار قسم'}}
                                @enderror
                            </span>
                        </div>
                    </div>
                            <div class="col-sm-12 mt-3">
                                <button type="submit" class="btn btn-primary-gradient col-sm-12 font-weight-bold">{{__('admin.تعديل')}} </button>
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

@endsection
