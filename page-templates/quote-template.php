<?php
/**
 * Template Name: Quote Template
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div id="contact-page">
	<header id="inner-header">
	    <div class="container">
	        <h1><?php the_field('main_title_quote_page'); ?></h1>
	    </div>
	    <!-- /.container -->
	</header>
	<!-- /#inner-header -->
	<div class="container">
		<div class="row" id="contact-page-content">
			<div class="col-md-10">
				<div class="contact-form contact-no--left">
                    <div class="form-holder">
                        <?php the_field('form_code_quote_page'); ?>
                    </div>
				</div>
				<!-- /.contact-form -->
			</div>
			<!-- /.col-md-6 -->
		</div>
		<!-- /.row -->
	</div>
	<!-- /.container -->
</div>
<!-- /#contact-page -->


<div id="services">

	<?php if( have_rows('content_layout_quote_page') ): ?>
		<?php while( have_rows('content_layout_quote_page') ): the_row(); ?>

			<?php if( get_row_layout() == 'main_content' ): ?>

				<section id="services-boxes">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<h2><?php the_sub_field('main_title_main'); ?></h2>
							</div>
							<!-- /.col-md-12 -->
						</div>
						<!-- /.row -->
					</div>

					<?php if( have_rows('content_blocks_main') ): ?>
					   <?php while( have_rows('content_blocks_main') ): the_row(); ?>
							<div class="service-row">
								<div class="service-content">
									<div class="sc-in">
										<h4><?php the_sub_field('title'); ?></h4>
										<?php the_sub_field('content_block'); ?>
									</div>
									<!-- /.sc-in -->
								</div>
								<!-- /.service-content -->
								<div class="service-image">
									<?php
									$imageID = get_sub_field('featured_image_side');
									$image = wp_get_attachment_image_src( $imageID, 'side-image' );
									$alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
									?> 

									<img class="img-responsive" alt="<?php echo $alt_text; ?>" src="<?php echo $image[0]; ?>" /> 
								</div>
								<!-- /.service-image -->
							</div>
							<!-- /.service-row -->						   
					   <?php endwhile; ?>
					<?php endif; ?>

				</section>
				<!-- /#services-boxes -->	

				<?php elseif( get_row_layout() == 'image_left_content_right' ): ?>

					<section id="services-boxes">
						<div class="service-row">
							<div class="service-image">
								<?php
								$imageID = get_sub_field('featured_image_left');
								$image = wp_get_attachment_image_src( $imageID, 'side-image' );
								$alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
								?> 

								<img class="img-responsive" alt="<?php echo $alt_text; ?>" src="<?php echo $image[0]; ?>" /> 
							</div>
							<!-- /.service-image -->						
							<div class="service-content service-content--right">
								<div class="sc-in">
									<h4><?php the_sub_field('main_title_right'); ?></h4>
									<?php the_sub_field('content_block_right'); ?>
								</div>
								<!-- /.sc-in -->
							</div>
							<!-- /.service-content -->
						</div>
						<!-- /.service-row -->	

					</section>
					<!-- /#services-boxes -->		

				<?php elseif( get_row_layout() == 'content_left_image_right' ): ?>

					<section id="services-boxes">
						<div class="service-row">					
							<div class="service-content ">
								<div class="sc-in">
									<h4><?php the_sub_field('main_title_left'); ?></h4>
									<?php the_sub_field('content_block_left'); ?>
								</div>
								<!-- /.sc-in -->
							</div>
							<!-- /.service-content -->
							<div class="service-image">
								<?php
								$imageID = get_sub_field('featured_image_right');
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

				<?php elseif( get_row_layout() == 'full_width_content' ): ?>
				
					<section id="city-landscape">
						<div class="img-float">
							<?php
							$imageID = get_sub_field('background_image_feat');
							$image = wp_get_attachment_image_src( $imageID, 'fullwidth-image' );
							$alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
							?> 

							<img class="img-responsive bg-img" alt="<?php echo $alt_text; ?>" src="<?php echo $image[0]; ?>" /> 		
						</div>
						<!-- // float -->
						<div class="container">
							<div class="row">
								<div class="col-md-7">
									<h3><?php the_sub_field('main_title_full_width'); ?></h3>
									<?Php the_sub_field('content_block_full_width'); ?>
								</div>
								<!-- /.col-md-12 -->
							</div>
							<!-- /.row -->
						</div>
						<!-- /.container -->
					</section>
					<!-- /#city-landscape -->	


					<?php elseif( get_row_layout() == 'faq' ): ?>


					<section id="services-faq" style="background:<?php the_sub_field('background_color'); ?>">
						<div class="container">
							<div class="row">
								<div class="col-lg-5">
									<div class="intro">
										<h3><?php the_sub_field('main_title'); ?></h3>
										<?php the_sub_field('intro_text'); ?>
									</div>
									<!-- /.intro -->
								</div>
								<!-- /.col-lg-5 -->
								<div class="col-lg-7">
									<div class="faq-accordion">
										<?php if( have_rows('faq_list') ): ?>
											<?php while( have_rows('faq_list') ): the_row(); ?>
												<h4><?php the_sub_field('question'); ?></h4>
												<div>
													<?php the_sub_field('answer'); ?>
												</div>												   
											<?php endwhile; ?>
										<?php endif; ?>
									</div>
									<!-- /#faq-accordion -->
								</div>
								<!-- /.col-lg-7 -->
							</div>
							<!-- /.row -->
						</div>
						<!-- /.container -->
					</section>
					<!-- /#services-faq -->					

				<?php elseif( get_row_layout() == 'half_width_content' ): ?>
					
					<section id="city-boxes">

						<div class="city-row">

							<?php if( have_rows('content_blocks_half') ): ?>
							   <?php while( have_rows('content_blocks_half') ): the_row(); ?>
									<div class="city-content">
										<div class="city-in">
											<h4><?php the_sub_field('title'); ?></h4>
											<?php the_sub_field('content_block'); ?>
										</div>
										<!-- /.city-in -->
									</div>
									<!-- /.city-content -->								   
							   <?php endwhile; ?>
							<?php endif; ?>

						</div>
						<!-- /.city-row -->

						
					</section>
					<!-- /#city-boxes -->					

			<?php endif; ?>

		<?php endwhile; ?>
	<?php endif; ?>

</div>
<!-- /#services -->    

<?php get_footer(); ?>
