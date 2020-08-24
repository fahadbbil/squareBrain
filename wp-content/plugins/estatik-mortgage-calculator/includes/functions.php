<?php

/**
 * Admin options page with global calculator settings.
 *
 * @return void
 */
function emc_admin_options_page() {

	$path = apply_filters(
		'emc_admin_options_template_path', EMC_PLUGIN_DIR_PATH . '/includes/admin/templates/options.php' );

	if ( file_exists( $path ) ) {

		wp_enqueue_script( 'emc-admin-script', EMC_PLUGIN_DIR_URL . '/admin/js/admin.min.js', array( 'jquery', 'wp-color-picker' ) );
		wp_enqueue_style( 'emc-admin-style', EMC_PLUGIN_DIR_URL . '/admin/css/admin.css', array( 'wp-color-picker' ) );

		include $path;
	}
}

/**
 * Return default settings for mortgage calculator.
 *
 * @return array
 */
function emc_get_default_settings() {

	return apply_filters( 'emc_default_settings', array(

		'currency_position'   => EMC_CURRENCY_POSITION_BEFORE,
		'amortization_period' => EMC_AMORTIZATION_PERIOD_ANNUALLY,
		'popup_type'          => EMC_POPUP_TYPE_GRAPH,

		'default_purchase_price'  => 300000,
		'max_purchase_price'      => 1000000,
		'purchase_price_step'     => 1,
		'default_down_payment'    => 30000,
		'down_payment_step'       => 1,
		'default_property_tax'    => 3000,
		'max_property_tax'   	  => 10000,
		'property_tax_step'       => 1,
		'default_home_insurance'  => 1000,
		'max_home_insurance' 	  => 3000,
		'home_insurance_step'     => 1,
		'default_pmi' 	 	      => 1000,
		'max_pmi' 	 	          => 300000,
		'pmi_step'                => 1,
		'default_interest_rate'   => 3,
		'max_interest_rate'       => 10,
		'interest_rate_step'      => 1,

		// Term Period in years.
		'default_term'    => 5,
		'max_term'        => 20,
		'term_step'       => 1,

		'currency'        => '$',
		'number_format'   => ',.',
		'layout'          => 'vertical',
		'template'        => 'v1',
		'slider_icon'     => 'triangle',
		'container_width' => '',
		'title'           => '',

		'color'                => '#60d401',
		'interest_color'       => '#60d401',
		'home_insurance_color' => '#ff9600',
		'property_tax_color'   => '#ffde00',
		'pmi_color'            => '#25f55b',
		'digits_color'         => '#000',

		'down_payment'        => false,
		'property_tax'        => false,
		'estatik_integration' => true,
		'pmi'                 => false,
		'home_insurance'      => false,
	) );
}

/**
 * @return array
 */
