@extends('layouts.private')

@section('content')
    <div id="admin">
    <div class="grid-container">
      <div class="grid-x grid-margin-x margin-top-80">
        <div class="cell medium-4 medium-offset-4">
          <h1 class="h2 text-center">Edit Insight</h1>
        </div>
        <div class="cell medium-2 text-right padding-top-20">
          <a onclick="return confirm('Are you sure you want to delete this post?')" href="{{ url('/admin/insights/delete', $insight->id) }}" class="">Delete Insight</a>
        </div>
      </div>
      <div class="grid-x grid-margin-x">
        <div class="cell medium-8 medium-offset-2">
          <form method="POST" action="{{ url('/admin/insights', $insight->id) }}">
            @csrf
            @method('PATCH')
            <label>Title:
              <input name="title" type="text" placeholder="Title" value="{{ $insight->title }}">
            </label>
            <label>Author ( + coauthor if provided ):
              <input name="author" type="text" placeholder="Author" value="{{ $insight->author }}">
            </label>
            <label>Description:
              <textarea name="introduction" cols="30" rows="2">{{ $insight->introduction }}</textarea>
            </label>
            <label>Home Page Excerpt:
              <textarea name="description" id="editor" cols="30" rows="10">{{ $insight->description }}</textarea>
            </label>
            <label>Copy:
              <textarea name="copy" id="editor" cols="30" rows="10">
                {!! $insight->copy !!}
              </textarea>
            </label>
            <label>Tags:
              <select id="tags" class="js-example-basic-multiple" name="tags[]" multiple="multiple">
                @foreach($tags as $tag)
                <option value="{{ $tag->id }}" selected="selected">{{ $tag->name }}</option>
                @endforeach
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
      filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
      filebrowserBrowseUrl: '/laravel-filemanager?type=Images',
      filebrowserUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}'
    };
    CKEDITOR.replace( 'copy', options );
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
            url: "{{ url('/admin/tags/fetch') }}",
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
