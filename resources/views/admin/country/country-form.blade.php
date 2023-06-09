@extends('admin.include.main')

@section('main-section')
    @push('title')
        <title>Country</title>
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
                            <a href="{{ url('admin/countries') }}"><button class="btn btn-danger">Back</button></a>
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
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Country
                                            Name <span class="required"></span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input id="name" type="text"
                                                class="form-control @error('name') is-invalid @enderror" name="name"
                                                value="{{ old('name', isset($countries) ? $countries->name : '') }}" required
                                                autocomplete="name" placeholder="Enter Name" autofocus>
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Flag Pic
                                            <span class="required"></span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input id="" type="file" class="form-control" name="flag_pic"
                                                value="" placeholder="" required autocomplete="">
                                            {{-- <img src="{{old('flag_pic',isset($countries)?asset($countries->flag_pic):'')}}" alt="" width="70px" height="70px"> --}}
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Cover
                                            Pic</label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input id="" type="file" class="form-control" name="cover_pic"
                                                value="" placeholder="" required autocomplete="">
                                            {{-- <img src="{{old('cover_pic',isset($countries)?asset($countries->cover_pic):'')}}" alt="" width="70px" height="70px"> --}}

                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label for="middle-name"
                                            class="col-form-label col-md-3 col-sm-3 label-align">Status</label>
                                        <div class="col-md-6 col-sm-6 ">

                                            <select name="status" class="form-control" id="">
                                                <option value="active">Active</option>
                                                <option value="inactive">InActive</option>
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
