<?php

/**
 * @var $args array
 */

$uid = $args['uid'];

$json_args = esc_attr( htmlspecialchars( json_encode( $args ), ENT_QUOTES | JSON_HEX_QUOT | JSON_HEX_TAG, 'UTF-8' ) ); ?>

<style>
    <?php if ( ! empty( $args['container_width'] ) ) : ?>
    #emc-calculator-<?php echo $uid; ?> {
        width: <?php echo $args['container_width']; ?>
    }
    <?php endif; ?>

    #emc-calculator-<?php echo $uid; ?> .rangeslider__fill {
        background: <?php echo $args['color']; ?>
    }

    #emc-calculator-<?php echo $uid; ?>:not(.emc-calculator--circle)  .rangeslider__handle {
        _border-color: #000000 #000000 <?php echo $args['color']; ?> #000000;
        border-color: transparent transparent <?php echo $args['color']; ?> transparent;
    }

    #emc-calculator-<?php echo $uid; ?>.emc-calculator--circle  .rangeslider__handle {
        background: <?php echo $args['color']; ?>
    }

    #emc-calculator-<?php echo $uid; ?> .emc-btn {
        border: 1px solid <?php echo $args['color']; ?>;
        color: <?php echo $args['color']; ?>;
    }

    #emc-calculator-<?php echo $uid; ?> .emc-info__icon:hover {
        background-image: url(<?php echo EMC_PLUGIN_DIR_URL; ?>public/images/info.php?color=<?php echo urlencode( $args['color'] ); ?>);
    }

    #emc-calculator-<?php echo $uid; ?> .emc-btn:hover {
        background: <?php echo $args['color']; ?>;
        color: #fff;
    }

    #emc-calculator-popup-<?php echo $uid; ?> .ct-series-d .ct-slice-donut {
        stroke: <?php echo $args['interest_color']; ?>
    }

    #emc-calculator-popup-<?php echo $uid; ?> .ct-series-b .ct-slice-donut {
        stroke: <?php echo $args['home_insurance_color']; ?>
    }

    #emc-calculator-popup-<?php echo $uid; ?> .ct-series-c .ct-slice-donut {
        stroke: <?php echo $args['property_tax_color']; ?>
    }

    #emc-calculator-popup-<?php echo $uid; ?> .ct-series-e .ct-slice-donut {
        stroke: <?php echo $args['pmi_color']; ?>
    }

    #emc-calculator-popup-<?php echo $uid; ?> .emc-popup-graph-wrap .emc-popup-info__field--interest {
        border-left: 3px solid <?php echo $args['interest_color']; ?>;
    }

    #emc-calculator-popup-<?php echo $uid; ?> .emc-popup-graph-wrap .emc-popup-info__field--home_insurance {
        border-left: 3px solid <?php echo $args['home_insurance_color']; ?>;
    }

    #emc-calculator-popup-<?php echo $uid; ?> .emc-popup-graph-wrap .emc-popup-info__field--property_tax {
        border-left: 3px solid <?php echo $args['property_tax_color']; ?>;
    }

    #emc-calculator-<?php echo $uid; ?> .emc-field input {
        color: <?php echo $args['digits_color']; ?>;
    }

    #emc-calculator-popup-<?php echo $uid; ?> .emc-popup-graph-wrap .emc-popup-info__field--pmi {
        border-left: 3px solid <?php echo $args['pmi_color']; ?>;
    }

    #emc-calculator-popup-<?php echo $uid; ?> .emc-popup-text-wrap .emc-result-total {
        color: <?php echo $args['color']; ?>;
    }
</style>

