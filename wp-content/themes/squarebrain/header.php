<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package SquareBrain
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title();  ?></title>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<meta name="title" content="<?php wp_title(); ?>"/>
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <meta name="image:Background" content="<?php echo get_template_directory_uri(); ?>/assets/images/banner.jpg">
    <meta property="og:title" content="<?php wp_title() ?>">
    <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/assets/images/banner.jpg">
    <meta property="og:description" content="<?php bloginfo('description'); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'squarebrain' ); ?></a>
	<div style="background-image: url('<?php echo page_bg();?>')" class="bg-wrapper">
		<header id="masthead" class="site-header">
	        <nav class="navbar navbar-expand-lg navbar-default" style="padding-right: 0; padding-left: 0">
	            <div class="container pr">
	                <a class="navbar-brand" href="<?php echo site_url(); ?>">
	                    <img alt="SquareBrain Logo" src="<?php echo get_theme_mod( 'squarebrain_header_logo_setting', get_template_directory_uri().'/assets/images/logo.png' );?>">
	                </a>
	                <div class="nav-btn">
	                    <a title="Send Email" href="mailto:<?php echo get_theme_mod( 'squarebrain_email_setting', 'test@test.com' ); ?>"> <img alt="icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-1.png"></a>
	                    
	                    <a title="Call now" href="tel:<?php echo get_theme_mod( 'squarebrain_phone_setting', '123456789' ); ?>"> <img alt="icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-2.png"></a>
	                    <a title="Search..." href="javascript: void(0)" id="search-toggle"> <img alt="icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-3.png"></a>
	                    <a title="Your Cart Items" href="<?php echo wc_get_cart_url(); ?>"> <img alt="icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-4.png">
	                    	<span id="mini-cart-count">
	                    		<?php 
		                    		if (WC()->cart->get_cart_contents_count() != 0) {
		                    			echo "<span class='cart-count'>".WC()->cart->get_cart_contents_count()."</span>";
		                    		}
	                    		?>
	                    	</span>
	                    </a>
	                    <button class="navbar-toggler" type="button">
	                        <span class="fa fa-bars"></span>
	                    </button>
	                </div>
                    <div class="search-block" id="search-area">
                        <form class="navbar-form" action="<?php echo home_url( '/' );?> " method="get" role="search" id="searchform">
                            <div class="form-group">
                                <input type="text" name="s" id="s" class="form-control" placeholder="Search" value="<?php echo get_search_query();?>">
                            </div>
                            <button type="submit" class="btn bg-black button-fix"><i class="fa fa-search color-white"></i>
                            </button>
                        </form>
                    </div>
	                <div class="collapse navbar-collapse"  id="squarebrain_nav">
	                	<?php 
	                		wp_nav_menu( array( 
										'theme_location'=>'Primary',
										'menu_class'=>'navbar-nav home-nav  mr-auto',
	                		) );
	                	?>
	                    
	                </div>

	            </div>
	        </nav>
	    </header>
