<?php

/*
** Theme Options Menu Create on wp dashboard
*/
function theme_options_menu() {
	add_menu_page(
		__( 'Theme Options', 'squarebrain' ),
		__( 'Theme Options', 'squarebrain' ),
		'manage_options',
		'theme-options',
		'my_admin_page_contents',
		'dashicons-schedule',
		3
	);
	add_action( 'admin_enqueue_scripts', 'theme_options_include_script' );
}

add_action( 'admin_menu', 'theme_options_menu' );

/*
** Callback function of content of theme option
*/
function my_admin_page_contents() {
	wp_enqueue_script('jquery');
	wp_enqueue_media( array( '' ) );
	require_once "theme_options.php";
}

function theme_options_include_script() {

	// I recommend to add additional conditions just to not to load the scipts on each page

	if ( ! did_action( 'wp_enqueue_media' ) ) {
		wp_enqueue_media();
	}

    wp_enqueue_style('themeOptionBSCSS','https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');
    wp_enqueue_style('themeOptionCSS',get_template_directory_uri().'/assets/css/themeoptions.css');
    wp_enqueue_script( 'bootsrapJS', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array( 'jquery' ) );
}

/*Ajax Call For Gene Settings*/
function updateThemeOptionsGeneral(){
//	 echo "<pre>";print_r($_POST);echo "</pre>";

	set_theme_mod( 'squarebrain_phone_settings', $_POST['squarebrain_phone_settings'] );
	set_theme_mod( 'squarebrain_email_settings', $_POST['squarebrain_email_settings'] );
	set_theme_mod( 'squarebrain_footer_logo_settings', $_POST['squarebrain_footer_logo_settings'] );
	echo $success = 200;
	wp_die();
}
add_action( 'wp_ajax_updateThemeOptionsGeneral', 'updateThemeOptionsGeneral' );
add_action( 'wp_ajax_nopriv_updateThemeOptionsGeneral', 'updateThemeOptionsGeneral' );

/*Ajax Call For Feature Lists*/
function updateThemeOptionsFeatures(){
//	 echo "<pre>";print_r($_POST);echo "</pre>";
    $button_title = $_POST['button_title'];
    $button_link = $_POST['button_link'];
    $feature_img = $_POST['feature_img'];

    $squarebrain_features_settings = array();

    foreach ($button_title as $key => $value) {
        $squarebrain_features_settings[]=array(
                'title' =>$button_title[$key],
                'link' =>$button_link[$key],
                'image_url' =>$feature_img[$key]
        );
    }
//    echo "<pre>";print_r($squarebrain_features_settings);echo "</pre>";

   $squarebrain_features_settings = json_encode($squarebrain_features_settings);
	set_theme_mod( 'squarebrain_features_settings', $squarebrain_features_settings );
	echo $success = 200;
	wp_die();
}
add_action( 'wp_ajax_updateThemeOptionsFeatures', 'updateThemeOptionsFeatures' );
add_action( 'wp_ajax_nopriv_updateThemeOptionsFeatures', 'updateThemeOptionsFeatures' );