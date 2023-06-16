@extends('admin.include.main')

@section('main-section')
    @push('title')
        <title>Visa Request</title>
    @endpush
    <div class="page-title">
        <div class="title_left">
            <h3>{{ $title }}</h3>
        </div>

        <div class="title_right">
            <div class="col-md-1 col-sm-6  form-group pull-right top_search">
                <a href="{{ url('admin/visarequest') }}"><button class="btn btn-danger">Back</button></a>
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
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Select Country<span class="required"></span></label>
                            <div class="col-md-6 col-sm-6 ">
                                <select name="name" value="{{ old('name', isset($VisaRequest) ? $VisaRequest->name : '') }}" class="form-control">
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}" @isset($VisaRequest) @if ($VisaRequest->countries_id == $country->id) selected @endif @endisset>{{ $country->name }}</option>
                                    @endforeach
                                </select>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Visa type
                                <span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input id="" type="text" class="form-control" name="visa_type"
                                    value="{{ old('visa_type', isset($VisaRequest) ? $VisaRequest->visa_type : '') }}"
                                    placeholder="" required autocomplete="">
                            </div>
                            @error('VisaRequest_type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="adult_price">Adult Person Price</label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="adult_price" class="form-control" name="adult_price" value="{{ old('adult_price', isset($VisaRequest) ? $VisaRequest->adult_price : '') }}">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="child_price">Adult Person Price</label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="child_price" class="form-control" name="child_price" value="{{ old('child_price', isset($VisaRequest) ? $VisaRequest->child_price : '') }}">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="passport_price">Per Passport Price</label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="passport_price" class="form-control" name="passport_price" value="{{ old('passport_price', isset($VisaRequest) ? $VisaRequest->passport_price : '') }}">
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 offset-md-3">
                                <a href="{{ url('../admin/visarequest') }}"> <button class="btn btn-primary"
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
