

<script src="{{asset('assset_min/js/min.js')}}"></script>
<script src="{{asset('assset_min/js/popper.min.js')}}"></script>
<script src="{{asset('assset_min/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assset_min/js/js.js')}}"></script>

<script>
    document.addEventListener("contextmenu", function(e){
        e.preventDefault();
    }, false);

</script>
@yield('script')
