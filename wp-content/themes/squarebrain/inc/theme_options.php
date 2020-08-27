<div class="update-nag" style="display: block">
    Theme Options
</div>

<form id="theme_options_form" class="mt-2">
    <div class="row">
        <div class="col-md-3">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs options-nav" role="tablist">
                <li role="presentation" class="active"><a href="#general" aria-controls="general" role="tab" data-toggle="tab">General</a></li>
                <li role="presentation" class=""><a href="#home-feature-list" aria-controls="home-feature-list" role="tab" data-toggle="tab">Feature List</a></li>
            </ul>
        </div>
        <div class="col-md-9">
            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="general">
                    <div class="row">
                        <div class="col-md-10">
                            <div class="panel panel-default">
                                <div class="panel-heading"><b>General Setting</b></div>

                                <div class="general_notification alert alert-success hidden" role="alert">Saved successfully!</div>

                                <div class="panel-body">
                                    <div class="form-group">
                                        <label for="phone">Phone </label>
                                        <input id="phone" class="form-control" type="text" value="<?php echo get_theme_mod( 'squarebrain_phone_setting', '123456789' ); ?>" class="squarebrain_phone_setting">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email </label>
                                        <input id="email" class="form-control" type="email" value="<?php echo get_theme_mod( 'squarebrain_email_setting', 'test@test.com' ); ?>" class="squarebrain_email_settings">
                                    </div>

                                    <div class="form-group">
                                        <label for="copyright_text">Copyright Text </label>
                                        <input id="copyright_text" class="form-control" type="text" value="<?php echo get_theme_mod( 'squarebrain_copyright_setting', '© Copyright '.date('Y').' Company Name. All rights reserved.' ); ?>" class="squarebrain_email_settings">
                                    </div>

                                    <div class="col-md-6 mb-0">

                                        <div class="attachment-box">
                                            <div class="attachment-btn">
                                                <label for="general-file-selector" id="header_logo_img_browse" class="btn btn-default btn-sm">
                                                    <i class="fa fa-upload fa-2x" aria-hidden="true"></i>
                                                </label>
                                                <label>Header Logo</label>
                                            </div>

                                            <div class="attachment-file-view">
                                                <input type="text" id="header_file_name_set" class="hidden" value="<?php echo get_theme_mod( 'squarebrain_header_logo_setting', get_template_directory_uri().'/assets/images/logo.png' );?>">
                                                <img class="header-src-img img-box-normal general_file_selec" src="<?php echo get_theme_mod( 'squarebrain_header_logo_setting', get_template_directory_uri().'/assets/images/logo.png' );?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-0">

                                        <div class="attachment-box">
                                            <div class="attachment-btn">
                                                <label for="general-file-selector" id="footer_logo_img_browse" class="btn btn-default btn-sm">
                                                    <i class="fa fa-upload fa-2x" aria-hidden="true"></i>
                                                </label>
                                                <label>Footer Logo</label>
                                            </div>

                                            <div class="attachment-file-view">
                                                <input type="text" id="general_file_name_set" class="hidden" value="<?php echo get_theme_mod( 'squarebrain_footer_logo_setting', get_template_directory_uri().'/assets/images/logo-black.png' );?>">
                                                <img class="general-src-img img-box-normal general_file_selec" src="<?php echo get_theme_mod( 'squarebrain_footer_logo_setting', get_template_directory_uri().'/assets/images/logo-black.png' );?>">
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="panel-footer">
                                    <button type="button" class="btn btn-success" id="general_save_btn">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="home-feature-list">
                    <div class="row">
                        <div class="col-md-10">
                            <div class="panel panel-default">
                                <div class="panel-heading"><b>Feature List</b></div>
                                <div class="panel-body">
                                    <div class="features_notification alert alert-success hidden" role="alert">Saved successfully!</div>
                                    <?php
                                    $squarebrain_features = get_theme_mod('squarebrain_features_settings', json_encode( array()) );
                                    /*This returns a json so we have to decode it*/
                                    $squarebrain_features_decoded = json_decode($squarebrain_features);

