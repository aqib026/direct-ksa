@extends('layouts.front-end')
@section('content')
	<section class="section border-0 bg-quaternary m-0 p-0 border-1">
		<div class="steps w-100 text-center">
			<a class="col-lg-3 col-xs-3 step"><span class="badge rounded-pill bg-success p-2">{{__('steps.s1')}}: <strong>{{__('steps.s1i')}}</strong>&nbsp;<i class="fa fa-check-circle"></i></span></a>
			<a class="col-lg-3 col-xs-3 step"><span class="badge rounded-pill bg-success p-2">{{__('steps.s2')}}: <strong>{{__('steps.s2i')}}</strong></span></a>
			<a class="col-lg-3 col-xs-3 step"><span class="badge rounded-pill bg-success p-2">{{__('steps.s3')}}: <strong>{{__('steps.s3i')}}</strong></span></a>
			<a class="col-lg-3 col-xs-3 step step-last active"><span>{{__('steps.s4')}}: <strong>{{__('steps.s4i')}}</strong></span></a>
		</div>
	</section>
	<section class="section border-0 bg-quaternary m-0">
		<div class="container py-5">
			<div class="col-lg-12">
				<div class="card card-default mb-5">
					<div class="card-header" id="collapse100One">
						<h4 class="card-title m-0 text-center">
							<a class="accordion-toggle text-center text-color-dark font-weight-bold" data-bs-toggle="collapse" data-bs-target="#collapse1001" aria-expanded="true" aria-controls="collapse1001">{{__('steps.tsi')}}</a>
						</h4>
					</div>
					<div id="collapse1001" class="collapse show" aria-labelledby="collapse100One" data-bs-parent="#accordion100">
						<div class="card-body">
							<h4 class="text-center m-4 mb-5">{{__('steps.bpt')}}</h4>
							<table class="table">
								<thead>
									<tr>
										<th>{{__('steps.cvt')}}</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											<h6><i class="fa fa-check"></i>&nbsp;&nbsp;&nbsp;{{ $country->name }} | {{ $form_data['visa_type'] }}</h6>
										</td>
									</tr>
								</tbody>
							</table>
							<table class="table">
								<thead>
									<tr>
										<th>{{__('steps.tdnt')}}</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											<p>{{__('steps.etd')}}</p>
											<h6><i class="fa fa-calendar"></i>&nbsp;&nbsp;&nbsp;{{ $form_data['travel_date'] }}</h6>
										</td>
									</tr>
									@if(isset($form_data['adult_count']) && $form_data['adult_count'] > 0)
									<tr>
										<td>
											<p>{{__('steps.not')}}</p>
											<h6><i class="fa fa-user"></i>&nbsp;&nbsp;&nbsp;{{ $form_data['adult_count'] }}</h6>
										</td>
									</tr>
									@endif
									@if(isset($form_data['child_count']) && $form_data['child_count'] > 0)
									<tr>
										<td>
											<p>{{__('steps.noct')}}</p>
											<h6><i class="fa fa-child"></i>&nbsp;&nbsp;&nbsp;{{ $form_data['child_count'] }}</h6>
										</td>
									</tr>
									@endif
									@if(isset($form_data['passport_count']) && $form_data['passport_count'] > 0)
									<tr>
										<td>
											<p>{{__('steps.nop')}}</p>
											<h6><i class="fa fa-book"></i>&nbsp;&nbsp;&nbsp;{{ $form_data['passport_count'] }}</h6>
										</td>
									</tr>
									@endif
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="card card-default mb-5">
					<div class="card-header" id="collapse100Two">
						<h4 class="card-title m-0 text-center">
							<a class="accordion-toggle text-center text-color-dark font-weight-bold" data-bs-toggle="collapse" data-bs-target="#collapse1002" aria-expanded="true" aria-controls="collapse1002">{{__('steps.ps')}}</a>
						</h4>
					</div>
					<div id="collapse1002" class="collapse show" aria-labelledby="collapse100Two" data-bs-parent="#accordion100">
						<div class="card-body">
							<h4 class="text-center m-4 mb-5">{{__('steps.bpt')}}</h4>
							<table class="table table-hover">
								<thead>
									<tr>
										<th class="text-left">Order Summary</th>
										<th class="text-right">Total (Incl.VAT)</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td class="text-left">
											<h6>{{ $country->name }} | {{ $form_data['visa_type'] }}
											@if(isset($form_data['adult_count']) && $form_data['adult_count'] > 0)
												<span class="badge badge-primary px-2 mx-2">{{ $form_data['adult_count'] }}&nbsp;&nbsp;*&nbsp;&nbsp;{{ $form_data['adult_price'] }}</span>
											@endif
											@if(isset($form_data['child_count']) && $form_data['child_count'] > 0)
											<span class="badge badge-primary px-2 mx-2">{{ $form_data['child_count'] }}&nbsp;&nbsp;*&nbsp;&nbsp;{{ $form_data['child_price'] }}</span>
											@endif
											@if(isset($form_data['passport_count']) && $form_data['passport_count'] > 0)
											<span class="badge badge-primary px-2 mx-2">{{ $form_data['passport_count'] }}&nbsp;&nbsp;*&nbsp;&nbsp;{{ $form_data['passport_price'] }}</span>
											@endif
											</h6>
										</td>
										<td class="text-right">
											<h5>@if(isset($form_data['passenger_total']) && $form_data['passenger_total'] > 0) {{ $form_data['passenger_total'] }}.00 @elseif(isset($form_data['passport_counter_sum']) && $form_data['passport_counter_sum'] > 0) {{ $form_data['passport_counter_sum'] }}.00 @else 0.00 @endif</h5>
										</td>
									</tr>
									<tr>
										<td class="text-left">Total (Incl.VAT)</td>
										<td class="text-right"><h5>@if(isset($form_data['passenger_total']) && $form_data['passenger_total'] > 0) {{ $form_data['passenger_total'] }}.00 SAR @elseif(isset($form_data['passport_counter_sum']) && $form_data['passport_counter_sum'] > 0) {{ $form_data['passport_counter_sum'] }}.00 SAR @else 0.00 SAR @endif</h5></td>
									</tr>
								</tbody>
							</table>

							<table class="table table-borderless">
								<thead>
									<tr>
										<th class="text-left">Total for Payment</th>
										<th class="text-right"><h3><span class="badge badge-warning p5-2 mx-2">@if(isset($form_data['passenger_total']) && $form_data['passenger_total'] > 0) {{ $form_data['passenger_total'] }}.00 SAR @elseif(isset($form_data['passport_counter_sum']) && $form_data['passport_counter_sum'] > 0) {{ $form_data['passport_counter_sum'] }}.00 SAR @else 0.00 SAR @endif</span></h3></th>
									</tr>
								</thead>
							</table>
						</div>
					</div>
				</div>
				<div class="card card-default mb-5">
					<div class="card-header" id="collapse100Three">
						<h4 class="card-title m-0 text-center">
							<a class="accordion-toggle text-center text-color-dark font-weight-bold" data-bs-toggle="collapse" data-bs-target="#collapse1003" aria-expanded="true" aria-controls="collapse1003">Choose Payment Method</a>
						</h4>
					</div>
					<div id="collapse1003" class="collapse show" aria-labelledby="collapse100Three" data-bs-parent="#accordion100">
						<div class="card-body">
							<h4 class="text-center m-4 mb-5">{{__('steps.bpt')}}</h4>
							<form action="{{ route('visa_request_stepfour_post') }}" role="form" method="post" class="form-horizontal" enctype="multipart/form-data" id="visa_req_form">
        						@csrf
								<table class="table">
									<thead>
										<tr>
											<th class="text-left"><i class="fa fa-receipt"></i>&nbsp;&nbsp;&nbsp;Cash in Branch <span class="mx-5 badge badge-secondary px-3 py-2"><a class="popup-with-zoom-anim" href="#branches-dialog" style="color: #FFF;">View Branche(s)</a></span></th>
											<th class="text-right"><div class="form-check"><input class="form-check-input" type="radio" name="payment_method" value="cash" checked><label class="form-check-label"></label></div></th>
										</tr>
										<tr>
											<th class="text-left"><i class="fa fa-bank"></i>&nbsp;&nbsp;&nbsp;Bank Transfer <span class="mx-5 badge badge-secondary px-3 py-2"><a class="popup-with-zoom-anim" href="#banks-dialog"  style="color: #FFF;">View Bank(s)</a></span></th>
											<th class="text-right"><div class="form-check"><input class="form-check-input" type="radio" name="payment_method" value="bank"><label class="form-check-label"></label></div></th>
										</tr>
                                        <tr>
                                            <th class="text-left"><i class="fa fa-dollar"></i>&nbsp;&nbsp;&nbsp;Online Pay <span class="mx-5 badge badge-secondary px-3 py-2"></span></th>
                                            <th class="text-right"><div class="form-check"><input class="form-check-input" type="radio" name="payment_method" value="online_pay"><label class="form-check-label"></label></div></th>
                                        </tr>
									</thead>
								</table>
								<div class="text-center my-5">
									<button class="btn btn-modern btn-primary btn-arrow-effect-1 btn-xl mb-2" type="submit">Confirm</button>
									<div class="d-none" id="loader">
										<div class="d-flex justify-content-center">
											<div class="spinner-border" role="status">
											  <span class="visually-hidden">Loading...</span>
											</div>
										  </div>
									</div>
									
								</div>
								
							</form>
						</div>
					</div>
					<!-- Dialog -->
					<div id="banks-dialog" class="dialog dialog-lg zoom-anim-dialog mfp-hide p-4">
						<h3 class="font-weight-semi-bold text-transform-none mb-3">Bank Account Details</h3>
						<div class="col-lg-12">
							<div class="toggle toggle-minimal toggle-primary" data-plugin-toggle="" data-plugin-options="{ 'isAccordion': true }">
								@foreach ($bankBranches as $bankBranch)
									<section @if($loop->first)class="toggle active" @else class="toggle" @endif>
										<a class="toggle-title">{{ $bankBranch->name }}</a>
										<div class="toggle-content" @if($loop->first) style="display: block;" @else style="display: none;" @endif>
											<pre>{{ $bankBranch->address }}</pre>
										</div>
									</section>
								@endforeach
							</div>
						</div>
					</div>
					<!-- Dialog -->
					<div id="branches-dialog" class="dialog dialog-lg zoom-anim-dialog mfp-hide p-4">
						<h3 class="font-weight-semi-bold text-transform-none mb-3">Branche(s) Details</h3>
						<div class="col-lg-12">
							<div class="toggle toggle-minimal toggle-primary" data-plugin-toggle="" data-plugin-options="{ 'isAccordion': true }">
								@foreach ($cashBranches as $cashBranch)
									<section @if($loop->first)class="toggle active" @else class="toggle" @endif>
										<a class="toggle-title">{{ $cashBranch->name }}</a>
										<div class="toggle-content" @if($loop->first) style="display: block;" @else style="display: none;" @endif>
											<pre>{!! $cashBranch->address !!}</pre>
										</div>
									</section>
								@endforeach
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection
@section('custom-scripts')
<script>
$( "#visa_req_form" ).on( "submit", function( event ) {
	$( "#loader" ).removeClass('d-none');
  });
</script>

@endsection
