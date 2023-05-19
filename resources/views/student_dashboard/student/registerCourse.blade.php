<?php
$Name='name_'.app()->currentLocale();
?>
@extends('student_dashboard.layouts.master')

@section('title',__('admin.تسجيل')." ".$course->$Name)




@section('content')


<!-- /row -->
<div class="row mt-3">
    <div class="container">

        <div class="col-xl-12 col-md-12"  >
            <div class="card " style="border-top:5px solid blue">
                <div class="card-body ">
                    <div class="row ">
                        <div class="col-sm-8  ">
                                <h4>{{__('admin.Al-Azhar University, Faculty of Intermediate Studies')}}</h4>
                                <p>{{__('admin.INFORMATION TECHNOLOGY INCUBATOR')}}</p>
                        </div>
                        <div class="col-sm-4 ">
                            <h4>{{__('admin.Field Workshop')."  ".$course->$Name}} </h4>
                            <p>{{__('admin.The Aim of The Workshop Is To Provide Students With Job Skills')}}</p>
                        </div>
                    </div>

                </div>
            </div>
            @if(session('error'))
                <div class="alert alert-danger">
                    <strong>{{session('error')}}</strong>
                </div>
            @endif
        </div>
        <div class="col-xl-12 col-md-12">
            <div class="card" style="border-top:5px solid blue">
                <div class="card-body">

                    <!-- Shopping Cart-->
                    <form action="{{route('register.update',$course->id)}}" method="post">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-sm-6 mt-3">
                                <label>{{__('admin.Name Student :')}}<span class="text-danger">  *</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="أجابتك" value="{{auth()->guard('student')->user()->name_ar}}" disabled>
                                <span class="text-danger">
                            </span>
                            </div>
                            <div class="col-sm-6  mt-3">
                                <label>{{__('admin.Number Collegiate :')}} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('n_university') is-invalid @enderror" name="n_university" placeholder="أجابتك"  value="{{auth()->guard('student')->user()->n_university}}"disabled>
                                <span class="text-danger">
                            </span>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-6 mt-3">
                                <label>{{__('admin.Collegiate Specialty :')}} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('specialty') is-invalid @enderror" name="specialty" placeholder="أجابتك"  value="{{auth()->guard('student')->user()->specialty}}"disabled>
                                <span class="text-danger">
                            </span>
                            </div>
                            <div class="col-sm-6 mt-3">
                                <label>{{__('admin.Phone :')}}<span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="أجابتك" value="{{auth()->guard('student')->user()->phone}}"disabled>
                                <span class="text-danger">
                                @error('phone')
                                    {{$message}}
                                    @enderror
                            </span>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-6 mt-3">
                                <label>{{__('admin.Educational Level :')}}<span class="text-danger">*</span></label><br>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input @error('stage') is-invalid @enderror" id="customRadio" name="stage" value="طالب" {{auth()->guard('student')->user()->stage === 'طالب'?'checked':''}} disabled>
                                    <label class="custom-control-label" for="customRadio">{{__('admin.Student')}}</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input @error('stage') is-invalid @enderror" id="customRadio2" name="stage" value="خريج" {{auth()->guard('student')->user()->stage === 'خريج'?'checked':''}} disabled>
                                    <label class="custom-control-label" for="customRadio2">{{__('admin.Graduate')}}</label>
                                </div>
                                <br>
                            </div>
                            <div class="col-sm-6 mt-3">
                                <label> {{__('admin.Gender :')}} <span class="text-danger">*</span></label><br>
                                <div class="custom-control custom-radio custom-control-inline" >
                                    <input type="radio" class="custom-control-input @error('gender') is-invalid @enderror"  id="customRadio3" name="gender" value="دكر"  {{auth()->guard('student')->user()->gender === 'دكر'?'checked':''}} disabled>
                                    <label class="custom-control-label" for="customRadio3">{{__('admin.Male')}}</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input @error('gender') is-invalid @enderror" id="customRadio4" name="gender" value="انثي" {{auth()->guard('student')->user()->gender === 'انثي'?'checked':''}}  disabled>
                                    <label class="custom-control-label" for="customRadio4">{{__('admin.Female')}}</label>
                                </div>
                                <br>
                            </div>

                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-12 ">
                                <button type="submit" class="btn btn-primary-gradient col-sm-12 font-weight-bold">{{__('admin.تسجيل')}}</button>
                            </div>
                        </div>

                        <div class="col-sm-12 mt-3">
                            <h4 class="text-primary">{{__('admin.Al-Azhar University, Faculty of Intermediate Studies')}}</h4>
                            <h5 class="text-danger">{{__('admin.INFORMATION TECHNOLOGY INCUBATOR')}}</h5>
                            <p>{{__('admin.The information technology')}}</p>
                        </div>

                    </form>
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
@section('js')

@endsection
