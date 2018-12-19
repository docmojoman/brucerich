@extends('layouts.public')
@section('title', '- Thanks for Making Contact!')
@section('content')
    <a name="contact" class="hide-for-medium"></a>
    <div id="br-breadcrumbs">
    <div class="grid-container">
        <div class="grid-x grid-margin-x">
            <div class="cell medium-12">
                <nav aria-label="You are here:" role="navigation">
                  <ul class="breadcrumbs">
                    <li class="hide-for-medium"><a href="{{ url('./') }}#mobile">Home</a></li>
                    <li class="show-for-medium"><a href="./">Home</a></li>
                    <li>
                      <span class="show-for-sr">Current: </span> Contact Successful
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
                <h1 class="h2">Message Sent</h1>
                <p>Thank you for your message.</p>
                <p><a href="{{url('./') }}" class="button dark">Home</a></p>
            </div> <!-- .cell .medium-12 -->
        </div> <!-- .grid-x .grid-margin-x -->
        <div class="v-space-35">&nbsp;</div>
    </div> <!-- .grid-container -->
    </div> <!-- #article-title -->
@endsection
