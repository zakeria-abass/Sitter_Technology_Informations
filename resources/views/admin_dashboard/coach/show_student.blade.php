<?php
$Name='name_'.app()->currentLocale();
?>

@extends('admin_dashboard.layouts.master')

@section('title',__('admin.الدورات'))
@section('name-header',__('admin.الدورات'))

@section('css')
    <!-- Internal Data table css -->
    <link href="{{asset('assets_admin_dashboard/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets_admin_dashboard/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets_admin_dashboard/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets_admin_dashboard/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets_admin_dashboard/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets_admin_dashboard/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection

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
                        <div class="alert alert-info">
                            <strong>{{session('add')}}</strong>
                        </div>
                    @endif


                    <div class="table-responsive">

                        <form action="{{route('store')}}" method="post">
                            @csrf
                        <table class="table text-md-nowrap" id="example1">
                            <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">#</th>
                                <th class="wd-15p border-bottom-0">رقم جامعي</th>
                                <th class="wd-20p border-bottom-0">أسم الطالب</th>
                                <th class="wd-20p border-bottom-0">ايميل طالب</th>
                                <th class="wd-20p border-bottom-0">سجل الحضور</th>

                            </tr>
                            </thead>
                            <tbody>

                            <?php $i=1 ?>


                                @foreach($Studends->Student as $Studend)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td><a href="{{route('coach.edit',$Studend->id)}}">{{$Studend->n_university}}</a></td>
                                        <td>{{$Studend->$Name}}</td>
                                        <td>{{$Studend->email}}</td>


                                            <td>
                                                @if(auth()->user()->role->abilites()->where('code','coach')->exists())


                                                    <div class="w-5/12 text-sm text-right py-2 px-4 flex items-center justify-end">
                                                        <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                                                            <input name="attendences[{{ $Studend->id }}]"  class="leading-tight" type="radio" value="present">
                                                            <span class="text-sm">Present</span>
                                                        </label>
                                                        <label class="ml-4 block text-gray-500 font-semibold">
                                                            <input name="attendences[{{ $Studend->id }}]"    class="leading-tight" type="radio" value="absent">
                                                            <span class="text-sm">Absent</span>
                                                        </label>
                                                        <input type="text" hidden name="course" value="{{$Studends->id}}">

                                                    </div>

                                                @endif

                                        </td>


                                    </tr>

                                @endforeach


                    </tbody>

                    </table>

                            <button type="submit">hh</button>
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

    <!-- Internal Data tables -->
    <script src="{{asset('assets_admin_dashboard/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets_admin_dashboard/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
    <script src="{{asset('assets_admin_dashboard/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('assets_admin_dashboard/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
    <script src="{{asset('assets_admin_dashboard/plugins/datatable/js/jquery.dataTables.js')}}"></script>
    <script src="{{asset('assets_admin_dashboard/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
    <script src="{{asset('assets_admin_dashboard/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets_admin_dashboard/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets_admin_dashboard/plugins/datatable/js/jszip.min.js')}}"></script>
    <script src="{{asset('assets_admin_dashboard/plugins/datatable/js/pdfmake.min.js')}}"></script>
    <script src="{{asset('assets_admin_dashboard/plugins/datatable/js/vfs_fonts.js')}}"></script>
    <script src="{{asset('assets_admin_dashboard/plugins/datatable/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('assets_admin_dashboard/plugins/datatable/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('assets_admin_dashboard/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
    <script src="{{asset('assets_admin_dashboard/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('assets_admin_dashboard/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
    <!--Internal  Datatable js -->
    <script src="{{asset('assets_admin_dashboard/js/table-data.js')}}"></script>



@endsection

