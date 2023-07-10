@extends('layouts.front-end')
@section('content')
    <section class="section border-0 bg-quaternary m-0 p-10">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp" class="img-fluid">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form method="POST" action="{{ route('otp.generate') }}">
                        @csrf
                        <p class="lead fw-normal lg mb-0 me-3">{{ __('Varification') }}</p>
                        @if (session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                    @endif
                    <!-- Email input -->
                        <label class="form-label" for="form3Example3">Mobile Number</label>

                        <div class="">
                            <input id="number" type="number" class="form-control @error('number') is-invalid @enderror" name="number" value="{{  Auth::user()->number }}" required autocomplete="number" autofocus>

                            @error('number')
                            <span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
                            @enderror
                        </div>

                        <!-- Password input -->
                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Send OTP') }}
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </section>
@endsection
