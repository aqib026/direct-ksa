@extends('layouts.front-end')

@section('content')
    <section class="section border-0 bg-quaternary m-0 p-10 auth-card">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-lg-6 col-12">
                    <div class="auth-title text-center">
                        <h1 class="fs-5 fw-bold text-capitalize">{{ __('login.sign_in_with') }}</h1>
                    </div>
                    <div class="auth-bg bg-white rounded-4 py-3 px-md-5 px-3 mt-4">
                        <form method="POST" id='login_form' action="" class="auth-form">
                            <input autocomplete="off" name="hidden" type="text" style="display: none;">
                            @csrf

                            <div class='row' dir="ltr">
                                <div role="group" class="mb-1 btn-group btn-group-sm">
                                     <button type="button" class="btn shadow-none btn-primary py-2" id='phone_btn'
                                        onclick="showFields('phone')">{{ __('login.mobile_no') }} </button>
                                        
                                    <button type="button" class="btn shadow-none btn-outline-primary py-2" id='email_btn'
                                        onclick="showFields('email')">{{ __('login.email') }}</button>
                                </div>
                            </div>

                            <div role="group" class="input-group mt-3" id='phone_field' dir="ltr">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <span>+966</span>
                                    </div>
                                </div>
                                <input id="mobile" autocomplete="new-password" name="number" type="tel"
                                    placeholder="5xxxxxxxx" class="form-control"
                                    onkeypress="return (event.charCode >= 48 && event.charCode <= 57)"
                                    onpaste="return (event.charCode>=48 && event.charCode<=57)"
                                    oninput="validateInputLength(this)" @if ($errors->has('number'))
                                data-error="true"
                                @endif dir=""
                                aria-invalid="true" minlength="9"  maxlength="20">
                                <div class="input-group-append">
                                    <div class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="14px"
                                            height="25px" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-smartphone">
                                            <rect x="5" y="2" width="14" height="20" rx="2" ry="2">
                                            </rect>
                                            <line x1="12" y1="18" x2="12.01" y2="18"></line>
                                        </svg>
                                    </div>

                                </div>

                                @if ($errors->has('number'))
                                    <span style="color: red;font-size:16px" role="alert">
                                        <strong>{{ $errors->first('number') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <small id="numberError" role="alert" style="color: red;"></small>
                            <div style="display: none;" id='email_field' class="mt-3">
                                <label class="form-label" for="form3Example4">{{ __('login.email') }}</label>
                                <input id="email" autocomplete="new-password" type="email"
                                    class="form-control form-control-lg "
                                    @if ($errors->has('email')) data-error="true" @endif
                                    placeholder="{{ __('login.enter_your_email') }}" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @if ($errors->has('email'))
                                    <span style="color: red;font-size:16px" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>


                            <div style="display: none;" id='password_field' class="mt-3">
                                <label class="form-label" for="form3Example4">{{ __('login.password') }}</label>
                                <div>
                                    <input id="password" autocomplete="new-password" type="password"
                                        class="form-control form-control-lg @error('password') is-invalid @enderror"
                                        placeholder="{{ __('login.enter_your_password') }}" name="password"
                                        autocomplete="current-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="d-flex justify-content-between align-items-center mt-4">
                                <div class="form-check mb-0">
                                    <input class="form-check-input me-2" type="checkbox" value=""
                                        id="form2Example3" />
                                    <label class="form-check-label text-dark" for="form2Example3">
                                        {{ __('login.remember_me') }}
                                    </label>
                                </div>
                                <a href="{{ route('password.request') }}"
                                    class="text-body">{{ __('login.forgot_password') }}</a>
                            </div>

                            @if (session()->has('general-error'))
                                <span style="color: red;font-size:16px" role="alert">
                                    <strong>{{ session()->get('general-error') }}</strong>
                                </span>
                            @endif
                            @if (session()->has('error'))
                            <span style="color: red;font-size:16px" role="alert">
                                <strong>{{ session()->get('error') }}</strong>
                            </span>
                        @endif
                            <div class="text-center text-lg-start mt-4 pt-2" id='login_filed'>
                                <button type="button" id='login_with_OTP'
                                    class="btn btn-primary btn-lg submit d-block w-100">
                                    {{ __('login.login_with_otp') }}
                                </button>

                                <button type="button" id='login_with_Pass' style='display:none'
                                    class="btn btn-primary btn-lg submit w-100 mt-3">
                                    {{ __('login.login') }}
                                </button>

                                <p class="small fw-bold mt-2 pt-1 mb-0"> {{ __('login.sign_in_with_password') }} <a
                                        href="javascript:void(0)" class="link-danger"
                                        onclick="showFields('password')">{{ __('login.password') }}</a></p>

                                <p class="small fw-bold mt-2 mb-0">{{ __('login.dont_have_account') }} <a
                                        href="{{ url('/register') }}" class="link-danger">{{ __('login.register') }}</a>
                                </p>


                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection

@section('custom-scripts')
    <script>
        $(document).ready(function() {
            // showFields('email');
            if ($('input[name="number"]').data('error')) {
                // Mobile field has an error, open mobile tab
                showFields('phone');
            } else if ($('input[name="email"]').data('error')) {
                // Email field has an error, open email tab
                showFields('email');
            }
            $('#email').on('input', function() {
                $('#mobile').val(''); // Clear phone number when email is filled
            });

            $('#mobile').on('input', function() {
                $('#email').val(''); // Clear email when phone number is filled
            });
            $('#login_with_OTP').click(function() {
                var password = $('#password').val();
                var mobile = $('#mobile').val();
                var email = $('#email').val();

                if ($('#email_field').css('display') == 'none' && mobile == '') {
                    alert('Mobile Field is Empty');
                    $('#mobile').focus()
                    return false;

                }
                if ($('#phone_field').css('display') == 'none' && email == '') {
                    alert('Email Field is Empty');
                    $('#email').focus()
                    return false;

                }

                $('#login_form').attr('action', '/otp/generate');
                $('#login_form').submit();
            });

            $('#login_with_Pass').click(function() {
                var password = $('#password').val();
                var mobile = $('#mobile').val();
                var email = $('#email').val();

                if ($('#phone_field').css('display') != 'none' && mobile == '') {
                    alert('Mobile Field is Empty');
                    $('#mobile').focus()
                    return false;
                }
                if ($('#email_field').css('display') != 'none' && email == '') {
                    alert('Email Field is Empty');
                    $('#email').focus()
                    return false;
                }

                if (password == '') {
                    alert('Password Field is Empty');
                    $('#password').focus()
                    return false;
                }

                $('#login_form').attr('action', '/login');
                $('#login_form').submit();
            });
        });

        function showFields(type) {

            if (type === 'phone') {
                $('#email_field').hide();
                $('#phone_field').show();
                $('#login_field').show();


                $('#phone_btn').removeClass('btn-outline-primary');
                $('#phone_btn').addClass('btn-primary');

                $('#email_btn').addClass('btn-outline-primary');
                $('#email_btn').removeClass('btn-primary');


            } else if (type === 'email') {
                $('#email_field').show();
                $('#phone_field').hide();



                $('#phone_btn').addClass('btn-outline-primary');
                $('#phone_btn').removeClass('btn-primary');

                $('#email_btn').addClass('btn-primary');
                $('#email_btn').removeClass('btn-outline-primary');
            } else if (type === 'password') {
                $('#password_field').show();
                $('#login_with_Pass').show();

            }
        }
    </script>
@endsection
