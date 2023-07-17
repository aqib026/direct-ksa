<!DOCTYPE html>
<html att=" {{ app()->getlocale() }}" lang="{{ app()->getlocale() == 'ar' ? 'ar' : 'en' }}"
    dir="{{ app()->getlocale() == 'ar' ? 'rtl' : 'ltr' }}" style="{{ app()->getlocale() == 'ar' ? 'rtl' : 'ltr' }}"
    direction="{{ app()->getlocale() == 'ar' ? 'rtl' : 'ltr' }}">

<head>

    <!-- Basic -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
@stack('title')
@stack('style')
@stack('script')
    <title>Direct-KSA</title>

    <meta name="keywords" content="Visa" />
    <meta name="description" content="Direct-KSA">
    <meta name="author" content="Brantum">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="img/apple-touch-icon.png') }} ">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

    <!-- Web Fonts  -->
    <link id="googleFonts"
        href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800%7CShadows+Into+Light&display=swap"
        rel="stylesheet" type="text/css">

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/fontawesome.min.css"
        integrity="sha512-SgaqKKxJDQ/tAUAAXzvxZz33rmn7leYDYfBP+YoMRSENhf3zJyx3SBASt/OfeQwBHA1nxMis7mM3EV/oYT6Fdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Favicon -->
    @if (app()->getlocale() == 'en')
        <link rel="stylesheet" href="{{ asset('front-end/css/theme-elements.css') }}">
        <link rel="stylesheet" href="{{ asset('front-end/css/theme.css') }}">
        <link rel="stylesheet" href="https://cdn.usebootstrap.com/bootstrap/4.3.1/css/bootstrap.min.css">
    @else
        <link rel="stylesheet" href="{{ asset('front-end/css/theme-ar-element.css') }}">
        <link rel="stylesheet" href="{{ asset('front-end/css/themear.css') }}">
        <link rel="stylesheet" href="asset('front-end/css/bootstrap.min.css')">
    @endif
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/solid.min.js"
        integrity="sha512-apZ8JDL5kA1iqvafDdTymV4FWUlJd8022mh46oEMMd/LokNx9uVAzhHk5gRll+JBE6h0alB2Upd3m+ZDAofbaQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @stack('link')
</head>

