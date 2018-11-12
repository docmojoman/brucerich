@extends('layouts.private')

@section('content')
    <div id="admin">
    <div class="grid-container">
      <div class="grid-x grid-margin-x margin-top-60">
        <div class="cell  small-8 small-offset-2">
          <h1 class="text-center">Articles</h1>
        </div>
        <div class="cell small-2 align-middle">
          <a href="{{ url('/admin/articles/create') }}" id="new-article" class="button dark">
            <i class="fi-plus"></i> New Article</a>
        </div>
      </div>
      <div class="grid-x grid-margin-x margin-top-10">
        <div class="cell  small-4">
          <h2 class="h3 text-right">Category:</h2>
        </div>
        <div class="cell  small-6">
          <select
           onChange="top.location.href=this.options[this.selectedIndex].value;">
            <option value="{{ url('/admin/articles') }}">Select All&hellip;</option>
            @if($categories->count() == 0)
            <option value="{{ url('/admin/articlegroups/create') }}">Add New Categories</option>
            @else
            @foreach($categories as $category)
            <option value="{{ url('/admin/articles') . '/' . $category->id }}"
              @if($category->id == $selectedGroup)
              selected
              @endif >{{ $category->title }}</option>
            @endforeach
            @endif
          </select>
        </div>
        <div class="cell small-2">
          <p><a href="/admin/articlegroups">Edit Categories</a></p>
        </div>
     </div>
      <hr />
      <div class="grid-x grid-margin-x margin-top-30">
        <div class="cell small-12">
            <!-- table head -->
          <table>
            <thead id="sortable-head">
            <tr>
              <th class="text-left"><h2 class="h4 header-menu">Article</h2>&nbsp;
                @if($sort == true)
               <span class="header-instruction">(Drag row to re-order list):</span>
               @endif
              </th>
              <th><h2 class="h4">Status</h2></th>
              <th><h2 class="h4">Edit</h2></th>
            </tr>
          </thead>
          <!-- end table head -->
          <!-- table body -->
          <tbody id="sortable">
          @if(count($articles) == 0)
          <tr>
            <td colspan="3" class="text-center">There are no articles.</td>
          </tr>
          @else
          @foreach($articles as $article)
                <tr data-index="{{ $article->id }}" data-position="">
                  <td><p class="title"><a href="{{ url('/article') . '/' . $article->id }}">{{ $article->title }}</a></p></td>
                  <td><select>
                <option>Status</option>
                <option value="0"
                @if($article->published == 0)
                selected
                @endif >Draft</option>
                <option value="1"
                @if($article->published == 1)
                selected
                @endif >Published</option>
              </select></td>
                  <td>
                    <a href="{{ url('/admin/articles/edit', $article->id) }}" class="button dark expanded">Edit</a>
                  </td>
                </tr>
          @endforeach
          @endif
            </tbody>
          </table>
        </div>
      </div>
      <!-- /row -->

@endsection
@push('script-link')
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
@endpush
@if($sort == true)
@push('scripts')
  $('tbody#sortable').sortable({
    update: function (event, ui) {
      $(this).children().each(function (index) {
        if ($(this).attr('data-position') != (index+1)) {
          $(this).attr('data-position', (index+1)).addClass('updated');
        }
      });
      saveNewPositions();
    }
  });

  function saveNewPositions() {
    var positions = [];
    $('.updated').each(function () {
      positions.push([$(this).attr('data-index'), $(this).attr('data-position')]);
      $(this).removeClass('updated');
    });

    $.ajax({
      method: 'POST',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: "{{ url('/admin/sort/update') }}",
      dataType: 'text',
      data: {
        sortable_type: "article",
        positions: positions
      }, success: function (response) {
        console.log(response);
      }
    });
  }
@endpush
@endif
