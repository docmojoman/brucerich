@extends('layouts.public')
@section('title', '- Tags')
@section('content')
    <a name="insights" class="hide-for-medium"></a>
    <div id="br-breadcrumbs">
    <div class="grid-container">
      <div class="grid-x grid-margin-x">
        <div class="cell medium-12">
          <nav aria-label="You are here:" role="navigation">
            <ul class="breadcrumbs">
              <li class="hide-for-medium"><a href="{{ url('./') }}#mobile">Home</a></li>
              <li class="show-for-medium"><a href="{{ url('./') }}">Home</a></li>
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
          <ul class="list-row">
              @foreach($books as $book)
            <li>
              <h2 class="h3 hide-for-medium"><a href="{{ url('/book', $book->slug) }}#mobile">{{ $book->title }}</a></h2>
              <h2 class="h3 show-for-medium"><a href="{{ url('/book', $book->slug) }}">{{ $book->title }}</a></h2>
              <p>{{ str_limit($book->introduction, 180) }}</p>
              <hr />
            </li>
            @endforeach
          </ul>
          @endif
          <!-- ./Tag Category Row -->
          <!-- Tag Category Row -->
          @if($articles->count())
          <h2 class="h3">Articles</h2>
          <ul class="list-row">
              @foreach($articles as $article)
            <li>
              <h2 class="h3 hide-for-medium"><a href="{{ url('/article', $article->slug) }}#mobile">{{ $article->title }}</a></h2>
              <h2 class="h3 show-for-medium"><a href="{{ url('/article', $article->slug) }}">{{ $article->title }}</a></h2>
              <p>{!! str_limit($article->introduction, 180) !!}</p>
              <hr />
            </li>
            @endforeach
          </ul>
          @endif
          <!-- ./Tag Category Row -->
          <!-- Tag Category Row -->
          @if($insights->count())
          <h2 class="h3">Insights</h2>
          <ul class="list-row">
              @foreach($insights as $insight)
            <li>
              <h2 class="h3 hide-for-medium"><a href="{{ url('/insight', $insight->slug) }}#mobile">{{ $insight->title }}</a></h2>
              <h2 class="h3 show-for-medium"><a href="{{ url('/insight', $insight->slug) }}">{{ $insight->title }}</a></h2>
              <p>{!! str_limit($insight->introduction, 180) !!}</p>
              <hr />
            </li>
            @endforeach
          </ul>
          @endif
          <!-- ./Tag Category Row -->
          <!-- Tag Category Row -->
          @if($videos->count())
          <h2 class="h3">Videos</h2>
          <ul class="list-row">
              @foreach($videos as $video)
            <li>
              <h2 class="h3 hide-for-medium"><a href="{{ url('/video', $video->slug) }}#mobile">{{ $video->title }}</a></h2>
              <h2 class="h3 show-for-medium"><a href="{{ url('/video', $video->slug) }}#mobile">{{ $video->title }}</a></h2>
              <p>{!! str_limit($video->caption,180) !!}</p>
              <hr />
            </li>
            @endforeach
          </ul>
          @endif
          <!-- ./Tag Category Row -->
          <!-- Tag Category Row -->
          @if(!$books->count() && !$articles->count() && !$insights->count() && !$videos->count())
          <h2 class="h3">Results</h2>
          <ul class="list-row">
            <li>
              <p>Currently there is no content associated with this tag.</p>
              <hr />
            </li>
          </ul>
          <div class="v-space-20">&nbsp;</div>
          @endif
          <!-- ./Tag Category Row -->
        </div> <!-- /content column -->
        <!-- tags column -->
        <div class="cell medium-3">
          <h2 class="h3">Tags:</h3>
            <ul class="book-submenu">
              @if($tags->count())
              @foreach($tags as $tag)
              <li class="hide-for-medium"><a href="{{ url('tag', $tag->slug) }}#mobile">{{ $tag->name }}</a></li>
              <li class="show-for-medium"><a href="{{ url('tag', $tag->slug) }}">{{ $tag->name }}</a></li>
              @endforeach
              @endif
            </ul>
            <h5><a href="/tags" class="black" style="text-decoration: underline;">All Tags&hellip;</a></h5>
        </div>
        <!-- /tags column -->
      </div> <!-- /#blog-list -->
    </div> <!-- grid-container -->
    </div> <!-- blog nav -->
@endsection
