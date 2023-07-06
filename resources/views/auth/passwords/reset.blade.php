
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
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                       <h1>{{ __('Reset Password') }}</h1>
                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="">
                            <label class="form-label" for="form3Example3">Email address</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

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

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
@endsection
