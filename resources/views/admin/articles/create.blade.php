@extends('layouts.private')

@section('content')
    <div id="admin">
    <div class="grid-container">
      <div class="grid-x grid-margin-x margin-top-80">
        <div class="cell medium-8 medium-offset-2">
          <h1 class="h2 text-center">Add New Article</h1>
          <form method="POST" action="/admin/articles">
            @csrf
            <label>Title:
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
            <label>Page (#):
              <input name="page" type="text" placeholder="e.g. 28" value="{{ old('page') }}">
            </label>
            <label>Description/Excerpt:
              <textarea name="description" id="editor" cols="30" rows="10">
                {!! old('description') !!}
              </textarea>
            </label>
            <label>Image:
            <div class="input-group">
               <span class="input-group-btn">
                 <a id="lfm-image" data-input="thumbnail-image" data-preview="holder" class="button dark">
                   <i class="fa fa-picture-o fi-photo"></i> &nbsp;&nbsp;Choose
                 </a>
               </span>
               <input id="thumbnail-image" class="form-control" type="text" name="image" value="{{ old('image') }}">
             </div>
               </label>
            <label>Link:
              <input name="link" type="text" placeholder="link" value="{{ old('link') }}">
            </label>
            <label>Pdf:
            <div class="input-group">
               <span class="input-group-btn">
                 <a id="lfm-pdf" data-input="thumbnail-pdf" data-preview="holder" class="button dark">
                   <i class="fi-page-pdf"></i> &nbsp;&nbsp;Choose
                 </a>
               </span>
               <input id="thumbnail-pdf" class="form-control" type="text" name="pdf" value="{{ old('pdf') }}">
             </div>
             </label>
            <label>Tags:
              <input name="tags" type="text" placeholder="tags" >
            </label>
            <label>Category:
              <select name="group_id">
                  @if($categories->count() == 0)
                  <option value="/admin/articlegroups/create">Add New Categories</option>
                  @else
                  @foreach($categories as $category)
                  <option value="{{ $category->id }}" >{{ $category->title }}</option>
                  @endforeach
                  @endif
              </select>
            </label>
            <input type="submit" class="button large dark expanded margin-top-40" value="Submit">
          </form>
        </div>
      </div>
@endsection
@push('script-header')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/vader/jquery-ui.css">
  <script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/11.1.1/classic/ckeditor.js"></script> --}}
    {{-- <script src="https://cdn.ckeditor.com/4.10.1/standard/ckeditor.js"></script> --}}
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
    CKEDITOR.replace( 'description', options );
  </script>
@endpush
@push('scripts')
    $('#lfm-image').filemanager('image');
    $('#lfm-pdf').filemanager('image');
    $( "#datepicker" ).datepicker(
       { dateFormat: "yy-mm-dd" }
    );
@endpush
