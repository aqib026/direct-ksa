@extends('layouts.front-end')
@section('content')

<section class="hero-section section border-0 m-0 p-relative">
	<div class="container py-5 p-relative z-index-2">
		<div class="row">
			<div class="text-center p-relative">
				<div class="divider divider-small divider-small-lg mt-0 text-center appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="0">
					<hr class="bg-primary border-radius m-auto">
				</div>
				<div class="overflow-hidden mb-1">
					<h2 class="text-color-dark positive-ls-3 text-4-5 line-height-2 line-height-sm-7 mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="100">{{__('home.ti')}}</h2>
				</div>
				<h1 class="text-color-dark text-9 font-weight-semi-bold pb-2 mb-4 appear-animation mx-auto mt-2 mt-md-0" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">{{__('home.in')}}</h1>
				<div class="d-block appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="300">
					<a href="{{ route('visa_request') }}" data-hash data-hash-offset="0" data-hash-offset-lg="100" class="btn btn-modern btn-primary btn-arrow-effect-1 text-capitalize text-3-5 py-3 anim-hover-translate-top-5px transition-2ms">{{__('home.bu')}}<i class="fas fa-arrow-right ms-2"></i></a>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="section border-0 bg-transparent m-0" id="services">
	<div class="row">
		<div class="col text-center">
			<div class="divider divider-small divider-small-lg mt-0 text-center appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="0">
				<hr class="bg-primary border-radius m-auto">
			</div>
			<div class="overflow-hidden mb-1">
				<h3 class="font-weight-semi-bold text-color-grey text-uppercase positive-ls-3 text-4 line-height-2 line-height-sm-7 mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="100">{{__('home.ss')}}</h3>
			</div>
			<h2 class="text-color-dark font-weight-semi-bold text-color-grey text-8 pb-2 mb-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">{{__('home.si')}}</h2>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<div class="row align-items-center justify-content-center">
				<div class="col-lg-10 text-center">
					<div class="appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="800">
						<div class="owl-carousel owl-theme stage-margin rounded-nav nav-dark nav-icon-1 nav-size-md nav-position-1 mb-0" data-plugin-options="{'responsive': {'0': {'items': 1}, '479': {'items': 2}, '768': {'items': 3}, '979': {'items': 4}, '1199': {'items': 5}}, 'margin': 10, 'loop': true, 'nav': false, 'dots': true, 'stagePadding': 40}">
							@php $service_url = ''; @endphp
							@foreach ($services as $service)
							@switch($service->name)
							@case('Translation')
							@php $service_url = 'translation' @endphp
							@break

							@case('Passport Renewals')
							@php $service_url = 'passport_renewals' @endphp
							@break

							@case('Intl Driving License - Card')
							@php $service_url = 'intl_dl_card' @endphp
							@break

							@case('Intl Driving License - Booklet')
							@php $service_url = 'intl_dl_booklet' @endphp
							@break

							@case('University Admissions')
							@php $service_url = 'uni_adm' @endphp
							@break

							@case('UAE Visa for KSA Residents')
							@php $service_url = 'uae_visa' @endphp
							@break

							@case('Forms Filling')
							@php $service_url = 'forms_filling' @endphp
							@break

							@case('Bahrain Visa for KSA Residents')
							@php $service_url = 'bahrain_visa' @endphp
							@break

							@case('Premium Service (VIP)')
							@php $service_url = 'vip' @endphp
							@break

							@default
							@endswitch
							<div class="rounded overflow-hidden dk-services-img position-relative">
								<img alt="" class="img-fluid rounded" width="250" height="200" src="{{ asset($service->banner) }}">
								<a href="{{ route('featured_sales',$service_url) }}" class="p-absolute z-index-2 top-0 left-0 w-100 h-100 anim-hover-translate-top-5px transition-2ms">
									<span class="p-absolute left-0 bottom-0 text-color-light text-start px-4 py-3">
										<strong class="text-3 negative-ls-05 font-weight-bold">{{ $service->name }}</strong>
									</span>
								</a>
							</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="section border-0 bg-quaternary m-0">
	<div class="container">
		<div class="divider divider-small divider-small-lg mt-0 text-center appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="0">
			<hr class="bg-primary border-radius m-auto">
		</div>
		<div class="overflow-hidden mb-1 text-center">
			<h3 class="font-weight-semi-bold text-color-grey text-uppercase positive-ls-3 text-4 line-height-2 line-height-sm-7 mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="100">{{__('home.wd')}}</h3>
		</div>
		<h2 class="text-center text-color-dark font-weight-semi-bold text-8 pb-1 mb-0 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">{{__('home.oms')}}</h2>
		<!-- <div class="row justify-content-center">
			<div class="col col-lg-9 text-center">
				<div class="divider divider-small divider-small-lg mt-0 text-center appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="0">
					<hr class="bg-primary border-radius m-auto">
				</div>
				<div class="overflow-hidden mb-1">
					<h3 class="font-weight-semi-bold text-color-grey text-uppercase positive-ls-3 text-4 line-height-2 line-height-sm-7 mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="100">{{__('home.wd')}}</h3>
				</div>
				<h2 class="text-color-dark font-weight-semi-bold text-8 pb-4 mb-0 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">{{__('home.oms')}}</h2>
			</div>
		</div> -->

		<div class="row pt-sm-5 pt-4 pb-2 appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="300">
			<div class="col-lg-4 col-12 mb-4 mb-lg-0">
				<div class="card h-100 card-border card-border-top card-border-hover bg-color-light border-0 box-shadow-6 box-shadow-hover anim-hover-translate-top-10px transition-3ms anim-hover-inner-wrapper">
					<div class="card-body p-relative zindex-1 text-center">
						<div class="anim-hover-inner-translate-top-20px transition-3ms">
							<img width="62" height="63" src="{{ asset('img/demos/business-consulting-4/icons/icon-1.svg') }}" alt="" data-icon data-plugin-options="{'onlySVG': true, 'extraClass': 'svg-fill-color-primary'}" />
							<h4 class="card-title mb-0 text-5 font-weight-bold">{{__('home.ave')}}</h4>
							<p class="card-text text-3-5 mt-4">{{__('home.avei')}}</p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-12 mb-4 mb-lg-0">
				<div class="card h-100 card-border card-border-top card-border-hover bg-color-light border-0 box-shadow-6 box-shadow-hover anim-hover-translate-top-10px transition-3ms anim-hover-inner-wrapper">
					<div class="card-body p-relative zindex-1 text-center">
						<div class="anim-hover-inner-translate-top-20px transition-3ms">
							<img width="62" height="63" src="{{ asset('img/demos/business-consulting-4/icons/icon-2.svg') }}" alt="" data-icon data-plugin-options="{'onlySVG': true, 'extraClass': 'svg-fill-color-primary'}" />
							<h4 class="card-title mb-0 text-5 font-weight-bold">{{__('home.baw')}}</h4>
							<p class="card-text text-3-5 mt-4">{{__('home.bawi')}}</p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-12">
				<div class="card h-100 card-border card-border-top card-border-hover bg-color-light border-0 box-shadow-6 box-shadow-hover anim-hover-translate-top-10px transition-3ms anim-hover-inner-wrapper">
					<div class="card-body p-relative zindex-1 text-center">
						<div class="anim-hover-inner-translate-top-20px transition-3ms">
							<img width="62" height="63" src="{{ asset('img/demos/business-consulting-4/icons/icon-3.svg') }}" alt="" data-icon data-plugin-options="{'onlySVG': true, 'extraClass': 'svg-fill-color-primary'}" />
							<h4 class="card-title mb-0 text-5 font-weight-bold">{{__('home.ydc')}}</h4>
							<p class="card-text text-3-5 mt-4">{{__('home.ydci')}}</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- <div class="row justify-content-center">
			<div class="col col-lg-9 text-center">

				<div class="d-block pt-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="300">
					<a href="demo-business-consulting-4-services.html" class="btn btn-modern btn-primary btn-arrow-effect-1 text-capitalize text-2-5 px-5 py-3 anim-hover-translate-top-5px transition-2ms">Learn More <i class="fas fa-arrow-right ms-2"></i></a>
				</div>

			</div>
		</div> -->
	</div>
