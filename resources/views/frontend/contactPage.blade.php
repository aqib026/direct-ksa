@extends('layouts.front-end')

@section('content')
    <section class="section border-0 bg-transparent m-0"  dir="{{ app()->getlocale() == 'en' ? 'ltr' : 'rtl' }}">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="divider divider-small divider-small-lg mt-0 text-center appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="0">
                        <hr class="bg-primary border-radius m-auto">
                    </div>
                    <div class="overflow-hidden mb-1">
                        <h3 class="font-weight-semi-bold text-color-grey text-uppercase positive-ls-3 text-4 line-height-2 line-height-sm-7 mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="100">{{__('contact.Contact')}}</h3>
                    </div>
                    <h2 class="text-color-dark font-weight-bold text-8 pb-2 mb-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">{{__('contact.loc')}} </h2>
                </div>
            </div>
            <div class="row col-md-12">
                <div class="accordion accordion-modern-status accordion-modern-status-primary" id="accordion100">
                    @foreach ($page_data as $contact)
                        @if ($contact->status==1)
                            <div class="card card-default">
                                <div class="card-header" id="collapseHeading{{ $loop->iteration }}">
                                    <h4 class="card-title m-0">
                                        <a class="accordion-toggle text-color-dark font-weight-bold @if ($loop->first) @else collapsed @endif" data-bs-toggle="collapse" data-bs-target="#collapse{{ $loop->iteration }}" aria-expanded="false" aria-controls="collapse{{ $loop->iteration }}">{{ Str::title($contact->name)}}</a>
                                    </h4>
                                </div>
                                <div id="collapse{{ $loop->iteration }}" class="@if ($loop->first) show @else collapse @endif" aria-labelledby="collapseHeading{{ $loop->iteration }}" data-bs-parent="#accordion{{ $loop->iteration }}">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4 col-sm-12">
                                                <div class="feature-box feature-box-primary mb-4">
                                                    <div class="feature-box-icon border-radius-2">
                                                        <i class="fas fa-map-marker-alt"></i>
                                                    </div>
                                                    <div class="feature-box-info">
                                                        <p class="text-3-5 font-weight-medium mt-1 mb-0 negative-ls-05">{{$contact->address}}</p>
                                                    </div>
                                                </div>
                                            </div>    
                                            <div class="col-md-8 col-sm-12">
                                            <iframe src="https://www.google.com/maps/embed/v1/place?key=&q={{$contact->latitude}},{{$contact->longitude}}"></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection