                <div class="row justify-content-center">
                <?php
                    $squarebrain_features = get_theme_mod('squarebrain_features_settings', json_encode( array()) );
                    /*This returns a json so we have to decode it*/
                    $squarebrain_features_decoded = json_decode($squarebrain_features);

                    // echo "<pre>";print_r($squarebrain_features_decoded);echo "</pre>";

                    foreach($squarebrain_features_decoded as $squarebrain_features_item){
                ?>

                    <div class="col-md-2">
                        <div class="home-feature">
                            <span class="img-box">
                                <img src="<?php echo  $squarebrain_features_item->image_url;?>" alt="">
                            </span>
                            <a href="<?php echo  $squarebrain_features_item->link;?>" class="btn ylw-btn text-uppercase"><?php echo  $squarebrain_features_item->title;?></a>
                        </div>
                    </div>
                    <?php } ?>
                </div>