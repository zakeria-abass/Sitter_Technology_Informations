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


<body style="    background: linear-gradient(60deg,  rgba(84, 58, 183, 1) 0%, rgb(3,109,122) 100%);">


  <!----------------{content}------------------------->
       @yield('content')
<!----------------{content end}------------------------->



</body>
</html>
