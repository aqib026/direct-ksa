<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Direct KSA </title>

    <!-- Bootstrap -->
    
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
     <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <!-- NProgress -->
      <link rel="stylesheet" href="{{ asset('css/nprogress.css') }}">
   
    <!-- Custom Theme Style -->
    <link rel="stylesheet" href="{{ asset('css/custom.min.css') }}">
    <!-- Animate.css -->
    <link href="{{asset('css/animate.min.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
 
  </head>

<body>
 

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
