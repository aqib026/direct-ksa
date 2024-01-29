@extends('user.layout.dashboard')
@section('content')
   
    <section class="section border-0 bg-quaternary m-0 p-10 auth-card">
        <div class="container">
            <div class="row align-items-center justify-content-center">

                <div class="col-lg-6 col-12">
                    <div class="auth-title text-center">
                        <h1 class="fs-6 " >Update Profile</h1>
                    </div>
                    <div class="auth-bg bg-white rounded-4 py-2 px-md-5 px-3 mt-4">
                        <form method="POST" action="{{$url}} ">
                            @csrf
                            <div class="mt-4">
                                <label class="form-label" for="form3Example3" >Name</label>
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name', isset($user) ? $user->name : '') }}" required autocomplete="name"
                                    placeholder="Enter Your Name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mt-3">
                                <label class="form-label" for="form3Example3" >Email address</label>
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('name', isset($user) ? $user->email : '') }}"
                                    placeholder="Enter Your Email" required autocomplete="email" readonly>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mt-3">
                                <label class="form-label" for="form3Example3"  >Number</label>

                                <input id="number" type="text"
                                    class="form-control @error('number') is-invalid @enderror" name="number"
                                    value="{{ old('name', isset($user) ? $user->number : '') }}"
                                    placeholder="Enter Your Number" required autocomplete="email">
                                @error('number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <br>

                            <div class="mt-2 mb-4">
                                <button type="submit" class="btn btn-primary submit d-block w-100" style="background: #0069d9 !important ;border:#0069d9" >
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