<body>

    <div class="body">
        <header id="header" class="header-transparent"
            data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': false, 'stickyChangeLogo': false, 'stickyStartAt': 53, 'stickySetTop': '-53px'}">
            <div class="header-body border-top-0 h-auto box-shadow-none">

                <div class="header-container header-container-height-sm container p-static">
                    <div class="header-row">
                        <div class="header-column">
                            <div class="header-row">
                                <div class="header-logo">
                                    <a href="{{ route('home') }}">
                                        <img alt="Direct" width="150" height="42"
                                            src="{{ asset('img/logo.png') }}">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="header-column justify-content-end">
                            <div class="header-row">
                                <div class="header-nav header-nav-links">
                                    <div
                                        class="header-nav-main header-nav-main-square header-nav-main-dropdown-no-borders header-nav-main-dropdown-border-radius header-nav-main-text-capitalize header-nav-main-text-size-4 header-nav-main-arrows header-nav-main-full-width-mega-menu header-nav-main-mega-menu-bg-hover header-nav-main-effect-2">
                                        <nav class="collapse">
                                            <ul class="nav nav-pills" id="mainNav">
                                                <li class="dropdown">
                                                    <a href="{{ url('/') }}" class="nav-link active">
                                                        {{ __('head.ho') }}
                                                    </a>
                                                </li>
                                                <li class="dropdown dropdown-mega">
                                                    <a class="dropdown-item" href="{{ route('visa_request') }}">
                                                        {{ __('head.vi') }}
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="nav-link" href="">
                                                        {{ __('head.sc') }}
                                                    </a>
                                                </li>
                                                <li style="margin-top: 34px;">
                                                    <button class="btn btn-outline-dark " type="button" data-bs-toggle="dropdown" aria-expanded="">
                                                        @if (session()->get('locale') == 'ar')
                                                            {{ __('head.arb') }}
                                                        @else
                                                            {{ __('head.eng') }}
                                                        @endif
                                                        <i class="fas fa-chevron-down"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="{{ url('/locale/en') }}"
                                                            {{ session()->get('locale') == 'en' ? 'selected' : '' }}>{{ __('head.eng') }}</a>
                                                        <a class="dropdown-item" href="{{ url('/locale/ar') }}"
                                                            {{ session()->get('locale') == 'ar' ? 'selected' : '' }}>{{ __('head.arb') }}</a>

                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                    <button class="btn header-btn-collapse-nav" data-bs-toggle="collapse" data-bs-target=".header-nav-main nav" aria-expanded="true">
                                        <i class="fas fa-bars"></i>
                                    </button>
                            </div>
                        </div>

                        </div>
                    </div>
                </div>

            </div>
        </header>
        @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif

        <div role="main" class="main" style="padding-top: 100px;">
            <div class="container-fluid ">
                <div class="row mt-5 ">
                    @if (!Auth::user()->phone_verified)
                        <div class="alert alert-danger" role="alert">
                            Please verify your phone number.
                            <a href="{{ url('otp/login') }}" class="alert-link">Click here</a> to go to the verification page.
                        </div>
                    @endif
                        @if (!Auth::user()->email_verified_at)
                            <div class="alert alert-danger" role="alert">
                                Please verify your email address.
                                <a href="{{ route('verification.notice') }}" class="alert-link">Click here</a> to resend the verification email.
                            </div>
                        @endif
                    <div class="col-md-3" >
                        <ul class="list-group flex-column mb-auto" style="margin-left: 78px;">

                            <li class="list-group-item">
                                <a href="#" class="nav-link active" aria-current="page">
                                    <svg class="bi me-2" width="16" height="16">
                                        <use xlink:href="#home"></use>
                                    </svg>
                                    {{__("userdashboard.home")}}
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="#" class="nav-link link-dark">
                                    <svg class="bi me-2" width="16" height="16">
                                        <use xlink:href="#speedometer2"></use>
                                    </svg>
                                    {{__('userdashboard.visa')}}
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{route('services')}}" class="nav-link link-dark">
                                    <svg class="bi me-2" width="16" height="16">
                                        <use xlink:href="#table"></use>
                                    </svg>
                                    {{__('userdashboard.services')}}
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{url('user/profile')}}" class="nav-link link-dark">
                                    <svg class="bi me-2" width="16" height="16">
                                        <use xlink:href="#grid"></use>
                                    </svg>
                                    {{__('userdashboard.update')}}
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{url('user/password')}}" class="nav-link link-dark">
                                    <svg class="bi me-2" width="16" height="16">
                                        <use xlink:href="#grid"></use>
                                    </svg>
                                    {{__('userdashboard.password')}}
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a  class="nav-link link-dark"  href="{{ route('logout') }}"
                                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    <svg class="bi me-2" width="16" height="16">
                                        <use xlink:href="#grid"></use>
                                    </svg>{{ __('userdashboard.logout') }}</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
										@csrf
									</form>
                            </li>
                        </ul>

                    </div>

                    <div class="col-md-8 offset-md-1">
                        @yield('content')
                    </div>
                </div>

            </div>
        </div>
        <footer id="footer" class="position-relative mt-5 bg-dark border-top-0">
            <div class="container pt-5 pb-3">
                <div class="row pt-5">
                    <div class="col-lg-4">
                        <a href="{{ route('home') }}" class="text-decoration-none">
                            <img src="{{ asset('img/logo.png') }} " width="150" height="42"
                                class="img-fluid mb-4" alt="Direct" />
                        </a>
                        <p class="text-3-5 font-weight-medium pe-lg-2">{{ __('head.lid') }} </p>
                        <ul class="list list-unstyled">
                            <li class="d-flex align-items-center mb-4">
                                <i
                                    class="icon icon-envelope text-color-light text-5 font-weight-bold position-relative top-1 me-3-5"></i>
                                <a href="mailto:company@business-consulting-4.com"
                                    class="d-inline-flex align-items-center text-decoration-none text-color-light text-color-hover-primary font-weight-semibold text-4-5">company@domain.com</a>
                            </li>
                            <li class="d-flex align-items-center mb-4">
                                <i
                                    class="icon icon-phone text-color-light text-5 font-weight-bold position-relative top-1 me-3-5"></i>
                                <a href="tel:8001234567"
                                    class="d-inline-flex align-items-center text-decoration-none text-color-light text-color-hover-primary font-weight-semibold text-4-5">800-123-4567</a>
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
                                <h4 class="text-color-light font-weight-bold mb-3">{{ __('head.nav') }}</h4>
                                <ul class="list list-unstyled columns-lg-2">
                                    <li><a href="{{ route('home') }}"
                                            class="text-color-grey text-color-hover-primary">{{ __('head.ho') }}</a>
                                    </li>
                                    <li><a href="{{ route('featured_sales') }}"
                                            class="text-color-grey text-color-hover-primary">{{ __('head.os') }}</a>
                                    </li>
                                    <li><a href="{{ route('visa_request') }}"
                                            class="text-color-grey text-color-hover-primary">{{ __('head.vi') }}</a>
                                    </li>
                                    <li><a href="#"
                                            class="text-color-grey text-color-hover-primary">{{ __('head.sc') }}</a>
                                    </li>

                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <h4 class="text-color-light font-weight-bold mb-3">{{ __('head.el') }}</h4>
                                <ul class="list list-unstyled columns-lg-2">
                                    <li><a href="{{ route('content_page') }}/about_us"
                                            class="text-color-grey text-color-hover-primary">{{ __('head.au') }}</a>
                                    </li>
                                    <li><a href="{{ url('/page/contact') }}"
                                            class="text-color-grey text-color-hover-primary">{{ __('head.cu') }}</a>
                                    </li>
                                    <li><a href="{{ url('/page/faq') }}"
                                            class="text-color-grey text-color-hover-primary">{{ __('head.faq') }}</a>
                                    </li>
                                    <li><a href="{{ route('content_page') }}/terms_conditions"
                                            class="text-color-grey text-color-hover-primary">{{ __('head.tc') }}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="footer-copyright bg-transparent">
                <div class="container">
                    <hr class="bg-color-light opacity-1">
                    <div class="row">
                        <div class="col mt-4 mb-4 pb-5">
                            <p class="text-center text-3 mb-0">{{ __('head.cp') }}</p>
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

    <!-- Theme Custom -->
    <script src="{{ asset('front-end/js/custom.js') }}"></script>
    <script src="{{ asset('front-end/js/examples/examples.particles.js') }}"></script>

    <!-- Theme Initialization Files -->
    <script src="{{ asset('front-end/js/theme.init.js') }}"></script>

    <!--Slider-->
    @stack('script')
    @yield('custom-scripts')
</body>

</html>
