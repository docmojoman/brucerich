@extends('layouts.public')
@section('title', '- ')
@section('content')
    <a name="book" class="hide-for-medium"></a>
    <div id="br-breadcrumbs">
    <div class="grid-container">
      <div class="grid-x grid-margin-x">
        <div class="cell medium-12">
          <nav aria-label="You are here:" role="navigation">
            <ul class="breadcrumbs">
              <li class="hide-for-medium"><a href="{{ url('./') }}#mobile">Home</a></li>
              <li class="show-for-medium"><a href="{{ url('./') }}">Home</a></li>
              <li class="hide-for-medium"><a href="{{ url('/books') }}#mobile">Books</a></li>
              <li class="show-for-medium"><a href="{{ url('/books') }}">Books</a></li>
              <li>
                <span class="show-for-sr">Current: </span> {{ $book->title }}
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
          <h1 class="h2">{{ $book->title }}</h1>
        </div> <!-- .cell .medium-12 -->
      </div> <!-- .grid-x .grid-margin-x -->
    </div> <!-- .grid-container -->
    </div> <!-- #article-title -->
    <div id="article-page"> <!-- bite hero -->
    <div class="grid-container">
      <div class="grid-x grid-margin-x">
        <div class="cell medium-3 small-order-2 medium-order-1">
          <span class="book">
            <p><img src="{{ $book->image }}" alt=""></p>
            <ul class="book-submenu">
              @if($sections)
              @foreach($sections as $section)
              <li><a href="#{{ $section->header }}">{{ str_limit($section->header, 26) }}</a></li>
              @endforeach
              @endif
            </ul>
            @if($book->amazon)
            <p><a href="{{ $book->amazon }}"><img class="buy-button-amazon" src="{{ asset('img/buy-button-amazon.png') }}" alt=""></p></a>
            @endif
            <h3 class="h4">Tags:</h3>
            <ul class="book-submenu">
              @if($tags)
              @foreach($tags as $tag)
              <li class="hide-for-medium"><a href="{{ url('tag', $tag->slug)}}#mobile">{{ $tag->name }}</a></li>
              <li class="show-for-medium"><a href="{{ url('tag', $tag->slug)}}">{{ $tag->name }}</a></li>
              @endforeach
              @endif
            </ul>
          </span>
        </div> <!-- .cell .medium-3 -->
        <div class="cell medium-auto article-body small-order-1 medium-order-2">
          <p class="lead">{{ $book->introduction }}</p>
          {!! $book->about !!}

          @if($sections)
          @foreach($sections as $section)
          <div class="book-section">
          <a name="{{ $section->header }}"></a>
          <h2 class="h3 uppercase">{{ $section->header }}</h2>

          @if($section->type == 'video')
          <div class="responsive-embed">
            {!! $section->embed !!}
          </div>
          <p  class="image-cite">{{ $section->caption }}</p>
          @else
          {!! $section->description !!}
          @endif

          </div>
          @endforeach
          @endif
          <!-- End Dynamic Section -->

        </div> <!-- .cell .medium-9 .article-body -->
      </div> <!-- .grid-x .grid-margin-x -->
    </div> <!-- grid-container -->
    </div> <!-- article page -->
    <div id="article-nav">
    <div class="grid-container">
      <div class="grid-x bottom_line">
        <div class="cell medium-12">
          <hr />
        </div> <!-- .cell .medium-12 -->
      </div> <!-- .grid-x .grid-margin-x .bottom_line -->
      <!-- /divider -->
      <div class="grid-x grid-margin-x">
        <div class="cell medium-12">
          <p class="nav-return hide-for-medium"><a href="{{ url('/admin/books') }}#mobile">Return to Edit</a></p>
          <p class="nav-return show-for-medium"><a href="{{ url('/admin/books') }}">Return to Edit</a></p>
        </div> <!-- .cell .medium-12 -->
      </div> <!-- .grid-x .grid-margin-x -->
    </div> <!-- .grid-container -->
    </div> <!-- #article-nav -->
@endsection
