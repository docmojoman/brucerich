<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
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
        <div class="callout success" data-closable="slide-out-right fade-out">
            <p class="h3 text-center">{{ session('status') }}</p>
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
    <script>
        $(document).foundation();

      $('.bruce-slides').slick({
        dots: false,
        infinite: true,
        autoplay: true,
        autoplaySpeed: 4000,
        slidesToShow: 3,
        slidesToScroll: 2,
        variableWidth: true
      });

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

    });

    </script>
</body>
</html>
