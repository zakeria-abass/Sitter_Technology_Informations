<?php
$name='name_'.app()->currentLocale();
?>

@extends('admin_dashboard.layouts.master')

@section('title',__('admin.User'))
@section('name-header',__('admin.User'))

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
                    <div class="d-flex  justify-content-between align-items-center">
                        @if(auth()->user()->role->abilites()->where('code','add_users')->exists())
                            <a href="{{route('user.create')}}" class="btn-sm btn-primary-gradient"> <i class="fa fa-user"></i> {{__('admin.Add User')}}</a>
                        @endif
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                    <a href="{{route('export')}}" class="btn btn-success mt-5 h-6 w-4 "> <i class="fa fa-cloud-download-alt"></i> {{__('admin.Export excel file')}}</a>

                </div>
                <div class="card-body">

                    @if(session('delete'))
                        <div class="alert alert-danger">
                            <strong>{{session('delete')}}</strong>
                        </div>
                    @endif

                    @if(session('add'))
                        <div class="alert alert-success">
                            <strong>{{session('add')}}</strong>
                        </div>
                    @endif
                    @if(session('edit'))
                        <div class="alert alert-info">
                            <strong>{{session('edit')}}</strong>
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example1">
                            <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">#</th>
                                <th class="wd-15p border-bottom-0">{{__('admin.Name User')}}</th>
                                <th class="wd-20p border-bottom-0">{{__('admin.E-mail')}}</th>
                                <th class="wd-15p border-bottom-0">{{__('admin.Roles')}}</th>
                                <th class="wd-15p border-bottom-0">{{__('admin.Operations')}}</th>
                                <th class="wd-15p border-bottom-0">{{__('admin.Operations')}}</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php $i=1 ?>
                            @foreach($users as $user)
                                <tr>
                                    <td class="wd-15p border-bottom-0">{{$i ++}}</td>
                                    <td class="wd-15p border-bottom-0">{{$user->$name}}</td>
                                    <td class="wd-20p border-bottom-0">{{$user->email}}</td>

                                    <td class="wd-20p border-bottom-0  ">
                                        @if(auth()->user()->role->abilites()->where('code','add_role')->exists())
                                            @if($user->role->name)
                                                <p class="w-50 text-center text-white  {{$user->role->name ==="Super Admin"?'bg-success':'bg-info'}}">

                                                    {{$user->role->name}}</p></td>
                                            @else
                                                <a href="{{route('role.show',$user->id)}}" class="btn-sm btn-danger">أضافة صلاحيات</a>
                                            @endif
                                        @endif

                                    <td class="text-center">

                                        @if($user->type==1)
                                            <button class="btn btn-danger" type="button"><i class="fa fa-lock"></i></button>

                                        @else
                                            <div class="dropdown">
                                                <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-info"
                                                        data-toggle="dropdown" type="button"><i class="fas fa-caret-down ml-1"></i></button>
                                                <div class="dropdown-menu tx-13">

                                                    @if(auth()->user()->role->abilites()->where('code','delet_users')->exists())
                                                        <a class="dropdown-item"  data-effect="effect-scale" data-toggle="modal" href="#delete{{$user->id}}">{{__('admin.حذف')}}</a>
                                                    @endif

                                                    <div class="dropdown-divider"></div>

                                                    @if(auth()->user()->role->abilites()->where('code','edit_users')->exists())
                                                        <a class="dropdown-item"  href="{{route('user.edit',$user->id)}}">{{__('admin.تعديل')}}</a>
                                                    @endif
                                                </div>
                                            </div>

                                        @endif
                                    </td>

                                    <td class="wd-20p border-bottom-0">
                                        @if($user->check===1)
                                        <span class='text-success'>متصل</span>
                                        @else
                                        <span class='text-danger'>غير متصل</span>
                                        @endif
                                    </td>

                                </tr>

                                <!-- delete modal -->
                                <div class="modal" id="delete{{$user->id}}">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content modal-content-demo">
                                            <div class="modal-header">
                                                <h6 class="modal-title"> {{__('admin.Delete User')}}</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <label>{{__('admin.Are You Sure To Delete a User?')}}</label>
                                                <input  disabled type="text" class="form-control" name="section_name" value="{{$user->name}}" required>
                                            </div>
                                            <div class="modal-footer">
                                                <form action="{{route('user.destroy',$user->id)}}" method="post">
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

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>        </div>

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

