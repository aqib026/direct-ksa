@extends('admin.include.main')
@section('main-section')
    @push('title')
        <title>Special Services</title>
    @endpush

    <div class="">
        <form action="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Special Services </h3>
                </div>

                <div class="title_right">
                    <div class="col-md-7 col-sm-7   form-group pull-right top_search">

                        <div class="input-group">
                            <div>
                                <a href="{{ url('admin/special_services_form') }}" class="btn btn-dark"> Add </a>
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
                                    <th>Name</th>
                                    <th>Banner</th>

                                    <th>Action</th>
                                </tr>
                            </thead>



                            <tbody>
                                <tr class="even pointer">
                                    @foreach ($services as $service)
                                        <td scope="row">{{ $service->name }}</td>
                                        <td><img src="{{ asset($service->banner) }}" class="me-4 border my-image"
                                                style="width:130px;height:80px" alt="Flag-Pic"></td>
                                        <td>

                                            <a href="{{ url('admin/special_services/delete/') }}/{{ $service->id }}">
                                                <button class="btn btn-danger">Delete</button></a>
                                            <a href="{{ url('admin/special_services_form/edit/') }}/{{ $service->id }}">
                                                <button class="btn btn-success">Edit</button>
                                        </td>
                                </tr>
                                @endforeach

                            </tbody>

                        </table>
                    </div>


                </div>


            </div>
            <div class="row">
                {{ $services->links('pagination::bootstrap-4') }}
            </div>
        </div>

    </div>
@endsection
