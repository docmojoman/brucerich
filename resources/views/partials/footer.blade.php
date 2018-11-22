    <div id="footer-container">
    <div class="grid-container">
        <div id="footer" class="grid-x  grid-margin-x">
            <div id="footer-logo-cell" class="cell medium-3">
                <a href="./"><img id="logo" src="{{ asset('img/brucerich_logo.svg') }}" alt="Bruce Rich Logo"></a>
            </div> <!-- #footer-logo-cell -->
            <div class="cell medium-1">
                <ul id="footer-menu">
                    <li><a href="about">About</a></li>
                    <li><a href="books">Books</a></li>
                    <li><a href="articles">Articles</a></li>
                    <li><a href="insights">Insights</a></li>
                    <li><a href="contact">Contact</a></li>
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
    <a href="#" class="scrollToTop">&nbsp;</a>
