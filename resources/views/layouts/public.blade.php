<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-139926116-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-139926116-1');
    </script>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>BRUCE RICH | AUTHOR | ENVIRONMENTAL LAWYER @yield('title') | expert on public international finance and the environment | Nonprofits &amp; Activism</title>

    <!-- Styles -->
    <style>
      .scrollToTop {
        display: none;
      }
    </style>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
@include('partials.header')
    @if (session('status'))
    <div class="grid-container">
        <div class="callout success" data-closable="fade-out">
            <p class="h3 text-center">{{ session('status') }}</p>
            <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
    @endif
    @if ($errors->any())
      <div class="grid-container">
        <div class="callout alert" data-closable="fade-out">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
      </div>
    @endif

    @yield('content')

@include('partials.footer')
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @stack('script-link')
    <script>
        $(document).foundation();

        @stack('slide-show')

      $('div.alert-message').delay(3000).fadeOut(350);

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
