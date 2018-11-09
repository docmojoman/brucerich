@extends('layouts.private')

@section('content')
    <div id="admin">
    <div class="grid-container">
      <div class="grid-x grid-margin-x margin-top-80">
        <div class="cell medium-8 medium-offset-2">
          <h1 class="h2 text-center">Edit Article</h1>
          <form method="POST" action="/admin/articles/{{ $article->id }}">
            @csrf
            @method('PATCH')
            <label>Title:
              <input name="title" type="text" placeholder="Title" value="{{ $article->title }}">
            </label>
            <label>Author ( + coauthor if provided ):
              <input name="author" type="text" placeholder="Author" value="{{ $article->author }}">
            </label>
            <label>Publication:
              <input name="publication" type="text" placeholder="Publication" value="{{ $article->publication }}">
            </label>
            <label>Date:
              <input name="date" type="text" placeholder="Date" value="{{ $article->date }}">
            </label>
            <label>Page (#):
              <input name="page" type="text" placeholder="e.g. 28" value="{{ $article->page }}">
            </label>
            <label>Description/Excerpt:
              <textarea name="description" id="editor" cols="30" rows="10">{{ $article->description }}</textarea>
            </label>
            <label>Page Image:
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
              <input name="link" type="text" placeholder="link" value="{{ $article->link }}">
            </label>
            <label>Pdf:
            <div class="input-group">
               <span class="input-group-btn">
                 <a id="lfm-pdf" data-input="thumbnail-pdf" data-preview="holder" class="button dark">
                   <i class="fi-page-pdf"></i> &nbsp;&nbsp;Choose
                 </a>
               </span>
               <input id="thumbnail-pdf" class="form-control" type="text" name="pdf" value="{{ $article->pdf }}">
             </div>
             </label>
            <label>Tags:
              <select id="tags" class="js-example-basic-multiple" name="tags[]" multiple="multiple">
                @foreach($tags as $tag)
                <option value="{{ $tag->id }}" selected="selected">{{ $tag->name }}</option>
                @endforeach
              </select>
            </label>
            <label>Category:
              <select name="group_id">
                  @if($categories->count() == 0)
                  <option value="/admin/articlegroups/create">Add New Categories</option>
                  @else
                  @foreach($categories as $category)
                  <option value="{{ $category->id }}"
                    @if($category->id == $article->group_id)
                    selected
                    @endif
                    >{{ $category->title }}</option>
                  @endforeach
                  @endif
              </select>
            </label>
            <input type="submit" class="button large dark expanded margin-top-40" value="Save Changes">
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
    CKEDITOR.replace( 'description', options );
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