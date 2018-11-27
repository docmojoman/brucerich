@extends('layouts.private')

@section('content')
    <div id="admin">
    <div class="grid-container">
      <div class="grid-x grid-margin-x margin-top-60">
        <div class="cell medium-4 medium-offset-4">
          <h1 class="h2 text-center">Edit Category</h1>
        </div>
        <div class="cell medium-2 text-right padding-top-20">
          <a onclick="return confirm('Are you sure you want to delete this category?')" href="{{ url('/admin/articlegroups/delete', $articlegroup->id) }}" class="">Delete Category</a>
        </div>
      </div>
      <div class="grid-x grid-margin-x">
        <div class="cell medium-6 medium-offset-3">
          <form method="POST" action="/admin/articlegroups">
            @csrf
            @method('PATCH')
            <input type="hidden" name="id" value="{{ $articlegroup->id }}">
            <label>Title:
              <input name="title" type="text" value="{{ $articlegroup->title }}">
            </label>

            <label>Description:
              <textarea name="description" id="" cols="30" rows="10">{{ $articlegroup->description }}</textarea>
            </label>

            <input type="submit" class="button large dark expanded uppercase" value="Update">
          </form>
        </div>
      </div>
      <hr />
@endsection
