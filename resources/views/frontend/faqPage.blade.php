@extends('layouts.front-end')

@section('content')
    <section class="section border-0 bg-transparent m-0">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="divider divider-small divider-small-lg mt-0 text-center appear-animation"
                        data-appear-animation="fadeInUpShorter" data-appear-animation-delay="0">
                        <hr class="bg-primary border-radius m-auto">
                    </div>
                    <div class="overflow-hidden mb-1">
                        <h3 class="font-weight-semi-bold text-color-grey text-uppercase positive-ls-3 text-4 line-height-2 line-height-sm-7 mb-0 appear-animation"
                            data-appear-animation="maskUp" data-appear-animation-delay="100">FAQs</h3>
                    </div>
                    <h2 class="text-color-dark font-weight-bold text-8 pb-2 mb-4 appear-animation"
                        data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">EVERTING YOU WANT TO KNOW
                        IS HERE!</h2>
                </div>
            </div>
            @foreach ($page_data as $key => $cat)
                <br>
                <div class="row">
                    <div class="accordion accordion-modern-status accordion-modern-status-borders accordion-modern-status-arrow"
                        id="accordion200">

                        <div class="card card-default">
                            <div class="card-header" id="collapse200Heading">
                                <h4 class="card-title m-0">
                                    <a class="accordion-toggle text-color-dark font-weight-bold collapsed"
                                        data-bs-toggle="collapse" data-bs-target="#collapseparent{{ $key }}"
                                        aria-expanded="false" aria-controls="collapseparent{{ $key }}">

                                        {{ $cat->name }}
                                    </a>

                                </h4>
                            </div>
                            <div id="collapseparent{{ $key }}" class="collapse"
                                aria-labelledby="collapse200Heading" data-bs-parent="#accordion200">
                                <div class="card-body pt-0">
                                    <div class="row col-md-12">
                                        @foreach ($cat->categorie as $key => $question)
                                            <div class="col-md-6">
                                                <div class="card-header" id="collapse1HeadingThree">
                                                    <h4 class="card-title m-0">
                                                        <a class="accordion-toggle" data-bs-toggle="collapse"
                                                            data-bs-target="#collapsechild{{ $key }}"
                                                            aria-expanded="false"
                                                            aria-controls="collapsechild{{ $key }}">
                                                            {{ $question->question }}
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapsechild{{ $key }}" class="collapse"
                                                    aria-labelledby="collapse1HeadingThree">
                                                    <div class="card-body">
                                                        <p class="mb-0">{{ $question->answer }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
