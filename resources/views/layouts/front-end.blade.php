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
    
    @include('layouts.header')
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

    @include('layouts.footer')
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