function emc_get_settings_list() {

    return apply_filters( 'emc_settings_list', array(

	    'currency' => array(
		    'tab' => 'general-tab',
            'label' => __( 'Currency', 'emc-plugin' ),
	    ),

	    'currency_position' => array(
            'values' => array(
                EMC_CURRENCY_POSITION_BEFORE => __( 'Before', 'emc-plugin' ),
                EMC_CURRENCY_POSITION_AFTER => __( 'After', 'emc-plugin' ),
            ),
            'tab' => 'general-tab',
            'type' => 'list',
            'label' => __( 'Currency Position', 'emc-plugin' ),
        ),

	    'amortization_period' => array(
            'values' => array(
                EMC_AMORTIZATION_PERIOD_MONTHLY => __( 'Monthly', 'emc-plugin' ),
                EMC_AMORTIZATION_PERIOD_ANNUALLY => __( 'Annually', 'emc-plugin' ),
            ),
            'tab' => 'general-tab',
            'type' => 'list',
            'label' => __( 'Amortization Period', 'emc-plugin' ),
        ),

	    'popup_type' => array(
            'values' => array(
                EMC_POPUP_TYPE_GRAPH => __( 'Graph & Text', 'emc-plugin' ),
                EMC_POPUP_TYPE_TEXT => __( 'Text', 'emc-plugin' ),
            ),
            'tab' => 'general-tab',
            'type' => 'list',
            'label' => __( 'Popup Type', 'emc-plugin' ),
        ),

	    'number_format' => array(
		    'tab' => 'general-tab',
		    'label' => __( 'Number Format', 'emc-plugin' ),
		    'type' => 'list',
		    'values' => emc_get_number_formats(),
	    ),

	    'estatik_integration' => array(
		    'tab' => 'general-tab',
            'type' => 'checkbox',
            'label' => __( 'Estatik Integration', 'emc-plugin' ),
            'data-tooltip' => __( 'Purchase price field will pick up property price if placed as<br> widget on single property page - for <a href="https://wordpress.org/plugins/estatik/" target="_blank">Estatik plugin</a> users only)', 'emc-plugin' ),
        ),

	    'default_purchase_price' => array(
            'tab' => 'display-tab',
            'label' => __( 'Default purchase price', 'emc-plugin' ),
            'type' => 'text',
        ),

	    'max_purchase_price' => array(
		    'tab' => 'display-tab',
		    'label' => __( 'Max purchase price', 'emc-plugin' ),
		    'type' => 'text',
	    ),

	    'purchase_price_step' => array(
		    'tab' => 'display-tab',
		    'label' => __( 'Purchase price step', 'emc-plugin' ),
		    'type' => 'text',
            'placeholder' => 1
	    ),

	    'default_interest_rate' => array(
		    'tab' => 'display-tab',
		    'label' => __( 'Default interest rate', 'emc-plugin' ),
		    'type' => 'text',
	    ),

	    'max_interest_rate' => array(
		    'tab' => 'display-tab',
		    'label' => __( 'Max interest rate', 'emc-plugin' ),
		    'type' => 'text',
	    ),

	    'interest_rate_step' => array(
		    'tab' => 'display-tab',
		    'label' => __( 'Interest rate step', 'emc-plugin' ),
		    'type' => 'text',
		    'placeholder' => 1
	    ),

	    'default_term'  => array(
		    'tab' => 'display-tab',
		    'label' => __( 'Default term (years)', 'emc-plugin' ),
		    'type' => 'text',
	    ),

	    'max_term' => array(
		    'tab' => 'display-tab',
		    'label' => __( 'Max term (years)', 'emc-plugin' ),
		    'type' => 'text',
	    ),

	    'term_step' => array(
		    'tab' => 'display-tab',
		    'label' => __( 'Term step', 'emc-plugin' ),
		    'type' => 'text',
		    'placeholder' => 1
	    ),

	    'color' => array(
		    'tab' => 'style-tab',
		    'label' => __( 'Color', 'emc-plugin' ),
		    'type' => 'color',
	    ),

	    'interest_color' => array(
		    'tab' => 'style-tab',
		    'label' => __( 'Total Result Color', 'emc-plugin' ),
            'type' => 'color',
	    ),

	    'home_insurance_color' => array(
		    'tab' => 'style-tab',
		    'label' => __( 'Home Insurance Color', 'emc-plugin' ),
		    'type' => 'color',
	    ),

	    'property_tax_color' => array(
		    'tab' => 'style-tab',
		    'label' => __( 'Property Tax Color', 'emc-plugin' ),
		    'type' => 'color',
	    ),

	    'pmi_color' => array(
		    'tab' => 'style-tab',
		    'label' => __( 'PMI Color', 'emc-plugin' ),
		    'type' => 'color',
	    ),

        'digits_color' => array(
		    'tab' => 'style-tab',
		    'label' => __( 'Digits Color', 'emc-plugin' ),
		    'type' => 'color',
	    ),

	    'slider_icon' => array(
		    'tab' => 'style-tab',
		    'label' => __( 'Slider Icon', 'emc-plugin' ),
		    'type' => 'radio',
		    'values' => array(
			    'triangle' => '<span class="emc-triangle"></span>',
			    'circle' => '<span class="emc-circle"></span>',
		    ),
	    ),

	    'layout' => array(
		    'tab' => 'style-tab',
		    'label' => __( 'Layout', 'emc-plugin' ),
            'type' => 'list',
            'values' => emc_get_layouts(),
	    ),

//	    'template' => array(
//		    'tab' => 'style-tab',
//		    'label' => __( 'Template', 'emc-plugin' ),
//	    ),

	    'container_width' => array(
		    'tab' => 'style-tab',
		    'label' => __( 'Calculator Width', 'emc-plugin' ),
            'placeholder' => __( '500px or 50%', 'emc-plugin' )
	    ),

	    'down_payment' => array(
		    'tab' => 'display-tab',
		    'label' => __( 'Down Payment', 'emc-plugin' ),
            'type' => 'checkbox',
            'class' => 'js-show-fields',
            'data-class-field' => 'js-down-payment-show',
	    ),

	    'default_down_payment' => array(
		    'tab' => 'display-tab',
		    'label' => __( 'Default down payment', 'emc-plugin' ),
		    'type' => 'text',
		    'wrapper_class' => 'js-down-payment-show',
	    ),

	    'down_payment_step' => array(
		    'tab' => 'display-tab',
		    'label' => __( 'Down payment step', 'emc-plugin' ),
		    'type' => 'text',
		    'wrapper_class' => 'js-down-payment-show',
            'placeholder' => 1,
	    ),

	    'property_tax' => array(
		    'tab' => 'display-tab',
		    'label' => __( 'Property tax', 'emc-plugin' ),
		    'type' => 'checkbox',
		    'class' => 'js-show-fields',
		    'data-class-field' => 'js-property-tax-show',
	    ),

	    'default_property_tax' => array(
		    'tab' => 'display-tab',
		    'label' => __( 'Default property tax', 'emc-plugin' ),
		    'type' => 'text',
		    'wrapper_class' => 'js-property-tax-show',
	    ),

	    'max_property_tax' => array(
		    'tab' => 'display-tab',
		    'label' => __( 'Max property tax', 'emc-plugin' ),
		    'type' => 'text',
		    'wrapper_class' => 'js-property-tax-show',
	    ),

	    'property_tax_step' => array(
		    'tab' => 'display-tab',
		    'label' => __( 'Property tax step', 'emc-plugin' ),
		    'type' => 'text',
		    'wrapper_class' => 'js-property-tax-show',
            'placeholder' => 1
	    ),

	    'pmi' => array(
		    'tab' => 'display-tab',
		    'label' => __( 'PMI', 'emc-plugin' ),
		    'type' => 'checkbox',
		    'class' => 'js-show-fields',
		    'data-class-field' => 'js-pmi-show',
	    ),

	    'default_pmi' => array(
		    'tab' => 'display-tab',
		    'label' => __( 'Default PMI', 'emc-plugin' ),
		    'type' => 'text',
		    'wrapper_class' => 'js-pmi-show',
	    ),

	    'max_pmi' => array(
		    'tab' => 'display-tab',
		    'label' => __( 'Max PMI', 'emc-plugin' ),
		    'type' => 'text',
		    'wrapper_class' => 'js-pmi-show',
	    ),

	    'pmi_step' => array(
		    'tab' => 'display-tab',
		    'label' => __( 'PMI step', 'emc-plugin' ),
		    'type' => 'text',
		    'wrapper_class' => 'js-property-tax-show',
		    'placeholder' => 1
	    ),

	    'home_insurance' => array(
		    'tab' => 'display-tab',
		    'label' => __( 'Home insurance', 'emc-plugin' ),
		    'type' => 'checkbox',
		    'class' => 'js-show-fields',
		    'data-class-field' => 'js-home-insurance-show',
	    ),

	    'default_home_insurance' => array(
		    'tab' => 'display-tab',
		    'label' => __( 'Default home insurance', 'emc-plugin' ),
		    'type' => 'text',
		    'wrapper_class' => 'js-home-insurance-show',
	    ),

	    'max_home_insurance' => array(
		    'tab' => 'display-tab',
		    'label' => __( 'Max home insurance', 'emc-plugin' ),
		    'type' => 'text',
		    'wrapper_class' => 'js-home-insurance-show',
	    ),

	    'home_insurance_step' => array(
		    'tab' => 'display-tab',
		    'label' => __( 'Home insurance step', 'emc-plugin' ),
		    'type' => 'text',
		    'wrapper_class' => 'js-property-tax-show',
		    'placeholder' => 1
	    ),
    ) );
}

