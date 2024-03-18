@extends('layouts.front-end')
@section('content')
    <section class="section border-0 bg-transparent m-0" dir="{{app()->getlocale()== "en" ? "ltr":"ltr"}}">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="divider divider-small divider-small-lg mt-0 text-center appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="0">
                        <hr class="bg-primary border-radius m-auto">
                    </div>
                    <h2 class="text-color-dark font-weight-bold text-8 pb-2 mb-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">{{ $page_data->title }}</h2>
                </div>
            </div>
            <div class="row">
                <div class="py-2 visa_detail">{!! $page_data->content !!}</div>
            </div>
        </div>
    </section>
@endsection