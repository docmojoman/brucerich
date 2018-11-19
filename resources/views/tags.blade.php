@extends('layouts.public')
@section('title', '- Insights')
@section('content')
    <a name="insights" class="hide-for-medium"></a>
    <div id="br-breadcrumbs">
    <div class="grid-container">
      <div class="grid-x grid-margin-x">
        <div class="cell medium-12">
          <nav aria-label="You are here:" role="navigation">
            <ul class="breadcrumbs">
              <li><a href="./">Home</a></li>
              <li>
                <span class="show-for-sr">Current: </span> Tags
              </li>
            </ul>
          </nav>
        </div> <!-- .cell .medium-12 -->
      </div> <!-- .grid-x .grid-margin-x -->
    </div> <!-- grid-container -->
    </div> <!-- breadcrumbs -->
    <div id="blog-title">
    <div class="grid-container">
      <div class="grid-x grid-margin-x">
        <div class="cell medium-12">
          <h1 class="h2 uppercase black">Content Tagged: {{ $tag->name }}</h1>
          <p class="lead"></p>
        </div> <!-- .cell .medium-12 -->
      </div> <!-- .grid-x .grid-margin-x -->
    </div> <!-- .grid-container -->
    </div> <!-- #blog-title -->
    <div id="blog-list">
    <div class="grid-container">
      <div class="grid-x grid-margin-x">
        <!-- content column -->
        <div class="cell medium-9">
          <!-- Tag Category Row -->
          @if($books->count())
          <h2 class="h3">Books</h2>
          <ul>
              @foreach($books as $book)
            <li>
              <h2 class="h3"><a href="{{ url('/book', $book->id) }}">{{ $book->title }}</a></h2>
              <p>{!! str_limit($book->about, 180) !!}</p>
              <hr />
            </li>
            @endforeach
          </ul>
          @endif
          <!-- ./Tag Category Row -->
          <!-- Tag Category Row -->
          @if($articles->count())
          <h2 class="h3">Articles</h2>
          <ul>
              @foreach($articles as $article)
            <li>
              <h2 class="h3"><a href="{{ url('/article', $article->id) }}">{{ $article->title }}</a></h2>
              <p>{!! str_limit($article->description, 180) !!}</p>
              <hr />
            </li>
            @endforeach
          </ul>
          @endif
          <!-- ./Tag Category Row -->
          <!-- Tag Category Row -->
          @if($insights->count())
          <h2 class="h3">Insights</h2>
          <ul>
              @foreach($insights as $insight)
            <li>
              <h2 class="h3"><a href="{{ url('/insight', $insight->id) }}">{{ $insight->title }}</a></h2>
              <p>{!! str_limit($insight->description, 180) !!}</p>
              <hr />
            </li>
            @endforeach
          </ul>
          @endif
          <!-- ./Tag Category Row -->
          <!-- Tag Category Row -->
          @if($videos->count())
          <h2 class="h3">Videos</h2>
          <ul>
              @foreach($videos as $video)
            <li>
              <h2 class="h3"><a href="{{ url('/video', $video->id) }}">{{ $video->title }}</a></h2>
              <p>{!! str_limit($video->caption,180) !!}</p>
              <hr />
            </li>
            @endforeach
          </ul>
          @endif
          <!-- ./Tag Category Row -->
        </div> <!-- /content column -->
        <!-- tags column -->
        <div class="cell medium-3">
          <h2 class="h3">Tags:</h3>
            <ul class="book-submenu">
              @if($tags->count())
              @foreach($tags as $tag)
              <li><a href="{{ url('tag', $tag->name) }}">{{ $tag->name }}</a></li>
              @endforeach
              @endif
            </ul>
        </div>
        <!-- /tags column -->
      </div> <!-- /#blog-list -->
    </div> <!-- grid-container -->
    </div> <!-- blog nav -->
@endsection
