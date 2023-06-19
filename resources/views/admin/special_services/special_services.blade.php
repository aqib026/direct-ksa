@extends('admin.include.main')
@section('main-section')
    @push('title')
        <title>Special Services</title>
    @endpush
    <section class="section border-0 m-0">
	    <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <form action="">
                        <div class="page-title">
                            <div class="title_left">
                                <h3>Special Services</h3>
                            </div>
                            <div class="title_right">
                                <div class="col-md-7 col-sm-7 form-group pull-right top_search">
                                    <div class="input-group">
                                        <a href="{{ url('admin/special_services_form') }}" class="btn btn-dark"> Add </a>
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
                                            <th>Name</th>
                                            <th>Banner</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($services as $service)
                                            <tr class="even pointer">
                                                <td scope="row">{{ $service->name }}</td>
                                                <td><img src="{{ asset($service->banner) }}" class="me-4 border my-image" width="80" alt="Flag-Pic"></td>
                                                <td>
                                                    <a href="{{ url('admin/special_services_form/edit/') }}/{{ $service->id }}"><i class="btn btn-success fa fa-edit"></i></a>
                                                    <a href="{{ url('admin/special_services/delete/') }}/{{ $service->id }}"><i class="btn btn-danger fa fa-trash"></i></a>                                          
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
                            {{ $services->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
