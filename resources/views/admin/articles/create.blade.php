@extends('layouts.private')

@section('content')
    <div id="admin">
    <div class="grid-container">
      <div class="grid-x grid-margin-x margin-top-80">
        <div class="cell medium-8 medium-offset-2">
          <h1 class="h2 text-center">Add New Article</h1>
          <form method="POST" action="admin/articles">
            @csrf
            <label>Title:
              <input name="title" type="text" placeholder="Title">
            </label>
            <label>Author ( + coauthor if provided ):
              <input name="author" type="text" placeholder="Author">
            </label>
            <label>Publication:
              <input name="publication" type="text" placeholder="Publication">
            </label>
            <label>Date:
              <input name="date" type="text" placeholder="Date">
            </label>
            <label>Page (#):
              <input name="page" type="text" placeholder="e.g. 28">
            </label>
            <label>Description/Excerpt:
              <textarea name="description" id="" cols="30" rows="10"></textarea>
            </label>
            <label>Page Image:
              <input type="file" placeholder="image" name="image">
            </label>
            <label>Link:
              <input name="link" type="text" placeholder="link">
            </label>
            <label>PDF:
              <input type="file" placeholder="pdf" name="pdf">
            </label>
            <label>Tags:
              <input name="tags" type="text" placeholder="tags">
            </label>
            <fieldset>
              <legend>Select:</legend>
              @if($categories->count() == 0)
              @else
              @foreach($categories as $category)
              <input type="checkbox" name="group_id[]" value="{{ $category->id }}" id="developing"><label for="developing">{{ $category->title }}</label>
              <br />
              @endforeach
              @endif
            </fieldset>
            <input type="submit" class="button large dark expanded margin-top-40" value="Submit">
          </form>
        </div>
      </div>
@endsection
