@extends('layouts.front-end')

@section('content')
    <section class="section border-0 bg-quaternary m-0 p-10 auth-card">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6 col-12">
                    <div class="auth-title text-center">
                        <h1 class="fs-5 fw-bold">{{ __('register.create_account') }}</h1>
                    </div>
                    <div class="auth-bg bg-white rounded-4 py-2 px-md-5 px-3 mt-4">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="mt-4">
                                <label class="form-label" for="form3Example3">{{ __('register.name') }}</label>
                                <input id="name" type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="{{ __('register.enter_your_name') }}" autofocus>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                            <div class="mt-3">
                                <label class="form-label" for="form3Example3">{{ __('register.email_address') }}</label>
                                <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="{{ __('register.enter_your_email') }}" required autocomplete="email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                            <div class="mt-3">
                                <label class="form-label" for="form3Example3">{{ __('register.password') }}</label>
                                <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" placeholder="{{ __('register.enter_password') }}" required autocomplete="new-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                            <div class="mt-3">
                                <label class="form-label" for="form3Example3">{{ __('register.confirm_password') }}</label>
                                <input id="password-confirm" type="password" class="form-control form-control-lg" name="password_confirmation" placeholder="{{ __('register.enter_password') }}" required autocomplete="new-password">
                            </div>
                            <div class="mt-3">
                                <label class="form-label" for="form3Example3">{{ __('register.phone_number') }}</label>
                                <input id="mobile" autocomplete="new-password" name="number" type="tel"
                                       placeholder="+966xxxxxxxxx" class="form-control "
                                       onkeypress="return (event.charCode >= 48 && event.charCode <= 57)"
                                       @if ($errors->has('number')) data-error="true" @endif dir=""
                                       aria-invalid="true" maxlength="13">
                                @error('number')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                            <br>
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary submit d-block w-100">
                                    {{ __('register.register') }}
                                </button>
                            </div>
                            <div class="clearfix"></div>
                            <div class="separator mt-3">
                                <p class="change_link">{{ __('register.already_member') }}
                                    <a href="{{ url('/login') }}" class="to_register"> {{ __('register.log_in') }} </a>
                                </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
