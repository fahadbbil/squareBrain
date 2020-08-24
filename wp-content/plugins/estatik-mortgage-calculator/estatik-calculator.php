<?php

/**
 * Plugin Name:   Estatik Calculator Widget
 * Plugin URI:    http://estatik.net
 * Version:       2.0.4
 * Description:   A simple mortgage calculator widget
 * Author:        Estatik
 * Author URI:    https://estatik.net
 * Text Domain:   emc-plugin
 * License:       GPL2
 * License URI:   http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:   /languages
 */

define( 'EMC_PLUGIN_DIR_PATH', plugin_dir_path( __FILE__ ) );
define( 'EMC_PLUGIN_DIR_URL', plugin_dir_url( __FILE__ ) );
define( 'EMC_CURRENCY_POSITION_BEFORE', 'before' );
define( 'EMC_CURRENCY_POSITION_AFTER', 'after' );
define( 'EMC_AMORTIZATION_PERIOD_ANNUALLY', 'annually' );
define( 'EMC_AMORTIZATION_PERIOD_MONTHLY', 'monthly' );
define( 'EMC_POPUP_TYPE_GRAPH', 'graph' );
define( 'EMC_POPUP_TYPE_TEXT', 'text' );

require_once 'includes/functions.php';
require_once 'includes/admin/class-setting-field.php';
require_once 'includes/admin/class-mortgage-calculator-widget.php';

/**
 * Load plugin textdomain.
 *
 * @return void
 */
function emc_load_text_domain() {

	load_plugin_textdomain(
		'emc-plugin', false, basename( dirname( __FILE__ ) ) . '/languages'
	);
}
add_action( 'plugins_loaded', 'emc_load_text_domain' );

/**
 * Add options link in admin menu.
 *
 * @return void
 */
function emc_admin_options_menu() {

	add_options_page(
		__( 'Estatik Mortgage Calculator', 'emc-plugin' ),
		__( 'Estatik Mortgage Calculator', 'emc-plugin' ),
		'manage_options',
		'emc_options',
		'emc_admin_options_page'
	);
}
add_action( 'admin_menu', 'emc_admin_options_menu' );

add_shortcode( 'es_mortgage_calculator', 'emc_get_calculator_markup' );

/**
 * Activation hook.
 *
 * @return void
 */
function emc_activation_hook() {

	$old_options = get_option( 'estatik_calculator_settings' );
	$is_migrated = get_option( 'estatik_calculator_settings_migrated' );

	if ( $old_options && ! $is_migrated ) {
		$defined_options = emc_get_global_settings();

		if ( ! empty( $old_options ) && is_array( $old_options ) ) {

			foreach ( $old_options as $option => $value ) {
				$value = $value == 'on' ? 1 : $value;
				$value = $value == 'off' ? 0 : $value;
				$option = $option == 'select_popup' ? 'popup_type' : $option;
				$defined_options[ $option ] = $value;
			}

			$defined_options['number_format'] = ',.';

			update_option( 'emc_options', $defined_options );
		}

		update_option( 'estatik_calculator_settings_migrated', 1 );
	}
}
register_activation_hook( __FILE__, 'emc_activation_hook' );
