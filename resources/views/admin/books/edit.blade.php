@extends('layouts.private')

@section('content')
    <div id="admin">
    <div class="grid-container">
      <div class="grid-x grid-margin-x margin-top-80">
        <div class="cell medium-4 medium-offset-4">
          <h1 class="h2 text-center">Edit Book</h1>
        </div>
        <div class="cell medium-2 text-right padding-top-20">
          <a onclick="return confirm('Are you sure you want to delete this book?')" href="{{ url('/admin/books/delete', $book->id) }}" class="">Delete Book</a>
        </div>
      </div>
      <div class="grid-x grid-margin-x">
        <div class="cell medium-8 medium-offset-2">
          <form method="POST" action="/admin/books">
            @csrf
            <label>Book Title:
              <input name="title" type="text" placeholder="Title" value="{{ $book->title }}">
            </label>
            <label>Book Image:
            <div class="input-group">
               <span class="input-group-btn">
                 <a id="lfm-image" data-input="thumbnail-image" data-preview="holder" class="button dark">
                   <i class="fa fa-picture-o fi-photo"></i> &nbsp;&nbsp;Choose
                 </a>
               </span>
               <input id="thumbnail-image" class="form-control" type="text" name="image" value="{{ $book->image }}">
             </div>
            </label>
            <label>About:
              <textarea name="about" id="editor" cols="30" rows="10">
                {!! $book->about !!}
              </textarea>
            </label>
            {{-- Begin Dynamic Form Sections --}}
            @foreach($sections as $section)
            <div class="margin-top-30">
            @if($section->type == 'text')
            <div class="callout secondary small">
              <label>Header:
                <input name="section[{{ $section->id }}][header][]" type="text" placeholder="Title" value="{{ $section->header }}">
              </label>
              <label>Content:
                <textarea name="section[{{ $section->id }}][description][]" id="editor" class="editor" cols="30" rows="10">{!! $section->description !!}</textarea>
              </label>
            </div>
            @else
            <div class="callout secondary small">
              <label>Header:
                <input name="section[{{ $section->id }}][header][]" type="text" placeholder="Title" value="{{ $section->header }}">
              </label>
              <label>Caption:
                <textarea name="section[{{ $section->id }}][caption][]" cols="30" rows="4">{!! $section->caption !!}</textarea>
              </label>
              <label>Embed:
                <textarea name="section[{{ $section->id }}][embed][]" cols="30" rows="3">{!! $section->embed !!}</textarea>
              </label>
            </div>
            @endif
            </div>
            @endforeach
            {{-- End Dynamic Form Section --}}
            <hr />
            <label>Tags:
              <select id="tags" class="js-example-basic-multiple" name="tags[]" multiple="multiple">
                @foreach($tags as $tag)
                <option value="{{ $tag->id }}" selected="selected">{{ $tag->name }}</option>
                @endforeach
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
    var elements = CKEDITOR.document.find( '.editor' ),
        i = 0,
        element;

    while ( ( element = elements.getItem( i++ ) ) ) {
        CKEDITOR.replace( element, options );
    }
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
