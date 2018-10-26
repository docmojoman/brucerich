@extends('layouts.public')
@section('title', '- Articles')
@section('content')
    <div id="br-breadcrumbs">
    <div class="grid-container">
      <div class="grid-x grid-margin-x">
        <div class="cell medium-12">
          <nav aria-label="You are here:" role="navigation">
            <ul class="breadcrumbs">
              <li><a href="./">Home</a></li>
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
          <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam sed nesciunt, aliquam mollitia amet perspiciatis quidem veritatis illo. Eos nobis quas quisquam iste, nam odio soluta dolorem rerum delectus, non! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident ipsam nesciunt aperiam fuga quasi, deleniti, culpa optio, explicabo corporis sed nobis sit veniam. Ex quaerat, unde cupiditate, reiciendis accusamus fugiat?</p>
        </div> <!-- .cell .medium-12 -->
      </div> <!-- .grid-x .grid-margin-x -->
    </div> <!-- .grid-container -->
    @foreach($books as $book)
    </div> <!-- #article-title -->
    <div id="articles-list"> <!-- bite hero  -->
    <div class="grid-container">
      <!-- Article Row -->
      <div class="grid-x grid-margin-x article-row align-middle">
        <div class="cell medium-2 list-icon">
          <a href="/books/{{ $book->id }}"><img src="{{ asset('img/book-01.png') }}" alt=""></a>
        </div> <!-- .cell .medium-2 -->
        <div class="cell medium-auto list-title">
          <h2 class="h3"><a href="/book/{{ $book->id }}">{{ $book->title }}</a></h2>
          {{ $book->about }}
        </div> <!-- .cell .medium-auto .list-title -->
      </div> <!-- .grid-x .grid-margin-x article-row -->
      <!-- ./Article Row -->
      <hr />
    </div> <!-- grid-container -->
    </div> <!-- #articles-list -->
    @endforeach
@endsection
