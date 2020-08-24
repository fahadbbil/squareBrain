<?php $fields = emc_get_settings_list(); $options_container = emc_get_global_settings(); ?>
<form class="emc-options" method="post">

    <?php echo wp_nonce_field( 'emc_save_options', 'emc_save_options' ); ?>

	<div class="emc-header">
        <div class="emc-header__title">
            <h1><?php _e( 'Global Estatik Mortgage Calculator options', 'emc-plugin' ); ?></h1>
            <img src="<?php echo EMC_PLUGIN_DIR_URL; ?>admin/images/logo.svg" alt="<?php _e( 'Estatik logo', 'emc-plugin' ); ?>">
        </div>

        <div class="emc-header__subtitle">
            <p><?php printf( wp_kses( __( 'Please set up Calculator settings according to your needs. If you have any questions, 
		need support or would like to customise the plugin, <a href="%s" target="_blank">contact us</a>', 'emc-plugin' ), array( 'a' => array( 'href' => array(), 'target' => array() ) ) ), esc_url( 'https://estatik.net/contact-us/' ) ); ?></p>
            <input type="submit" value="<?php _e( 'Submit', 'emc-plugin' ); ?>">
        </div>
    </div>

	<div class="emc-content">
		<?php if ( $tabs = emc_get_admin_options_tabs() ) : ?>
			<div class="emc-tabs js-emc-tabs" id="emc-tabs">
				<ul class="emc-tabs__nav js-emc-tabs__nav">
					<?php foreach ( $tabs as $tab => $options ) : ?>
						<li><a href="#<?php echo $tab; ?>"><?php echo $options['label']; ?></a></li>
					<?php endforeach; ?>
				</ul>
                <div class="emc-tabs__content">
	                <?php foreach ( $tabs as $tab => $options ) : ?>
                        <div id="<?php echo $tab; ?>" class="emc-tabs__tab">
                            <?php do_action( 'emc_before_render_tab', $tab, $options ); ?>

                            <?php if ( ! empty( $options['template_path'] ) ) : ?>
                                <?php include_once $options['template_path']; ?>
                            <?php else : ?>
                                <?php if ( ! empty( $fields ) && is_array( $fields ) ) : ?>
                                    <?php foreach ( $fields as $field => $field_options ) : ?>
                                        <?php if ( ! empty( $field_options['tab'] ) && $field_options['tab'] == $tab ) : ?>
                                            <?php echo Emc_Setting_Field::render( $field, $field_options, $options_container ); ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            <?php endif; ?>

                            <?php do_action( 'emc_after_render_tab', $tab, $options ); ?>
                        </div>
	                <?php endforeach; ?>
                </div>
			</div>
		<?php endif; ?>
	</div>
</form>
