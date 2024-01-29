<!-- <div class="body"> -->
    <nav class="ex-navbar navbar navbar-expand-md sticky-top px-0 bg-white" style="border-bottom: 1px solid #0043a6 ">
        <div class="container-fluid">
            <a href="{{ route('home') }}" class="d-block">
                <img alt="Direct" height="60px"  src="{{ asset('img/ksa_logo.png') }}">
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