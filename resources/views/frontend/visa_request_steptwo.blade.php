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
			<div class="row py-5 appear-animation datepickercustom" data-appear-animation="fadeIn" data-appear-animation-delay="300">
				<div class="overflow-hidden mb-3 text-center ">
					<h2 class="text-color-dark font-weight-bold text-8 pb-2 mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="100">WHAT IS YOUR EXPECTED TRAVEL DATE?</h2>
				</div>
				<div class="col col-lg-12 text-center py-3 datepickercustom" id="datepicker"></div>
				<div class="col col-lg-12 text-center py-3 datepickercustom">
					<div class="overflow-hidden mb-1">
						<h3 class="font-weight-semi-bold text-color-grey text-uppercase positive-ls-1 text-5 line-height-2 line-height-sm-7 mb-3 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="100">Expected Travel Date</h3>
						<h1 class="font-weight-semi-bold text-5 line-height-2 line-height-sm-7 mb-5 selecteddatediv">--</h1>
					</div>
				</div>
			</div>
			<div class="row py-5 appear-animation datepickercustom" data-appear-animation="fadeIn" data-appear-animation-delay="300">
				<div class="overflow-hidden mb-1 text-center">
					<h2 class="text-color-dark font-weight-bold text-8 pb-2 mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="100">WHERE DO YOU WANT YOUR APPOINTMENT?</h2>
				</div>
				<div class="overflow-hidden mb-5 text-center">
					<h3 class="font-weight-semi-bold text-color-grey text-uppercase positive-ls-1 text-4 line-height-2 line-height-sm-7 mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="100"><i class="fa fa-info-circle"></i>&nbsp;U.S Embassy requires interview with all the applicants.</h3>
				</div>
				<div class="col col-lg-12 text-center py-3">
					<div class="row">
						<div class="form-group col">
							<div class="form-check form-check-inline">
								<label class="form-check-label form-check-label-custom">
									<input class="form-check-input form-check-input-custom" type="radio" name="appointment_city" data-msg-required="Please select at least one option." value="Riyadh" required="">Riyadh
								</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group col">
							<div class="form-check form-check-inline">
								<label class="form-check-label form-check-label-custom">
									<input class="form-check-input form-check-input-custom" type="radio" name="appointment_city" data-msg-required="Please select at least one option." value="Dhahran" required="">Dhahran
								</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group col">
							<div class="form-check form-check-inline">
								<label class="form-check-label form-check-label-custom">
									<input class="form-check-input form-check-input-custom" type="radio" name="appointment_city" data-msg-required="Please select at least one option." value="Jeddah" required="">Jeddah
								</label>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row mt-5 py-5 appear-animation datepickercustom" data-appear-animation="fadeIn" data-appear-animation-delay="300">
				<div class="overflow-hidden mb-5 text-center">
					<h2 class="text-color-dark font-weight-bold text-8 pb-2 mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="100">CHOOSE No. OF TRAVELERS</h2>
				</div>
				<div class="col col-lg-12 text-center py-3">
					<table class="table table-bordered">
						<tbody>
							<tr>
								<td>Adults (More than 6 years in age)</td>
								<td><button class="btn btn-secondary" id="adult_counter_minus"><i class="fa fa-minus"></i></button><span class="adult_counter">0</span><button class="btn btn-secondary" id="adult_counter_plus"><i class="fa fa-plus"></i></button></td>
								<td><span class="adult_counter_sum"><span class="adult_price_total">0</span> SAR</span></td>
							</tr>
							<tr>
								<td>Children (Less than 6 years in age)</td>
								<td><button class="btn btn-secondary" id="child_counter_minus"><i class="fa fa-minus"></i></button><span class="child_counter">0</span><button class="btn btn-secondary" id="child_counter_plus"><i class="fa fa-plus"></i></button></td>
								<td><span class="child_counter_sum"><span class="child_price_total">0</span> SAR</span></td>
							</tr>
							<tr>
								<td>Have a Promo?</td>
								<td><input class="form-control text-3 h-auto py-2" value="" name="promo_code" placeholder="Type Promo Here"/></td>
								<td><button class="btn btn-primary">APPLY</button></td>
							</tr>					
						</tbody>
					</table>
					<div class="overflow-hidden mt-5 mb-1">
						<h3 class="font-weight-semi-bold text-color-grey text-uppercase positive-ls-1 text-5 line-height-2 line-height-sm-7 mb-3 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="100">Total Cost</h3>
						<h1 class="font-weight-semi-bold text-5 line-height-2 line-height-sm-7 mb-5 selectedpersons"><span class="passenger_total">0</span> SAR</h1>
					</div>
				</div>
			</div>
			<div class="row mt-5 py-5 appear-animation datepickercustom" data-appear-animation="fadeIn" data-appear-animation-delay="300">
				<div class="overflow-hidden mb-5 text-center">
					<h2 class="text-color-dark font-weight-bold text-8 pb-2 mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="100">TYPE OF RELATION BETWEEN TRAVELERS</h2>
				</div>
				<div class="col col-lg-12 text-center px-5 py-3">
					<div class="custom-select-1">
						<select class="form-select form-control h-auto py-2" data-msg-required="Please Select Relation" name="relation" required="required">
							<option value="" disabled selected>Please Select Relation</option>
							<option value="Family">Family</option>
							<option value="Friends">Friends</option>
							<option value="Others">Others</option>
						</select>
					</div>
				</div>
			</div>
			<input type="hidden" id="adult_price" value="849" />
			<input type="hidden" id="child_price" value="849" />
		</div>
	</section>	
