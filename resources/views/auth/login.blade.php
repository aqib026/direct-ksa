@extends('layouts.front-end')

@section('content')
    <section class="section border-0 bg-quaternary m-0 p-10">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp" class="img-fluid">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form method="POST" id='login_form' action="">
                    <input autocomplete="off" name="hidden" type="text" style="display: none;">                        
                    @csrf
                        <p class="lead fw-normal lg mb-0 me-3">Sign in with</p>

                        <!-- Selectors Buttons !-->
                        <!-- Selectors Buttons !-->
                        <div class='row'>
                            <div role="group" class="mb-1 btn-group btn-group-sm">
                                <button type="button" class="btn shadow-none btn-primary" id='phone_btn' onclick="showFields('phone')">Mobile No</button> 
                                <button type="button" class="btn shadow-none btn-outline-primary"  id='email_btn'  onclick="showFields('email')">Email</button>
                                
                            </div>
                        </div>
                        <!-- Selectors Buttons !-->
                        <!-- Selectors Buttons !-->


                        <!-- Phone Number For OTP !-->
                        <!-- Phone Number For OTP !-->
                        <div role="group" class="input-group" id='phone_field'><!----> 
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <span>+966</span>
                                </div>
                            </div> 
                            <input id="mobile" autocomplete="new-password" name="login-mobile" type="tel" placeholder="5xxxxxxxx" class="form-control is-invalid" dir="" aria-invalid="true"> 
                                <div class="input-group-append">
                                    <div class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="14px" height="14px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-smartphone"><rect x="5" y="2" width="14" height="20" rx="2" ry="2"></rect><line x1="12" y1="18" x2="12.01" y2="18"></line></svg>
                                </div>
                            </div><!---->
                        </div>                        
                        <!-- Phone Number For OTP !-->
                        <!-- Phone Number For OTP !-->

                        <!-- EMAIL EMAILEMAIL !-->
                        <div style="display: none;" id='email_field'>
                            <input id="email" autocomplete="new-password" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" placeholder="Enter Your Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        </div>
                        <!-- EMAIL EMAILEMAIL !-->

                        <!-- Password input -->
                        <div style="display: none;" id='password_field'>
                            <label class="form-label" for="form3Example4">Password</label>
                            <div >
                                <input id="password" autocomplete="new-password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" placeholder="Enter Your Password" name="password" autocomplete="current-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <!-- Checkbox -->
                            <div class="form-check mb-0">
                                <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                                <label class="form-check-label" for="form2Example3">
                                    Remember me
                                </label>
                            </div>
                            <a href="{{ route('password.request') }}" class="text-body">Forgot password?</a>
                        </div>

                        
                        <div class="text-center text-lg-start mt-4 pt-2" id='login_filed'>
                            <button type="button" id='login_with_OTP' class="btn btn-primary btn-lg submit">
                                Login With OTP
                            </button>

                            <button type="button" id='login_with_Pass' style='display:none'  class="btn btn-primary btn-lg submit">
                                Login
                            </button>

                            <p class="small fw-bold mt-2 pt-1 mb-0">  Sign In With <a href="javascript:void(0)" class="link-danger" onclick="showFields('password')">Password</a></p>

                            <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="{{url('/register')}}" class="link-danger">Register</a></p>


                        </div>
    
                    </form>
                </div>
            </div>
        </div>

    </section>
@endsection

@section('custom-scripts')
    <script>

    $(document).ready(function(){

        $('#login_with_OTP').click(function(){
            var password = $('#password').val();        
            var mobile = $('#mobile').val();        
            var email = $('#email').val();        

            if($('#email_field').css('display') == 'none' && mobile == ''){
                alert('Mobile Field is Empty');
                $('#mobile').focus()
                return false;

            }

            $('#login_form').attr('action', '/otp/generate');
            $('#login_form').submit();
        });        

        $('#login_with_Pass').click(function(){
            var password = $('#password').val();        
            var mobile = $('#mobile').val();        
            var email = $('#email').val();        

            if($('#email_field').css('display') == 'none' && mobile == ''){
                alert('Mobile Field is Empty');
                $('#mobile').focus()
                return false;

            }
            if($('#phone_field').css('display') == 'none' && email == ''){
                alert('Mobile Field is Empty');
                $('#mobile').focus()
                return false;
            }

            if(password == ''){
                alert('Password Field is Empty');
                $('#password').focus()
                return false;
            }

            $('#login_form').attr('action', '/login');
            $('#login_form').submit();
        });
    });
    function showFields(type){
        if(type == 'phone'){
            $('#email_field').hide();
            $('#phone_field').show();
            $('#login_field').show();
           
            
            $('#phone_btn').removeClass('btn-outline-primary');
            $('#phone_btn').addClass('btn-primary');

            $('#email_btn').addClass('btn-outline-primary');
            $('#email_btn').removeClass('btn-primary');
            
            
        }else if(type =='email')
        {
            $('#email_field').show();
            $('#phone_field').hide();
          


            $('#phone_btn').addClass('btn-outline-primary');
            $('#phone_btn').removeClass('btn-primary');

            $('#email_btn').addClass('btn-primary');
            $('#email_btn').removeClass('btn-outline-primary');
    }


            else if (type === 'password') {
                $('#password_field').show();
                $('#login_with_Pass').show();

        }
}

    </script>
@endsection