/**
 * Return global settings.
 *
 * @return array
 */
function emc_get_global_settings() {

	return apply_filters( 'emc_global_settings', wp_parse_args(
		get_option( 'emc_options', emc_get_default_settings() ),
		emc_get_default_settings()
	) );
}

/**
 * Return calc layouts.
 *
 * @return array
 */
function emc_get_layouts() {

    return apply_filters( 'emc_get_layouts', array(
        'vertical' => __( 'Vertical', 'emc-plugin' ),
        'horizontal' => __( 'Horizontal', 'emc-plugin' ),
    ) );
}

/**
 * Return list of amortization periods.
 *
 * @return array
 */
function emc_get_amortization_period() {

	return apply_filters( 'emc_amortization_period', array(
        EMC_AMORTIZATION_PERIOD_ANNUALLY => __( 'Annually', 'emc-plugin' ),
        EMC_AMORTIZATION_PERIOD_MONTHLY => __( 'Monthly', 'emc-plugin' ),
    ) );
}

/**
 * Return list of number formats.
 *
 * @return array
 */
function emc_get_number_formats() {

	if ( class_exists( 'Es_Settings_Container' ) ) {
		$values = Es_Settings_Container::get_setting_values( 'price_format' );
	} else {
		$values = array( ',.' => '19,999.00', '.,' => '19.999,00', ' ' => '19 999', ',' => '19,999', '.' => '19.999' );
	}

	return apply_filters( 'emc_number_formats', $values );
}

