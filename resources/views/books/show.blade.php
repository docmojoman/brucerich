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
              <li><a href="./">Home</a></li>
              <li><a href="/books">Books</a></li>
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
              <li><a href="#about">About</a></li>
              <li><a href="#videos">Videos</a></li>
              <li><a href="#review">Review Quotes</a></li>
              <li><a href="#reviews">Reviews</a></li>
              <li><a href="#articles">Articles, Interviews, Essays</a></li>
              <li><a href="#cover">Cover Images</a></li>
              <li><a href="#publishers">Publisher's Pages</a></li>
              <li><a href="#purchasing">Purchasing Options</a></li>
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

          <img src="assets/img/00-speaking-fpo.jpg" alt="">
          <p  class="image-cite">Bruce Rich discussing “Foreclosing the Future” at the Institute for Agriculture and Trade Policy. <a href="">View Video on YouTube</a></p>

          <p><a href="">Show All</a></p>

          <h2 class="h3 uppercase">Reviews</h2>

          <p class="review">“Foreclosing the Future carefully documents the World Bank's adherence to 'pushing the money out the door,' refusing to learn from past mistakes, tolerating corruption, trashing the planet, and evicting the poor—all in devout service to a mis-measure of wealth. Bruce Rich gives a tragic, honest, and well-argued account of the decline of a once-promising institution.”</p>

          <p class="byline">—Herman Daly, Former Senior World Bank Economist, Professor Emeritus, School of Public Policy, University of Maryland</p>

          <p class="review">“A compelling account of the past two decades of global environmental politics as played out in the world's leading development institution. Foreclosing the Future underscores that the need for public scrutiny of international  nancial institutions is as great as ever.”</p>

          <p class="byline">—Senator Tom Udall, New Mexico, Senate Foreign Relations Committee, Senate Appropriations Committee</p>

          <p class="review">“Deeply-researched and  lled with heretofore publicly unavailable Bank documents.... His book argues thoroughly and methodically that the Bank's permissive attitude towards environmental destruction has continued, if not worsened, in the past decade.”</p>

          <p class="byline">—New Republic</p>

          <p class="review">“The strength of the book, however, is its dissection of the Bank's approach to climate change.”</p>

          <p class="byline">—Financial Times</p>

          <p><a href="">Show All</a></p>

          <h2 class="h3 uppercase">Additional Info</h2>

          <p class="book-info">Four page summary of the book, in Bretton Woods Project "At Issue":<br />
            <a href="https://www.brettonwoodsproject.org/wp-content/uploads/2013/10/At-Issue-Bruce-Rich-FINAL.pdf" target="_blank">
            https://www.brettonwoodsproject.org/&hellip;</a></p>

          <p class="book-info">Excerpt from the book published on Alternet:<br />
            <a href="https://www.alternet.org/environment/how-world-bank-hurtling-us-toward-environmental-ruin" target="_blank">https://www.alternet.org/environment/&hellip;</a></p>

          <p><a href="">Show All</a></p>

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
          <p class="nav-return"><a href="books.html">Return to List</a></p>
        </div> <!-- .cell .medium-12 -->
      </div> <!-- .grid-x .grid-margin-x -->
    </div> <!-- .grid-container -->
    </div> <!-- #article-nav -->
@endsection
