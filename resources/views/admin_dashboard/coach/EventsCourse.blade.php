<?php
$Name = 'name_' . app()->currentLocale();
?>
@extends('admin_dashboard.layouts.master')

@section('title',__('admin.الكورس')." ".$NameCourse->$Name)

@section('name-header',$NameCourse->$Name)

@section('content')

    <!-- /row -->
    <div class="row mt-3">
        <div class="col-xl-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class=" p-3 bg-light row">
                        <a class="btn btn-info m-1 col-sm-4" href="{{route('coach.show',$NameCourse->id)}}">{{__('admin.عرض الطلاب')}}</a>
                        <a class="btn btn-warning m-1 col-sm-4" href="{{route('index_Attendance',$NameCourse->id)}}">كشف الحضور و الغياب </a>
                        <a href="{{route('importStudent',$NameCourse->id)}}" class="btn btn-success  m-1 col-sm-3">{{__('admin.print excel')}}</a>
                        <a href="{{route('index_Exam',$NameCourse->id)}}" class="btn btn-success  m-1 col-sm-3">أضافة أختبار</a>
                    </div>

                    <div class="card mt-4 p-3 bg-light">
                        <h3 class="card-text text-center ">{{__('admin.Add videos')}}</h3>
                        <h3 class="card-text text-center text-danger">URL</h3>

                        <form action="{{route('Store.Videos',$NameCourse->id)}}" method="post">
                            @csrf
                            <div id="inputs" class="row">

                                <input type="text" class="form-control col-6 mt-3" name="src[]" placeholder="https://www.youtube.com/embed/wwww">

                            </div>

                            <div class="mt-5  ">

                                <button class="btn btn-warning" type="submit">{{__('admin.Save')}}</button>
                                <a href="{{route('Show.Videos',$NameCourse->id)}}" class="btn btn-primary" >{{__('ADMIN.Show videos')}}</a>
                                <button class="btn btn-success" onclick="addInput()" type="button">{{__('ADMIN.Add input')}}</button>
                                <button class="btn btn-danger" onclick="removeInput()" type="button">{{__('ADMIN.Remove input')}}</button>
                            </div>
                        </form>
                    </div>

                    <div class="card mt-4 p-3 bg-light" >
                        <h3 class="card-text text-center">{{__('admin.Lecture Time')}}</h3>
                        <form action="{{route('storelecture',$NameCourse->id)}}" method="post">
                            @csrf
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>
                                        <a href="javascript:void(0)"
                                           class="btn btn-success addRow">+</a>
                                    </th>
                                </tr>
                                </thead>

                                <tbody>
                                <tr>
                                    <td>
                                        <label>{{__('admin.Today')}} </label>
                                        <select
                                            class="form-control" name="today[]">
                                            <option value="السبت">{{__('admin.السبت')}}</option>
                                            <option value="الأحد">{{__('admin.الأحد')}}</option>
                                            <option value="الإثنين">{{__('admin.الإثنين')}}</option>
                                            <option value="الثلاثاء">{{__('admin.الثلاثاء')}}</option>
                                            <option value="الأربعاء">{{__('admin.الأربعاء')}}</option>
                                            <option value="الخميس">{{__('admin.الخميس')}}</option>
                                        </select>
                                    </td>

                                    <td>
                                        <label>{{__('admin.Time')}} </label>
                                        <input type="text" class="form-control @error('time') is-invalid @enderror" name="time[]"required value="{{old('time')}}" placeholder="10-8">
                                    </td>

                                    <td>
                                    <th>
                                        <a href="javascript:void(0)" class="btn-sm btn-danger deleteRow">-</a>
                                    </th>
                                    </td>
                                </tr>

                                </tbody>
                            </table>


                            <div class="col-sm-12 mt-3">
                                <button type="submit"
                                        class="btn btn-primary-gradient col-sm-12 font-weight-bold">{{__('admin.أضافة')}}</button>
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
    </div>
    <!-- main-content closed -->



    <script>
        function addInput() {
            var input = document.createElement("input");
             input.setAttribute("type", "text");
            input.setAttribute("name", "src[]");
            input.setAttribute("placeholder", "https://www.youtube.com/embed/wwww");
            input.setAttribute("class", "form-control col-6 mt-3");
            var div = document.getElementById("inputs");
            div.appendChild(input);
        }

        function removeInput() {
            var div = document.getElementById("inputs");
            if (div.childNodes.length > 0) {
                div.removeChild(div.lastChild);
            }
        }

    </script>

@endsection
@section('js')

    <script>

        $('thead').on('click', '.addRow', function () {
            var tr = "<tr>" +
                "<td>" +
                "<label>{{__('admin.Today')}} </label>" +
                "<select class='form-control' name='today[]'>" +
                "<option value='السبت'>{{__('admin.السبت')}}</option>"+
                "<option value='الأحد'>{{__('admin.الأحد')}}</option>"+
                "<option value='الإثنين'>{{__('admin.الإثنين')}}</option>"+
                "<option value='الثلاثاء'>{{__('admin.الثلاثاء')}}</option>"+
                "<option value='الأربعاء'>{{__('admin.الأربعاء')}}</option>"+
                "<option value='الخميس'>{{__('admin.الخميس')}}</option>"+

                "</select>"

                + "</td>" +

                "<td ><label>{{__('admin.Time')}}  </label><input type='text' class='form-control @error('time') is-invalid @enderror' name='time[]' value='{{old('time')}}'placeholder='10-8' required ></td>" +

                "<td><th><a href='javascript:void(0)'' class='btn-sm btn-danger deleteRow'>-</a></th></td>"
                + "</tr>"

            $('tbody').append(tr);


            $('tbody').on('click', '.deleteRow', function () {
                $(this).parent().parent().remove()
            })
        })
    </script>
@stop