/**
 * Return admin options page tabs.
 *
 * @return array
 */
function emc_get_admin_options_tabs() {

	return apply_filters( 'emc_admin_options_tabs', array(
		'general-tab' => array(
			'label' => __( 'General Settings', 'emc-plugin' ),
		),
		'display-tab' => array(
			'label' => __( 'Display Settings', 'emc-plugin' ),
		),
        'style-tab' => array(
			'label' => __( 'Styles Settings', 'emc-plugin' ),
		),
	) );
}

if ( ! function_exists( 'emc_display_calculator_field' ) ) {

	/**
	 * Display calculator field.
	 *
	 * @param $args
	 *
	 * @return void
	 */
	function emc_display_calculator_field( $args ) {

		$args = apply_filters( 'emc_calculator_field_args', wp_parse_args( $args, array(
			'label' => '',
			'uid' => '',
			'field' => '',
			'info' => '',
			'default_value' => '',
			'max_value' => '',
			'range_class' => 'js-emc-range-slider',
			'field_class' => '',
			'hide' => false,
			'units' => '',
            'step' => 1,
		) ) );

		$uid = $args['uid'];

		if ( $args['hide'] ) return; ?>

        <div class="emc-field emc-field__<?php echo $args['field']; ?>">
            <label class="emc-field__label" for="<?php echo $args['field']; ?>-<?php echo $uid; ?>">
				<?php echo $args['label']; ?>
				<?php if ( ! empty( $args['info'] ) ) : ?>
                    <div class="emc-info">
                        <div class="emc-info__icon"></div>
                        <div class="emc-info__overlay"><?php echo $args['info']; ?></div>
                    </div>
				<?php endif; ?>
            </label>
            <div class="emc-field--content">
                <input type="text" data-slider-target="#<?php echo $args['field']; ?>-slider-<?php echo $uid; ?>" class="<?php echo $args['field_class']; ?>" id="<?php echo $args['field']; ?>-<?php echo $uid; ?>" value="<?php echo $args['default_value']; ?>">
				<?php echo $args['units']; ?>
            </div>
            <label><input type="range"
                          class="<?php echo esc_attr( $args['range_class'] ); ?>"
                          min="0"
                          step="<?php echo $args['step']; ?>"
                          name="<?php echo esc_attr( $args['field'] ); ?>"
                          id="<?php echo esc_attr( $args['field'] ); ?>-slider-<?php echo $uid; ?>"
                          data-field-target="#<?php echo esc_attr( $args['field'] ); ?>-<?php echo $uid; ?>"
                          max="<?php echo esc_attr( $args['max_value'] ); ?>"
                          value="<?php echo esc_attr( $args['default_value'] ); ?>"/>
            </label>
        </div>
		<?php
	}
}
add_action( 'emc_display_calculator_field', 'emc_display_calculator_field', 10, 1 );