</section>

<section class="section border-0 bg-transparent m-0 visa" id="visa">
	<div class="container">
		<div class="divider divider-small divider-small-lg mt-0 text-center appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="0">
			<hr class="bg-primary border-radius m-auto">
		</div>
		<div class="overflow-hidden mb-1 text-center">
			<h3 class="font-weight-semi-bold text-color-grey text-uppercase positive-ls-3 text-4 line-height-2 line-height-sm-7 mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="100">{{__('home.vr')}}</h3>
		</div>
		<h2 class="text-center text-capitalize text-color-dark font-weight-bold text-8 pb-2 mb-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">{{__('home.vri')}}</h2>
		<!-- <div class="row">
			<div class="col text-center">
				<div class="divider divider-small divider-small-lg mt-0 text-center appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="0">
					<hr class="bg-primary border-radius m-auto">
				</div>
				<div class="overflow-hidden mb-1">
					<h3 class="font-weight-semi-bold text-color-grey text-uppercase positive-ls-3 text-4 line-height-2 line-height-sm-7 mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="100">{{__('home.vr')}}</h3>
				</div>
				<h2 class="text-color-dark font-weight-bold text-8 pb-2 mb-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">{{__('home.vri')}}</h2>

			</div>
		</div> -->
		<div class="row">
			<div class="col">
				<div class="row align-items-end justify-content-end">
					<div class="col-lg-12 text-end pt-sm-3 pt-0">
						<div class="appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="800">
							<div class="owl-carousel owl-theme stage-margin rounded-nav nav-dark nav-icon-1 nav-size-md nav-position-1" data-plugin-options="{'responsive': {'0': {'items': 1}, '479': {'items': 2}, '768': {'items': 3}, '979': {'items': 4}, '1199': {'items': 4}}, 'margin': 10, 'loop': true, 'nav': false, 'dots': true, 'stagePadding': 40}">
								@foreach ($countries as $country)
								@if($country->visa && $country->status == '1')
								<div class="rounded overflow-hidden">
									<img alt="" class="img-fluid rounded-4" width="250" height="250" src="{{ asset($country->cover_pic) }}">
									<div class="card-image" style="margin:auto; margin-top: -32px; margin-bottom: 32px; width: 60px;">
										<img src="{{ asset($country->flag_pic) }}" alt="" class="card-img">
									</div>
									<a href="{{ url('requirement/') }}/{{ $country->visa->countries_id }}" class="p-absolute z-index-2 top-20 left-0 w-100 h-100 anim-hover-translate-top-5px transition-2ms">
										<span class="p-absolute left-0 bottom-0 text-color-dark text-center mb-3 pb-1" style="width: 100%;">
											<strong class="fs-6 negative-ls-05 font-weight-bold">{{ $country->name }}</strong>
										</span>
									</a>
								</div>
								@endif
								@endforeach
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--
<section class="section border-0 bg-transparent m-0" id="start">
	<div class="container py-5 mb-3">
		<div class="row">
			<div class="col text-center">

				<div class="divider divider-small divider-small-lg mt-0 text-center appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="0">
					<hr class="bg-primary border-radius m-auto">
				</div>
				<div class="overflow-hidden mb-1">
					<h3 class="font-weight-semi-bold text-color-grey text-uppercase positive-ls-3 text-4 line-height-2 line-height-sm-7 mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="100">Our Mission</h3>
				</div>
				<h2 class="text-color-dark font-weight-bold text-8 pb-2 mb-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">We are committed to providing our clients the best<br>strategic guidance available</h2>

			</div>
		</div>
		<div class="row pt-4 pb-5">
			<div class="col-lg-6 text-center p-relative pt-5">

				<div class="appear-animation custom-element-wrapper custom-element-9" data-appear-animation="expandIn" data-appear-animation-delay="1000">
					<div class="bg-color-primary particle particle-dots w-100 h-100 opacity-3"></div>	
				</div>

				<div class="appear-animation custom-element-wrapper custom-element-10" data-appear-animation="expandIn" data-appear-animation-delay="1200">
					<div class="bg-color-primary particle particle-dots w-100 h-100 opacity-3"></div>	
				</div>

				<div class="appear-animation custom-element-wrapper custom-element-11 p-relative rotate-r-45" data-appear-animation="fadeIn" data-appear-animation-delay="300">
					<img class="img-fluid" src="{{ asset('img/demos/business-consulting-4/generic/generic-6.jpg') }} " alt="">
				</div>

			</div>
			<div class="col-lg-6 pt-5 mt-5 pt-lg-0 mt-lg-0">
				<div class="appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="300">
					<p class="font-weight-medium text-4-5 line-height-5">Cras a elit sit amet leo accumsan volutpat. Suspendisse hendrerit vehicula leo, vel efficitur felis ultrices non. Integer aliquet ullamcorper dolor, quis sollicitudin.</p>
					<p class="text-3-5">Cras a elit sit amet leo accumsan volutpat. Suspendisse hendrerit vehicula leo, vel efficitur felis ultrices non. Integer aliquet.</p>

					<ul class="list list-icons list-icons-style-2 list-icons-lg">
						<li class="line-height-9 text-3-5 mb-1">
							<i class="fas fa-check border-width-2 text-3"></i>Amet orci quis arcu vestibulum vestibulum.
						</li>
						<li class="line-height-9 text-3-5 mb-1">
							<i class="fas fa-check border-width-2 text-3"></i>Quis arcu vestibulum vestibulum.
						</li>
						<li class="line-height-9 text-3-5 mb-1">
							<i class="fas fa-check border-width-2 text-3"></i>Sit amet orci quis arcu.
						</li>
					</ul>
				</div>

				<div class="d-block pt-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="300">
					<a href="demo-business-consulting-4-about-us.html" class="btn btn-modern btn-primary btn-arrow-effect-1 text-capitalize text-2-5 px-5 py-3 anim-hover-translate-top-5px transition-2ms">Learn More <i class="fas fa-arrow-right ms-2"></i></a>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="section border-0 bg-dark m-0 p-relative">
	<div class="particles-wrapper z-index-1">
		<div id="particles-1"></div>
	</div>
	<div class="container py-5 p-relative z-index-2">
		<div class="row">
			<div class="col text-center">

				<div class="divider divider-small divider-small-lg mt-0 text-center appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="0">
					<hr class="bg-primary border-radius m-auto">
				</div>
				<div class="overflow-hidden mb-1">
					<h3 class="font-weight-semi-bold text-color-grey text-uppercase positive-ls-3 text-4 line-height-2 line-height-sm-7 mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="100">Company Stats</h3>
				</div>
				<h2 class="text-color-light font-weight-bold text-8 pb-4 mb-0 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">Learn More About Us In Numbers</h2>
			</div>
		</div>
		<div class="row pt-4 pb-3 counters text-light appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="300">
			<div class="col-lg-4 mb-4 mb-lg-0">
				<div class="counter">
					<strong data-to="500" data-append="+">0</strong>
					<label class="font-weight-semibold text-4 opacity-7">Cases Completed</label>
				</div>
			</div>
			<div class="col-lg-4 mb-4 mb-lg-0">
				<div class="counter">
					<strong data-to="100" data-append="+">0</strong>
					<label class="font-weight-semibold text-4 opacity-7">Total Consultants</label>
				</div>
			</div>
			<div class="col-lg-4 mb-4 mb-sm-0">
				<div class="counter">
					<strong data-to="100" data-append="%">0</strong>
					<label class="font-weight-semibold text-4 opacity-7">Satisfied Customers</label>
				</div>
			</div>
		</div>
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
					<h3 class="font-weight-semi-bold text-color-grey text-uppercase positive-ls-3 text-4 line-height-2 line-height-sm-7 mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="100">What They Say About Us</h3>
				</div>
				<h2 class="text-color-dark font-weight-bold text-8 pb-4 mb-0 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">Testimonials</h2>

			</div>
		</div>

		<div class="row mt-4">
			<div class="col appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="300">

				<div class="owl-carousel owl-theme stage-margin rounded-nav nav-dark nav-icon-1 nav-size-md mb-0" data-plugin-options="{'responsive': {'0': {'items': 1}, '479': {'items': 1}, '768': {'items': 2}, '979': {'items': 2}, '1199': {'items': 2}}, 'margin': 0, 'loop': true, 'nav': true, 'dots': false, 'stagePadding': 40}">
					<div class="mx-3">
						<div class="testimonial testimonial-style-3 testimonial-style-3-light">
							<blockquote class="p-3 before-d-none">
								<p class="font-weight-medium text-4 line-height-5 p-3 m-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec hendrerit vehicula est, in consequat.</p>
							</blockquote>
							<div class="testimonial-arrow-down p-relative z-index-1"></div>
							<div class="testimonial-author">
								<div class="testimonial-author-thumbnail">
									<img src="{{ asset('img/clients/client-1.jpg') }} " class="img-fluid rounded-circle" alt="">
								</div>
								<p><strong class="font-weight-extra-bold">John Smith</strong><span>CEO & Founder - Okler</span></p>
							</div>
						</div>
					</div>
					<div class="mx-3">
						<div class="testimonial testimonial-style-3 testimonial-style-3-light">
							<blockquote class="p-3 before-d-none">
								<p class="font-weight-medium text-4 line-height-5 p-3 m-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec hendrerit vehicula est, in consequat.</p>
							</blockquote>
							<div class="testimonial-arrow-down p-relative z-index-1"></div>
							<div class="testimonial-author">
								<div class="testimonial-author-thumbnail">
									<img src="{{ asset('img/clients/client-1.jpg') }} " class="img-fluid rounded-circle" alt="">
								</div>
								<p><strong class="font-weight-extra-bold">John Smith</strong><span>CEO & Founder - Okler</span></p>
							</div>
						</div>
					</div>
					<div class="mx-3">
						<div class="testimonial testimonial-style-3 testimonial-style-3-light">
							<blockquote class="p-3 before-d-none">
								<p class="font-weight-medium text-4 line-height-5 p-3 m-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec hendrerit vehicula est, in consequat.</p>
							</blockquote>
							<div class="testimonial-arrow-down p-relative z-index-1"></div>
							<div class="testimonial-author">
								<div class="testimonial-author-thumbnail">
									<img src="{{ asset('img/clients/client-1.jpg') }} " class="img-fluid rounded-circle" alt="">
								</div>
								<p><strong class="font-weight-extra-bold">John Smith</strong><span>CEO & Founder - Okler</span></p>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>

	</div>
