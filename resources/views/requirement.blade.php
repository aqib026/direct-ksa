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
   {{-- <div class="">
    <div>
        <div class="slide-container ">
            <div class="slide-content ">
                <div class="card-wrapper swiper-wrapper slides ">

                    
                    @foreach ($countries as $country)
                        <div class="card swiper-slide slide first">
                            <div class="image-content">
                                <a href="{{ url('/requirement') }}/{{ $country->visa->countries_id }}">
                                    <div style="">
                                        <span class="overlay"
                                            style=" background-size: cover; background-image: url('{{ asset($country->flag_pic) }}')"></span>
                                    </div>
                                    <div class="card-image">
                                            <button class="butto " style="    margin-top: 96px;     margin-left: 95px;" > {{ $country->name }}</button>
                                            
                                    </div>
                                </a> 
                            </div>
                    
                        </div>
            
                    @endforeach
            
                    <div class="navigation-auto">
                        <div class="auto-btn1"></div>
                        <div class="auto-btn2"></div>
                        <div class="auto-btn3"></div>
                        <div class="auto-btn4"></div>
                    </div>
                    <!--automatic navigation end-->
                </div>
                <!--manual navigation start-->
            
            </div>
            
        </div>
    
        </div>
    </div>
    </div>
    </div> --}}
<hr>
<div class="">
    <h1 class="text-center font-weight-bold">VISA REQUIREMENTS</h1>
  
      <h2 class="text-center font-weight-bold text-warning">{{$countries->name}}</h2>
    <div>
       
<h4 class="text-danger
">You can submit your visa application now. The required documents can be prepared two or three days before submission of passport to embassy</h4>
</div>
<div class="">
    <div  class="table table-dark solid font-weight-bold "> {!! $countries->visa->detail!!} </div>
</div>
</div>
<div class="text-center ">
    <button class="btn btn-warning ">START {{$countries->name}} Visa Request Now!</button>
</div>
</div>
@push('script')
<script type = "text/javascript" >
        var counter = 1;
    setInterval(function() {
        document.getElementById('radio' + counter).checked = true;
        counter++;
        if (counter > 4) {
            counter = 1;
        }
    }, 2000);>
</script>
<!-- Swiper JS -->
<script src="{{ asset('js/slider.js') }}"></script>
<!-- JavaScript -->
<script src="{{ asset('js/slide.js') }}"></script>    
@endpush
@endsection