//                                     echo "<pre>";print_r($squarebrain_features_decoded);echo "</pre>";
                                    if(!empty($squarebrain_features_decoded)) {
                                        $count = 10000;
                                        foreach ($squarebrain_features_decoded as $squarebrain_features_item) { ?>
                                            <div class="append-area loop_area<?php echo $count;?>" style="margin-top: 20px; padding: 10px; border-radius: 4px; border: 1px solid #ddd;">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label for="">Button title</label>
                                                    <input class="form-control button_title" name="title_fields[]" type="text" placeholder="Button Text" value="<?php echo  $squarebrain_features_item->title;?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Button Link</label>
                                                    <input class="form-control button_link" name="link_fields[]" type="url" placeholder="Button Link" value="<?php echo  $squarebrain_features_item->link;?>">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <label for="" style="visibility: hidden">no text</label>
                                                <button type="button" id="<?php echo $count;?>" class="loop_remove_btn btn btn-danger btn-block"><span class="glyphicon glyphicon-minus gs"></span></button>
                                                <button type="button" class="btn btn-primary btn-sm add-btn btn-block"><span class="glyphicon glyphicon-plus gs"></span></button>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Image</label><br>
                                            <div class="attachment-box">
                                                <div class="attachment-btn">
<!--                                                    <input id="my-file-selector" type="file" class="hidden attach-file" name="image" accept="image/*">-->
                                                    <label for="my-file-selector" class="btn btn-default btn-sm features_img_btn" id="<?php echo $count;?>">
                                                        <i class="fa fa-upload fa-2x" aria-hidden="true"></i>
                                                    </label>
                                                </div>

                                                <div class="attachment-file-view">
                                                    <input type="text" id="feature_settings_img<?php echo $count;?>" class="hidden features_img_get" name="features_img_name[]" value="<?php echo  $squarebrain_features_item->image_url;?>">
                                                    <img class="src-img img-box-normal repeater_img_pr" id="src-img<?php echo $count;?>" src="<?php echo  $squarebrain_features_item->image_url;?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Page Location</label><br>
                                            <label class="radio-inline">
                                                <input type="radio" <?php if ($squarebrain_features_item->page_location == 'home') echo 'checked="checked"'; ?> name="page_location<?php echo $count;?>" class="page_location_val" value="home">Home
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" <?php if ($squarebrain_features_item->page_location == 'resources') echo 'checked="checked"'; ?> name="page_location<?php echo $count;?>" class="page_location_val" value="resources">Resources
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" <?php if ($squarebrain_features_item->page_location == 'both') echo 'checked="checked"'; ?> name="page_location<?php echo $count;?>" class="page_location_val" value="both">Both
                                            </label>
                                        </div>
                                    </div>
                                    <?php
                                            $count++;
                                        }
                                    } else { ?>
                                        <div class="append-area">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label for="">Button title</label>
                                                    <input class="form-control button_title" name="title_fields[]" type="text" placeholder="Button Text" value="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Button Link</label>
                                                    <input class="form-control button_link" name="link_fields[]" type="url" placeholder="Button Link" value="">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <label for="" style="visibility: hidden">no text</label>
                                                <button type="button" class="add-btn btn btn-primary btn-block"><span class="glyphicon glyphicon-plus gs"></span> Add</button>
                                                <!--                                            <button type="button" class="add-btn btn btn-danger btn-block">Remove</button>-->
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Image</label><br>
                                            <div class="attachment-box">
                                                <div class="attachment-btn">
<!--                                                    <input id="my-file-selector" type="file" class="hidden attach-file" name="image" accept="image/*">-->
                                                    <label for="my-file-selector" class="btn btn-default btn-sm features_img_btn" id="">
                                                        <i class="fa fa-upload fa-2x" aria-hidden="true"></i>
                                                    </label>
                                                </div>

                                                <div class="attachment-file-view">
                                                    <input type="text" id="feature_settings_img" class="hidden features_img_get" name="features_img_name[]">
                                                    <img class="src-img img-box-normal repeater_img_pr" id="src-img" src="https://via.placeholder.com/200x66">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Page Location</label><br>
                                            <label class="radio-inline">
                                                <input type="radio" name="page_location" class="page_location_val" value="home">Home
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="page_location" class="page_location_val" value="resources">Resources
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="page_location" class="page_location_val" value="both">Both
                                            </label>
                                        </div>
                                    </div>
                                        <?php
                                    }
                                    ?>

                                </div>

                                <div class="panel-footer">
                                    <button class="submit_btn btn btn-primary" type="button" id="features_save">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</form>

