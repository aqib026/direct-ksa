@extends('admin.include.main')
@section('main-section')
    @push('title')
        <title>Visa Requirement</title>
    @endpush
    <section class="section border-0 m-0">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <form action="">
                        <div class="page-title">
                            <div class="title_left">
                                <h3>Visa Requirement</h3>
                            </div>
                            <div class="title_right">
                                <div class="col-md-7 col-sm-7 form-group pull-right top_search">
                                    <div class="input-group">
                                        <a href="{{ url('admin/visa_form') }}" class="btn btn-dark"> Add Visa Requirement</a>
                                        <input type="search" name="search" class="form-control" placeholder="Search for...">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="submit">Go!</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="x_panel">
                        <div class="x_content">
                            <div class="table-responsive">
                                <table class="table table-striped jambo_table bulk_action">
                                    <thead>
                                        <tr class="headings">
                                            <th>Country Name</th>
                                            <th>Detail</th>
                                            <th>Detail (Arabic)</th>
                                            <th>Mobile Detail</th>
                                            <th>Mobile Detail (Arabic)</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($visa as $visas)
                                            <tr class="even pointer">
                                                <td scope="row">{{ $visas->visa->name }}</td>
                                                @php
                                                    $limitedContent = strlen($visas->detail) > 100 ? substr($visas->detail, 0, 100) . '...' : $visas->detail;
                                                @endphp
                                                <td>{{ $limitedContent }}</td>
                                                @php
                                                $limitedContent_ar = strlen($visas->detail_ar) > 100 ? substr($visas->detail_ar, 0, 100) . '...' : $visas->detail_ar;
                                            @endphp
                                            <td>{{ $limitedContent_ar }}</td>
                                                @php
                                                    $limitedmobileContent = strlen($visas->mobile_detail) > 100 ? substr($visas->mobile_detail, 0, 100) . '...' : $visas->mobile_detail;
                                                @endphp
                                                <td>{{ $limitedmobileContent }}</td>
                                                @php
                                                    $limitedmobileContent_ar = strlen($visas->mobile_detail_ar) > 100 ? substr($visas->mobile_detail_ar, 0, 100) . '...' : $visas->mobile_detail_ar;
                                                @endphp
                                                <td>{{ $limitedmobileContent_ar }}</td>
                                                <td>
                                                    @if ($visas->status == 1)
                                                        <span class="badge badge-success bg-success">Active</span>
                                                    @else
                                                        <span class="badge badge-danger bg-danger">InActive</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ url('admin/visa_form/edit/') }}/{{ $visas->id }}"><i class="btn btn-success fa fa-edit"></i>
                                                    <a href="{{ url('admin/visa_requirement/delete/') }}/{{ $visas->id }}"><i class="btn btn-danger fa fa-trash"></i></a>
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
                            {{ $visa->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
