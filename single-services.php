<?php
/**
 * The template for displaying all single posts.
 *
 * @package understrap
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
		$imageID = get_field('background_image_service_single');
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


	<div id="services-page">
	
		<?php if( have_rows('content_layout_services') ): ?>
			<?php while( have_rows('content_layout_services') ): the_row(); ?>
				<?php if( get_row_layout() == 'small_cta' ): ?>

					<section id="quote-call">
						<div class="container">
							<div class="row">
								<div class="col-md-12">
									<div class="quote-call-in">
										<a href="<?php the_sub_field('button_1_link_pager'); ?>" class="quote"><?php the_sub_field('button_1_label'); ?></a>
										<div class="call">
											<a href="tel:877-299-3827" class="call"><?php the_sub_field('phone_number'); ?></a>
											<span><?php the_sub_field('phone_notice'); ?></span>
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
					
				<?php elseif( get_row_layout() == 'service_features' ): ?>

					<section id="service-features">
						<div class="container">
							<div class="row">
								<?php if( have_rows('features_list') ): ?>
								   <?php while( have_rows('features_list') ): the_row(); ?>
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
					
					<?php elseif( get_row_layout() == 'image_left_content_right' ): ?>
						<section class="service-regular-area" style="background:<?php the_sub_field('background_color_imgleft'); ?>;">
							<div class="container">
								<div class="row">
									<div class="col-md-6">
										<div class="cost-photo">
											<?php
											$imageID = get_sub_field('featured_image');
											$image = wp_get_attachment_image_src( $imageID, 'imageleft-image' );
											$alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
											?> 

											<img class="img-responsive" alt="<?php echo $alt_text; ?>" src="<?php echo $image[0]; ?>" /> 
										</div>
										<!-- /.cost-photo -->
									</div>
									<!-- /.col-md-6 -->									
									<div class="col-md-6">
										<div class="cost-content">
											<h3><?php the_sub_field('main_title'); ?></h3>
											<h6><?php the_sub_field('subtitle'); ?></h6>
											<?php the_sub_field('content_block'); ?>
										</div>
										<!-- /.cost-content -->
									</div>
									<!-- /.col-md-6 -->

									
								</div>
								<!-- /.row -->
							</div>
							<!-- /.container -->
						</section>
						<!-- /.service-regular-area -->

					<?php elseif( get_row_layout() == 'long_content' ): ?>

						<div id="long-content">
							<div class="container">
								<header>
									<h3><?php the_sub_field('main_title'); ?></h3>
								</header>
								<div class="row">

									<div class="col-lg-6">
										<div class="main__content">
											<?php the_sub_field('content_block'); ?>
										</div>
									</div>
									<!-- // col lg 7  -->

									<div class="col-lg-6">
										<div class="main__image">
												<?php
												$imageID = get_sub_field('featured_image');
												$image = wp_get_attachment_image_src( $imageID, 'long-image' );
												$alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
												?> 

												<img class="img-responsive" alt="<?php echo $alt_text; ?>" src="<?php echo $image[0]; ?>" /> 
										</div>
									</div>
									<!-- // image  -->

								</div>
							</div>
						</div>
						<!-- // long content  -->

					<?php elseif( get_row_layout() == 'features_centered' ): ?>

						<section id="service-price" style="background-image: url(<?php the_sub_field('background_image_feat'); ?>);">
							<div class="overlay"></div>
							<div class="container">
								<div class="row">
									<div class="col-md-12">
										<div class="sp-in">
											<div class="intro">
												<?php the_sub_field('intro_text'); ?>
											</div>
											<!-- /.intro -->
											<div class="price-options">
												<div class="row">
													<?php if( have_rows('features_list_repe') ): ?>
													   <?php while( have_rows('features_list_repe') ): the_row(); ?>
														<div class="col-md-4">
															<h6><?php the_sub_field('icon_code'); ?> <?php the_sub_field('label'); ?></h6>
														</div>
														<!-- /.col-md-4 -->														   
													   <?php endwhile; ?>
													<?php endif; ?>
												</div>
												<!-- /.row -->
											</div>
											<!-- /.price-options -->
										</div>
										<!-- /.sp-in -->
									</div>
									<!-- /.col-md-12 -->
								</div>
								<!-- /.row -->
							</div>
							<!-- /.container -->
						</section>
						<!-- /#service-price -->

					<?php elseif( get_row_layout() == 'multi_column_blocks' ): ?>

						<section id="service-price-description" style="background:<?php the_sub_field('background_color_cols'); ?>">
							<div class="container">
								<?php if( get_sub_field('main_title_cols') ): ?>
								<header>
									<h3><?php the_sub_field('main_title_cols'); ?></h3>
								</header>
								<?php endif; ?>
								<div class="row">
									<?php if( have_rows('content_blocks') ): ?>
									   <?php while( have_rows('content_blocks') ): the_row(); ?>
											<div class="col">
												<?php if( get_sub_field('subtitle') ): ?>
													<h4><?php the_sub_field('subtitle'); ?></h4>
												<?php endif; ?>
												<?php the_sub_field('content'); ?>
											</div>
											<!-- /.col -->										   
									   <?php endwhile; ?>
									<?php endif; ?>
								</div>
								<!-- /.row -->
							</div>
							<!-- /.container -->
						</section>
						<!-- /#service-price-description -->						

					<?php elseif( get_row_layout() == 'big_cta' ): ?>

						<div id="big-cta">
							<div class="container">
								<div class="row">
									<div class="col-md-12">
										<div class="get-estimate">
											<h6><?php the_sub_field('main_title'); ?></h6>
											<a href="<?php the_sub_field('button_link_quoter'); ?>" class="quote"><?php the_sub_field('button_label'); ?></a>
											<div class="call">
												<span><?php the_sub_field('phone_notice'); ?></span>
												<a href="tel:<?php the_sub_field('phone_number'); ?>" class="call"><?php the_sub_field('phone_number'); ?></a>
											</div>
											<!-- /.call -->
										</div>
										<!-- /.get-estimate -->
									</div>
									<!-- /.col-md-12 -->
								</div>
								<!-- /.row -->								
							</div>
						</div>

					<?php elseif( get_row_layout() == 'content_left_image_right' ): ?>

						<section class="service-regular-area" style="background:<?php the_sub_field('background_color_imgright'); ?>">
							<div class="container">
								<div class="row">
									<div class="col-md-6">
										<div class="cost-content">
											<h3><?php the_sub_field('main_title'); ?></h3>
											<h6><?php the_sub_field('subtitle'); ?></h6>
											<?php the_sub_field('content_block'); ?>
										</div>
										<!-- /.cost-content -->
									</div>
									<!-- /.col-md-6 -->
									<div class="col-md-6">
										<div class="cost-photo">
											<?php
											$imageID = get_sub_field('featured_image');
											$image = wp_get_attachment_image_src( $imageID, 'imageleft-image' );
											$alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
											?> 

											<img class="img-responsive" alt="<?php echo $alt_text; ?>" src="<?php echo $image[0]; ?>" /> 
										</div>
										<!-- /.cost-photo -->
									</div>
									<!-- /.col-md-6 -->
								</div>
								<!-- /.row -->
							</div>
							<!-- /.container -->
						</section>
						<!-- /.service-regular-area -->

					<?php elseif( get_row_layout() == 'data_table' ): ?>


						<div id="carrier-options">
							<div class="container">
								<div class="row carrier-content">
									<?php if( have_rows('content_blocks') ): ?>
									   <?php while( have_rows('content_blocks') ): the_row(); ?>
											<div class="col">
												<div class="carrier-box">
													<h5><?php the_sub_field('main_title'); ?></h5>
													<?php the_sub_field('content'); ?>
												</div>
												<!-- /.carrier-box -->
											</div>
											<!-- /.col -->										   
									   <?php endwhile; ?>
									<?php endif; ?>
								</div>
								<!-- /.row -->
								<div class="row">
									<div class="col-md-12">
										<div class="carrier-table">
											<table>
												<thead>
													<tr>
														<?php if( have_rows('table_headings') ): ?>
														   <?php while( have_rows('table_headings') ): the_row(); ?>
															   <th><?php the_sub_field('label'); ?></th>
														   <?php endwhile; ?>
														<?php endif; ?>
													</tr>
												</thead>
												<tbody>
													<?php if( have_rows('table_rows') ): ?>
													   <?php while( have_rows('table_rows') ): the_row(); ?>
															<tr>
																<td><?php the_sub_field('label'); ?></td>
																<td>
																	<?php the_sub_field('feature'); ?>  																	
																</td>
																<td>
																	<?php the_sub_field('feature_2'); ?>  
																</td>
															</tr>														   
													   <?php endwhile; ?>
													<?php endif; ?>
												</tbody>
											</table>
										</div>
										<!-- /.carrier-table -->
									</div>
									<!-- /.col-md-12 -->
								</div>
								<!-- /.row -->
							</div>
							<!-- /.container -->
						</div>
						<!-- /#carrier-options -->						

					<?php elseif( get_row_layout() == 'delivery_options' ): ?>

						<section id="delivery-options">
							<div class="container">
								<div class="row delivery-content">
									<?php if( have_rows('content_blocks_delivery') ): ?>
									   <?php while( have_rows('content_blocks_delivery') ): the_row(); ?>
											<div class="col">
												<div class="delivery-box">
													<h5><?php the_sub_field('main_title'); ?></h5>
													<?php the_sub_field('content'); ?>
												</div>
												<!-- /.carrier-box -->
											</div>
											<!-- /.col -->										   
									   <?php endwhile; ?>
									<?php endif; ?>
								</div>
								<!-- /.row -->
							</div>
							<!-- /.container -->
						</section>
						<!-- /#delivery-options -->

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

											<div class="accordion-section">
												<div class="faq-accordion">
												<?php if( have_rows('faq_list') ): ?>
													<?php while( have_rows('faq_list') ): the_row(); ?>

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
										<!-- /#faq-accordion -->
									</div>
									<!-- /.col-lg-7 -->
								</div>
								<!-- /.row -->
							</div>
							<!-- /.container -->
						</section>
						<!-- /#services-faq -->

					<?php elseif( get_row_layout() == 'intro_text' ): ?>

						<div id="intro--text">
							<div class="container">
								<div class="row">
									<div class="col-md-10 offset-md-1">
										<div class="content-holder">
											<h3><?php the_sub_field('main_title'); ?></h3>
											<?php the_sub_field('content_block'); ?>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- // intro  -->

					<?php elseif( get_row_layout() == 'quote_cta' ): ?>

						<div id="estimate-service">
							<div class="container">
								<div class="row">
									<div class="col-md-0 offset-md-1">
										<div class="get-estimate">
											<h6><?php the_sub_field('main_title') ;?></h6>
											<?php the_sub_field('content_block_quote'); ?>
											<?php if( get_sub_field('button_label') ): ?>
											<a href="<?php the_sub_field('button_link_quote_inner'); ?>" class="quote"><?php the_sub_field('button_label'); ?></a>
											<?php endif; ?>
											<?php if( get_sub_field('phone_number') ): ?>
											<div class="call">
												<span><?php the_sub_field('phone_notice'); ?></span>
												<a href="tel:<?php the_sub_field('phone_number'); ?>" class="call"><?php the_sub_field('phone_number'); ?></a>
											</div>
											<!-- /.call -->
											<?php endif; ?>
										</div>
										<!-- /.get-estimate -->
									</div>
									<!-- /.col-md-12 -->
								</div>
								<!-- /.row -->								
							</div>
						</div>

				<?php endif; ?>
			<?php endwhile; ?>
		<?php endif; ?>
	
</div>
<!-- /#services-page -->	

<?php get_footer(); ?>
