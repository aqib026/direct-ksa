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
                            <label class="col-form-label col-md-1 col-sm-1 label-align" for="first-name">Select
                                Country<span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <select name="name" id=""
                                    value="{{ old('name', isset($VisaRequest) ? $VisaRequest->name : '') }}"
                                    class="form-control">

                                    <option
                                        value="{{ old('name', isset($VisaRequest) ? $VisaRequest->visatype->id : '') }}">
                                        {{ old('name', isset($VisaRequest) ? $VisaRequest->visatype->name : '') }}</option>

                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
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
