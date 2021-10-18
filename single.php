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

	<header id="inner-header" class="single-header">
		<div class="container">
			<h1><?php the_title(''); ?></h1>
			<div class="breadcrumb">
				<ul>
				<?php
					 global $post;
					 $categories = get_the_category($post->ID);
					 $cat_link = get_category_link($categories[0]->cat_ID);
					 echo '<li><a href="'.$cat_link.'">'.$categories[0]->cat_name.'</a></li>' 
					 ?>
				</ul>
				<span class="date"><i class="fal fa-clock"></i> <?php echo get_the_date( 'F j, Y' ); ?></span>
			</div>

		</div>
		<!-- /.container -->
	</header>
	<!-- /#inner-header -->

	<div id="blog-detailed">
		<div class="container">

			<?php
				// check if the flexible content field has rows of data
				if( have_rows('content_layout_blog') ):

					// loop through the rows of data
					while ( have_rows('content_layout_blog') ) : the_row();

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

							<?php elseif( get_row_layout() == 'quote_cta' ): ?>	

								<div class="quote-cta--single">
									<span class="title"><?php the_sub_field('cta_title'); ?></span>
									<a href="#bottom-form" class="btn-cta"><?php the_sub_field('button_label'); ?></a>
								</div>
								<!-- // single  -->

								<?php elseif( get_row_layout() == 'featured_article' ): ?>    
									<?php
										$post_objects = get_sub_field('featured_article_list');

										if( $post_objects ): ?>
											<?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
												<?php setup_postdata($post); ?>
													
												<div class="featured-article-box">
													<div class="guide-box">
														<div class="guide-image">
															<a href="<?php echo get_permalink(); ?>" tabindex="0" target="_blank">
															<?php 
															$values = get_field( 'featured_image_blog' );
															if ( $values ) { ?>

																<?php
																$imageID = get_field('featured_image_blog');
																$image = wp_get_attachment_image_src( $imageID, 'blog-image' );
																$alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
																?> 

																<img class="img-responsive" alt="<?php echo $alt_text; ?>" src="<?php echo $image[0]; ?>" /> </a>

															<?php 
															} else { ?>

															<a href="<?php echo get_permalink(); ?>" tabindex="0" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/img/sliders/guide.jpg" alt="" class="img-responsive"></a>

															<?php } ?>
														</div>
														<div class="guide-content">
															<h3><a href="<?php echo get_permalink(); ?>" tabindex="0" target="_blank"><?php the_title(''); ?></a></h3>
															<div class="read-more">
																<a href="<?php echo get_permalink(); ?>" target="_blank">Read More</a>
															</div>
															<!-- /.read-more -->
														</div>
														<!-- /.guide-content -->
													</div>
													<!-- /.guide-box -->
												</div>
												<!-- /.featured-article -->
													
											<?php endforeach; ?>
										<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
									<?php endif; ?>
									<?php wp_reset_postdata(); ?>

								<?php elseif( get_row_layout() == 'table' ): ?>

									<table style="width:100%" class="single-table">
										<thead>
											<tr role="row">

											<?php

												// check if the repeater field has rows of data
												if(have_rows('table_head_cells')):

													// loop through the rows of data
													while(have_rows('table_head_cells')) : the_row();

														$hlabel = get_sub_field('table_cell_label_thead');

														?>  

														<th tabindex="0" rowspan="1" colspan="1"><?php echo $hlabel; ?></th>

													<?php endwhile;

												else :
													echo 'No data';
												endif;
												?>

											</tr>
										</thead>
										<tbody>

										<?php while ( have_posts() ) : the_post(); ?>

											<?php 

											// check for rows (parent repeater)
											if( have_rows('table_body_row') ): ?>
												
												<?php 

												// loop through rows (parent repeater)
												while( have_rows('table_body_row') ): the_row(); ?>

														<?php 

														// check for rows (sub repeater)
														if( have_rows('table_body_cells') ): ?>
															<tr>
																<?php 

																// loop through rows (sub repeater)
																while( have_rows('table_body_cells') ): the_row();

																	
																	?>
																	<td><?php the_sub_field('table_cell_label_tbody'); ?></td>
																<?php endwhile; ?>
															</tr>
														<?php endif; //if( get_sub_field('') ): ?>

												<?php endwhile; // while( has_sub_field('') ): ?>
													
											<?php endif; // if( get_field('') ): ?>

											<?php endwhile; // end of the loop. ?>
											
										</tbody>
									</table>   

						<?php endif;

					endwhile;

				else :

					// no layouts found

			endif; ?>
			<div class="author-desc">
                <?php echo get_avatar( get_the_author_meta( 'ID' ), 60 ); ?>
                <div class="author-content">
                    <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a>
                    <p><?php the_author_description(); ?></p>
                </div>
                <!-- /.author-content -->
            </div>
			<hr>

			<div id="bottom-form">

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
			<!-- // bottom form  -->

		</div>
		<!-- /.container -->
	</div>
	<!-- /#blog-detailed -->

	<section class="similar-posts first-child-box">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Recent posts</h2>
                    <div class="posts-list">
                        <div class="row">

                        <?php
                            $loop = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => 3) ); ?>  
                            <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

							<div class="col-lg-4 col-md-6">
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
									</div>
									<!-- /.guide-content -->
								</div>
								<!-- /.guide-box -->
							</div>
							<!-- /.col-lg-4 col-md-6 --> 

                                <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>    
                        <?php wp_reset_query(); ?>

                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.posts-list -->
                </div>
                <!-- /.col-md-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /.similar-posts -->

    <section class="similar-posts last-child-box">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Related posts</h2>
                    <div class="posts-list">
                        <div class="row">

                            <?php
                                $categories =   get_the_category();
                                // print_r($categories);
                                $rp_query   =  new WP_Query ([
                                    'posts_per_page'        =>  3,
                                    'post__not_in'          =>  [ $post->ID ],
                                    'cat'                   =>  !empty($categories) ? $categories[0]->term_id : null,

                                ]);

                                if ( $rp_query->have_posts() ) {
                                    while( $rp_query->have_posts() ) {
                                        $rp_query->the_post();
                                        ?>

										<div class="col-lg-4 col-md-6">
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
												</div>
												<!-- /.guide-content -->
											</div>
											<!-- /.guide-box -->
										</div>
										<!-- /.col-lg-4 col-md-6 --> 

                                        <?php
                                    }

                                    wp_reset_postdata();

                                }

                            ?>

                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.posts-list -->
                </div>
                <!-- /.col-md-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /.similar-posts -->

	<div class="bottom-cta">
		<div class="bcta-box">
			<h6><?php previous_post_link( '%link', '%title', TRUE ); ?> </h6>
		</div>
		<!-- /.bcta-box -->
		<div class="bcta-box">
			<h6><?php next_post_link( '%link', '%title', TRUE ); ?> </h6>
		</div>
		<!-- /.bcta-box -->
	</div>
	<!-- /.bottom-cta -->

<?php get_footer(); ?>
