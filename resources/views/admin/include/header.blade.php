<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Meta, title, CSS, favicons, etc. -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	@stack('title')
	@stack('style')
	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
	<!-- NProgress -->
	<link rel="stylesheet" href="{{ asset('css/nprogress.css') }}">
	<script src="https://cdn.tiny.cloud/1/hug50cit7wgg002tl8n59158ayw82gtgkeuj8uu5sedz6vwu/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
	<!-- Custom Theme Style -->
	<link rel="stylesheet" href="{{ asset('css/custom.css') }}">
	<link rel="stylesheet" href="{{asset('css/custom.min.css')}}">
</head>

<body class="nav-md">
	<div class="container body">
		<div class="main_container">
			<div class="col-md-3 left_col">
				<div class="left_col scroll-view">
					<div class="navbar nav_title" style="border: 0;">
						<a href="{{url('/admin/dashboard')}}" class="site_title"><i class="fa fa-paw"></i> <span>EX VISAS</span></a>
					</div>
					<div class="clearfix"></div>
					<!-- menu profile quick info -->
					<div class="profile clearfix">
						<div class="profile_pic">
							@php
								if (!empty(Auth::user()->profile_pic)){
									$profile_pic = asset(Auth::user()->profile_pic);
								}else{
									$profile_pic = asset('images/user.png');
								}
							@endphp
							<img src="@php echo $profile_pic @endphp" alt="Profile Pic" class="img-circle profile_img">
						</div>
						<div class="profile_info">
							<span>Welcome,</span>
							<h2> {{ Auth::user()->name }}</h2>
						</div>
					</div>
					<!-- /menu profile quick info -->
					<br />
					<!-- sidebar menu -->
					<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
						<div class="menu_section">
							<h3>General</h3>
							<ul class="nav side-menu">
								<li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home"></i>Dashboard</i></a></li>
								<li>
									<a><i class="fa fa-clone"></i>Special Services <span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="{{url('/admin/featured_sales')}}">Special Sales Requests</a></li>
										<li><a href="{{url('admin/special_services')}}">Special Services</a></li>
									</ul>
								</li>
								<li><a><i class="fa fa-edit"></i> User <span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="{{url('admin/add-user')}}">Add User</a></li>
										<li><a href="{{{url('admin/users')}}}">View Users</a></li>
									</ul>
								</li>
								<li><a><i class="fa fa-edit"></i> Customer <span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="{{{url('admin/customer')}}}">View Customer</a></li>
									</ul>
								</li>
								<li><a><i class="fa fa-edit"></i> Visa <span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="{{url('admin/visa_requests')}}">User Visa Applications</a></li>
										<li><a href="{{url('admin/visa_requirement')}}">Visa Requirement</a></li>
										<li><a href="{{url('admin/visarequest')}}">Visa Types</a></li>
									</ul>
								</li>
								<li>
									<a><i class="fa fa-clone"></i>Settings <span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="{{url('admin/accreditation')}}">Accreditation</a></li>
										<li><a href="{{url('admin/countries')}}">Countries</a></li>
										<li><a href="{{url('admin/feature')}}">Feature</a></li>

									</ul>
								</li>
								<li>
									<a><i class="fa fa-clone"></i>Content Pages <span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="{{ route('content_pages', 'about_us') }}">About us</a></li>
										<li><a href="{{url('admin/contact_location')}}">Contact Location</a></li>
										<li><a href="{{url('admin/cash_location')}}">Cash Deposit Location</a></li>
										<li><a href="{{url('admin/bank')}}">Bank Branch</a></li>
										<li><a href="{{url('admin/categorie')}}">FAQs Categories</a></li>
										<li><a href="{{url('admin/faqs')}}">FAQs</a></li>
										<li><a href="{{ route('content_pages', 'terms_conditions') }}">Terms & Conditions</a></li>
									</ul>
								</li>
							</ul>
						</div>
					</div>
					<!-- /sidebar menu -->
					<!-- /menu footer buttons -->
					<div class="sidebar-footer hidden-small">
						<!-- <a data-toggle="{{url('admin/setting')}}" data-placement="top" title="Settings">
							<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
							</a>
							<a data-toggle="tooltip" data-placement="top" title="FullScreen">
							<span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
							</a>
							<a data-toggle="tooltip" data-placement="top" title="Lock">
							<span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
						</a> -->
						<a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span class="glyphicon glyphicon-off" aria-hidden="true"></span></a>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
							@csrf
						</form>
					</div>
					<!-- /menu footer buttons -->
				</div>
			</div>
			<!-- top navigation -->
			<div class="top_nav">
				<div class="nav_menu">
					<div class="nav toggle">
						<a id="menu_toggle"><i class="fa fa-bars"></i></a>
					</div>
					<nav class="nav navbar-nav">
						<ul class=" navbar-right">
							<li class="nav-item dropdown open">
								<a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">{{ Auth::user()->name }}</a>
								<div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="{{url('admin/profile/edit/')}}/{{ Auth::user()->id }}">Profile</a>
									<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
									<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
										@csrf
									</form>
								</div>
							</li>
							<!-- <li role="presentation" class="nav-item dropdown open">
								<a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown"
								aria-expanded="false">
								<x-heroicon-o-envelope style="width:25px;" />
								<span class="badge bg-green">6</span>
								</a>
								<ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
								<li class="nav-item">
									<a class="dropdown-item">
									<span class="image"><img src="{{asset('images/img.jpg')}}" alt="Profile Image" /></span>
									<span>
										<span>John Smith</span>
										<span class="time">3 mins ago</span>
									</span>
									<span class="message">
										Film festivals used to be do-or-die moments for movie makers. They were where...
									</span>
									</a>
								</li>
								<li class="nav-item">
									<a class="dropdown-item">
									<span class="image"><img src="{{asset('images/img.jpg')}}" alt="Profile Image" /></span>
									<span>
										<span>John Smith</span>
										<span class="time">3 mins ago</span>
									</span>
									<span class="message">
										Film festivals used to be do-or-die moments for movie makers. They were where...
									</span>
									</a>
								</li>
								<li class="nav-item">
									<a class="dropdown-item">
									<span class="image"><img src="{{asset('images/img.jpg')}}" alt="Profile Image" /></span>
									<span>
										<span>John Smith</span>
										<span class="time">3 mins ago</span>
									</span>
									<span class="message">
										Film festivals used to be do-or-die moments for movie makers. They were where...
									</span>
									</a>
								</li>
								<li class="nav-item">
									<a class="dropdown-item">
									<span class="image"><img src="{{asset('images/img.jpg')}}" alt="Profile Image" /></span>
									<span>
										<span>John Smith</span>
										<span class="time">3 mins ago</span>
									</span>
									<span class="message">
										Film festivals used to be do-or-die moments for movie makers. They were where...
									</span>
									</a>
								</li>
								<li class="nav-item">
									<div class="text-center">
									<a class="dropdown-item">
										<strong>See All Alerts</strong>
									</a>
									</div>
								</li>
								</ul>
							</li> -->
						</ul>
					</nav>
				</div>
			</div>
