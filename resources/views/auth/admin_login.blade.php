@extends('layouts.app')

@section('content')

      <div class="col-md-12 col-sm-12  " >
      <div class="login_wrapper">
      
        <div class="animate form login_form">
         
            <div class="x_panel">
            
    
              <div class="x_content">
    
    
                <div class="table-responsive">
          <section class="login_content">
            <form method="POST" action="{{ route('login') }}">
                @csrf
              <h1>Login Form</h1>
              <div class="">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter Your Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            
            <div class="">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter Your Password" name="password" required autocomplete="current-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="">
                <div class="">
                    <button type="submit" class="btn btn-dark submit">
                        {{ __('Login') }}
                    </button>

                    @if (Route::has('password.request'))
                        <a class="reset_pass" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>
            </div>
           

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">New to site?
                  <a href="{{url('/register')}}" class="to_register"> Create Account </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa-regular fa-paw"></i> Direct KSA</h1>
                  <p>©2023 All Rights Reserved. Direct KSA . Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
@endsection
