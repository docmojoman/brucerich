@extends('layouts.private')

@section('content')
    <div id="admin">
    <div class="grid-container">
    	<div class="grid-x grid-margin-x margin-top-60">
        <div class="cell  small-6 small-offset-3">
          <h1 class="text-center">Categories</h1>
        </div>
        <div class="cell small-3 align-middle text-right">
          <a href="articlegroups/create" id="new-article" class="button dark">
            <i class="fi-plus"></i> New Category</a>
        </div>
      </div>
      <div class="grid-x grid-margin-x margin-top-60">
        <div class="cell medium-12">
          <!-- table head -->
          <table>
            <thead id="sortable-head">
            </thead>
            <!-- end table head -->
            <!-- table body -->
            <tbody id="sortable">
        		@if(count($articlegroups) == 0)
            <tr>
              <td colspan="3" class="h3 text-center">There are no current Categories</td>
            </tr>
        		@else
      			@foreach($articlegroups as $articlegroup)
            <tr data-index="{{ $articlegroup->id }}" data-position="">
	        		<td><p class="title"><a href="articlegroups/edit/{{ $articlegroup->id }}">{{ $articlegroup->title }}</a></p></td>
      			@endforeach
      			@endif
          	</tbody>
          </table>

        </div>
      </div>
    	<div class="grid-x grid-margin-x margin-top-60">
        <div class="cell  small-6 small-offset-3">
          <h1 class="text-center"></h1>
        </div>
        <div class="cell small-3 align-middle text-right">
        </div>
      </div>
      <hr />
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
        sortable_type: "articleGroup",
        positions: positions
      }, success: function (response) {
        console.log(response);
      }
    });
  }
@endpush
