@extends('admin.include.main')

@section('main-section')
    @push('title')
        <title>{{ $title }}</title>
    @endpush
    <section class="section border-0 m-0">
	    <div class="container">
            <div class="page-title">
                <div class="title_left">
                    <h3>{{ $title }}</h3>
                </div>
                <div class="title_right">
                    <div class="col-md-1 col-sm-6  form-group pull-right top_search">
                        <a href="{{ url('admin/countries') }}"><button class="btn btn-danger">Back</button></a>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>{{ $title }} </h2>

                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br />
                            <form method="POST" action="{{ $url }}" enctype="multipart/form-data">
                                @csrf
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Country Name<span class="required"></span></label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', isset($countries) ? $countries->name : '') }}" required autocomplete="name" placeholder="Enter Name" autofocus>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Country Name (Arabic)<span class="required"></span></label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input id="name_ar" type="text" class="form-control @error('name') is-invalid @enderror" name="name_ar" value="{{ old('name_ar', isset($countries) ? $countries->name_ar : '') }}" required autocomplete="name" placeholder="Enter Name" autofocus>
                                        @error('name_ar')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Flag Pic<span class="required"></span></label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input id="" type="file" name="flag_pic" value="" placeholder="" {{ isset($countries->flag_pic) ? '' : 'required' }}>
                                        <input type="hidden" name="previous_avatar" value="{{ old('flag_pic', isset($countries) ? $countries->flag_pic : '') }}">
                                        @if (old('flag_pic', isset($countries) ? $countries->flag_pic : ''))
                                            <p>Selected Image: <span id="previous-image">{{ old('flag_pic', isset($countries) ? $countries->flag_pic : '') }}</span></p>
                                            <img src="{{ old('flag_pic', isset($countries) ? asset($countries->flag_pic) : '')}}" alt="Img" width="80" class="me-4" />
                                        @else
                                            <p>No Image Uploaded.</p>
                                        @endif
                                    </div>
                                </div>
                                <hr>
                                <div class="item form-group">
                                    <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Cover Pic</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input id="" type="file" name="cover_pic" {{ isset($countries->cover_pic) ? '' : 'required' }}>
                                        <input type="hidden" name="previous_avatar" value="{{ old('cover_pic', isset($countries) ? $countries->cover_pic : '') }}">
                                        @if (old('cover_pic', isset($countries) ? $countries->cover_pic : ''))
                                            <p>Selected Image: <span id="previous-image">{{ old('cover_pic', isset($countries) ? $countries->cover_pic : '') }}</span></p>
                                            <img src="{{old('cover_pic', isset($countries) ? asset($countries->cover_pic) : '') }}" alt="Img" width="80" class="me-4" />
                                        @else
                                            <p>No Image Uploaded.</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label for="middle-name"
                                        class="col-form-label col-md-3 col-sm-3 label-align">Status</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <select name="status" class="form-control" id="">
                                            <option value="1"   @isset($countries) @if($countries->status == 1) selected @endif @endisset>Active</option>
                                            <option value= "0"  @isset($countries) @if($countries->status == 0) selected @endif @endisset>InActive</option>
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
    </section>
          
@endsection
