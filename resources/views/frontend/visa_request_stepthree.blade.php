@extends('layouts.front-end')
@section('content')
	<section class="section border-0 bg-quaternary m-0 p-0 border-1">
		<div class="steps w-100 text-center">
			<a class="col-lg-3 col-xs-3 step"><span class="badge rounded-pill bg-success p-2">{{__('steps.s1')}}: <strong>{{__('steps.s1i')}}</strong>&nbsp;<i class="fa fa-check-circle"></i></span></a> 
			<a class="col-lg-3 col-xs-3 step"><span class="badge rounded-pill bg-success p-2">{{__('steps.s2')}}: <strong>{{__('steps.s2i')}}</strong></span></a> 
			<a class="col-lg-3 col-xs-3 step active"><span>{{__('steps.s3')}}: <strong>{{__('steps.s3i')}}</strong></span></a>
			<a class="col-lg-3 col-xs-3 step step-last"><span>{{__('steps.s4')}}: <strong>{{__('steps.s4i')}}</strong></span></a>
		</div> 
	</section>
	<section class="section border-0 bg-quaternary m-0">
		<form action="{{ route('visa_request_payment_form') }}" role="form" method="post" class="form-horizontal" enctype="multipart/form-data">
        @csrf
			<div class="container py-5">
				<div class="col-lg-12">
						
					@if(isset($form_data['adult_counter_sum']))
					@endif
						<div class="tabs tabs-vertical tabs-left">
							<ul class="nav nav-tabs" role="tablist">
								<li class="nav-item active" role="presentation">
									<a class="nav-link active" href="#popular11" data-bs-toggle="tab" aria-selected="true" role="tab" >Popular</a>
								</li>
								<li class="nav-item" role="presentation">
									<a class="nav-link" href="#recent11" data-bs-toggle="tab" aria-selected="false" role="tab" tabindex="-1">Recent</a>
								</li>
							</ul>
							<div class="tab-content">
								<div id="popular11" class="tab-pane active show" role="tabpanel">
									<p>Popular</p>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitat.</p>
								</div>
								<div id="recent11" class="tab-pane" role="tabpanel">
									<p>Recent</p>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitat.</p>
								</div>
							</div>
						</div>
					</div>

				<input type="hidden" id="adult_counter_sum" name="adult_counter_sum" @if(isset($form_data['adult_counter_sum'])) value="{{ $form_data['adult_counter_sum'] }}" @else value="0" @endif />
				<input type="hidden" id="child_counter_sum" name="child_counter_sum" @if(isset($form_data['child_counter_sum'])) value="{{ $form_data['child_counter_sum'] }}" @else value="0" @endif />
				<input type="hidden" id="passport_counter_sum" name="passport_counter_sum" @if(isset($form_data['passport_counter_sum'])) value="{{ $form_data['passport_counter_sum'] }}" @else value="0" @endif />
				<input type="hidden" id="passenger_total" name="passenger_total" @if(isset($form_data['passenger_total'])) value="{{ $form_data['passenger_total'] }}" @else value="0" @endif />

				<input type="hidden" id="country" name="country" @if(isset($form_data['country'])) value="{{ $form_data['country'] }}" @endif />
				<input type="hidden" id="visa_type" name="visa_type" @if(isset($form_data['visa_type'])) value="{{ $form_data['visa_type'] }}" @endif />

				<input type="hidden" id="adult_count" name="adult_count" @if(isset($form_data['adult_count'])) value="{{ $form_data['adult_count'] }}" @else value="0" @endif />
				<input type="hidden" id="child_count" name="child_count" @if(isset($form_data['child_count'])) value="{{ $form_data['child_count'] }}" @else value="0" @endif />
				<input type="hidden" id="passport_count" name="passport_count" @if(isset($form_data['passport_count'])) value="{{ $form_data['passport_count'] }}" @else value="0" @endif />
				<input type="hidden" id="travel_date" name="travel_date" @if(isset($form_data['travel_date'])) value="{{ $form_data['travel_date'] }}" @else value="" @endif />

				<div class="row py-5 appear-animation datepickercustom" data-appear-animation="fadeIn" data-appear-animation-delay="300">
					<div class="col col-lg-12 text-center">
						<button class="btn btn-modern btn-primary btn-arrow-effect-1 btn-xl mb-2" type="submit">{{__('steps.ns4')}}</button>
					</div>
				</div>
			</div>
		</form>
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
			$('#adult_count').val(adult_counter_current_value);
			$('.adult_price_total').text(adult_price_total);
			$('#adult_counter_sum').val(adult_price_total);
			var child_price_total = parseInt($('.child_price_total').text());
			$('.passenger_total').text(adult_price_total+child_price_total);
			$('#passenger_total').val(adult_price_total+child_price_total);
			return false;

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
			$('#adult_count').val(adult_counter_current_value);
			$('.adult_price_total').text(adult_price_total);
			$('#adult_counter_sum').val(adult_price_total);
			var child_price_total = parseInt($('.child_price_total').text());
			$('.passenger_total').text(adult_price_total+child_price_total);
			$('#passenger_total').val(adult_price_total+child_price_total);
			return false;

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
			$('#child_count').val(child_counter_current_value);
			$('.child_price_total').text(child_price_total);
			$('#child_counter_sum').val(child_price_total);
			var adult_price_total = parseInt($('.adult_price_total').text());
			$('.passenger_total').text(adult_price_total+child_price_total);
			$('#passenger_total').val(adult_price_total+child_price_total);
			return false;

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
			$('#child_count').val(child_counter_current_value);
			$('.child_price_total').text(child_price_total);
			$('#child_counter_sum').val(child_price_total);
			var adult_price_total = parseInt($('.adult_price_total').text());
			$('.passenger_total').text(adult_price_total+child_price_total);
			$('#passenger_total').val(adult_price_total+child_price_total);
			return false;

		});

		$('#passport_counter_minus').on('click', function(){
			var passport_counter_current_value = parseInt($('.passport_counter').text());
			var passport_price_total = 0;
			var passport_price = parseInt($('#passport_price').val());
			if(passport_counter_current_value > 0){
				passport_counter_current_value--;
				passport_price_total = passport_counter_current_value * passport_price;
			}else{
				passport_counter_current_value = 0;
			}
			$('.passport_counter').text(passport_counter_current_value);
			$('#passport_count').val(passport_counter_current_value);
			$('.passport_price_total').text(passport_price_total);
			$('#passport_counter_sum').val(passport_price_total);
			$('.passenger_total').text(passport_price_total);
			$('#passenger_total').val(adult_price_total+child_price_total);
			return false;

		});
		$('#passport_counter_plus').on('click', function(){
			var passport_counter_current_value = parseInt($('.passport_counter').text());
			var passport_price_total = 0;
			var passport_price = parseInt($('#passport_price').val());
			if(passport_counter_current_value >= 0){
				passport_counter_current_value++;
				passport_price_total = passport_counter_current_value * passport_price;
			}else{
				passport_counter_current_value = 0;
			}
			$('.passport_counter').text(passport_counter_current_value);
			$('#passport_count').val(passport_counter_current_value);
			$('.passport_price_total').text(passport_price_total);
			$('#passport_counter_sum').val(passport_price_total);
			$('.passenger_total').text(passport_price_total);
			$('#passenger_total').val(adult_price_total+child_price_total);
			return false;

		});
  	});
	
	function join(t, a, s) {
   		function format(m) {
      		let f = new Intl.DateTimeFormat('en', m);
      		return f.format(t);
   		}
   		return a.map(format).join(s);
	}

	$("#datepicker").datepicker({
		minDate: 0, // Sets the minimum selectable date to today
		beforeShowDay: function(date) {
			var today = new Date(); // Current date
			var yesterday = new Date(today); // Create a new date object
			yesterday.setDate(today.getDate() - 1); // Subtract one day
			if(date < yesterday ) 
				return false;
			else
				return true;	
		}
	}).on("changeDate", function(e) {	
		let a = [{day: 'numeric'}, {month: 'numeric'}, {year: 'numeric'}];
		let s = join(e.date, a, '-');

		$(".selecteddatediv").html(s);
		$("#travel_date").val(s);
	});
</script>
@endsection