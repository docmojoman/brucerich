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
              <li class="hide-for-medium"><a href="{{ url('./') }}#mobile">Home</a></li>
              <li class="show-for-medium"><a href="{{ url('./') }}">Home</a></li>
              <li class="hide-for-medium"><a href="{{ url('interviews') }}#mobile">Interviews</a></li>
              <li class="show-for-medium"><a href="{{ url('interviews') }}">Interviews</a></li>
              <li>
                <span class="show-for-sr">Current: </span> {{ str_limit($interview->title, 60, ' …') }}
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
          <h1 class="h2">{{ $interview->title }}</h1>
        </div> <!-- .cell .medium-12 -->
      </div> <!-- .grid-x .grid-margin-x -->
    </div> <!-- .grid-container -->
    </div> <!-- #article-title -->
    <div id="article-page"> <!-- bite hero -->
    <div class="grid-container">
      <div class="grid-x grid-margin-x">
        <div class="cell medium-3 small-order-2 medium-order-1">
          <span class="book">
            @if($interview->image != null)
              <p><img src="{{ $interview->image }}" alt=""></p>
            @endif

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
        <div class="cell medium-auto article-body small-order-1 medium-order-2">
          <ul id="book-cite">
            @if($interview->author)<li>{{ $interview->author }}</li>@endif
            @if($interview->publication)<li>{{ $interview->publication }}</li>@endif
            @if($interview->date)<li>{{ $interview->date }}</li>@endif
            @if($interview->page)<li>{{ $interview->page }}</li>@endif
          </ul>
          {!! $interview->description !!}

          @if($interview->link != null)
            <p><a href="{{ $interview->link }}">Read full interview (LINK)</a></p>
          @endif

          @if($interview->pdf != null)
            <p><a href="{{ $interview->pdf }}">Read full interview (PDF)</a></p>
          @endif
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
          <h3 class="h5 hide-for-medium"><a title="{{ $pages['prev']['title'] }}" href="{{ url('article', $pages['prev']['slug']) }}#mobile">{{ str_limit($pages['prev']['title'], 70, ' …') }}</a></h3>
          <h3 class="h5 show-for-medium"><a title="{{ $pages['prev']['title'] }}" href="{{ url('article', $pages['prev']['slug']) }}">{{ str_limit($pages['prev']['title'], 70, ' …') }}</a></h3>
          @endif
        </div> <!-- .cell .medium-6 .nav-left -->
        <div class="cell medium-auto nav-right">
          @if($pages['next'])
          <p><i>Next Post</i></p>
          <h3 class="h5 hide-for-medium"><a title="{{ $pages['next']['title'] }}" href="{{ url('article', $pages['next']['slug']) }}#mobile">{{ str_limit($pages['next']['title'], 70, ' …') }}</a></h3>
          <h3 class="h5 show-for-medium"><a title="{{ $pages['next']['title'] }}" href="{{ url('article', $pages['next']['slug']) }}">{{ str_limit($pages['next']['title'], 70, ' …') }}</a></h3>
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
          <p class="nav-return hide-for-medium"><a href="{{ url('interviews') }}#mobile">Return to List</a></p>
          <p class="nav-return show-for-medium"><a href="{{ url('interviews') }}">Return to List</a></p>
        </div> <!-- .cell .medium-12 -->
      </div> <!-- .grid-x .grid-margin-x -->
    </div> <!-- .grid-container -->
    </div> <!-- #article-nav -->
@endsection
