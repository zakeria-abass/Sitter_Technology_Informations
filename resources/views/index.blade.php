@extends('layout.master')

<?php
 $title= 'title_'.app()->currentLocale();
 $body= 'body_'.app()->currentLocale();
$Name='name_'.app()->currentLocale();

?>
@section('title',__('ADMIN.INFORMATION TECHNOLOGY INCUBATOR'))

@section('css')


@stop

@section('content_before')


    <!--Waves Container-->
    <div class="inner-header flex">
        <!--Just the logo.. Don't mind this-->
        <img src="{{asset('assset_min/imge/Incubator_logo.png')}}" width="300px" height="300px">
    </div>
    <div>
        <svg  class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
            <defs>
                <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
            </defs>
            <g class="parallax">
                <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7" />
                <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)" />
                <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)" />
                <use xlink:href="#gentle-wave" x="48" y="7" fill="#fff" />
            </g>
        </svg>
    </div>
    <!--Waves end-->
@stop


<!----------------{content}------------------------->
@section('content')

    <!------ about-section  ------->
    <div class=" col-sm-12  mt-5" >
        @if($companies)
        <!-----------------slider_logo--------------------------------------------->
        <div >
            <marquee class="mt-2 justify-content-between" behavior="alternate">
                @foreach($companies as $companie)

                    <img src="{{asset('assets_admin_dashboard/companies/'.$companie->logo)}}" height="100" width="170" alt="" />

                @endforeach

            </marquee >
        </div>

        <!---------------slider end-------------------------------------------->
        @endif
        <section class="about-section ">

            <!---------------about-------------------------------------------->


            @if($about)
                <div class="container">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-lg-5">
                            <img class="d-block w-100" src="{{asset('assets_admin_dashboard/img/about/'.$about->imge)}}" alt="First slide">

                        </div>
                        <div class="col-lg-6 mb-6 mb-lg-0 ">
                            <h1 class=" font-weight-light" >{{$about->$title}}</h1>
                            <p class=" mt-4">{!! $about->$body !!}</p>
                        </div>

                    </div>
                </div>
            <!-- About Start -->
{{--            <div class="container-xxl py-5">--}}
{{--                <div class="container">--}}

