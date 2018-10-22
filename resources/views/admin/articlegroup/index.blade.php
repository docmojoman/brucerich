@extends('layouts.private')

@section('content')
    <div id="admin">
    <div class="grid-container">
    	<div class="grid-x grid-margin-x margin-top-60">
        <div class="cell  small-6 small-offset-3">
          <h1 class="text-center">Article Groups</h1>
        </div>
        <div class="cell small-3 align-middle text-right">
          <a href="articlegroups/create" id="new-article" class="button dark">
            <i class="fi-plus"></i> New Article Group</a>
        </div>
      </div>
      <div class="grid-x grid-margin-x margin-top-60">
        <div class="cell medium-8 medium-offset-2">
        	<ul class="no-bullet">
        		@if($articlegroups->count() == 0)
        		<li class="h3">There are no current Article Groups</li>
        		@else
        			@foreach($articlegroups as $articlegroup)
	        			<li class="h3"><a href="articlegroups/edit/{{ $articlegroup->id }}">{{ $articlegroup->title }}</a></li>
        			@endforeach
    			@endif
        	</ul>

        </div>
      </div>
    	<div class="grid-x grid-margin-x margin-top-60">
        <div class="cell  small-6 small-offset-3">
          <h1 class="text-center"></h1>
        </div>
        <div class="cell small-3 align-middle text-right">
          <a href="articlegroups/create" id="new-article" class="button dark">
            <i class="fi-check"></i> Set Sort Order</a>
        </div>
      </div>
      <hr />
@endsection
