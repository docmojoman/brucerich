@extends('layouts.private')

@section('content')
    <div id="admin">
    <div class="grid-container">
      <div class="grid-x grid-margin-x margin-top-80">
        <div class="cell medium-8 medium-offset-2">
          <h1 class="h2 text-center">Add New Book</h1>
          <form method="POST" action="/admin/books">
            @csrf
            <label>Book Title:
              <input name="title" type="text" placeholder="Title" value="{{ old('title') }}">
            </label>
            <label>Book Image:
            <div class="input-group">
               <span class="input-group-btn">
                 <a id="lfm-image" data-input="thumbnail-image" data-preview="holder" class="button dark">
                   <i class="fa fa-picture-o fi-photo"></i> &nbsp;&nbsp;Choose
                 </a>
               </span>
               <input id="thumbnail-image" class="form-control" type="text" name="image" value="{{ old('image') }}">
             </div>
            </label>
            <label>About:
              <textarea name="about" id="editor" cols="30" rows="10">
                {!! old('about') !!}
              </textarea>
            </label>
            {{-- Begin Dynamic Form Sections --}}
            <label>Header:
              <input name="section[][header][]" type="text" placeholder="Title" value="">
            </label>
            <label>Content:
              <textarea name="section[][description][]" class="editor" cols="30" rows="10"></textarea>
            </label>
            {{-- End Dynamic Form Section --}}
            <hr />
            <div class="text-center">
              <button class="new_section button large dark margin-top-40">Add New Text Section</button>
              <button class="new_section button large dark margin-top-40">Add New Video Section</button>
            </div>
            <hr />
            <label>Tags:
              <select id="tags" class="js-example-basic-multiple" name="tags[]" multiple="multiple">
              </select>
            </label>
            <input type="submit" class="button large dark expanded margin-top-40" value="Submit">
          </form>
        </div>
      </div>
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
      filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
      filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
      filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
    };
    CKEDITOR.replace( 'about', options );
  </script>
@endpush
@push('scripts')
    $('#lfm-image').filemanager('image');
    $('#lfm-pdf').filemanager('image');
    $( "#datepicker" ).datepicker(
       { dateFormat: "yy-mm-dd" }
    );

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
