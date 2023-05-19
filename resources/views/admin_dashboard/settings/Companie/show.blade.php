<?php
$Name = 'name_' . app()->currentLocale();
?>
@extends('admin_dashboard.layouts.master')

@section('title',"الشركات الداعمة")
@section('name-header',"الشركات الداعمة")

@section('content')


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

                    @if(session('delete'))
                        <div class="alert alert-danger">
                            <strong>{{session('delete')}}</strong>
                        </div>
                    @endif


                    @if(session('edit'))
                        <div class="alert alert-info">
                            <strong>{{session('edit')}}</strong>
                        </div>
                    @endif

                    @if(session('add'))
                        <div class="alert alert-success">
                            <strong>{{session('add')}}</strong>
                        </div>
                    @endif




                    <div class="table-responsive">
                        <a href="{{route('companie.create')}}" class="btn btn-primary m-2">أضافة</a>
                            <table class="table table-bordered text-center">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>الصور</th>
                                    <th>أسم الشركة</th>
                                    <th>العمليات</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php $i=1 ?>
                                @foreach($companies as $companie)

                                    <tr>
                                        <td>{{$i++}}</td>

                                        <td><img src="{{asset('assets_admin_dashboard/companies/'.$companie->logo)}}" width="50px" height="50px"></td>
                                        <td>{{$companie->$Name}}</td>
                                        <td>

                                            <main  class="d-flex justify-content-center">
                                                <a href="{{route('companie.edit',$companie->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                                <button class="btn btn-danger" data-toggle="modal" data-target="#delete{{$companie->id}}"><i class="fa fa-trash"></i></button>

                                            </main>
                                        </td>
                                    </tr>
                                    <!-- The Modal -->
                                    <div class="modal" id="delete{{$companie->id}}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Modal Heading</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>

                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    <input type="text" class="form-control" disabled value="{{$companie->$Name}}" id="name">
                                                </div>

                                                <!-- Modal footer -->
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                    <form action="{{route('companie.destroy',$companie->id)}}"  method="post" class="mr-2 ml-2">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-success"><i class="fa fa-trash"></i></button>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                @endforeach

                                </tbody>
                            </table>
                </div>
                    {{$companies->appends($_GET)->LINKS()}}
            </div>
        </div>

    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    </div>
    </div>
    <!-- main-content closed -->








@endsection


