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
                    <li><a href="./">Home</a></li>
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
        <div class="grid-container">
            <div class="grid-x cell">
              <div class="medium-6 cell padding-right-5">
                <label>First Name
                  <input type="text" placeholder="First Name">
                </label>
              </div>
              <div class="medium-6 cell padding-left-5">
                <label>Last Name
                  <input type="text" placeholder="Last Name">
                </label>
              </div>
            </div> <!-- grid-x grid-padding-x cell -->
            <div class="grid-x grid-padding-x">
              <div class="medium-12 cell">
                <label>Email Address
                  <input type="text" placeholder="Email Address">
                </label>

                <label>
                  Message
                  <textarea placeholder="Message"></textarea>
                </label>

                <!-- <button type="button" class="button" value="Submit">Submit</button> -->
                <input type="submit" class="button" value="Send Message" />
              </div>
            </div>
        </div> <!-- .grid-container -->
    </div> <!-- #contact -->
@endsection