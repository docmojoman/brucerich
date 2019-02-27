    <div id="footer-container">
    <div class="grid-container">
        <div id="footer" class="grid-x  grid-margin-x">
            <div id="footer-logo-cell" class="cell medium-3">
                <a href="./"><img id="logo" src="{{ asset('img/brucerich_logo.svg') }}" alt="Bruce Rich Logo"></a>
            </div> <!-- #footer-logo-cell -->
            <div class="cell medium-1">
                <ul id="footer-menu" class="hide-for-medium">
                    <li><a href="{{ url('about#about') }}">About</a></li>
                    <li><a href="{{ url('books#mobile') }}">Books</a></li>
                    <li><a href="{{ url('articles#mobile') }}">Articles</a></li>
                    <li><a href="{{ url('insights#mobile') }}">Insights</a></li>
                    <li><a href="{{ url('contact#mobile') }}">Contact</a></li>
                </ul>
                <ul id="footer-menu" class="show-for-medium">
                    <li><a href="{{ url('about') }}">About</a></li>
                    <li><a href="{{ url('books') }}">Books</a></li>
                    <li><a href="{{ url('articles') }}">Articles</a></li>
                    <li><a href="{{ url('insights') }}">Insights</a></li>
                    <li><a href="{{ url('contact') }}">Contact</a></li>
                </ul>
            </div> <!-- .cell .medium-1 -->
            <div class="cell medium-3">
                <p class="text-center show-for-medium">Connect</p>
                <p class="text-center margin-top-15 hide-for-medium">Connect</p>
                <p class="social-footer text-center">
                    <a href="https://www.facebook.com/brucerich" target="_blank"><img src="{{ asset('img/facebook.png') }}" alt="facebook.com"></a>
                    <a href="https://www.linkedin.com/in/bruce-rich-3ba56b15" target="_blank"><img src="{{ asset('img/linkedin.png') }}" alt="linkedin.com"></a></p>
                <p class="small text-center show-for-medium">&copy; 2018-<script type="text/javascript">
<!--
var currentTime = new Date()
var year = (currentTime.getFullYear() + '').substring(2,4)
document.write(year)
//-->
</script> Bruce Rich | All Rights Reserved</p>
            </div> <!-- .cell medium-3 -->
            <div class="cell medium-auto">
                <p class="text-center"><img class="mail-icon show-for-medium" src="{{ asset('img/mail-icon.png') }}" alt=""></p>
                <p class="text-center margin-bottom-30 show-for-medium">Sign-up For News And Alerts</p>
                    <!-- mobile -->
                    <p class="text-center"><img class="mail-icon margin-top-20 hide-for-medium" src="{{ asset('img/mail-icon.png') }}" alt=""></p>
                    <p class="text-center margin-bottom-10 hide-for-medium">Sign-up For News And Alerts</p>
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
                <p class="small text-center hide-for-medium">&copy; 2018-<script type="text/javascript">
<!--
var currentTime = new Date()
var year = (currentTime.getFullYear() + '').substring(2,4)
document.write(year)
//-->
</script> Bruce Rich | All Rights Reserved</p>
            </div> <!-- .cell .medium-5 -->
        </div> <!-- #footer -->
    </div> <!-- .grid-container -->
    </div> <!-- footer-container -->
    <!-- sticky scroll to top  -->
    <a href="#" class="scrollToTop">&nbsp;</a>
