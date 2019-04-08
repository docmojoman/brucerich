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
                    <li class="hide-for-medium"><a href="{{ url('./') }}#mobile">Home</a></li>
                    <li class="show-for-medium"><a href="{{ url('./') }}">Home</a></li>
                    <li>
                      <span class="show-for-sr">Current: </span> Media
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
                <h1 class="h2">Media</h1>
                <p class="lead">Videos giving a perspective on my writings on historical and contemporary themes, as well as on my engagement as an advocate.</p>
            </div> <!-- .cell .medium-12 -->
        </div> <!-- .grid-x .grid-margin-x -->
        <!-- media grid -->
        <div id="media" class="grid-x grid-padding-x small-up-1 medium-up-3">
          @if(count($videos))
          @foreach($videos as $video)
          <div class="cell">
            <div class="shadow card margin-bottom-30">
              <div class="card-section">
                @if(strlen($video->title) >= 50)
                <h1 class="h5"><a href="video/{{ $video->slug }}" title="{{ $video->title }}" class="black">{{ substr($video->title, 0, 50) }}&hellip;</a></h1>
                @else
                <h1 class="h5"><a href="video/{{ $video->slug }}" title="{{ $video->title }}" class="black">{{ $video->title }}</a></h1>
                @endif
                @if(count($video->embed))
                <div class="responsive-embed">
                  {!! $video->embed !!}
                </div>
                @else
                <a href="{{ $video->link }}" class="thumbnail" target="_blank"><img src="{{$video->thumbnail}}" alt="{{ $video->title }}" class="media-thumb"></a>
                @endif
              </div> <!-- card-section -->
              <div class="card-section">
                <div id="caption-{{ $video->id }}" class="view-less">{!! $video->caption !!}</div> <!-- data-toggler removed -->
                @if(strlen($video->caption) > 90)
                <p class="text-right">
                  <a href="video/{{ $video->slug }}">More&hellip;</a>
                </p>
                @else
                <p class="margin-top-5">&nbsp</p>
                @endif
              </div> <!-- card-section -->
            </div> <!-- card -->
          </div> <!-- .cell -->
          @endforeach
          @else
          <div class="cell v-space-35">&nbsp;</div>
          @endif
        </div>
        <!-- end media grid -->
    </div> <!-- .grid-container -->
    </div> <!-- #article-title -->
@endsection
