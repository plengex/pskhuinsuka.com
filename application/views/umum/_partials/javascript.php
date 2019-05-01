<!-- jquery -->
    <script src="<?= base_url("assets/umum/") ?>js/jquery-2.2.3.min.js"></script>
    <!-- //jquery -->
	 <!-- css dan js files -->
	<link href="<?= base_url("assets/umum/") ?>css/aos.css" rel='stylesheet prefetch' type="text/css" media="all" />
	<link href="<?= base_url("assets/umum/") ?>css/aos-animation.css" rel='stylesheet prefetch' type="text/css" media="all" />
	<script src="<?= base_url("assets/umum/") ?>js/aos.js"></script>
	<script src="<?= base_url("assets/umum/") ?>js/aosindex.js"></script>
	<!-- //css dan js files -->
    <!-- flexSlider -->
    <script defer src="<?= base_url("assets/umum/") ?>js/jquery.flexslider.js"></script>
    <script>
        $(window).load(function() {
            $('.flexslider').flexslider({
                animation: "slide",
                start: function(slider) {
                    $('body').removeClass('loading');
                }
            });
        });
    </script>
    <!-- //flexSlider -->

    <!-- start-smoth-scrolling -->
    <script src="<?= base_url("assets/umum/") ?>js/move-top.js"></script>
    <script src="<?= base_url("assets/umum/") ?>js/easing.js"></script>
    <script>
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event) {
                event.preventDefault();
                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 900);
            });
        });
    </script>
    <!-- //start-smoth-scrolling -->

    <script>
        $(document).ready(function() {
            $().UItoTop({
                easingType: 'easeOutQuart'
            });

        });
    </script>

    <!-- js -->
    <script src="<?= base_url("assets/umum/") ?>js/bootstrap.js"></script>
    <!-- //js -->