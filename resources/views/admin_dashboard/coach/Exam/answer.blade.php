<?php
$Name = 'name_' . app()->currentLocale();
?>
@extends('admin_dashboard.layouts.master')

@section('title','answer')

@section('name-header','answer')

@section('content')

    <!-- /row -->
    <div class="row mt-3">
        <div class="col-xl-12 col-md-12">
            <div class="card">
                <div class="card-body" style="border: 2px solid #0a7ffb">

                    <form action="{{route('question_store',$exam->id)}}" method="post">
                        @csrf

                        @for($i=0;$i<$exam->count_questions;$i++)
                            <div class="row mt-3">
                                <h2 class="text-center">السؤوال  {{ $i+1 }}</h2>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control " name="question[]" value="{{old('question')}}" placeholder="">
                                </div>

                                     <div class="col-sm-3 mt-3">
                                         <input type="text" class="form-control " name="a[]" value="{{old('a')}}"  placeholder="a">

                                     </div>

                                     <div class="col-sm-3 mt-3">
                                         <input type="text" class="form-control " name="b[]" value="{{old('b')}}"  placeholder="b">
                                     </div>

                                     <div class="col-sm-3 mt-3">
                                         <input type="text" class="form-control " name="c[]" value="{{old('c')}}"  placeholder="c">
                                     </div>

                                     <div class="col-sm-3 mt-3">
                                         <input type="text" class="form-control " name="d[]" value="{{old('d')}}" placeholder="d" >
                                     </div>
                                     <div class="col-sm-3 mt-3">
                                         <input type="text" class="form-control " name="answer_correct[]" value="{{old('answer_correct')}}"  placeholder="الاجالو الصحيحة">
                                     </div>


                            </div>
                            <hr style="border: 2px solid #0a7ffb">
                        @endfor
                            <button type="submit" class="btn btn-primary-gradient mt-4 w-100">{{__('admin.أضافة')}}</button>
                    </form>



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
