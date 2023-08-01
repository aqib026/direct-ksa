@extends('admin.include.main')

@section('main-section')
    @push('title')
        <title>{{ $title }}</title>

    @endpush

    <div class="page-title">
        <div class="title_left">
            <h3>{{ $title }}</h3>
        </div>

        <div class="title_right">
            <div class="col-md-1 col-sm-6  form-group pull-right top_search">
                <a href="{{ url('admin/visa_requirement') }}"><button class="btn btn-danger">Back</button></a>
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
                            <label class="col-form-label col-md-1 col-sm-1 label-align" for="first-name">Select
                                Country<span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <select name="name" id="" value="{{ old('name', isset($visa) ? $visa->name : '') }}" class="form-control">
                                    @foreach ($countries as $id => $name)
                                        <option value="{{ $id }}" @isset($visa) @if ($visa->countries_id == $id) selected @endif @endisset>{{ $name }}</option>
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
                                <textarea name="detail" class="tinymce-editor"> {{ old('detail', isset($visa) ? $visa->detail : '') }}</textarea>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-1 col-sm-1 label-align" for="first-name"> Detail (Arabic)<span
                                    class="required"></span>
                            </label>
                            <div class="col-md-11 col-sm-11 ">
                                <textarea name="detail_ar" class="tinymce-editor">{{ old('detail_ar', isset($visa) ? $visa->detail_ar : '') }}</textarea>
                            </div>
                        </div>
                             <div class="item form-group">
                            <label class="col-form-label col-md-1 col-sm-1 label-align" for="first-name">Mobile Detail <span
                                    class="required"></span>
                            </label>
                            <div class="col-md-11 col-sm-11  ">
                                <textarea name="mobile_detail" class="w-100" style="height:350px;">{{ old('mobile_detail', isset($visa) ? $visa->mobile_detail : '') }}</textarea>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-1 col-sm-1 label-align" for="first-name">Mobile Detail (Arabic)<span
                                    class="required"></span>
                            </label>
                            <div class="col-md-11 col-sm-11 ">
                                <textarea name="mobile_detail_ar" class="w-100" style="height: 350px;" >{{ old('mobile_detail_ar', isset($visa) ? $visa->mobile_detail_ar : '') }}</textarea>
                            </div>
                        </div>

                        <div class="item form-group">
                            <label for="middle-name" class="col-form-label col-md-1 col-sm-1 label-align">Status</label>
                            <div class="col-md-6 col-sm-6 ">

                                <select name="status" class="form-control" id="">
                                    <option value="1" @isset($visa) @if ($visa->status == 1) selected @endif @endisset>Active</option>
                                    <option value="0" @isset($visa) @if ($visa->status == 0) selected @endif @endisset>InActive</option>
                                </select>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 offset-md-3">
                                <a href="{{ url('../admin/visa_requirement') }}"> <button class="btn btn-primary"
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
@push('script')
    <script src="{{ asset('vendor/tinymce/tinymce/tinymce.min.js') }}"></script>

    <!-- Initialize TinyMCE -->
    <script>
        tinymce.init({
            selector: '.tinymce-editor', // Add the 'tinymce-editor' class to your textarea to enable TinyMCE on it
            plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            toolbar_mode: 'floating',
        });
    </script>
@endpush
