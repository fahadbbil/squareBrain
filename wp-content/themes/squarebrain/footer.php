<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package SquareBrain
 */

?>
	</div>
	<footer id="colophon" class="footer site-footer">
	    <div class="container">
	        <div class="row">
	            <div class="col-md-6">
	                <div class="footer-widget">
	                	<img class="footer-logo" alt="SquareBrain Logo" src="<?php echo get_theme_mod( 'squarebrain_footer_logo_setting', get_template_directory_uri().'/assets/images/logo-black.png');?>">
	                </div>
	            </div>
	        </div>

            <div class="row">
	            <div class="col-md-12">
	                <div class="footer_copyright">
	                	<p style="color: #c7c7c7; font-weight: 500; letter-spacing: 1px"><?php echo get_theme_mod( 'squarebrain_copyright_setting', '© Copyright '.date('Y').' Company Name. All rights reserved.' ); ?></p>
	                </div>
	            </div>
	        </div>
	    </div>
	</footer>

<?php
	if (!is_woocommerce() && ! is_cart() && ! is_checkout() && !is_page('products') ) {

?>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/main.min.js"></script> 
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/home.min.js"></script> 
<?php 
	}
?>
<script>
    /*(function ($){
        $(function () {
            $('[data-toggle="tooltip"]').tooltip();
        })
    })(jQuery);*/

    (function ($){
        $(document).on('click', "#search-toggle", function(){
            $('#search-area').toggle();
            $('#search-area input[type=text]').focus();
        });

        $(document).on('change', "#mini-cart-count", function(){
            alert("ok");
        });


    })(jQuery);
</script>

<?php wp_footer(); ?>
</body>
</html>