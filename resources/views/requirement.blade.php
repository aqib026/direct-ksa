@extends('layouts.front-end')
@section('content')
    <section class="section border-0 bg-transparent m-0 p-0">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="row align-items-end justify-content-end">
                        <div class="col-lg-12 text-end">
                            <div class="appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="800">
                                <div class="owl-carousel owl-theme stage-margin rounded-nav nav-dark nav-icon-1 nav-size-md nav-position-1" data-plugin-options="{'responsive': {'0': {'items': 1}, '479': {'items': 2}, '768': {'items': 3}, '979': {'items': 4}, '1199': {'items': 4}}, 'margin': 10, 'loop': true, 'nav': true, 'dots': false, 'stagePadding': 40}">
                                    @foreach ($countries as $cntry)	
                                        <div class="rounded overflow-hidden">
                                            <div class="card-image" style="margin:auto;margin-bottom: 50px; width: 100px;">
                                                <img src="{{ asset($cntry->flag_pic) }}" alt="" class="card-img">
                                            </div>
                                            <a href="{{ url('/requirement') }}/{{ $cntry->visa->countries_id }}" class="p-absolute z-index-2 top-20 left-0 w-100 h-100 anim-hover-translate-top-5px transition-2ms">
                                                <span class="p-absolute left-0 bottom-0 text-color-dark text-center mb-3 pb-1" style="width: 100%;">
                                                    <strong class="text-5 negative-ls-05 font-weight-bold">{{ $cntry->name }}</strong>
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
        </div>
    </section>
    <hr>
    <section class="section border-0 bg-transparent m-0">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="divider divider-small divider-small-lg mt-0 text-center appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="0">
                        <hr class="bg-primary border-radius m-auto">
                    </div>
                    <div class="overflow-hidden mb-1">
                        <h3 class="font-weight-semi-bold text-color-grey text-uppercase positive-ls-3 text-4 line-height-2 line-height-sm-7 mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="100">VISA REQUIREMENTS</h3>
                    </div>
                    <h2 class="text-color-dark font-weight-bold text-8 pb-2 mb-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">{{ $country->name }}</h2>
                    <h6 class="text-center text-danger py-2">You can submit your visa application now. The required documents can be prepared two or three days before submission of passport to embassy</h6>
                </div>
            </div>
            <div class="row">
                <div class="py-2 visa_detail">{!! $country->visa->detail !!}</div>
            </div>
            <div class="text-center py-5">
                <a href="{{ route('visa_request') }}" class="btn btn-primary w-75">START {{ $country->name }} Visa Request Now!</a>
            </div>
        </div>
    </section>
@endsection