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
          <a class="button large dark expanded uppercase" href="book-new.html">Add a book</a>
          <a class="button large dark expanded uppercase" href="books-edit.html">Edit books</a>
        </div>
      </div>
      <hr />
      <div class="grid-x grid-margin-x margin-top-40">
        <div class="cell medium-3">
          <h2>Articles</h2>
        </div>
        <div class="cell medium-6">
          <a class="button large dark expanded uppercase" href="article-new.html">Add article</a>
          <a class="button large dark expanded uppercase" href="articles-edit.html">Edit articles</a>
        </div>
      </div>
      <hr />
      <div class="grid-x grid-margin-x margin-top-40">
        <div class="cell medium-3">
          <h2>Insights</h2>
        </div>
        <div class="cell medium-6">
          <a class="button large dark expanded uppercase" href="post-new.html">Add blog post</a>
          <a class="button large dark expanded uppercase" href="posts-edit.html">Edit blog posts</a>
        </div>
      </div>
      <hr />
      <div class="grid-x grid-margin-x margin-top-40">
        <div class="cell medium-3">
          <h2>Video</h2>
        </div>
        <div class="cell medium-6">
          <a class="button large dark expanded uppercase" href="video-new.html">Add video</a>
          <a class="button large dark expanded uppercase" href="videos-edit.html">Edit videos</a>
        </div>
      </div>
      <hr />


    <div class="grid-x grid-margin-x margin-top-80">
      <div class="cell small-12 text-center">
        <h6>{{ config('app.name', 'Laravel') }} <small>Version {{ app()->version() }}</small></h6>
      </div>
    </div>

@endsection
