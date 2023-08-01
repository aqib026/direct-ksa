@extends('admin.include.main')

@section('main-section')
    @push('title')
        <title>{{ $title }}</title>
        <script src="https://cdn.tiny.cloud/1/hug50cit7wgg002tl8n59158ayw82gtgkeuj8uu5sedz6vwu/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    @endpush
    <section class="section border-0 m-0">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>{{ $title }}</h3>
                        </div>
                        <div class="title_right">
                            <div class="col-md-2 col-sm-2 form-group pull-right top_search">
                                <a href="{{ url('admin/dashboard') }}"><button class="btn btn-danger">Back</button></a>
                            </div>
                        </div>
                    </div>
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>{{ $title }}</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br />
                            <form method="POST" action="{{ route('content_pages_post', ['page_type' => $page->page]) }}">
                                @csrf
                                <div class="item form-group">
                                    <label class="col-form-label col-md-1 col-sm-1 label-align" for="title">Title<span class="required"></span></label>
                                    <div class="col-md-10 col-sm-10">
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
                                    <label class="col-form-label col-md-1 col-sm-1 label-align" for="title">Title (Arabic)<span class="required"></span></label>
                                    <div class="col-md-10 col-sm-10">
                                        <input id="title_ar" type="text"
                                            class="form-control @error('title_ar') is-invalid @enderror" name="title_ar"
                                            value="{{ old('title_ar', isset($page) ? $page->title_ar : '') }}"
                                            required autocomplete="name" placeholder="Enter Title in Arabic" autofocus>
                                        @error('title_ar')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-1 col-sm-1 label-align" for="content">Detail<span class="required"></span></label>
                                        <div class="col-md-11 col-sm-11">
                                            <textarea name="content" class="tinymce-editor" >{{ old('content', isset($page) ? $page->content : '') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-1 col-sm-1 label-align" for="content">Detail_ar<span class="required"></span></label>
                                        <div class="col-md-11 col-sm-11">
                                            <textarea name="content_ar" class="tinymce-editor">{{ old('content_ar', isset($page) ? $page->content_ar : '') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <div class="col-md-6 col-sm-6 offset-md-1">
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
@push('script')
    <!-- Initialize TinyMCE -->
    <script>
        tinymce.init({
            selector: '.tinymce-editor',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        });
    </script>
{{--    <script>--}}
{{--        tinymce.init({--}}
{{--            selector: '.tinymce-editor', // Add the 'tinymce-editor' class to your textarea to enable TinyMCE on it--}}
{{--            plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',--}}
{{--            toolbar_mode: 'floating',--}}
{{--        });--}}
{{--    </script>--}}
@endpush
    @push('script')
        <script src="{{ asset('js/tinymce.js') }}"></script>
    @endpush

