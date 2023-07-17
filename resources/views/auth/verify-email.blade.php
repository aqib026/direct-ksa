@extends('layouts.front-end')

@section('content')
    <section class="section border-0 bg-quaternary m-0 p-10">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                         class="img-fluid" alt="Sample image">
                </div>


                        <div class="my-4 text-sm text-gray-600">
                            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                        </div>

                        @if (session('status') == 'verification-link-sent')
                            <div class="my-4 font-medium text-sm text-green-600">
                                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                            </div>
                        @endif

                        <div class="my-4 flex items-center justify-between">
                            <form method="POST" action="{{ route('verification.send') }}">
                                @csrf

                                <button type="submit" class="btn btn-primary ">
                                    {{ __('Resend Verification Email') }}
                                </button>
                            </form>
                            <div class="d-flex">
                            <div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <button type="submit" class="btn btn-outline-primary mt-2">
                                    {{ __('Log Out') }}
                                </button>
                            </form>
                            </div>
                                <div class="float-right mr-5" style="margin-left: 75%;">

                                <a href="{{url('user/dashboard')}}">    <button  class="btn btn-outline-primary mt-2">
                                        SKIP FOR NOW
                                    </button></a>

                                </div>
                            </div>


                </div>
            </div>
        </div>
    </section>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
@endsection

