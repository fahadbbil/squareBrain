<?php
/**
 * SquareBrain Theme Customizer
 *
 * @package SquareBrain
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
// require_once 'repeater_customizer.php';
function squarebrain_customize_register( $wp_customize ) {
	//Theme Options Panel
	$wp_customize->add_panel('squarebrain_theme_options',array(
		'title' => __('Theme Options','squarebrain'),
		'priority' => 30
	));

	//General Sections
	$wp_customize->add_section('squarebrain_general_section',array(
		'title' => __('General','squarebrain'),
		'panel' => 'squarebrain_theme_options',
	));

	//Phone Data
	$wp_customize->add_setting('squarebrain_phone_setting',array(
		'transport' => 'postMessage'
	));
	
	$wp_customize->add_control('squarebrain_phone_ctrl',array(
		'label' => __('Phone','squarebrain'),
		'section' => 'squarebrain_general_section',
		'settings' => 'squarebrain_phone_setting',
		'type'=> 'text'
	));

	//Email Data
	$wp_customize->add_setting('squarebrain_email_setting',array(
		'transport' => 'postMessage'
	));


	$wp_customize->add_control('squarebrain_email_ctrl',array(
		'label' => __('Email','squarebrain'),
		'section' => 'squarebrain_general_section',
		'settings' => 'squarebrain_email_setting',
		'type'=> 'text'
	));
	
	//Footer Logo 
	$wp_customize->add_setting('squarebrain_footer_logo_setting',array(
		'transport' => 'postMessage'
	));

	//Footer Logo Under General
	$wp_customize->add_control( new WP_Customize_Upload_Control($wp_customize,'squarebrain_footer_logo_ctrl',array(
		'label' => __('Upload logo for footer','squarebrain'),
		'section' => 'squarebrain_general_section',
		'settings' => 'squarebrain_footer_logo_setting',
	)));

}
add_action( 'customize_register', 'squarebrain_customize_register' );

