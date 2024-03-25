@extends('layouts.front-end')

@section('content')
    <section class="section border-0 bg-transparent m-0" dir="{{ app()->getlocale() == 'en' ? 'ltr' : 'rtl' }}">
        @if (session()->has('success'))
            <div class="col-md-6 alert alert-success" role="alert">
                {!! session()->get('success') !!}
            </div>
        @endif
        @if (session()->has('error'))
            <div class="col-md-6 alert alert-danger" role="alert">
                {!! session()->get('error') !!}
            </div>
        @endif
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="divider divider-small divider-small-lg mt-0 text-center appear-animation"
                        data-appear-animation="fadeInUpShorter" data-appear-animation-delay="0">
                        <hr class="bg-primary border-radius m-auto">
                    </div>
                    <div class="overflow-hidden mb-1">
                        <h3 class="font-weight-semi-bold text-color-grey text-uppercase positive-ls-3 text-4 line-height-2 line-height-sm-7 mb-0 appear-animation"
                            data-appear-animation="maskUp" data-appear-animation-delay="100">{{ __('contact.Contact') }}
                        </h3>
                    </div>
                    <h2 class="text-color-dark font-weight-bold text-8 pb-2 mb-4 appear-animation"
                        data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">{{ __('contact.loc') }}
                    </h2>
                </div>
            </div>
            <div class="row col-md-12">
                <div class="accordion accordion-modern-status accordion-modern-status-primary" id="accordion100">
                    @foreach ($page_data as $contact)
                        @if ($contact->status == 1)
                            <div class="card card-default">
                                <div class="card-header" id="collapseHeading{{ $loop->iteration }}">
                                    <h4 class="card-title m-0">
                                        <a class="accordion-toggle text-color-dark font-weight-bold @if ($loop->first) @else collapsed @endif"
                                            data-bs-toggle="collapse" data-bs-target="#collapse{{ $loop->iteration }}"
                                            aria-expanded="false"
                                            aria-controls="collapse{{ $loop->iteration }}">{{ Str::title($contact->name) }}</a>
                                    </h4>
                                </div>
                                <div id="collapse{{ $loop->iteration }}"
                                    class="@if ($loop->first) show @else collapse @endif"
                                    aria-labelledby="collapseHeading{{ $loop->iteration }}"
                                    data-bs-parent="#accordion{{ $loop->iteration }}">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4 col-sm-12">
                                                <div class="feature-box feature-box-primary mb-4">
                                                    <div class="feature-box-icon border-radius-2">
                                                        <i class="fas fa-map-marker-alt"></i>
                                                    </div>
                                                    <div class="feature-box-info">
                                                        <p class="text-3-5 font-weight-medium mt-1 mb-0 negative-ls-05">
                                                            {{ $contact->address }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-sm-12">
                                                <iframe
                                                    src="https://www.google.com/maps/embed/v1/place?key=&q={{ $contact->latitude }},{{ $contact->longitude }}"></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="row">
                <div class="col text-center">
                    <h2 class="text-color-dark font-weight-bold text-8 pb-2 mb-4 appear-animation"
                        data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">
                        {{ __('contact.contact_us_form_heading') }} </h2>
                </div>

                <section class="section border-0 bg-quaternary m-0 p-10 auth-card">
                    <div class="container">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-lg-6 col-12">
                                <div class="auth-bg bg-white rounded-4 py-2 px-md-5 px-3 mt-4">
                                    <form method="POST" action="{{ route('contact-query-post') }}" id="contact_us_query">
                                        @csrf
                                        <div class="mt-4">
                                            <label class="form-label" for="form3Example3">{{ __('register.name') }}</label>
                                            <input id="name" type="text"
                                                class="form-control form-control-lg @error('name') is-invalid @enderror"
                                                name="name" value="{{ old('name') }}" required autocomplete="name"
                                                placeholder="{{ __('register.enter_your_name') }}" autofocus>
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="mt-3">
                                            <label class="form-label"
                                                for="form3Example3">{{ __('register.email_address') }}</label>
                                            <input id="email" type="email"
                                                class="form-control form-control-lg @error('email') is-invalid @enderror"
                                                name="email" value="{{ old('email') }}"
                                                placeholder="{{ __('register.enter_your_email') }}" required
                                                autocomplete="email">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="mt-3">
                                            <label class="form-label"
                                            for="form3Example3">{{ __('register.phone_number') }}</label>

                                            <div role="group" class="input-group " id='phone_field' dir="ltr" >

                                                <div class="input-group-prepend">
                                                    <div class=" input-group-text">
                                                        <span>+966</span>
                                                    </div>
                                                </div>
                                                <input id="mobile" autocomplete="new-password" name="number" type="tel"
                                                       placeholder="5xxxxxxxx" class="form-control "
                                                       onkeypress="return (event.charCode >= 48 && event.charCode <= 57)"
                                                       @if ($errors->has('number')) data-error="true" @endif dir="ltr"
                                                       aria-invalid="true" maxlength="14">

                                                <div class="input-group-append">
                                                    <div class="{{app()->getLocale() == 'ar'? 'block-class':'input-group-text'}}"><svg xmlns="http://www.w3.org/2000/svg" width="14px"
                                                                                       height="14px" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                                                       stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                                                       class="feather feather-smartphone">
                                                            <rect x="5" y="2" width="14" height="20" rx="2" ry="2">
                                                            </rect>
                                                            <line x1="12" y1="18" x2="12.01" y2="18"></line>
                                                        </svg>
                                                    </div>
                                                </div>

                                               
                                            </div>
                                            @if ($errors->has('number'))
                                               
                                            <span style="color: red;font-size:16px" role="alert">
                                                <strong>{{  $errors->first('number') }}</strong>
                                            
                                        </span>
                                        @endif
                                        </div>


                                        <div class="mt-3">
                                            <label class="form-label"
                                                for="form3Example3">{{ __('contact.contact_type_label') }}</label>
                                            <select class="form-select" name="category"
                                                aria-label="Default select example" required>
                                                <option value="suggestion">Suggestion</option>
                                                <option value="complaint">Complaint</option>
                                                <option value="other">Other</option>
                                            </select>
                                            @error('category')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="mt-3">
                                            <label class="form-label"
                                                for="form3Example3">{{ __('contact.message_label') }}</label>
                                            <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="3" required></textarea>
                                            @error('message')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="mt-2">
                                            <button type="submit" class="btn btn-primary submit d-block w-100">
                                                {{ __('contact.submit_btn') }}
                                            </button>
                                        </div>
                                        <div class="d-none" id="loader">
                                            <div class="d-flex justify-content-center">
                                                <div class="spinner-border" role="status">
                                                  <span class="visually-hidden">Loading...</span>
                                                </div>
                                              </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>


            </div>
        </div>
    </section>
@endsection

@section('styles')
<style>
   .block-class{
    display: block !important;
    padding: .375rem .75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #212529;
    text-align: center;
    white-space: nowrap;
    background-color: #e9ecef;
    border: 1px solid #ced4da;
    border-radius: .375rem;
   }
</style>
@endsection
@section('custom-scripts')
<script type="text/javascript">
     $( "#contact_us_query" ).on( "submit", function( event ) {
	$( "#loader" ).removeClass('d-none');
  });
</script>
@endsection
