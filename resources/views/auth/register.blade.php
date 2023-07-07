
@extends('layouts.front-end')

@section('content')
    <section class="section border-0 bg-quaternary m-0 p-10">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                        class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <h1>Create Account</h1>
                        <div class="">
                            <label class="form-label" for="form3Example3">Name</label>
                            <input id="name" type="text"
                                class="form-control form-control-lg @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name') }}" required autocomplete="name" placeholder="Enter Your Name"
                                autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="">
                            <label class="form-label" for="form3Example3">Email address</label>
                            <input id="email" type="email"
                                class="form-control form-control-lg @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" placeholder="Enter Your Email" required
                                autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="">
                            <label class="form-label" for="form3Example3">Password</label>
                            <input id="password" type="password"
                                class="form-control form-control-lg @error('password') is-invalid @enderror"
                                name="password" placeholder="Enter Password" required autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="">
                            <label class="form-label" for="form3Example3">Confirm Password</label>
                            <input id="password-confirm" type="password" class="form-control form-control-lg"
                                name="password_confirmation" placeholder="Confirm Password" required
                                autocomplete="new-password">
                        </div>
                        <div class="">
                            <label class="form-label" for="form3Example3">Phone Number</label>

                            <input id="number" type="number"
                                class="form-control form-control-lg @error('number') is-invalid @enderror"
                                 name="number" value="{{ old('number') }}" placeholder="Enter Your Number" required
                                autocomplete="number">
                            @error('number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <br>
                        <div class="">
                            <div class="">
                                <button type="submit" class="btn btn-dark submit">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="separator">
                            <p class="change_link">Already a member ?
                                <a href="{{ url('/login') }}" class="to_register"> Log in </a>
                            </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
@endsection
