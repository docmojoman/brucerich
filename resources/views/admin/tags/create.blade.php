@extends('layouts.private')

@section('content')
    <div id="admin">
    <div class="grid-container">
      <div class="grid-x grid-margin-x margin-top-60">
        <div class="cell medium-12">
          <h1 class="text-center">Create New Tag</h1>
        </div>
      </div>
    </div>
      <div class="grid-x grid-margin-x margin-top-60">
        <div class="cell medium-6 medium-offset-3">
          <form method="POST" action="/admin/tags">
            @csrf
            <input type="hidden" name="position" value="">
            <label>Name:
              <input type="text" name="name" placeholder="Name" required="required">
            </label>

            <input type="submit" class="button large dark expanded uppercase" value="Submit">
          </form>
        </div>
      </div>
      <hr />
@endsection
