<?php
$name='name_'.app()->currentLocale();
?>
<!-- main-header opened -->
			<div class="main-header sticky side-header nav nav-item">
				<div class="container-fluid">
					<div class="main-header-left ">
						<div class="app-sidebar__toggle" data-toggle="sidebar">
							<a class="open-toggle" href="#"><i class="header-icon fe fe-align-left" ></i></a>
							<a class="close-toggle" href="#"><i class="header-icons fe fe-x"></i></a>
						</div>
						<div class="main-header-center mr-3 d-sm-none d-md-none d-lg-block">
							<input class="form-control" placeholder="Search for anything..." type="search"> <button class="btn"><i class="fas fa-search d-none d-md-block"></i></button>
						</div>
					</div>
					<div class="main-header-right">
						<div class="nav">
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                @if(app()->currentLocale() != $localeCode)
                                    <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">

                                        <img width="30px" height="20px" src="{{asset('assets_admin_dashboard/img/flags/'.$properties['flag'])}}" alt="img">
                                    </a>
                                @endif

                            @endforeach


						</div>

						<div class="nav nav-item  navbar-nav-right ml-auto">
							<div class="nav-link" id="bs-example-navbar-collapse-1">
								<form class="navbar-form" role="search">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="Search">
										<span class="input-group-btn">
											<button type="reset" class="btn btn-default">
												<i class="fas fa-times"></i>
											</button>
											<button type="submit" class="btn btn-default nav-link resp-btn">
												<svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
											</button>
										</span>
									</div>
								</form>
							</div>
							<div class="dropdown nav-item main-header-message ">
								<a class="new nav-link" href="#"><svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                        <span class=' pulse-danger'></span>
                                </a>

                                <div class="dropdown-menu">
									<div class="menu-header-content bg-primary text-right">
										<div class="d-flex">
											<h6 class="dropdown-title mb-1 mr-2  text-white ">{{__('admin.عمليات البرنامج من دات نفسه')}}</h6>
											<a href="#" class="badge badge-pill badge-warning mr-auto my-auto float-left">{{__('admin.لقد قرأت الجميع')}}</a>
										</div>
										<p class="dropdown-title-text subtext mb-0 text-white op-6 pb-0 tx-12 ">{{__('admin.لديك')}} {{__('admin.رسائل غير مقروءة')}}</p>
									</div>
									<div class="main-message-list chat-scroll">

                                        <a href="#" class="p-3 d-flex border-bottom">
                                            <div class=" drop-img  cover-image bg-danger" >
                                                <i class="fa fa-user text-white"></i>
                                            </div>
                                            <div class="wd-90p">
                                                <div class="d-flex ">
                                                    <h5 class="mb-1 name">Name User :</h5>
                                                </div>
                                                <p class="mb-0 desc">زكريا</p>
                                                <p class="time mb-0 text-left float-right mr-2 mt-2">Mar 15 3:55 PM</p>

                                            </div>
                                        </a>

                                    </div>
									<div class="text-center dropdown-footer">
										<a href="text-center">{{__('admin.عرض الكل')}}</a>
									</div>
								</div>
							</div>


                            <div class="dropdown nav-item main-header-notification">
                                <a class="new nav-link" href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
                                    <div id="pulse">
                                        <span class='pulse'></span>

                                    </div>
                                </a>
                                <div class="dropdown-menu">
                                    <div class="menu-header-content bg-primary text-right">
                                        <div class="d-flex">
                                            <h6 class="dropdown-title mb-1 tx-15 text-white font-weight-semibold">Notifications</h6>
                                            <a href="{{route('read_all')}}" class="badge badge-pill badge-warning mr-auto my-auto float-left">Mark All Read</a>
                                        </div>
                                    </div>
                                    <div class="main-notification-list Notification-scroll Notifications" >

                                        <div id="Notifications">

                                            <!------------{  Notifications => PUSHER   }----------------->

                                            <!-----------{ Code => public/js/App.js   }---------------->
                                        </div>

                                        @foreach(auth()->user()->unreadNotifications as $Notifications)

                                            <a class="d-flex p-3 border-bottom" href="{{route('read',$Notifications->id)}}">
                                                <div class="">
                                                    <p class="notification-label mb-1 ">{{__('admin.The Student is Registered:')}} <small class="text-success">{{$Notifications->name_ar}}</small></p>
                                                    <p class="notification-label mb-1 ">{{__('admin.الدورات' )}} :<small class="text-primary">{{$Notifications->course_ar}}</small></p>

                                                    <div class="notification-subtext">${(new Date).toLocaleTimeString()}</div>
                                                </div>
                                                <div class="mr-auto" >
                                                    <i class="las la-angle-left text-left text-muted"></i>
                                                </div>
                                            </a>
                                        @endforeach
                                    </div>
                                    <div class="dropdown-footer">
                                        <a href="{{route('notification_all')}}">VIEW ALL</a>
                                    </div>
                                </div>
                            </div>

							<div class="nav-item full-screen fullscreen-button">
								<a class="new nav-link full-screen-link" href="#"><svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-maximize"><path d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3"></path></svg></a>
							</div>
							<div class="dropdown main-profile-menu nav nav-item nav-link">
                                @if(auth()->user()->imge)
                                    <a class="profile-user d-flex" href=""><img alt="" src="{{asset('assets_admin_dashboard/img/user/'.auth()->user()->imge)}}"></a>

                                @else
                                    <a class="profile-user d-flex" href=""><img alt="" src="{{asset('assets_admin_dashboard/img/user/user_deflide.png')}}"></a>

                                @endif
                                    <div class="dropdown-menu">
									<div class="main-header-profile bg-primary p-3">
										<div class="d-flex wd-100p">
                                            @if(auth()->user()->imge)
                                                <div class="main-img-user"><img alt="" src="{{asset('assets_admin_dashboard/img/user/'.auth()->user()->imge)}}" class=""></div>

                                            @else
                                                <div class="main-img-user"><img alt="" src="{{asset('assets_admin_dashboard/img/user/user_deflide.png')}}" class=""></div>

                                            @endif
											<div class="mr-3 my-auto">
												<h6>{{auth()->user()->$name}}</h6>
                                                <span>{{auth()->user()->email}}</span>
											</div>
										</div>
									</div>


									<a class="dropdown-item" href="{{route('profileUsers.index')}}"><i class="fa fa-address-card"></i> {{__('admin.Profile')}} </a>
									<a class="dropdown-item" href="{{route('notification_all')}}"><i class="bx bxs-inbox"></i>{{__('admin.Inbox')}}</a>
                                    <form action="{{route('logout')}}" method="post">
                                        @csrf
                                        <button class="dropdown-item"><i class="bx bx-log-out"></i>{{__('admin.Log Out')}}</button>
                                    </form>
								</div>
							</div>
							<div class="dropdown main-header-message right-toggle">
								<a class="nav-link pr-0" data-toggle="sidebar-left" data-target=".sidebar-left">
									<svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
								</a>
							</div>
						</div>
					</div>
					</div>
					</div>

<!-- /main-header -->
