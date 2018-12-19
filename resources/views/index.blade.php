@extends('layouts.public')

@section('content')

    <div id="slideshow">
        <div class="bruce-slides">
          <div class="b-slide"><img src="{{ asset('img/slideshow/a5.png') }}" alt=""></div>
          <div class="b-slide"><img src="{{ asset('img/slideshow/a8.png') }}" alt=""></div>
          <div class="b-slide"><img src="{{ asset('img/slideshow/a18.png') }}" alt=""></div>
          <div class="b-slide"><img src="{{ asset('img/slideshow/b7.png') }}" alt=""></div>
          <div class="b-slide"><img src="{{ asset('img/slideshow/b20.png') }}" alt=""></div>
          <div class="b-slide"><img src="{{ asset('img/slideshow/b48.png') }}" alt=""></div>
          <div class="b-slide"><img src="{{ asset('img/slideshow/c8.png') }}" alt=""></div>
          <div class="b-slide"><img src="{{ asset('img/slideshow/c24.png') }}" alt=""></div>
          <div class="b-slide"><img src="{{ asset('img/slideshow/c68.png') }}" alt=""></div>
          <div class="b-slide"><img src="{{ asset('img/slideshow/d13.png') }}" alt=""></div>
          <div class="b-slide"><img src="{{ asset('img/slideshow/d34.png') }}" alt=""></div>
          <div class="b-slide"><img src="{{ asset('img/slideshow/d49.png') }}" alt=""></div>
          <div class="b-slide"><img src="{{ asset('img/slideshow/d69.png') }}" alt=""></div>
          <div class="b-slide"><img src="{{ asset('img/slideshow/e27.png') }}" alt=""></div>
          <div class="b-slide"><img src="{{ asset('img/slideshow/e45.png') }}" alt=""></div>
          <div class="b-slide"><img src="{{ asset('img/slideshow/e68.png') }}" alt=""></div>
          <div class="b-slide"><img src="{{ asset('img/slideshow/f4.png') }}" alt=""></div>
          <div class="b-slide"><img src="{{ asset('img/slideshow/f20.png') }}" alt=""></div>
          <div class="b-slide"><img src="{{ asset('img/slideshow/f35.png') }}" alt=""></div>
          <div class="b-slide"><img src="{{ asset('img/slideshow/f50.png') }}" alt=""></div>
          <div class="b-slide"><img src="{{ asset('img/slideshow/f60.png') }}" alt=""></div>
        </div> <!-- .bruce-slides -->
    </div> <!-- slideshow -->
    <!-- Subsplash -->
    <div class="grid-container">
        <div class="grid-x margin-top-60">
            <div class="cell medium-6 index-about">
                <h2 class="h4">Improbable Challenges</h2>
                <p>Enjoying improbable challenges, author and lawyer Bruce Rich has fought for higher environmental and social standards in international finance, and written books on the World Bank as well as on ancient Indian political philosophy, Buddhism and the crises of 21st Century globalization.  He is working on a new book exploring the dilemmas of our interdependent yet fractured world through the lenses of history, travel, and philosophy.&hellip;</p>
                <p><a href="{{ url('about') }}">More about Bruce</a></p>
            </div>
            <div class="cell medium-6 index-insights">
                <h2 class="h4">Latest Insights</h2>
                @if($insights->count())
                <p>{{ str_limit(strip_tags($insights[0]['description']), 420) }}</p>
                <p><a href="{{ url('insight', $insights[0]['slug']) }}">Read More</a></p>
                @endif
            </div>
        </div>
        <div class="grid-x grid-margin-x margin-top-60">
            <div class="cell medium-12 text-center">
                <h1 class="uppercase h1-display">Books By Bruce Rich</h1>
                <img src="{{ asset('img/shadow-bkg.png') }}" alt="">
            </div>
        </div>
    </div>
    <!-- Subsplash -->

    <div id="hero">
    <div class="grid-container">
        <div class="grid-x grid-margin-x">
            <div class="cell medium-3">
                <div class="book">
                    <p><img src="{{ asset('img/book.png') }}" alt=""></p>
                    <p class="text-center"><img id="amazon" src="{{ asset('img/buy-button-amazon.png') }}" alt=""></p>
                    <p class="text-center"><a href="{{ url('about') }}">View purchasing options</a></p>
                </div> <!-- .book -->
            </div> <!-- .cell medium-3 -->
            <div class="cell medium-auto">
                <h1 class="h2">To Uphold the World: A Call for a New Global Ethic from Ancient India</h1>
                <h4><a href="{{ url('about') }}">Bruce Rich<br />
                Beacon Press, 2010</a></h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem voluptate libero ratione accusamus nostrum quas, recusandae, praesentium ipsa dolorem minima, necessitatibus? Reiciendis cupiditate maiores in libero excepturi exercitationem laudantium distinctio. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi rem quod enim qui natus dolore distinctio nisi repellat, ut sit hic atque temporibus ipsum, veniam fugiat eaque fuga aspernatur optio! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate quos sunt magnam porro neque harum qui consectetur, optio et cum quas error ut dolore aperiam veritatis eius voluptate asperiores commodi! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et illo necessitatibus labore saepe quasi provident veritatis, soluta est dignissimos molestiae, maiores dicta quidem accusantium facere, iusto doloremque. Assumenda, cumque, possimus.</p>

                <p><a href="http://brucemrich.com/book/to-uphold-the-world-a-call-for-a-new-global-ethic-from-ancient-india">Discover more about this book</a></p>
            </div> <!-- .cell medium-9 -->
        </div> <!-- .grid-x grid-margin-x -->
    </div> <!-- grid-container -->
    </div> <!-- hero -->
    <div id="page">
    <div class="grid-container">
        <div class="grid-x margin-top-60">
            <div class="cell medium-6 index-book">
                <img class="book-sm" src="{{ asset('img/sm-book-01.png') }}" alt="">
                <div class="book-text">
                    <h2 class="h4"><a class="black" href="{{ url('about') }}">Mortgaging The Earth</a></h2>
                    <p>Lorem ipsum dolor sit amet, how the <strong>World Bank's</strong>  adipisicing elit <strong>Environmental Impovershment</strong>. Dignissimos quo ipsam aperiam velit ad.</p>
                    <p><a href="http://brucemrich.com/book/mortgaging-the-earth-the-world-bank-environmental-impoverishment-and-the-crisis-of-development">Discover more about this book</a></p>
                </div> <!-- .book-text -->
            </div> <!-- .cell medium-6 -->
            <div class="cell medium-6 index-book-right">
                <img class="book-sm" src="{{ asset('img/sm-book-02.png') }}" alt="">
                <div class="book-text">
                    <h2 class="h4"><a class="black" href="{{ url('about') }}">Foreclosing the Future</a></h2>
                    <p>How the <strong>World Bank's</strong> Lorem ipsum dolor sit amet, <strong>environmental destruction</strong> adipisicing elit. Dignissimos quo ipsam aperiam velit ad.</p>
                    <p><a href="http://brucemrich.com/book/foreclosing-the-future-the-world-bank-and-the-politics-of-environmental-destruction">Discover more about this book</a></p>
                </div> <!-- .book-text -->
            </div> <!-- .cell medium-6 -->
        </div> <!-- .grid-x grid-margin-x -->
    </div> <!-- grid-container -->
    </div> <!-- page -->
@endsection
@push('slide-show')
      $('.bruce-slides').slick({
        dots: false,
        infinite: true,
        autoplay: true,
        autoplaySpeed: 4000,
        slidesToShow: 3,
        slidesToScroll: 2,
        variableWidth: true
      });
@endpush
