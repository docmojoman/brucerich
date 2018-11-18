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
              <li><a href="./">Home</a></li>
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
          <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloremque quo eum voluptas cumque, totam recusandae. Quae eum at sunt, officia ipsum quibusdam natus officiis nesciunt sed? Harum consequatur, architecto sapiente! Consectetur adipisicing elit. Consequuntur similique odio reiciendis odit temporibus atque libero quaerat quis nisi laboriosam, quibusdam omnis, dolor, fugiat beatae mollitia labore possimus nihil ipsum?</p>
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
          <ul>
              @foreach($insights as $insight)
            <li>
              <h2 class="h3"><a href="{{ url('/insight', $insight->id) }}">{{ $insight->title }}</a></h2>
              <p>{!! $insight->description !!}</p>
              <hr />
            </li>
            @endforeach
          </ul>
          <!-- ./Blog Row -->
        </div> <!-- /content column -->
        <!-- tags column -->
        <div class="cell medium-3">
          <h2 class="h3">Tags:</h3>
            <ul class="book-submenu">
              @if($tags->count())
              @foreach($tags as $tag)
              <li><a href="{{ url('tag', $tag->name) }}">{{ $tag->name }}</a></li>
              @endforeach
              @endif
            </ul>
        </div>
        <!-- /tags column -->
      </div> <!-- /#blog-list -->
          <!-- Pagination Row -->
          <div class="grid-x grid-margin-x article-row-last align-middle">
            <div class="cell medium-12">
              <ul class="pagination" id="insights-page" role="navigation" aria-label="Pagination">
                <li class="disabled">Previous <span class="show-for-sr">page</span></li>
                <li class="current"><span class="show-for-sr">You're on page</span> 1</li>
                <li><a href="#0" aria-label="Page 2">2</a></li>
                <li><a href="#0" aria-label="Page 3">3</a></li>
                <li><a href="#0" aria-label="Page 4">4</a></li>
                <li class="ellipsis" aria-hidden="true"></li>
                <li><a href="#0" aria-label="Page 12">12</a></li>
                <li><a href="#0" aria-label="Page 13">13</a></li>
                <li><a href="#0" aria-label="Next page">Next <span class="show-for-sr">page</span></a></li>
              </ul>
            </div> <!-- .cell .medium-auto .medium-offset-2 .list-title -->
          </div> <!-- .grid-x .grid-margin-x article-row -->
          <!-- ./Pagination Row -->
    </div> <!-- grid-container -->
    </div> <!-- blog nav -->
@endsection