<div class="emc-calculator emc-calculator--<?php echo $args['template']; ?> emc-calculator--<?php echo $args['layout']; ?> emc-calculator--<?php echo $args['slider_icon']; ?>" id="emc-calculator-<?php echo $uid; ?>">
    <form method="post" class="js-emc-calculator" data-args='<?php echo $json_args; ?>'>

		<?php do_action( 'emc_display_calculator_field', array(
			'label' => __( 'Purchase price', 'emc-plugin' ),
			'range_class' => 'js-emc-range-slider js-emc-purchase-price-field js-emc-down-payment-percentage-calc',
			'field_class' => 'js-emc-price',
			'default_value' => $args['default_purchase_price'],
			'max_value' => $args['max_purchase_price'],
			'uid' => $uid,
			'step' => $args['purchase_price_step'],
			'field' => 'purchase_price',
			'info' => __( 'Please enter here the amount you expect to pay for a home.', 'emc-plugin' ),
		) ); ?>

		<?php do_action( 'emc_display_calculator_field', array(
			'label' => __( 'Down payment', 'emc-plugin' ),
			'range_class' => 'js-emc-range-slider js-emc-down-payment-field js-emc-down-payment-percentage-calc',
			'field_class' => 'js-emc-price',
			'default_value' => $args['default_down_payment'],
			'max_value' => $args['max_purchase_price'],
			'uid' => $uid,
			'field' => 'down_payment',
			'step' => $args['down_payment_step'],
			'hide' => empty( $args['down_payment'] ),
			'units' => '<span class="emc-units emc-percentage js-emc-down-payment-percentage"></span>',
			'info' => __( 'Down payment is cash that you pay upfront for your home.', 'emc-plugin' ),
		) ); ?>

		<?php do_action( 'emc_display_calculator_field', array(
			'label' => __( 'Term in years', 'emc-plugin' ),
			'default_value' => $args['default_term'],
			'max_value' => $args['max_term'],
			'field_class' => 'js-emc-field',
			'step' => $args['term_step'],
			'uid' => $uid,
			'field' => 'term_years',
			'units' => '<span class="emc-units">' . __( 'year(s)', 'emc-plugin' ) . '</span>',
			'info' => __( 'Number of years you have to pay.', 'emc-plugin' ),
		) ); ?>

		<?php do_action( 'emc_display_calculator_field', array(
			'label' => __( 'Interest rate (per year)', 'emc-plugin' ),
			'field_class' => 'js-emc-percentage js-emc-field',
			'default_value' => $args['default_interest_rate'],
			'max_value' => $args['max_interest_rate'],
			'uid' => $uid,
			'step' => $args['interest_rate_step'],
			'field' => 'interest_rate',
			'info' => __( 'The percentage of interest that you will pay on your mortgage for a specific term.', 'emc-plugin' ),
		) ); ?>

		<?php do_action( 'emc_display_calculator_field', array(
			'label' => __( 'Property Tax', 'emc-plugin' ),
			'field_class' => 'js-emc-price',
			'default_value' => $args['default_property_tax'],
			'max_value' => $args['max_property_tax'],
			'uid' => $uid,
			'step' => $args['property_tax_step'],
			'field' => 'property_tax',
			'hide' => empty( $args['property_tax'] ),
			'units' => '<span class="emc-units">' . __( 'per year', 'emc-plugin' ) . '</span>',
			'info' => __( 'Enter your property tax here if you know it.', 'emc-plugin' ),
		) ); ?>

		<?php do_action( 'emc_display_calculator_field', array(
			'label' => __( 'Home Insurance', 'emc-plugin' ),
			'field_class' => 'js-emc-price',
			'default_value' => $args['default_home_insurance'],
			'max_value' => $args['max_home_insurance'],
			'uid' => $uid,
			'step' => $args['home_insurance_step'],
			'hide' => empty( $args['home_insurance'] ),
			'field' => 'home_insurance',
			'units' => '<span class="emc-units">' . __( 'per year', 'emc-plugin' ) . '</span>',
			'info' => __( 'Most lenders require home insurance. Enter its price here.', 'emc-plugin' ),
		) ); ?>

		<?php do_action( 'emc_display_calculator_field', array(
			'label' => __( 'PMI', 'emc-plugin' ),
			'field_class' => 'js-emc-price',
			'default_value' => $args['default_pmi'],
			'max_value' => $args['max_pmi'],
			'uid' => $uid,
			'step' => $args['pmi_step'],
			'field' => 'pmi',
			'hide' => empty( $args['pmi'] ),
			'info' => __( 'PMI is Private Mortgage Insurance which is usually required to pay if your Down payment less than 20%.', 'emc-plugin' ),
		) ); ?>

		<?php do_action( 'emc_display_calculator_button', $args ); ?>
    </form>
</div>

<div id="emc-calculator-popup-<?php echo $uid; ?>" class="emc-calculator-popup mfp-hide emc-popup--<?php echo $args['popup_type']; ?>">
	<?php emc_get_popup_content( $args ); ?>
</div>
