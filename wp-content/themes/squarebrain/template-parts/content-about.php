    <section class="about-block">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-uppercase text-center">about squarebrain</h1>
                </div>
                <div class="col-md-6">
                    <?php
                        while ( have_posts() ) :
			                the_post();
                            echo get_the_content();
                      endwhile;
                    ?>
                </div>
                <div class="col-md-6">
                    <?php $top_about_img=get_post_meta( $post->ID, 'top_about_img', true);?>
                    <img class="img-right" src="<?php echo ($top_about_img!=''?wp_get_attachment_image_src( $top_about_img)[0]:''); ?>" alt="">
                </div>

                <div class="col-md-6">
                    <?php $bottom_about_image=get_post_meta( $post->ID, 'bottom_about_image', true);?>
                    <img class="img-left" src="<?php echo ($bottom_about_image!=''?wp_get_attachment_image_src( $bottom_about_image)[0]:''); ?>" alt="">
                </div>
                <div class="col-md-6">
                    <?php echo esc_html( get_post_meta( get_the_ID(), 'secondaryContent', true ) );?>
                </div>
            </div>
        </div>
    </section>