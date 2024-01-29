@extends('user.layout.dashboard')
@section('content')
    <section class="section border-0 bg-quaternary m-0 p-10 auth-card">
        <div class="container">
            <div class="row align-items-center justify-content-center">

                <div class="col-lg-6 col-12">
                    <div class="auth-title text-center">
                        <h1 class="fs-6 ">Update Password</h1>
                    </div>
                    <div class="auth-bg bg-white rounded-4 py-2 px-md-5 px-3 mt-4">
                        <form method="POST" action="{{ $url }} ">
                            @csrf
                            <div class="mt-4">
                                <label class="form-label" for="form3Example3">Current Password</label>
                                <input id="current_password" type="Password"
                                    class="form-control @error('current_password') is-invalid @enderror"
                                    name="current_password" required autocomplete="name"
                                    placeholder="Enter Your Current Password" autofocus>
                                @error('current_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mt-3">
                                <label class="form-label" for="form3Example3">New Password</label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    placeholder="Enter Password" autocomplete="new-password" required>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mt-3">
                                <label class="form-label" for="form3Example3">Confirm New Password</label>

                                <input id="password-confirm" type="password"
                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                    name="password_confirmation" value="" placeholder="Confirm Password"
                                    autocomplete="new-password" required>
                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <br>

                            <div class="mt-2 mb-4">
                                <button type="submit" class="btn btn-primary submit d-block w-100"
                                    style="background: #0069d9 !important ;border:#0069d9">
                                    Update
                                </button>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
