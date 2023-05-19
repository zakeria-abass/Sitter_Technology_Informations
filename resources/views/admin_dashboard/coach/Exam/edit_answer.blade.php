<?php
$Name = 'name_' . app()->currentLocale();
?>
@extends('admin_dashboard.layouts.master')

@section('title','Edit answer')

@section('name-header','Edit answer')

@section('content')

    <!-- /row -->
    <div class="row mt-3">
        <div class="col-xl-12 col-md-12">
            <div class="card">
                <div class="card-body" style="border: 2px solid #0a7ffb">

                    <form action="{{route('update_answer',$exam->id)}}" method="post">
                        @csrf
                        @method('put')
                          <?php $i=1 ?>
                        <input type="text" hidden value="{{$exam->course->id}}" name="course_id">

                    @foreach($exam->question as $question)
                            <input type="text" hidden value="{{$question->id}}" name="question_id[]">
                            <div class="row mt-3">
                                <h2 class="text-center">السؤوال  {{ $i++ }}</h2>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control " name="question[]" value="{{$question->question}}" placeholder="">
                                </div>

                                     <div class="col-sm-3 mt-3">
                                         <input type="text" class="form-control " name="a[]" value="{{$question->a}}"  placeholder="a">

                                     </div>

                                     <div class="col-sm-3 mt-3">
                                         <input type="text" class="form-control " name="b[]" value="{{$question->b}}"  placeholder="b">
                                     </div>

                                     <div class="col-sm-3 mt-3">
                                         <input type="text" class="form-control " name="c[]" value="{{$question->c}}"  placeholder="c">
                                     </div>

                                     <div class="col-sm-3 mt-3">
                                         <input type="text" class="form-control " name="d[]" value="{{$question->d}}" placeholder="d" >
                                     </div>
                                     <div class="col-sm-3 mt-3">
                                         <input type="text" class="form-control " name="answer_correct[]" value="{{$question->answer_correct}}"  placeholder="الاجالو الصحيحة">
                                     </div>


                            </div>
                            <hr style="border: 2px solid #0a7ffb">
                        @endforeach
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
