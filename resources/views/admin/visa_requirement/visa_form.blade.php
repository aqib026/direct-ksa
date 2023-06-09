@extends('admin.include.main')

@section('main-section')
    @push('title')
        <title>Visa Requirement</title>
    @endpush


    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>{{ $title }}</h3>
            </div>

            <div class="title_right">
                <div class="col-md-2 col-sm-2  form-group pull-right top_search">
                    <a href="{{ url('admin/visa_requirement') }}"><button class="btn btn-danger">Back</button></a>
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
                                <label class="col-form-label col-md-1 col-sm-1 label-align" for="first-name">Select
                                    Country<span class="required"></span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select name="name" id=""
                                        value="{{ old('name', isset($visa) ? $visa->name : '') }}" class="form-control">

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
                                <label class="col-form-label col-md-1 col-sm-1 label-align" for="first-name"> Detail<span
                                        class="required"></span>
                                </label>
                                <div class="col-md-11 col-sm-11 ">
                                    <textarea name="detail">{{ old('detail', isset($visa) ? $visa->detail : '') }}</textarea>

                                </div>
                            </div>

                            <div class="item form-group">
                                <label for="middle-name" class="col-form-label col-md-1 col-sm-1 label-align">Status</label>
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
@push('script')
    <script src="{{ asset('js/tinymce.js') }}"></script>
@endpush
