@extends('admin.include.main')
@section('main-section')
    @push('title')
        <title>Contact Location</title>
    @endpush
    <div class="row">
        <div class="col-md-12">
            <form action="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Contact Location </h3>
                    </div>
                    <div class="title_right">
                        <div class="col-md-7 col-sm-7   form-group pull-right top_search">
                            <div class="input-group">
                                <div>
                                    <a href="{{ url('admin/contact_form') }}" class="btn btn-dark"> Add Contact Location</a>
                                </div>
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
            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_content">
                        <div class="table-responsive">
                            <table class="table table-striped jambo_table bulk_action">
                                <thead>
                                    <tr class="headings">
                                        <th>City Name</th>
                                        <th>Address</th>
                                        <th>Lat</th>
                                        <th>Lang</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="even pointer">
                                        @foreach ($location as $locations)
                                            <td scope="row">{{ $locations->name }}</td>
                                            <td> {{ $locations->address }}</td>
                                            <td>{{ $locations->latitude }}</td>
                                            <td>{{ $locations->longitude }}</td>

                                            <td>
                                                @if ($locations->status == 1)
                                                    <span class="badge badge-success bg-success">Active</span>
                                                @else
                                                    <span class="badge badge-danger  bg-danger">InActive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ url('admin/contact_form/edit/') }}/{{ $locations->id }}">
                                                    <i class="btn btn-success fa fa-edit"></i>
                                                    <a
                                                        href="{{ url('admin/contact_location/delete/') }}/{{ $locations->id }}">
                                                        <i class="btn btn-danger fa fa-trash"></i></a>
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
                        {{ $location->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
