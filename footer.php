<div class="footer">
    <section id="contact-us" <?php if($selectUrl == "index.php") { ?> class="iq-full-contact footer-bg" <?php } ?>>
        <?php if($selectUrl == "index.php") { ?>
        <div class="container">
            <div class="row iq-ptb-80">
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="iq-fancy-box-04">
                        <div class="iq-icon white-bg">
                            <i aria-hidden="true" class="ion-ios-location-outline"></i>
                        </div>
                        <div class="fancy-content">
                            <h5 class="">Address</h5>
                            <span class="lead">3rd Floor,<br />153 & 155 South West Boag Road, <br/>T Nagar, Chennai - 600017</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="iq-fancy-box-04">
                        <div class="iq-icon white-bg">
                            <i aria-hidden="true" class="ion-ios-telephone-outline"></i>
                        </div>
                        <div class="fancy-content">
                            <h5 class="">Phone</h5>
                            <span class="lead">044-48587080</span>
                            <p class="iq-mb-0">Mon - Fri : 10am - 6pm</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="iq-fancy-box-04">
                        <div class="iq-icon white-bg">
                            <i aria-hidden="true" class="ion-ios-email-outline"></i>
                        </div>
                        <div class="fancy-content">
                            <h5 class="">Mail</h5>
                            <a href="mailto:hello@vartanex.com" style="color: #fff;"><span class="lead">hello@vartanex.com</span></a>
                            <p class="iq-mb-0">24 X 7 online support</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
        <footer class="<?php if($selectUrl == "index.php") { ?>iq-ptb-20<?php } ?> copyright-bg" <?php if($selectUrl != "index.php") { ?>style="margin-bottom: 0;"<?php } ?>>
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="footer-copyright iq-pt-10">Copyright &copy; <?php echo date("Y"); ?> VartanEx. All Rights Reserved </div>
                </div>
                <div class="col-sm-4" style="text-align:center">
                <div class="footer-copyright iq-pt-10"><a href="#" style="color:#fff; margin-right:10px; text-decoration:underline">Terms and Conditions</a> &nbsp;&nbsp;&nbsp; <a href="privacy-policy.php" style="color:#fff; text-decoration:underline">Privacy Policy</a></div>
                </div>
                <div class="col-sm-3">
                    <ul class="info-share">
                        <li><a href="https://twitter.com/VartanEx" target="_blank"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="https://www.facebook.com/VartanEx-391853091270123/" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        <!--<li><a href="#"><i class="fa fa-google"></i></a></li>
                        <li><a href="#"><i class="fa fa-github"></i></a></li>-->
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    </section>
    <!-- full-contact END -->
    <!-- Footer -->
    <!--  END -->
</div>
<!-- back-to-top -->
<div id="back-to-top">
    <a class="top" id="top" href="#top"> <i class="ion-ios-upload-outline"></i> </a>
</div>
<!-- back-to-top End -->
<!-- jQuery -->
<!-- owl-carousel -->
<!-- Counter -->
<script type="text/javascript" src="js/counter/jquery.countTo.js"></script>
<script type="text/javascript" src="js/jquery.immersive-slider.js"></script>
<!-- Jquery Appear -->
<script type="text/javascript" src="js/jquery.appear.js"></script>
<!-- Magnific Popup --> 
<script type="text/javascript" src="js/magnific-popup/jquery.magnific-popup.min.js"></script>
<!-- Retina -->
<script type="text/javascript" src="js/retina.min.js"></script>
<!-- Skrollr --> 
<script type="text/javascript" src="js/skrollr.min.js"></script>
<!-- wow -->
<script type="text/javascript" src="js/wow.min.js"></script>
<!-- Countdown -->
<script type="text/javascript" src="js/jquery.countdown.min.js"></script>
<!-- REVOLUTION JS FILES -->
<script type="text/javascript" src="revolution/js/jquery.themepunch.tools.min.js"></script>
<script type="text/javascript" src="revolution/js/jquery.themepunch.revolution.min.js"></script>
<!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
<script type="text/javascript" src="revolution/js/extensions/revolution.extension.actions.min.js"></script>
<script type="text/javascript" src="revolution/js/extensions/revolution.extension.carousel.min.js"></script>
<script type="text/javascript" src="revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
<script type="text/javascript" src="revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script type="text/javascript" src="revolution/js/extensions/revolution.extension.migration.min.js"></script>
<script type="text/javascript" src="revolution/js/extensions/revolution.extension.navigation.min.js"></script>
<script type="text/javascript" src="revolution/js/extensions/revolution.extension.parallax.min.js"></script>
<script type="text/javascript" src="revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
<script type="text/javascript" src="revolution/js/extensions/revolution.extension.video.min.js"></script>
<script type="text/javascript" src="js/jquery.validate.js"></script>
    <script type="text/javascript" src="js/additional-methods.js"></script>
<!-- bootstrap -->
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<!-- Style Customizer --> 
<!-- Custom -->
<script type="text/javascript" src="js/custom.js"></script>
<script type="text/javascript">
var revapi22,
tpj=jQuery;
tpj(document).ready(function() {
    if(tpj("#rev_slider_22_1").revolution == undefined){
        revslider_showDoubleJqueryError("#rev_slider_22_1");
    }else{
        revapi22 = tpj("#rev_slider_22_1").show().revolution({
        sliderType:"standard",
        jsFileLocation:"//localhost/revslider-standalone/revslider/public/assets/js/",
        sliderLayout:"fullwidth",
        dottedOverlay:"none",
        delay:9000,
        navigation: {
          onHoverStop:"off",
        },
        visibilityLevels:[1240,1024,778,480],
        gridwidth:1400,
        gridheight:790,
        lazyType:"none",
        parallax: {
          type:"mouse",
          origo:"enterpoint",
          speed:400,
          levels:[1,2,3,4,5,6,7,8,9,10,47,48,49,50,51,55],
        },
        shadow:0,
        spinner:"spinner0",
        stopLoop:"off",
        stopAfterLoops:-1,
        stopAtSlide:-1,
        shuffle:"off",
        autoHeight:"off",
        disableProgressBar:"on",
        hideThumbsOnMobile:"off",
        hideSliderAtLimit:0,
        hideCaptionAtLimit:0,
        hideAllCaptionAtLilmit:0,
        debugMode:false,
        fallbacks: {
          simplifyAll:"off",
          nextSlideOnWindowFocus:"off",
          disableFocusListener:false,
        }
      });
    }
}); /*ready*/
</script>
<script type="text/javascript">
$(document).ready( function() {
    $("#immersive_slider").immersive_slider({
        container: ".main"
    });
});
</script>

<script type="text/javascript" src="http://getbootstrap.com/2.0.4/assets/js/bootstrap-dropdown.js" /> </script>
<script type="text/javascript">
    $(function(){
    $(".dropdown").hover(            
            function() {
                $('.dropdown-menu', this).stop( true, true ).fadeIn("fast");
                $(this).toggleClass('open');
                $('b', this).toggleClass("caret caret-up");                
            },
            function() {
                $('.dropdown-menu', this).stop( true, true ).fadeOut("fast");
                $(this).toggleClass('open');
                $('b', this).toggleClass("caret caret-up");                
            });
    });
    
 </script>
 
<script src="js/jquery.easyResponsiveTabs.js"></script>
  <script type="text/javascript">
    $(document).ready(function () {

        $('#parentHorizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion
            width: 'auto', //auto or any width like 600px
            fit: true, // 100% fit in a container
            closed: 'accordion', // Start closed if in accordion view
            tabidentify: 'hor_1', // The tab groups identifier
            activate: function (event) { // Callback function if tab is switched
                var $tab = $(this);
                var $info = $('#nested-tabInfo');
                var $name = $('span', $info);

                $name.text($tab.text());

                $info.show();
            }
        });
         });
</script>
 
 
 
 
 
 
 
 
 
 </body>
</html>