<?php
$Name = 'name_' . app()->currentLocale();
?>
@extends('admin_dashboard.layouts.master')

@section('title','show')

@section('name-header','show')

@section('content')

    <!-- /row -->
    <div class="row mt-3">
        <div class="col-xl-12 col-md-12">
            <div class="card">
                <div class="card-body">

                    <a href="{{route('create_Exam',$id)}}" class="btn btn-info"> أَضافة اختبار</a>
                    <div class="table-responsive mt-5">
                        <table class="table text-md-nowrap " id="example1">
                            <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">#</th>
                                <th class="wd-15p border-bottom-0">أسم الاختبار</th>
                                <th class="wd-20p border-bottom-0">عدد الاسئلة المسموح بها</th>
                                <th class="wd-20p border-bottom-0">وضع أسئلة</th>
                                <th class="wd-20p border-bottom-0">الدرجة النهاية</th>
                                <th class="wd-20p border-bottom-0">وقت الاختبار</th>
                                <th class="wd-20p border-bottom-0">حالة الاختبار</th>
                                <th class="wd-20p border-bottom-0">العمليات</th>

                            </tr>
                            </thead>
                            <tbody>

                            <?php $i=1 ?>

                            @foreach($exams as $exam)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$exam->$Name}}</td>
                                    <td>{{$exam->count_questions}}</td>
                                    <td>
                                        @if(count($exam->question) <=0)
                                            <a href="{{route('create_question',$exam->id)}}" class="btn btn-primary"><i class="fa fa-save"></i></a>
                                        @else
                                            <h5>لقد تم وضع أسألة للاختبار</h5>
                                        @endif
                                    </td>
                                    <td>{{$exam->total}}</td>
                                    <td>{{$exam->time}}</td>
                                    <td>
                                        @if($exam->status == 1)
                                              <span class="text-success"> فعال</span>
                                        @else
                                            <span class="text-danger">غير فعال</span>

                                        @endif
                                    </td>

                                    <td>


                                        <a href="#" data-toggle="modal" data-target="#myModal" class="btn btn-primary"><i class="fa fa-eye"></i></a>

                                    </td>
                                </tr>

                            @endforeach


                            </tbody>

                        </table>


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



{{--    <!-- The Modal -->--}}
{{--    <div class="modal" id="myModal" data-backdrop="static">--}}
{{--        <div class="modal-dialog">--}}
{{--            <div class="modal-content">--}}

{{--                <!-- Modal Header -->--}}
{{--                <div class="modal-header">--}}
{{--                    <h4 class="modal-title">Modal Heading</h4>--}}
{{--                    <button type="button" class="close" data-dismiss="modal">&times;</button>--}}
{{--                </div>--}}

{{--                <!-- Modal body -->--}}
{{--                <div class="modal-body">--}}

{{--                    <div class="row justify-content-center">--}}
{{--                        <a href="{{route('edit_Exam',$exam->id)}}" class="btn btn-primary  col-sm-5 m-2"><i class="fa fa-edit"></i> الاختبار</a>--}}

{{--                        <form method="post" action="{{route('destroy_answer',$exam->id)}}" class="col-sm-5 m-2">--}}
{{--                            @csrf--}}
{{--                            @method('delete')--}}
{{--                            <button type="submit" class="btn btn-danger col-sm-12"><i class="fa fa-trash"></i>الاختبار</button>--}}
{{--                        </form>--}}
{{--                    </div>--}}

{{--                    <hr>--}}
{{--                    <div class="row justify-content-center">--}}
{{--                        <a href="{{route('edit_answer',$exam->id)}}" class="btn btn-primary col-sm-5 m-2"><i class="fa fa-edit"></i> إجابات</a>--}}
{{--                        <a href="{{route('show_answer',$exam->id)}}" class="btn btn-success  col-sm-5 m-2"><i class="fa fa-eye"></i> إجابات</a>--}}
{{--                    </div>--}}

{{--                </div>--}}

{{--                <!-- Modal footer -->--}}
{{--                <div class="modal-footer">--}}
{{--                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}



@endsection
