@extends('layouts.public')
@section('title', '- Media')
@section('content')
    <a name="about" class="hide-for-medium"></a>
    <div id="br-breadcrumbs">
    <div class="grid-container">
        <div class="grid-x grid-margin-x">
            <div class="cell medium-12">
                <nav aria-label="You are here:" role="navigation">
                  <ul class="breadcrumbs">
                    <li><a href="{{ url('./') }}">Home</a></li>
                    <li><a href="{{ url('/media') }}">Media</a></li>
                    <li>
                      <span class="show-for-sr">Current: </span> {{ $video->title }}
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
                <h1 class="h2">{{ $video->title }}</h1>
            </div> <!-- .cell .medium-9 -->
        </div> <!-- .grid-x .grid-margin-x -->
        <div class="grid-x grid-margin-x">
          <div class="cell medium-9">
            <div class="responsive-embed">
              {!! $video->embed !!}
            </div>
            @if($video->caption)
            <p>{{ $video->caption }}</p>
            @endif
          </div>
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
    </div> <!-- .grid-container -->
    </div> <!-- #article-title -->
@endsection
