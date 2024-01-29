@extends('user.layout.dashboard')
@section('content')
    <div class="row p-5">
        <div class="col-md-4  card  mb-3" style="background:#63c7ff">
            <div class="card-body ">
                <h5 class="card-title text-white fs-3">Visa Requests</h5>
                <p class="card-text text-white fs-5">Total Visa Requests : {{$user_requests}}</p>
            </div>
        </div>
        
    </div>
@endsection
