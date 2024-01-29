@extends('layouts.front-end')
@section('content')
    <div role="main" class="main" style="padding-top: 100px;">
        <div class="container-fluid">
            <div class="container">
                @if (!Auth::user()->phone_verified)
                    <div class="alert alert-danger" role="alert">
                        Please verify your phone number. <a href="{{ url('otp/login') }}" class="alert-link">Click here</a> to
                        go to the verification page.
                    </div>
                @endif
                @if (!Auth::user()->email_verified)
                    <div class="alert alert-danger" role="alert">
                        Please verify your email address. <a href="{{ route('verification.notice') }}"
                            class="alert-link">Click here</a> to go to the verification page.
                    </div>
                @endif
            </div>
            <div class="row mt-5">
                <div class="col-md-3">
                    <ul class="list-group flex-column mb-auto">
                        <li class="list-group-item">
                            <a href="/" class="nav-link link-dark">
                                <svg class="bi me-2" width="16" height="16">
                                    <use xlink:href="#home"></use>
                                </svg>
                                {{ __('userdashboard.home') }}
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ route('visarequests') }}" class="nav-link link-dark">
                                <svg class="bi me-2" width="16" height="16">
                                    <use xlink:href="#speedometer2"></use>
                                </svg>
                                {{ __('userdashboard.visa') }}
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ route('services') }}" class="nav-link link-dark">
                                <svg class="bi me-2" width="16" height="16">
                                    <use xlink:href="#table"></use>
                                </svg>
                                {{ __('userdashboard.services') }}
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ url('user/profile') }}" class="nav-link link-dark">
                                <svg class="bi me-2" width="16" height="16">
                                    <use xlink:href="#grid"></use>
                                </svg>
                                {{ __('userdashboard.update') }}
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ url('user/password') }}" class="nav-link link-dark">
                                <svg class="bi me-2" width="16" height="16">
                                    <use xlink:href="#grid"></use>
                                </svg>
                                {{ __('userdashboard.password') }}
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a class="nav-link link-dark" href="{{ route('logout') }}"
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

                <div class="col-md-9">
                    @yield('content')
                </div>
            </div>

        </div>
    </div>
@endsection
