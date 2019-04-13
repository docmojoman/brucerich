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
                <h2 class="h4-display">Improbable Challenges</h2>
                <p>Enjoying improbable challenges, author and lawyer Bruce Rich has fought for higher environmental and social standards in international finance, and written books on the World Bank as well as on ancient Indian political philosophy, Buddhism and the crises of 21st Century globalization.  He is working on a new book exploring the dilemmas of our interdependent yet fractured world through the lenses of history, travel, and philosophy.&hellip;</p>

                <!-- mobile -->
                <p class="hide-for-medium"><a href="{{ url('about') }}#mobile">More about Bruce</a></p>
                <!-- desktop -->
                <p class="show-for-medium"><a href="{{ url('about') }}">More about Bruce</a></p>
            </div>
            <div class="cell medium-6 index-insights">
                <h2 class="h4-display">Latest Insights</h2>
                {{-- @if($insights->count()) --}}
                @isset($insights)
                <p>{{ str_limit(strip_tags($insights[0]->description), 420) }}</p>
                <!-- mobile -->
                <p class="hide-for-medium"><a href="{{ url('insight', $insights[0]->slug) }}#mobile">Read More</a></p>
                <!-- desktop -->
                <p class="show-for-medium"><a href="{{ url('insight', $insights[0]->slug) }}">Read More</a></p>
                {{-- @endif --}}
                @endisset
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
                    <p class="text-center"><a href="https://www.amazon.com/Uphold-World-Global-Ethic-Ancient/dp/0807006130"><img id="amazon" src="{{ asset('img/buy-button-amazon.png') }}" alt=""></a></p>
                    <p class="text-center"><a href="https://www.amazon.com/Uphold-World-Global-Ethic-Ancient/dp/0807006130">View purchasing options</a></p>
                </div> <!-- .book -->
            </div> <!-- .cell medium-3 -->
            <div class="cell medium-auto">
                <h1 class="h2">To Uphold the World: A Call for a New Global Ethic from Ancient India</h1>
                <h4><a href="{{ url('about') }}">Bruce Rich<br />
                Beacon Press, 2010</a></h4>
                <p>Bruce Rich traveled to Orissa in eastern India and gazed upon the rock edicts erected by the Indian emperor Ashoka over 2,200 years ago. Intrigued by the stone inscriptions that declared religious tolerance, conservation, nonviolence, species protection, and human rights, he was drawn into Ashoka’s world. Ashoka was a powerful conqueror who converted to Buddhism on the heels of a bloody war, yet his empire rested on a political system that prioritized material wealth and amoral realpolitik. This system had been perfected by Kautilya, a statesman and political genius who wrote the world’s first treatise on economics. Both addressed the choice between political realism and idealism, the role of force and violence in international realtions, and the tension between economics and ethics. In this powerful critique of the current wave of globalization, Rich urgently calls for a new global ethic, distilling the messages of Ashoka and Kautilya while reflecting on thinkers across the ages from Aristotle and Adam Smith to George Soros.</p>

                <!-- mobile -->
                <p class="hide-for-medium"><a href="http://brucemrich.com/book/to-uphold-the-world-a-call-for-a-new-global-ethic-from-ancient-india#mobile">Discover more about this book</a></p>
                <!-- desktop -->
                <p class="show-for-medium"><a href="http://brucemrich.com/book/to-uphold-the-world-a-call-for-a-new-global-ethic-from-ancient-india">Discover more about this book</a></p>
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
                    <p>Mortgaging the Earth exposes the systemic record of failed projects and misplaced priorities in the operations of the world's preeminent international development institution, the World Bank.</p>
                    <p><a href="http://brucemrich.com/book/mortgaging-the-earth-the-world-bank-environmental-impoverishment-and-the-crisis-of-development">Discover more about this book</a></p>
                </div> <!-- .book-text -->
            </div> <!-- .cell medium-6 -->
            <div class="cell medium-6 index-book-right">
                <img class="book-sm" src="{{ asset('img/sm-book-02.png') }}" alt="">
                <div class="book-text">
                    <h2 class="h4"><a class="black" href="{{ url('about') }}">Foreclosing the Future</a></h2>
                    <p>Foreclosing the Future reveals the World Bank as a microcosm of global politics, where governments and markets are failing to address the most urgent challenges facing our world.</p>
                    <p><a href="http://brucemrich.com/book/foreclosing-the-future-the-world-bank-and-the-politics-of-environmental-destruction-2-test">Discover more about this book</a></p>
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
