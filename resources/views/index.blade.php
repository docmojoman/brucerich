@extends('layouts.public')

@section('content')

    <div id="header-container">
    <div class="grid-container">
        <div id="header" class="grid-x  grid-margin-x">
            <div id="logo-cell" class="cell medium-3">
                <a href="./"><img id="logo" src="{{ asset('img/brucerich_logo.svg') }}" alt="Bruce Rich Logo"></a>
            </div> <!-- #header -->
            <div class="cell medium-auto">
                <div class="grid-x">
                    <div id="nav-top" class="cell show-for-medium">
                        <a href="https://www.facebook.com/brucerich" target="_blank"><img src="{{ asset('img/facebook.png') }}" alt="facebook.com"></a>
                        <a href="https://www.linkedin.com/in/bruce-rich-3ba56b15" target="_blank"><img src="{{ asset('img/linkedin.png') }}" alt="linkedin.com"></a>
                    </div> <!-- #nav-top -->
                    <div class="cell" id="nav">
                        <ul class="vertical medium-horizontal menu" data-responsive-menu="accordion medium-dropdown">
                            <li>
                            <a id="menu-about" href="about.html" class="menu-title">About</a>
                                <ul class="vertical menu align-left hide-for-medium">
                                    <li><a href="about.html#about">About The Author</a></li>
                                    <li><a href="media.html#about">Media</a></li>
                                </ul> <!-- .vertical .menu .align-left -->
                                <ul class="vertical menu align-left show-for-medium">
                                    <li><a href="about.html">About The Author</a></li>
                                    <li><a href="media.html">Media</a></li>
                                </ul> <!-- .vertical .menu .align-left -->
                            </li>
                            <li>
                            <a id="menu-books" href="books.html" class="menu-title">Books</a>
                                <ul class="vertical menu align-left wide hide-for-medium">
                                    <li><a href="book.html#book">Mortgaging The Earth</a></li>
                                    <li><a href="book.html#book">Foreclosing The Future</a></li>
                                    <li><a href="book.html#book">To Uphold The World</a></li>
                                    <li><a href="book.html#book">Ashoka In Our Time</a></li>
                                    <li><a href="books.html#books">View All</a></li>
                                </ul> <!-- .vertical .menu .align-left .wide -->
                                <ul class="vertical menu align-left wide show-for-medium">
                                    <li><a href="book.html">Mortgaging The Earth</a></li>
                                    <li><a href="book.html">Foreclosing The Future</a></li>
                                    <li><a href="book.html">To Uphold The World</a></li>
                                    <li><a href="book.html">Ashoka In Our Time</a></li>
                                </ul> <!-- .vertical .menu .align-left .wide -->
                            </li>
                            <li>
                            <a id="menu-articles" href="articles.html" class="menu-title">Articles</a>
                                <ul class="vertical menu align-left wide hide-for-medium">
                                    <li><a href="article.html#article">Economic Forum: The Developing World</a></li>
                                    <li><a href="article.html#article">Environmental Forum: Cover Stories</a></li>
                                    <li><a href="article.html#article">Law Review Articles And Comments</a></li>
                                    <li><a href="article.html#article">Congressional Testimony</a></li>
                                    <li><a href="article.html#article">Development Finance, Environment And Institutions</a></li>
                                    <li><a href="article.html#article">Ashoka, Buddhism And Globalization</a></li>
                                    <li><a href="article.html#article">Topical Articles And Reviews</a></li>
                                    <li><a href="articles.html#articles">View All</a></li>
                                </ul> <!-- .vertical .menu .align-left .wide -->
                                <ul class="vertical menu align-left wide show-for-medium">
                                    <li><a href="article.html">Economic Forum: The Developing World</a></li>
                                    <li><a href="article.html">Environmental Forum: Cover Stories</a></li>
                                    <li><a href="article.html">Law Review Articles And Comments</a></li>
                                    <li><a href="article.html">Congressional Testimony</a></li>
                                    <li><a href="article.html">Development Finance, Environment And Institutions</a></li>
                                    <li><a href="article.html">Ashoka, Buddhism And Globalization</a></li>
                                    <li><a href="article.html">Topical Articles And Reviews</a></li>
                                </ul> <!-- .vertical .menu .align-left .wide -->
                            </li>
                            <li>
                                <a href="insights.html#insights"class="menu-title hide-for-medium">Insights</a>
                                <a href="insights.html"class="menu-title show-for-medium">Insights</a>
                            </li>
                            <li>
                                <a href="contact.html#contact"class="menu-title hide-for-medium">Contact</a>
                                <a href="contact.html"class="menu-title show-for-medium">Contact</a>
                            </li>
                        </ul> <!-- .vertical .medium-horizontal .menu .align-right -->
                    </div> <!-- #nav -->
                </div> <!-- .grid-x -->
            </div> <!-- .cell .medium-9 -->
        </div> <!-- #header -->
    </div> <!-- grid-container -->
    </div> <!-- header-container -->
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
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit eos quod nisi error dignissimos ut vel voluptas dolorem saepe, corporis quis magni autem repudiandae architecto maxime ipsa quasi. Pariatur, laudantium. Consectetur adipisicing elit. Velit eos quod nisi error dignissimos ut vel voluptas dolorem saepe, corporis quis magni autem repudiandae architecto maxime ipsa quasi&hellip; <a href="insights.html">Read More</a></p>
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


    <div id="footer-container">
    <div class="grid-container">
        <div id="footer" class="grid-x  grid-margin-x">
            <div id="footer-logo-cell" class="cell medium-3">
                <a href="./"><img id="logo" src="{{ asset('img/brucerich_logo.svg') }}" alt="Bruce Rich Logo"></a>
            </div> <!-- #footer-logo-cell -->
            <div class="cell medium-1">
                <ul id="footer-menu">
                    <li><a href="about.html">About</a></li>
                    <li><a href="books.html">Books</a></li>
                    <li><a href="articles.html">Articles</a></li>
                    <li><a href="insights.html">Insights</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </div> <!-- .cell .medium-1 -->
            <div class="cell medium-3">
                <p class="text-center">Connect</p>
                <p class="social-footer text-center">
                    <a href="https://www.facebook.com/brucerich" target="_blank"><img src="{{ asset('img/facebook.png') }}" alt="facebook.com"></a>
                    <a href="https://www.linkedin.com/in/bruce-rich-3ba56b15" target="_blank"><img src="{{ asset('img/linkedin.png') }}" alt="linkedin.com"></a></p>
                <p class="small text-center show-for-medium">&copy; 2018 Bruce Rich | All Rights Reserved</p>
            </div> <!-- .cell medium-3 -->
            <div class="cell medium-auto">
                <p class="text-center"><img class="mail-icon" src="{{ asset('img/mail-icon.png') }}" alt=""></p>
                <p class="text-center margin-bottom-30">Sign-up For News And Alerts</p>
                    <!-- mobile -->
                    <span id="subscribe" class="hide-for-medium">
                        <form action="">
                            <input type="email" name="email" placeholder="email"><input type="submit" value=">">
                        </form>
                    </span>
                    <!-- desktop -->
                    <span id="subscribe" class="show-for-medium">
                        <form action="">
                            <input type="email" name="email" placeholder="Enter your email"><input type="submit" value=">">
                        </form>
                    </span>
                <p class="small text-center hide-for-medium">&copy; 2018 Bruce Rich | All Rights Reserved</p>
            </div> <!-- .cell .medium-5 -->
        </div> <!-- #footer -->
    </div> <!-- .grid-container -->
    </div> <!-- footer-container -->
    <!-- sticky scroll to top  -->
    <a href="#" class="scrollToTop" style="display: block;">&nbsp;</a>

@endsection
