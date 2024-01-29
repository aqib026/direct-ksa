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
    <title>EX VISAS</title>
    <meta name="keywords" content="Visa" />
    <meta name="description" content="Direct-KSA">
    <meta name="author" content="Brantum">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
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
    <style>
        .active {
            border-radius: 6px !important;
            background: #F3F6F9 !important;
        }

        .sidebar a {
            color: #0043a6 !important;
            border-radius: 6px;
            text-align: justify;
            text-transform: uppercase;
        }

        .sidebar a:hover {
            background: #F3F6F9;
            color: #0043a6 !important;
            border-radius: 6px
        }

        .sidebar a:focus {
            background: #F3F6F9;
            color: #0043a6;
            border-radius: 6px
        }

        .alert-danger {
            color: #161414;
            font-family: 'circular';
            font-size: 14px
        }
        .alert-link{
            color: #161414 !important;
        }
    </style>
</head>

<body>
    <div class="body">
        @include('user.layout.header')
        <div class="col-md-5 mt-2 ">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            @php
            $error_message='';
            @endphp
            @if (!Auth::user()->phone_verified)
            @php
            $error_message .= 'Please verify your phone number <a href="' . url('otp/login') . '" class="alert-link">Click here</a> to go to the verification page.<br>';
            @endphp
            @endif
            @if (!Auth::user()->email_verified)
            @php
            $error_message.=' Please verify your email address. <a href="'. route('verification.notice') .'"
                        class="alert-link">Click here</a> to go to the verification page.';
            @endphp
                
            @endif
            @if(strlen($error_message)>0)
            <div class="alert alert-danger " role="alert">
                   {!!$error_message!!}
            </div>
            @endif
        </div>

        <div role="main" class="main">
            <div class="container-fluid">


                <div class="row mt-5 me-1 mb-4">
                    <div class="col-md-3">
                        <ul class="list-group flex-column mb-auto">


                            <li class="list-group-item sidebar">
                                <a href="{{ route('user-dashboard') }}"
                                    class="nav-link  {{ request()->routeIs('user-dashboard') ? 'active' : '' }} text-decoration-none">
                                    <svg class="bi me-2" width="16" height="16">
                                        <use xlink:href="#home"></use>
                                    </svg>
                                    {{ __('userdashboard.home') }}
                                </a>
                            </li>
                            <li class="list-group-item sidebar">
                                <a href="{{ route('visarequests') }}"
                                    class="nav-link {{ request()->routeIs('visarequests') ? 'active' : '' }}   text-decoration-none">
                                    <svg class="bi me-2" width="16" height="16">
                                        <use xlink:href="#speedometer2"></use>
                                    </svg>
                                    {{ __('userdashboard.visa') }}
                                </a>
                            </li>
                            <li class="list-group-item sidebar">
                                <a href="{{ route('services') }}"
                                    class="nav-link {{ request()->routeIs('services') ? 'active' : '' }}    text-decoration-none">
                                    <svg class="bi me-2" width="16" height="16">
                                        <use xlink:href="#table"></use>
                                    </svg>
                                    {{ __('userdashboard.services') }}
                                </a>
                            </li>
                            <li class="list-group-item sidebar">
                                <a href="{{ url('user/profile') }}"
                                    class="nav-link {{ request()->routeIs('user-profile') ? 'active' : '' }}    text-decoration-none">
                                    <svg class="bi me-2" width="16" height="16">
                                        <use xlink:href="#grid"></use>
                                    </svg>
                                    {{ __('userdashboard.update') }}
                                </a>
                            </li>
                            <li class="list-group-item sidebar">
                                <a href="{{ url('user/password') }}"
                                    class="nav-link {{ request()->routeIs('user-password') ? 'active' : '' }}  text-decoration-none">
                                    <svg class="bi me-2" width="16" height="16">
                                        <use xlink:href="#grid"></use>
                                    </svg>
                                    {{ __('userdashboard.password') }}
                                </a>
                            </li>
                            <li class="list-group-item sidebar">
                                <a class="nav-link   text-decoration-none ms-2 {{ request()->routeIs('logout') ? 'active' : '' }}"
                                    href="{{ route('logout') }}"
                                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    <svg class="bi me-2" width="16" height="16">
                                        <use xlink:href="#grid"></use>
                                    </svg>{{ __('userdashboard.logout') }}</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>

                    </div>

                    <div class="col-md-9" style="background: #F3F6F9">
                        @yield('content')
                    </div>
                </div>



            </div>
        </div>
        @include('user.layout.footer')

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
