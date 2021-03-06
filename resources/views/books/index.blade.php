@extends('layouts.public')
@section('title', '| Books')
@section('content')
    <div id="br-breadcrumbs">
    <div class="grid-container">
      <div class="grid-x grid-margin-x">
        <div class="cell medium-12">
          <nav aria-label="You are here:" role="navigation">
            <ul class="breadcrumbs">
              <li class="hide-for-medium"><a href="{{ url('./') }}#mobile">Home</a></li>
              <li class="show-for-medium"><a href="{{ url('./') }}">Home</a></li>
              <li>
                <span class="show-for-sr">Current: </span> Books
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
          <h1 class="h2">Books</h1>
          <p class="lead">Bruce Rich is an American writer and lawyer who has published extensively on the environment in developing countries and development in general. He is the author of <em>To Uphold the World: A Call for a New Global Ethic From Ancient India</em>, a philosophical and historical reflection on the need for a global ethic in a global economy, with a foreword by Amartya Sen and an afterword by the Dalai Lama. He has published extensively on the role of Export Credit Agencies in developing countries, especially concerning the environmental impact of projects funded by them. His most recent book, <em>Foreclosing the Future: The World Bank and the Politics of Environmental Destruction</em>, focuses on issues such as climate change, governance and corruption.</p>
        </div> <!-- .cell .medium-12 -->
      </div> <!-- .grid-x .grid-margin-x -->
    </div> <!-- .grid-container -->
    @if(count($books) >= 1)
    @foreach($books as $book)
    </div> <!-- #article-title -->
    <div id="articles-list"> <!-- bite hero  -->
    <div class="grid-container">
      <!-- Article Row -->
      <div class="grid-x grid-margin-x article-row align-middle">
        <div class="cell medium-2 list-icon show-for-medium">
          <a href="{{ url('/book', $book->slug) }}">
            @if($book->image != null)
            <img src="{{ $book->image }}" alt="{{ $book->title }}">
            @else
            <img src="{{ asset('img/fpo-image.jpg') }}" alt="">
            @endif
          </a>
        </div> <!-- .cell .medium-2 -->
        <div class="cell medium-auto list-title">
          <h2 class="h3 hide-for-medium"><a href="{{ url('/book', $book->slug) }}#mobile">{{ $book->title }}</a></h2>
          <h2 class="h3 show-for-medium"><a href="{{ url('/book', $book->slug) }}">{{ $book->title }}</a></h2>
          <p>{{ $book->introduction }}</p>
        </div> <!-- .cell .medium-auto .list-title -->
      </div> <!-- .grid-x .grid-margin-x article-row -->
      <!-- ./Article Row -->
      <hr />
    </div> <!-- grid-container -->
    </div> <!-- #articles-list -->
    @endforeach
    @else
    <div class="grid-x grid-margin-x article-row align-middle show-for-medium">
      <div class="cell v-space-30">&nbsp;</div>
    </div>
    @endif
@endsection
