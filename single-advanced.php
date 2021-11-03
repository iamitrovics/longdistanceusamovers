<?php
/*
 * Template Name: Featured Article
 * Template Post Type: post
 */
  
 get_header();  ?>

	<header id="about-header">
		<div class="overlay"></div>
		<?php
		$imageID = get_field('header_image_bg_featured');
		$image = wp_get_attachment_image_src( $imageID, 'slider-image' );
		$alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
		?> 

		<img class="img-responsive" alt="<?php echo $alt_text; ?>" src="<?php echo $image[0]; ?>" /> 
		<div class="caption">
			<div class="container">
				<div class="caption__holder">

					<?php 
					$values = get_field( 'custom_title_header_single_services' );
					if ( $values ) { ?>

						<h1><?php the_field('custom_title_header_single_services'); ?></h1>

					<?php 
					} else { ?>

						<h1><?php the_title(''); ?></h1>

					<?php } ?>

				</div>

			<div class="hero-form">
				<header>
					<h5><?php the_field('main_title_form_pop', 'options'); ?></h5>
				</header>

					<ul class="nav nav-tabs"  role="tablist">
						<li class="nav-item">
							<a class="nav-link" id="home-tab" data-toggle="tab" href="#moving-quote" role="tab" aria-controls="home" aria-selected="true">Moving Quote</a>
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

	</header>
	<!-- /.hero-banner -->

    <div id="featured-article">

        <?php if( have_rows('content_layout_featured') ): ?>
            <?php while( have_rows('content_layout_featured') ): the_row(); ?>
                <?php if( get_row_layout() == 'intro' ): ?>

                    <div class="article-intro">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1">
                                    <div class="intro-text">
                                        <?php the_sub_field('intro_text'); ?>
                                    </div>
                                    <!-- // intro text  -->
                                    <div class="image-holder">
                                        <?php
                                        $imageID = get_sub_field('featured_image');
                                        $image = wp_get_attachment_image_src( $imageID, 'fullwidth-image' );
                                        $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
                                        ?> 

                                        <img class="img-responsive" alt="<?php the_sub_field('alt_image'); ?>" src="<?php echo $image[0]; ?>" /> 
                                        <div class="caption">
                                            <small><?php the_sub_field('image_caption'); ?></small>
                                        </div>
                                    </div>
                                    <!-- // image  -->
                                    <div class="intro-main">
                                        <?php the_sub_field('intro_main_content'); ?>
                                    </div>
                                    <!-- // main  -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- // intro article  -->

                <?php elseif( get_row_layout() == 'table_of_contents' ): ?>

                    <div class="toc-wrapper">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6 offset-lg-3">
                                    <div class="toc-list">
                                        <h5><?php the_sub_field('title'); ?></h5>
                                        <ul>
                                        <?php if( have_rows('list_of_items') ): ?>
                                            <?php while( have_rows('list_of_items') ): the_row(); ?>

                                                <li><a href="<?php the_sub_field('link_to_anchor'); ?>"><?php the_sub_field('label'); ?></a></li>

                                            <?php endwhile; ?>
                                        <?php endif; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- // toc  -->

                <?php elseif( get_row_layout() == 'heading_section' ): ?>

                    <div class="heading-wrapper" id="<?php the_sub_field('section_id'); ?>">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-10 offset-lg-1">
                                    <div class="heading-srction">
                                        <?php the_sub_field('content_block'); ?>
                                    </div>
                                    <!-- // heading section  -->
                                </div>
                            </div>
                        </div>
                        <!-- // container  -->
                    </div>
                    <!-- // wrapper  -->

                <?php elseif( get_row_layout() == 'featured_list' ): ?>

                    <?php if (get_sub_field('background_color') == 'White') { ?>
                        <div class="featured-list--wrapper">
                    <?php } elseif (get_sub_field('background_color') == 'Dark Gray') { ?>
                        <div class="featured-list--wrapper dark-gray">
                    <?php } elseif (get_sub_field('background_color') == 'Blue') { ?>
                        <div class="featured-list--wrapper">
                    <?php } ?>   
                    
                        <div class="container">
                            <div class="featured-list--flex">
                                <?php if( have_rows('featured_list') ): ?>
                                    <?php while( have_rows('featured_list') ): the_row(); ?>

                                        <div class="feat-block">
                                            <?php the_sub_field('value'); ?>
                                        </div>

                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </div>
                            <!-- // flex  -->
                            <div class="bottom-content">
                                <div class="row">
                                    <div class="col-lg-8 offset-lg-2">
                                        <?php the_sub_field('bottom_content'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- // container  -->
                    </div>
                    <!-- // wrapper  -->

                <?php elseif( get_row_layout() == 'two_text_columns' ): ?>

                    <div class="two-columns--wrapper">

                        <?php if (get_sub_field('left_column_background_color') == 'White') { ?>
                            <span class="shape"></span>
                        <?php } elseif (get_sub_field('left_column_background_color') == 'Dark Gray') { ?>
                            <span class="shape dark-gray"></span>
                        <?php } elseif (get_sub_field('left_column_background_color') == 'Blue') { ?>
                            <span class="shape blue"></span>
                        <?php } elseif (get_sub_field('left_column_background_color') == 'Gray') { ?>
                            <span class="shape gray"></span>
                        <?php } ?>   

                        <?php if (get_sub_field('right_column_background_color') == 'White') { ?>
                            <span class="shape-right"></span>
                        <?php } elseif (get_sub_field('right_column_background_color') == 'Dark Gray') { ?>
                            <span class="shape-right dark-gray"></span>
                        <?php } elseif (get_sub_field('right_column_background_color') == 'Blue') { ?>
                            <span class="shape-right blue"></span>
                        <?php } elseif (get_sub_field('right_column_background_color') == 'Gray') { ?>
                            <span class="shape-right gray"></span>
                        <?php } ?>                          

                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6">

                                    <?php if (get_sub_field('left_column_background_color') == 'White') { ?>
                                        <div class="text-block white-block">
                                    <?php } elseif (get_sub_field('left_column_background_color') == 'Dark Gray') { ?>
                                        <div class="text-block dark-block">
                                    <?php } elseif (get_sub_field('left_column_background_color') == 'Blue') { ?>
                                        <div class="text-block blue-block">
                                    <?php } elseif (get_sub_field('left_column_background_color') == 'Gray') { ?>
                                        <div class="text-block gray-block">
                                    <?php } ?>  

                                        <?php the_sub_field('left_column_content'); ?>
                                    </div>
                                </div>
                                <!-- // left col  -->
                                <div class="col-lg-6">

                                    <?php if (get_sub_field('right_column_background_color') == 'White') { ?>
                                        <div class="text-block right-block  white-block">
                                    <?php } elseif (get_sub_field('right_column_background_color') == 'Dark Gray') { ?>
                                        <div class="text-block right-block dark-block">
                                    <?php } elseif (get_sub_field('right_column_background_color') == 'Blue') { ?>
                                        <div class="text-block right-block blue-block">
                                    <?php } elseif (get_sub_field('right_column_background_color') == 'Gray') { ?>
                                        <div class="text-block right-block gray-block">
                                    <?php } ?>  

                                        <?php the_sub_field('right_column_content'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- // container  -->
                    </div>
                    <!-- // wrapper  -->

                <?php elseif( get_row_layout() == 'full_width_content' ): ?>

                    <?php if (get_sub_field('background_color') == 'White') { ?>
                        <div class="full-content--wrapper  white-block">
                    <?php } elseif (get_sub_field('background_color') == 'Dark Gray') { ?>
                        <div class="full-content--wrapper dark-block">
                    <?php } elseif (get_sub_field('background_color') == 'Blue') { ?>
                        <div class="full-content--wrapper blue-block">
                    <?php } elseif (get_sub_field('background_color') == 'Gray') { ?>
                        <div class="full-content--wrapper gray-block">
                    <?php } ?>    

                        <div class="container">
                            <div class="row">
                                <div class="col-lg-10 offset-lg-1">
                                    <div class="text-block">
                                        <?php the_sub_field('content_block'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- // container  -->
                    
                    </div>
                    <!-- // full content wrapper  -->

                <?php elseif( get_row_layout() == 'full_width_image' ): ?>

                <?php if ( get_sub_field( 'margin_top' ) ): ?>
                    <div class="spacer"></div>
                <?php else: ?>
               
                <?php endif; ?>                    

                    <div class="full-width--image">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-11 offset-xl-1 col-lg-10 offset-lg-1">
                                    <div class="image-holder">
                                        <?php
                                        $imageID = get_sub_field('featured_image');
                                        $image = wp_get_attachment_image_src( $imageID, 'fullwidth-image' );
                                        $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
                                        ?> 

                                        <img class="img-responsive" alt="<?php the_sub_field('alt_image'); ?>" src="<?php echo $image[0]; ?>" /> 
                                        <div class="caption">
                                            <small><?php the_sub_field('image_caption'); ?></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- // image  -->

                <?php elseif( get_row_layout() == 'content_left_image_right' ): ?>

                    <div class="content-wrapper">

                        <?php if (get_sub_field('background_color') == 'White') { ?>
                            <div class="shape white-shape"></div>
                        <?php } elseif (get_sub_field('background_color') == 'Dark Gray') { ?>
                            <div class="shape dark-shape"></div>
                        <?php } elseif (get_sub_field('background_color') == 'Blue') { ?>
                            <div class="shape blue-shape"></div>
                        <?php } elseif (get_sub_field('background_color') == 'Gray') { ?>
                            <div class="shape gray-shape"></div>
                        <?php } ?>   

                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="text-block">
                                        <?php the_sub_field("content_block"); ?>
                                    </div>
                                    <!-- // text block  -->
                                </div>
                            </div>
                        </div>
                        <!-- // container  -->
                        <div class="image-holder">
                            <?php
                            $imageID = get_sub_field('featured_image');
                            $image = wp_get_attachment_image_src( $imageID, 'fullwidth-image' );
                            $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
                            ?> 

                            <img class="img-responsive" alt="<?php the_sub_field('alt_image'); ?>" src="<?php echo $image[0]; ?>" /> 
                            <div class="caption">
                                <small><?php the_sub_field('image_caption'); ?></small>
                            </div>
                        </div>
                        <!-- // image holder  -->
                    </div>
                    <!-- // content wrapper  -->

                <?php elseif( get_row_layout() == 'image_left_content_right' ): ?>

                    <div class="content-wrapper">

                        <?php if (get_sub_field('background_color') == 'White') { ?>
                            <div class="shape-right white-shape"></div>
                        <?php } elseif (get_sub_field('background_color') == 'Dark Gray') { ?>
                            <div class="shape-right dark-shape"></div>
                        <?php } elseif (get_sub_field('background_color') == 'Blue') { ?>
                            <div class="shape-right blue-shape"></div>
                        <?php } elseif (get_sub_field('background_color') == 'Gray') { ?>
                            <div class="shape-right gray-shape"></div>
                        <?php } ?>   

                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6 offset-lg-6">
                                    <div class="text-block text-blog--right">
                                        <?php the_sub_field("content_block"); ?>
                                    </div>
                                    <!-- // text block  -->
                                </div>
                            </div>
                        </div>
                        <!-- // container  -->
                        <div class="image-holder image-left">
                            <?php
                            $imageID = get_sub_field('featured_image');
                            $image = wp_get_attachment_image_src( $imageID, 'fullwidth-image' );
                            $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
                            ?> 

                            <img class="img-responsive" alt="<?php the_sub_field('alt_image'); ?>" src="<?php echo $image[0]; ?>" /> 
                            <div class="caption">
                                <small><?php the_sub_field('image_caption'); ?></small>
                            </div>
                        </div>
                        <!-- // image holder  -->
                    </div>
                    <!-- // content wrapper  -->    
                    
                <?php elseif( get_row_layout() == 'accordion' ): ?>

                    <div class="accordion-wrapper">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-8 offset-lg-2">

                                    <div class="accordion-section">
                                        <?php if( get_sub_field('accordion_title') ): ?>
                                            <h3><?php the_sub_field('accordion_title'); ?></h3>
                                        <?php endif; ?>
                                        <div class="faq-accordion">
                                        <?php if( have_rows('qa_list') ): ?>
                                            <?php while( have_rows('qa_list') ): the_row(); ?>

                                            <div class="faq-box">
												<h4><?php the_sub_field('question'); ?></h4>
												<div>
													<?php the_sub_field('answer'); ?>
												</div>
											</div>
											<!-- /.faq-box -->

                                            <?php endwhile; ?>
                                        <?php endif; ?>
                                        </div>
                                        <!-- // acc  -->
                                    </div>
                                    <!-- // section  -->     

                                </div>
                            </div>
                            <!-- // row  -->
                        </div>
                        <!-- // container  -->
                    </div>
                    <!-- // wrapper  -->

                    <?php elseif( get_row_layout() == 'quote_cta' ): ?>	

                        <div class="quote-cta--wrapper">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1">
                                        <div class="quote-cta--single">
                                            <span class="title"><?php the_sub_field('main_title'); ?></span>
                                            <a href="#bottom-form" class="btn-cta"><?php the_sub_field('button_label'); ?></a>
                                        </div>
                                        <!-- // single  -->                                           
                                    </div>
                                </div>
                                <!-- // row   -->
                            </div>
                        </div>       
                        <!-- // cta wrapper           -->
            

                <?php endif; ?>
            <?php endwhile; ?>
        <?php endif; ?>

    </div>
    <!-- // efatured article  -->

    <div class="container" id="form-wrapper--featured">

			<div id="bottom-form">

				<ul class="nav nav-tabs"  role="tablist">
					<li class="nav-item">
						<a class="nav-link active" id="home-tab" data-toggle="tab" href="#moving-quotex" role="tab" aria-controls="home" aria-selected="true">Moving Quote</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="profile-tab" data-toggle="tab" href="#auto-quotex" role="tab" aria-controls="profile" aria-selected="false">Auto Quote</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="contact-tab" data-toggle="tab" href="#quote-for-bothx" role="tab" aria-controls="contact" aria-selected="false">Quote for Both</a>
					</li>
				</ul>

				<div class="tab-content" id="myTabContent">

					<div class="tab-pane fade show active" id="moving-quotex" role="tabpanel" aria-labelledby="home-tab">
						<?php echo do_shortcode('[contact-form-7 id="135964" title="Moving Quote"]'); ?>
					</div>
					<!-- // tab 1  -->
					<div class="tab-pane fade" id="auto-quotex" role="tabpanel" aria-labelledby="profile-tab">
						<?php echo do_shortcode('[contact-form-7 id="135733" title="Auto Quote"]'); ?>
					</div>
					<!-- // tab 2  -->
					<div class="tab-pane fade" id="quote-for-bothx" role="tabpanel" aria-labelledby="contact-tab">
						<?php echo do_shortcode('[contact-form-7 id="135734" title="Quote for Both"]'); ?>
					</div>
					<!-- // tab 3  -->

				</div>
				<!-- // tabs content  -->

			</div>
			<!-- // bottom form  -->
    
    </div>
    <!-- // container  -->

</div>
<!-- /.container -->    

<?php get_footer(); ?>
