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

	<header id="services-header">
		<div class="overlay"></div>
		<?php
		$imageID = get_field('background_image_city');
		$image = wp_get_attachment_image_src( $imageID, 'slider-image' );
		$alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
		?> 

		<img class="img-responsive" alt="<?php echo $alt_text; ?>" src="<?php echo $image[0]; ?>" /> 
		<div class="caption">
			<div class="container">
				<div class="caption__holder">
					<?php 
					$values = get_field( 'custom_title_city_header' );
					if ( $values ) { ?>
						<h2><?php the_field('custom_title_city_header'); ?></h2>
					<?php 
					} else { ?>
						<h2><?php the_title(''); ?></h2>
					<?php } ?>
					<h3>Are you moving <span><a href="javascript:void(0);" class="open-quotex active">to</a> <small>or</small> <a href="javascript:void(0);" class="open-quotex">from</a></span> 
					<?php 
					$values = get_field( 'are_you_moving_to_or_from' );
					if ( $values ) { ?>
						<?php the_field('are_you_moving_to_or_from'); ?>
					<?php 
					} else { ?>
						<?php the_title(''); ?>
					<?php } ?>
					</h3>
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
			<!-- // container  -->
		</div>

		<?php include(TEMPLATEPATH . '/inc/quotepopup-inc.php'); ?>

	</header>
	<!-- /.hero-banner -->

