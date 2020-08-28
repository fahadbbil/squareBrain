        <section class="home-slider">
            <div id="home-carousel" class="carousel slide carousel-fade" data-ride="carousel">
                <div class="container">
                    <ol class="carousel-indicators">
                        <?php
                            $args = array(
                                'post_type'=> 'sq_slider',
                                'orderby'    => 'ID',
                                'post_status' => 'publish',
                                'order'    => 'DESC',
                                'posts_per_page' => -1 // this will retrive all the post that is published
                            );

                            $result = new WP_Query( $args );
                            $si = 0;
                            if ( $result-> have_posts() ) :
                                while ( $result->have_posts() ) : $result->the_post();

                        ?>
                        <li data-target="#home-carousel" data-slide-to="<?php echo $si;?>" class="<?php $active = ($si == 0) ? 'active' : '';?>"></li>
                            <?php $si++;endwhile; ?>
                        <?php endif; wp_reset_postdata(); ?>
                    </ol>
                    <div class="carousel-inner">

                        <?php
                            $count = 0;
                            if ( $result-> have_posts() ) :
                                while ( $result->have_posts() ) : $result->the_post();
                                $show = get_post_meta( $post->ID, 'show_button_form', true );
                        ?>
                        <div class="carousel-item <?php echo $class =($show == 'featured_post') ? 'item-four': ''; echo $active =($count == 0) ? ' active': '';?>" style="background-color: <?php echo esc_html( get_post_meta( $post->ID, 'Slider_background_color', true ) );?>;background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');">
                            <div class="flex">
                                <?php if ($show == 'button') {?>

                                <div class="flex-left">
                                    <h1 class="text-uppercase"><?php the_title();?></h1>
                                    <h2 class="text-uppercase"><?php echo esc_html( get_post_meta( $post->ID, 'Slider_subtitle', true ) );?></h2>
                                    <a class="btn text-uppercase ml-32" style="margin-top: 15px; font-size: 23px; color: #fff; border: 3px solid #000;background-color: <?php echo esc_html( get_post_meta( $post->ID, 'slider_button_bg', true ) );?>" href="<?php echo esc_html( get_post_meta( $post->ID, 'slider_button_url', true ) );?>" target="_blank"><?php echo esc_html( get_post_meta( $post->ID, 'slider_button_text', true ) );?></a>
                                </div>

                                <?php } elseif ($show == 'form') {?>

                                <div class="flex-center text-center item-three">
                                    <h2 style="margin-bottom: 20px;" class="text-uppercase">receive our newsletter</h2>
                                    <input type="text" class="form-control newsletterName" placeholder="First and Last Name">
                                    <input type="email" class="form-control newsletterEmail" placeholder="Email">
                                    <p class="text-success mail_sent_message hidden">Form is submitted successfully!</p>
                                    <p class="text-danger mail_error_message">Something is wrong! Please try again later.</p>
                                    <a  id="<?php echo $count;?>" class="btn ylw-btn text-uppercase newsletterSubmit" href="javascript:void(0)">Submit</a>
                                </div>
                                    <script>
                                        (function ($) {
                                            var ajaxUrl =   "<?php echo admin_url('admin-ajax.php'); ?>";
                                            $(document).on("click",".newsletterSubmit",function (e){
                                                e.preventDefault();
                                                var newsletterName = $(".newsletterName").val();
                                                var newsletterEmail = $(".newsletterEmail").val();
                                                var ajaxData = {
                                                    'action'           : 'sliderFormSubmit',
                                                    'newsletterName'   : newsletterName,
                                                    'newsletterEmail'  : newsletterEmail
                                                }

                                                $.ajax({
                                                    url: ajaxUrl,
                                                    method: 'POST',
                                                    data: ajaxData,
                                                    success: function ( data ) {
                                                        console.log(data);
                                                        if (data = 200) {
                                                            $(".mail_sent_message").removeClass('hidden');
                                                            $(".mail_error_message").addClass('hidden');
                                                            window.setTimeout(
                                                              function(){
                                                                location.reload(true)
                                                              },
                                                              2000
                                                            );
                                                        } else {
                                                            $(".mail_error_message").removeClass('hidden');
                                                            $(".mail_sent_message").addClass('hidden');
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
                                        })(jQuery);
                                    </script>

                                <?php } else { $content_details = get_post(get_post_meta( $post->ID, 'featured_selction', true ));?>
                                    <div class="flex">
                                        <div class="flex-left">
                                            <h1 class="text-uppercase">featured Blog</h1>
                                            <h2 class="text-uppercase"><?php echo $content_details->post_title;?></h2>
                                            <a class="btn ylw-btn text-uppercase ml-60" href="<?php echo get_post_permalink(get_post_meta( $post->ID, 'featured_selction', true ));?>" target="_blank">read more!</a>
                                        </div>
                                    </div>
                                    <div class="post-thumb"></div>
                                <?php }?>
                            </div>
                        </div>

                        <?php $count++;endwhile; ?>
                        <?php endif; wp_reset_postdata(); ?>

                    </div>
                </div>
            </div>
        </section>