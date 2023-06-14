@extends('admin.include.main')
@section('main-section')
    @push('title')
        <title>FAQs</title>
    @endpush


    <div class="">
        <form action="">
            <div class="page-title">
                <div class="title_left">
                    <h3>FAQs </h3>
                </div>

                <div class="title_right">
                    <div class="col-md-7 col-sm-7   form-group pull-right top_search">

                        <div class="input-group">
                            <div>
                                <a href="{{ url('admin/faqs_form') }}" class="btn btn-dark"> Add FAQs</a>
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
                                    <th>Question</th>
                                    <th>Answer</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>



                            <tbody>
                                <tr class="even pointer">
                                    @foreach ($faqs as $faqss)
                                        <td scope="row">{{ $faqss->categorie }}</td>
                                        <td>{{ $faqss->question }}</td>
                                        <td>{{ $faqss->answer }}</td>
                                       

                                        <td>
                                            @if ($faqss->status == 1)
                                                <span class="badge badge-success bg-success">Active</span>
                                            @else
                                                <span class="badge badge-danger  bg-danger">InActive</span>
                                            @endif
                                        </td>
                                        <td>

                                            <a href="{{ url('admin/faqs/delete/') }}/{{ $faqss->id }}">
                                                <button class="btn btn-danger">Delete</button></a>
                                            <a href="{{ url('admin/faqs_form/edit/') }}/{{ $faqss->id }}">
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
                {{ $faqs->links('pagination::bootstrap-4') }}
            </div>

        </div>


    </div>
@endsection