/**
 * Display calculate button.
 *
 * @return void
 */
function emc_display_calculator_button() {
    echo "<div class='emc-field emc-field__submit'><a href='#' class='emc-btn js-emc-submit'>" . __( 'Calculate', 'emc-plugin' ) . "</a></div>";
}

add_action( 'emc_display_calculator_button', 'emc_display_calculator_button' );

/**
 * @return void
 */
function emc_save_options() {

    $nonce = 'emc_save_options';

    if ( is_admin() && ! empty( $_POST[ $nonce ] ) && wp_verify_nonce( $_POST[ $nonce ], $nonce ) ) {
        $options = ! empty( $_POST['emc_options'] ) ? $_POST['emc_options'] : array();
        $defined_options = emc_get_global_settings();

        if ( ! empty( $options ) ) {
            foreach ( $options as $option => $value ) {
                $defined_options[ $option ] = $value;
            }

            update_option( 'emc_options', $defined_options );
        }
    }
}
add_action( 'init', 'emc_save_options' );

/**
 * @param $args
 */
function emc_get_popup_content( $args ) {
    include emc_locate_template( 'partials/popup-' . $args['popup_type'] . '.php' );
}

/**
 * @param $template_path
 *
 * @return string
 */
function emc_locate_template( $template_path ) {

	$find = array();
	$context = EMC_PLUGIN_DIR_PATH . 'includes/templates/';
	$base = $template_path;

	$find[] = 'estatik/' . $template_path;
	$find[] = $context . $template_path;

	$template_path = locate_template( array_unique( $find ) );

	if ( ! $template_path ) {
		$template_path = $context . $base;
	}

	return apply_filters( 'es_locate_template', $template_path );
}

/**
 * Return calculator markup.
 *
 * @param array $args
 *
 * @return string
 */
function emc_get_calculator_markup( $args = array() ) {

	$args = wp_parse_args( $args, emc_get_global_settings() );

	if ( is_singular( 'properties' ) && function_exists( 'es_get_property' ) && ! empty( $args['estatik_integration'] ) ) {
	    global $post;
		$property = es_get_property( $post->ID );
		$args['default_purchase_price'] = $property->price ? $property->price : $args['default_purchase_price'];

		if ( $args['max_purchase_price'] < $args['default_purchase_price'] ) {
			$args['max_purchase_price'] = $args['default_purchase_price'];
        }
	}

	$args['uid'] = uniqid();
	$path = emc_locate_template( 'calculator.php' );

	if ( file_exists( $path ) ) {

		$script_path = EMC_PLUGIN_DIR_URL . 'public/js/';
		$css_path    = EMC_PLUGIN_DIR_URL . 'public/css/';

		if ( ! wp_script_is( 'emc-script', 'enqueued' ) ) {
			wp_register_script( 'emc-range-slider', $script_path . 'rangeslider.min.js', array( 'jquery' ) );
			wp_register_script( 'magnific-popup', $script_path . 'jquery.magnific-popup.min.js', array( 'jquery' ) );
			wp_register_script( 'chartist', $script_path . 'chartist.min.js' );
			wp_enqueue_script( 'emc-script', $script_path . 'script.min.js', array( 'magnific-popup', 'jquery', 'emc-range-slider', 'chartist' ) );
			wp_enqueue_style( 'emc-style', $css_path . 'style.min.css' );
			wp_enqueue_style( 'chartist', $css_path . 'chartist.min.css' );
			wp_enqueue_style( 'magnific-popup', $css_path . 'magnific-popup.min.css' );
		}

		ob_start();
		include $path;
		return ob_get_clean();
	}
}
