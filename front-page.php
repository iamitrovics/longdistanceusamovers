<?php get_header(); ?>

    <header id="hero-banner">
        <div id="hero-slider">
            <?php if( have_rows('hero_slider_home') ): ?>
               <?php while( have_rows('hero_slider_home') ): the_row(); ?>
                    <div class="item hero-slide">
                        <div class="overlay"></div>
                        <?php
                        $imageID = get_sub_field('featured_image');
                        $image = wp_get_attachment_image_src( $imageID, 'slider-image' );
                        $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
                        ?> 

                        <img class="img-responsive" alt="<?php echo $alt_text; ?>" src="<?php echo $image[0]; ?>" /> 
                        <div class="caption">
                            <div class="container">

                                <div class="caption__holder">
                                    <h2 class="animated-title"><?php the_sub_field('main_title'); ?></h2>
                                </div>
                                <!-- // holder  -->

                            </div>
                        </div>
                    </div>
                    <!-- /.item -->                   
               <?php endwhile; ?>
            <?php endif; ?>
        </div>
        <!-- /#hero-slider -->

        <?php include(TEMPLATEPATH . '/inc/quotepopup-inc.php'); ?>

        <div class="overlay">
            <div class="container">
                <div class="hero-form">
                    <header>
                        <h5><?php the_field('main_title_form_pop', 'options'); ?></h5>
                    </header>

                        <ul class="nav nav-tabs"  role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#moving-quote" role="tab" aria-controls="home" aria-selected="true">Moving Quote</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#auto-quote" role="tab" aria-controls="profile" aria-selected="false">Auto Quote</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#quote-for-both" role="tab" aria-controls="contact" aria-selected="false">Quote for Both</a>
                            </li>
                        </ul>

                        <div class="tab-content" id="myTabContent">

                            <div class="tab-pane fade show active" id="moving-quote" role="tabpanel" aria-labelledby="home-tab">
                                <?php echo do_shortcode('[contact-form-7 id="135964" title="Moving Quote"]'); ?>
                            </div>
                            <!-- // tab 1  -->
                            <div class="tab-pane fade" id="auto-quote" role="tabpanel" aria-labelledby="profile-tab">
                                <?php echo do_shortcode('[contact-form-7 id="135733" title="Auto Quote"]'); ?>
                            </div>
                            <!-- // tab 2  -->
                            <div class="tab-pane fade" id="quote-for-both" role="tabpanel" aria-labelledby="contact-tab">
                                <?php echo do_shortcode('[contact-form-7 id="135734" title="Quote for Both"]'); ?>
                            </div>
                            <!-- // tab 3  -->

                        </div>
                        <!-- // tabs content  -->

                </div>
                <!-- // hero form  -->
            </div>
        </div>
        <!-- // overlay  -->
        
    </header>
    <!-- /.hero-banner -->
    <section id="about-block">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="about-content">
                        <div class="about-text">
                            <?php the_field('content_block_about_home'); ?>
                        </div>
                        <!-- /.about-content -->
                        <div class="about-video">
                            <?php
                            $imageID = get_field('video_screenshot_about_home');
                            $image = wp_get_attachment_image_src( $imageID, 'video-image' );
                            $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
                            ?> 

                            <img class="img-responsive video-image" alt="<?php echo $alt_text; ?>" src="<?php echo $image[0]; ?>" /> 
                            <a class="various fancybox.iframe" href="<?php the_field('video_url_home'); ?>?autoplay=1"><img src="<?php bloginfo('template_directory'); ?>/img/ico/youtube.png" alt=""></a>
                        </div>
                        <!-- /.about-video -->
                    </div>
                    <!-- /.about-content -->
                </div>
                <!-- /.col-md-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-md-12">
                    <div id="about-counter">
                        <div class="row">
                            <?php if( have_rows('features_list_home_about') ): ?>
                               <?php while( have_rows('features_list_home_about') ): the_row(); ?>
                                    <div class="col">
                                        <div class="counter-item">
                                            <h3><span class="counter"><?php the_sub_field('value'); ?></span><?Php the_sub_field('number'); ?></h3>
                                            <h4><?php the_sub_field('title'); ?></h4>
                                        </div>
                                        <!-- /.counter-item -->
                                    </div>
                                    <!-- /.col -->                                   
                               <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /#about-counter -->
                </div>
                <!-- /.col-md-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /#about-block -->


    <section id="services-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2><?php the_field('main_title_services_home'); ?></h2>
                </div>
                <!-- /.col-md-12 -->
            </div>
            <!-- /.row -->
            <div class="row" id="service-boxes">
                <?php if( have_rows('services_list_home') ): ?>
                   <?php while( have_rows('services_list_home') ): the_row(); ?>
                        <div class="col-md-4">
                            <div class="service-box">
                                <div class="services-ico">
                                    <?php the_sub_field('icon'); ?>
                                </div>
                                <!-- /.services-ico -->
                                <h3><?php the_sub_field('title'); ?></h3>
                                <?php the_sub_field('content'); ?>
                                <a href="<?php the_sub_field('link_to_page'); ?>" class="serv-more">Learn more</a>
                                <a href="<?php the_sub_field('link_to_page'); ?>" class="url-wrap"></a>
                            </div>
                            <!-- /.service-box -->
                        </div>
                        <!-- /.col-md-4 -->                       
                   <?php endwhile; ?>
                <?php endif; ?>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /#services-area -->


    <section id="reviews">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Reviews</h2>
                </div>
                <!-- /.col-md-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="reviews-in">
                        <ul class="nav nav-tabs">
                            <li><a data-toggle="tab" href="#review1" class="active"><img src="<?php the_field('yelp_logo', 'options'); ?>" alt=""><div class="rate"><i class="fas fa-star"></i><?php the_field('score_reviwer_yelp', 'options'); ?></div></a></li>
                            <li><a data-toggle="tab" href="#review2"><img src="<?php the_field('bbb_logo','options'); ?>" alt=""><div class="rate"><i class="fas fa-star"></i><?php the_field('score_reviwer_bbb', 'options'); ?></div></a></li>
                            <li><a data-toggle="tab" href="#review3"><img src="<?php the_field('trust_logo_copy', 'options'); ?>" alt=""><div class="rate"><i class="fas fa-star"></i><?php the_field('score_reviwer_trust', 'options'); ?></div></a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="review1" class="tab-pane fade in active show">
                                <div class="review-slider">

                                    <?php
                                        $post_objects = get_field('yelp_testimonials');

                                        if( $post_objects ): ?>
                                            <?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
                                                <?php setup_postdata($post); ?>

                                                    <div class="review-box">
                                                        <div class="review-person-info">
                                                            <div class="review-image">

                                                                <?php 
                                                                $values = get_field( 'client_photo_test' );
                                                                if ( $values ) { ?>

                                                                    <?php
                                                                    $imageID = get_field('client_photo_test');
                                                                    $image = wp_get_attachment_image_src( $imageID, 'test-image' );
                                                                    $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
                                                                    ?> 

                                                                    <img class="img-responsive" alt="<?php echo $alt_text; ?>" src="<?php echo $image[0]; ?>" /> 

                                                                <?php 
                                                                } else { ?>

                                                                    <img src="<?php bloginfo('template_directory'); ?>/img/misc/person.jpg" alt="">

                                                                <?php } ?>
                                                               
                                                            </div>
                                                            <!-- /.review-image -->
                                                            <div class="review-content">
                                                                <span class="name"><?php the_title(''); ?></span>
                                                                <span class="date"><?php the_field('date_test'); ?></span>

                                                                <span class="address"><?php the_field('city_test'); ?></span>
                                                                <div class="rating">
                                                                    <span class="mr-star-rating"> 
                                                                        <?php if (get_field('score_test') == '4') { ?>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fal fa-star"></i>
                                                                        <?php } elseif (get_field('score_test') == '4.5') { ?>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star-half-alt"></i>
                                                                        <?php } elseif (get_field('score_test') == '5') { ?>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                        <?php } ?>    

                                                                    </span>
                                                                </div>
                                                                <!-- /.rating -->
                                                            </div>
                                                            <!-- /.review-content -->
                                                        </div>
                                                        <!-- /.review-person-info -->
                                                        <div class="review-text">
                                                            <?php the_field('testimonials_content_test'); ?>
                                                        </div>
                                                        <!-- /.review-text -->
                                                    </div>
                                                    <!-- /.review-box -->                                                  

                                            <?php endforeach; ?>
                                        <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                                    <?php endif; ?>                                

                                </div>
                                <!-- /.review-slider -->
                                <footer>
                                    <a href="<?php the_field('button_link_home_rev'); ?>" class="quote"><?php the_field('cta_label_test_home'); ?></a>
                                </footer>
                            </div>
                            <div id="review2" class="tab-pane fade">
                                <div class="review-slider">

                                    <?php
                                        $post_objects = get_field('bbb_testimonials');

                                        if( $post_objects ): ?>
                                            <?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
                                                <?php setup_postdata($post); ?>

                                                    <div class="review-box">
                                                        <div class="review-person-info">
                                                            <div class="review-image">

                                                                <?php 
                                                                $values = get_field( 'client_photo_test' );
                                                                if ( $values ) { ?>

                                                                    <?php
                                                                    $imageID = get_field('client_photo_test');
                                                                    $image = wp_get_attachment_image_src( $imageID, 'test-image' );
                                                                    $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
                                                                    ?> 

                                                                    <img class="img-responsive" alt="<?php echo $alt_text; ?>" src="<?php echo $image[0]; ?>" /> 

                                                                <?php 
                                                                } else { ?>

                                                                    <img src="<?php bloginfo('template_directory'); ?>/img/misc/person.jpg" alt="">

                                                                <?php } ?>

                                                            </div>
                                                            <!-- /.review-image -->
                                                            <div class="review-content">
                                                                <span class="name"><?php the_title(''); ?></span>
                                                                <span class="date"><?php the_field('date_test'); ?></span>

                                                                <span class="address"><?php the_field('city_test'); ?></span>
                                                                <div class="rating">
                                                                    <span class="mr-star-rating"> 
                                                                        <?php if (get_field('score_test') == '4') { ?>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fal fa-star"></i>
                                                                        <?php } elseif (get_field('score_test') == '4.5') { ?>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star-half-alt"></i>
                                                                        <?php } elseif (get_field('score_test') == '5') { ?>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                        <?php } ?>    

                                                                    </span>
                                                                </div>
                                                                <!-- /.rating -->
                                                            </div>
                                                            <!-- /.review-content -->
                                                        </div>
                                                        <!-- /.review-person-info -->
                                                        <div class="review-text">
                                                            <?php the_field('testimonials_content_test'); ?>
                                                        </div>
                                                        <!-- /.review-text -->
                                                    </div>
                                                    <!-- /.review-box -->                                                  

                                            <?php endforeach; ?>
                                        <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                                    <?php endif; ?>    

                                </div>
                                <!-- /.review-slider -->
                                <footer>
                                    <a href="<?php the_field('button_link_home_rev'); ?>" class="quote"><?php the_field('cta_label_test_home'); ?></a>
                                </footer>
                            </div>
                            <div id="review3" class="tab-pane fade">
                                <div class="review-slider">

                                    <?php
                                        $post_objects = get_field('trust_testimonials');

                                        if( $post_objects ): ?>
                                            <?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
                                                <?php setup_postdata($post); ?>

                                                    <div class="review-box">
                                                        <div class="review-person-info">
                                                            <div class="review-image">

                                                                <?php 
                                                                $values = get_field( 'client_photo_test' );
                                                                if ( $values ) { ?>

                                                                    <?php
                                                                    $imageID = get_field('client_photo_test');
                                                                    $image = wp_get_attachment_image_src( $imageID, 'test-image' );
                                                                    $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
                                                                    ?> 

                                                                    <img class="img-responsive" alt="<?php echo $alt_text; ?>" src="<?php echo $image[0]; ?>" /> 

                                                                <?php 
                                                                } else { ?>

                                                                    <img src="<?php bloginfo('template_directory'); ?>/img/misc/person.jpg" alt="">

                                                                <?php } ?>

                                                            </div>
                                                            <!-- /.review-image -->
                                                            <div class="review-content">
                                                                <span class="name"><?php the_title(''); ?></span>
                                                                <span class="date"><?php the_field('date_test'); ?></span>

                                                                <span class="address"><?php the_field('city_test'); ?></span>
                                                                <div class="rating">
                                                                    <span class="mr-star-rating"> 
                                                                        <?php if (get_field('score_test') == '4') { ?>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fal fa-star"></i>
                                                                        <?php } elseif (get_field('score_test') == '4.5') { ?>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star-half-alt"></i>
                                                                        <?php } elseif (get_field('score_test') == '5') { ?>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                        <?php } ?>    

                                                                    </span>
                                                                </div>
                                                                <!-- /.rating -->
                                                            </div>
                                                            <!-- /.review-content -->
                                                        </div>
                                                        <!-- /.review-person-info -->
                                                        <div class="review-text">
                                                            <?php the_field('testimonials_content_test'); ?>
                                                        </div>
                                                        <!-- /.review-text -->
                                                    </div>
                                                    <!-- /.review-box -->                                                  

                                            <?php endforeach; ?>
                                        <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                                    <?php endif; ?>                                    

                                </div>
                                <!-- /.review-slider -->
                                <footer>
                                    <a href="<?php the_field('button_link_home_rev'); ?>" class="quote"><?php the_field('cta_label_test_home'); ?></a>
                                </footer>
                            </div>
                        </div>
                    </div>
                    <!-- /.reviews-in -->
                </div>
                <!-- /.col-md-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /#reviews -->
    
<?php get_footer(''); ?>

