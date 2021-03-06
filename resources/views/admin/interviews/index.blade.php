@extends('layouts.private')

@section('content')
    <div id="admin">
    <div class="grid-container">
      <div class="grid-x grid-margin-x margin-top-60">
        <div class="cell  small-8 small-offset-2">
          <h1 class="text-center">Interviews</h1>
        </div>
        <div class="cell small-2 align-middle">
          <a href="{{ url('/admin/interviews/create') }}" id="new-article" class="button dark">
            <i class="fi-plus"></i> New Interview</a>
        </div>
      </div>
      <hr />
      <div class="grid-x grid-margin-x margin-top-30">
        <div class="cell small-12">
            <!-- table head -->
          <table>
            <thead id="sortable-head">
            <tr>
              <th class="text-left"><h2 class="h4 header-menu">Interview</h2>&nbsp;
               <span class="header-instruction">(Drag row to re-order list):</span>
              </th>
              <th><h2 class="h4">Status</h2></th>
              <th><h2 class="h4">Edit</h2></th>
            </tr>
          </thead>
          <!-- end table head -->
          <!-- table body -->
          <tbody id="sortable">
          @if(count($interviews) == 0)
          <tr>
            <td colspan="3" class="text-center">There are no interviews.</td>
          </tr>
          @else
          @foreach($interviews as $interview)
                <tr data-index="{{ $interview->id }}" data-position="">
                  <td><p class="title"><a href="{{ url('/admin/interview', $interview->slug) }}">{{ $interview->title }}</a></p></td>
                  <td>
                    <select onChange="top.location.href=this.options[this.selectedIndex].value;">
                      <option>Status</option>
                      <option value="{{ url('/admin/interviews/publish', $interview->id) }}"
                      @if($interview->published == 0)
                      selected
                      @endif >Draft</option>
                      <option value="{{ url('/admin/interviews/publish', $interview->id) }}"
                      @if($interview->published == 1)
                      selected
                      @endif >Published</option>
                    </select></td>
                  <td>
                    <a href="{{ url('/admin/interviews/edit', $interview->id) }}" class="button dark expanded">Edit</a>
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
        sortable_type: "interview",
        positions: positions
      }, success: function (response) {
        console.log(response);
      }
    });
  }
@endpush
