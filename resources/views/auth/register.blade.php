@extends('layouts.front-end')

@section('content')
<section class="section border-0 bg-quaternary m-0 p-10 auth-card">
    <div class="container">
        <div class="row align-items-center justify-content-center">

            <!-- <div class="col-lg-6 col-12">
                    <div>
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp" class="img-fluid" alt="Sample image">
                    </div>
                </div> -->

            <div class="col-lg-6 col-12">
                <div class="auth-title text-center">
                    <h1 class="fs-5 fw-bold">Create Account</h1>
                </div>
                <div class="auth-bg bg-white rounded-4 py-2 px-md-5 px-3 mt-4">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="mt-4">
                            <label class="form-label" for="form3Example3">Name</label>
                            <input id="name" type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Enter Your Name" autofocus>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <label class="form-label" for="form3Example3">Email address</label>
                            <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter Your Email" required autocomplete="email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <label class="form-label" for="form3Example3">Password</label>
                            <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" placeholder="Enter Password" required autocomplete="new-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <label class="form-label" for="form3Example3">Confirm Password</label>
                            <input id="password-confirm" type="password" class="form-control form-control-lg" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
                        </div>
                        <div class="mt-3">
                            <label class="form-label" for="form3Example3">Phone Number</label>

                            <input id="number" type="text" class="form-control form-control-lg @error('number') is-invalid @enderror" name="number" value="{{ old('number') }}" placeholder="Enter Your Number" required autocomplete="number">
                            @error('number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <br>

                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary submit d-block w-100">
                                {{ __('Register') }}
                            </button>
                        </div>

                        <div class="clearfix"></div>
                        <div class="separator mt-3">
                            <p class="change_link">Already a member ?
                                <a href="{{ url('/login') }}" class="to_register"> Log in </a>
                            </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
@endsection