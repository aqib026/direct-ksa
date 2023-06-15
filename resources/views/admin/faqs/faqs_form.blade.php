@extends('admin.include.main')

@section('main-section')
    @push('title')
        <title>FAQs Form</title>
    @endpush
    <div class="page-title">
        <div class="title_left">
            <h3>{{ $title }}</h3>
        </div>
        <div class="title_right">
            <div class="col-md-1 col-sm-6     form-group pull-right top_search">
                <a href="{{ url('admin/faqs') }}"><button class="btn btn-danger">Back</button></a>
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
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Select
                                categorie<span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <select name="categorie" id=""
                                    value="{{ old('categorie', isset($faqs) ? $faqs->categorie->id : '') }}"
                                    class="form-control">

                                    <option value="{{ old('name', isset($faqs) ? $faqs->categorie->id : '') }}">
                                        {{ old('name', isset($faqs) ? $faqs->categorie->name : '') }}</option>

                                    @foreach ($categorie as $categories)
                                        <option value="{{ $categories->id }}">{{ $categories->name }}</option>
                                    @endforeach
                                </select>
                                @error('categorie')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Question
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input id="" type="text"
                                    class="form-control @error('answer') is-invalid @enderror" name="question"
                                    value="{{ old('lat', isset($faqs) ? $faqs->question : '') }}" required
                                    autocomplete="name" placeholder="Enter Question" autofocus>
                                @error('question')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Answer<span
                                    class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <textarea id="" type="text" class="form-control @error('answer') is-invalid @enderror" name="answer"
                                    value="" required autocomplete="name" placeholder="Enter Answer" autofocus>{{ old('long', isset($faqs) ? $faqs->answer : '') }}</textarea>
                                @error('answer')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="item form-group">
                            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Status</label>
                            <div class="col-md-6 col-sm-6 ">

                                <select name="status" class="form-control" id="">
                                    <option value="{{ old('status', isset($faqs) ? $faqs->status : '') }}">
                                        @if (old('status', isset($faqs) ? $faqs->status == 1 : ''))
                                            <span>Active</span>
                                        @else
                                            <span>InActive</span>
                                        @endif
                                    </option>
                                    <option value="1">Active</option>
                                    <option value="0">InActive</option>
                                </select>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 offset-md-3">
                                <a href="{{ url('../admin/contact_faqs') }}"> <button class="btn btn-primary"
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
