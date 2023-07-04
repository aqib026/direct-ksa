@extends('user.layout.dashboard')
@section('content')
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<form method="POST" action="{{$url}}">
    @csrf
    <div class="item form-group">
        <label class="col-form-label col-md-4 col-sm-4 label-align" for="first-name">Name <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 ">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', isset($user) ? $user->name : '') }}" required autocomplete="name" placeholder="Enter Your Name" autofocus>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="email">Email <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 ">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('name', isset($user) ? $user->email : '') }}" placeholder="Enter Your Email" required autocomplete="email" readonly>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="number">Phone Number <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 ">
            <input id="number" type="number" class="form-control @error('number') is-invalid @enderror" name="number" value="{{ old('name', isset($user) ? $user->number : '') }}" placeholder="Enter Your Number" required autocomplete="email">
            @error('number')
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