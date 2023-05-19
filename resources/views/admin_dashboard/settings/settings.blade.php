@extends('admin_dashboard.layouts.master')

@section('title',__('admin.اعدادات عامة'))


@section('content')


    <!-- /row -->
    <div class="row mt-3">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                         <main><h5 class="text-danger">{{__('admin.اعدادات عامة')}}</h5> <p class="text-warning text-center">{{__('admin.تحدير تغير بلاعدادات')}} </p></main>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>

                    </div>

                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mt-4" >
                        <main class="d-flex "> <i class="fa mdi-face-profile ml-2 mr-2"></i><h5> {{__('admin.الملف الشخصي')}}</h5></main>
                        <main><a href="#" class="btn btn-info"><i class="fa fa-eye text-white"></i></a></main>
                    </div>
                    @if(auth()->user()->role->abilites()->where('code','show_users')->exists())
                        <div class="dropdown-divider"></div>
                        <div class="d-flex justify-content-between align-items-center mt-4" >
                         <main class="d-flex"> <i class="fa fa-user ml-2 mr-2"></i> <h5>{{__('admin.المستخدمين')}} </h5></main>
                         <main><a href="{{route('user.index')}}" class="btn btn-info"><i class="fa fa-eye text-white"></i></a></main>
                    </div>
                    @endif

                    @if(auth()->user()->role->abilites()->where('code','show_role')->exists())
                    <div class="dropdown-divider"></div>
                    <div class="d-flex justify-content-between align-items-center mt-4" >
                        <main class="d-flex "> <i class="fa fa-user ml-2 mr-2"></i><h5>{{__('admin.Roles User')}}</h5></main>
                         <main><a href="{{route('role.index')}}" class="btn btn-info"><i class="fa fa-eye text-white"></i></a></main>
                    </div>
                    @endif
                    <div class="dropdown-divider"></div>
                    <div class="d-flex justify-content-between align-items-center mt-4" >
                        <main class="d-flex "> <i class="fa fa-calendar ml-2 mr-2"></i><h5>{{__('admin.المهام المطلوبة')}} </h5></main>
                         <main><a href="#" class="btn btn-info"><i class="fa fa-eye text-white"></i></a></main>
                    </div>
                    <div class="dropdown-divider"></div>
                    <div class="d-flex justify-content-between align-items-center mt-4" >
                        <main class="d-flex "> <i class="fa fa-burn ml-2 mr-2"></i><h5> {{__('admin.الفعاليات')}} </h5></main>
                         <main><a href="#" class="btn btn-info"><i class="fa fa-eye text-white"></i></a></main>
                    </div>

                    <div class="dropdown-divider"></div>
                    <div class="d-flex justify-content-between align-items-center mt-4" >
                        <main class="d-flex "> <i class="fa fa-indent ml-2 mr-2"></i><h5> {{__('admin.الرئسية')}}  </h5></main>
                         <main><a href="{{route('About.index')}}" class="btn btn-info"><i class="fa fa-eye text-white"></i></a></main>
                    </div>

                    <div class="dropdown-divider"></div>
                    <div class="d-flex justify-content-between align-items-center mt-4" >
                        <main class="d-flex "> <i class="fa fa-building ml-2 mr-2"></i><h5>الشركات الداعمة</h5></main>
                        <main><a href="{{route('companie.index')}}" class="btn btn-info"><i class="fa fa-eye text-white"></i></a></main>
                    </div>

                    @if(auth()->user()->role->abilites()->where('code','project_student')->exists())
                    <div class="dropdown-divider"></div>
                    <div class="d-flex justify-content-between align-items-center mt-4" >
                        <main class="d-flex "> <i class="fa fa-indent ml-2 mr-2"></i><h5> {{__('main.مشاريع الطلبة')}}  </h5></main>
                         <main><a href="{{route('project.index')}}" class="btn btn-info"><i class="fa fa-eye  text-white"></i></a></main>
                    </div>
                    @endif



                </div>
            </div>
        </div>

    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->



@endsection