@endsection
@section('custom-scripts')
<script src="{{ asset('front-end/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script>
	$(document).ready(function() {
		$('#adult_counter_minus').on('click', function(){
			var adult_counter_current_value = parseInt($('.adult_counter').text());
			var adult_price_total = 0;
			var adult_price = parseInt($('#adult_price').val());
			if(adult_counter_current_value > 0){
				adult_counter_current_value--;
				adult_price_total = adult_counter_current_value * adult_price;
			}else{
				adult_counter_current_value = 0;
			}
			$('.adult_counter').text(adult_counter_current_value);
			$('.adult_price_total').text(adult_price_total);
			var child_price_total = parseInt($('.child_price_total').text());
			$('.passenger_total').text(adult_price_total+child_price_total);

		});
		$('#adult_counter_plus').on('click', function(){
			var adult_counter_current_value = parseInt($('.adult_counter').text());
			var adult_price_total = 0;
			var adult_price = parseInt($('#adult_price').val());
			if(adult_counter_current_value >= 0){
				adult_counter_current_value++;
				adult_price_total = adult_counter_current_value * adult_price;
			}else{
				adult_counter_current_value = 0;
			}
			$('.adult_counter').text(adult_counter_current_value);
			$('.adult_price_total').text(adult_price_total);
			var child_price_total = parseInt($('.child_price_total').text());
			$('.passenger_total').text(adult_price_total+child_price_total);
		});
		$('#child_counter_minus').on('click', function(){
			var child_counter_current_value = parseInt($('.child_counter').text());
			var child_price_total = 0;
			var child_price = $('#child_price').val();
			if(child_counter_current_value > 0){
				child_counter_current_value--;
				child_price_total = child_counter_current_value * child_price;
			}else{
				child_counter_current_value = 0;
			}
			$('.child_counter').text(child_counter_current_value);
			$('.child_price_total').text(child_price_total);
			var adult_price_total = parseInt($('.adult_price_total').text());
			$('.passenger_total').text(adult_price_total+child_price_total);
		});
		$('#child_counter_plus').on('click', function(){
			var child_counter_current_value = parseInt($('.child_counter').text());
			var child_price_total = 0;
			var child_price = $('#child_price').val();
			if(child_counter_current_value >= 0){
				child_counter_current_value++;
				child_price_total = child_counter_current_value * child_price;
			}else{
				child_counter_current_value = 0;
			}
			$('.child_counter').text(child_counter_current_value);
			$('.child_price_total').text(child_price_total);
			var adult_price_total = parseInt($('.adult_price_total').text());
			$('.passenger_total').text(adult_price_total+child_price_total);
		});

  	});
	
	function join(t, a, s) {
   		function format(m) {
      		let f = new Intl.DateTimeFormat('en', m);
      		return f.format(t);
   		}
   		return a.map(format).join(s);
	}
  	
	$("#datepicker").datepicker().on("changeDate", function(e) {	
		let a = [{day: 'numeric'}, {month: 'numeric'}, {year: 'numeric'}];
		let s = join(e.date, a, '-');

		$(".selecteddatediv").html(s);
	});
</script>
@endsection