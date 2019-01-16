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
          <form method="POST" action="{{ url('/admin/books', $book->id) }}">
            @csrf
            @method('PATCH')
            <label>Book Title:
              <input name="title" type="text" placeholder="Title" value="{{ $book->title }}">
            </label>
            <label>Short Title (Menu):
              <input name="menu_title" type="text" placeholder="Short Title" value="{{ $book->menu_title }}">
            </label>
            <label>Author:
              <input name="author" type="text" placeholder="Author" value="{{ $book->author }}">
            </label>
            <label>Publisher/Date:
              <input name="publisher" type="text" placeholder="Publisher/Date" value="{{ $book->publisher }}">
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
            <label>Book Image Alt Tags:
              <input name="alt_tags" type="text" placeholder="Book Image Alt Tags" value="{{ $book->alt_tags }}">
            </label>
            <label>Amazon Link (Optional):
              <input name="amazon" type="text" placeholder="Amazon Link" value="{{ $book->amazon }}">
            </label>
            <label>Introduction:
              <textarea name="introduction" cols="30" rows="2">{!! $book->introduction !!}</textarea>
            </label>
            <label>About:
              <textarea name="about" cols="30" rows="10">{!! $book->about !!}</textarea>
            </label>
            {{-- Begin Dynamic Form Sections --}}
            @foreach($sections as $section)
            <a name="{{ $section->id }}"></a>
            <div class="margin-top-30">
            @if($section->type == 'text')
            <div class="callout secondary small">
              <input type="hidden" name="section[{{ $section->id }}][id][]" value="{{ $section->id }}">
              <input type="hidden" name="section[{{ $section->id }}][type][]" value="text">
              <label>Header:
                <input name="section[{{ $section->id }}][header][]" type="text" placeholder="Title" value="{{ $section->header }}">
              </label>
              <label>Content:
                <textarea name="section[{{ $section->id }}][description][]" id="editor" class="editor" cols="30" rows="10">{!! $section->description !!}</textarea>
              </label>
            </div>
            @else
            <div class="callout secondary small">
              <input type="hidden" name="section[{{ $section->id }}][id][]" value="{{ $section->id }}">
              <input type="hidden" name="section[{{ $section->id }}][type][]" value="video">
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
            {{-- Begin New Dynamic Form Sections --}}
            <div class="sections margin-top-30"></div>
            {{-- End New Dynamic Form Section --}}
            <hr />
            <div class="text-center">
              <label>Add/Edit Section
              <br />
              <a href="{{ url('/admin/sections', $book->id) }}" style="font-weight: 400" class="new_section button large dark margin-top-20" data-id="text" >Edit Sections</a>
              <button class="new_section button large dark margin-top-20" data-id="text" >Add New Section</button>
              <button class="new_section button large dark margin-top-20"data-id="video" >Add Video to Page</button>
            </div>
            </label>
            <hr />
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
    CKEDITOR.replace( 'about', options );
    var elements = CKEDITOR.document.find( '.editor' ),
        i = 0,
        element;

    while ( ( element = elements.getItem( i++ ) ) ) {
        CKEDITOR.replace( element, options );
    }

    function addEditor(){
      var elements = CKEDITOR.document.find( '.editor' ),
        i = 0,
        element;

      while ( ( element = elements.getItem( i++ ) ) ) {
          CKEDITOR.replace( element, options );
      }
      console.log('Loaded!');
    }


    function addNamedEditor(name){

      CKEDITOR.replace( name, options );

      console.log('Loaded!');
    }
  </script>
@endpush
@push('scripts')
    $('#lfm-image').filemanager('image');
    $('#lfm-pdf').filemanager('image');

    function attachBrowser(id) {
      var attachto = '#lfm-image-' + id;
      $(attachto).filemanager('image');
      console.log('Ka-blooey!');
    }


    //Sections

    var sections    = $(".sections");
    var x = 0;

    $( "button.new_section" ).click(function(e) {
    e.preventDefault();
    var id = $(this).data('id');
    if (id == 'text')
    {
        var str = "<div class=\"callout secondary small\"><label>Header:<input name=\"n_section[" + x + "][header][]\" type=\"text\" placeholder=\"Text Title\" value=\"\"></label><label>Content:<textarea name=\"n_section[" + x + "][description][]\" class=\"editor\" cols=\"30\" rows=\"10\">Add Text Here!</textarea></label><input type=\"hidden\" name=\"n_section[" + x + "][type][]\" value=\"text\"></div>";

        var name = "n_section[" + x + "][description][]";

        x++;

        $(sections).append(str);

        addNamedEditor(name);

      } else {
        var str = "<div class=\"callout secondary small\"><label>Header:<input name=\"n_section[" + x + "][header][]\" type=\"text\" placeholder=\"Video Title\" value=\"\"></label><label>Caption:<textarea name=\"n_section[" + x + "][caption][]\" class=\"editor\" cols=\"30\" rows=\"4\">Caption</textarea></label><label>Embed:<textarea name=\"n_section[" + x + "][embed][]\" class=\"editor\" cols=\"30\" rows=\"2\">Embed Video</textarea></label><input type=\"hidden\" name=\"n_section[" + x + "][type][]\" value=\"video\"></div>";

        var id = x;
        attachBrowser(id);

        x++;

        $(sections).append(str);
      }
    });

    //Tags

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
