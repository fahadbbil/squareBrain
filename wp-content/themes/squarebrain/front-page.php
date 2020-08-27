<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */

get_header();
?>        
        <section class="home-slider">
            <div id="home-carousel" class="carousel slide carousel-fade" data-ride="carousel">
                <div class="container">
                    <ol class="carousel-indicators">
                        <li data-target="#home-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#home-carousel" data-slide-to="1"></li>
                        <li data-target="#home-carousel" data-slide-to="2"></li>
                        <li data-target="#home-carousel" data-slide-to="3"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active item-one active" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/slider/slide-1.png')">
                           <div class="flex">
                               <div class="flex-left">
                                   <h1 class="text-uppercase">squarekit</h1>
                                   <h2 class="text-uppercase"> space helmet</h2>
                                   <a class="btn pink-btn text-uppercase ml-75" href="javascript:void(0)">order now</a>
                               </div>
                           </div>
                        </div>
                        <div class="carousel-item item-two" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/slider/slide-2.png')">
                            <div class="flex">
                                <div class="flex-left">
                                    <h1 class="text-uppercase">squarekit</h1>
                                    <h2 class="text-uppercase"> circuits</h2>
                                    <a class="btn pink-btn text-uppercase ml-32" href="javascript:void(0)">order now</a>
                                </div>
                            </div>
                        </div>

                        <div class="carousel-item item-three">
                            <div class="flex">
                                <div class="flex-center text-center">
                                    <h2 style="margin-bottom: 20px;" class="text-uppercase">receive our newsletter</h2>
                                    <input type="text" class="form-control" placeholder="First and Last Name">
                                    <input type="email" class="form-control" placeholder="Email">
                                    <a class="btn ylw-btn text-uppercase" href="javascript:void(0)">Submit</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item item-four">
                            <div class="flex">
                                <div class="flex-left">
                                    <h1 class="text-uppercase">featured Blog</h1>
                                    <h2 class="text-uppercase"> title here</h2>
                                    <a class="btn ylw-btn text-uppercase ml-60" href="javascript:void(0)">read more!</a>
                                </div>
                            </div>
                            <div class="post-thumb"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="home-blocks">
            <div class="container">
                <?php get_template_part( 'template-parts/content', 'homeFeatures' ); ?>
            </div>
        </section>
<?php
get_footer();        