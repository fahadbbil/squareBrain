    <div class="row">
        <div class="col-md-12">
            <form id="theme_options_form">
                <div class="row">
                    <div class="col-md-3">

                        <label for="">phone: </label><input type="text" value="<?php echo get_theme_mod( 'squarebrain_phone_settings', false ); ?>" class="squarebrain_phone_settings">
                    </div>
                    <div class="col-md-3">

                        <label for="">Email: </label><input type="email" value="<?php echo get_theme_mod( 'squarebrain_email_settings', false ); ?>" class="squarebrain_email_settings">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="">Footer Logo: </label>
                        <?php
                        if( $image =get_theme_mod( 'squarebrain_footer_logo_settings', false ) ) {

                            echo '<a href="#" class="theme_options_upl"><img src="' . $image . '" /></a>
                              <a href="#" class="theme_options_rmv">Remove image</a>';

                        } else {

                            echo '<a href="#" class="theme_options_upl">Upload image</a>
                              <a href="#" class="theme_options_rmv" style="display:none">Remove image</a>';

                        }
                        ?>
                    </div>

            </div>

            <div class="row">
                <div class="col-md-6">

                    <div id="myRepeatingFields">
                        <?php
                        $squarebrain_features = get_theme_mod('squarebrain_features_settings', json_encode( array()) );
                        $squarebrain_features_decoded = json_decode($squarebrain_features);

                        foreach($squarebrain_features_decoded as $squarebrain_features_item){
                            ?>
                            <div class="entry input-group">
                                <input class="form-control button_title" name="title_fields[]" type="text" placeholder="Button Text" value="<?php echo  $squarebrain_features_item->title;?>" />
                                <input class="form-control button_link" name="link_fields[]" type="text" placeholder="Button Link" value="<?php echo  $squarebrain_features_item->link;?>" />
                                <a href="#" class="feature_upl" name="feature_img[]"><img src="<?php echo  $squarebrain_features_item->image_url;?>" /></a>
                                <a href="#" class="feature_rmv">Remove image</a>
                                <span class="input-group-btn">
                  <button type="button" class="btn btn-success btn-lg btn-add">
                      <span class="glyphicon glyphicon-plus" aria-hidden="true">add</span>
                  </button>
              </span>
                            </div>
                        <?php } ?>
                    </div>
                    <small><span class="glyphicon glyphicon-plus gs"></span> Add more</small>
                </div>
            </div>

                <input class="submit_btn" type="submit" value="submit">
            </form>
        </div>
    </div>
    <script>
      (function($){
        'use strict';
        $(document).ready(function(){
          var ajaxUrl =   "<?php echo admin_url('admin-ajax.php'); ?>";
          $(".change_squarebrain_footer_logo_settings").on("change",function(){
            
          });

          $("#theme_options_form").on("submit",function(e){
            e.preventDefault();
            var phone = $(".squarebrain_phone_settings").val();
            var email = $(".squarebrain_email_settings").val();
            var footer_logo_img = $(".theme_options_upl img").attr('src');

            var button_title = [];
            $('.button_title').each(function(){
                button_title.push($(this).val());
                
            });

            var button_link = [];
            $(".button_link").each(function(){
              button_link.push($(this).val());
            });

            var feature_img = [];
            $(".feature_upl img").each(function(){
              feature_img.push($(this).attr('src'));
            });

            var ajaxData = {
                  'action'        : 'updateThemeOptionsGeneral',
                  'squarebrain_phone_settings'         : phone,
                  'squarebrain_email_settings'         : email,
                  'squarebrain_footer_logo_settings'   : footer_logo_img,
                  'button_title'                       : button_title,
                  'button_link'                        : button_link,
                  'feature_img'                        : feature_img,
            }

            $.ajax({
              url: ajaxUrl,
              method: 'POST',
              data: ajaxData,
                success: function ( data ) {
                  console.log(data);
                  if (data = 200) {
                    alert("Saved Successfully");
                  }
                },
                error: function(e) {
                  // alert("Something Went Wrong! Please try again later");
                  console.log(e);
                }
            });
          });

        });

        $(document).on('click', '.btn-add', function(e)
          {
              e.preventDefault();
              var controlForm = $('#myRepeatingFields:first'),
                  currentEntry = $(this).parents('.entry:first'),
                  newEntry = $(currentEntry.clone()).appendTo(controlForm);
              newEntry.find('input').val('');
              controlForm.find('.entry:not(:last) .btn-add')
                  .removeClass('btn-add').addClass('btn-remove')
                  .removeClass('btn-success').addClass('btn-danger')
                  .html('');
              $(".btn-remove").text("X");    
          }).on('click', '.btn-remove', function(e)
          {
              e.preventDefault();
              $(this).parents('.entry:first').remove();
              return false;
          });
      })(jQuery);

    </script>

