@extends('layouts.front-end')

@section('content')
    <section class="section border-0 bg-transparent m-0"  dir="{{app()->getlocale()== "en" ? "ltr":"ltr"}}">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="divider divider-small divider-small-lg mt-0 text-center appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="0">
                        <hr class="bg-primary border-radius m-auto">
                    </div>
                    <div class="overflow-hidden mb-1">
                        <h3 class="font-weight-semi-bold text-color-grey text-uppercase positive-ls-3 text-4 line-height-2 line-height-sm-7 mb-0 appear-animation"
                            data-appear-animation="maskUp" data-appear-animation-delay="100">{{__('contact.Contact')}}</h3>
                    </div>
                    <h2 class="text-color-dark font-weight-bold text-8 pb-2 mb-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">{{__('contact.loc')}} </h2>
                </div>
            </div>
            <div class="row col-md-12">
                    
                <div class="py-2 visa_detail col-md-4">
                    <div class="toggle toggle-primary" data-plugin-toggle="" data-plugin-options="{ 'isAccordion': true }">
                        @foreach ($page_data as $contact)

                        <section class="toggle card ">
                           <a class="toggle-title"><h1>{{$contact->name}}</h1> </a>
                            <div class="toggle-content" style="display: none;">
                                <p>{{$contact->address}} </p>
                            </div>
                        </section>
                        @endforeach
                    </div>
                    
                </div>
                <div class="col-md-6">
                    
                </div>
            </div>
        </div>
    </section>
@endsection