<script>
    (function($){
        'use strict';
       /* custom js*/
       /*  repeated item js*/
        var count = 0;
        $(document).on('click', ".remove-btn", function(){
            $(this).parents('.appended-area').remove();
        });
        $(document).on('click', ".add-btn", function(){
            count++;

            var html = '';
            html += '<div class="appended-area">';
            html += '<div class="row">';
            html += '<div class="col-md-5">';
            html += '<div class="form-group">';
            html += '<label for="">Button title</label>';
            html += '<input class="form-control button_title" name="title_fields[]" type="text" placeholder="Button Text" value="">';
            html += '</div>';
            html += '</div>';
            html += '<div class="col-md-6">';
            html += '<div class="form-group">';
            html += '<label for="">Button Link</label>';
            html += '<input class="form-control button_link" name="link_fields[]" type="url" placeholder="Button Link" value="">';
            html += '</div>';
            html += '</div>';
            html += '<div class="col-md-2">';
            html += '<label for="" style="visibility: hidden">no text</label>';
            html += '<button type="button" class="remove-btn btn btn-danger btn-block"><span class="glyphicon glyphicon-minus gs"></span></button>';
            html += '<button type="button" class="btn btn-primary btn-sm add-btn btn-block"><span class="glyphicon glyphicon-plus gs"></span></button>';
            html += '</div>';
            html += '</div>';
            html += '<div class="form-group">';
            html += '<label>Image</label><br>';
            html += '<div class="attachment-box">';
            html += '<div class="attachment-btn">';
            // html += '<input id="my-file-selector'+count+'" type="file" class="hidden attach-file" name="image" accept="image/*">';
            html += '<label for="my-file-selector" class="btn btn-default btn-sm features_img_btn" id="'+count+'"><i class="fa fa-upload fa-2x" aria-hidden="true"></i></label>';

            html += '</div>';

            html += '<div class="attachment-file-view">';
            html += '<input type="text" id="feature_settings_img'+count+'" class="hidden features_img_get" name="features_img_name[]">';
            html += '<img class="src-img img-box-normal repeater_img_pr" id="src-img'+count+'" src="https://via.placeholder.com/200x66">';
            html += '</div>';
            html += '</div>';
            html += '</div>';
            html += '<div class="form-group">';
            html += '<label for="">Page Location</label><br>';
            html += '<label class="radio-inline">';
            html += '<input type="radio" name="page_location'+count+'" class="page_location_val" value="home">Home';
            html += '</label>';
            html += '<label class="radio-inline">';
            html += '<input type="radio" name="page_location'+count+'" class="page_location_val" value="resources">Resources';
            html += '</label>';
            html += '<label class="radio-inline">';
            html += '<input type="radio" name="page_location'+count+'" class="page_location_val" value="both">Both';
            html += '</label>';
            html += '</div>';
            html += '</div>';

            $(this).parents('.append-area').append(html);
        });


        /*common function*/
        $(document).on('click', '.features_img_btn', function(e) {
            e.preventDefault();
            var btn_id = $(this).attr('id');

            var custom_uploader = wp.media({
                title: 'Custom Image',
                button: {
                    text: 'Upload Image'
                },
                multiple: false  // Set this to true to allow multiple files to be selected
            })
            .on('select', function() {
                var attachment = custom_uploader.state().get('selection').first().toJSON();
                $('#src-img'+btn_id).attr('src', attachment.url);
                $("#feature_settings_img"+btn_id).val(attachment.url);
            })
            .open();
        });

        /*URL Field Type*/
        $(document).on('blur', 'input[type="url"]', function () {
            var string = $(this).val();
            if (!string.match(/^https?:/) && string.length) {
                string = "http://" + string;
                $(this).val(string)
            }
        });

       /* js for header setting */
        $('#header_logo_img_browse').click(function(e) {
            e.preventDefault();

            var custom_uploader = wp.media({
                title: 'Custom Image',
                button: {
                    text: 'Upload Image'
                },
                multiple: false  // Set this to true to allow multiple files to be selected
            })
            .on('select', function() {
                var attachment = custom_uploader.state().get('selection').first().toJSON();
                $('.header-src-img').attr('src', attachment.url);
                $("#header_file_name_set").val(attachment.url);
            })
            .open();
        });
       /* js for general setting */

        /* js for footer setting */
        $('#footer_logo_img_browse').click(function(e) {
            e.preventDefault();

            var custom_uploader = wp.media({
                title: 'Custom Image',
                button: {
                    text: 'Upload Image'
                },
                multiple: false  // Set this to true to allow multiple files to be selected
            })
            .on('select', function() {
                var attachment = custom_uploader.state().get('selection').first().toJSON();
                $('.general-src-img').attr('src', attachment.url);
                $("#general_file_name_set").val(attachment.url);
            })
            .open();
        });
       /* js for footer setting */
       /* custom js*/

        /*Ajax call to save general settings*/
        $(document).ready(function(){
            var ajaxUrl =   "<?php echo admin_url('admin-ajax.php'); ?>";

            $("#general_save_btn").on("click",function (e){
                e.preventDefault();
                var phone = $("#phone").val();
                var email = $("#email").val();
                var header_logo_img = $("#header_file_name_set").val();
                var footer_logo_img = $("#general_file_name_set").val();
                var copyright_text = $('#copyright_text').val();

                var ajaxData = {
                    'action'                            : 'updateThemeOptionsGeneral',
                    'squarebrain_phone_setting'         : phone,
                    'squarebrain_email_setting'         : email,
                    'squarebrain_header_logo_setting'   : header_logo_img,
                    'squarebrain_footer_logo_setting'   : footer_logo_img,
                    'squarebrain_copyright_setting'     : copyright_text,
                }

                $.ajax({
                    url: ajaxUrl,
                    method: 'POST',
                    data: ajaxData,
                    success: function ( data ) {
                        console.log(data);
                        if (data = 200) {
                            $(".general_notification").removeClass('hidden');
                            window.setTimeout(
                              function(){
                                location.reload(true)
                              },
                              2000
                            );
                        }
                    },
                    error: function(e) {
                        // alert("Something Went Wrong! Please try again later");
                        console.log(e);
                    }
                });
            });

            //*Ajax call to save features settings*/
            $(document).on("click","#features_save",function(e){
                e.preventDefault();

                var button_title = [];
                $('.button_title').each(function(){
                    button_title.push($(this).val());

                });

                var button_link = [];
                $(".button_link").each(function(){
                    button_link.push($(this).val());
                });

                var feature_img = [];
                $(".features_img_get").each(function(){
                    feature_img.push($(this).val());
                });

                var page_location = [];
                $('.page_location_val:checked').each(function (){
                    page_location.push($(this).val());
                });
                // alert(page_location); return  false;

                var ajaxData = {
                    'action'        : 'updateThemeOptionsFeatures',
                    'button_title'  : button_title,
                    'button_link'   : button_link,
                    'feature_img'   : feature_img,
                    'page_location'   : page_location
                }

                $.ajax({
                    url: ajaxUrl,
                    method: 'POST',
                    data: ajaxData,
                    success: function ( data ) {
                        console.log(data);
                        if (data = 200) {
                            $(".features_notification").removeClass('hidden');
                            $('html, body').animate({
                                    scrollTop: $("#home-feature-list").offset().top
                            }, 2000);
                            window.setTimeout(
                              function(){
                                location.reload(true)
                              },
                              4000
                            );
                        }
                    },
                    error: function(e) {
                        // alert("Something Went Wrong! Please try again later");
                        console.log(e);
                    }
                });
            });

        });

        /*Delete Append area from the loop if the data exists in features lists*/
        $(document).on('click', ".loop_remove_btn", function(){
            var loop_btn_id =  $(this).attr('id');
            $(this).parents('.loop_area'+loop_btn_id).remove();
        });
    })(jQuery);

</script>

