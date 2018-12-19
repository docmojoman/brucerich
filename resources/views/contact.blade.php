@extends('layouts.public')
@section('title', '- Contact')
@section('content')
    <a name="contact" class="hide-for-medium"></a>
    <div id="br-breadcrumbs">
    <div class="grid-container">
        <div class="grid-x grid-margin-x">
            <div class="cell medium-12">
                <nav aria-label="You are here:" role="navigation">
                  <ul class="breadcrumbs">
                    <li class="hide-for-medium"><a href="{{ url('./') }}#mobile">Home</a></li>
                    <li class="show-for-medium"><a href="{{ url('./') }}">Home</a></li>
                    <li>
                      <span class="show-for-sr">Current: </span> Contact
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
                <h1 class="h2">Contact</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam sed nesciunt, aliquam mollitia amet perspiciatis quidem veritatis illo. Eos nobis quas quisquam iste, nam odio soluta dolorem rerum delectus, non!</p>
            </div> <!-- .cell .medium-12 -->
        </div> <!-- .grid-x .grid-margin-x -->
    </div> <!-- .grid-container -->
    </div> <!-- #article-title -->
    <div id="contact">
              <form action="{{ url('contact') }}" method="POST">
                @csrf
        <div class="grid-container">
            <div class="grid-x cell">
              <div class="medium-6 cell padding-right-5">
                <label>First Name
                  <input name="f_name" type="text" placeholder="First Name" value="{{ old('f_name') }}">
                </label>
              </div>
              <div class="medium-6 cell padding-left-5">
                <label>Last Name
                  <input name="l_name" type="text" placeholder="Last Name" value="{{ old('l_name') }}">
                </label>
              </div>
            </div> <!-- grid-x grid-padding-x cell -->
            <div class="grid-x grid-padding-x">
              <div class="medium-12 cell">
                <label>Email Address
                  <input name="email" type="text" placeholder="Email Address" value="{{ old('email') }}">
                </label>

                <label>
                  Message
                  <textarea name="body" placeholder="Message" value="{!! old('body') !!}"></textarea>
                </label>

                <label>{!! NoCaptcha::display(['data-theme' => 'dark']) !!}</label>

                <label><input type="submit" class="button dark" value="Send Message" /></label>
              </div>
            </div>
        </div> <!-- .grid-container -->
              </form>
    </div> <!-- #contact -->
@endsection
@push('script-link')
{!! NoCaptcha::renderJs() !!}
@endpush
