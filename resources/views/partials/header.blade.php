    <div id="header-container">
    <div class="grid-container">
        <div id="header" class="grid-x  grid-margin-x">
            <div id="logo-cell" class="cell medium-3">
                <a href="{{url('./')}}"><img id="logo" src="{{ asset('img/brucerich_logo.svg') }}" alt="Bruce Rich Logo"></a>
            </div> <!-- #header -->
            <div class="cell medium-auto">
                <div class="grid-x">
                    <div id="nav-top" class="cell show-for-medium">
                        <a href="https://www.facebook.com/brucerich" target="_blank"><img src="{{ asset('img/facebook.png') }}" alt="facebook.com"></a>
                        <a href="https://www.linkedin.com/in/bruce-rich-3ba56b15" target="_blank"><img src="{{ asset('img/linkedin.png') }}" alt="linkedin.com"></a>
                    </div> <!-- #nav-top -->
                    <div class="cell" id="nav">
                        <ul class="vertical medium-horizontal menu" data-responsive-menu="accordion medium-dropdown">
                            @empty($home)
                            <li><a class="home-menu-title" href="{{url('./')}}">Home</a></li>
                            @endempty
                            <li>
                            <a id="menu-about" href="{{ url('about') }}" class="menu-title">About</a>
                                <ul class="vertical menu align-left hide-for-medium">
                                    <li><a href="{{ url('/about#about') }}">About The Author</a></li>
                                    <li><a href="{{ url('/interviews') }}">Interviews</a></li>
                                    <li><a href="{{ url('/video#about') }}">Video</a></li>
                                </ul> <!-- .vertical .menu .align-left -->
                                <ul class="vertical menu align-left show-for-medium">
                                    <li><a href="{{ url('/about') }}">About The Author</a></li>
                                    <li><a href="{{ url('/interviews') }}">Interviews</a></li>
                                    <li><a href="{{ url('/video') }}">Video</a></li>
                                </ul> <!-- .vertical .menu .align-left -->
                            </li>
                            <li>
                            <a id="menu-books" href="{{ url('/books') }}" class="menu-title">Books</a>
                                <ul class="vertical menu align-left wide hide-for-medium">
                                    @foreach($books as $book)
                                    <li><a href="{{ url('/book', $book->slug) . '#mobile' }}">{{ $book->menu_title }}</a></li>
                                    @endforeach
                                </ul> <!-- .vertical .menu .align-left .wide -->
                                <ul class="vertical menu align-left wide show-for-medium">
                                    @foreach($books as $book)
                                    <li><a href="{{ url('/book', $book->slug) }}">{{ $book->menu_title }}</a></li>
                                    @endforeach
                                </ul> <!-- .vertical .menu .align-left .wide -->
                            </li>
                            <li>
                            <a id="menu-articles" href="{{ url('/articles') }}" class="menu-title">Articles</a>
                                <ul class="vertical menu align-left wide hide-for-medium">
                                    @foreach($articlegroups as $articlegroup)
                                    <li><a href="{{ url('/articles', $articlegroup->id) . '#mobile' }}">{{ $articlegroup->title }}</a></li>
                                    @endforeach
                                    <li><a href="{{ url('/articles#articles') }}">View All</a></li>
                                </ul> <!-- .vertical .menu .align-left .wide -->
                                <ul class="vertical menu align-left wide show-for-medium">
                                    @foreach($articlegroups as $articlegroup)
                                    <li><a href="{{ url('/articles', $articlegroup->id) }}">{{ $articlegroup->title }}</a></li>
                                    @endforeach
                                </ul> <!-- .vertical .menu .align-left .wide -->
                            </li>
                            <li>
                                <a href="{{ url('/insights#mobile') }}" class="menu-title hide-for-medium">Insights</a>
                                <a href="{{ url('/insights') }}" class="menu-title show-for-medium">Insights</a>
                            </li>
                            <li>
                                <a href="{{ url('/search#mobile') }}" class="menu-title hide-for-medium">Search</a>
                                <a href="{{ url('/search') }}" class="menu-title show-for-medium">Search</a>
                            </li>
                            <li>
                                <a href="{{ url('/contact#mobile') }}" class="menu-title hide-for-medium">Contact</a>
                                <a href="{{ url('/contact') }}" class="menu-title show-for-medium">Contact</a>
                            </li>
                        </ul> <!-- .vertical .medium-horizontal .menu .align-right -->
                    </div> <!-- #nav -->
                </div> <!-- .grid-x -->
            </div> <!-- .cell .medium-9 -->
        </div> <!-- #header -->
    </div> <!-- grid-container -->
    </div> <!-- header-container -->
    <a name="mobile"></a>
