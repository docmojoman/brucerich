@extends('layouts.public')

@section('content')

    <div id="slideshow">
        <div class="bruce-slides">
          <div><img src="{{ asset('img/slideshow/pic1.png') }}" alt=""></div>
          <div><img src="{{ asset('img/slideshow/pic2.jpg') }}" alt=""></div>
          <div><img src="{{ asset('img/slideshow/pic1.png') }}" alt=""></div>
          <div><img src="{{ asset('img/slideshow/pic2.jpg') }}" alt=""></div>
          <div><img src="{{ asset('img/slideshow/pic1.png') }}" alt=""></div>
          <div><img src="{{ asset('img/slideshow/pic2.jpg') }}" alt=""></div>
          <div><img src="{{ asset('img/slideshow/pic1.png') }}" alt=""></div>
          <div><img src="{{ asset('img/slideshow/pic2.jpg') }}" alt=""></div>
          <div><img src="{{ asset('img/slideshow/pic1.png') }}" alt=""></div>
          <div><img src="{{ asset('img/slideshow/pic2.jpg') }}" alt=""></div>
          <div><img src="{{ asset('img/slideshow/pic1.png') }}" alt=""></div>
          <div><img src="{{ asset('img/slideshow/pic2.jpg') }}" alt=""></div>
        </div> <!-- .bruce-slides -->
    </div> <!-- slideshow -->
    <!-- Subsplash -->
    <div class="grid-container">
        <div class="grid-x margin-top-60">
            <div class="cell medium-6 padding-right-35 border-right">
                <h2 class="h4">Improbable Challenges</h2>
                <p>Enjoying improbable challenges, author and lawyer Bruce Rich has fought for higher environmental and social standards in international finance, and written books on the World Bank as well as on ancient Indian political philosophy, Buddhism and the crises of 21st Century globalization.  He is working on a new book exploring the dilemmas of our interdependent yet fractured world through the lenses of history, travel, and philosophy.&hellip; <a href="about.html">More about Bruce</a></p>
            </div>
            <div class="cell medium-6 padding-right-5 padding-left-35">
                <h2 class="h4">Latest Insights</h2>
                @if($insights->count())
                <p>{{ strip_tags($insights[0]['description']) }}</p>
                <a href="{{ url('insight', $insights[0]['id']) }}">Read More</a></p>
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
                    <p class="text-center"><a href="book.html">View purchasing options</a></p>
                </div> <!-- .book -->
            </div> <!-- .cell medium-3 -->
            <div class="cell medium-auto">
                <h1 class="h2">To Uphold the World: A Call for a New Global Ethic from Ancient India</h1>
                <h4><a href="book.html">Bruce Rich<br />
                Beacon Press, 2010</a></h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem voluptate libero ratione accusamus nostrum quas, recusandae, praesentium ipsa dolorem minima, necessitatibus? Reiciendis cupiditate maiores in libero excepturi exercitationem laudantium distinctio. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi rem quod enim qui natus dolore distinctio nisi repellat, ut sit hic atque temporibus ipsum, veniam fugiat eaque fuga aspernatur optio! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate quos sunt magnam porro neque harum qui consectetur, optio et cum quas error ut dolore aperiam veritatis eius voluptate asperiores commodi! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et illo necessitatibus labore saepe quasi provident veritatis, soluta est dignissimos molestiae, maiores dicta quidem accusantium facere, iusto doloremque. Assumenda, cumque, possimus.</p>

                <p><a href="book.html">Discover more about this book</a></p>
            </div> <!-- .cell medium-9 -->
        </div> <!-- .grid-x grid-margin-x -->
    </div> <!-- grid-container -->
    </div> <!-- hero -->
    <div id="page">
    <div class="grid-container">
        <div class="grid-x margin-top-60">
            <div class="cell medium-6 padding-right-35 border-right">
                <img class="book-sm" src="{{ asset('img/sm-book-01.png') }}" alt="">
                <div class="book-text">
                    <h2 class="h4"><a class="black" href="book.html">Mortgaging The Earth</a></h2>
                    <p>Lorem ipsum dolor sit amet, how the <strong>World Bank's</strong>  adipisicing elit <strong>Environmental Impovershment</strong>. Dignissimos quo ipsam aperiam velit ad.</p>
                </div> <!-- .book-text -->
            </div> <!-- .cell medium-6 -->
            <div class="cell medium-6 padding-right-5 padding-left-35">
                <img class="book-sm" src="{{ asset('img/sm-book-02.png') }}" alt="">
                <div class="book-text">
                    <h2 class="h4"><a class="black" href="book.html">Foreclosing the Future</a></h2>
                    <p>How the <strong>World Bank's</strong> Lorem ipsum dolor sit amet, <strong>environmental destruction</strong> adipisicing elit. Dignissimos quo ipsam aperiam velit ad.</p>
                </div> <!-- .book-text -->
            </div> <!-- .cell medium-6 -->
        </div> <!-- .grid-x grid-margin-x -->
        <div class="grid-x grid-margin-x margin-top-60">
            <div class="cell medium-12">
                <!-- <p class="text-center"><img src="{{ asset('img/shadow-bkg.png') }}" alt=""></p> -->
                <!-- <p class="text-center margin-top-60">
                    <a href=""><img class="social-icons" src="{{ asset('img/buy_book_button-amazib.png') }}" alt=""></a>
                    <a href=""><img class="social-icons" src="{{ asset('img/buy_book_button-bn.png') }}" alt=""></a>
                    <a href=""><img class="social-icons" src="{{ asset('img/buy_book_button-800ceo.png') }}" alt=""></a>
                </p> -->
            </div> <!-- .cell medium-12 -->
        </div> <!-- .grid-x grid-margin-x margin-top-60 -->
    </div> <!-- grid-container -->
    </div> <!-- page -->
@endsection
