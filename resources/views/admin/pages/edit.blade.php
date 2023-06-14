@extends('admin.include.main')

@section('main-section')
    @push('title')
        <title>Content Pages</title>
    @endpush

            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>{{ $title }}</h3>
                    </div>

                    <div class="title_right">
                        <div class="col-md-2 col-sm-2  form-group pull-right top_search">
                            <a href="{{ url('admin/accreditation') }}"><button class="btn btn-danger">Back</button></a>
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
                                <form method="POST" action="{{ route('content_pages_post', ['page_type' => $page->page]) }}">
                                    @csrf
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Title
                                            <span class="required"></span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input id="title" type="text"
                                                class="form-control @error('title') is-invalid @enderror" name="title"
                                                value="{{ old('title', isset($page) ? $page->title : '') }}"
                                                required autocomplete="name" placeholder="Enter Title" autofocus>
                                            @error('title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <div class="item form-group">
                                            <label class="col-form-label col-md-1 col-sm-1 label-align" for="first-name"> Detail<span
                                                    class="required"></span>
                                            </label>
                                            <div class="col-md-11 col-sm-11 ">
                                                <textarea name="content">{{ old('content', isset($page) ? $page->content : '') }}</textarea>

                                            </div>
                                        </div>

                                    </div>

                                    <div class="ln_solid"></div>
                                    <div class="item form-group">
                                        <div class="col-md-6 col-sm-6 offset-md-3">
                                            <button type="submit" class="btn btn-success">Submit</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    @endsection
    @push('script')
        <script src="{{ asset('js/tinymce.js') }}"></script>
    @endpush

