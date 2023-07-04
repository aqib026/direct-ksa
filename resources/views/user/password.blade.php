@extends('user.layout.dashboard')
@section('content')
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
<form method="POST" action="{{$url}}">
    @csrf
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Current Password<span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 ">
            <input id="current_password" type="Password" class="form-control @error('current_password') is-invalid @enderror" name="current_password"  required autocomplete="name" placeholder="Enter Your Current Password" autofocus>
            @error('current_password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="item form-group">
        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">New Password<span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 ">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter Password" autocomplete="new-password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="item form-group">
        <label for="middle-name" class="col-form-label col-md-4 col-sm-4 label-align">Confirm Password<span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 ">
            <input id="password-confirm" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" value="" placeholder="Confirm Password" autocomplete="new-password">
            @error('password_confirmation')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

   
    <div class="ln_solid"></div>
    <div class="item form-group">
        <div class="col-md-6 col-sm-6 offset-md-4">
          
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </div>
</form>
    
@endsection