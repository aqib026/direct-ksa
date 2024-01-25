@extends('...admin.include.main')

@section('main-section')
    @push('title')
        <title>Feature Form</title>
    @endpush
    <div class="right_col" role="main">
        <div class="page-title">
            <div class="title_left">
                <h3>{{ $title }}</h3>
            </div>
            <div class="title_right">
                <div class="col-md-1 col-sm-6  form-group pull-right top_search">
                    <a href="{{ url('admin/dashboard') }}"><button class="btn btn-danger">Back</button></a>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>{{ $title }} <small>ExVisas</small></h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form method="POST" action="{{ $url }}" enctype="multipart/form-data">
                            @csrf
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name"> Name <span
                                        class="required"></span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name', isset($user) ? $user->name : '') }}" required autocomplete="name"
                                        placeholder="Enter Name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Profile
                                    Pic</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input id="" type="file" class="form-control" name="profile_pic"
                                        value="" {{ isset($user->profile_pic ) ? '' : 'required' }} placeholder=""  autocomplete="">
                                    <input type="hidden" name="previous_avatar" value="{{ $user->profile_pic }}">
                                    @if ($user->profile_pic)
                                        <p> Image: <span id="previous-image">{{ $user->profile_pic }}</span></p>
                                </div>

                                <img src="{{ asset($user->profile_pic) }}" alt="Img" style="width:80px;height:80px"
                                    class="me-4 border">
                            @else
                                <p>No Image Uploaded.</p>
                                @endif
                            </div>
                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <a href="{{ url('../admin/dashboard') }}"> <button class="btn btn-primary"
                                            type="button">Cancel</button></a>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
