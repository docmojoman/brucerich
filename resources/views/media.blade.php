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
            </div> <!-- .cell .medium-12 -->
        </div> <!-- .grid-x .grid-margin-x -->
        <!-- media grid -->
        <div id="media" class="grid-x grid-padding-x small-up-1 medium-up-3">
          @if(count($videos))
          @foreach($videos as $video)
          <div class="cell">
            <div class="shadow card">
              <div class="card-section">
                {{-- <a href="#" class="thumbnail">
                  <img src="{{ asset('img/00-speaking-fpo.jpg') }}" class="media-thumb" alt="Bruce Rich Speaks at Conference.">
                </a> --}}
                <div class="responsive-embed">
                  {!! $video->embed !!}
                </div>
              </div> <!-- card-section -->
              <div class="card-section">
                <p class="text-truncate">{!! $video->caption !!}</p>
              </div> <!-- card-section -->
            </div> <!-- card -->
          </div> <!-- .cell -->
          @endforeach
          @endif
        </div>
        <!-- end media grid -->
    </div> <!-- .grid-container -->
    </div> <!-- #article-title -->
@endsection
