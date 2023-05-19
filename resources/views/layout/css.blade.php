<link rel="stylesheet" href="{{asset('assset_min/css/style.css')}}">
<link rel="stylesheet" href="{{asset('assset_min/css/style_project.css')}}">
<link rel="stylesheet" href="{{asset('assset_min/authStudent/Style.css')}}">


@if(app()->currentLocale() === 'ar')
    <link rel="stylesheet" href="{{asset('assset_min/css/rtl.css')}}">
@else
    <link rel="stylesheet" href="{{asset('assset_min/css/bootstrap.min.css')}}">

@endif
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/css/swiper.css">


<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>



@yield('css')


