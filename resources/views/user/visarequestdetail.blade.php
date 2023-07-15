@extends('user.layout.dashboard')
@section('content')
    @push('title')
        <title>Visa Request</title>
    @endpush
<section class="section border-0 mb-5 mt-0">
    <div class="container">
        <div class="col-md-12 col-sm-12">
        <div class="page-title mb-3">
                <span class="title_left" style="display: inline-block;">
                    <h3>Visa Request</h3>
                </span>
                <a href="{{ url('user/visa_requests') }}"><button class="float-right btn btn-danger">Back</button></a>
            </div>
            <div class="clearfix"></div>
            <div class="x_panel">
                <div class="x_content">
                    <div class="table-responsive">
                        <table class="table table-striped jambo_table bulk_action">
                            <thead>
                                <tr class="headings">
                                    <th>Key</th>
                                    <th>Values</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Visa Type</td>
                                    <td>{{ $data['visa_type'] }}</td>
                                </tr>
                                <tr>
                                    <td>Country</td>
                                    <td>{{ $data['country_name']->name }}</td>
                                </tr>
                                <tr>
                                    <td>Appointment City</td>
                                    <td>{{ $data['appointment_city'] }}</td>
                                </tr>
                                <tr>
                                    <td>Travel Date</td>
                                    <td>{{ $data['travel_date'] }}</td>
                                </tr>
                                @if($data['adult_count'] > 0)
                                    <tr>
                                        <td>No. of Adult's</td>
                                        <td>{{ $data['adult_count'] }}</td>
                                    </tr>
                                @endif
                                @if($data['child_count'] > 0)
                                    <tr>
                                        <td>No. of Child's</td>
                                        <td>{{ $data['child_count'] }}</td>
                                    </tr>
                                @endif
                                @if($data['passport_count'] > 0)
                                    <tr>
                                        <td>No. of Passport's</td>
                                        <td>{{ $data['passport_count'] }}</td>
                                    </tr>
                                @endif
                                <tr>
                                    <td>Relation</td>
                                    <td>{{ $data['relation'] }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="page-title mt-5">
                        <div class="title_left">
                            <h3>Traveler's and Passport's Details</h3>
                        </div>
                    </div>
                    @if($data['adult_count'] > 0)
                        <div class="table-responsive">
                            <table class="table jambo_table bulk_action">
                                <thead>
                                    <tr class="headings">
                                        <th colspan="2">Adult Traveler's Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($i=1; $i <= $data['adult_count']; $i++)
                                        <tr>
                                            <td colspan="2"><strong>Adult Traveler - {{ $i }}</strong></td>
                                        </tr>
                                        <tr>
                                            <td>First Name</td>
                                            <td>{{ $data['application_form_data']['adult_first_name_'.$i] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Family Name</td>
                                            <td>{{ $data['application_form_data']['adult_family_name_'.$i] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Mother First Name</td>
                                            <td>{{ $data['application_form_data']['adult_mother_first_name_'.$i] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Mother Family Name</td>
                                            <td>{{ $data['application_form_data']['adult_mother_family_name_'.$i] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Passport</td>
                                            <td><img src="{{ asset($data['application_form_data']['adult_passport_'.$i]) }}" class="img-responsive" alt="" width="75" height="75" style="margin: 5px 10px;" /></td>
                                        </tr>
                                    @endfor
                                </tbody>
                            </table>
                        </div>
                    @endif
                    @if($data['child_count'] > 0)
                        <div class="table-responsive">
                            <table class="table jambo_table bulk_action">
                                <thead>
                                    <tr class="headings">
                                        <th colspan="2">Child Traveler's Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($i=1; $i <= $data['child_count']; $i++)
                                        <tr>
                                            <td colspan="2"><strong>Child Traveler - {{ $i }}</strong></td>
                                        </tr>
                                        <tr>
                                            <td>First Name</td>
                                            <td>{{ $data['application_form_data']['child_first_name_'.$i] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Family Name</td>
                                            <td>{{ $data['application_form_data']['child_family_name_'.$i] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Mother First Name</td>
                                            <td>{{ $data['application_form_data']['child_mother_first_name_'.$i] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Mother Family Name</td>
                                            <td>{{ $data['application_form_data']['child_mother_family_name_'.$i] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Passport</td>
                                            <td><img src="{{ asset($data['application_form_data']['child_passport_'.$i]) }}" class="img-responsive" alt="" width="75" height="75" style="margin: 5px 10px;" /></td>
                                        </tr>
                                    @endfor
                                </tbody>
                            </table>
                        </div>
                    @endif
                    @if($data['passport_count'] > 0)
                        <div class="table-responsive">
                            <table class="table jambo_table bulk_action">
                                <thead>
                                    <tr class="headings">
                                        <th colspan="2">Passport's Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($i=1; $i <= $data['passport_count']; $i++)
                                        <tr>
                                            <td colspan="2"><strong>Passport - {{ $i }}</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Passport</td>
                                            <td><img src="{{ asset($data['application_form_data']['passport_'.$i]) }}" class="img-responsive" alt="" width="75" height="75" style="margin: 5px 10px;" /></td>
                                        </tr>
                                    @endfor
                                </tbody>
                            </table>
                        </div>
                    @endif
                    <div class="page-title mt-5">
                        <div class="title_left">
                            <h3>Payment Details</h3>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped jambo_table bulk_action">
                            <thead>
                                <tr class="headings">
                                    <th>Key</th>
                                    <th>Value</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Payment Method</td>
                                    <td>{{ $data['payment_form_data'] }}</td>
                                </tr>
                                <tr>
                                    <td>Total Amount</td>
                                    <td> @if($data['passenger_total'] > 0) {{ $data['passenger_total'] }}.00 SAR @else {{ $data['passport_counter_sum'] }}.00 SAR @endif</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>    
@endsection