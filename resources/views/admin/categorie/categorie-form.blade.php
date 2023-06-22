@extends('admin.include.main')

@section('main-section')
    @push('title')
        <title>Category Form</title>
    @endpush
    <div class="page-title">
        <div class="title_left">
            <h3>{{ $title }}</h3>
        </div>
        <div class="title_right">
            <div class="col-md-1 col-sm-6  form-group pull-right top_search">
                <a href="{{ url('admin/categorie') }}"><button class="btn btn-danger">Back</button></a>
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
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name"> Name
                                <span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name', isset($categorie) ? $categorie->name : '') }}" required
                                    autocomplete="name" placeholder="Enter Name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name"> Name (Arabic)
                                <span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input id="name_ar" type="text"
                                    class="form-control @error('name_ar') is-invalid @enderror" name="name_ar"
                                    value="{{ old('name', isset($categorie) ? $categorie->name_ar : '') }}" required
                                    autocomplete="name" placeholder="Enter Name in Araic" autofocus>
                                @error('name_ar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Status
                                <span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <select name="status" class="form-control" id="">
                                    <option value="1" @isset($categorie) @if ($categorie->status == 1) selected @endif @endisset>Active</option>
                                    <option value="0" @isset($categorie) @if ($categorie->status == 0) selected @endif @endisset>In Active</option>
                                </select>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 offset-md-3">
                                <a href="{{ url('../admin/categorie') }}"> <button class="btn btn-primary"
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
