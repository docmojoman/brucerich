@extends('layouts.private')

@section('content')
    <div id="admin">
    <div class="grid-container">
      <div class="grid-x grid-margin-x margin-top-60">
        <div class="cell medium-4 medium-offset-4">
          <h1 class="h2 text-center">Edit Tag</h1>
        </div>
        <div class="cell medium-2 text-right padding-top-20">
          <a onclick="return confirm('Are you sure you want to delete this tag?')" href="{{ url('/admin/tags/delete', $tag->id) }}" class="">Delete Tag</a>
        </div>
      </div>
      <div class="grid-x grid-margin-x">
        <div class="cell medium-6 medium-offset-3">
          <form method="POST" action="{{ url('/admin/tags', $tag->id) }}">
            @csrf
            @method('PATCH')
            <input type="hidden" name="id" value="{{ $tag->id }}">
            <label>Name:
              <input name="name" type="text" value="{{ $tag->name }}">
            </label>

            <input type="submit" class="button large dark expanded uppercase" value="Update">
          </form>
        </div>
      </div>
      <hr />
@endsection
