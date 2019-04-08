@extends('layouts.private')

@section('content')
    <div id="admin">
    <div class="grid-container">
      <div class="grid-x grid-margin-x margin-top-60">
        <div class="cell medium-12">
          <h1 class="text-center">About Page Content</h1>
        </div>
      </div>
    </div>
      <div class="grid-x grid-margin-x margin-top-60">
        <div class="cell medium-6 medium-offset-3">
          <form method="POST" action="/admin/about">
            @csrf
            @method('PATCH')
            <label>Introduction:
              <textarea name="introduction" id="editor" cols="30" rows="5"><?php (isset($about->introduction)) ? $about->introduction : '' ?></textarea>
            </label>
            <label>Content:
              <textarea name="content" id="editor" cols="30" rows="10"><?php (isset($about->content)) ? $about->content : '' ?></textarea>
            </label>

            <input type="submit" class="button large dark expanded uppercase" value="Submit">
          </form>
        </div>
      </div>
      <hr />
@endsection
@push('script-header')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/vader/jquery-ui.css">
    <link rel="stylesheet" href="{{ asset('css/select2/select2.css') }}">
    <script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
@endpush
@push('script-link')
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
  <script src="{{ asset('js/select2/select2.js') }}"></script>
  <script>
    var options = {
      filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
      filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
      filebrowserBrowseUrl: '/laravel-filemanager?type=Images',
      filebrowserUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}'
    };
    CKEDITOR.replace( 'content', options );
  </script>
@endpush
@push('scripts')
    $('#lfm-image').filemanager('image');
    $('#lfm-pdf').filemanager('image');

    $('#tags').select2({
        placeholder: "Choose tags…",
        minimumInputLength: 2,
        tags: 'true',
        tokenSeparators: [',', '|'],
        ajax: {
            url: '/admin/tags/fetch',
            dataType: 'json',
            data: function (params) {
                return {
                    q: $.trim(params.term)
                };
            },
            processResults: function (data) {
                return {
                    results: data
                };
            },
            cache: true
        }
    });
@endpush
