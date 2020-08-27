<?php
//init the meta box
add_action( 'after_setup_theme', 'custom_postimage_setup' );
function custom_postimage_setup(){
    add_action( 'add_meta_boxes', 'custom_postimage_meta_box' );
    add_action( 'save_post', 'custom_postimage_meta_box_save' );
    add_action( 'save_post', 'secondaryContentAboutPageSave' );
}

function custom_postimage_meta_box(){
    global $post;

    if(!empty($post))
    {
        $pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);

        if($pageTemplate == 'page-about.php' )
        {
            add_meta_box(
                'custom_postimage_meta_box',__( 'About Images', 'squarebrain'), // $id
                'custom_postimage_meta_box_func',
                'page',
                'normal',
                'low'
            );

            add_meta_box(
                    'secondary_text',__('Bottom Content','squarebrain'),
                'secondaryContent',
                'page',
                'normal',
                'high'
            );
        }
    }
}

function custom_postimage_meta_box_func($post){

    //an array with all the images (ba meta key). The same array has to be in custom_postimage_meta_box_save($post_id) as well.
    $meta_keys = array('top_about_img','bottom_about_image');
    $si = 1;
    foreach($meta_keys as $meta_key){
        $label_field = ($si == 1)  ? 'Tope Image' : 'Bottom Image';
        $image_meta_val=get_post_meta( $post->ID, $meta_key, true);
        ?>
        <div class="custom_postimage_wrapper" id="<?php echo $meta_key; ?>_wrapper" style="margin-bottom:20px;">
            <img src="<?php echo ($image_meta_val!=''?wp_get_attachment_image_src( $image_meta_val)[0]:''); ?>" style="width:200px;display: <?php echo ($image_meta_val!=''?'block':'none'); ?>" alt="">
            <a class="addimage button img_<?php echo $si;?>" onclick="custom_postimage_add_image('<?php echo $meta_key; ?>');"><?php _e($label_field,'squarebrain'); ?></a><br>
            <a class="removeimage" style="color:#aa0000;cursor:pointer;display: <?php echo ($image_meta_val!=''?'block':'none'); ?>" onclick="custom_postimage_remove_image('<?php echo $meta_key; ?>');"><?php _e('remove image','squarebrain'); ?></a>
            <input type="hidden" name="<?php echo $meta_key; ?>" id="<?php echo $meta_key; ?>" value="<?php echo $image_meta_val; ?>" />
        </div>
    <?php $si++;} ?>
    <script>
    function custom_postimage_add_image(key){

        var $wrapper = jQuery('#'+key+'_wrapper');

        custom_postimage_uploader = wp.media.frames.file_frame = wp.media({
            title: '<?php _e('select image','squarebrain'); ?>',
            button: {
                text: '<?php _e('select image','squarebrain'); ?>'
            },
            multiple: false
        });
        custom_postimage_uploader.on('select', function() {

            var attachment = custom_postimage_uploader.state().get('selection').first().toJSON();
            var img_url = attachment['url'];
            var img_id = attachment['id'];
            $wrapper.find('input#'+key).val(img_id);
            $wrapper.find('img').attr('src',img_url);
            $wrapper.find('img').show();
            $wrapper.find('a.removeimage').show();
        });
        custom_postimage_uploader.on('open', function(){
            var selection = custom_postimage_uploader.state().get('selection');
            var selected = $wrapper.find('input#'+key).val();
            if(selected){
                selection.add(wp.media.attachment(selected));
            }
        });
        custom_postimage_uploader.open();
        return false;
    }

    function custom_postimage_remove_image(key){
        var $wrapper = jQuery('#'+key+'_wrapper');
        $wrapper.find('input#'+key).val('');
        $wrapper.find('img').hide();
        $wrapper.find('a.removeimage').hide();
        return false;
    }
    </script>
    <?php
    wp_nonce_field( 'custom_postimage_meta_box', 'custom_postimage_meta_box_nonce' );
}

function custom_postimage_meta_box_save($post_id){

    if ( ! current_user_can( 'edit_posts', $post_id ) ){ return 'not permitted'; }

    if (isset( $_POST['custom_postimage_meta_box_nonce'] ) && wp_verify_nonce($_POST['custom_postimage_meta_box_nonce'],'custom_postimage_meta_box' )){

        //same array as in custom_postimage_meta_box_func($post)
        $meta_keys = array('top_about_img','bottom_about_image');
        foreach($meta_keys as $meta_key){
            if(isset($_POST[$meta_key]) && intval($_POST[$meta_key])!=''){
                update_post_meta( $post_id, $meta_key, intval($_POST[$meta_key]));
            }else{
                update_post_meta( $post_id, $meta_key, '');
            }
        }
    }
}


function secondaryContent($post){
    $text = get_post_meta( $post->ID, 'secondaryContent', true );
    wp_editor( htmlspecialchars($text), 'mettaabox_ID', $settings = array('textarea_name'=>'meta[secondaryContent]') );
    ?>
    <!--<table width="100%">
        <tr>
            <textarea name="meta[secondaryContent]" id="" style="width: 100%;" rows="10">
                <?php /*echo esc_html( get_post_meta( $post->ID, 'secondaryContent', true ) );*/?>
            </textarea>
        </tr>-->
    </table>
    <?php
}

function secondaryContentAboutPageSave($post_id){
    if ( ! current_user_can( 'edit_posts', $post_id ) ){ return 'not permitted'; }

    if ( isset( $_POST['meta'] ) ) {
        foreach( $_POST['meta'] as $key => $value ){
            update_post_meta( $post_id, $key, $value );
        }
    }

}
