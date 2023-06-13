<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Card Slider</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="{{ asset('css/slide.css') }}">
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/slider.css') }}">

</head>

<body>

    <div class="slide-container ">
        <div class="slide-content ">
            <div class="card-wrapper swiper-wrapper slides ">

                <input type="radio" name="radio-btn" id="radio1">
                <input type="radio" name="radio-btn" id="radio2">
                <input type="radio" name="radio-btn" id="radio3">
                <input type="radio" name="radio-btn" id="radio4">
                @foreach ($countries as $country)
                    <div class="card swiper-slide slide first">
                        <div class="image-content">
                            <a href="{{ url('admin/slider/show/') }}/{{ $country->visa->countries_id }}">
                                <div style="">
                                    <span class="overlay"
                                        style=" background-size: cover; background-image: url('{{ asset($country->cover_pic) }}')"></span>
                                </div>
                                <div class="card-image">
                                    <img src="{{ asset($country->flag_pic) }}" alt="" class="card-img">
                                </div>

                        </div>
                        <div class="card-content">
                            <a href="{{ url('admin/slider/show/') }}/{{ $country->visa->countries_id }}">
                            <button class="button"> {{ $country->name }}</button>
                            </a>
                        </div>
                    </div>
          
                @endforeach
            </a>
                <div class="navigation-auto">
                    <div class="auto-btn1"></div>
                    <div class="auto-btn2"></div>
                    <div class="auto-btn3"></div>
                    <div class="auto-btn4"></div>
                </div>
                <!--automatic navigation end-->
            </div>
            <!--manual navigation start-->
            <div class="navigation-manual">
                <label for="radio1" class="manual-btn"></label>
                <label for="radio2" class="manual-btn"></label>
                <label for="radio3" class="manual-btn"></label>
                <label for="radio4" class="manual-btn"></label>
            </div>
        </div>
          
    </div>
    <div class="swiper-button-next swiper-navBtn"></div>
    <div class="swiper-button-prev swiper-navBtn"></div>
    <div class="swiper-pagination"></div>
    </div>



    

</body>
<script
    type = "text/javascript" >
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

</html>
