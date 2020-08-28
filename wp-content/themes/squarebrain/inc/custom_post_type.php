<?php

function custom_post_type() {

    // Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Sliders', 'Post Type General Name', 'squarebrain' ),
        'singular_name'       => _x( 'Slider', 'Post Type Singular Name', 'squarebrain' ),
        'menu_name'           => __( 'Sliders', 'squarebrain' ),
        'parent_item_colon'   => __( 'Parent Slider', 'squarebrain' ),
        'all_items'           => __( 'All Sliders', 'squarebrain' ),
        'view_item'           => __( 'View Slider', 'squarebrain' ),
        'add_new_item'        => __( 'Add New Slider', 'squarebrain' ),
        'add_new'             => __( 'Add New', 'squarebrain' ),
        'edit_item'           => __( 'Edit Slider', 'squarebrain' ),
        'update_item'         => __( 'Update Slider', 'squarebrain' ),
        'search_items'        => __( 'Search Slider', 'squarebrain' ),
        'not_found'           => __( 'Not Found', 'squarebrain' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'squarebrain' ),
    );

    // Set other options for Custom Post Type

    $args = array(
        'label'               => __( 'slider', 'squarebrain' ),
        'description'         => __( 'Sliders of SquareBrain', 'squarebrain' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title'),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => true,
        'publicly_queryable'  => false,
        'capability_type'     => 'post',
        'show_in_rest' => true,

    );

    // Registering your Custom Post Type
    register_post_type( 'sq_slider', $args );

}
add_action( 'init', 'custom_post_type', 0 );

// Creating designation custom meta field at team custom post
function sq_slider_meta() {
    add_meta_box( 'sq_slider_settings', 'Settings', 'display_sq_slider_settings','sq_slider', 'normal', 'high' );
}
add_action( 'admin_init', 'sq_slider_meta' );

