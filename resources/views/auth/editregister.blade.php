@extends('layouts.app')

@section('content')

<body class="login">
    <div>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="POST" action="{{$url}}">
                @csrf
              <h1>{{$title}}</h1>
              <div class="">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name}}" required autocomplete="name" placeholder="Enter Your Name" autofocus>
    
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" placeholder="Enter Your Email" required autocomplete="email">
    
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter Password" required autocomplete="new-password">
    
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
            </div>
            <div class="">
<select class="form-control" name="usertype" id="usertype">
  <option value="users">User</option>
  <option value="admin">Admin</option>
  </select>  
          
          </div>
            <div class="">
                <div class="">
                    <button type="submit" class="btn btn-default submit">
                        {{ __('Register') }}
                    </button>
                </div>
            </div>
           

              <div class="clearfix"></div>

              <div class="separator">
              
      
                <div class="clearfix"></div>
                <br />
      
                <div>
                  <h1><i class="fa fa-paw"></i> Direct KSA</h1>
                  <p>©2023 All Rights Reserved. Direct KSA . Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
@endsection
