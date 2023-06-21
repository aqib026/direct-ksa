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

                        <section mapattr="{{$contact->id}}" class="toggle card ">
                           <a class="toggle-title"><h1>{{$contact->name}}</h1> </a>
                            <div class="toggle-content" style="display: none;">
                                <p>{{$contact->address}} </p>
                            </div>
                        </section>
                        @endforeach
                    </div>
                    
                </div>
                <div class="col-md-8">
                    @foreach ($page_data as $contact)

                    <div id="map{{$contact->id}}" class="map map-view" style="display: block;">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3625.4164963825338!2d46.653518814999224!3d24.678205384140274!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e2f1cbf47682d81%3A0x7f30de297cf2f293!2zRGlyZWN0IGZvciBWaXNhcyBhbmQgU3R1ZHkgQWJyb2FkINiv2KfZitix2YPYqiDZhNmE2KrYo9i02YrYsdin2Kog2YjYp9mE2K_Ysdin2LPYqSDYqNin2YTYrtin2LHYrA!5e0!3m2!1sen!2sin!4v1514895174829" width="100%" height="100%" frameborder="0" style="border:0" language="en" allowfullscreen=""></iframe>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
@endsection