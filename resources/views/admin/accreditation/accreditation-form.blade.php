@extends('admin.include.main')

@section('main-section')
    @push('title')
        <title>Accreditation</title>
    @endpush
    <div class="page-title">
        <div class="title_left">
            <h3>{{ $title }}</h3>
        </div>
        <div class="title_right">
            <div class="col-md-1 col-sm-6  form-group pull-right top_search">
                <a href="{{ url('admin/accreditation') }}"><button class="btn btn-danger">Back</button></a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <h2>{{ $title }}
                    <div class="x_title"> </div>
                    <div class="x_content">
                        <br />
                        <form method="POST" action="{{ $url }}" enctype="multipart/form-data">
                            @csrf
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Name
                                    <span class="required"></span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name', isset($accreditation) ? $accreditation->name : '') }}"
                                        required autocomplete="name" placeholder="Enter Name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Banner
                                    <span class="required"></span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input id="avatar" type="file" class="form-control" name="banner" value=""
                                        placeholder=""  {{ isset($accreditation->banner ) ? '' : 'required' }} autocomplete="">
                                    <input type="hidden" name="previous_avatar" value="{{ old('banner', isset($accreditation) ? $accreditation->banner : '') }}">
                                    @if (old('banner', isset($accreditation) ? $accreditation->banner : ''))
                                        <p> Image: <span id="previous-image">{{ old('banner', isset($accreditation) ? $accreditation->banner : '') }}</span></p>
                                </div>

                                <img src="{{ old('banner', isset($accreditation) ? asset($accreditation->banner) : '') }}" alt="Img" style="width:80px;height:80px"
                                    class="me-4 border">
                            @else
                                <p>No Image Uploaded.</p>
                            </div>
                                @endif
                            </div>
                            <div class="item form-group">
                                <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Status</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select name="status" class="form-control" id="">
                                     
                                        <option value="1"  @isset($accreditation) @if ($accreditation->status == 1) selected @endif @endisset>Active</option>
                                        <option value="0"  @isset($accreditation) @if ($accreditation->status == 0) selected @endif @endisset>InActive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <a href="{{ url('../admin/accreditation') }}"> <button class="btn btn-primary"
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
