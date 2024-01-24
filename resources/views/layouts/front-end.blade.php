<!DOCTYPE html>
<html att=" {{ app()->getlocale() }}" lang="{{ app()->getlocale() == 'ar' ? 'ar' : 'en' }}" dir="{{ app()->getlocale() == 'ar' ? 'rtl' : 'ltr' }}" style="{{ app()->getlocale() == 'ar' ? 'rtl' : 'ltr' }}" direction="{{ app()->getlocale() == 'ar' ? 'rtl' : 'ltr' }}">

<head>

    <!-- Basic -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>EX VISAS</title>

    <meta name="keywords" content="Visa" />
    <meta name="description" content="EX-VISAS">
    <meta name="author" content="Brantum">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="img/apple-touch-icon.png') }} ">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

    <!-- Web Fonts  -->
    <!-- <link id="googleFonts"
        href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800%7CShadows+Into+Light&display=swap"
        rel="stylesheet" type="text/css"> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;600&display=swap" rel="stylesheet">

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

    <!-- Head Libs -->
    <script src="{{ asset('front-end/vendor/modernizr/modernizr.min.js') }}"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/fontawesome.min.css" integrity="sha512-SgaqKKxJDQ/tAUAAXzvxZz33rmn7leYDYfBP+YoMRSENhf3zJyx3SBASt/OfeQwBHA1nxMis7mM3EV/oYT6Fdw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/solid.min.js" integrity="sha512-apZ8JDL5kA1iqvafDdTymV4FWUlJd8022mh46oEMMd/LokNx9uVAzhHk5gRll+JBE6h0alB2Upd3m+ZDAofbaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @stack('link')

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{ asset('front-end/css/custom.css') }}">
</head>

