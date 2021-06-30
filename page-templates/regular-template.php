<?php
/**
 * Template Name: Regular Template
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

    <header id="inner-header" class="single-header">
		<div class="container">
			<h1><?php the_title(''); ?></h1>
		</div>
		<!-- /.container -->
	</header>
	<!-- /#inner-header -->

	<div id="blog-detailed">
		<div class="container">

			<?php
				// check if the flexible content field has rows of data
				if( have_rows('content_layout_regular') ):

					// loop through the rows of data
					while ( have_rows('content_layout_regular') ) : the_row();

						if( get_row_layout() == 'intro_text' ): ?>

						<div class="row">
							<div class="col-lg-12">								

							<div class="intro__content">
								<?php the_sub_field('intro_content'); ?>
							</div>
							<!-- // intro  -->

							</div>
							<!-- // content  -->
						</div>
						<!-- // row  -->									

						<?php elseif( get_row_layout() == 'full_width_content' ): ?>

						<div class="row">
							<div class="col-md-12">
								<div class="blog__main">
									<?php the_sub_field('content_block'); ?>
								</div>
								<!-- // main  -->
							</div>
							<!-- /.col-md-12 -->
						</div>
						<!-- /.row -->								

						<?php elseif( get_row_layout() == 'full_width_image' ): ?>

							<div class="row">
								<div class="col-md-12">
									<div class="blog-photo">
										<?php
										$imageID = get_sub_field('featured_image');
										$image = wp_get_attachment_image_src( $imageID, 'fullwidth-image' );
										$alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
										?> 

										<?php 
										$values = get_sub_field( 'image_alt_text' );
										if ( $values ) { ?>
											<img class="img-responsive" alt="<?php the_sub_field('image_alt_text'); ?>" src="<?php echo $image[0]; ?>" /> 
										<?php 
										} else { ?>
											<img class="img-responsive" alt="<?php echo $alt_text; ?>" src="<?php echo $image[0]; ?>" /> 
										<?php } ?>

										<?php if( get_sub_field('image_caption') ): ?>
										<div class="image__caption">
											<span><?php the_sub_field('image_caption'); ?></span>
										</div>
										<?php endif; ?>

									</div>
									<!-- /.blog-photo -->
								</div>
								<!-- // col  -->
							</div>
						
						<?php elseif( get_row_layout() == 'half_width_image' ): ?>
						<?php elseif( get_row_layout() == 'table_of_contents' ): ?>

						<?php elseif( get_row_layout() == 'quote' ): ?>	

							<blockquote>
								<?php the_sub_field('quotation_content'); ?>
								<?php if( get_sub_field('source') ): ?>
								<span class="author">- <?php the_sub_field('source'); ?></span>
								<?php endif; ?>
							</blockquote>	

						<?php elseif( get_row_layout() == 'video' ): ?>	

							<div class="video__holder">
								<?php the_sub_field('embedded_code'); ?>
							</div>	
							
						<?php elseif( get_row_layout() == 'accordion' ): ?>	

								<div class="accordion-section">
									<?php if( get_sub_field('accordion_title') ): ?>
										<h3><?php the_sub_field('accordion_title'); ?></h3>
									<?php endif; ?>
									<div class="faq-accordion">
									<?php if( have_rows('accordion_list') ): ?>
										<?php while( have_rows('accordion_list') ): the_row(); ?>
											<span class="h4"><?php the_sub_field('heading'); ?></span>
											<div class="panel">
											<?php the_sub_field('content'); ?>
											</div>
										<?php endwhile; ?>
									<?php endif; ?>
									</div>
									<!-- // acc  -->
								</div>
								<!-- // section  -->

						<?php endif;

					endwhile;

				else :

					// no layouts found

			endif; ?>

		</div>
		<!-- /.container -->
        </div>
	<!-- /#blog-detailed -->

<?php get_footer(); ?>
