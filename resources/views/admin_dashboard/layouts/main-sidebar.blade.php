
<!-- main-sidebar -->
		<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
		<aside class="app-sidebar sidebar-scroll">
			<div class="main-sidemenu">
				<div class="app-sidebar__user clearfix">
					<div class="dropdown user-pro-body">
						<div class="">
                            @if(auth()->user()->imge)

                            <img  class="avatar avatar-xl brround" src="{{asset('assets_admin_dashboard/img/user/'.auth()->user()->imge)}}"><span class="avatar-status profile-status bg-green"></span>
                            @else
                                <img  class="avatar avatar-xl brround" src="{{asset('assets_admin_dashboard/img/user/user_deflide.png')}}"><span class="avatar-status profile-status bg-green"></span>

                            @endif
                        </div>
						<div class="user-info">
							<h4 class="font-weight-semibold mt-3 mb-0">{{auth()->user()->name}}</h4>
							<span class="mb-0 text-muted">{{auth()->user()->email}}</span>
						</div>
					</div>
				</div>
				<ul class="side-menu">
					<li class="side-item side-item-category">{{__('admin.INFORMATION TECHNOLOGY INCUBATOR')}}</li>
                     @if(auth()->user()->type == 1)
					<li class="slide">
						<a class="side-menu__item" href="{{route('dashboard.index')}}"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24" ><path d="M0 0h24v24H0V0z" fill="none"/><path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3"/><path d="M3 13h8V3H3v10zm2-8h4v6H5V5zm8 16h8V11h-8v10zm2-8h4v6h-4v-6zM13 3v6h8V3h-8zm6 4h-4V5h4v2zM3 21h8v-6H3v6zm2-4h4v2H5v-2z"/></svg><span class="side-menu__label">{{__('ADMIN.الرئسية')}}</span></a>
					</li>

                        <li class="side-item side-item-category">{{__('admin.لأقسام')}}</li>
                        <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24" ><path d="M0 0h24v24H0V0z" fill="none"/><path d="M15 11V4H4v8.17l.59-.58.58-.59H6z" opacity=".3"/><path d="M21 6h-2v9H6v2c0 .55.45 1 1 1h11l4 4V7c0-.55-.45-1-1-1zm-5 7c.55 0 1-.45 1-1V3c0-.55-.45-1-1-1H3c-.55 0-1 .45-1 1v14l4-4h10zM4.59 11.59l-.59.58V4h11v7H5.17l-.58.59z"/></svg><span class="side-menu__label">{{__('admin.لأقسام')}}</span><i class="angle fe fe-chevron-down"></i></a>
                            <ul class="slide-menu">
                                @if(auth()->user()->role->abilites()->where('code','show_sections')->exists())
                                    <li><a class="slide-item " href="{{route('section.index')}}">{{__('admin.عرض الاقسام')}}</a></li>
                                @endif

                                @if(auth()->user()->role->abilites()->where('code','add_sections')->exists())
                                    <li><a class="slide-item" href="{{route('section.create')}}">{{__('admin.أضافة قسم')}}</a></li>
                                @endif

                            </ul>
                        </li>

                        <li class="side-item side-item-category">{{__('admin.كورسات')}}</li>
                        <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24" ><path d="M0 0h24v24H0V0z" fill="none"/><path d="M15 11V4H4v8.17l.59-.58.58-.59H6z" opacity=".3"/><path d="M21 6h-2v9H6v2c0 .55.45 1 1 1h11l4 4V7c0-.55-.45-1-1-1zm-5 7c.55 0 1-.45 1-1V3c0-.55-.45-1-1-1H3c-.55 0-1 .45-1 1v14l4-4h10zM4.59 11.59l-.59.58V4h11v7H5.17l-.58.59z"/></svg><span class="side-menu__label">{{__('admin.كورسات')}}</span><i class="angle fe fe-chevron-down"></i></a>
                            <ul class="slide-menu">
                                @if(auth()->user()->role->abilites()->where('code','add_courses')->exists())
                                    <li><a class="slide-item" href="{{route('courses.index')}}">{{__('admin.عرض الكورسات')}}</a></li>
                                @endif

                                @if(auth()->user()->role->abilites()->where('code','add_courses')->exists())
                                    <li><a class="slide-item" href="{{route('courses.create')}}">{{__('admin.أضافة كورسات')}}</a></li>
                                @endif

                            </ul>
                        </li>

                        <li class="side-item side-item-category">{{__('admin.الاعدادات')}}</li>
                        <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24" ><path d="M0 0h24v24H0V0z" fill="none"/><path d="M15 11V4H4v8.17l.59-.58.58-.59H6z" opacity=".3"/><path d="M21 6h-2v9H6v2c0 .55.45 1 1 1h11l4 4V7c0-.55-.45-1-1-1zm-5 7c.55 0 1-.45 1-1V3c0-.55-.45-1-1-1H3c-.55 0-1 .45-1 1v14l4-4h10zM4.59 11.59l-.59.58V4h11v7H5.17l-.58.59z"/></svg><span class="side-menu__label">{{__('admin.الاعدادات')}}</span><i class="angle fe fe-chevron-down"></i></a>
                            <ul class="slide-menu">
                                <li><a class="slide-item " href="{{route('settings')}}">{{__('admin.اعدادات عامة')}}</a></li>
                            </ul>
                        </li>

                    @else
                        <li class="slide" >
                            <a class="side-menu__item "  href="{{route('dashboard.index')}}"><i class="fa fa-calendar ml-4 mr-4 text-info"></i><span class="side-menu__label " style="font-size: 1.1em">الرئسية</span></a>
                        </li>


                    @endif


				</ul>
			</div>
		</aside>
<!-- main-sidebar -->


