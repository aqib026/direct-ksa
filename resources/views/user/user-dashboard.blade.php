@extends('user.layout.dashboard')
@section('content')
    <div class="row p-5">
        <div class="col-md-4  card  mb-3" style="background:#63c7ff">
            <div class="card-body " >
                <span class="card-title text-white fs-2"> {{__('userdashboard.visa_request_heading')}}</span>
                <p class="card-text text-white fs-5">{{__('userdashboard.visa_requests_count')}} {{ $user_requests}}</p>
            </div>
        </div>
        
    </div>
@endsection
