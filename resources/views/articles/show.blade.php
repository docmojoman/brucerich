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
                <span class="show-for-sr">Current: </span> {{ str_limit($article->title, 60, ' …') }}
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
            @if($article->author)<li>{{ $article->author }}</li>@endif
            @if($article->publication)<li>{{ $article->publication }}</li>@endif
            @if($article->date)<li>{{ $article->date }}</li>@endif
            @if($article->page)<li>{{ $article->page }}</li>@endif
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
          @if($pages['prev'])
          <p><i>Previous Post</i></p>
          <h3 class="h5"><a title="{{ $pages['prev']['title'] }}" href="{{ url('article', $pages['prev']['slug']) }}">{{ str_limit($pages['prev']['title'], 70, ' …') }}</a></h3>
          @endif
        </div> <!-- .cell .medium-6 .nav-left -->
        <div class="cell medium-auto nav-right">
          @if($pages['next'])
          <p><i>Next Post</i></p>
          <h3 class="h5"><a title="{{ $pages['next']['title'] }}" href="{{ url('article', $pages['next']['slug']) }}">{{ str_limit($pages['next']['title'], 70, ' …') }}</a></h3>
          @endif
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
