@extends('layouts.front-end')
@section('content')
    @push('link')
        <style>

        </style>
    @endpush
    <div class="container-fluid ">
        <div>
            <nav class="navbar navbar-expand-lg navbar-light bg-light  ">



                <ul class="navbar-nav col-md-12 ">
                    <div class="col-md-3 border text-center btn-outline-light">
                        <li class="nav-item active">
                            <a class="nav-link text-decoration-none" href="{{url('/user/stepone')}}">Step 1: Country & Visa Type <span
                                    class="sr-only">(current)</span></a>
                        </li>
                    </div>
                    <div class="col-md-3 border text-center btn-outline-light">
                        <li class="nav-item ">
                            <a class="nav-link text-decoration-none" href="#">Step 2: Travel Information</a>
                        </li>
                    </div>
                    <div class="col-md-3 border text-center btn-outline-light">

                        <li class="nav-item ">
                            <a class="nav-link text-decoration-none" href="#">Step 3: Application Form (s)</a>
                        </li>
                    </div>
                    <div class="col-md-3 border text-center btn-outline-light">

                        <li class="nav-item">
                            <a class="nav-link text-decoration-none " href="#">Step 4: Payment</a>
                        </li>
                    </div>
                </ul>

            </nav>
        </div>

        <br>
        <br>
        <div class="container">
            <div class="text-center font-weight-bold">
                <h1>CHOOSE A COUNTRY & TYPE OF VISA</h1>
            </div>
        </div>
    </div>
@endsection
