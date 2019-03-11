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
              <li class="hide-for-medium"><a href="{{ url('./') }}#mobile">Home</a></li>
              <li class="show-for-medium"><a href="{{ url('./') }}">Home</a></li>
              @empty($category)
              <li>
                <span class="show-for-sr">Current: </span> Articles
              </li>
              @endempty
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
          <h1 class="h2">Articles</h1>
        </div> <!-- .cell .medium-12 -->
      </div> <!-- .grid-x .grid-margin-x -->
    </div> <!-- .grid-container -->
    </div> <!-- #article-title -->
    <div id="articles-list"> <!-- bite hero  -->
    <div class="grid-container">
      @if($sections != null)
      @foreach ($sections as $section)
      <!-- Article Row Desktop -->
      <div class="grid-x grid-margin-x article-row align-middle show-for-medium">
        <div class="cell medium-auto list-title">
          <h2 class="h3"><a href="{{ url('articles', $section->id) . '/' . str_slug($section->title, '-') }}">{{ $section->title }}</a></h2>
          <p>{{ str_limit($section->description, 360) }}</p>
        </div> <!-- .cell .medium-auto .list-title -->
      </div> <!-- .grid-x .grid-margin-x article-row -->
      <!-- ./Article Row Desktop -->
      <!-- Article Row Mobile -->
      <div class="grid-x grid-margin-x article-row align-middle hide-for-medium">
        <div class="cell medium-auto list-title">
          <h2 class="h3"><a href="{{ url('articles', $section->id) . '#mobile' }}">{{ $section->title }}</a></h2>
          <p>{{ str_limit($section->description, 360) }}</p>
        </div> <!-- .cell .medium-auto .list-title -->
      </div> <!-- .grid-x .grid-margin-x article-row -->
      <!-- ./Article Row Mobile -->
      @endforeach
      @else
      <div class="grid-x grid-margin-x article-row align-middle show-for-medium">
        <div class="cell v-space-30">&nbsp;</div>
      </div>
      @endif
    </div> <!-- grid-container -->
    </div> <!-- article nav -->
@endsection
