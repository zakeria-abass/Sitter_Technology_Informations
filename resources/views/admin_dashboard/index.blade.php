@extends('admin_dashboard.layouts.master')
<?php
$NameCourse='name_'.app()->currentLocale();
?>

@section('content')


        <!-- row -->
        <div class="row">
            <div class="container-fluid">
                <!-- breadcrumb -->
                <div class="breadcrumb-header justify-content-between">
                    <div class="left-content">
                        <div>
                            <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">{{__('admin.مرحبًا بكم مرة أخرى!')}}</h2>
                            <p class="mg-b-0">{{__('admin.INFORMATION TECHNOLOGY INCUBATOR')}}</p>
                        </div>
                    </div>
                </div>
                <!-- /breadcrumb -->

                    <!-- row -->
                    <div class="row row-sm">
                        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
                            <div class="card overflow-hidden sales-card bg-primary-gradient">
                                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                                    <div class="">
                                        <h6 class="mb-3 tx-12 text-white">{{__('admin.أجمالي الاقسام')}} </h6>
                                    </div>
                                    <div class="pb-0 mt-0">
                                        <div class="d-flex">
                                            <div class="">
                                                <h4 class="tx-20 font-weight-bold mb-1 text-white">
                                                    {{$data['section']}}</h4>
                                            </div>
                                            <span class="float-right my-auto mr-auto">
											<i class="fas fa-arrow-circle-up text-white"></i>
											<span class="text-white op-7"> 100%</span>
										</span>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{route('section.index')}}" class="btn btn-info">{{__('admin.عرض الاقسام')}} </a>

                                <span id="compositeline" class="pt-1"><canvas width="296" height="30" style="display: inline-block; width: 296px; height: 30px; vertical-align: top;"></canvas></span>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
                            <div class="card overflow-hidden sales-card bg-success-gradient">
                                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                                    <div class="">
                                        <h6 class="mb-3 tx-12 text-white">{{__('admin.اجمالي الكورسات')}}</h6>
                                    </div>
                                    <div class="pb-0 mt-0">
                                        <div class="d-flex">
                                            <div class="">
                                                <h4 class="tx-20 font-weight-bold mb-1 text-white">
                                                    {{$data['course']}}</h4>
                                            </div>
                                            <span class="float-right my-auto mr-auto">
											<i class="fas fa-arrow-circle-up text-white"></i>
											<span class="text-white op-7"> 100%</span>
										</span>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{route('courses.index')}}" class="btn btn-success">{{__('admin.عرض الكورسات')}}</a>

                                <span id="compositeline3" class="pt-1"><canvas width="296" height="30" style="display: inline-block; width: 296px; height: 30px; vertical-align: top;"></canvas></span>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
                            <div class="card overflow-hidden sales-card bg-danger-gradient">
                                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                                    <div class="">
                                        <h6 class="mb-3 tx-12 text-white">{{__('admin.اجمالي الطلاب')}}</h6>
                                    </div>
                                    <div class="pb-0 mt-0">
                                        <div class="d-flex">
                                            <div class="">
                                                <h4 class="tx-20 font-weight-bold mb-1 text-white">
                                                    {{$data['student']}}</h4>
                                            </div>
                                            <span class="float-right my-auto mr-auto">
											<i class="fas fa-arrow-circle-down text-white"></i>
											<span class="text-white op-7"> 100%</span>
										</span>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{route('courses.index')}}" class="btn btn-danger">{{__('admin.عرض الطلاب')}}</a>
                                <span id="compositeline2" class="pt-1"><canvas width="296" height="30" style="display: inline-block; width: 296px; height: 30px; vertical-align: top;"></canvas></span>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
                            <div class="card overflow-hidden sales-card bg-warning-gradient">
                                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                                    <div class="">
                                        <h6 class="mb-3 tx-12 text-white">{{__('admin.اجمالي المستخدمين')}}</h6>
                                    </div>
                                    <div class="pb-0 mt-0">
                                        <div class="d-flex">
                                            <div class="">
                                                <h4 class="tx-20 font-weight-bold mb-1 text-white">
                                                    {{$data['user']}}</h4>
                                            </div>
                                            <span class="float-right my-auto mr-auto">
											<i class="fas fa-arrow-circle-down text-white"></i>
											<span class="text-white op-7"> 100%</span>
										</span>
                                        </div>
                                    </div>

                                </div>
                                <a href="{{route('user.index')}}" class="btn btn-warning ">{{__('admin.عرض المستخدمين')}}</a>

                                <span id="compositeline4" class="pt-1"><canvas width="296" height="30" style="display: inline-block; width: 296px; height: 30px; vertical-align: top;"></canvas></span>
                            </div>
                        </div>
                    </div>
                    <!-- row closed -->

                <!-- row opened -->
                <div class="row row-sm">
                    <div class="col-sm-6  grid-margin">
                        <div class="card">
                            <div class="card-header pb-0">
                                <div class="d-flex justify-content-between">
                                    <h4 class="card-title mg-b-0">{{__('admin.أخر كورسات تمت اضافتهم')}}</h4>
                                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive border-top userlist-table">

                                    <table class="table text-md-nowrap" id="example1">
                                        <thead>
                                        <tr>
                                            <th class="wd-15p border-bottom-0">#</th>
                                            <th class="wd-15p border-bottom-0">{{__('admin.الكورس')}}</th>
                                            <th class="wd-20p border-bottom-0">{{__('admin.رايط التسجيل')}}</th>
                                            <th class="wd-20p border-bottom-0">{{__('admin.التخصص')}}</th>
                                            <th class="wd-20p border-bottom-0"> {{__('admin.للانتهاء التسجيل')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <?php $i=1 ?>
                                        @foreach($course as $c)
                                            <tr class="">
                                                <td>{{$i ++}}</td>
                                                <td>{{$c->$NameCourse}}</td>

                                                <td >
                                                    <a class="text-danger" href="{{$c->url_course}}">{{__('admin.تسجيل')}}</a>
                                                    <button type="button" class="btn text-primary js-tooltip js-copy"  data-toggle="tooltip" data-placement="bottom" data-copy="{{$c->url_course}}" title="نسخ الرابط">
                                                        <i class="fa fa-clone"></i>
                                                    </button>
                                                </td>

                                       <td>{{$c->section->$NameCourse }}</td>

                                                <td>
                                                    @php
                                                        $time_left=strtotime($c->data_expiry)-time();
                                                        $days_left=floor($time_left/86400);
                                                     if ($days_left >0){
                                                    echo $days_left=floor($time_left/86400);
                                                     }else{
                                                      echo __('admin.تم انتهاء');
                                                     }
                                                    @endphp
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>

                                    </table>

                                </div>
                            </div>
                        </div>
                    </div><!-- COL END -->


                </div>
                <!-- row closed -->
                <!-- /row -->

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
@endsection
