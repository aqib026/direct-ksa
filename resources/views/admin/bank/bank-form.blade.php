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
                <a href="{{ url('admin/bank') }}"><button class="btn btn-danger">Back</button></a>
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
                                        value="{{ old('name', isset($bank) ? $bank->name : '') }}"
                                        required autocomplete="name" placeholder="Enter Name" autofocus >
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Name (Arabic)
                                    <span class="required"></span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input id="name_ar" type="text"
                                        class="form-control @error('name_ar') is-invalid @enderror" name="name_ar"
                                        value="{{ old('name_ar', isset($bank) ? $bank->name_ar : '') }}"
                                        required autocomplete="name" placeholder="Enter Name In Arabic" autofocus>
                                    @error('name_ar')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Account Number
                                    <span class="required"></span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input id="account_number" type="text"
                                        class="form-control @error('account_number') is-invalid @enderror" name="account_number"
                                        value="{{ old('account_number', isset($bank) ? $bank->account_number : '') }}"
                                        required autocomplete="name" placeholder="Account Number" autofocus >
                                    @error('account_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">IBAN
                                    <span class="required"></span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input id="iban" type="text"
                                        class="form-control @error('iban') is-invalid @enderror" name="iban"
                                        value="{{ old('iban', isset($bank) ? $bank->iban : '') }}"
                                        required autocomplete="name" placeholder="Enter IBAN" autofocus>
                                    @error('iban')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Account Title
                                <span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <textarea class="form-control @error('account_title') is-invalid @enderror" name="account_title" id="" cols="10"
                                    rows="5" required>{{ old('account_title', isset($bank) ? $bank->account_title : '') }}</textarea>
                            </div>
                            @error('account_title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div> 
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Account Title (Arabic)
                                <span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <textarea class="form-control @error('account_title_ar') is-invalid @enderror" name="account_title_ar" id="" cols="10"
                                    rows="5" required>{{ old('account_title_ar', isset($bank) ? $bank->account_title_ar : '') }}</textarea>
                            </div>
                            @error('account_title_ar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Banner
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input id="avatar" type="file" class="form-control" name="banner" value=""
                                        placeholder=""  autocomplete="">
                                    <input type="hidden" name="previous_avatar" value="{{ old('banner', isset($bank) ? $bank->banner : '') }}">
                                    @if (old('banner', isset($bank) ? $bank->banner : ''))
                                        <p> Image: <span id="previous-image">{{ old('banner', isset($bank) ? $bank->banner : '') }}</span></p>
                                </div>

                                <img src="{{ old('banner', isset($bank) ? asset($bank->banner) : '') }}" alt="Img" style="width:80px;height:80px"
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
                                     
                                        <option value="1"  @isset($bank) @if ($bank->status == 1) selected @endif @endisset>Active</option>
                                        <option value="0"  @isset($bank) @if ($bank->status == 0) selected @endif @endisset>InActive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <a href="{{ url('../admin/bank') }}"> <button class="btn btn-primary"
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
