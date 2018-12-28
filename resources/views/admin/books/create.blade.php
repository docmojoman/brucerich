@extends('layouts.private')

@section('content')
    <div id="admin">
    <div class="grid-container">
      <div class="grid-x grid-margin-x margin-top-80">
        <div class="cell medium-8 medium-offset-2">
          <h1 class="h2 text-center">Add New Book</h1>
          <form method="POST" action="{{ url('/admin/books') }}">
            @csrf
            <label>Book Title:
              <input id="title" name="title" type="text" placeholder="Title" value="{{ old('title') }}">
            </label>
            <label>Short Title (Menu):
              <input id="shortTitle" name="menu_title" type="text" placeholder="Short Title" value="{{ old('menu_title') }}">
            </label>
            <label>Author:
              <input name="author" type="text" placeholder="Author" value="{{ old('author') }}">
            </label>
            <label>Publisher/Date:
              <input name="publisher" type="text" placeholder="Publisher/Date" value="{{ old('publisher') }}">
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
            <label>Book Image Alt Tags:
              <input name="alt_tags" type="text" placeholder="Book Image Alt Tags" value="{{ old('alt_tags') }}">
            </label>
            <label>Amazon Link (optional):
              <input name="amazon" type="text" placeholder="Amazon Link (optional)" value="{{ old('amazon') }}">
            </label>
            <label>Introduction:
              <textarea name="introduction" cols="30" rows="2">{!! old('introduction') !!}</textarea>
            </label>
            <label>About:
              <textarea name="about" cols="30" rows="6">{!! old('about') !!}</textarea>
            </label>
            {{-- Begin Dynamic Form Sections --}}
            <div class="sections"></div>
            {{-- End Dynamic Form Section --}}
            <hr />
            <div class="text-center">
              <label>Add New Section
              <br />
              <button class="new_section button large dark margin-top-20" data-id="text" >Add New Section</button>
              <button class="new_section button large dark margin-top-20"data-id="video" >Add Video to Page</button>
            </div>
            </label>
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
      filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
      filebrowserBrowseUrl: '/laravel-filemanager?type=Images',
      filebrowserUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}'
    };
    CKEDITOR.replace( 'about', options );

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
    var title = document.getElementById("title").value;
    var shortTitle = document.getElementById("shortTitle").value;

    if (title.trim() == '' || shortTitle.trim() == '') {
      return alert('You must enter a Title and a Short Title before you can create a New Section');
    } else {
    if (id == 'text')
    {
        var str = "<div class=\"callout secondary small margin-top-20\"><label>Header:<input name=\"section[" + x + "][header][]\" type=\"text\" placeholder=\"Text Title\" value=\"\"></label><label>Content:<textarea name=\"section[" + x + "][description][]\" class=\"editor\" cols=\"30\" rows=\"10\">Add Text Here!</textarea></label><input type=\"hidden\" name=\"section[" + x + "][type][]\" value=\"text\"></div>";

        var name = "section[" + x + "][description][]";

        x++;

        $(sections).append(str);

        addNamedEditor(name);

      } else {
        var str = "<div class=\"callout secondary small margin-top-20\"><label>Header:<input name=\"section[" + x + "][header][]\" type=\"text\" placeholder=\"Video Title\" value=\"\"></label><label>Caption:<textarea name=\"section[" + x + "][caption][]\" class=\"editor\" cols=\"30\" rows=\"4\">Caption</textarea></label><label>Embed:<textarea name=\"section[" + x + "][embed][]\" class=\"editor\" cols=\"30\" rows=\"2\">Embed Video</textarea></label><input type=\"hidden\" name=\"section[" + x + "][type][]\" value=\"video\"></div>";

        var id = x;
        attachBrowser(id);

        x++;

        $(sections).append(str);
      }

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
