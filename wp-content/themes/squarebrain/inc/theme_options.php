<style>
    .mt-2{margin-top: 20px;}
    .options-nav{ width: 100%; box-sizing: border-box; }
    .options-nav li{ width: 100%; box-sizing: border-box}
    .options-nav a{ display: block; border: 1px solid #ccc !important; }
    .options-nav>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover {
        color: #fff;
        cursor: pointer;
        background-color: #337ab7;
    }
</style>

    <div class="update-nag" style="width: 100%">
        Theme Options
    </div>

     <form id="theme_options_form" class="mt-2">
                <div class="row">
                    <div class="col-md-3">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs options-nav" role="tablist">
                            <li role="presentation" class="active"><a href="#general" aria-controls="general" role="tab" data-toggle="tab">General</a></li>
                            <li role="presentation" class=""><a href="#home-feature-list" aria-controls="home-feature-list" role="tab" data-toggle="tab">Home Feature List</a></li>
                            <li role="presentation" class=""><a href="#resource-feature-lists" aria-controls="resource-feature-lists" role="tab" data-toggle="tab">Resource Feature Lists</a></li>
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
                                           <div class="panel-body">
                                               <div class="form-group">
                                                   <label for="phone">Phone </label>
                                                   <input id="phone" class="form-control" type="text" value="<?php echo get_theme_mod( 'squarebrain_phone_settings', false ); ?>" class="squarebrain_phone_settings">
                                               </div>
                                               <div class="form-group">
                                                   <label for="email">Email </label>
                                                   <input id="email" class="form-control" type="email" value="<?php echo get_theme_mod( 'squarebrain_email_settings', false ); ?>" class="squarebrain_email_settings">
                                               </div>

                                               <label for="">Footer Logo: </label> <br>
                                               <?php
                                               if( $image =get_theme_mod( 'squarebrain_footer_logo_settings', false ) ) {

                                                   echo '<a href="javascript: void(0);" class="theme_options_upl"><img src="' . $image . '" /></a><br><br>
                              <a href="javascript: void(0);" class="theme_options_rmv btn btn-danger">Remove image</a>';

                                               } else {

                                                   echo '<a href="javascript: void(0);" class="theme_options_upl btn btn-primary">Upload image</a> <br>
                                                 <a href="javascript: void(0);" class="theme_options_rmv btn btn-danger" style="display:none">Remove image</a>';

                                               }
                                               ?>
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
                                           <div class="panel-heading"><b>General Setting</b></div>
                                           <div class="panel-body">
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                           <div role="tabpanel" class="tab-pane" id="resource-feature-lists">
                               <div class="row">
                                   <div class="col-md-10">
                                       <div class="panel panel-default">
                                           <div class="panel-heading"><b>Resource Features</b></div>
                                           <div class="panel-body">
                                               <div class="form-group">

                                               </div>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
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
                                <a href="javascript:void(0)" class="feature_upl" name="feature_img[]"><img src="<?php echo  $squarebrain_features_item->image_url;?>" /></a>
                                <a href="javascript:void(0)" class="feature_rmv">Remove image</a>
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

