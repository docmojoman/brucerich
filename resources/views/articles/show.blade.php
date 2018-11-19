@extends('layouts.public')
@section('title', '- ')
@section('content')
    <a name="article" class="hide-for-medium"></a>
    <div id="br-breadcrumbs">
    <div class="grid-container">
      <div class="grid-x grid-margin-x">
        <div class="cell medium-12">
          <nav aria-label="You are here:" role="navigation">
            <ul class="breadcrumbs">
              <li><a href="{{ url('./') }}">Home</a></li>
              <li><a href="{{ url('articles') }}">Articles</a></li>
              <li><a href="{{ url('articles', $article->group_id) }}">{{ $category->title }}</a></li>
              <li>
                <span class="show-for-sr">Current: </span> {{ $article->title }}
              </li>
            </ul>
          </nav>
        </div> <!-- .cell .medium-12 -->
      </div> <!-- .grid-x .grid-margin-x -->
    </div> <!-- grid-container -->
    </div> <!-- breadcrumbs -->
    <div id="article-title">
    <div class="grid-container">
      <div class="grid-x grid-margin-x">
        <div class="cell medium-12">
          <h1 class="h2">{{ $article->title }}</h1>
        </div> <!-- .cell .medium-12 -->
      </div> <!-- .grid-x .grid-margin-x -->
    </div> <!-- .grid-container -->
    </div> <!-- #article-title -->
    <div id="article-page"> <!-- bite hero -->
    <div class="grid-container">
      <div class="grid-x grid-margin-x">
        <div class="cell medium-3">
          <span class="book">
            <p><img src="{{ asset('img/00-article_fpo.jpg') }}" alt=""></p>

            <h3 class="h4">Tags:</h3>
            <ul class="book-submenu">
              @if($tags->count())
              @foreach($tags as $tag)
              <li><a href="{{ url('tag', $tag->slug) }}">{{ $tag->name }}</a></li>
              @endforeach
              @endif
            </ul>
          </span>
        </div> <!-- .cell .medium-3 -->
        <div class="cell medium-auto article-body">
          <ul id="book-cite">
            <li><a href="#">{{ $article->author }}</a></li>
            <li><a href="#">{{ $article->publication }}</a></li>
            <li><a href="#">{{ $article->date }}</a></li>
            <li><a href="#">p. {{ $article->page }}</a></li>
          </ul>
          {!! $article->description !!}

          <p><a href="{{ $article->pdf }}">Read full article (PDF)</a></p>
        </div> <!-- .cell .medium-9 .article-body -->
      </div> <!-- .grid-x .grid-margin-x -->
    </div> <!-- grid-container -->
    </div> <!-- article nav -->
    <div id="article-nav">
    <div class="grid-container">
      <!-- divider -->
      <div class="grid-x top_line">
        <div class="cell medium-12">
          <hr />
        </div> <!-- .cell .medium-12 -->
      </div> <!-- .grid-x .grid-margin-x .top_line -->
      <!-- /divider -->
      <div class="grid-x grid-margin-x">
        <div class="cell medium-6 nav-left">
          <p><i>Previous Post</i></p>
          <h3 class="h5"><a href="#">From Neil Gorsuch to Amartya Sen: Natural Law, Ethics, Economics</a></h3>
        </div> <!-- .cell .medium-6 .nav-left -->
        <div class="cell medium-auto nav-right">
          <p><i>Next Post</i></p>
          <h3 class="h5"><a href="#">A Case Study in India Highlights Conservation and Human Needs&hellip;</a></h3>
        </div> <!-- .cell .medium-6 .nav-right -->
      </div> <!-- .grid-x .grid-margin-x -->
      <!-- divider -->
      <div class="grid-x bottom_line">
        <div class="cell medium-12">
          <hr />
        </div> <!-- .cell .medium-12 -->
      </div> <!-- .grid-x .grid-margin-x .bottom_line -->
      <!-- /divider -->
      <div class="grid-x grid-margin-x">
        <div class="cell medium-12">
          <p class="nav-return"><a href="{{ url('articles', $article->group_id) }}">Return to List</a></p>
        </div> <!-- .cell .medium-12 -->
      </div> <!-- .grid-x .grid-margin-x -->
    </div> <!-- .grid-container -->
    </div> <!-- #article-nav -->
@endsection
