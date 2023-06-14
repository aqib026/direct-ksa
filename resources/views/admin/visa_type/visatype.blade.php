@extends('admin.include.main')
@section('main-section')
    @push('title')
        <title>Visa Request </title>
    @endpush


    <div class="">
        <form action="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Visa Request </h3>
                </div>

                <div class="title_right">
                    <div class="col-md-7 col-sm-7   form-group pull-right top_search">

                        <div class="input-group">
                            <div>
                                <a href="{{ url('admin/visarequest_form') }}" class="btn btn-dark"> Add Visa Request </a>
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
                                    <th>Country Name</th>
                                    <th>VisaRequest Type</th>
                                    
                                    <th>Action</th>
                                </tr>
                            </thead>



                            <tbody>
                                <tr class="even pointer">
                                    @foreach ($VisaRequest as $VisaRequests)
                                        <td scope="row">{{ $VisaRequests->visatype->name }}</td>



                                        <td> {{ $VisaRequests->visa_type }}</td>
                                        
                                        <td>

                                            <a href="{{ url('admin/visarequest/delete/') }}/{{ $VisaRequests->id }}">
                                                <button class="btn btn-danger">Delete</button></a>
                                            <a href="{{ url('admin/visarequest_form/edit/') }}/{{ $VisaRequests->id }}">
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
                {{ $VisaRequest->links('pagination::bootstrap-4') }}
            </div>

        </div>


    </div>
@endsection