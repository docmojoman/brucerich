@extends('layouts.private')

@section('content')
    <div id="admin">
    <div class="grid-container">
      <div class="grid-x grid-margin-x margin-top-60">
        <div class="cell  small-8 small-offset-2">
          <h1 class="text-center">Insights</h1>
        </div>
        <div class="cell small-2 align-middle">
          <a href="/admin/insights/create" id="new-article" class="button dark">
            <i class="fi-plus"></i> New Insight</a>
        </div>
      </div>
      <hr />
      <div class="grid-x grid-margin-x margin-top-30">
        <div class="cell small-8">
          <h2 class="h4 header-menu">Insight</h2> <!-- <span class="header-instruction">(Drag row to re-order list):</span> -->
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
      @if($insights->count() == 0)
      @else
      @foreach($insights as $insight)
      <div class="grid-x grid-margin-x margin-top-20">
        <div class="cell small-8">
          <p class="title"><a href="/insights/{{ $insight->slug }}">{{ $insight->title }}</a></p>
        </div>
        <div class="cell small-2">
          <select onChange="top.location.href=this.options[this.selectedIndex].value;">
            <option>Status</option>
            <option value="{{ url('/admin/insights/publish', $insight->id) }}"
            @if($insight->published == 0)
            selected
            @endif >Draft</option>
            <option value="{{ url('/admin/insights/publish', $insight->id) }}"
            @if($insight->published == 1)
            selected
            @endif >Published</option>
          </select>
        </div>
        <div class="cell small-2">
            <a href="{{ url('/admin/insights/edit', $insight->id) }}" class="button dark expanded no-margin">Edit</a>
        </div>
      </div>
      <hr />
      <!-- /row -->
      @endforeach
      @endif
@endsection