</section>
<section class="section border-0 bg-light m-0">
	<div class="container py-5">
		<div class="row align-items-center text-center">
			<div class="col-sm-4 col-lg-2 mb-5 mb-lg-0">
				<img src="{{ asset('img/logos/logo-8.png') }} " alt="" class="img-fluid" style="max-width: 90px;">
			</div>
			<div class="col-sm-4 col-lg-2 mb-5 mb-lg-0">
				<img src="{{ asset('img/logos/logo-9.png') }} " alt="" class="img-fluid" style="max-width: 140px;">
			</div>
			<div class="col-sm-4 col-lg-2 mb-5 mb-lg-0">
				<img src="{{ asset('img/logos/logo-10.png') }} " alt="" class="img-fluid" style="max-width: 140px;">
			</div>
			<div class="col-sm-4 col-lg-2 mb-5 mb-sm-0">
				<img src="{{ asset('img/logos/logo-11.png') }} " alt="" class="img-fluid" style="max-width: 140px;">
			</div>
			<div class="col-sm-4 col-lg-2 mb-5 mb-sm-0">
				<img src="{{ asset('img/logos/logo-12.png') }} " alt="" class="img-fluid" style="max-width: 100px;">
			</div>
			<div class="col-sm-4 col-lg-2">
				<img src="{{ asset('img/logos/logo-13.png') }} " alt="" class="img-fluid" style="max-width: 100px;">
			</div>
		</div>
	</div>