//Callback function for creating metabox of add_meta_box function at designationAtTeam function
function display_sq_slider_settings( $post ) {
    ?>
    <div class="slider_background" style="padding-top: 10px; padding-bottom: 10px; border: 1px solid #ddd; border-radius: 5px;">
        <table width="100%" class="Slider_background_color" style="margin: 10px 10px;">
            <tr>
                <td><h6>Slider Background Color </h6><input type="color" class="Slider_background_color" style="width:10%;" name="meta[Slider_background_color]" value="<?php echo esc_html( get_post_meta( $post->ID, 'Slider_background_color', true ) );?>" />
                </td>
            </tr>
        </table>
    </div>
<?php echo get_post_meta( $post->ID, 'show_button_form', true );?>
    <div class="showSection" style="padding-top: 10px; padding-bottom: 10px; border: 1px solid #ddd; border-radius: 5px;margin-top: 10px;">
        <div class="form-group" style="margin-left: 10px;">
            <label for="">Show</label><br>
            <label class="radio-inline">
                <input type="radio" <?php if (get_post_meta( $post->ID, 'show_button_form', true ) == 'button') echo 'checked="checked"'; ?> name="meta[show_button_form]" class="show_button_form" value="button">Text
            </label>
            <label class="radio-inline">
                <input type="radio" <?php if (get_post_meta( $post->ID, 'show_button_form', true ) == 'form') echo 'checked="checked"'; ?> name="meta[show_button_form]" class="show_button_form" value="form">Form
            </label>
            <label class="radio-inline">
                <input type="radio" <?php if (get_post_meta( $post->ID, 'show_button_form', true ) == 'featured_post') echo 'checked="checked"'; ?> name="meta[show_button_form]" class="show_button_form" value="featured_post">Featured Blog
            </label>
        </div>
        <table width="100%" class="button_text_section hidden" style="margin: 10px 10px;">
            <tr>
                <td><h6>Sub Title </h6><input type="text" class="Slider_subtitle" style="width:80%;" name="meta[Slider_subtitle]" value="<?php echo esc_html( get_post_meta( $post->ID, 'Slider_subtitle', true ) );?>" />
                </td>
            </tr>
            <tr>
                <td><h6>Text: </h6><input type="text" style="width:80%;" name="meta[slider_button_text]" value="<?php echo esc_html( get_post_meta( $post->ID, 'slider_button_text', true ) );?>" />
                </td>
                <td><h6>URL: </h6><input type="url" style="width:80%;" name="meta[slider_button_url]" value="<?php echo esc_html( get_post_meta( $post->ID, 'slider_button_url', true ) );?>" />
                </td>
                <td><h6>Background Color: </h6><input type="color" style="width:80%;" name="meta[slider_button_bg]" value="<?php echo esc_html( get_post_meta( $post->ID, 'slider_button_bg', true ) );?>" />
                </td>
            </tr>

            <tr>
                <td>
                    <br><br>
                    <div class="mb-0">
                        <div class="attachment-box">
                            <div class="attachment-btn">
                                <label>Image: </label>
                                <label for="general-file-selector" id="header_logo_img_browse" class="btn btn-default btn-sm">
                                    <i class="fa fa-upload fa-2x" aria-hidden="true"></i>
                                </label>

                            </div>

                            <div class="attachment-file-view">
                                <input type="text" id="header_file_name_set" class="hidden" value="<?php echo get_theme_mod( 'squarebrain_header_logo_setting', get_template_directory_uri().'/assets/images/logo.png' );?>">
                                <img class="header-src-img img-box-normal general_file_selec" src="<?php echo get_theme_mod( 'squarebrain_header_logo_setting', get_template_directory_uri().'/assets/images/logo.png' );?>">
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        </table>

        <table width="100%" class="form_section hidden" style="margin: 10px 10px;">
            <tr>
                <td><h6>Send Email To: </h6><input type="text" style="width:80%;" name="meta[send_email_to]" value="<?php echo esc_html( get_post_meta( $post->ID, 'send_email_to', true ) );?>" />
                </td>

            </tr>
        </table>

        <table width="100%" class="featured_section hidden" style="margin: 10px 10px;">
            <tr>
                <td>
                    <h6>Select: </h6>
                    <select name="meta[featured_selction]" id="featured_selction">
                    <?php
                        $args = array(
                            'post_type'=> 'post',
                            'orderby'    => 'ID',
                            'post_status' => 'publish',
                            'order'    => 'DESC',
                            'posts_per_page' => -1 // this will retrive all the post that is published
                        );

                        $result = new WP_Query( $args );
                        if ( $result-> have_posts() ) :
                            while ( $result->have_posts() ) : $result->the_post();
                    ?>
                                <option value="<?php echo get_the_ID();?>"><?php the_title();?></option>
                            <?php endwhile; ?>
                        <?php endif; wp_reset_postdata(); ?>
                    </select>
                </td>

            </tr>
        </table>
    </div>
    <script>
        (function ($){

            $(document).on("ready",function (){
                var show_button_form = $("input[class='show_button_form']:checked").val();

                if (show_button_form == 'button') {
                   $(".button_text_section").removeClass('hidden');
                   $(".form_section").addClass('hidden');
                   $(".featured_section").addClass('hidden');
                } else if(show_button_form == 'form') {
                    $(".form_section").removeClass('hidden');
                    $(".button_text_section").addClass('hidden');
                   $(".featured_section").addClass('hidden');
                } else {
                    $(".form_section").addClass('hidden');
                    $(".button_text_section").addClass('hidden');
                   $(".featured_section").removeClass('hidden');
                }

                var featured_selction = '<?php echo get_post_meta( $post->ID, 'featured_selction', true );?>';
                if ( featured_selction != "") {
                    $('#featured_selction option[value='+featured_selction+']').attr('selected','selected');
                }
            });

            $(document).on("click",".show_button_form",function (){
               var show_button_form = $(this).val();

               if (show_button_form == 'button') {
                   $(".button_text_section").removeClass('hidden');
                   $(".form_section").addClass('hidden');
                   $(".featured_section").addClass('hidden');
                } else if(show_button_form == 'form') {
                    $(".form_section").removeClass('hidden');
                    $(".button_text_section").addClass('hidden');
                   $(".featured_section").addClass('hidden');
                } else {
                    $(".form_section").addClass('hidden');
                    $(".button_text_section").addClass('hidden');
                   $(".featured_section").removeClass('hidden');
                }
            });
        })(jQuery);
    </script>
<?php
}

//Save the metabox designation in team
add_action( 'save_post', 'save_designation', 10, 2 );
function save_designation( $post_id, $post ) {
    if ( $post->post_type == 'team' ) {
        if ( isset( $_POST['meta'] ) ) {
            foreach( $_POST['meta'] as $key => $value ){
                update_post_meta( $post_id, $key, $value );
            }
        }
    }
}
