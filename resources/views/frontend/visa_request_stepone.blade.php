@extends('layouts.front-end')
@section('content')
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
	<section class="section border-0 bg-quaternary m-0 p-0 border-1">
		<div class="steps w-100 text-center">
			<a class="col-lg-3 col-xs-3 step active"><span>{{__('steps.s1')}}: <strong>{{__('steps.s1i')}}</strong></span></a>
			<a class="col-lg-3 col-xs-3 step"><span>{{__('steps.s2')}}: <strong>{{__('steps.s2i')}}</strong></span></a>
			<a class="col-lg-3 col-xs-3 step"><span>{{__('steps.s3')}}: <strong>{{__('steps.s3i')}}</strong></span></a>
			<a class="col-lg-3 col-xs-3 step step-last"><span>{{__('steps.s4')}}: <strong>{{__('steps.s4i')}}</strong></span></a>
		</div>
	</section>
	<section class="section border-0 bg-quaternary m-0">
		<div class="container py-5">
			<div class="row justify-content-center">
				<div class="col col-lg-9 text-center">
					<div class="divider divider-small divider-small-lg mt-0 text-center appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="0">
						<hr class="bg-primary border-radius m-auto">
					</div>
					<div class="overflow-hidden mb-1">
						<h3 class="font-weight-semi-bold text-color-grey text-uppercase positive-ls-3 text-4 line-height-2 line-height-sm-7 mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="100">{{__('steps.vr')}}</h3>
					</div>
					<h2 class="text-color-dark font-weight-bold text-8 pb-4 mb-0 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">{{__('steps.vri')}}</h2>
				</div>
			</div>
			<div class="row py-5 appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="300">
				@foreach ($countries as $country)
					<div class="col-md-4 mb-4">
						<div class="card card-border card-border-top card-border-hover bg-color-light border-0 box-shadow-6 box-shadow-hover anim-hover-translate-top-10px transition-3ms anim-hover-inner-wrapper">
							<div class="card-body p-relative zindex-1 p-5 text-center">
								<div class="anim-hover-inner-translate-top-20px transition-3ms">
									<img width="100" height="100" src="{{ asset($country->flag_pic) }}" alt=""/>
									<h4 class="card-title mt-4 mb-5 text-5 font-weight-bold">{{ $country->name }}</h4>
									@php $content = "<div class='visa-type-btn-div'>"; @endphp
									@foreach ($country->visatype as $visatype)
										@php
											$url = route('visa_request_steptwo', [$visatype->countries_id, $visatype->visa_type]);

											$content .= "<a href='". $url ."' class='btn btn-popover-custom btn-lg btn-primary'>$visatype->visa_type</a>";
										@endphp
									@endforeach
									@php $content .= "</div>"; @endphp
									<a tabindex="0" class="btn btn-lg btn-primary" role="button" data-bs-sanitize="false" data-bs-placement="bottom" data-bs-toggle="popover"  data-bs-title="Select Visa Type" data-bs-html="true" data-bs-content="{!! $content !!}">{{__('steps.start')}}</a>
								</div>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</section>
@endsection
@section('custom-scripts')
	{{-- <script src="{{ asset('front-end/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script> --}}
	<script type="text/javascript">
		const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
		const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))
	</script>
@endsection
