@extends('user.layout.dashboard')
@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="x_panel">
            <div class="x_content">
                <div class="table-responsive">
                    <table class="table table-striped jambo_table bulk_action">
                        <thead>
                            <tr class="headings">
                                <th>Visa Type</th>
                                <th>Country</th>
                                <th>Travel Date</th>
                                <th>Appointment City</th>
                                <th>Relation</th>
                                <th>Total Amount</th>
                                <th>Payment Method</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key=> $ac )
                                <tr class="even pointer">
                                    <td>{{ $ac['visa_type']??'' }}</td>
                                    <td>{{ $ac['country_name']->name??'' }}</td>
                                    <td>{{ $ac['travel_date']??'' }}</td>
                                    <td>{{ $ac['appointment_city']??'' }}</td>
                                    <td>{{ $ac['relation']??'' }}</td>
                                    <td>
                                        @if(isset($ac['passenger_total']) && $ac['passenger_total'] > 0) {{ $ac['passenger_total'] }}.00 SAR @else {{ $ac['passport_counter_sum']??'' }}.00 SAR @endif
                                    </td>
                                    <td>{{ $ac['payment_form_data']??'' }}</td>
                                    <td>
                                        <a href="{{ url('user/visa_request') }}/{{ $key }}"><i class="btn btn-success fa fa-eye"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
