@extends('layouts.private')

@section('content')
    <div id="admin">
    <div class="grid-container">
      <div class="grid-x grid-margin-x margin-top-60">
        <div class="cell  small-6 small-offset-3">
          <h1 class="text-center">Tags</h1>
        </div>
        <div class="cell small-3 align-middle text-right">
          <a href="tags/create" id="new-article" class="button dark">
            <i class="fi-plus"></i> New Tag</a>
        </div>
      </div>
      <div class="grid-x grid-margin-x margin-top-60">
        <div class="cell medium-12">
          <!-- table head -->
          <table>
            <thead id="sortable-head">
            <tr>
              <th class="text-left"><h2 class="h4 header-menu">Tag</h2>
              </th>
              <th><h2 class="h4">Edit</h2></th>
            </tr>
            </thead>
            <!-- end table head -->
            <!-- table body -->
            <tbody id="sortable">
            @if(count($tags) == 0)
            <tr>
              <td colspan="2" class="h3 text-center">There are no current Categories</td>
            </tr>
            @else
            @foreach($tags as $tag)
            <tr data-index="{{ $tag->id }}" data-position="">
              <td><p class="title">{{ $tag->name }}</p></td>
              <td>
                <a href="{{ url('/admin/tags/edit', $tag->id) }}" class="button dark expanded">Edit</a>
              </td>
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
