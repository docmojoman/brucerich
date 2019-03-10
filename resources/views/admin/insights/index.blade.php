@extends('layouts.private')

@section('content')
    <div id="admin">
    <div class="grid-container">
      <div class="grid-x grid-margin-x margin-top-60">
        <div class="cell  small-8 small-offset-2">
          <h1 class="text-center">Insights</h1>
        </div>
        <div class="cell small-2 align-middle">
          <a href="{{ url('/admin/insights/create') }}" id="new-article" class="button dark">
            <i class="fi-plus"></i> New Insight</a>
        </div>
      </div>
      <hr />
      <div class="grid-x grid-margin-x margin-top-30">
        <div class="cell small-12">
          <!-- table head -->
          <table>
            <thead id="sortable-head">
            <tr>
              <th class="text-left"><h2 class="h4 header-menu">Insights</h2> <span class="header-instruction">(Drag row to re-order list):</span>
              </th>
              <th><h2 class="h4">Status</h2></th>
              <th><h2 class="h4">Edit</h2></th>
            </tr>
          </thead>
          <!-- end table head -->
          <!-- table body -->
          <tbody id="sortable">
          @if(count($insights) == 0)
          <tr>
            <td colspan="3" class="text-center">There are no insights.</td>
          </tr>
          @else
          @foreach($insights as $insight)
            <tr data-index="{{ $insight->id }}" data-position="">
              <td><p class="title"><a href="{{ url('/admin/insight', $insight->slug) }}">{{ $insight->title }}</a></p></td>
              <td>
                <select id="status" onChange="top.location.href=this.options[this.selectedIndex].value;">
                  <option>Status</option>
                  <option value="{{ url('/admin/insights/publish', $insight->id) }}"
                  @if($insight->published == 0)
                  selected
                  @endif >Draft</option>
                  <option value="{{ url('/admin/insights/publish', $insight->id) }}"
                  @if($insight->published == 1)
                  selected
                  @endif >Published</option>
                </select>
              </td>
              <td>
                <a href="{{ url('/admin/insights/edit', $insight->id) }}" class="button dark expanded">Edit</a>
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
        sortable_type: "insight",
        positions: positions
      }, success: function (response) {
        console.log(response);
      }
    });
  }
@endpush
