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

    .attachment-box {
        margin-top: 5px;
        width: 100%;
        box-sizing: border-box;
        display: table;
    }

    .attachment-file-view, .attachment-btn {
        float: left;
        margin-right: 10px;
    }

    input:not([type="checkbox"]), select, textarea {
        border: 1px solid #ddd;
        min-height: 28px;
        padding: 3px 10px;
        line-height: 1.2;
        background-color: #fff;
    }

    .attachment-btn .btn {
        width: 95px;
        border-radius: 2px !important;
        margin-bottom: 5px;
    }

    .attachment-file-view .img-box-normal {
        width: 100%;
        height: 66px;
        float: left;
        object-fit: contain;
        margin-right: 5px;
        border-radius: 4px !important;
        border: 1px solid #ddd;
    }
    .attachment-file-view {
        width: 200px;
    }
    .attachment-btn {
        width: 97px;
    }

    .attachment-btn .btn {
        width: 95px;
        border-radius: 2px !important;
        margin-bottom: 5px;
    }
    .row{
        box-sizing: border-box;
        display: flex;
        width: 100%;
    }

    .mb-0{margin-bottom: 0}
    .form-group label{
        font-weight: 500;
    }

    .appended-area{
        margin-top: 20px;
        padding: 10px;
        border-radius: 4px;
        border: 1px solid #ddd;
    }
</style>

<div class="update-nag" style="display: block">
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

                                    <div class="form-group mb-0">
                                        <label>Footer Logo</label><br>
                                        <div class="attachment-box">
                                            <div class="attachment-btn">
                                                <input id="general-file-selector" type="file" class="hidden" name="image" accept="image/*">
                                                <label for="general-file-selector" class="btn btn-default btn-sm">
                                                    Browse
                                                </label>
                                                <button type="button" class="btn btn-danger btn-sm" id="general_img_remove">
                                                    Remove
                                                </button>
                                            </div>

                                            <div class="attachment-file-view">
                                                <img class="general-src-img img-box-normal" src="https://via.placeholder.com/200x66">
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
                                <div class="panel-heading"><b>Home Feature List</b></div>
                                <div class="panel-body">
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
                                                    <input class="form-control button_link" name="link_fields[]" type="text" placeholder="Button Link" value="">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <label for="" style="visibility: hidden">no text</label>
                                                <button type="button" class="add-btn btn btn-primary btn-block"><span class="glyphicon glyphicon-plus gs"></span> Add</button>
                                                <!--                                            <button type="button" class="add-btn btn btn-danger btn-block">Remove</button>-->
                                            </div>
                                        </div>
                                        <div class="form-group mb-0">
                                            <label>Footer Logo</label><br>
                                            <div class="attachment-box">
                                                <div class="attachment-btn">
                                                    <input id="my-file-selector" type="file" class="hidden attach-file" name="image" accept="image/*">
                                                    <label for="my-file-selector" class="btn btn-default btn-sm">
                                                        Browse
                                                    </label>
                                                    <button type="button" class="btn btn-danger btn-sm img_remove">
                                                        Remove
                                                    </button>
                                                </div>

                                                <div class="attachment-file-view">
                                                    <img class="src-img img-box-normal" src="https://via.placeholder.com/200x66">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel-footer">
                                    <button class="submit_btn btn btn-primary" type="button">Save</button>
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
            html += '<input class="form-control button_link" name="link_fields[]" type="text" placeholder="Button Link" value="">';
            html += '</div>';
            html += '</div>';
            html += '<div class="col-md-2">';
            html += '<label for="" style="visibility: hidden">no text</label>';
            html += '<button type="button" class="remove-btn btn btn-danger btn-block"><span class="glyphicon glyphicon-minus gs"></span></button>';
            html += '</div>';
            html += '</div>';
            html += '<div class="form-group mb-0">';
            html += '<label>Footer Logo</label><br>';
            html += '<div class="attachment-box">';
            html += '<div class="attachment-btn">';
            html += '<input id="my-file-selector'+count+'" type="file" class="hidden attach-file'+count+'" name="image" accept="image/*">';
            html += '<label for="my-file-selector'+count+'" class="btn btn-default btn-sm">Browse</label>';
            html += '<button type="button" class="btn btn-danger btn-sm img_remove'+count+'">Remove</button>';
            html += '</div>';

            html += '<div class="attachment-file-view">';
            html += '<img class="src-img'+count+' img-box-normal" src="https://via.placeholder.com/200x66">';
            html += '</div>';
            html += '</div>';
            html += '</div>';
            html += '</div>';

            $(this).parents('.append-area').append(html);
        });


        /*common function*/

        $(document).on("click", '.img_remove', function () {
            $(this).parents('.attachment-btn').find('.attach-file').val('');
            $(this).parents('.attachment-btn').next('.attachment-file-view').find('.src-img').attr('src', "https://via.placeholder.com/200x66");
        });


        function readImgURLCommon(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                     $('.src-img').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $(document).on("change", ".attach-file", function () {
            readImgURLCommon(this);
        });

      /* append 1 js*/
        $(document).on("click", '.img_remove1', function () {
            $('.attach-file1').val('');
            $('.src-img1').attr('src', "https://via.placeholder.com/200x66");
        });
        function readImgURLCommon1(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('.src-img1').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $(document).on("change", ".attach-file1", function () {
            readImgURLCommon1(this);
        });
        /* append 1 js*/



        /* append 2 js*/
        $(document).on("click", '.img_remove2', function () {
            $('.attach-file2').val('');
            $('.src-img2').attr('src', "https://via.placeholder.com/200x66");
        });
        function readImgURLCommon2(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('.src-img2').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $(document).on("change", ".attach-file2", function () {
            readImgURLCommon2(this);
        });
        /* append 2 js*/

        /* append 3 js*/
        $(document).on("click", '.img_remove3', function () {
            $('.attach-file3').val('');
            $('.src-img3').attr('src', "https://via.placeholder.com/200x66");
        });
        function readImgURLCommon3(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('.src-img3').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $(document).on("change", ".attach-file3", function () {
            readImgURLCommon3(this);
        });
        /* append 3 js*/

        /* append 4 js*/
        $(document).on("click", '.img_remove4', function () {
            $('.attach-file4').val('');
            $('.src-img4').attr('src', "https://via.placeholder.com/200x66");
        });
        function readImgURLCommon4(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('.src-img4').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $(document).on("change", ".attach-file4", function () {
            readImgURLCommon4(this);
        });
        /* append 4 js*/


        /* append 4 js*/
        $(document).on("click", '.img_remove5', function () {
            $('.attach-file5').val('');
            $('.src-img5').attr('src', "https://via.placeholder.com/200x66");
        });
        function readImgURLCommon5(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('.src-img5').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $(document).on("change", ".attach-file5", function () {
            readImgURLCommon5(this);
        });
        /* append 5 js*/






       /* js for general setting */
        $(document).on("click", "#general_img_remove", function () {
            $('.general-src-img').attr('src', "https://via.placeholder.com/200x66");
            $(".general-file-selector").val('');
        });
        function readGeneralImgURLCommon(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('.general-src-img').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }


        $(document).on("change", "#general-file-selector", function () {
            readGeneralImgURLCommon(this);
        });
       /* js for general setting */
       /* custom js*/



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
            newEntry.find('img').attr('src', '');
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

