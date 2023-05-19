<?php
$Name='name_'.app()->currentLocale();

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
		<meta name="Author" content="Spruko Technologies Private Limited">
		<meta name="Keywords" content="admin,admin dashboard,admin dashboard template,admin panel template,admin template,admin theme,bootstrap 4 admin template,bootstrap 4 dashboard,bootstrap admin,bootstrap admin dashboard,bootstrap admin panel,bootstrap admin template,bootstrap admin theme,bootstrap dashboard,bootstrap form template,bootstrap panel,bootstrap ui kit,dashboard bootstrap 4,dashboard design,dashboard html,dashboard template,dashboard ui kit,envato templates,flat ui,html,html and css templates,html dashboard template,html5,jquery html,premium,premium quality,sidebar bootstrap 4,template admin bootstrap 4"/>
		@include('student_dashboard.layouts.head')


	</head>

	<body class="main-body app sidebar-mini" >


		<!-- Loader -->
		<div id="global-loader">
			<img src="{{asset('assets_admin_dashboard/img/loader.svg')}}" class="loader-img" alt="Loader">
		</div>
		<!-- /Loader -->
		@include('student_dashboard.layouts.main-sidebar')
		<!-- main-content -->
		<div class="main-content app-content">
			@include('student_dashboard.layouts.main-header')
			<!-- container -->
			<div class="container-fluid">
                    <!-- breadcrumb -->
                      @if(request()->url() == route('dashboard.index'))

                @else
                    <div class="breadcrumb-header justify-content-between">
                        <div class="my-auto">

                            <div class="d-flex">

                                @if(request()->url() != route('student.dashboard'))

                                <h4 class="content-title mb-0 my-auto">{{__('admin.Page')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                                        <a href='{{URL::previous()}}'>{{__('admin.Previous')}}</a>

                                </span>
                                @endif
                            </div>
                        </div>
                @endif
                    </div>

				@yield('content')
				@include('student_dashboard.layouts.sidebar')
				@include('student_dashboard.layouts.models')
            	@include('student_dashboard.layouts.footer')
				@include('student_dashboard.layouts.footer-scripts')
	</body>
</html>
