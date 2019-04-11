@extends('layouts.private')

@section('content')

    <div id="admin">
    <div class="grid-container">
      <div class="grid-x grid-margin-x margin-top-60">
        <div class="cell medium-12">
          <h1 class="text-center">Dashboard</h1>
        </div>
      </div>
      <div class="grid-x grid-margin-x margin-top-60">
        <div class="cell medium-3">
          <h2>Book Title</h2>
        </div>
        <div class="cell medium-6">
          <a class="button large dark expanded uppercase" href="{{ url('admin/books/create') }}">Add a book</a>
          <a class="button large dark expanded uppercase" href="{{ url('admin/books') }}">Edit books</a>
        </div>
      </div>
      <hr />
      <div class="grid-x grid-margin-x margin-top-40">
        <div class="cell medium-3">
          <h2>Articles</h2>
        </div>
        <div class="cell medium-6">
          <a class="button large dark expanded uppercase" href="{{ url('admin/articles/create') }}">Add article</a>
          <a class="button large dark expanded uppercase" href="{{ url('admin/articles') }}">Edit articles</a>
        </div>
      </div>
      <hr />
      <div class="grid-x grid-margin-x margin-top-40">
        <div class="cell medium-3">
          <h2>Insights</h2>
        </div>
        <div class="cell medium-6">
          <a class="button large dark expanded uppercase" href="{{ url('admin/insights/create') }}">Add blog post</a>
          <a class="button large dark expanded uppercase" href="{{ url('admin/insights') }}">Edit blog posts</a>
        </div>
      </div>
      <hr />
      <div class="grid-x grid-margin-x margin-top-40">
        <div class="cell medium-3">
          <h2>Interviews</h2>
        </div>
        <div class="cell medium-6">
          <a class="button large dark expanded uppercase" href="{{ url('admin/interviews/create') }}">Add interview</a>
          <a class="button large dark expanded uppercase" href="{{ url('admin/interviews') }}">Edit interviews</a>
        </div>
      </div>
      <hr />
      <div class="grid-x grid-margin-x margin-top-40">
        <div class="cell medium-3">
          <h2>Video</h2>
        </div>
        <div class="cell medium-6">
          <a class="button large dark expanded uppercase" href="{{ url('admin/videos/create') }}">Add video</a>
          <a class="button large dark expanded uppercase" href="{{ url('admin/videos') }}">Edit videos</a>
        </div>
      </div>
      <hr />
      <div class="grid-x grid-margin-x margin-top-40">
        <div class="cell medium-3">
          <h2>About</h2>
        </div>
        <div class="cell medium-6">
          @empty($about)
          <a class="button large dark expanded uppercase" href="{{ url('admin/about/create') }}">Create About Content</a>
          @endempty
          <a class="button large dark expanded uppercase" href="{{ url('admin/about/edit') }}">Edit About</a>
        </div>
      </div>
      <hr />
      <div class="grid-x grid-margin-x margin-top-40">
        <div class="cell medium-3">
          <h2>Tags</h2>
        </div>
        <div class="cell medium-6">
          <a class="button large dark expanded uppercase" href="{{ url('admin/tags/create') }}">Add tag</a>
          <a class="button large dark expanded uppercase" href="{{ url('admin/tags') }}">Edit tags</a>
        </div>
      </div>
      <hr />
@endsection
