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
              <li><a href="{{ url('./') }}">Home</a></li>
              <li><a href="{{ url('/books') }}">Books</a></li>
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
        <div class="cell medium-3">
          <span class="book">
            <p><img src="{{ asset('img/book-01.png') }}" alt=""></p>
            <ul class="book-submenu">
              @foreach($sections as $section)
              <li><a href="#{{ $section->header }}">{{ str_limit($section->header, 26) }}</a></li>
              @endforeach
              {{-- <li><a href="#about">About</a></li>
              <li><a href="#videos">Videos</a></li>
              <li><a href="#review">Review Quotes</a></li>
              <li><a href="#reviews">Reviews</a></li>
              <li><a href="#articles">Articles, Interviews, Essays</a></li>
              <li><a href="#cover">Cover Images</a></li>
              <li><a href="#publishers">Publisher's Pages</a></li>
              <li><a href="#purchasing">Purchasing Options</a></li> --}}
            </ul>
            <p><img class="buy-button-amazon" src="assets/img/buy-button-amazon.png" alt=""></p>
            <h3 class="h4">Tags:</h3>
            <ul class="book-submenu">
              <li><a href="tags.html">Accounting</a></li>
              <li><a href="tags.html">Appropriations</a></li>
              <li><a href="tags.html">Ashoka</a></li>
              <li><a href="tags.html">Book Tour</a></li>
              <li><a href="tags.html">Committee</a></li>
              <li><a href="tags.html">Deep State</a></li>
              <li><a href="tags.html">Development Institution</a></li>
              <li><a href="tags.html">Scrutiny</a></li>
              <li><a href="tags.html">Wealth</a></li>
              <li><a href="tags.html">Poor</a></li>
              <li><a href="tags.html">Zebra</a></li>
            </ul>
          </span>
        </div> <!-- .cell .medium-3 -->
        <div class="cell medium-auto article-body">
          <p class="lead">{{ $book->about }}</p>
Rissa Johnson
          <p><a href="">Show All</a></p>

          <h2 class="h3 uppercase">Media</h2>

          <img src="{{ asset('img/00-speaking-fpo.jpg') }}" alt="">
          <p  class="image-cite">Bruce Rich discussing “Foreclosing the Future” at the Institute for Agriculture and Trade Policy. <a href="">View Video on YouTube</a></p>

          <p><a href="">Show All</a></p>

          <!-- Dynamic Section -->
          <ul class="accordion" data-accordion data-multi-expand="true">
            @foreach($sections as $section)
            <!-- Dynamic Row -->
            <li class="accordion-item is-active" data-accordion-item>
              <!-- Accordion tab title -->
              <a href="#" class="accordion-title"><a name="{{ $section->header }}">
                <h2 class="h3 uppercase">{{ $section->header }}</h2>
              </a>

              <!-- Accordion tab content: it would start in the open state due to using the `is-active` state class. -->
              <div class="accordion-content" data-tab-content>{{ $section->description }}</div>
            </li>
            <!-- End Dynamic Row -->
            @endforeach
          </ul>
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
          <p class="nav-return"><a href="{{ url('/books') }}">Return to List</a></p>
        </div> <!-- .cell .medium-12 -->
      </div> <!-- .grid-x .grid-margin-x -->
    </div> <!-- .grid-container -->
    </div> <!-- #article-nav -->
@endsection
