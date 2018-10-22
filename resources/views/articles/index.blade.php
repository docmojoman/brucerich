@extends('layouts.public')
@section('title', '- Articles')
@section('content')
    <a name="articles" class="hide-for-medium"></a>
    <div id="br-breadcrumbs">
    <div class="grid-container">
      <div class="grid-x grid-margin-x">
        <div class="cell medium-12">
          <nav aria-label="You are here:" role="navigation">
            <ul class="breadcrumbs">
              <li><a href="./">Home</a></li>
              <li><a href="#">Articles</a></li>
              <li>
                <span class="show-for-sr">Current: </span> Economic Forum
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
          <h1 class="h2">Economic Forum</h1>
          <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam sed nesciunt, aliquam mollitia amet perspiciatis quidem veritatis illo. Eos nobis quas quisquam iste, nam odio soluta dolorem rerum delectus, non! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident ipsam nesciunt aperiam fuga quasi, deleniti, culpa optio, explicabo corporis sed nobis sit veniam. Ex quaerat, unde cupiditate, reiciendis accusamus fugiat?</p>
        </div> <!-- .cell .medium-12 -->
      </div> <!-- .grid-x .grid-margin-x -->
    </div> <!-- .grid-container -->
    </div> <!-- #article-title -->
    <div id="articles-list"> <!-- bite hero  -->
    <div class="grid-container">
      @foreach ($articles as $article)
      <!-- Article Row -->
      <div class="grid-x grid-margin-x article-row align-middle">
        <div class="cell medium-2 list-icon">
          <a href="articles/{{ $article->slug }}"><img src="{{ asset('img/00-article_fpo.jpg') }}" alt=""></a>
        </div> <!-- .cell .medium-2 -->
        <div class="cell medium-auto list-title">
          <h2 class="h3"><a href="articles/{{ $article->slug }}">{{ $article->title }}</a></h2>
          <p>{{ str_limit($article->description, 360) }}</p>
        </div> <!-- .cell .medium-auto .list-title -->
      </div> <!-- .grid-x .grid-margin-x article-row -->
      <!-- ./Article Row -->
      @endforeach
      <!-- Pagination Row -->
      <div class="grid-x grid-margin-x article-row-last align-middle">
        <div class="cell medium-auto medium-offset-2 list-title">
          <!-- <p><a href="article.html">View more</a></p> -->
          <ul class="pagination" role="navigation" aria-label="Pagination" id="articles-page">
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
    </div> <!-- article nav -->
@endsection
