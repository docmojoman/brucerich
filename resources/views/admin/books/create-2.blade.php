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
              <input name="title" type="text" placeholder="Title" value="{{ old('title') }}">
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
              <textarea name="introduction" cols="30" rows="2">
                {!! old('introduction') !!}
              </textarea>
            </label>
            <label>About:
              <textarea name="about" cols="30" rows="6">
                {!! old('about') !!}
              </textarea>
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
      filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
      filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
      filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
    };
    // CKEDITOR.replace( 'about', options );

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
    $( "#datepicker" ).datepicker(
       { dateFormat: "yy-mm-dd" }
    );

    //Sections

    var sections    = $(".sections");
    var x = 0;

    $( "button.new_section" ).click(function(e) {
    e.preventDefault();
    var id = $(this).data('id');
    if (id == 'text')
    {
        var str = "<label>Header:<input name=\"section[" + x + "][header][]\" type=\"text\" placeholder=\"Text Title\" value=\"\"></label><label>Content:<textarea name=\"section[" + x + "][description][]\" class=\"editor\" cols=\"30\" rows=\"10\">Add Text Here!</textarea><input type=\"hidden\" name=\"section[" + x + "][type][]\" value=\"text\">";

        var name = "section[" + x + "][description][]";

        x++;

        $(sections).append(str);

        addNamedEditor(name);

      } else {
        var str = "<label>Header:<input name=\"section[" + x + "][header][]\" type=\"text\" placeholder=\"Video Title\" value=\"\"></label><label>Content:<textarea name=\"section[" + x + "][description][]\" class=\"editor\" cols=\"30\" rows=\"10\">Embed Video Here!</textarea><input type=\"hidden\" name=\"section[" + x + "][type][]\" value=\"video\">";
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
