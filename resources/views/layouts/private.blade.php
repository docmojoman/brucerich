<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} {{ app()->version() }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @stack('script-header')
</head>
<body>
    @if (Auth::check())
    <div id="admin-menu">
    <div class="grid-container">
      <div class="grid-x grid-margin-x align-right">
        <div class="cell small-9">
          <h1 id="admin-logo" class="h5"><a href="/admin/dashboard" class="uppercase">{{ config('app.name', 'Laravel') }}</a></h1>
        </div>
        <div class="cell small-3">
          <ul class="dropdown menu" data-dropdown-menu>
            <li>
              <a href="#">Hello {{ Auth::user()->username }}</a>
              <ul class="menu">
                <li>
                  <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                  </form>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>
    </div> <!-- #admin-menu -->
    @endif
    {{-- Alerts --}}
    @if (session('status'))
    <div class="grid-container">
        <div class="callout success" data-closable="slide-out-right fade-out">
            <p class="h3 text-center">{{ session('status') }}</p>
            <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
    @endif

    @yield('content')

    <div class="grid-x grid-margin-x margin-top-80 margin-bottom-40">
      <div class="cell small-12 text-center">
        <h6>{{ config('app.name', 'Laravel') }} <small>Version {{ app()->version() }}</small></h6>
      </div>
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @stack('script-link')
    <script>
    $(document).foundation();

        // scrollToTop
        $(document).ready(function(){

        //Check to see if the window is top if not then display button
        $(window).scroll(function(){
          if ($(this).scrollTop() > 100) {
            $('.scrollToTop').fadeIn();
          } else {
            $('.scrollToTop').fadeOut();
          }
        });

        //Click event to scroll to top
        $('.scrollToTop').click(function(){
          $('html, body').animate({scrollTop : 0},300);
          return false;
        });

        @stack('scripts')

    });
    </script>
</body>
</html>