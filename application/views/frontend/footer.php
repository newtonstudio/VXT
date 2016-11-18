<footer>
            <div class="footer">
                <div class="f-contact">
                    <h3>CONTACT US</h3>
                    <ul>
                        <li>Office Tel: +886 7 821 7676<br>Fax: +886 7</li>
                        <li>Online Hotline :<br>Call/Text us (+886 ) 956768698</li>
                        <li>Phone lines open Mon - Fri:<br>10am to 6pm GMT +8 </li>
                    </ul>
                </div>
                <div class="f-mailto">
                    <h3>MAIL TO</h3>
                    <ul>
                        <li>Business Enquiries: <span>santini.suit@gmail.com</span></li>
                        <li>Online Orders: <span>santini.suit@gmail.com</span></li>
                    </ul>
                </div>
                <div class="f-pay">
                    <h3>PAYMENT &amp; SECURITY</h3>
                </div>
                <div class="f-follow">
                    <h3>FOLLOW US /</h3>
                    <ul>
                        <li><a href="https://www.facebook.com/santini.suit/" target="_blank">+ FACEBOOK</a></li>
                        <li><a href="https://www.instagram.com/santini_suit/" target="_blank">+ INSTAGRAM</a></li>
                    </ul>
                </div>
                <p class="copyright">
                    <span>COPYRIGHT</span>&copy; 2016 SANTINI.SUIT CO.LTD. ALL RIGHTS RESERVED.
                </p>
            </div>
        </footer>
            <nav id="menu">
                <ul>
                    <li><a href="<?=base_url($init['langu'])?>">HOME</a></li>
                    <li><a href="<?=base_url($init['langu'])?>">NEWS</a></li>
                    <li><a href="<?=base_url($init['langu'].'/shop')?>">SHOP</a></li>
                    <li><a href="<?=base_url($init['langu'].'/services')?>">SERVICES</a></li>
                    <li><a href="<?=base_url($init['langu'].'/event_list')?>">EVENT</a></li>
                    <li><a href="<?=base_url($init['langu'].'/contact')?>">CONTACT</a></li>
                </ul>
            </nav>
        </div>
        <script>
        var langu = '<?=$init['langu']?>';
        </script>
        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script>window.jQuery || document.write('<script src="<?=base_url('assets/santini/js/vendor/jquery-1.12.0.min.js')?>"><\/script>')</script>
        <script type="text/javascript" src="<?=base_url('assets/santini/js/jquery.mmenu.all.min.js')?>"></script>
        <script type="text/javascript">
            $(function() {
                $('nav#menu').mmenu();
            });
        </script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="<?=base_url('assets/santini/js/plugins.js')?>"></script>
        <script src="<?=base_url('assets/santini/js/main.js')?>"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
    </body>
</html>