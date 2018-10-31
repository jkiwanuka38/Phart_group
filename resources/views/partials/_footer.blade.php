<footer class="footer_area">
    <div class="container">
        <div class="footer_row row">
            <div class="col-md-4 col-sm-6 footer_about">
                <h2>ABOUT OUR COMPANY</h2>
                <img src="{{logo(setting('site.logo'))}}" alt="">
                <p>
                    PHART GROUP LIMITED established in July 2017 by its founder (Mutebi Cranimmer) who had a vision to create a leading company
                    and believed hard and dedication to work would make this a reality and a legacy for the feature generations of professionals,
                    today it’s a success story built on credible values and ambitions for greatness.
                </p>
                {{menu('topBar', 'partials.menus._footerSocial')}}
            </div>
            <div class="col-md-4 col-sm-6 footer_about quick">
                <h2>Quick links</h2>
                {{menu('footerQuickLinks', 'partials.menus._footerQuickLinks')}}
            </div>
            <div class="col-md-4 col-sm-6 footer_about">
                <h2>CONTACT US</h2>
                <address>
                    <p>Have questions, comments or just want to say hello:</p>
                    <ul class="my_address">
                        <li><a href="mailto:phartgroup5@gmail.com"><i class="fa fa-envelope" aria-hidden="true"></i>phartgroup5@gmail.com</a></li>
                        <li><a href="#"><i class="fa fa-phone" aria-hidden="true"></i>+256 (751) 088880, +256 (776) 088880</a></li>
                        <li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i>Plot 86 Acacia Avenue</a></li>
                    </ul>
                </address>
            </div>
        </div>
    </div>
    <div class="copyright_area">
        Copyright <?php echo date('Y'); ?> All rights reserved. Designed by <a href="https://colorlib.com">Kiwanuka Philip.</a>
    </div>
</footer>
