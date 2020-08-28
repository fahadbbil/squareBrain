<?php
/**
 * SquareBrain functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package SquareBrain
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'squarebrain_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function squarebrain_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on SquareBrain, use a find and replace
		 * to change 'squarebrain' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'squarebrain', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menu( 'Primary', __('Main Menu','squarebrain') );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'squarebrain_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
		
		function add_class_nav_item($classes, $item){
			$classes[] = 'nav-item';
			return $classes;
		}
		add_filter( 'nav_menu_css_class', 'add_class_nav_item', 10, 2 );

		function add_class_to_all_menu_anchors( $atts ) {
		    $atts['class'] = 'nav-link';
		    return $atts;
		}
		add_filter( 'nav_menu_link_attributes', 'add_class_to_all_menu_anchors');
	}
endif;
add_action( 'after_setup_theme', 'squarebrain_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function squarebrain_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'squarebrain_content_width', 640 );
}
add_action( 'after_setup_theme', 'squarebrain_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function squarebrain_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'squarebrain' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'squarebrain' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'squarebrain_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function squarebrain_scripts() {
	wp_enqueue_style( 'squarebrain-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'squarebrain-style', 'rtl', 'replace' );

	wp_enqueue_style( 'theme-font-awesome', 'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );
	wp_enqueue_style( 'theme-bootstrap', get_template_directory_uri() . '/assets/css/lite-bootstrap.min.css' );

	/**
	* Enqueue Scripts and Styles on condition
	*/
	if (is_home()) {
		wp_enqueue_style( 'home-style', get_template_directory_uri() . '/assets/css/home.css' );
		wp_enqueue_script('jquery');
	} elseif (is_page('resources')) {
		wp_enqueue_style( 'resource-style', get_template_directory_uri() . '/assets/css/resource.css' );
		
	} elseif (is_page('products')) {
		wp_enqueue_style( 'product-style', get_template_directory_uri() . '/assets/css/product.css' );
		
	} elseif (is_page('about')) {
		wp_enqueue_style( 'about-style', get_template_directory_uri() . '/assets/css/about.css' );
		
	} else {
		wp_enqueue_style( 'home-style', get_template_directory_uri() . '/assets/css/home.css' );
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'squarebrain_scripts' );

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/*
** Wocommerce cart icon count on add to cart
*/
add_filter( 'woocommerce_add_to_cart_fragments', 'wc_refresh_mini_cart_count');
function wc_refresh_mini_cart_count($fragments){
    ob_start();
    ?>
    <span id="mini-cart-count">
        <?php
        	if (WC()->cart->get_cart_contents_count() > 0) {
    			/*echo WC()->cart->get_cart_contents_count();*/
                echo "<span class='cart-count'>".WC()->cart->get_cart_contents_count()."</span>";
    		}
        ?>
    </span>
    <?php
        $fragments['#mini-cart-count'] = ob_get_clean();
    return $fragments;
}

/*
** Theme Options Ajax
*/
require 'inc/func_theme_options.php';


function page_bg(){
    $image = '';
    if (is_front_page()){
        $image = get_template_directory_uri().'/assets/images/bg.png';
    } elseif (is_woocommerce() || is_checkout() || is_cart()){
        $image = get_template_directory_uri().'/assets/images/product-bg.png';

    } elseif (is_page('resources')) {
        $image = get_template_directory_uri().'/assets/images/resources/additional-bg.png';

    } elseif (is_page('about')) {
        $image = get_template_directory_uri().'/assets/images/bg.png';

    } elseif (is_page('products')) {
        $image = get_template_directory_uri().'/assets/images/product-bg.png';
    }
    else {
        $image = get_template_directory_uri().'/assets/images/bg.png';

    }
    return $image;
}

/*Meta Box Create For About Page Template*/
require 'inc/func_about_meta.php';

/*
 * Woocommerce css and js dequeue where not woocommerce
 */

function dequeueWocoomerceSquareBrain() {

    // Check if WooCommerce plugin is active
    if( function_exists( 'is_woocommerce' ) ){

        // Check if it's any of WooCommerce page
        if(! is_woocommerce() && ! is_cart() && ! is_checkout() && !is_page('products') ) {

            ## Dequeue WooCommerce styles
            wp_dequeue_style('woocommerce-layout');
            wp_dequeue_style('woocommerce-general');
            wp_dequeue_style('woocommerce-smallscreen');

            ## Dequeue WooCommerce scripts
            wp_dequeue_script('wc-cart-fragments');
            wp_dequeue_script('woocommerce');
            wp_dequeue_script('wc-add-to-cart');

            wp_deregister_script( 'js-cookie' );
            wp_dequeue_script( 'js-cookie' );

        }
    }
}
add_action( 'wp_enqueue_scripts', 'dequeueWocoomerceSquareBrain' );

/*
 * Custom Post Type Functions
 * */

    require 'inc/custom_post_type.php';

/*Ajax Call For Slider Form*/
function sliderFormSubmit(){
//    echo "<pre>";print_r($_POST);echo "</pre>";exit();
    // To send HTML mail, the Content-type header must be set
    $headers = array();
    $headers[] = 'MIME-Version: 1.0';
    $headers[] = 'Content-type: text/html; charset=iso-8859-1';
    $message = "";
    $message .= "<table>";
    $message .= "<tr>Name: ";
    $message .= "</tr>";
    $message .= "<tr>".$_POST['newsletterName'];
    $message .= "</tr>";
    $message .= "<tr>Email: ";
    $message .= "</tr>";
    $message .= "<tr>".$_POST['newsletterEmail'];
    $message .= "</tr>";
    $message .= "</table>";
    if(mail(get_option('admin_email'), "New Submission", $message, $headers)){
      echo $success = 200;
    }
	wp_die();
}
add_action( 'wp_ajax_sliderFormSubmit', 'sliderFormSubmit' );
add_action( 'wp_ajax_nopriv_sliderFormSubmit', 'sliderFormSubmit' );

/**
 * Adds a meta box to the post editing screen
 */
function prfx_featured_meta() {
    add_meta_box( 'prfx_meta', __( 'Featured Posts', 'prfx-textdomain' ), 'prfx_meta_callback', 'post', 'side', 'high' );
}
add_action( 'add_meta_boxes', 'prfx_featured_meta' );

/**
 * Outputs the content of the meta box
 */

function prfx_meta_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'prfx_nonce' );
    $prfx_stored_meta = get_post_meta( $post->ID );
    ?>

 <p>
    <span class="prfx-row-title"><?php _e( 'Check if this is a featured post: ', 'prfx-textdomain' )?></span>
    <div class="prfx-row-content">
        <label for="featured-checkbox">
            <input type="checkbox" name="featured-checkbox" id="featured-checkbox" value="yes" <?php if ( isset ( $prfx_stored_meta['featured-checkbox'] ) ) checked( $prfx_stored_meta['featured-checkbox'][0], 'yes' ); ?> />
            <?php _e( 'Featured Item', 'prfx-textdomain' )?>
        </label>

    </div>
</p>

    <?php
}

/**
 * Saves the custom meta input
 */
function prfx_meta_save( $post_id ) {

    // Checks save status - overcome autosave, etc.
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'prfx_nonce' ] ) && wp_verify_nonce( $_POST[ 'prfx_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }

// Checks for input and saves - save checked as yes and unchecked at no
if( isset( $_POST[ 'featured-checkbox' ] ) ) {
    update_post_meta( $post_id, 'featured-checkbox', 'yes' );
} else {
    update_post_meta( $post_id, 'featured-checkbox', 'no' );
}

}
add_action( 'save_post', 'prfx_meta_save' );
