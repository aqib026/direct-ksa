@extends('admin.include.main')

@section('main-section')
    @push('title')
        <title>Location Form</title>
    @endpush

    <body class="login">
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>{{ $title }}</h3>
                    </div>

                    <div class="title_right">
                        <div class="col-md-2 col-sm-2  form-group pull-right top_search">
                            <a href="{{ url('admin/contact_location') }}"><button class="btn btn-danger">Back</button></a>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 ">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>{{ $title }} <small>Direct KSA</small></h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <br />
                                <form method="POST" action="{{ $url }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">City
                                            Name <span class="required"></span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input id="name" type="text"
                                                class="form-control @error('name') is-invalid @enderror" name="name"
                                                value="{{ old('name', isset($location) ? $location->name : '') }}" required
                                                autocomplete="name" placeholder="Enter Name" autofocus>
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Address
                                            <span class="required"></span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <textarea class="form-control" name="address" id="" cols="10" rows="5">{{ old('address', isset($location) ? $location->address : '') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label for="middle-name"
                                            class="col-form-label col-md-3 col-sm-3 label-align">Lat</label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input id="" type="text" class="form-control" name="lat"
                                                value="{{ old('lat', isset($location) ? $location->lat : '') }}" placeholder=""
                                                required autocomplete="">

                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label for="middle-name"
                                            class="col-form-label col-md-3 col-sm-3 label-align">Lang</label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input id="" type="text" class="form-control" name="lang"
                                                value="{{ old('lang', isset($location) ? $location->lang : '') }}" placeholder=""
                                                required autocomplete="">

                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label for="middle-name"
                                            class="col-form-label col-md-3 col-sm-3 label-align">Status</label>
                                        <div class="col-md-6 col-sm-6 ">

                                            <select name="status" class="form-control" id="">
                                                <option value="1">Active</option>
                                                <option value="0">InActive</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="ln_solid"></div>
                                    <div class="item form-group">
                                        <div class="col-md-6 col-sm-6 offset-md-3">
                                            <a href="{{ url('../admin/countries') }}"> <button class="btn btn-primary"
                                                    type="button">Cancel</button></a>
                                            <button type="submit" class="btn btn-success">Submit</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
