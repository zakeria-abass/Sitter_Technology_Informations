<?php
$Name = 'name_' . app()->currentLocale();
?>
@extends('admin_dashboard.layouts.master')

@section('title','show answer')

@section('name-header','show answer')


@section('content')

    <!-- /row -->
    <div class="row mt-3">
        <div class="col-xl-12 col-md-12 container  justify-content-lg-between">
            @php $i=1 @endphp



                    <div class="card mt-4 col-sm-12">
                        <div class="card-body justify-content-lg-between d-flex">

                            <main>اختبار لكورس  :  {{$Answer->course->$Name}} </main>
                            <main>{{$Answer->course->$Name}}</main>
                            <main>
                                {{$Answer->total}}<br>
                                {{$Answer->time}}

                            </main>

                        </div>
                    </div>


                <div class="row ">
                <div class="col-sm-8">
                    @foreach($Exams as $question)

                        <div class="card mt-4 col-sm-12">
                            <div class="card-body ">
                                <main class="d-flex justify-content-lg-between">
                                    <h3> س {{$i++}}  :  {{$question->question}}</h3>
                                    <h3> علامات {{$question->exam->correct}}</h3>
                                </main>

                                <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                                    <input   name="attendences[{{ $question->id }}]"  class="leading-tight" type="radio" value="present">
                                    <span  class="text-sm">{{$question->a}}</span>
                                </label>
                                <br>
                                <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                                    <input   name="attendences[{{ $question->id }}]"  class="leading-tight" type="radio" value="present">
                                    <span  class="text-sm">{{$question->b}}</span>
                                </label>
                                <br>
                                <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                                    <input   name="attendences[{{ $question->id }}]"  class="leading-tight" type="radio" value="present">
                                    <span  class="text-sm">{{$question->c}}</span>
                                </label>
                                <br>
                                <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                                    <input     name="attendences[{{ $question->id }}]"  class="leading-tight" type="radio" value="present">
                                    <span class="text-sm">{{$question->d}}</span>
                                </label>


                            </div>

                        </div>




                    @endforeach
                </div>

                    <div class="card mt-4 col-sm-3 mr-5">

                        <div class="container p-5 ">
                            <main class="row justify-content-lg-between">
                                @for($h=0 ;$h<$Answer->count_questions;$h++)
                                    <div class="col-sm-2" style="border: 1px solid blue">
                                        {{$h+1}}
                                    </div>
                                @endfor
                            </main>

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
