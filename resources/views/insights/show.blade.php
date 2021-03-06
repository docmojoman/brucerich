@extends('layouts.public')
@section('title', '| Insights - '.$insight->title)
@section('content')
    <a name="post" class="hide-for-medium"></a>
    <div id="br-breadcrumbs">
    <div class="grid-container">
      <div class="grid-x grid-margin-x">
        <div class="cell medium-12">
          <nav aria-label="You are here:" role="navigation">
            <ul class="breadcrumbs">
              <li class="hide-for-medium"><a href="{{ url('./') }}#mobile">Home</a></li>
              <li class="show-for-medium"><a href="{{ url('./') }}">Home</a></li>
              <li><a href="{{ url('insights') }}">Insights</a></li>
              <li>
                <span class="show-for-sr">Current: </span> {{ $insight->title }}
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
        <div class="cell medium-9">
          <h1 class="h2">{{ $insight->title }}</h1>
          <p class="lead">{{ $insight->introduction }}</p>

          <p>{!! $insight->description !!}</p>

          <p>{!! $insight->copy !!}</p>
        </div> <!-- .cell .medium-9 -->
        <div class="cell medium-3">
          <h3 class="h4">Tags:</h3>
            <ul class="book-submenu">
              @if($tags->count())
              @foreach($tags as $tag)
              <li><a href="{{ url('tag', $tag->slug) }}">{{ $tag->name }}</a></li>
              @endforeach
              @endif
            </ul>
        </div>
      </div> <!-- .grid-x .grid-margin-x -->
      <div class="grid-x bottom_line">
        <div class="cell medium-12">
          <hr>
        </div> <!-- .cell .medium-12 -->
      </div>
      <div class="grid-x grid-margin-x">
        <div class="cell medium-12">
          <p class="nav-return hide-for-medium"><a href="{{ url('/insights') }}#mobile">Return to List</a></p>
          <p class="nav-return show-for-medium"><a href="{{ url('/insights') }}">Return to List</a></p>
        </div> <!-- .cell .medium-12 -->
      </div> <!-- .grid-x .grid-margin-x -->
    </div> <!-- .grid-container -->
    </div> <!-- #article-title -->
@endsection
