@extends('admin.include.main')
@section('main-section')
    @push('title')
        <title>Service Requests</title>
    @endpush

    <div class="row">
        <div class="col-md-12">
        <form action="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Service Requests</h3>
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
                                    <th>#</th>
                                    <th>Required Service</th>
                                    <th>Applicant Name</th>
                                    <th>Mobile No</th>
                                    <th>Email</th>
                                    <th>Created Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($featured_sales as $accre)
                                    <tr class="even pointer">
                                        <td scope="row">{{ $loop->iteration }}</td>
                                        <td>
                                            @switch($accre->required_service)
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
                                        <td>{{ $accre->applicant_name }}</td>
                                        <td>+966{{ $accre->mobile_number }}</td>
                                        <td>{{ $accre->email }}</td>
                                        <td>{{ $accre->created_at }}</td>
                                        <td>
                                            @if ($accre->status == 0)
                                                <span class="badge badge-success bg-success">New</span>
                                            @elseif ($accre->status == 1)
                                                <span class="badge badge-warning bg-warning">Pending </span>
                                            @elseif ($accre->status == 2)
                                                <span class="badge badge-success bg-success">Progress</span>
                                            @else
                                                <span class="badge badge-primary bg-primary">Delivered</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('admin/featured_sales/edit/') }}/{{ $accre->id }}">
                                                <i class="btn btn-success fa fa-eye"></i>
                                                <!-- <a href="{{ url('admin/featured_sales/delete/') }}/{{ $accre->id }}">
                                                    <i class="btn btn-danger fa fa-trash"></i></a> -->
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
                {{ $featured_sales->links('pagination::bootstrap-4') }}
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