</section>

<section class="parallax section section-text-light section-parallax bg-primary m-0" data-plugin-parallax data-plugin-options="{'speed': 1.5}" data-image-src="{{ asset('img/demos/business-consulting-4/parallax/parallax-1.jpg') }} ">
	<div class="container py-5">
		<div class="row justify-content-center">
			<div class="col">
				<div class="feature-box align-items-center border-0 float-lg-end mb-4 mb-lg-0 appear-animation" data-appear-animation="fadeInRightShorterPlus" data-appear-animation-delay="300">
					<div class="feature-box-icon bg-transparent">
						<i class="icons icon-phone text-6 text-color-light"></i>
					</div>
					<div class="feature-box-info line-height-2 ps-1">
						<span class="d-block text-1 text-light font-weight-semibold text-color-default ws-nowrap">CALL US NOW</span>
						<strong class="text-4-5"><a href="tel:+1234567890" class="text-color-light text-decoration-none ws-nowrap">+123 4567 890</a></strong>
					</div>
				</div>
				<h2 class="text-color-light font-weight-bold text-8 pb-4 mb-0 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">Best Consultants Downtown Los Angeles CA</h2>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col">
				<div class="border-top border-color-light-5 text-light pt-4 appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="300">

					<div class="row align-items-center">
						<div class="col-12 mb-3 mb-lg-0 col-lg">
							<h2 class="text-color-light font-weight-bold text-5 mb-0">Request a Call Back</h2>
						</div>
						<div class="col-12 mb-3 mb-lg-0 col-lg">
							<input type="text" class="form-control text-3 h-auto py-3 line-height-1 border-0" placeholder="Subject" aria-label="Subject">
						</div>
						<div class="col-12 mb-3 mb-lg-0 col-lg">
							<input type="text" class="form-control text-3 h-auto py-3 line-height-1 border-0" placeholder="Full Name" aria-label="Full Name">
						</div>
						<div class="col-12 mb-3 mb-lg-0 col-lg">
							<input type="text" class="form-control text-3 h-auto py-3 line-height-1 border-0" placeholder="Phone Number" aria-label="Phone Number">
						</div>
						<div class="col-12 mb-3 mb-lg-0 col-lg">
							<div class="d-grid gap-2">
								<a href="#" class="btn btn-modern btn-dark btn-arrow-effect-1 text-capitalize text-2-5 px-5 py-3 anim-hover-translate-top-5px transition-2ms">Submit <i class="fas fa-arrow-right ms-2"></i></a>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
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
					<h3 class="font-weight-semi-bold text-color-grey text-uppercase positive-ls-3 text-4 line-height-2 line-height-sm-7 mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="100">What Is Happening</h3>
				</div>
				<h2 class="text-color-dark font-weight-bold text-8 pb-4 mb-0 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">Latest News</h2>

			</div>
		</div>

		<div class="row justify-content-center appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="300">
			<div class="col-9 col-md-6 col-lg-4 mb-4 mb-lg-0">
				<a href="demo-business-consulting-4-blog-post.html" class="text-decoration-none">
					<div class="card border-0 bg-transparent">
						<div class="card-img-top position-relative overlay overflow-hidden border-radius">
							<div class="position-absolute bottom-10 right-0 d-flex justify-content-end w-100 py-3 px-4 z-index-3">
								<span class="text-center bg-primary text-color-light border-radius font-weight-semibold line-height-2 px-3 py-2">
									<span class="position-relative text-6 z-index-2">
										18
										<span class="d-block text-0 positive-ls-2 px-1">FEB</span>
									</span>
								</span>
							</div>
							<img src="{{ asset('img/demos/business-consulting-4/blog/post-thumb-1.jpg') }} " class="img-fluid border-radius" alt="Lorem Ipsum Dolor" />
						</div>
						<div class="card-body py-4 px-0">
							<span class="d-block text-color-grey font-weight-semibold positive-ls-2 text-2">BY ADMIN</span>
							<h4 class="font-weight-bold text-5 text-color-hover-primary mb-2">Lorem ipsum dolor sit a met, consectetur</h4>
							<a href="demo-business-consulting-4-blog-post.html" class="read-more text-color-primary font-weight-semibold mt-0 text-2">Read More <i class="fas fa-angle-right position-relative top-1 ms-1"></i></a>
						</div>
					</div>
				</a>
			</div>
			<div class="col-9 col-md-6 col-lg-4 mb-4 mb-lg-0">
				<a href="demo-business-consulting-4-blog-post.html" class="text-decoration-none">
					<div class="card border-0 bg-transparent">
						<div class="card-img-top position-relative overlay overflow-hidden border-radius">
							<div class="position-absolute bottom-10 right-0 d-flex justify-content-end w-100 py-3 px-4 z-index-3">
								<span class="text-center bg-primary text-color-light border-radius font-weight-semibold line-height-2 px-3 py-2">
									<span class="position-relative text-6 z-index-2">
										15
										<span class="d-block text-0 positive-ls-2 px-1">FEB</span>
									</span>
								</span>
							</div>
							<img src="{{ asset('img/demos/business-consulting-4/blog/post-thumb-2.jpg') }} " class="img-fluid border-radius" alt="Lorem Ipsum Dolor" />
						</div>
						<div class="card-body py-4 px-0">
							<span class="d-block text-color-grey font-weight-semibold positive-ls-2 text-2">BY ADMIN</span>
							<h4 class="font-weight-bold text-5 text-color-hover-primary mb-2">Lorem ipsum dolor sit a met, consectetur</h4>
							<a href="demo-business-consulting-4-blog-post.html" class="read-more text-color-primary font-weight-semibold mt-0 text-2">Read More <i class="fas fa-angle-right position-relative top-1 ms-1"></i></a>
						</div>
					</div>
				</a>
			</div>
			<div class="col-9 col-md-6 col-lg-4">
				<a href="demo-business-consulting-4-blog-post.html" class="text-decoration-none">
					<div class="card border-0 bg-transparent">
						<div class="card-img-top position-relative overlay overflow-hidden border-radius">
							<div class="position-absolute bottom-10 right-0 d-flex justify-content-end w-100 py-3 px-4 z-index-3">
								<span class="text-center bg-primary text-color-light border-radius font-weight-semibold line-height-2 px-3 py-2">
									<span class="position-relative text-6 z-index-2">
										12
										<span class="d-block text-0 positive-ls-2 px-1">FEB</span>
									</span>
								</span>
							</div>
							<img src="{{ asset('img/demos/business-consulting-4/blog/post-thumb-3.jpg') }} " class="img-fluid border-radius" alt="Lorem Ipsum Dolor" />
						</div>
						<div class="card-body py-4 px-0">
							<span class="d-block text-color-grey font-weight-semibold positive-ls-2 text-2">BY ADMIN</span>
							<h4 class="font-weight-bold text-5 text-color-hover-primary mb-2">Lorem ipsum dolor sit a met, consectetur</h4>
							<a href="demo-business-consulting-4-blog-post.html" class="read-more text-color-primary font-weight-semibold mt-0 text-2">Read More <i class="fas fa-angle-right position-relative top-1 ms-1"></i></a>
						</div>
					</div>
				</a>
			</div>
		</div>

	</div>
