<!DOCTYPE html>
<html att=" {{app()->getlocale() }}" lang="{{app()->getlocale()== 'ar' ? 'ar' : 'en' }}" 
	dir="{{app()->getlocale()== 'ar' ? 'rtl' : 'ltr' }}"
	style="{{app()->getlocale()== 'ar' ? 'rtl' : 'ltr' }}"
	direction="{{app()->getlocale()== 'ar' ? 'rtl' : 'ltr' }}"
>
	<head>

		<!-- Basic -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Direct-KSA</title>	

		<meta name="keywords" content="Visa" />
		<meta name="description" content="Direct-KSA">
		<meta name="author" content="Brantum">
		<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
		<link rel="apple-touch-icon" href="img/apple-touch-icon.png') }} ">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

		<!-- Web Fonts  -->
		<link id="googleFonts" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800%7CShadows+Into+Light&display=swap" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="{{ asset('front-end/vendor/bootstrap/css/bootstrap.min.css') }}">
		<link rel="stylesheet" href="{{ asset('front-end/vendor/fontawesome-free/css/all.min.css') }}">
		<link rel="stylesheet" href="{{ asset('front-end/vendor/animate/animate.compat.css') }}">
		<link rel="stylesheet" href="{{ asset('front-end/vendor/simple-line-icons/css/simple-line-icons.min.css') }}">
		<link rel="stylesheet" href="{{ asset('front-end/vendor/owl.carousel/assets/owl.carousel.min.css') }}">
		<link rel="stylesheet" href="{{ asset('front-end/vendor/owl.carousel/assets/owl.theme.default.min.css') }}">
		<link rel="stylesheet" href="{{ asset('front-end/vendor/magnific-popup/magnific-popup.min.css') }}">

		<!-- Theme CSS -->
		{{-- <link rel="stylesheet" href="{{ asset('front-end/css/theme.css') }}">this --}}
		<link rel="stylesheet" href="{{ asset('front-end/css/theme-elements.css') }}">
		<link rel="stylesheet" href="{{ asset('front-end/css/theme-blog.css') }}">
		<link rel="stylesheet" href="{{ asset('front-end/css/theme-shop.css') }}">

		<!-- Demo CSS -->
		<link rel="stylesheet" href="{{ asset('front-end/css/demos/demo-business-consulting-4.css') }}">

		<!-- Skin CSS -->
		<link id="skinCSS" rel="stylesheet" href="{{ asset('front-end/css/skins/skin-business-consulting-4.css') }}">

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="{{ asset('front-end/css/custom.css') }}">

		<!-- Head Libs -->
		<script src="{{ asset('front-end/vendor/modernizr/modernizr.min.js') }}"></script>
    
		<!-- Font Awesome -->
    	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/fontawesome.min.css" integrity="sha512-SgaqKKxJDQ/tAUAAXzvxZz33rmn7leYDYfBP+YoMRSENhf3zJyx3SBASt/OfeQwBHA1nxMis7mM3EV/oYT6Fdw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

		<!-- Favicon -->
    	@if( app()->getlocale() == "en" )
			<link rel="stylesheet" href="{{ asset('front-end/css/theme.css') }}">
			<link rel="stylesheet" href="https://cdn.usebootstrap.com/bootstrap/4.3.1/css/bootstrap.min.css">		
		@else
			<link rel="stylesheet" href="{{ asset('front-end/css/themear.css') }}">
			<link rel="stylesheet" href="asset('front-end/css/bootstrap.min.css')">
		@endif
		<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/solid.min.js" integrity="sha512-apZ8JDL5kA1iqvafDdTymV4FWUlJd8022mh46oEMMd/LokNx9uVAzhHk5gRll+JBE6h0alB2Upd3m+ZDAofbaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
		@stack('link')
	</head>
	<body>

		<div class="body">
			<header id="header" class="header-transparent" data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': false, 'stickyChangeLogo': false, 'stickyStartAt': 53, 'stickySetTop': '-53px'}">
				<div class="header-body border-top-0 h-auto box-shadow-none">
					<!-- <div class="header-top header-top-borders">
						<div class="container h-100">
							<div class="header-row h-100">
								<div class="header-column justify-content-start">
									<div class="header-row">
										<nav class="header-nav-top">
											<ul class="nav nav-pills">
												<li class="nav-item py-2 d-none d-sm-inline-flex pe-2">
													<span class="ps-0 font-weight-semibold text-color-default text-2-5">1234 Street Name, City Name</span>
												</li>
												<li class="nav-item py-2 pe-2">
													<a href="tel:123-456-7890" class="text-color-default text-2-5 text-color-hover-primary font-weight-semibold">123-456-7890</a>
												</li>
												<li class="nav-item py-2 d-none d-md-inline-flex">
													<a href="mailto:mail@domain.com" class="text-color-default text-2-5 text-color-hover-primary font-weight-semibold">mail@domain.com</a>
												</li>
											</ul>
										</nav>
									</div>
								</div>
								<div class="header-column justify-content-end">
									<div class="header-row">
										<nav class="header-nav-top">
											<ul class="nav nav-pills p-relative bottom-2">
												<li class="nav-item py-2 d-none d-lg-inline-flex">
													<a href="http://www.facebook.com/" target="_blank" title="Facebook" class="text-color-dark text-color-hover-primary text-3 anim-hover-translate-top-5px transition-2ms"><i class="fab fa-facebook-f text-3 p-relative top-1"></i></a>
												</li>
												<li class="nav-item py-2 d-none d-lg-inline-flex">
													<a href="http://www.twitter.com/" target="_blank" title="Twitter" class="text-color-dark text-color-hover-primary text-3 anim-hover-translate-top-5px transition-2ms"><i class="fab fa-twitter text-3 p-relative top-1"></i></a>
												</li>
												<li class="nav-item py-2 d-none d-lg-inline-flex">
													<a href="http://www.instagram.com/" target="_blank" title="Instagram" class="text-color-dark text-color-hover-primary text-3 anim-hover-translate-top-5px transition-2ms"><i class="fab fa-instagram text-3 p-relative top-1"></i></a>
												</li>
												<li class="nav-item py-2 pe-0 d-none d-lg-inline-flex">
													<a href="http://www.linkedin.com/" target="_blank" title="Linkedin" class="text-color-dark text-color-hover-primary text-3 anim-hover-translate-top-5px transition-2ms"><i class="fab fa-linkedin-in text-3 p-relative top-1"></i></a>
												</li>
											</ul>
										</nav>
									</div>
								</div>
							</div>
						</div>
					</div> -->
					<div class="header-container header-container-height-sm container p-static">
						<div class="header-row">
							<div class="header-column">
								<div class="header-row">
									<div class="header-logo">
										<a href="{{ route('home') }}">
											<img alt="Direct" width="150" height="42" src="{{ asset('img/logo.png') }}">
										</a>
									</div>
								</div>
							</div>
							<div class="header-column justify-content-end">
								<div class="header-row">
									<div class="header-nav header-nav-links">
										<div class="header-nav-main header-nav-main-square header-nav-main-dropdown-no-borders header-nav-main-dropdown-border-radius header-nav-main-text-capitalize header-nav-main-text-size-4 header-nav-main-arrows header-nav-main-full-width-mega-menu header-nav-main-mega-menu-bg-hover header-nav-main-effect-2">
											<nav class="collapse">
												<ul class="nav nav-pills" id="mainNav">
													<li class="dropdown">
														<a href="{{ route('home') }}" class="nav-link active">
															{{__('head.ho')}}
														</a>
													</li>
													<li class="dropdown dropdown-mega">
														<a class="dropdown-item" href="{{ route('visa_request') }}">
															{{__('head.vi')}}
														</a>
													</li>
													<li>
														<a class="nav-link" href="">
															{{__('head.sc')}}
														</a>
													</li>
												</ul>
											</nav>
										</div>
									
										<!-- <a href="demo-business-consulting-4-contact-us.html" class="btn btn-modern btn-primary btn-outline btn-arrow-effect-1 text-capitalize text-2-5 ms-3 me-2 d-block d-md-none d-xl-block anim-hover-translate-right-5px transition-2ms">Contact Us <i class="fas fa-arrow-right ms-2"></i></a>
										<button class="btn header-btn-collapse-nav" data-bs-toggle="collapse" data-bs-target=".header-nav-main nav">
											<i class="fas fa-bars"></i>
										</button> -->
									</div>
									<!-- <div class="header-nav-features header-nav-features-no-border ps-2 order-1 order-lg-2">
										<div class="header-nav-feature header-nav-features-search d-inline-flex">
											<a href="#" class="header-nav-features-toggle text-decoration-none" data-focus="headerSearch" aria-label="Search"><i class="fas fa-search header-nav-top-icon text-3"></i></a>
											<div class="header-nav-features-dropdown" id="headerTopSearchDropdown">
												<form role="search" action="page-search-results.html" method="get">
													<div class="simple-search input-group">
														<input class="form-control text-1" id="headerSearch" name="q" type="search" value="" placeholder="Search...">
														<button class="btn" type="submit" aria-label="Search">
															<i class="fas fa-search header-nav-top-icon"></i>
														</button>
													</div>
												</form>
											</div>
										</div>
									</div> -->
								</div>
							</div>
							<div class="btn-group">
								<button class="btn-sm " type="button" data-bs-toggle="dropdown" aria-expanded="">
									@if(session()->get('locale') == 'ar')
										{{__('head.arb')}}
										@else
										{{__('head.eng')}}							
								@endif
								<i class="fas fa-chevron-down"></i></button>
								<div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="min-width:80px; width: 80px;">
									<a class="dropdown-item" href="{{url('/locale/en')}}" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>{{__('head.eng')}}</a>
									<a class="dropdown-item" href="{{url('/locale/ar')}}" {{ session()->get('locale') == 'ar' ? 'selected' : '' }}>{{__('head.arb')}}</a>
							</div>
							  </div>
						</div>
					</div>
					
				</div>
			</header>

			<div role="main" class="main" style="padding-top: 100px;">@yield('content')</div>

			<footer id="footer" class="position-relative bg-dark border-top-0">		
				<div class="container pt-5 pb-3">
					<div class="row pt-5">
						<div class="col-lg-4">
							<a href="{{ route('home') }}" class="text-decoration-none">
								<img src="{{ asset('img/logo.png') }} " width="150" height="42" class="img-fluid mb-4" alt="Direct" />
							</a>
							<p class="text-3-5 font-weight-medium pe-lg-2">{{__('head.lid')}} </p>
							<ul class="list list-unstyled">
								<li class="d-flex align-items-center mb-4">
									<i class="icon icon-envelope text-color-light text-5 font-weight-bold position-relative top-1 me-3-5"></i>
									<a href="mailto:company@business-consulting-4.com" class="d-inline-flex align-items-center text-decoration-none text-color-light text-color-hover-primary font-weight-semibold text-4-5">company@domain.com</a>
								</li>
								<li class="d-flex align-items-center mb-4">
									<i class="icon icon-phone text-color-light text-5 font-weight-bold position-relative top-1 me-3-5"></i>
									<a href="tel:8001234567" class="d-inline-flex align-items-center text-decoration-none text-color-light text-color-hover-primary font-weight-semibold text-4-5">800-123-4567</a>
								</li>
							</ul>
							<ul class="social-icons social-icons-clean social-icons-medium">
								<li class="social-icons-facebook">
									<a href="http://www.facebook.com/" target="_blank" title="Facebook">
										<i class="fab fa-facebook-f text-color-light"></i>
									</a>
								</li>
								<li class="social-icons-twitter">
									<a href="http://www.twitter.com/" target="_blank" title="Twitter">
										<i class="fab fa-twitter text-color-light"></i>
									</a>
								</li>
								<li class="social-icons-instagram">
									<a href="http://www.instagram.com/" target="_blank" title="Instagram">
										<i class="fab fa-instagram text-color-light"></i>
									</a>
								</li>
								<li class="social-icons-linkedin">
									<a href="http://www.linkedin.com/" target="_blank" title="Linkedin">
										<i class="fab fa-linkedin text-color-light"></i>
									</a>
								</li>
							</ul>
						</div>
						<div class="col-lg-8">
							<div class="row mb-5-5">
								<div class="col-lg-6 mb-4 mb-lg-0">
									<h4 class="text-color-light font-weight-bold mb-3">{{__('head.nav')}}</h4>
									<ul class="list list-unstyled columns-lg-2">
										<li><a href="{{ route('home') }}" class="text-color-grey text-color-hover-primary">{{__('head.ho')}}</a></li>
										<li><a href="{{ route('featured_sales') }}" class="text-color-grey text-color-hover-primary">{{__('head.os')}}</a></li>
										<li><a href="{{ route('visa_request') }}" class="text-color-grey text-color-hover-primary">{{__('head.vi')}}</a></li>
										<li><a href="#" class="text-color-grey text-color-hover-primary">{{__('head.sc')}}</a></li>
										
									</ul>
								</div>
								<div class="col-lg-6">
									<h4 class="text-color-light font-weight-bold mb-3">{{__('head.el')}}</h4>
									<ul class="list list-unstyled columns-lg-2">
										<li><a href="{{ route('content_page') }}/about_us" class="text-color-grey text-color-hover-primary">{{__('head.au')}}</a></li>
										<li><a href="{{url('/page/contact')}}" class="text-color-grey text-color-hover-primary">{{__('head.cu')}}</a></li>
										<li><a href="{{url('/page/faq')}}" class="text-color-grey text-color-hover-primary">{{__('head.faq')}}</a></li>
										<li><a href="{{ route('content_page') }}/terms_conditions" class="text-color-grey text-color-hover-primary">{{__('head.tc')}}</a></li>
									</ul>
								</div>
							</div>
							<!-- <div class="row">
								<div class="col">
									<div class="alert alert-success d-none" id="newsletterSuccess">
										<strong>Success!</strong> You've been added to our email list.
									</div>
									<div class="alert alert-danger d-none" id="newsletterError"></div>
									<div class="d-flex flex-column flex-lg-row align-items-start align-items-lg-center">
										<h4 class="text-color-light ws-nowrap me-3 mb-3 mb-lg-0">Subscribe to Newsletter:</h4>
										<form id="newsletterForm" class="form-style-3 w-100" action="php/newsletter-subscribe.php" method="POST">
											<div class="d-flex">
												<input class="form-control bg-color-light border-0 box-shadow-none" placeholder="Email Address" name="newsletterEmail" id="newsletterEmail" type="text" />
												<button class="btn btn-primary ms-2 btn-px-3 btn-py-2 font-weight-bold" type="submit">
													Go
												</button>
											</div>
										</form>
									</div>
								</div>
							</div> -->
						</div>
					</div>
				</div>
				<div class="footer-copyright bg-transparent">
					<div class="container">
						<hr class="bg-color-light opacity-1">
						<div class="row">
							<div class="col mt-4 mb-4 pb-5">
								<p class="text-center text-3 mb-0">{{__('head.cp')}}</p>
							</div>
						</div>
					</div>
				</div>
			</footer>
		</div>

		<!-- Vendor -->
		<script src="{{ asset('front-end/vendor/plugins/js/plugins.min.js') }}"></script>
		<script src="{{ asset('front-end/vendor/particles/particles.min.js') }}"></script>

		<!-- Theme Base, Components and Settings -->
		<script src="{{ asset('front-end/js/theme.js') }}"></script>

		<!-- Demo -->
		<script src="{{ asset('front-end/js/demos/demo-business-consulting-4.js') }}"></script>

		<!-- Theme Custom -->
		<script src="{{ asset('front-end/js/custom.js') }}"></script>

		<!-- Theme Initialization Files -->
		<script src="{{ asset('front-end/js/theme.init.js') }}"></script>

		 <!--Slider-->
		@stack('script')
		@yield('custom-scripts')
	</body>
</html>
