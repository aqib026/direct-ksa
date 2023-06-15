@extends('admin.include.main')
@section('main-section')
    @push('title')
        <title>
            Featured Sale</title>
    @endpush
    <div class="page-title">
        <div class="title_left">
            <h3>Featured Sale</h3>
        </div>
        <a href="{{ url('admin/featured_sales') }}"><button class="float-right btn btn-danger">Back</button></a>
    </div>
    <div class="clearfix"></div>
    <div class="col-md-12 col-sm-12">
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
                                <td>Required Service</td>
                                <td>
                                    @switch($featured_sale->required_service)
                                        @case('translation')
                                            Translation
                                        @break

                                        @case('passport_renewals')
                                            Passport Renewals
                                        @break

                                        @case('intl_dl_card')
                                            Intl Driving License - Card
                                        @break

                                        @case('intl_dl_booklet')
                                            Intl Driving License - Booklet
                                        @break

                                        @case('uni_adm')
                                            University Admissions
                                        @break

                                        @case('uae_visa')
                                            UAE Visa for KSA Residents
                                        @break

                                        @case('forms_filling')
                                            Forms Filling
                                        @break

                                        @case('bahrain_visa')
                                            Bahrain Visa for KSA Residents
                                        @break

                                        @case('vip')
                                            Premium Service (VIP)
                                        @break

                                        @default
                                    @endswitch
                                </td>
                            </tr>
                            @if ($featured_sale->required_service == 'translation')
                                <tr>
                                    <td>Paper Quantity</td>
                                    <td>{{ $featured_sale->paper_quantity }}</td>
                                </tr>
                                @php
                                    $values = explode('|', $featured_sale->documents);
                                @endphp
                                <tr>
                                    <td>Documents</td>
                                    <td>
                                        @foreach ($values as $value)
                                            <img src="{{ asset('image/' . $value) }}" class="img-responsive" alt=""
                                                width="100" height="100" style="margin: 5px 10px;" />
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td>Translation Content</td>
                                    <td>{{ $featured_sale->translation_content }}</td>
                                </tr>
                            @endif

                            @if ($featured_sale->required_service == 'passport_renewals')
                                <tr>
                                    <td>Passport Quantity</td>
                                    <td>{{ $featured_sale->passport_quantity }}</td>
                                </tr>
                                <tr>
                                    <td>Country</td>
                                    <td>{{ $featured_sale->country }}</td>
                                </tr>
                            @endif

                            @if ($featured_sale->required_service == 'intl_dl_card')
                                <tr>
                                    <td>IDL Card Quantity</td>
                                    <td>{{ $featured_sale->idl_card_qty }}</td>
                                </tr>
                                <tr>
                                    <td>License Collection Choice</td>
                                    <td>{{ $featured_sale->lic_col_choice }}</td>
                                </tr>
                            @endif

                            @if ($featured_sale->required_service == 'intl_dl_booklet')
                                <tr>
                                    <td>IDL Quantity</td>
                                    <td>{{ $featured_sale->idl_qty }}</td>
                                </tr>
                                <tr>
                                    <td>License Collection Choice</td>
                                    <td>{{ $featured_sale->lic_col_choice }}</td>
                                </tr>
                            @endif

                            @if ($featured_sale->required_service == 'uni_adm')
                                <tr>
                                    <td>Country</td>
                                    <td>{{ $featured_sale->univ_adm_country }}</td>
                                </tr>
                                <tr>
                                    <td>Nationality</td>
                                    <td>{{ $featured_sale->nationality }}</td>
                                </tr>
                                <tr>
                                    <td>Mode of Finance</td>
                                    <td>{{ $featured_sale->mode_of_finance }}</td>
                                </tr>
                                <tr>
                                    <td>Major of Study (2 majors maximum)</td>
                                    <td>{{ $featured_sale->major_of_study }}</td>
                                </tr>
                                <tr>
                                    <td>Current Qualification</td>
                                    <td>{{ $featured_sale->current_qualification }}</td>
                                </tr>
                                <tr>
                                    <td>Last Qualification Grade</td>
                                    <td>{{ $featured_sale->last_qualification_grade }}</td>
                                </tr>
                                <tr>
                                    <td>Do you have IELTS or TOEFL Certification?</td>
                                    <td>{{ $featured_sale->certification }}</td>
                                </tr>
                                <tr>
                                    <td>Best time to call</td>
                                    <td>{{ $featured_sale->call_time }}</td>
                                </tr>
                            @endif

                            @if ($featured_sale->required_service == 'uae_visa')
                                <tr>
                                    <td>Passport Count</td>
                                    <td>{{ $featured_sale->passport_quantity }}</td>
                                </tr>
                            @endif

                            @if ($featured_sale->required_service == 'forms_filling')
                                <tr>
                                    <td>Form Type</td>
                                    <td>{{ $featured_sale->form_type }}</td>
                                </tr>
                            @endif

                            @if ($featured_sale->required_service == 'bahrain_visa')
                                <tr>
                                    <td>Passport Count</td>
                                    <td>{{ $featured_sale->passport_quantity }}</td>
                                </tr>
                            @endif

                            @if ($featured_sale->required_service == 'vip')
                                <tr>
                                    <td>Passport Count</td>
                                    <td>{{ $featured_sale->passport_quantity }}</td>
                                </tr>
                            @endif

                            <tr>
                                <td>Applicant Name</td>
                                <td>{{ $featured_sale->applicant_name }}</td>
                            </tr>
                            <tr>
                                <td>Mobile Number</td>
                                <td>+966{{ $featured_sale->mobile_number }}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>{{ $featured_sale->email }}</td>
                            </tr>
                            <tr>
                                <td>Service Cost</td>
                                <td>{{ $featured_sale->service_cost }}</td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <div class="row col-md-12">
                                    <td>
                                        <div class="col-md-4">
                                            <form action="{{ $url }}" method="POST">
                                                @csrf
                                                <select name="status" class="form-control" id="">
                                                    <option value="{{ $featured_sale->status }}">
                                                        @if ($featured_sale->status == 0)
                                                            <span class="badge badge-success bg-success">New</span>
                                                        @elseif ($featured_sale->status == 1)
                                                            <span class="badge badge-warning bg-warning">Pending</span>
                                                        @elseif ($featured_sale->status == 2)
                                                            <span class="badge badge-info bg-info">Progress</span>
                                                        @else
                                                            <span class="badge badge-primary bg-primary">delivered</span>
                                                        @endif
                                                    </option>
                                                    <option value="0">New</option>
                                                    <option value="1">Pending</option>
                                                    <option value="2">Progress</option>
                                                    <option value="3">Delivered</option>
                                                </select>
                                                <button type="submit"
                                                    class="btn btn-success m-2 float-right">Submit</button>
                                            </form>
                                        </div>
                                    </td>
                                </div>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <form action="{{ url('/admin/notes') }} " method="POST">
                @csrf
                <div class="col-md-12">
                    <input type="hidden" name="post_slug" id="" value="{{ $featured_sale->id }}">
                    <div class="col-md-6">
                        <label for="">Note</label>

                        <div class="">
                            <textarea name="note" id="" class="form-control" cols="15" rows="5"></textarea>

                        </div>
                        <div class="float-right m-3">
                            <button type="submit" class="btn btn-success">ADD</button>
                        </div>
                    </div>
                </div>
            </form>

            <div class="">
                <form action="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>NOTE </h3>
                        </div>

                        <div class="title_right">
                            <div class="col-md-7 col-sm-7   form-group pull-right top_search">
                            </div>
                        </div>
                    </div>
                </form>
                <div class="clearfix"></div>
                <div class="col-md-12 col-sm-12  ">
                    <div class="x_panel">
                        <div class="x_content">
                            <div class="table-responsive">

                                <table class="table table-striped jambo_table bulk_action">
                                    <thead>
                                        <tr class="headings">
                                            <th>Note</th>

                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="even pointer">
                                            @foreach ($note as $note)
                                                <td scope="row">{{ $note->note }}</td>
                                                <td class="text-center">

                                                    <a href="{{ url('admin/notes/delete/') }}/{{ $note->id }}">
                                                        <button class="btn btn-danger">Delete</button></a>

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
        </div>
    </div>
    </div>
@endsection
