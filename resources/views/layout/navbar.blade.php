
<!---------  navbar  ----------->
<nav class="navbar navbar-expand-custom navbar-mainbg"

     @if(app()->currentLocale() !='ar')
         dir="rtl"
         @endif
>

    <button class="navbar-toggler" type="button" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars text-white"></i>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ">
            <div class="hori-selector"><div class="left"></div><div class="right"></div></div>

            <li class="nav-item">
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    @if(app()->currentLocale() != $localeCode)
                        <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">

                            <img width="30px" height="20px" src="{{asset('assets_admin_dashboard/img/flags/'.$properties['flag'])}}" alt="img">
                        </a>
                    @endif

                @endforeach


            </li>


            <!-----------------------{ Auth }------------------------------------>

        @if(Auth::guard('student')->user())
                <li class="nav-item ">
                    <a class="nav-link text-white" href="{{route('student.dashboard')}}">{{__('admin.control Board')}}</a>
                </li>
                <li class="nav-item  ">
                    <form class="mt-2" action="{{route('student.logout')}}" method="post">
                        @csrf
                        <button class="nav-link btn btn-warning-light text-white" type="submit">{{__('admin.Log Out')}}</button>
                    </form>
                </li>
            @elseif(auth()->user())
                <li class="nav-item ">
                    <a class="nav-link text-white" href="{{route('dashboard.index')}}">{{__('admin.control Board')}}</a>
                </li>
                <li class="nav-item  ">
                    <form class="mt-2" action="{{route('logout')}}" method="post">
                        @csrf
                        <button class="nav-link btn btn-warning-light text-white" type="submit">{{__('admin.Log Out')}} </button>
                    </form>
                </li>
            @else
            <li class="nav-item {{request()->url()===route('student.register')?'active':''}}">
                <a class="nav-link" href="{{route('NewAcount')}}">{{__('main.Sig up')}}</a>
            </li>
            <li class="nav-item {{request()->url()===route('student.login')?'active':''}}">
                <a class="nav-link" href="{{ route('student.login') }}">{{__('main.Sig in')}}</a>
            </li>
            @endif

   <!----------------------------------------------------------->


            <li class="nav-item">
                <a class="nav-link" href="javascript:void(0);">{{__('main.انجازات')}} </a>
            </li>

            <li class="nav-item {{request()->url()===route('all_courses')?'active':''}}">
                <a class="nav-link" href="{{route('all_courses')}}">{{__('main.الدورات')}}</a>
            </li>

            <li class="nav-item {{request()->url()===route('View-project')?'active':''}}">
                <a class="nav-link" href="{{route('View-project')}}">{{__('main.مشاريع الطلاب')}}</a>
            </li>


            <li class="nav-item {{request()->url()=== route('index')?'active':''}}">
                <a class="nav-link" href="{{route('index')}}">{{__('main.الصفحة الرئسية')}}</a>
            </li>
        </ul>
    </div>
    <h6 class=" navbar-logo" style="text-decoration: none;" >{{__('ADMIN.INFORMATION TECHNOLOGY INCUBATOR')}}
     <p class="text-white">{{__('main.Al-Azhar University')}}</p>
    </h6>

</nav>
<!--------- navbar end  -------------->
