@extends('admin.include.main')
@section('main-section')
    @push('title')
        <title>Visa Type</title>
    @endpush
    <section class="section border-0 m-0">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <form action="">
                        <div class="page-title">
                            <div class="title_left">
                                <h3>Visa Type</h3>
                            </div>
                            <div class="title_right">
                                <div class="col-md-7 col-sm-7 form-group pull-right top_search">
                                    <div class="input-group">
                                        <a href="{{ url('admin/visarequest_form') }}" class="btn btn-dark">Add Visa Type</a>
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
                                            <th>VisaRequest Type</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($VisaRequest as $VisaRequests)
                                            <tr class="even pointer">
                                                <td scope="row">{{ $VisaRequests->visatype->name }}</td>
                                                <td>{{ $VisaRequests->visa_type }}</td>
                                                <td>
                                                    <a href="{{ url('admin/visarequest_form/edit/') }}/{{ $VisaRequests->id }}"><i class="btn btn-success fa fa-edit"></i>
                                                    <a href="{{ url('admin/visarequest/delete/') }}/{{ $VisaRequests->id }}"><i class="btn btn-danger fa fa-trash"></i></a>
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
                            {{ $VisaRequest->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection