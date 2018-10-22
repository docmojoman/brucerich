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
          <a class="button large dark expanded uppercase" href="book/create">Add a book</a>
          <a class="button large dark expanded uppercase" href="book">Edit books</a>
        </div>
      </div>
      <hr />
      <div class="grid-x grid-margin-x margin-top-40">
        <div class="cell medium-3">
          <h2>Articles</h2>
        </div>
        <div class="cell medium-6">
          <a class="button large dark expanded uppercase" href="articles/create">Add article</a>
          <a class="button large dark expanded uppercase" href="articles">Edit articles</a>
        </div>
      </div>
      <hr />
      <div class="grid-x grid-margin-x margin-top-40">
        <div class="cell medium-3">
          <h2>Insights</h2>
        </div>
        <div class="cell medium-6">
          <a class="button large dark expanded uppercase" href="insights/create">Add blog post</a>
          <a class="button large dark expanded uppercase" href="insights">Edit blog posts</a>
        </div>
      </div>
      <hr />
      <div class="grid-x grid-margin-x margin-top-40">
        <div class="cell medium-3">
          <h2>Video</h2>
        </div>
        <div class="cell medium-6">
          <a class="button large dark expanded uppercase" href="video/create">Add video</a>
          <a class="button large dark expanded uppercase" href="video">Edit videos</a>
        </div>
      </div>
      <hr />
@endsection
