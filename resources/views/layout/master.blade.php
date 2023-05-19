<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{asset('assset_min/imge/Al-Azhar-i.jpg')}}">

 @include('layout.css')

</head>


<body >


<div class="header">
 @include('layout.navbar')


    <!--Content before waves-->

    @yield('content_before')



</div>
<!--Header ends-->

  <!----------------{content}------------------------->
       @yield('content')
<!----------------{content end}------------------------->



<!--------------      footer    ---------------------->
@if(!request()->is('student/*'))
   @include('layout.footer')
@endif
<!--------------      footer  end  ---------------------->

<div class="alert  alert-dismissible col-md-6  "
     style="position: absolute; bottom: 0; right: 0; margin-right: 10px;
    width:100% ;height:300px;" id="alert">
        <video width="100%" height="100%" autoplay loop muted >
            <source src="{{asset('assset_min/imge/Al-Azhar-Incubator.mp4')}}" type="video/mp4" >
        </video>
    <button type="button" class="close" data-dismiss="alert">&times;</button>
</div>
</div>

@include('layout.script')

<script>

    const div = document.getElementById("alert");
    window.addEventListener("scroll", function() {
        div.style.top = window.scrollY +div.offsetHeight+ "px";
    });


</script>
</body>
</html>
