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
    .pr{position: relative; padding-right: 80px;}
    .pr .abs-btn{position: absolute; top: 0; right: 0}
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
                                           <div class="panel-heading"><b>Home Feature List</b></div>
                                           <div class="panel-body">
                                               <div id="myRepeatingFields">
                                                   <?php
                                                   $squarebrain_features = get_theme_mod('squarebrain_features_settings', json_encode( array()) );
                                                   $squarebrain_features_decoded = json_decode($squarebrain_features);

                                                   foreach($squarebrain_features_decoded as $squarebrain_features_item){
                                                       ?>
                                                       <div class="entry input-group pr">
                                                           <div class="panel-default panel-body panel">
                                                               <div class="row">
                                                                   <div class="col-md-6">
                                                                       <div class="form-group">
                                                                           <label for="">Button title</label>
                                                                           <input class="form-control button_title" name="title_fields[]" type="text" placeholder="Button Text" value="<?php echo  $squarebrain_features_item->title;?>" />
                                                                       </div>
                                                                   </div>
                                                                   <div class="col-md-6">
                                                                       <div class="form-group">
                                                                           <label for="">Button Link</label>
                                                                           <input class="form-control button_link" name="link_fields[]" type="text" placeholder="Button Link" value="<?php echo  $squarebrain_features_item->link;?>" />
                                                                       </div>
                                                                   </div>
                                                                   <div class="col-md-12">
                                                                       <br>
                                                                       <label for="">Feature Image</label> <br>
                                                                       <a href="javascript:void(0)" class="feature_upl" style="display: block" name="feature_img[]"><img style="margin-top: 10px;" src="<?php echo  $squarebrain_features_item->image_url;?>" /></a>
                                                                       <br><a href="javascript:void(0)" class="feature_rmv btn btn-danger">Remove image</a>
                                                                   </div>
                                                               </div>
                                                           </div>
                                                           <button type="button" class="btn btn-success btn-add abs-btn">
                                                               <span class="glyphicon glyphicon-plus" aria-hidden="true">Add</span>
                                                           </button>
                                                       </div>
                                                   <?php } ?>
                                               </div>
                                           </div>

                                           <div class="panel-footer">
                                               <small class="btn btn-default"><span class="glyphicon glyphicon-plus gs"></span> Add more</small>
                                               <input class="submit_btn btn btn-primary" type="submit" value="submit">
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
                                                <div id="resource_myRepeatFields">
                                                    <div class="entry input-group pr">
                                                        <div class="panel-default panel-body panel">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="">Button title</label>
                                                                        <input class="form-control resource_button_title" name="resource_title_fields[]" type="text" placeholder="Button Text" value="">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="">Button Link</label>
                                                                        <input class="form-control resource_button_link" name="resource_link_fields[]" type="text" placeholder="Button Link" value="">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <br>
                                                                    <label for="">Resource Feature Image</label> <br>
                                                                    <a href="javascript:void(0)" class="resource_feature_upl" style="display: block" name="resource_feature_img[]"><img style="margin-top: 10px;" src="http://localhost/squarebrain/wp-content/uploads/2020/08/icon-2.png"></a>
                                                                    <br><a href="javascript:void(0)" class="resource_feature_rmv btn btn-danger">Remove image</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button type="button" class="btn btn-success btn-add abs-btn">
                                                            <span class="glyphicon glyphicon-plus">Add</span>
                                                        </button>
                                                    </div>
                                                </div>
                                           </div>

                                           <div class="panel-footer">
                                               <small class="btn btn-default"><span class="glyphicon glyphicon-plus gs"></span> Add more</small>
                                               <input class="resource_submit_btn btn btn-primary" type="submit" value="submit">
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