<body>
    <!-- <div class="body"> -->
    <nav class="ex-navbar navbar navbar-expand-md sticky-top px-0 bg-white">
        <div class="container-fluid">
            <a href="{{ route('home') }}" class="d-block">
                <img alt="Direct" width="107" height="30" src="{{ asset('img/logo.svg') }}">
            </a>
            <!-- <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
            </button> -->
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title text-uppercase" id="offcanvasNavbarLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body align-items-center justify-content-center d-flex">
                    <ul class="navbar-nav text-uppercase position-absolute top-50 start-50 translate-middle">
                        <li class="nav-item">
                            <a href="{{ url('/') }}" class="nav-link active">
                                {{ __('head.ho') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('visa_request') }}" class="nav-link">
                                {{ __('head.vi') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                {{ __('head.sc') }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <ul class="navbar-nav ex-lang ms-auto mb-lg-0">
                <li class="nav-item dropdown me-3 me-md-0">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        @if (session()->get('locale') == 'ar')
                        {{ __('head.arb') }}
                        @else
                        {{ __('head.eng') }}
                        @endif
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="{{ url('/locale/en') }}" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>{{ __('head.eng') }}</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ url('/locale/ar') }}" {{ session()->get('locale') == 'ar' ? 'selected' : '' }}>{{ __('head.arb') }}</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    @if (Auth::check())
                    <a href="{{url('user/dashboard')}}"><button class="btn btn-secondary" type="button">{{__('userdashboard.dashboard')}}</button></a>
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded=""><i class="fas fa-chevron-down"></i></button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{ url('user/visa_requests') }}">{{__('userdashboard.visa')}}</a>
                        <a class="dropdown-item" href="{{ url('user/services') }}">{{__('userdashboard.services')}}</a>
                        <a class="dropdown-item" href="{{ url('/locale/en') }}">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-outline-primary">{{__('userdashboard.logout')}}</button>
                            </form>
                        </a>
                    </div>
                    @else
                    <div class="ml-md-2 ml-0"><a href="{{url('login')}}" class="d-block"><button type="button" class="btn btn-primary text-uppercase">Login</button></a></div>
                    @endif
                </li>
            </ul>
            <button class="navbar-toggler p-0 ms-3 ms-md-0 shadow-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <!-- <header id="header">
        <div class="header-body border-top-0 h-auto box-shadow-none">
            <div class="header-container header-container-height-sm container-fluid p-static">
                <div class="header-row">
                    <div class="header-column">
                        <div class="header-row">
                            <div class="header-logo d-block">
                                <a href="{{ route('home') }}"><img alt="Direct" width="107" height="30" src="{{ asset('img/logo.svg') }}"></a>
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
                                                <a href="{{ url('/') }}" class="nav-link active">
                                                    {{ __('head.ho') }}
                                                </a>
                                            </li>
                                            <li class="dropdown dropdown-mega">
                                                <a class="dropdown-item" href="{{ route('visa_request') }}">
                                                    {{ __('head.vi') }}
                                                </a>
                                            </li>
                                            <li class="dropdown">
                                                <a class="nav-link" href="">
                                                    {{ __('head.sc') }}
                                                </a>
                                            </li>
                                            <li class="dropdown" style="margin-top: 30px;">
                                                <button class="btn btn-outline-dark " type="button" data-bs-toggle="dropdown" aria-expanded="">
                                                    @if (session()->get('locale') == 'ar')
                                                        {{ __('head.arb') }}
                                                    @else
                                                        {{ __('head.eng') }}
                                                    @endif
                                                    <i class="fas fa-chevron-down"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="min-width:80px; width: 80px;">
                                                    <a class="dropdown-item" href="{{ url('/locale/en') }}"
                                                        {{ session()->get('locale') == 'en' ? 'selected' : '' }}>{{ __('head.eng') }}</a>
                                                    <a class="dropdown-item" href="{{ url('/locale/ar') }}"
                                                        {{ session()->get('locale') == 'ar' ? 'selected' : '' }}>{{ __('head.arb') }}</a>
                                                </div>
                                            </li>
                                            <li class="dropdown">
                                                @if (Auth::check())
                                                    <a href="{{url('user/dashboard')}}"><button class="btn btn-secondary" type="button">{{__('userdashboard.dashboard')}}</button></a>
                                                    <button class="btn btn-secondary  dropdown-toggle-split" type="button" data-bs-toggle="dropdown" aria-expanded="" style="margin-top: -4px;"><i class="fas fa-chevron-down"></i></button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="{{ url('user/visa_requests') }}">{{__('userdashboard.visa')}}</a>
                                                        <a class="dropdown-item" href="{{ url('user/services') }}">{{__('userdashboard.services')}}</a>
                                                        <a class="dropdown-item" href="{{ url('/locale/en') }}">
                                                            <form action="{{ route('logout') }}" method="POST">
                                                            @csrf
                                                                <button type="submit" class="btn btn-outline-primary">{{__('userdashboard.logout')}}</button>
                                                            </form>
                                                        </a>
                                                    </div>
                                                @else
                                                    <div class="ml-2" style="margin-top: 30px;"><a href="{{url('login')}}"><button type="button" class="btn btn-outline-primary">Login</button></a></div>
                                                @endif
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                                <button class="btn header-btn-collapse-nav" data-bs-toggle="collapse" data-bs-target=".header-nav-main nav" aria-expanded="true"><i class="fas fa-bars"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header> -->

    <div role="main" class="main">@yield('content')</div>

    <footer id="footer" class="position-relative dk-footer bg-dark border-top-0 pt-0 pt-md-4">
        <div class="container pt-5">
            <div class="row">
                <div class="col-lg-4 col-12">
                    <a href="{{ route('home') }}" class="text-decoration-none">
                        <img src="{{ asset('img/footer-logo.svg') }} " width="107" height="30" class="img-fluid mb-4" alt="Direct" />
                    </a>
                    <p class="text-3-5 font-weight-medium pe-lg-2 text-white">{{ __('head.lid') }} </p>

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
                <div class="col-lg-8 col-12">
                    <div class="row mb-5-5">
                        <div class="col-lg-4 col-md-6 mt-4 mt-md-4 mt-sm-4 mt-lg-0">
                            <h4 class="text-color-light fs-5 font-weight-bold mb-3">{{ __('head.nav') }}</h4>
                            <ul class="list list-unstyled">
                                <li><a href="{{ route('home') }}" class="text-white text-color-hover-primary">{{ __('head.ho') }}</a></li>
                                <li><a href="{{ route('featured_sales') }}" class="text-white text-color-hover-primary">{{ __('head.os') }}</a></li>
                                <li><a href="{{ route('visa_request') }}" class="text-white text-color-hover-primary">{{ __('head.vi') }}</a></li>
                                <li><a href="#" class="text-white text-color-hover-primary">{{ __('head.sc') }}</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-4 col-md-6 mt-4 mt-md-4 mt-sm-4 mt-lg-0">
                            <h4 class="text-color-light fs-5 font-weight-bold mb-3">{{ __('head.el') }}</h4>
                            <ul class="list list-unstyled">
                                <li><a href="{{ route('content_page') }}/about_us" class="text-white text-color-hover-primary">{{ __('head.au') }}</a></li>
                                <li><a href="{{ url('/page/contact') }}" class="text-white text-color-hover-primary">{{ __('head.cu') }}</a></li>
                                <li><a href="{{ url('/page/faq') }}" class="text-white text-color-hover-primary">{{ __('head.faq') }}</a></li>
                                <li><a href="{{ route('content_page') }}/terms_conditions" class="text-white text-color-hover-primary">{{ __('head.tc') }}</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-4 col-md-6 mt-4 mt-md-4 mt-sm-4 mt-lg-0">
                            <ul class="list list-unstyled">
                                <li class="d-flex align-items-center mb-4">
                                    <i class="icon icon-envelope text-color-light text-5 font-weight-bold position-relative top-1 me-3-5"></i>
                                    <a href="mailto:company@business-consulting-4.com" class="d-inline-flex align-items-center text-decoration-none text-color-light text-color-hover-primary font-weight-regular fs-6">company@domain.com</a>
                                </li>
                                <li class="d-flex align-items-center mb-4">
                                    <i class="icon icon-phone text-color-light text-5 font-weight-bold position-relative top-1 me-3-5"></i>
                                    <a href="tel:8001234567" class="d-inline-flex align-items-center text-decoration-none text-color-light text-color-hover-primary font-weight-regular fs-6">800-123-4567</a>
                                </li>
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
        <div class="footer-copyright bg-black text-center py-3">
            <div class="container">
                <p class="text-center text-3 mb-0 text-white">{{ __('head.cp') }}</p>
            </div>
        </div>
    </footer>
    <!-- </div> -->

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