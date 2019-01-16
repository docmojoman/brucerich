@extends('layouts.private')

@section('content')
    <div id="admin">
    <div class="grid-container">
      <div class="grid-x grid-margin-x margin-top-60">
        <div class="cell  small-8 small-offset-2">
          <h1 class="text-center">Sections</h1>
        </div>
        <div class="cell small-2 align-middle">
          <a href="{{ url('/admin/books/edit', $book_id) }}" id="new-article" class="button dark">
            <i class="fi-arrow-left"></i> Back to Edit</a>
        </div>
      </div>
      <hr />
      <div class="grid-x grid-margin-x margin-top-30">
        <div class="cell small-12">
          <!-- table head -->
          <table>
            <thead id="sortable-head">
            <tr>
              <th class="text-left"><h2 class="h4 header-menu">Sections</h2> <span class="header-instruction">(Drag row to re-order list):</span>
              </th>
              <th><h2 class="h4">Delete</h2></th>
            </tr>
          </thead>
          <!-- end table head -->
          <!-- table body -->
          <tbody id="sortable">
          @if(count($sections) == 0)
          <tr>
            <td colspan="2" class="text-center">There are no sections.</td>
          </tr>
          @else
          @foreach($sections as $section)
            <tr data-index="{{ $section->id }}" data-position="">
              <td><p class="title"><a href="{{ url('/admin/books/edit', $section->book_id).'#'.$section->id }}">{{ $section->header }}</a></p>
              </td>
              <td>
                <a onclick="return confirm('Are you sure you want to delete this section?')"  href="{{ url('/admin/sections/delete', $section->id) }}" class="button dark expanded">Delete</a>
              </td>
            </tr>
          @endforeach
          @endif
            </tbody>
          </table>
        </div>
      </div>

@endsection
@push('script-link')
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
@endpush
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
        sortable_type: "section",
        positions: positions
      }, success: function (response) {
        console.log(response);
      }
    });
  }
@endpush
