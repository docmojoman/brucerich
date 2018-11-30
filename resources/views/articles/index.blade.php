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
              <li><a href="{{ url('./') }}">Home</a></li>
              <li><a href="{{ url('articles') }}">Articles</a></li>
              @if(isset($category))
              <li>
                <span class="show-for-sr">Current: </span> {{ $category->title }}
              </li>
              @endif
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
          @if(isset($category))
          <h1 class="h2">{{ $category->title }}</h1>
          <p class="lead">{{ $category->description }}</p>
          @else
          <h1 class="h2">Articles</h1>
          @endif
        </div> <!-- .cell .medium-12 -->
      </div> <!-- .grid-x .grid-margin-x -->
    </div> <!-- .grid-container -->
    </div> <!-- #article-title -->
    <div id="articles-list"> <!-- bite hero  -->
    <div class="grid-container">
      @foreach ($articles as $article)
      <!-- Article Row Desktop -->
      <div class="grid-x grid-margin-x article-row align-middle show-for-medium">
        <div class="cell medium-2 list-icon">
          <a href="{{ url('article', $article->slug) }}"><img src="{{ asset('img/00-article_fpo.jpg') }}" alt=""></a>
        </div> <!-- .cell .medium-2 -->
        <div class="cell medium-auto list-title">
          <h2 class="h3"><a href="{{ url('article', $article->slug) }}">{{ $article->title }}</a></h2>
          <p>{{ str_limit($article->introduction, 360) }}</p>
        </div> <!-- .cell .medium-auto .list-title -->
      </div> <!-- .grid-x .grid-margin-x article-row -->
      <!-- ./Article Row Desktop -->
      <!-- Article Row Mobile -->
      <div class="grid-x grid-margin-x article-row align-middle hide-for-medium">
        <div class="cell medium-2 list-icon">
          <a href="{{ url('article', $article->slug) . '#mobile' }}"><img src="{{ asset('img/00-article_fpo.jpg') }}" alt=""></a>
        </div> <!-- .cell .medium-2 -->
        <div class="cell medium-auto list-title">
          <h2 class="h3"><a href="{{ url('article', $article->slug) . '#mobile' }}">{{ $article->title }}</a></h2>
          <p>{{ str_limit($article->introduction, 360) }}</p>
        </div> <!-- .cell .medium-auto .list-title -->
      </div> <!-- .grid-x .grid-margin-x article-row -->
      <!-- ./Article Row Mobile -->
      @endforeach
      <!-- Pagination Row -->
      <div class="grid-x grid-margin-x article-row-last align-middle">
        <div class="cell medium-auto medium-offset-2 list-title">
          @if($articles->links() != null)
          {{ $articles->links() }}
          @endif
        </div> <!-- .cell .medium-auto .medium-offset-2 .list-title -->
      </div> <!-- .grid-x .grid-margin-x article-row -->
      <!-- ./Pagination Row -->
    </div> <!-- grid-container -->
    </div> <!-- article nav -->
@endsection
