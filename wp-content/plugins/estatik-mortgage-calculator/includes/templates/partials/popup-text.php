<div class="emc-popup-text-wrap">
	<div class="emc-popup-text__left">
		<h4><?php _e( 'Your total monthly payment', 'emc-plugin' ); ?></h4>
		<span class="js-result-total emc-result-total"></span>

		<div class="emc-delimiter"></div>

		<div class="emc-popup-info__field emc-popup-info__field--interest">
			<div class="emc-popup-info__field-label"><?php _e( 'Principal & Interest', 'emc-plugin' ); ?>: </div>
			<div class="emc-popup-info__field-value js-result-interest"></div>
		</div>

		<?php if ( ! empty( $args['home_insurance'] ) ) : ?>
			<div class="emc-popup-info__field emc-popup-info__field--home_insurance">
				<div class="emc-popup-info__field-label"><?php _e( 'Home insurance', 'emc-plugin' ); ?>: </div>
				<div class="emc-popup-info__field-value js-result-home-insurance"></div>
			</div>
		<?php endif; ?>

		<?php if ( ! empty( $args['property_tax'] ) ) : ?>
			<div class="emc-popup-info__field emc-popup-info__field--property_tax">
				<div class="emc-popup-info__field-label"><?php _e( 'Property taxes', 'emc-plugin' ); ?>: </div>
				<div class="emc-popup-info__field-value js-result-property-tax"></div>
			</div>
		<?php endif; ?>

		<?php if ( ! empty( $args['pmi'] ) ) : ?>
			<div class="emc-popup-info__field emc-popup-info__field--pmi">
				<div class="emc-popup-info__field-label"><?php _e( 'PMI', 'emc-plugin' ); ?>: </div>
				<div class="emc-popup-info__field-value js-result-pmi"></div>
			</div>
		<?php endif; ?>
	</div>
	<div class="emc-popup-text__right"></div>
</div>
