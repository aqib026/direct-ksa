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
    @yield('styles')
</head>

<body>
    
    @include('layouts.header')
    

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
