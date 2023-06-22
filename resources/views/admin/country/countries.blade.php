@extends('admin.include.main')
@section('main-section')
    @push('title')
        <title>Country</title>
    @endpush
    <section class="section border-0 m-0">
	    <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <form action="">
                        <div class="page-title">
                            <div class="title_left">
                                <h3>Countries</h3>
                            </div>
                            <div class="title_right">
                                <div class="col-md-7 col-sm-7 form-group pull-right top_search">
                                    <div class="input-group">
                                        <a href="{{ url('admin/country-form') }}" class="btn btn-dark"> Add Country</a>
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
                                            <th>Country Name (Arabic)</th>
                                            <th>Flag</th>
                                            <th>Cover Pic</th>
                                            <th>Status</th>
                                            <th>Visa Actions</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($countries as $country)
                                            <tr class="even pointer">
                                                <td scope="row">{{ $country->name }}</td>
                                                <td scope="row">{{ $country->name_ar }}</td>

                                                <td><img src="{{ asset($country->flag_pic) }}" class="me-4 my-image" width="60" alt="Flag-Pic"></td>
                                                <td><img src="{{ asset($country->cover_pic) }}" class="me-4 my-image" width="60" alt="Cover-Pic"></td>
                                                <td>
                                                    @if ($country->status == 1)
                                                        <span class="badge badge-success bg-success">Active</span>
                                                    @else
                                                        <span class="badge badge-danger  bg-danger">InActive</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ url('admin/visa_form/edit') }}/{{ $country->id }}" title="Visa Requirements"><i class="btn btn-success fa fa-tasks"></i>
                                                    <a href="{{ url('admin/visarequest') }}/{{ $country->id }}" title="Visa Types"><i class="btn btn-secondary fa fa-tasks"></i></a>                                           
                                                </td>
                                                <td>
                                                    <a href="{{ url('admin/country-form/edit/') }}/{{ $country->id }}"><i class="btn btn-success fa fa-edit "></i>
                                                    <a href="{{ url('admin/countries/delete/') }}/{{ $country->id }}"><i class="btn btn-danger fa fa-trash"></i></a>                                           
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
                            {{ $countries->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
