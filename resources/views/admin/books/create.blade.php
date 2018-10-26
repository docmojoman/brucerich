@extends('layouts.private')

@section('content')
    <div id="admin">
    <div class="grid-container">
      <div class="grid-x grid-margin-x margin-top-80">
        <div class="cell medium-8 medium-offset-2">
          <h1 class="h2 text-center">Add New Book</h1>
          <form method="POST" action="/admin/articles">
            @csrf
            <label>Book Title:
              <input name="title" type="text" placeholder="Title" value="{{ old('title') }}">
            </label>
            <label>Author ( + coauthor if provided ):
              <input name="author" type="text" placeholder="Author" value="{{ old('author') }}">
            </label>
            <label>Publication:
              <input name="publication" type="text" placeholder="Publication" value="{{ old('publication') }}">
            </label>
            <label>Date:
              <input name="date" id="datepicker" type="text" placeholder="Date" value="{{ old('date') }}" autocomplete="off">
            </label>
            <label>About:
              <textarea name="about" id="editor" cols="30" rows="10">
                {!! old('about') !!}
              </textarea>
            </label>
            <label>Video:
            <div class="input-group">
               <span class="input-group-btn">
                 <a id="lfm-image" data-input="thumbnail-image" data-preview="holder" class="button dark">
                   <i class="fa fa-picture-o fi-photo"></i> &nbsp;&nbsp;Choose
                 </a>
               </span>
               <input id="thumbnail-image" class="form-control" type="text" name="video" value="{{ old('video') }}">
             </div>
            </label>
            {{-- Begin Dynamic Form Sections --}}
            {{-- End Dynamic Form Section --}}
            <input type="submit" class="button large dark expanded margin-top-40" value="Submit">
          </form>
        </div>
      </div>
@endsection
@push('script-header')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/vader/jquery-ui.css">
  <script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
@endpush
@push('script-link')
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
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
@endpush
