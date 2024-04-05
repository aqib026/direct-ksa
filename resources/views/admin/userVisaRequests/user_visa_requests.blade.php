@extends('admin.include.main')
@section('main-section')
    @push('title')
        <title>User Visa Requests</title>
    @endpush

    <div class="row">
        <div class="col-md-12">
            <form action="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>User Visa Requests</h3>
                    </div>
                    <div class="title_right">
                        <div class="col-md-7 col-sm-7 form-group pull-right top_search">
                            <div class="input-group">
                                <input type="search" name="search" class="form-control" placeholder="Search for...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit">Go!</button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="clearfix"></div>
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
                                    
                                    @foreach ($data as $key => $ac)
                                        <tr class="even pointer">
                                            <td>{{ $ac['visa_type'] ?? '' }}</td>
                                            <td>{{ $ac['country_name']->name ??$ac['country']?? '' }}</td>
                                            <td>{{ $ac['travel_date'] ?? $ac['travel_Date'] ?? '' }}</td>
                                            <td>{{ $ac['appointment_city'] ??$ac['biometrics_location']?? '' }}</td>
                                            <td>{{ $ac['relation'] ?? $ac['traveller_relation'] ?? '' }}</td>
                                            <td>
                                                @if (isset($ac['passenger_total']) && $ac['passenger_total'] > 0)
                                                    {{ $ac['passenger_total'] }}.00 SAR
                                                @elseif(isset($ac['passport_counter_sum']) && $ac['passport_counter_sum'] > 0)
                                                    {{ $ac['passport_counter_sum'] }}.00 SAR
                                                @elseif(isset($ac['total_cost']))
                                                    {{ $ac['total_cost'] }}.00 SAR
                                                @endif
                                            </td>
                                            <td>
                                                @if (isset($ac['payment_form_data']))
                                                    {{ $ac['payment_form_data'] }}
                                                @elseif(isset($ac['payment_method']))
                                                    {{$ac['payment_method']['payment_method']}}
                                                
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ url('admin/visa_request') }}/{{ $key }}"><i
                                                        class="btn btn-success fa fa-eye"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row float-right">
                    <div class="col-md-12">
                        {{ $accre->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
