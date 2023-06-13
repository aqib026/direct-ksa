@extends('layouts.front-end')
@section('content')
    @push('link')
        <!-- Swiper CSS -->
        <link rel="stylesheet" href="{{ asset('css/slide.css') }}">
        <!-- CSS -->
        <link rel="stylesheet" href="{{ asset('css/slider.css') }}">
    @endpush
    <br><br>
    <div class="container">

        {{-- <div class="slide-container "> --}}
            <div class="slide-content ">
                <div class="card-wrapper swiper-wrapper slides ">


                    @foreach ($countries as $cntry)
                        <div class="card swiper-slide slide first">
                            <a href="{{ url('/requirement') }}/{{ $cntry->visa->countries_id }}">

                            <div class="image-content">
                                    <div style="">
                                        <span class="overlay"
                                            style=" background-size: contain;     background-repeat: no-repeat; background-image: url('{{ asset($cntry->flag_pic) }}')"></span>
                                    </div>

                                    <div class="">
                                        <button class="butto " style=" margin-left: 132px;"> {{ $cntry->name }}</button>
                                    </div>
                               
                            </div>
                            </a>
                        </div>
                    @endforeach

                   
                   
                </div>
            

            </div>

        </div>



        <hr>
        <div class="container">
        <div class="">
            <h1 class="text-center font-weight-bold">VISA REQUIREMENTS</h1>

            <h2 class="text-center font-weight-bold text-warning">{{ $country->name }}</h2>
            <div>

                <h4 class="text-danger
">You can submit your visa application now. The required documents can be prepared
                    two or three days before submission of passport to embassy</h4>
            </div>
            <div class="">
                <div class="table  solid font-weight-bold "> {!! $country->visa->detail !!} </div>
            </div>
        </div>
        <div class="text-center ">
            <button class="btn btn-warning w-75 ">START {{ $country->name }} Visa Request Now!</button>
        </div>
    </div>
</div>
<br>
    @push('script')
        <script type="text/javascript">
            var counter = 1;
            setInterval(function() {
                document.getElementById('radio' + counter).checked = true;
                counter++;
                if (counter > 4) {
                    counter = 1;
                }
            }, 2000); >
        </script>
        <!-- Swiper JS -->
        <script src="{{ asset('js/slider.js') }}"></script>
        <!-- JavaScript -->
        <script src="{{ asset('js/slide.js') }}"></script>
    @endpush
@endsection
