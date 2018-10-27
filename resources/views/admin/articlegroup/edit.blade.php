@extends('layouts.private')

@section('content')
    <div id="admin">
    <div class="grid-container">
      <div class="grid-x grid-margin-x margin-top-60">
        <div class="cell medium-12">
          <h1 class="text-center">Edit Category</h1>
        </div>
      </div>
    </div>
      <div class="grid-x grid-margin-x margin-top-60">
        <div class="cell medium-6 medium-offset-3">
          <form method="POST" action="/admin/articlegroups">
            @csrf
            @method('PATCH')
            <input type="hidden" name="id" value="{{ $articlegroup->id }}">
            <label>Title:
              <input name="title" type="text" value="{{ $articlegroup->title }}">
            </label>

            <label>Description:
              <textarea name="description" id="" cols="30" rows="10">
                {{ $articlegroup->description }}
              </textarea>
            </label>

            <input type="submit" class="button large dark expanded uppercase" value="Submit">
          </form>
        </div>
      </div>
      <hr />
@endsection