<div id="services">

	<?php if( have_rows('page_layout_city') ): ?>
		<?php while( have_rows('page_layout_city') ): the_row(); ?>

			<?php if( get_row_layout() == 'city_guides' ): ?>

				<section id="city-guides">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<?php 
								$values = get_sub_field( 'main_title' );
								if ( $values ) { ?>
									<h2><?php the_sub_field('main_title'); ?></h2>
								<?php 
								} else { ?>
									<h2>City Guides</h2>
								<?php } ?>
							</div>
							<!-- /.col-md-12 -->
						</div>
						<!-- /.row -->
						<div class="row">
							<div class="col-md-12">
								<div id="guides-slider">
									<?php
										$post_objects = get_sub_field('choose_guides');
										if( $post_objects ): ?>
											<?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
												<?php setup_postdata($post); ?>

												<div class="guide-box">
													<div class="guide-image">
														<?php 
														$values = get_field( 'featured_image_blog' );
														if ( $values ) { ?>

															<?php
															$imageID = get_field('featured_image_blog');
															$image = wp_get_attachment_image_src( $imageID, 'blog-image' );
															$alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
															?> 

															<img class="img-responsive" alt="<?php echo $alt_text; ?>" src="<?php echo $image[0]; ?>" /> 

														<?php 
														} else { ?>

															<img src="<?php bloginfo('template_directory'); ?>/img/sliders/guide.jpg" alt="" class="img-responsive">

														<?php } ?>
														<a href="<?php echo get_permalink(); ?>" tabindex="0"><span><i class="fal fa-long-arrow-right"></i></span></a>
													</div>
													<div class="guide-content">
														<span class="date"><i class="fal fa-clock"></i> <?php echo get_the_date( 'F j, Y' ); ?></span>
														<h5><a href="<?php echo get_permalink(); ?>" tabindex="0"><?php the_title(''); ?></a></h5>
														<p><?php the_field('excerpt_text'); ?></p>
													</div>
													<!-- /.guide-content -->
												</div>
												<!-- /.guide-box -->

											<?php endforeach; ?>
										<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
									<?php endif; ?>									

								</div>
								<!-- /#guides-slider -->
							</div>
							<!-- /.col-md-12 -->
						</div>
						<!-- /.row -->
					</div>
					<!-- /.container -->
				</section>
				<!-- /#city-guides -->				

			<?php elseif( get_row_layout() == 'reviews' ): ?>

				<section id="reviews">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<?php 
								$values = get_sub_field( 'main_title_reviews' );
								if ( $values ) { ?>
									<h2><?php the_sub_field('main_title_reviews'); ?></h2>
								<?php 
								} else { ?>
									<h2>Reviews</h2>
								<?php } ?>								
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
													$post_objects = get_sub_field('yelp_testimonials');

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
												<a href="<?php bloginfo('url'); ?>/moving-quote/" class="quote">Get a quote</a>
											</footer>
										</div>
										<div id="review2" class="tab-pane fade">
											<div class="review-slider">

												<?php
													$post_objects = get_sub_field('bbb_testimonials');

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
												<a href="<?php bloginfo('url'); ?>/moving-quote/" class="quote">Get a quote</a>
											</footer>
										</div>
										<div id="review3" class="tab-pane fade">
											<div class="review-slider">

												<?php
													$post_objects = get_sub_field('trust_testimonials');

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
												<a href="<?php bloginfo('url'); ?>/moving-quote/" class="quote">Get a quote</a>
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

			<?php elseif( get_row_layout() == 'prepare_your_move' ): ?>

				<section id="prepare">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<?php 
								$values = get_sub_field( 'main_title_prepare' );
								if ( $values ) { ?>
									<h2><?php the_sub_field('main_title_prepare'); ?></h2>
								<?php 
								} else { ?>
									<h2>Prepare For Your Move</h2>
								<?php } ?>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div id="prepare-slider">
									<?php
										$post_objects = get_sub_field('select_post_move');

										if( $post_objects ): ?>
											<?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
												<?php setup_postdata($post); ?>

													<div class="prepare-box">
														<div class="prepare-image">

															<?php 
															$values = get_field( 'featured_image_blog' );
															if ( $values ) { ?>

																<?php
																$imageID = get_field('featured_image_blog');
																$image = wp_get_attachment_image_src( $imageID, 'blog-image' );
																$alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
																?> 

																<img class="img-responsive" alt="<?php echo $alt_text; ?>" src="<?php echo $image[0]; ?>" /> 

															<?php 
															} else { ?>

																<img src="<?php bloginfo('template_directory'); ?>/img/sliders/guide.jpg" alt="" class="img-responsive">

															<?php } ?>
															
															<a href="<?php echo get_permalink(); ?>" tabindex="0"><span><i class="fal fa-long-arrow-right"></i></span></a>
														</div>
														<!-- /.prepare-content -->
														<div class="prepare-content">
															<h5><a href="<?php echo get_permalink(); ?>" tabindex="0"><?php the_title(''); ?></a></h5>
														</div>
														<!-- /.prepare-content -->
													</div>
													<!-- /.prepare-box -->

											<?php endforeach; ?>
										<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
									<?php endif; ?>									

								</div>
								<!-- /#prepare-slider -->
							</div>
							<!-- /.col-md-12 -->
						</div>
						<!-- /.row --> 
					</div>
					<!-- /.container -->
				</section>
				<!-- /#prepare -->		
				
			<?php elseif( get_row_layout() == 'services_section' ): ?>

				<section id="services-area">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<?php 
								$values = get_sub_field( 'main_title_services' );
								if ( $values ) { ?>
									<h2><?php the_sub_field('main_title_services'); ?></h2>
								<?php 
								} else { ?>
									<h2>Prepare For Your Move</h2>
								<?php } ?>
							</div>
							<!-- /.col-md-12 -->
						</div>
						<!-- /.row -->
						<div class="row" id="service-boxes">

							<?php
								$post_objects = get_sub_field('select_services');

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

			<?php elseif( get_row_layout() == 'the_moving_process' ): ?>

				<section id="moving-process">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<?php 
								$values = get_sub_field( 'main_title' );
								if ( $values ) { ?>
									<h2><?php the_sub_field('main_title'); ?></h2>
								<?php 
								} else { ?>
									<h2>The Moving Process</h2>
								<?php } ?>
							</div>
							<!-- /.col-md-12 -->
						</div>
						<!-- /.row -->
						<div class="row">
							<div class="col-md-12">
								<div class="steps">
									<ol>
										<li class="completed">
											<div class="step">
												<div class="step-content">
													<h4>Fill in the Quote Form</h4>
													<p>Best way to get in touch and get a price estimate is to fill out a quote form and you will be contacted often in matter of minutes, but definitely in less than 24 hours. If you don’t feel like typing, just give us a call.</p>
													<a href="tel:877-299-3827" class="call"><i class="fas fa-phone-alt"></i>877-299-3827</a>
												</div>
												<!-- /.step-in -->
												<div class="step-ico">
													<i class="fal fa-file-signature"></i>
												</div>
											</div>
											<!-- /.step -->
										</li>
										<li class="active">
											<div class="step">
												<div class="step-content">
													<h4>Get in Touch with a Relocation Specialist</h4>
													<p>Your (very) dedicated relocation specialist will guide you through the process, explain everything, and be there every step of the way. Together you will create a moving inventory list with which you will get a guaranteed price.</p>
												</div>
												<!-- /.step-in -->
												<div class="step-ico">
													<i class="fal fa-user-headset"></i>
												</div>
											</div>
											<!-- /.step -->
										</li>
										<li>
											<div class="step">
												<div class="step-content">
													<h4>Sign the Documents</h4>
													<p>Once the details have been hammered out, it’s time to hammer them in with a binding agreement that’s meant to protect you and your things. You will get your personal reference number which you will use for shipment tracking and future inquiries.</p>
												</div>
												<!-- /.step-in -->
												<div class="step-ico">
													<i class="fal fa-file-contract"></i>
												</div>
											</div>
											<!-- /.step -->
										</li>
										<li>
											<div class="step">
												<div class="step-content">
													<h4>Move Effortlessly.</h4>
													<p>Yes, it is that simple. Our expert movers will pack all your belongings, protect them, load them carefully and send them on their way. The same goes for unloading. Experience a true white glove moving service. That’s it!</p>
												</div>
												<!-- /.step-in -->
												<div class="step-ico">
													<i class="fal fa-truck"></i>
												</div>
											</div>
											<!-- /.step -->
										</li>
									</ol>
								</div>
								<!-- /.steps --> 
							</div>
							<!-- /.col-md-12 -->
						</div>
						<!-- /.row -->
						<div class="row">
							<div class="col-md-12">
								<footer>
									<a href="<?php bloginfo('url'); ?>/moving-quote/" class="quote">Get a Quote</a>
								</footer>
							</div>
							<!-- /.col-md-12 -->
						</div>
						<!-- /.row -->
					</div>
					<!-- /.container -->
				</section>
				<!-- /#moving-process -->				

			<?php elseif( get_row_layout() == 'main_content' ): ?>

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
