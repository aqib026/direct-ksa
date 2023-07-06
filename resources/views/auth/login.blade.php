@extends('layouts.front-end')

@section('content')
    <section class="section border-0 bg-quaternary m-0 p-10">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp" class="img-fluid">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <p class="lead fw-normal lg mb-0 me-3">Sign in with</p>
                        <!-- Email input -->
                        <label class="form-label" for="form3Example3">Email address</label>
                        <div class="">
                            <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" placeholder="Enter Your Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
                            @enderror
                        </div>
                        <!-- Password input -->
                        <label class="form-label" for="form3Example4">Password</label>
                        <div class="">
                            <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" placeholder="Enter Your Password" name="password" required autocomplete="current-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <!-- Checkbox -->
                            <div class="form-check mb-0">
                                <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                                <label class="form-check-label" for="form2Example3">
                                    Remember me
                                </label>
                            </div>
                            <a href="{{ route('password.request') }}" class="text-body">Forgot password?</a>
                        </div>

                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="submit" class="btn btn-primary btn-lg submit">
                                {{ __('Login') }}
                            </button>
                            <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="{{url('/register')}}" class="link-danger">Register</a></p>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </section>
@endsection
