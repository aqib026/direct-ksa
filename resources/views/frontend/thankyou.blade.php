@extends('layouts.front-end')

@section('content')
    <section class="section border-0 m-0 bg-color-quaternary">
        @if (session()->has('success'))
            <div class="{{session()->get('locale') == 'en'?'offset-md-3 ':'div-center-rtl'}} col-md-6 alert alert-success" role="alert" @if(session()->get('locale') == 'ar') dir="rtl"  @endif>
                {!! session()->get('success') !!}
            </div>
        @endif
            @if (session()->has('error'))
                <div class="{{session()->get('locale') == 'en'?'offset-md-3 ':'div-center-rtl'}} col-md-6 alert alert-danger" role="alert" @if(session()->get('locale') == 'ar') dir="rtl"  @endif>
                    {!! session()->get('error') !!}
                </div>
            @endif
        <div class="container">
            <div class="row">
                <div class="col text-center m-5 p-5">
                    <div class="divider divider-small divider-small-lg mt-0 text-center appear-animation"
                        data-appear-animation="fadeInUpShorter" data-appear-animation-delay="0">
                        <hr class="bg-primary border-radius m-auto">
                    </div>
                    <div class="overflow-hidden mb-1">
                    </div>
                    <h2 class="text-color-dark font-weight-bold text-8 pt-5 mt-5 pb-2 mb-2 appear-animation"
                        data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">
                        {{ __('thank.thk') }}
                    </h2>
                    <h3 class="font-weight-semi-bold text-uppercase positive-ls-3 pb-3 mb-3 text-4 line-height-2 line-height-sm-7 mb-0 appear-animation"
                        data-appear-animation="maskUp" data-appear-animation-delay="100">{{ __('thank.req') }}</h3>
                    <a href="{{route('home')}}" data-hash="" data-hash-offset="0"
                        data-hash-offset-lg="100"
                        class="btn btn-modern btn-primary btn-arrow-effect-1 text-capitalize text-3-5 px-5 py-3 anim-hover-translate-top-5px transition-2ms">{{ __('thank.rhs') }}
                        @if (app()->getlocale() == 'en')
                            <i class="fas fa-arrow-right ms-2"></i>
                        @else
                            <i class="fas fa-arrow-left ms-2">
                        @endif
                        </i></a>
                </div>
            </div>
        </div>
    </section>
@endsection

