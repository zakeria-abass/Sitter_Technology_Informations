<!-- Title -->
<title>@yield('title')</title>
<!-- Favicon -->
<link rel="shortcut icon" href="{{asset('assset_min/imge/Al-Azhar-i.jpg')}}">
<!-- Icons css -->
<link href="{{asset('assets_admin_dashboard/css/icons.css')}}" rel="stylesheet">
<!--  Custom Scroll bar-->
<link href="{{asset('assets_admin_dashboard/plugins/mscrollbar/jquery.mCustomScrollbar.css')}}" rel="stylesheet"/>
<!--  Sidebar css -->
<link href="{{asset('assets_admin_dashboard/plugins/sidebar/sidebar.css')}}" rel="stylesheet">
<!-- Sidemenu css -->



{{--<!-- Toastr -->--}}
{{--<link rel="stylesheet" type="text/css" href="{{asset('assets_admin_dashboard/toastr/toastr.min.css')}}">--}}
{{--<script type="text/javascript" src="{{asset('assets_admin_dashboard/toastr/toastr.min.js')}}"></script>--}}
@yield('css')


@if(app()->currentLocale() === 'ar' )
    <link rel="stylesheet" href="{{asset('assets_admin_dashboard/css-rtl/sidemenu.css')}}">
    <!--- Style css -->
    <link href="{{asset('assets_admin_dashboard/css-rtl/style.css')}}" rel="stylesheet">
    <!---Skinmodes css-->
    <link href="{{asset('assets_admin_dashboard/css-rtl/skin-modes.css')}}" rel="stylesheet">
@else

    <link rel="stylesheet" href="{{asset('assets_admin_dashboard/css/sidemenu.css')}}">
    <!--- Style css -->
    <link href="{{asset('assets_admin_dashboard/css/style.css')}}" rel="stylesheet">
    <!---Skinmodes css-->
    <link href="{{asset('assets_admin_dashboard/css/skin-modes.css')}}" rel="stylesheet">
@endif


