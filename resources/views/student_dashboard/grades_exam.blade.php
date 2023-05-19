@extends('student_dashboard.layouts.master')

<?php
$Name='name_'.app()->currentLocale();

?>


@section('title','Grades')

@section('css')


    @stop



@section('content')


    <!-- /row -->
    <div class="row mt-3">
        <div class="col-xl-12">
            <div class="card">
                <div class="container">
                    <div class="card-body ">
                          <h3><i class="fa fa-file text-warning"></i> كشف درجات </h3>
                    </div>
                </div>
            </div>


        </div>


        <div class="col-xl-12 mt-5">
            <div class="card">
                <div class="container">
                    <div class="card-body ">
                        <div class="table-responsive mt-5" style="font-size:1.2em ">
                            <table class="table text-md-nowrap " id="example1">
                                <thead>
                                <tr >
                                    <th style="font-size:0.9em ">#</th >
                                    <th style="font-size:0.9em ">كورس</th>
                                    <th style="font-size:0.9em ">الاختبار</th>
                                    <th style="font-size:0.9em ">الاجابات الصحيحة</th>
                                    <th style="font-size:0.9em ">الاجابات الخاطئة</th>
                                    <th style="font-size:0.9em ">الدرجة النهاية</th>
                                    <th style="font-size:0.9em ">ملاحضات</th>

                                </tr>
                                </thead>
                                <tbody>

                                <?php
                                $i=1 ;

                                $result=0
                                ?>

                                @foreach($grades as $grade)
                                    <?php
                                    $result =$result+$grade->total;
                                    ?>
                                    <tr>
                                    <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$grade->course->$Name}}</td>
                                    <td>{{$grade->exam->$Name}}</td>
                                    <td>{{$grade->correct}}</td>
                                    <td>{{$grade->wrong}}</td>
                                    <td>{{ $grade->total."  / ".$grade->exam->total}}</td>
                                    <td>
                                        @if($grade->exam->total-$grade->total <= $grade->exam->total/2)
                                            <span class="text-success">ناجح</span>
                                        @else
                                            <span class="text-danger">راسب</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach

                                <tr>
                                   <td colspan="5" ></td>
                                   <td colspan="2" class="bg-light ">المجموع التراكمي :  {{$result}}</td>
                                </tr>

                                </tbody>

                            </table>


                        </div>
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