</section>

<section class="section border-0 bg-light m-0">
	<div class="container py-3">
		<div class="row align-items-center">
			<div class="col-md-4 mb-4 mb-md-0 appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="100">
				<h2 class="text-color-dark font-weight-bold text-5 mb-0">New York</h2>

				<ul class="list list-icons list-icons-style-2 list-icons-lg">
					<li class="text-3 font-weight-medium mb-1 line-height-5 mb-2">
						<i class="icon-location-pin icons border-width-2 text-3"></i>123 Street Name, City, 191919<br>New York - NY
					</li>
					<li class="text-3 font-weight-medium mb-1 line-height-5 mb-2">
						<i class="icon-phone icons border-width-2 text-3"></i>800 123-45679<br>800 123-45678
					</li>
					<li class="text-3 font-weight-medium mb-1 line-height-5">
						<i class="icon-envelope icons border-width-2 text-3"></i><a href="mailto:mail@domain.com" class="p-relative top-5">mail@domain.com</a>
					</li>
				</ul>
			</div>
			<div class="col-md-4 mb-4 mb-md-0 appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="500">
				<h2 class="text-color-dark font-weight-bold text-5 mb-0">Chicago</h2>

				<ul class="list list-icons list-icons-style-2 list-icons-lg">
					<li class="text-3 font-weight-medium mb-1 line-height-5 mb-2">
						<i class="icon-location-pin icons border-width-2 text-3"></i>123 Street Name, City, 191919<br>New York - NY
					</li>
					<li class="text-3 font-weight-medium mb-1 line-height-5 mb-2">
						<i class="icon-phone icons border-width-2 text-3"></i>800 123-45679<br>800 123-45678
					</li>
					<li class="text-3 font-weight-medium mb-1 line-height-5">
						<i class="icon-envelope icons border-width-2 text-3"></i><a href="mailto:mail@domain.com" class="p-relative top-5">mail@domain.com</a>
					</li>
				</ul>
			</div>
			<div class="col-md-4 appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="900">
				<h2 class="text-color-dark font-weight-bold text-5 mb-0">Louisville</h2>

				<ul class="list list-icons list-icons-style-2 list-icons-lg">
					<li class="text-3 font-weight-medium mb-1 line-height-5 mb-2">
						<i class="icon-location-pin icons border-width-2 text-3"></i>123 Street Name, City, 191919<br>New York - NY
					</li>
					<li class="text-3 font-weight-medium mb-1 line-height-5 mb-2">
						<i class="icon-phone icons border-width-2 text-3"></i>800 123-45679<br>800 123-45678
					</li>
					<li class="text-3 font-weight-medium mb-1 line-height-5">
						<i class="icon-envelope icons border-width-2 text-3"></i><a href="mailto:mail@domain.com" class="p-relative top-5">mail@domain.com</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</section>
-->
@endsection