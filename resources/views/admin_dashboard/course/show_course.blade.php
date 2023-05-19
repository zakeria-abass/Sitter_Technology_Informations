<?php
$Name='name_'.app()->currentLocale();
$NameCourse='name_'.app()->currentLocale();
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
                    <table class="table text-md-nowrap" id="example1">
                        <thead>
                        <tr>
                            <th class="wd-15p border-bottom-0">#</th>
                            <th class="wd-15p border-bottom-0">{{__('admin.الدورات')}}</th>
                            <th class="wd-20p border-bottom-0">{{__('admin.رايط التسجيل')}}</th>
                            <th class="wd-20p border-bottom-0">{{__('admin.عدد الطلاب المسجلين')}}</th>
                            <th class="wd-20p border-bottom-0">{{__('admin.أسم القسم')}}</th>
                            <th class="wd-20p border-bottom-0">{{__('admin.للانتهاء التسجيل')}}</th>
                            <th class="wd-15p border-bottom-0">{{__('admin.العمليات')}}</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php $i=1 ?>
                        @foreach($courses as $course)
                            <tr>
                                <td>{{$i ++}}</td>

                                <td><a href="{{route('Show.Videos',$course->id)}}">{{$course->$NameCourse}}</a></td>

                                <td>
                                    <a class="text-danger" href="{{$course->url_course}}">{{__('admin.تسجيل')}}</a>
                                    <button type="button" class="btn text-primary js-tooltip js-copy"  data-toggle="tooltip" data-placement="bottom" data-copy="{{$course->url_course}}" title="نسخ الرابط">
                                        <i class="fa fa-clone"></i>
                                    </button>
                                </td>

                                <td >
                                    @php $count=$course->Student->count() @endphp
                                        <a  href="{{route('coach.show',$course->id)}}" class="{{$count <=0?'text-danger':'text-success'}}">{{$count}}</a>
                                </td>

                                <td>{{$course->section?$course->section->$Name:'محدوف'}}</td>
                                <td>{{$course->data_expiry > date('Y-m-d')?__('admin.فعال') : __('admin.تم انتهاء')}}</td>

                                <td class="text-center">
                                    <div class="dropdown">
                                        <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-info"
                                                data-toggle="dropdown" type="button"><i class="fas fa-caret-down ml-1"></i></button>
                                        <div class="dropdown-menu tx-13">

                                        @if(auth()->user()->role->abilites()->where('code','delet_courses')->exists())

                                            <a class="dropdown-item"  data-effect="effect-scale" data-toggle="modal" href="#delete{{$course->id}}">{{__('admin.حذف')}}</a>
                                            @endif

                                            @if(auth()->user()->role->abilites()->where('code','edit_courses')->exists())
                                                <div class="dropdown-divider"></div>
                                                 <a class="dropdown-item"   href="{{route('courses.edit',$course->id)}}">{{__('admin.تعديل')}}</a>
                                            @endif

                                                @if(auth()->user()->role->abilites()->where('code','print_exsel_student')->exists())
                                                <div class="dropdown-divider"></div>

                                                    <a href="{{route('importStudent',$course->id)}}" class="dropdown-item bg-info text-white">{{__('admin.print excel')}}</a>
                                                @endif
                                        </div>
                                    </div>

                                </td>

                                <!-- delete modal -->
                                <div class="modal" id="delete{{$course->id}}">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content modal-content-demo">
                                            <div class="modal-header">
                                                <h6 class="modal-title">{{__('admin.حذف الدورة')}}</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <label>{{__('admin.هل انتا متأكد من حذف الدورة ؟')}}</label>
                                                <input  disabled type="text" class="form-control" name="section_name" value="{{$course->$Name}}" required>
                                            </div>
                                            <div class="modal-footer">
                                                <form action="{{route('courses.destroy',$course->id)}}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn ripple btn-danger" type="submit">{{__('ADMIN.حذف')}} </button>
                                                </form>
                                                <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">{{__('ADMIN.الغاء')}}</button>
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
    <!-- كود نسخ النص -->
    <script>
           function copyToClipboard(text, el) {
               var copyTest = document.queryCommandSupported("copy");
               var elOriginalText = el.attr("data-original-title");

               if (copyTest === true) {
                   var copyTextArea = document.createElement("textarea");
                   copyTextArea.value = text;
                   document.body.appendChild(copyTextArea);
                   copyTextArea.select();
                   try {
                       var successful = document.execCommand("copy");
                       var msg = successful ? "تم النسخ!" : "Whoops, not copied!";
                       el.attr("data-original-title", msg).tooltip("show");
                   } catch (err) {
                       console.log("Oops, unable to copy");
                   }
                   document.body.removeChild(copyTextArea);
                   el.attr("data-original-title", elOriginalText);
               } else {
                   // Fallback if browser doesn't support .execCommand('copy')
                   window.prompt("Copy to clipboard: Ctrl+C or Command+C, Enter", text);
               }
           }

           $(document).ready(function () {
               // Initialize
               // ---------------------------------------------------------------------

               // Tooltips
               // Requires Bootstrap 3 for functionality
               $(".js-tooltip").tooltip();

               // Copy to clipboard
               // Grab any text in the attribute 'data-copy' and pass it to the
               // copy function
               $(".js-copy").click(function () {
                   var text = $(this).attr("data-copy");
                   var el = $(this);
                   copyToClipboard(text, el);
               });
           });
       </script>

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

