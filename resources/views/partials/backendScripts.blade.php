    <script src="{{ asset('js/app.js') }}"></script>
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

    });
    </script>
