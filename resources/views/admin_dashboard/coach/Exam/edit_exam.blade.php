
<?php
$Name = 'name_' . app()->currentLocale();
?>
@extends('admin_dashboard.layouts.master')

@section('title','add')

@section('name-header','add')

@section('content')

    <!-- /row -->
    <div class="row mt-3">
        <div class="col-xl-12 col-md-12">
            <div class="card">
                <div class="card-body">

                    <form action="{{route('update_Exam',$exam->id)}}" method="post">
                        @csrf
                        @method('put')
                        <div class="col-sm-12 mt-3">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="switch1" name="status" {{$exam->status==1?'checked':''}}  value="1">
                                <label class="custom-control-label" for="switch1">Status</label>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-4">
                                <label>أسم الأختبار بلعربية</label>
                                <input type="text" class="form-control " name="name_ar" value="{{$exam->name_ar}}" >

                            </div>

                            <div class="col-sm-4">
                                <label>أسم الأختبار بلانجليزية</label>
                                <input type="text" class="form-control " name="name_en" value="{{$exam->name_en}}" >

                            </div>


                            <div class="col-sm-4">
                                <label>عدد الاسئلة</label>
                                <input type="text" class="form-control " name="count_questions" value="{{$exam->count_questions}}" >

                            </div>

                            <div class="col-sm-4">
                                <label>درجة الاجابة الصحيحة </label>
                                <input type="text" class="form-control " name="correct" value="{{$exam->correct}}" >

                            </div>

                            <div class="col-sm-4">
                                <label>درجة الاجابة الخاطئة </label>
                                <input type="text" class="form-control " name="wrong" value="{{$exam->wrong}}" >

                            </div>

                            <div class="col-sm-4">
                                <label>وقت الاختبار</label>
                                <input type="time" class="form-control " name="time" value="{{$exam->time}}" >

                            </div>

                            <div class="col-sm-4">
                                <label>ملاحضة لطالب</label>
                                <input type="text" class="form-control " name="note" value="{{$exam->note}}" >

                            </div>

                        </div>
                        <button type="submit" class="btn btn-primary-gradient mt-4 w-100">تعديل</button>
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
