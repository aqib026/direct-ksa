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
		<form action="" role="form" method="post" class="form-horizontal" enctype="multipart/form-data">
        @csrf
			<div class="container py-5">
				<div class="col-lg-12">		
					@if(isset($form_data['adult_count']) && $form_data['adult_count'] > 0)
						<div class="tabs tabs-vertical tabs-left">
							<ul class="nav nav-tabs" role="tablist">
								@for ($i = 1; $i <= $form_data['adult_count']; $i++)
									<li class="nav-item @if ($i == 1) active @endif" role="presentation">
										<a class="nav-link @if ($i == 1) active @endif" href="#adult{{ $i }}" data-bs-toggle="tab" aria-selected="@if ($i == 1) true @else false @endif" role="tab" >Adult Traveller - {{ $i }}</a>
									</li>
								@endfor
							</ul>
							<div class="tab-content">
								@for ($i = 1; $i <= $form_data['adult_count']; $i++)
									<div id="adult{{ $i }}" class="tab-pane @if ($i == 1) active show @endif" role="tabpanel">
										<div class="tab-pane tab-pane-navigation active show" id="formsExamplesInputGroup" role="tabpanel">
											<h4 class="mb-3">Personal Information</h4>
											<div class="card mb-4">
												<div class="card-body">
													<div class="row">
														<div class="col-lg-6">
															<div class="input-group input-group-default">
																<span class="input-group-text" id="inputGroup-sizing-default">First Name</span>
																<input type="text" placeholder="First Name" class="form-control h-auto" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
															</div>
														</div>
														<div class="col-lg-6">
															<div class="input-group input-group-default">
																<span class="input-group-text" id="inputGroup-sizing-default">Family Name</span>
																<input type="text" placeholder="Family Name" class="form-control h-auto" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
															</div>
														</div>
													</div>
												</div>
											</div>
											<h4 class="mb-3">Mother's Information</h4>
											<div class="card mb-4">
												<div class="card-body">
													<div class="row">
														<div class="col-lg-6">
															<div class="input-group input-group-default">
																<span class="input-group-text" id="inputGroup-sizing-default">First Name</span>
																<input type="text" placeholder="First Name" class="form-control h-auto" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
															</div>
														</div>
														<div class="col-lg-6">
															<div class="input-group input-group-default">
																<span class="input-group-text" id="inputGroup-sizing-default">Family Name</span>
																<input type="text" placeholder="Family Name" class="form-control h-auto" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="card mb-4">
												<div class="card-body">
													<div class="row">
														<div class="col">
															<div class="input-group input-group-default">
																<span class="input-group-text" id="inputGroup-sizing-default">Upload Passport Copy of Traveler</span>
																<input type="file" class="form-control h-auto" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								@endfor
							</div>
						</div>
					@endif
					@if(isset($form_data['child_count']) && $form_data['child_count'] > 0)
						<div class="tabs tabs-vertical tabs-left">
							<ul class="nav nav-tabs" role="tablist">
								@for ($i = 1; $i <= $form_data['child_count']; $i++)
									<li class="nav-item @if ($i == 1) active @endif" role="presentation">
										<a class="nav-link @if ($i == 1) active @endif" href="#child{{ $i }}" data-bs-toggle="tab" aria-selected="@if ($i == 1) true @else false @endif" role="tab" >Child Traveller - {{ $i }}</a>
									</li>
								@endfor
							</ul>
							<div class="tab-content">
								@for ($i = 1; $i <= $form_data['child_count']; $i++)
									<div id="child{{ $i }}" class="tab-pane @if ($i == 1) active show @endif" role="tabpanel">
										<div class="tab-pane tab-pane-navigation active show" id="formsExamplesInputGroup" role="tabpanel">
											<h4 class="mb-3">Personal Information</h4>
											<div class="card mb-4">
												<div class="card-body">
													<div class="row">
														<div class="col-lg-6">
															<div class="input-group input-group-default">
																<span class="input-group-text" id="inputGroup-sizing-default">First Name</span>
																<input type="text" placeholder="First Name" class="form-control h-auto" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
															</div>
														</div>
														<div class="col-lg-6">
															<div class="input-group input-group-default">
																<span class="input-group-text" id="inputGroup-sizing-default">Family Name</span>
																<input type="text" placeholder="Family Name" class="form-control h-auto" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
															</div>
														</div>
													</div>
												</div>
											</div>
											<h4 class="mb-3">Mother's Information</h4>
											<div class="card mb-4">
												<div class="card-body">
													<div class="row">
														<div class="col-lg-6">
															<div class="input-group input-group-default">
																<span class="input-group-text" id="inputGroup-sizing-default">First Name</span>
																<input type="text" placeholder="First Name" class="form-control h-auto" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
															</div>
														</div>
														<div class="col-lg-6">
															<div class="input-group input-group-default">
																<span class="input-group-text" id="inputGroup-sizing-default">Family Name</span>
																<input type="text" placeholder="Family Name" class="form-control h-auto" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="card mb-4">
												<div class="card-body">
													<div class="row">
														<div class="col">
															<div class="input-group input-group-default">
																<span class="input-group-text" id="inputGroup-sizing-default">Upload Passport Copy of Traveler</span>
																<input type="file" class="form-control h-auto" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
															</div>
														</div>
													</div>
												</div>
											</div>								
										</div>
									</div>
								@endfor
							</div>
						</div>
					@endif
					@if(isset($form_data['passport_count']) && $form_data['passport_count'] > 0)
						<div class="tabs tabs-vertical tabs-left">
							<ul class="nav nav-tabs" role="tablist">
								@for ($i = 1; $i <= $form_data['passport_count']; $i++)
									<li class="nav-item @if ($i == 1) active @endif" role="presentation">
										<a class="nav-link @if ($i == 1) active @endif" href="#passport{{ $i }}" data-bs-toggle="tab" aria-selected="@if ($i == 1) true @else false @endif" role="tab" >Passport - {{ $i }}</a>
									</li>
								@endfor
							</ul>
							<div class="tab-content">
								@for ($i = 1; $i <= $form_data['passport_count']; $i++)
									<div id="passport{{ $i }}" class="tab-pane @if ($i == 1) active show @endif" role="tabpanel">
										<div class="tab-pane tab-pane-navigation active show" id="formsExamplesInputGroup" role="tabpanel">
											<div class="card mb-4">
												<div class="card-body">
													<div class="row">
														<div class="col">
															<div class="input-group input-group-default">
																<span class="input-group-text" id="inputGroup-sizing-default">Upload Passport Copy of Traveler</span>
																<input type="file" class="form-control h-auto" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
															</div>
														</div>
													</div>
												</div>
											</div>								
										</div>
									</div>
								@endfor
							</div>
						</div>
					@endif
				</div>
				<div class="row py-5 appear-animation datepickercustom" data-appear-animation="fadeIn" data-appear-animation-delay="300">
					<div class="col col-lg-12 text-center">
						<button class="btn btn-modern btn-primary btn-arrow-effect-1 btn-xl mb-2" type="submit">{{__('steps.ns4')}}</button>
					</div>
				</div>
			</div>
		</form>
	</section>	
@endsection