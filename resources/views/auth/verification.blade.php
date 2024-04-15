@extends('layouts.front-end')
@section('content')
    <section class="section border-0 bg-quaternary m-0 p-10">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                        class="img-fluid">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form method="POST" action="{{ route('otp.getlogin') }}">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        <p class="lead fw-normal lg mb-0 me-3">{{ __('otp.varification') }}</p>
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                        <!-- Email input -->
                        <label class="form-label" for="form3Example3">{{ __('otp.enter_otp') }}</label>

                        <div class="">
                            <input id="otp" type="number" class="form-control @error('number') is-invalid @enderror"
                                name="otp" value="{{ old('otp') }}" required placeholder="Enter Your OTP">

                            @error('otp')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            @if ($errors->has('number'))
                                <span style="color: red;font-size:16px" role="alert">
                                    <strong>{{ $errors->first('number') }}</strong>
                                </span>
                            @endif
                            @if ($errors->has('email'))
                                <span style="color: red;font-size:16px" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <!-- Password input -->
                        <div class="text-center text-lg-start mt-4 pt-2">
                            @php
                                $content =
                                    " <div class='visa-type-btn-div'>
                                    <a  class='btn btn-popover-custom btn-lg btn-primary resend_otp_btn' id='resend_otp_btn_mobile' >" .
                                    __('otp.select_mobile') .
                                    "</a>
                                    <a  class='btn btn-popover-custom btn-lg btn-primary resend_otp_btn' id='resend_otp_btn_email' >" .
                                    __('otp.select_email') .
                                    '</a>
                                    </div>';
                            @endphp

                            <a tabindex="0" class="btn  btn-primary" role="button" data-bs-sanitize="false"
                                data-bs-placement="bottom" data-bs-toggle="popover"
                                data-bs-title="{{ __('otp.select_medium') }}" data-bs-html="true"
                                data-bs-content="{!! $content !!}">{{ __('otp.resend_opt') }}</a>
                            <button type="submit" class="btn btn-primary">
                                {{ __('otp.enter') }}
                            </button>

                        </div>

                    </form>
                    <form method="POST" action="{{ route('otp.generate') }}" id="resend_otp">
                        @csrf
    
                        <input type="hidden" name="number" id="number_field"  />
                        <input type="hidden" name="email" id="email_field"   />
                        <input type="hidden" name="merge_number" value=false   />

                    </form>

                </div>
            </div>
        </div>

    </section>
@endsection
@section('styles')
    <style>
        a:not([href]):not([tabindex]) {
            color: #fff;
        }
    </style>
@endsection
@section('custom-scripts')
    <script>
        $(document).ready(function() {

            $(document).on("click", ".resend_otp_btn", function() {
                if ($(this).attr('id') == "resend_otp_btn_mobile") {
                    var user_mobile='<?php echo $user->number ;?>';
                    $('#number_field').val(user_mobile);
                }
                if ($(this).attr('id') == "resend_otp_btn_email") {
                    var user_email='<?php echo $user->email ;?>';
                    $('#email_field').val(user_email);
                }
                $("#resend_otp").submit();

            });
        });
    </script>
@endsection
