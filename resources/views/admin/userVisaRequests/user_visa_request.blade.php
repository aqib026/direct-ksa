@extends('admin.include.main')
@section('main-section')
    @push('title')
        <title>
            User Visa Request</title>
    @endpush
    <section class="section border-0 mb-5">
        <div class="container">
            <div class="col-md-12 col-sm-12">
                <div class="page-title">
                    <div class="title_left">
                        <h3>User Visa Request</h3>
                    </div>
                    <a href="{{ url('admin/visa_requests') }}"><button class="float-right btn btn-danger">Back</button></a>
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
                                        <td>{{ $data['visa_type'] ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Country</td>
                                        <td>{{ $data['country_name']->name ?? ($data['country'] ?? '') }}</td>
                                    </tr>
                                    <tr>
                                        <td>Appointment City</td>
                                        <td>{{ $data['appointment_city'] ?? ($data['biometrics_location'] ?? '') }}</td>
                                    </tr>
                                    <tr>
                                        <td>Travel Date</td>
                                        <td>{{ $data['travel_date'] ?? ($data['travel_Date'] ?? '') }}</td>
                                    </tr>
                                    @if ($data['adult_count'] > 0)
                                        <tr>
                                            <td>No. of Adult's</td>
                                            <td>{{ $data['adult_count'] }}</td>
                                        </tr>
                                    @endif
                                    @if ($data['child_count'] > 0)
                                        <tr>
                                            <td>No. of Child's</td>
                                            <td>{{ $data['child_count'] }}</td>
                                        </tr>
                                    @endif
                                    @if (isset($data['passport_count']) && $data['passport_count'] > 0)
                                        <tr>
                                            <td>No. of Passport's</td>
                                            <td>{{ $data['passport_count'] }}</td>
                                        </tr>
                                    @endif
                                    <tr>
                                        <td>Relation</td>
                                        <td>{{ $data['relation'] ?? ($data['traveller_relation'] ?? '') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="page-title mt-5">
                            <div class="title_left">
                                <h3>Traveler's and Passport's Details</h3>
                            </div>
                        </div>
                        @if ($data['adult_count'] > 0)
                            <div class="table-responsive">
                                <table class="table jambo_table bulk_action">
                                    <thead>
                                        <tr class="headings">
                                            <th colspan="2">Adult Traveler's Details</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (isset($data['application_form_data']))
                                            @for ($i = 1; $i <= $data['adult_count']; $i++)
                                                <tr>
                                                    <td colspan="2"><strong>Adult Traveler - {{ $i }}</strong>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>First Name</td>
                                                    <td>{{ $data['application_form_data']['adult_first_name_' . $i] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Family Name</td>
                                                    <td>{{ $data['application_form_data']['adult_family_name_' . $i] }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Mother First Name</td>
                                                    <td>{{ $data['application_form_data']['adult_mother_first_name_' . $i] }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Mother Family Name</td>
                                                    <td>{{ $data['application_form_data']['adult_mother_family_name_' . $i] }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Passport</td>
                                                    <td><img src="{{ asset($data['application_form_data']['adult_passport_' . $i]) }}"
                                                            class="img-responsive" alt="" width="75"
                                                            height="75" style="margin: 5px 10px;" /></td>
                                                </tr>
                                            @endfor
                                        @elseif(isset($data['personal_information']['adult']) && count($data['personal_information']['adult']) > 0)
                                            @foreach ($data['personal_information']['adult'] as $key => $adult_info)
                                                <tr>
                                                    <td colspan="2"><strong>Adult Traveler -
                                                            {{ $key + 1 }}</strong></td>
                                                </tr>
                                                <tr>
                                                    <td>First Name</td>
                                                    <td>{{ $adult_info['adult_first_name'] ?? '' }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Last Name</td>
                                                    <td>{{ $adult_info['adult_last_name'] ?? '' }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Marital Status</td>
                                                    <td>{{ $adult_info['adult_marital_status'] ?? '' }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Mother First Name</td>
                                                    <td>{{ $adult_info['adult_mother_first_name'] ?? '' }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Mother Last Name</td>
                                                    <td>{{ $adult_info['adult_mother_last_name'] ?? '' }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Passport</td>
                                                <td>
                                                    @if (isset($adult_info['adult_passport_filename']))
                                                        <img src="{{ asset($adult_info['adult_passport_filename']) }}"
                                                            class="img-responsive" alt="" width="75"
                                                            height="75" style="margin: 5px 10px;" />
                                                    @endif
                                                </td>
                                                </tr>
                                                <tr>
                                                    <td>Avatar</td>
                                                <td>
                                                    @if (isset($adult_info['adult_avatar_filename']))
                                                        <img src="{{ asset($adult_info['adult_avatar_filename']) }}"
                                                            class="img-responsive" alt="" width="75"
                                                            height="75" style="margin: 5px 10px;" />
                                                    @endif
                                                </td>
                                                </tr>
                                                
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        @endif
                        @if ($data['child_count'] > 0)
                            <div class="table-responsive">
                                <table class="table jambo_table bulk_action">
                                    <thead>
                                        <tr class="headings">
                                            <th colspan="2">Child Traveler's Details</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (isset($data['application_form_data']))
                                            @for ($i = 1; $i <= $data['child_count']; $i++)
                                                <tr>
                                                    <td colspan="2"><strong>Child Traveler -
                                                            {{ $i }}</strong></td>
                                                </tr>
                                                <tr>
                                                    <td>First Name</td>
                                                    <td>{{ $data['application_form_data']['child_first_name_' . $i] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Family Name</td>
                                                    <td>{{ $data['application_form_data']['child_family_name_' . $i] }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Mother First Name</td>
                                                    <td>{{ $data['application_form_data']['child_mother_first_name_' . $i] }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Mother Family Name</td>
                                                    <td>{{ $data['application_form_data']['child_mother_family_name_' . $i] }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Passport</td>
                                                    <td><img src="{{ asset($data['application_form_data']['child_passport_' . $i]) }}"
                                                            class="img-responsive" alt="" width="75"
                                                            height="75" style="margin: 5px 10px;" /></td>
                                                </tr>
                                            @endfor
                                        @elseif(isset($data['personal_information']['child']) && count($data['personal_information']['child']) > 0)
                                            @foreach ($data['personal_information']['child'] as $key => $child_info)
                                                <tr>
                                                    <td colspan="2"><strong>Child Traveler -
                                                            {{ $key + 1 }}</strong></td>
                                                </tr>
                                                <tr>
                                                    <td>First Name</td>
                                                    <td>{{ $child_info['child_first_name'] ?? '' }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Last Name</td>
                                                    <td>{{ $child_info['child_last_name'] ?? '' }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Marital Status</td>
                                                    <td>{{ $child_info['child_marital_status'] ?? '' }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Mother First Name</td>
                                                    <td>{{ $child_info['child_mother_first_name'] ?? '' }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Mother Last Name</td>
                                                    <td>{{ $child_info['child_mother_last_name'] ?? '' }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Passport</td>
                                                <td>
                                                    @if (isset($child_info['child_passport_filename']))
                                                        <img src="{{ asset($child_info['child_passport_filename']) }}"
                                                            class="img-responsive" alt="" width="75"
                                                            height="75" style="margin: 5px 10px;" />
                                                    @endif
                                                </td>
                                                </tr>
                                                <tr>
                                                    <td>Avatar</td>
                                                <td>
                                                    @if (isset($child_info['child_avatar_filename']))
                                                        <img src="{{ asset($child_info['child_avatar_filename']) }}"
                                                            class="img-responsive" alt="" width="75"
                                                            height="75" style="margin: 5px 10px;" />
                                                    @endif
                                                </td>
                                                </tr>
                                                
                                            @endforeach
                                        @endif

                                    </tbody>
                                </table>
                            </div>
                        @endif
                        @if (isset($data['passport_count']) && $data['passport_count'] > 0)
                            <div class="table-responsive">
                                <table class="table jambo_table bulk_action">
                                    <thead>
                                        <tr class="headings">
                                            <th colspan="2">Passport's Details</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for ($i = 1; $i <= $data['passport_count']; $i++)
                                            <tr>
                                                <td colspan="2"><strong>Passport - {{ $i }}</strong></td>
                                            </tr>
                                            <tr>
                                                <td>Passport</td>
                                                <td><img src="{{ asset($data['application_form_data']['passport_' . $i]) }}"
                                                        class="img-responsive" alt="" width="75" height="75"
                                                        style="margin: 5px 10px;" /></td>
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
                                        <td>
                                            @if (isset($data['payment_form_data']))
                                                {{ $data['payment_form_data'] }}
                                            @elseif(isset($data['payment_method']))
                                                {{ $data['payment_method']['payment_method'] }}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Total Amount</td>
                                        <td>
                                            @if (isset($data['passenger_total']) && $data['passenger_total'] > 0)
                                                {{ $data['passenger_total'] }}.00 SAR
                                            @elseif(isset($data['total_cost']))
                                                {{ $data['total_cost'] }}
                                            @elseif(isset($data['passport_counter_sum']) && $data['passport_counter_sum'] > 0)
                                                {{ $data['passport_counter_sum'] }}.00 SAR
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <form action="{{ url('/admin/visa_notes') }}" method="POST">
                            @csrf
                            <input type="hidden" name="post_slug" value="{{ $id }}">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="note">Note</label>
                                    <textarea id="note" name="note" class="form-control" cols="15" rows="5"></textarea>
                                </div>
                                <div class="float-right m-3">
                                    <button type="submit" class="btn btn-success">ADD</button>
                                </div>
                            </div>
                        </form>
                        <div class="page-title">
                            <div class="title_left">
                                <h3>Note's</h3>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped jambo_table bulk_action">
                                <thead>
                                    <tr class="headings">
                                        <th>#</th>
                                        <th>Note</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($notes as $note)
                                        <tr class="even pointer">
                                            <td scope="row">{{ $loop->iteration }}</td>
                                            <td scope="row">{{ $note->note }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
