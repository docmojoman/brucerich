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
              <li><a href="./">Home</a></li>
              <li><a href="/articles">Articles</a></li>
              <li><a href="/articles/{{ $article->group_id }}">{{ $category->title }}</a></li>
              <li>
                <span class="show-for-sr">Current: </span> {{ $article->title }}
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
          <h1 class="h2">{{ $article->title }}</h1>
        </div> <!-- .cell .medium-12 -->
      </div> <!-- .grid-x .grid-margin-x -->
    </div> <!-- .grid-container -->
    </div> <!-- #article-title -->
    <div id="article-page"> <!-- bite hero -->
    <div class="grid-container">
      <div class="grid-x grid-margin-x">
        <div class="cell medium-3">
          <span class="book">
            <p><img src="{{ asset('img/00-article_fpo.jpg') }}" alt=""></p>

            <h3 class="h4">Tags:</h3>
            <ul class="book-submenu">
              <li><a href="tags.html">Green Tribunal</a></li>
              <li><a href="tags.html">Economics</a></li>
              <li><a href="tags.html">India</a></li>
              <li><a href="tags.html">Environmental Courts</a></li>
              <li><a href="tags.html">Economic Policy</a></li>
              <li><a href="tags.html">Deep State</a></li>
              <li><a href="tags.html">Development Institution</a></li>
              <li><a href="tags.html">Global Justice</a></li>
              <li><a href="tags.html">Wealth</a></li>
              <li><a href="tags.html">Poor</a></li>
              <li><a href="tags.html">Environmental Courts</a></li>
            </ul>
          </span>
        </div> <!-- .cell .medium-3 -->
        <div class="cell medium-auto article-body">
          <ul id="book-cite">
            <li><a href="#">{{ $article->author }}</a></li>
            <li><a href="#">{{ $article->publication }}</a></li>
            <li><a href="#">{{ $article->date }}</a></li>
            <li><a href="#">p. {{ $article->page }}</a></li>
          </ul>
          <!--  <p class="lead"><strong>Specialized environmental courts</strong> have Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat labore a ex nam id. Enim explicabo magnam atque, quibusdam reprehenderit ab vitae, fugit aliquid. Voluptatum laboriosam officia, assumenda deserunt praesentium. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis magnam maiores laboriosam praesentium molestias, delectus veniam nihil, assumenda provident incidunt eaque cupiditate veritatis beatae voluptate rerum laudantium magni, laborum unde? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel aut inventore repellat commodi. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis magnam maiores laboriosam praesentium molestias.</p> -->

          <p>Delectus veniam nihil, assumenda provident incidunt eaque cupiditate veritatis beatae voluptate rerum laudantium magni, laborum unde? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel aut inventore repellat commodi. Culpa eum, sint illo vel temporibus dolorem quaerat reiciendis repellendus autem totam sit distinctio pariatur asperiores worldwide.</p>
          <p><a href="{{ $article->pdf }}">Read full article (PDF)</a></p>
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
          <p><i>Previous Post</i></p>
          <h3 class="h5"><a href="#">From Neil Gorsuch to Amartya Sen: Natural Law, Ethics, Economics</a></h3>
        </div> <!-- .cell .medium-6 .nav-left -->
        <div class="cell medium-auto nav-right">
          <p><i>Next Post</i></p>
          <h3 class="h5"><a href="#">A Case Study in India Highlights Conservation and Human Needs&hellip;</a></h3>
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
          <p class="nav-return"><a href="/articles/{{ $article->group_id }}">Return to List</a></p>
        </div> <!-- .cell .medium-12 -->
      </div> <!-- .grid-x .grid-margin-x -->
    </div> <!-- .grid-container -->
    </div> <!-- #article-nav -->
@endsection
