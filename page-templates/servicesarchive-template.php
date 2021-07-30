<?php
/**
 * Template Name: Services Landing Template
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
		$imageID = get_field('background_image_services_landing');
		$image = wp_get_attachment_image_src( $imageID, 'slider-image' );
		$alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
		?> 

		<img class="img-responsive" alt="<?php echo $alt_text; ?>" src="<?php echo $image[0]; ?>" /> 
		<div class="caption">
			<div class="container">
				<div class="caption__holder">

					<?php 
					$values = get_field( 'custom_title_services_landing' );
					if ( $values ) { ?>

						<h1><?php the_field('custom_title_services_landing'); ?></h1>

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
        
	</header>
	<!-- /.hero-banner -->

<div id="about-page">

    <section id="services-area" class="services-landing">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="intro">
                        <h2><?php the_field('main_title_services_landing'); ?></h2>
                        <?php the_field('content_block_services_landing'); ?>
                    </div>
                    <!-- /.intro -->
                </div>
                <!-- /.col-md-12 -->
            </div>
            <!-- /.row -->
            <div class="row" id="service-boxes">

				<?php
					$post_objects = get_field('services_list_services_landing');

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

<div id="services-page">
    <section id="quote-call">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="quote-call-in">
                        <a href="<?php the_field('quote_button_link_services_landing'); ?>" class="quote"><?php the_field('quote_button_label_services_landing'); ?></a>
                        <div class="call">
                            <a href="tel:<?php the_field('phone_number_services_landing'); ?>" class="call"><?php the_field('phone_number_services_landing'); ?></a>
                            <span><?php the_field('phone_notice_services_landing'); ?></span>
                        </div>
                        <!-- /.call -->
                        
                    </div>
                    <!-- /.quote-call-in -->
                </div>
                <!-- /.col-md-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /#quote-call -->		

    <section id="service-features">
        <div class="container">
            <div class="row">
                <?php if( have_rows('features_list_services_landing') ): ?>
                    <?php while( have_rows('features_list_services_landing') ): the_row(); ?>
                        <div class="col-md-6">
                            <div class="sf-box">
                                <h4><?php the_sub_field('icon_code'); ?> <?php the_sub_field('title'); ?></h4>
                                <?php the_sub_field('content_block'); ?>
                            </div>
                            <!-- /.sf-box -->
                        </div>
                        <!-- /.col-md-4 -->									   
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /#service-features -->	
</div>
<!-- /#services-page -->	
</div>
<!-- /#about-page -->

<?php get_footer(); ?>
