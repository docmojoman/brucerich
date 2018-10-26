@extends('layouts.private')

@section('content')
    <div id="admin">
    <div class="grid-container">
      <div class="grid-x grid-margin-x margin-top-60">
        <div class="cell  small-8 small-offset-2">
          <h1 class="text-center">Books</h1>
        </div>
        <div class="cell small-2 align-middle">
          <a href="/admin/books/create" id="new-article" class="button dark">
            <i class="fi-plus"></i> New Book</a>
        </div>
      </div>
      <hr />
      <div class="grid-x grid-margin-x margin-top-30">
        <div class="cell small-8">
          <h2 class="h4 header-menu">Books</h2> <span class="header-instruction">(Drag row to re-order list):</span>
        </div>
        <div class="cell small-2">
          <h2 class="h4">Status</h2>
        </div>
        <div class="cell small-2">
          <h2 class="h4">Edit</h2>
        </div>
      </div>
      <hr />
      <!-- list -->
      <!-- row -->
      @if($books->count() == 0)
      @else
      @foreach($books as $book)
      <div class="grid-x grid-margin-x margin-top-20">
        <div class="cell small-8">
          <p class="title"><a href="/book/{{ $book->slug }}">{{ $book->title }}</a></p>
        </div>
        <div class="cell small-2">
          <select>
            <option>Status</option>
            <option value="0"
            @if($book->published == 0)
            selected
            @endif >Draft</option>
            <option value="1"
            @if($book->published == 1)
            selected
            @endif >Published</option>
          </select>
        </div>
        <div class="cell small-2">
          <select
           onChange="top.location.href=this.options[this.selectedIndex].value;">
            <option>Select&hellip;</option>
            <option value="/admin/books/edit/{{ $book->id }}">Edit</option>
            <option value="/admin/books/delete/{{ $book->id }}te">Delete</option>
          </select>
        </div>
      </div>
      <hr />
      <!-- /row -->
      @endforeach
      @endif
      <div class="grid-x grid-margin-x margin-top-20">
        <div class="cell small-2 small-offset-10">
          <a href="/admin/books/sort" id="new-article" class="button dark">
            <i class="fi-check"></i> Set Sort Order</a>
        </div>
      </div>
@endsection
