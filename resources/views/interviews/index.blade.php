@extends('layouts.public')
@section('title', '- Interviews')
@section('content')
    <a name="interviews" class="hide-for-medium"></a>
    <div id="br-breadcrumbs">
    <div class="grid-container">
      <div class="grid-x grid-margin-x">
        <div class="cell medium-12">
          <nav aria-label="You are here:" role="navigation">
            <ul class="breadcrumbs">
              <li class="hide-for-medium"><a href="{{ url('./') }}#mobile">Home</a></li>
              <li class="show-for-medium"><a href="{{ url('./') }}">Home</a></li>
              <li>
                <span class="show-for-sr">Current: </span> Interviews
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
          <h1 class="h2">Interviews</h1>
          <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam tempora nobis, obcaecati natus suscipit. Placeat a rem eveniet aliquam deleniti dolor, beatae alias iste qui, modi dignissimos repellat, ipsum natus.</p>
        </div> <!-- .cell .medium-12 -->
      </div> <!-- .grid-x .grid-margin-x -->
    </div> <!-- .grid-container -->
    </div> <!-- #article-title -->
    <div id="articles-list"> <!-- bite hero  -->
    <div class="grid-container">
      @if(count($interviews) >= 1)
      @foreach ($interviews as $interview)
      <!-- Article Row Desktop -->
      <div class="grid-x grid-margin-x article-row align-middle show-for-medium">
        <div class="cell medium-2 list-icon">
          @if($interview->image != null)
          <a href="{{ url('interview', $interview->slug) }}"><img src="{{ $interview->image }}" alt="{{ $interview->title }}"></a>
          @else
          <a href="{{ url('interview', $interview->slug) }}"><img src="{{ asset('img/00-article_fpo.jpg') }}" alt="{{ $interview->title }}"></a>
          @endif
        </div> <!-- .cell .medium-2 -->
        <div class="cell medium-auto list-title">
          <h2 class="h3"><a href="{{ url('interview', $interview->slug) }}">{{ $interview->title }}</a></h2>
          <p>{{ str_limit($interview->introduction, 360) }}</p>
        </div> <!-- .cell .medium-auto .list-title -->
      </div> <!-- .grid-x .grid-margin-x article-row -->
      <!-- ./Article Row Desktop -->
      <!-- Article Row Mobile -->
      <div class="grid-x grid-margin-x article-row align-middle hide-for-medium">
        <div class="cell medium-auto list-title">
          <h2 class="h3"><a href="{{ url('interview', $interview->slug) . '#mobile' }}">{{ $interview->title }}</a></h2>
          <p>{{ str_limit($interview->introduction, 360) }}</p>
        </div> <!-- .cell .medium-auto .list-title -->
      </div> <!-- .grid-x .grid-margin-x article-row -->
      <!-- ./Article Row Mobile -->
      @endforeach
      @else
      <div class="grid-x grid-margin-x article-row align-middle show-for-medium">
        <div class="cell v-space-30">&nbsp;</div>
      </div>
      @endif
      <!-- Pagination Row -->
      <!-- <div class="grid-x grid-margin-x article-row-last align-middle">
        <div class="cell medium-auto medium-offset-2 list-title"> -->
          {{-- @if($interviews->links() != null)
          {{ $articles->links() }}
          @endif --}}
        <!-- </div> .cell .medium-auto .medium-offset-2 .list-title -->
      <!-- </div> .grid-x .grid-margin-x article-row -->
      <!-- ./Pagination Row -->
    </div> <!-- grid-container -->
    </div> <!-- article nav -->
@endsection
