@extends('layouts.front-end')
@section('content')
	<section class="section border-0 bg-quaternary m-0 p-0 border-1">
		<div class="steps w-100 text-center">
			<a class="col-lg-3 col-xs-3 step"><span class="badge rounded-pill bg-success p-2">Step 1: <strong>Country &amp; Visa Type</strong>&nbsp;<i class="fa fa-check-circle"></i></span></a> 
			<a class="col-lg-3 col-xs-3 step active"><span>Step 2: <strong>Travel Information</strong></span></a> 
			<a class="col-lg-3 col-xs-3 step"><span>Step 3: <strong>Application Form(s)</strong></span></a>
			<a class="col-lg-3 col-xs-3 step step-last"><span>Step 4: <strong>Payment</strong></span></a>
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
						<h3 class="font-weight-semi-bold text-color-grey text-uppercase positive-ls-3 text-4 line-height-2 line-height-sm-7 mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="100">Visa Request</h3>
					</div>
					<h2 class="text-color-dark font-weight-bold text-8 pb-4 mb-0 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">Travel Information</h2>
				</div>
			</div>
			<div class="row py-5 appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="300">
				<div class="col col-lg-9 text-center" id="datepicker"></div>
			</div>
		</div>
	</section>	
@endsection
@section('custom-scripts')
<script src="{{ asset('front-end/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script>
  $(document).ready(function() {
    // Initialize datepicker
    $('#datepicker').datepicker({
      format: 'yyyy-mm-dd'
    });
  });
</script>
@endsection