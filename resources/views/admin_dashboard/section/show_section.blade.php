<?php
$name='name_'.app()->currentLocale();
$about='about_'.app()->currentLocale();
?>

@extends('admin_dashboard.layouts.master')

@section('title',__('admin.عرض الاقسام'))
@section('name-header',__('admin.عرض الاقسام'))

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
                    <div class="alert alert-success">
                        <strong>{{session('add')}}</strong>
                    </div>
                @endif




                <div class="table-responsive">
                    <table class="table text-md-nowrap" id="example1">
                        <thead>
                        <tr>
                            <th class="wd-15p border-bottom-0">#</th>
                            <th class="wd-15p border-bottom-0">{{__('admin.أسم القسم')}}</th>
                            <th class="wd-20p border-bottom-0">{{__('admin.الوصف')}}</th>
                            <th class="wd-20p border-bottom-0">{{__('admin.الكورس')}}</th>
                            <th class="wd-15p border-bottom-0">{{__('admin.العمليات')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i=1
                        ?>

                        @foreach($sections as $section)
                            <tr>
                                <td>{{$i ++}}</td>
                                <td>{{$section->$name}}</td>
                                <td>{{$section->$about}}</td>
                                <td>
                                    @if($section->course)
                                        <p class="text-success">{{$section->course->count('section_id')}}</p>
                                    @else
                                        <p class="text-danger">0</p>
                                    @endif
                                </td>

                                <td class="text-center">
                                    <div class="dropdown">
                                        <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-info"
                                                data-toggle="dropdown" type="button"><i class="fas fa-caret-down ml-1"></i></button>
                                        <div class="dropdown-menu tx-13">
                                            @if(auth()->user()->role->abilites()->where('code','delet_sections')->exists())
                                            <a class="dropdown-item"  data-effect="effect-scale" data-toggle="modal" href="#delete{{$section->id}}">{{__('admin.حذف')}}</a>
                                            @endif

                                            @if(auth()->user()->role->abilites()->where('code','edit_sections')->exists())
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item"  href="{{route('section.edit',$section->id)}}">{{__('admin.تعديل')}}</a>
                                            @endif
                                        </div>
                                    </div>

                                </td>

                                <!-- delete modal -->
                                <div class="modal" id="delete{{$section->id}}">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content modal-content-demo">
                                            <div class="modal-header">
                                                <h6 class="modal-title">{{__('admin.حذف قسم')}} </h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <label>{{__('admin.هل انتا متأكد من حذف قسم ؟')}}</label>
                                                <input  disabled type="text" class="form-control" name="section_name" value="{{$section->$name}}" required>
                                            </div>
                                            <div class="modal-footer">
                                                <form action="{{route('section.destroy',$section->id)}}" method="post">
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

