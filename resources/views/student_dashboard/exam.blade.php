@extends('student_dashboard.layouts.master2')

<?php
$Name='name_'.app()->currentLocale();

?>


@section('title',$exam->$Name)

@section('content')


    <div class="container  mt-5">

        <!-- /row -->
        <div class="row mt-3">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex justify-content-between">
                            <i class="mdi mdi-dots-horizontal text-gray"></i>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="row ">

                            <div class="col-sm-8">
                                <?php $i=1 ?>
                                <form id="formId" action="{{route('exam_data')}}" method="post">
                                    @csrf

                                    <input type="text" hidden  value="{{$exam->id}}" name="exam_id">
                                    <input type="text" hidden  value="{{$exam->correct}}" name="correct">
                                    <input type="text" hidden  value="{{$exam->course->id}}" name="course">

                                @foreach($Exams as $question)
                                            <div class="card mt-4 col-sm-12 bg-light">
                                                <div class="card-body ">
                                                    <main class="d-flex justify-content-lg-between">
                                                        <h3> س {{$i++}}  :  {{$question->question}}</h3>
                                                        <h3> علامات {{$question->exam->correct}}</h3>
                                                    </main>

                                                    <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                                                        <input   name="attendences[{{ $question->id }}]"   class="leading-tight" type="radio" value="{{$question->a}}">
                                                        <span  class="text-sm">{{$question->a}}</span>
                                                    </label>
                                                    <br>
                                                    <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                                                        <input   name="attendences[{{ $question->id }}]"  class="leading-tight" type="radio" value="{{$question->b}}">
                                                        <span  class="text-sm">{{$question->b}}</span>
                                                    </label>
                                                    <br>
                                                    <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                                                        <input   name="attendences[{{ $question->id }}]"  class="leading-tight" type="radio" value="{{$question->c}}">
                                                        <span  class="text-sm">{{$question->c}}</span>
                                                    </label>
                                                    <br>
                                                    <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                                                        <input     name="attendences[{{ $question->id }}]"  class="leading-tight" type="radio" value="{{$question->d}}">
                                                        <span class="text-sm">{{$question->d}}</span>
                                                    </label>


                                                </div>

                                            </div>




                                        @endforeach

                                        <button type="submit" class="btn btn-primary" id="buttonId">أنهاء الاختبار</button>
                                </form>

                            </div>

                            <div class="card p-3 col-sm-3  mr-5 ml-5 bg-info text-white" style="height: 300px">
                                <h6 class="text-center" style="text-decoration: none;" >{{__('ADMIN.INFORMATION TECHNOLOGY INCUBATOR')}}
                                    <p class="">{{__('main.Al-Azhar University')}}</p>
                                    <p class="">نتمنا لكم كل النجاح و التفوق</p>
                                </h6>

                                <h3 class="mt-2">أختبار :{{$exam->$Name}}</h3>
                                <h3>العلامة النهاية : {{$exam->total}}</h3>
                                <h3>مجموع الاسئلة : {{$exam->count_questions}}</h3>
                                <div id="timer"></div>


                            </div>


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->

    </div>





    <script>

        function countDown(time) {
            var interval = setInterval(function() {
                time--;
                var hours = Math.floor(time / 3600);
                var minutes = Math.floor((time % 3600) / 60);
                var seconds = time % 60;
                document.getElementById("timer").innerHTML = hours + " hours " + minutes + " minutes " + seconds + " seconds";
                if (time <= 0) {
                    clearInterval(interval);

                    var formData = new FormData(document.getElementById("formId"));
                    var data = new XMLHttpRequest();
                    data.open("POST", "{{route('exam_data')}}", true);
                    data.send(formData);
                    window.location.href = "{{route('showCourse',$exam->course->id)}}";


                }
            }, 1000);
        }


        var inputTime = "{{$exam->time}}";
        var timeArray = inputTime.split(":");
        var time = parseInt(timeArray[0]) * 3600 + parseInt(timeArray[1]) * 60;
        countDown(time);

        window.onbeforeunload = function () {
            countDown(time);
        };


        document.addEventListener("contextmenu", function(e){
            e.preventDefault();
        }, false);

    </script>




@endsection
