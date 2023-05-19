@extends('admin_dashboard.layouts.master')

@section('title',__('admin.عرض الاقسام'))
@section('name-header',__('admin.عرض الاقسام'))

<?php
$name='name_'.app()->currentLocale();
$student='student_'.app()->currentLocale();
?>

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
            @if(session('add'))
                <div class="alert alert-success">
                    <strong>{{session('add')}}</strong>
                </div>
            @endif
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <main> <a href="{{route('project.create')}}" class="btn btn-primary text-white">أضافة مشروع</a></main>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>

                </div>
                <div class="card-body">


                    <div class="table-responsive">

                        <table class="table text-md-nowrap" id="example1">
                            <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">#</th>
                                <th class="wd-15p border-bottom-0">صورة</th>
                                <th class="wd-20p border-bottom-0">أسم المشروع</th>
                                <th class="wd-20p border-bottom-0">الطلاب المشاركين</th>
                                <th class="wd-20p border-bottom-0">اللغات  المستخدمة</th>
                                <th class="wd-20p border-bottom-0">خصائص</th>
                                <th class="wd-15p border-bottom-0">{{__('admin.العمليات')}}</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php $i=0 ?>
                            @foreach($projects as $project)
                                <tr>
                                    <td>{{$i ++}}</td>
                                    <td>
                                        <img  src="{{asset('assets_admin_dashboard/img_project/'.$project->name_en.'/'.$project->imge)}}" width="50px" height="50px" data-toggle="modal" data-target="#Zoom{{$project->id}}"></td>
                                    <td>{{$project->$name}}</td>
                                    <td>{{$project->$student}}</td>
                                    <td>{{$project->progr_lang}}</td>
                                    <td class="d-flex">
                                        <a href="{{$project->url}}" class="btn-sm btn-info m-1"><i class="fa fa-eye"></i></a>
                                        @if($project->attachment)
                                        <a class="btn-sm btn-success m-1" href="{{asset('assets_admin_dashboard/img_project/'.$project->name_en.'/'.$project->attachment)}}"><i class="fa fa-download"></i></a>
                                        @endif
                                    </td>

                                    <td>
                                        <div class="dropdown">
                                            <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-info"
                                                    data-toggle="dropdown" type="button"><i class="fas fa-caret-down ml-1"></i></button>
                                            <div class="dropdown-menu tx-13">

                                                    <a class="dropdown-item"  data-effect="effect-scale" data-toggle="modal" href="#delete{{$project->id}}">{{__('admin.حذف')}}</a>

                                                <div class="dropdown-divider"></div>

                                            </div>
                                        </div>

                                    </td>
                                </tr>

                                <!-- delete modal -->
                                <div class="modal" id="delete{{$project->id}}">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content modal-content-demo">
                                            <div class="modal-header">
                                                <h6 class="modal-title"> {{__('admin.Delete User')}}</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <label>{{__('admin.Are You Sure To Delete a User?')}}</label>
                                                <input  disabled type="text" class="form-control" name="section_name" value="{{$project->$name}}" required>
                                            </div>
                                            <div class="modal-footer">
                                                <form action="{{route('project.destroy',$project->id)}}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn ripple btn-danger" type="submit">{{__('admin.حذف')}}</button>
                                                </form>
                                                <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">{{__('admin.الغاء')}}</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- End delet modal -->



                                <!-- Zoom in Imge -->
                                <div class="modal fade" id="Zoom{{$project->id}}">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                <img  src="{{asset('assets_admin_dashboard/img_project/'.$project->name_en.'/'.$project->imge)}}" width="100%" height="70%">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                    </tbody>

                    </table>


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

