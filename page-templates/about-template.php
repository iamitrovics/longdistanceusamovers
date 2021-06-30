<?php
/**
 * Template Name: About Template
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

	<header id="about-header">
		<div class="overlay"></div>
		<?php
		$imageID = get_field('background_image_about');
		$image = wp_get_attachment_image_src( $imageID, 'slider-image' );
		$alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
		?> 

		<img class="img-responsive" alt="<?php echo $alt_text; ?>" src="<?php echo $image[0]; ?>" /> 
		<div class="caption">
			<div class="container">
				<div class="caption__holder">

					<?php 
					$values = get_field( 'custom_title_about_header' );
					if ( $values ) { ?>

						<h1><?php the_field('custom_title_about_header'); ?></h1>

					<?php 
					} else { ?>

						<h1><?php the_title(''); ?></h1>

					<?php } ?>

				</div>
			</div>
        </div>
        
        <?php include(TEMPLATEPATH . '/inc/quotepopup-inc.php'); ?>
        
	</header>
	<!-- /.hero-banner -->

<div id="about-page">

    <section class="services-boxes">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2><?php the_field('main_title_intro_about'); ?></h2>
                </div>
                <!-- /.col-md-12 -->
            </div>
            <!-- /.row -->
        </div>

        <div class="service-row">
            <div class="service-content">
                <div class="sc-in">
					<?php the_field('content_block_about_page'); ?>
                </div>
                <!-- /.sc-in -->
            </div>
            <!-- /.service-content -->
            <div class="service-image">
				<?php
				$imageID = get_field('featured_image_about_intro');
				$image = wp_get_attachment_image_src( $imageID, 'side-image' );
				$alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
				?> 

				<img class="img-responsive" alt="<?php echo $alt_text; ?>" src="<?php echo $image[0]; ?>" /> 
            </div>
            <!-- /.service-image -->
        </div>
        <!-- /.service-row -->
		

    </section>
    <!-- /#services-boxes -->

    <section id="services-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="intro">
                        <h2><?php the_field('main_title_services_about'); ?></h2>
                        <?php the_field('content_block_serviecs_about_page'); ?>
                    </div>
                    <!-- /.intro -->
                </div>
                <!-- /.col-md-12 -->
            </div>
            <!-- /.row -->
            <div class="row" id="service-boxes">

				<?php
					$post_objects = get_field('services_list_about_page');

					if( $post_objects ): ?>
						<?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
							<?php setup_postdata($post); ?>

							<div class="col-md-4">
								<div class="service-box">
									<div class="services-ico">
										<?php the_field('icon_code_service'); ?>
									</div>
									<!-- /.services-ico -->
									<h3><?php the_title(''); ?></h3>
									<?php the_field('short_description_services'); ?>
									<a href="<?php echo get_permalink(); ?>" class="serv-more">Learn more</a>
									<a href="<?php echo get_permalink(); ?>" class="url-wrap"></a>
								</div>
								<!-- /.service-box -->
							</div>
							<!-- /.col-md-4 -->

						<?php endforeach; ?>
					<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
				<?php endif; ?>

            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /#services-area -->
    <section class="services-boxes">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2><?php the_field('main_title_clients_about'); ?></h2>
                </div>
                <!-- /.col-md-12 -->
            </div>
            <!-- /.row -->
        </div>
        <div class="service-row">
            <div class="service-content">
                <div class="sc-in">
					<?php the_field('content_block_clients_about'); ?>
                </div>
                <!-- /.sc-in -->
            </div>
            <!-- /.service-content -->
            <div class="service-image">
				<?php
				$imageID = get_field('featured_image_about_clients');
				$image = wp_get_attachment_image_src( $imageID, 'side-image' );
				$alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
				?> 

				<img class="img-responsive" alt="<?php echo $alt_text; ?>" src="<?php echo $image[0]; ?>" /> 
            </div>
            <!-- /.service-image -->
        </div>
        <!-- /.service-row -->
    </section>
    <!-- /#services-boxes -->
    <section id="reviews">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2><?php the_field('main_title_reviews_about'); ?></h2>
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
										$post_objects = get_field('yelp_testimonials_about');

										if( $post_objects ): ?>
											<?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
												<?php setup_postdata($post); ?>

												<?php get_template_part( 'loop-templates/content', 'reviews' ); ?>                                              

											<?php endforeach; ?>
										<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
									<?php endif; ?>  	

                                </div>
                                <!-- /.review-slider -->
                                <footer>
                                    <a href="#" class="quote">Get a quote</a>
                                </footer>
                            </div>
                            <div id="review2" class="tab-pane fade">
                                <div class="review-slider">

									<?php
										$post_objects = get_field('bbb_testimonials_about');

										if( $post_objects ): ?>
											<?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
												<?php setup_postdata($post); ?>

												<?php get_template_part( 'loop-templates/content', 'reviews' ); ?>                                                  

											<?php endforeach; ?>
										<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
									<?php endif; ?>  

                                </div>
                                <!-- /.review-slider -->
                                <footer>
                                    <a href="#" class="quote">Get a quote</a>
                                </footer>
                            </div>
                            <div id="review3" class="tab-pane fade">
                                <div class="review-slider">
							
									<?php
										$post_objects = get_field('trust_testimonials_about');

										if( $post_objects ): ?>
											<?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
												<?php setup_postdata($post); ?>

												<?php get_template_part( 'loop-templates/content', 'reviews' ); ?>                                                  

											<?php endforeach; ?>
										<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
									<?php endif; ?>  

                                </div>
                                <!-- /.review-slider -->
                                <footer>
                                    <a href="#" class="quote">Get a quote</a>
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
</div>
<!-- /#about-page -->

<?php get_footer(); ?>
