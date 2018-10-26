@extends('layouts.private')

@section('content')
    <div id="admin">
    <div class="grid-container">
      <div class="grid-x grid-margin-x margin-top-60">
        <div class="cell  small-8 small-offset-2">
          <h1 class="text-center">Articles</h1>
        </div>
        <div class="cell small-2 align-middle">
          <a href="/admin/articles/create" id="new-article" class="button dark">
            <i class="fi-plus"></i> New Article</a>
        </div>
      </div>
      <div class="grid-x grid-margin-x margin-top-10">
        <div class="cell  small-4">
          <h2 class="h3 text-right">Category:</h2>
        </div>
        <div class="cell  small-6">
          <select
           onChange="top.location.href=this.options[this.selectedIndex].value;">
            <option value="/admin/articles">Select All&hellip;</option>
            @if($categories->count() == 0)
            <option value="/admin/articlegroups/create">Add New Categories</option>
            @else
            @foreach($categories as $category)
            <option value="/admin/articles/{{ $category->id }}"
              @if($category->id == $selectedGroup)
              selected
              @endif >{{ $category->title }}</option>
            @endforeach
            @endif
          </select>
        </div>
        <div class="cell small-2">
          <p><a href="/admin/articlegroups">Edit Categories</a></p>
        </div>
     </div>
      <hr />
      <div class="grid-x grid-margin-x margin-top-30">
        <div class="cell small-8">
          <h2 class="h4 header-menu">Article</h2> <span class="header-instruction">(Drag row to re-order list):</span>
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
      @if($articles->count() == 0)
      @else
      @foreach($articles as $article)
      <div class="grid-x grid-margin-x margin-top-20">
        <div class="cell small-8">
          <p class="title"><a href="/article/{{ $article->slug }}">{{ $article->title }}</a></p>
        </div>
        <div class="cell small-2">
          <select>
            <option>Status</option>
            <option value="0"
            @if($article->published == 0)
            selected
            @endif >Draft</option>
            <option value="1"
            @if($article->published == 1)
            selected
            @endif >Published</option>
          </select>
        </div>
        <div class="cell small-2">
          <select
           onChange="top.location.href=this.options[this.selectedIndex].value;">
            <option>Select&hellip;</option>
            <option value="/admin/articles/edit/{{ $article->id }}">Edit</option>
            <option value="/admin/articles/delete/{{ $article->id }}te">Delete</option>
          </select>
        </div>
      </div>
      <hr />
      <!-- /row -->
      @endforeach
      @endif
      <div class="grid-x grid-margin-x margin-top-20">
        <div class="cell small-2 small-offset-10">
          <a href="/admin/articlegroups/create" id="new-article" class="button dark">
            <i class="fi-check"></i> Set Sort Order</a>
        </div>
      </div>
@endsection
