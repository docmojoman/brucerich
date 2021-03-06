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
              <li class="hide-for-medium"><a href="{{ url('./') }}#mobile">Home</a></li>
              <li class="show-for-medium"><a href="{{ url('./') }}">Home</a></li>
              <li>
                <span class="show-for-sr">Current: </span> Insights
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
          <h1 class="h2 uppercase black">Insights</h1>
          <p class="lead">Reflections on both current and historical, philosophical issues. This section also explores themes for a new book on contemporary global dilemmas viewed through the perspectives of history, travel and philosophy.</p>
        </div> <!-- .cell .medium-12 -->
      </div> <!-- .grid-x .grid-margin-x -->
    </div> <!-- .grid-container -->
    </div> <!-- #blog-title -->
    <div id="blog-list">
    <div class="grid-container">
      <div class="grid-x grid-margin-x">
        <!-- content column -->
        <div class="cell medium-9">
          <!-- Blog Row -->
          <ul class="list-row">
            @if(count($insights))
              @foreach($insights as $insight)
            <li>
              <h2 class="h3 hide-for-medium"><a href="{{ url('/insight', $insight->slug) }}#mobile">{{ $insight->title }}</a></h2>
              <h2 class="h3 show-for-medium"><a href="{{ url('/insight', $insight->slug) }}">{{ $insight->title }}</a></h2>
              <p>{{ $insight->introduction }}</p>
              <hr />
            </li>
            @endforeach
            @else
            <li class="v-space-30">&nbsp;</li>
            @endif
          </ul>
          <!-- ./Blog Row -->
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
        </div>
        <!-- /tags column -->
      </div> <!-- /#blog-list -->
          <!-- Pagination Row -->
          <!-- <div class="grid-x grid-margin-x article-row-last align-middle">
            <div class="cell medium-12"> -->
              {{-- {{ $insights->links() }} --}}
            <!-- </div> -->
          <!-- </div> -->
          <!-- ./Pagination Row -->
    </div> <!-- grid-container -->
    </div> <!-- blog nav -->
@endsection