{{--                        <div class="about">--}}
{{--                            <div class="imgBox2 text-center" >--}}
{{--                                <div class="row g-5 justify-content-center align-content-center">--}}
{{--                                    <div class="col-lg-5 "  >--}}
{{--                                        <div class="position-relative h-100">--}}
{{--                                            <img  class="img-fluid position-relative" width="400px"height="400px" src="{{asset('assets_admin_dashboard/img/about/'.$about->imge)}}" alt="" style="object-fit: cover; ">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-lg-7 p-4" >--}}
{{--                                        <h1 class="mb-4">  <span style="border-bottom: 2px solid var(--main-color)">{{$about->$title}}</span></h1>--}}
{{--                                        <p class="mb-4">{!! $about->$body !!}</p>--}}
{{--                                    </div>--}}

{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    <div class="row g-5 justify-content-center align-content-center" style="box-shadow: -10px 10px 20px rgba(16,100,152,0.76)">--}}
{{--                        <div class="col-lg-5 "  style="min-height: 400px;">--}}
{{--                            <div class="position-relative h-100">--}}
{{--                                <img  class="img-fluid position-relative w-100 h-100" src="{{asset('assets_admin_dashboard/img/about/'.$about->imge)}}" alt="" style="object-fit: cover; ">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-lg-7 p-4" >--}}
{{--                            <h1 class="mb-4">  <span style="border-bottom: 2px solid var(--main-color)">{{$about->$title}}</span></h1>--}}
{{--                            <p class="mb-4">{!! $about->$body !!}</p>--}}
{{--                        </div>--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
            <!-- About End -->
            @endif

        </section>

    </div>

    <!------ about-section end ------->



    <!---------------course-------------------->
    <h1 class=" text-center mt-5 ">{{__('main.الدورات')}}</h1>
      <p  class="text-center  " >
          دورات مميزة مميزة مقدمة من كلية الدراسات المتوسطة لطلاب قسم الهندسة وتكنواوجيا المعلومات
          <br>
           لخلق بيئة للافكار الابداعية
      </p>
    <section class="course">
        <div class="container_course">

            @forelse ($course as $c)
                <div class="card_course">
                    <div class="imgBox text-center" style="background: var(--background)">
                        <h3 >{{__('main.الدورات')}} {{$c->$Name}}</h3>
                    </div>
                    <div class="content_course" >
                        <p> {{__('main.انتهاء التسجيل')}}: {{$c->data_expiry}}</p>
                        <a href="{{$c->url_course}}" style="background: var(--background);" class="btn text-white  col-sm-12">{{__('main.تسجيل')}}</a>
                    </div>
                </div>
            @empty
                <div class="card_course ">
                    <div class="imgBox bg-danger">
                        <h3>سيتم عمل دورة قريبا</h3>
                    </div>
                    <div class="content_course">
                        <p>انتهاء التسجيل : 0000-00-0</p>
                        <a href="#" class="btn btn-info col-sm-12 bg-danger">مغلق</a>
                    </div>
                </div>
                <div class="card_course ">
                    <div class="imgBox bg-danger">
                        <h3>سيتم عمل دورة قريبا</h3>
                    </div>
                    <div class="content_course">
                        <p>انتهاء التسجيل : 0000-00-0</p>
                        <a href="#" class="btn btn-info col-sm-12 bg-danger">مغلق</a>
                    </div>
                </div>
                <div class="card_course ">
                    <div class="imgBox bg-danger">
                        <h3>سيتم عمل دورة قريبا</h3>
                    </div>
                    <div class="content_course">
                        <p>انتهاء التسجيل : 0000-00-0</p>
                        <a href="#" class="btn btn-info col-sm-12 bg-danger">مغلق</a>
                    </div>
                </div>

            @endforelse


        </div>


    </section>
    <!---------------course end-------------------->


    <!--------------------projects--------------------------------------------->

    <!-- Projects Start -->
    @if($projects->count() >= 1)
    <div class="container-xxl py-6 pt-5">
        <div class="container">
                <div class="col-lg-12  text-center">
                    <h1 class="display-5 mb-0">{{__('main.مشاريع الطلبة')}}</h1>

                    <p class="mt-2">
                         مشاريع طلبة قسم الهندسة وتكنواوجيا المعلومات لكل مشروع نبدة عنة يمكنك قرائته
                        <br>
                        يمكن النضر لمشاريع طلابنا وانجزات الطلبة
                    </p>
                </div>
            <div class="row " >

                @foreach($projects as $project)
                <div class="col-lg-4 col-md-6 portfolio-item  mt-5" >
                    <div class="portfolio-img rounded overflow-hidden" >
                        <img  class="img-fluid" width="100%"   src="{{asset('assets_admin_dashboard/img_project/'.$project->name_en.'/'.$project->imge)}}" alt="" >
                        <div class="portfolio-btn text-center">
                            <h1 class="text-white">{{$project->$Name}}</h1>

                            <div class="mt-3">
                                <a  class="btn btn-lg-square btn-primary border-2 mx-1" href="{{route('project_details',$project->id)}}" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-lg-square btn-primary border-2 mx-1" href=""><i class="fa fa-link"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach


            </div>
        </div>
    </div>
    @endif



    <!------------------  section  ------------------------->


        <div class=" col-sm-12  mt-5" >
            <section class="about-section ">
                 <!-- Vision and mission  -->
                    <div class="container-xxl py-5">
                        <div class="container" >
                                <div class="col-lg-12 p-5" style="border-radius: 10px ;background:linear-gradient(rgba(17,88,129,0.78),rgba(17,88,129,0.78)), url({{asset('assset_min/imge/Vision.jpg')}}) no-repeat ;">
                                    <h5 class="text-white"><span class="p-2" style="border-bottom: 2px solid rgba(114,123,126,0.76)">: الرؤية و الرسالة</span></h5>

                                    <div class="mt-2 p-2 text-white">
                                        <h6 style="line-height: 40px">
                                             أن تكون بيئة لتكنولوجيا المعلومات على مستوي عالمي تقدم خدمات متميزة في تنمية الأعمال التكنولوجية و تهيئة بيئة قادرة علي
                                            الأبداع و التطوير و ترويج الابتكارات التكنولوجية في قطاعات تكنولوجيا المعلومات و في رسالتها الدعم واحتضان الأفكار الريادية
                                            وتحفيز رواد الأعمال التكنولوجية و خلق بيئة للأفكار الابداعية و توفير سبل النجاح

                                        </h6>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <!-- Vision and mission End -->


                <div class="p-5">
                    <div class="row">
                        <div  class="mt-3 col-lg-6">
                            <div class="card-header text-center bg-primary ">
                                <a class="card-link text-white" style="text-decoration:none " >الأهداف</a>
                            </div>

                                <div class="card-body  text-white p-4" style="background:linear-gradient(rgba(10,10,10,0.76),rgba(10,10,10,0.76)), url({{asset('assset_min/imge/It.gif')}}) no-repeat ;">
                                    <h6 class="card-text "><span style="line-height: 40px"> نشر الوعي بمفاهيم الابتكار و الابداع و الريادة و الموهبة و ثقافة التميز و سبل رعايتها</span></h6>
                                    <h6 class="card-text "> <span style="line-height: 40px">تشجيع المبدعين لاطلاق طاقاتهم الابداعية تمهيدا لسقلها و تنميتها في مختلف مجالات الاعمال</span> </h6>
                                    <h6 class="card-text "> <span style="line-height: 40px">تحويل أفكار المبدعين الى مشروعات قابلة لتنفيد و تبنيها </span> </h6>
                                    <h6 class="card-text "> <span style="line-height: 40px">توفير الدعم و التمويل و الخددمات الارشادية و التسهيلات المتاحة لمنتسبها  </span> </h6>
                                    <h6 class="card-text "> <span style="line-height: 40px">تقليل مستويات البطالة و زيادة حجم الدخل للمبدعين و الريادين من الطلبة و المجتمع المحلي </span> </h6>
                                    <h6 class="card-text ">  <span style="line-height: 40px">اشتراك الطلبة و المجتمع المحلي في المشاريع التكنولوجية و الريادية</span> </h6>
                                    <h6 class="card-text ">  <span style="line-height: 40px">المساهمة في تحقيق التعليم و التدريب الابداعي لدي الطلبة و ابناء المجتمع المحلي</span> </h6>
                                    <h6 class="card-text "> <span style="line-height: 40px">ترسيخ الفكر لخلق جيل ريادي</span></h6>                                </div>
                        </div>
                        <div  class="mt-3 col-lg-6">
                            <div class="card-header bg-primary text-center  ">
                                <a class="collapsed card-link text-white" style="text-decoration:none " data-toggle="collapse" href="#">
                                    الأنشطة الخاصة بحاضنات الاعمال
                                </a>
                            </div>
                                <div class="card-body  text-white p-4" style="background:linear-gradient(rgba(10,10,10,0.76),rgba(10,10,10,0.76)), url({{asset('assset_min/imge/It.gif')}}) no-repeat ;">
                                    <h6 class="card-text "><span style="line-height: 40px">توفير الاحتياجات و المساندة الازمة لتقنية </span></h6>
                                    <h6 class="card-text "><span style="line-height: 40px">ارشاد و نوجية منتسبي الحاضنة</span></h6>
                                    <h6 class="card-text "><span style="line-height: 40px">تدريب موظفي المشروعات المنتسبة</span></h6>
                                    <h6 class="card-text "><span style="line-height: 40px">بناء هيكل نمودجي لانشاء و تأسبس الاعمال و الشركات الجديدة</span></h6>
                                    <h6 class="card-text "><span style="line-height: 40px">التعرف على المستثمرين و الشركاء الاستراتجين</span></h6>
                                    <h6 class="card-text "><span style="line-height: 40px">توفير المساندة و المساعدة الادارية و التسويقية</span></h6>
                                    <h6 class="card-text "><span style="line-height: 40px">توفير المساعدة و الاستشارة المالية</span></h6>
                                    <h6 class="card-text "><span style="line-height: 40px">توفير مواقع عديدة وكافية لاستقبال عملاء المنتسبين و المختبرات و الورش المساعدة</span></h6>                                </div>
                        </div>
                    </div>
                </div>


            </section>

        </div>
    <!------------------  section  ------------------------->





    <!------------------  section  ------------------------->
    <section class="contact-page-sec">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="contact-info">
                        <div class="contact-info-item">
                            <div class="contact-info-icon">
                                <i class="fas fa-map-marked"></i>
                            </div>
                            <div class="contact-info-text">
                                <h2>موقع الحاضنة</h2>
                                <span>جامعة الازهر كلية الدراسات المتوسطة</span>
                                <span>غزة -دوار الازهر</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact-info">
                        <div class="contact-info-item">
                            <div class="contact-info-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="contact-info-text">
                                <h2>الايميل</h2>
                                <span>info@LoremIpsum.com</span>
                                <span>yourmail@gmail.com</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact-info">
                        <div class="contact-info-item">
                            <div class="contact-info-icon">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div class="contact-info-text">
                                <h2>وقت الدوام</h2>
                                <span>من الاحد ل الخميس</span>
                                <span>9-2م </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-------------------------------->
        </div>
    </section>
    <!--------------   section  end   ---------------------------->

    <!----------------------------------------------------------------------->

@endsection
<!----------------{content end}------------------------->


@section('script')

    <script>
        (function ($) {
            // Begin jQuery
            $(function () {
                // DOM ready
                // If a link has a dropdown, add sub menu toggle.
                $("nav ul li a:not(:only-child)").click(function (e) {
                    $(this).siblings(".nav-dropdown").toggle();
                    // Close one dropdown when selecting another
                    $(".nav-dropdown").not($(this).siblings()).hide();
                    e.stopPropagation();
                });
                // Clicking away from dropdown will remove the dropdown class
                $("html").click(function () {
                    $(".nav-dropdown").hide();
                });
                // Toggle open and close nav styles on click
                $("#nav-toggle").click(function () {
                    $("nav ul").slideToggle();
                });
                // Hamburger to X toggle
                $("#nav-toggle").on("click", function () {
                    this.classList.toggle("active");
                });
            }); // end DOM ready
        })(jQuery); // end jQuery

    </script>
@endsection
