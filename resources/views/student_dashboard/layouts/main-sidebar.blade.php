<!-- main-sidebar -->
		<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
		<aside class="app-sidebar sidebar-scroll">
			<div class="main-sidemenu">
				<div class="app-sidebar__user clearfix">
					<div class="dropdown user-pro-body">
						<div class="">
                            @if(auth()->guard('student')->user()->imge)

                                <img  class="avatar avatar-xl brround" src="{{asset("assets_admin_dashboard/img/user/".auth()->guard('student')->user()->imge)}}"><span class="avatar-status profile-status bg-green"></span>

                            @else
                                <img  class="avatar avatar-xl brround" src="{{asset("assets_admin_dashboard/img/user/user_deflide.png")}}"><span class="avatar-status profile-status bg-green"></span>


                            @endif
						</div>
						<div class="user-info">
							<h4 class="font-weight-semibold mt-3 mb-0">{{Auth::guard('student')->user()->name}}</h4>
							<span class="mb-0 text-muted">{{Auth::guard('student')->user()->email}}</span>
						</div>
					</div>
				</div>
				<ul class="side-menu">
					<li class="side-item side-item-category">{{__('admin.INFORMATION TECHNOLOGY INCUBATOR')}}</li>
					<li class="slide mt-5" >
						<a class="side-menu__item "  href="{{route('student.dashboard')}}"><i class="fa fa-home ml-4 mr-4 text-info"></i><span class="side-menu__label" style="font-size: 1.4em"> {{__('ADMIN.الرئسية')}}</span></a>
					</li>

                    <li class="slide" >
						<a class="side-menu__item "  href="{{route('register.index')}}"><i class="fa fa-calendar ml-4 mr-4 text-info"></i><span class="side-menu__label"  style="font-size: 1.4em">{{__('admin.كورسات')}}</span></a>
					</li>

                    <li class="slide" >
						<a class="side-menu__item "  href="{{route('register.create')}}"><i class="fa fa-calendar ml-4 mr-4 text-info"></i><span class="side-menu__label " style="font-size: 1.4em">{{__('admin.Courses dates')}}</span></a>
					</li>


                    <li class="slide">
                        <a class="side-menu__item" data-toggle="slide" href="#"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24" ><path d="M0 0h24v24H0V0z" fill="none"/><path d="M15 11V4H4v8.17l.59-.58.58-.59H6z" opacity=".3"/><path d="M21 6h-2v9H6v2c0 .55.45 1 1 1h11l4 4V7c0-.55-.45-1-1-1zm-5 7c.55 0 1-.45 1-1V3c0-.55-.45-1-1-1H3c-.55 0-1 .45-1 1v14l4-4h10zM4.59 11.59l-.59.58V4h11v7H5.17l-.58.59z"/></svg><span class="side-menu__label" style="font-size: 1.4em">خدمات طلابية</span><i class="angle fe fe-chevron-down"></i></a>
                        <ul class="slide-menu">
                            <li><a class="slide-item " href="{{route('grades')}}" style="font-size: 1.2em">كشف درجات</a></li>
                        </ul>
                    </li>



                </ul>
			</div>
		</aside>
<!-- main-sidebar -->
