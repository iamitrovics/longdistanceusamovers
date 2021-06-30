<?php
/* 
Template Name: Dictionary Template 
*/
get_header(); ?>

    <div id="search-wrapper">

        <header id="inner-header">
            <div class="container">
            <h1><?php   // Get terms for post
					$terms = get_the_terms( $post->ID , 'states' );
					// Loop over each item since it's an array
					if ( $terms != null ){
					foreach( $terms as $term ) {
					$term_link = get_term_link( $term, 'states' );
					 // Print the name and URL
					echo '<a href="' . $term_link . '">' . $term->name . '</a>';
					// Get rid of the other data stored in the object, since it's not needed
					unset($term); } } ?></h1>
            </div>
            <!-- /.container -->
        </header>
        <!-- /#inner-header -->

        <div id="search-page">
            <div class="container">
            
                <div class="row">
                    <div class="col-lg-6">
                    
                        <?php if (!have_posts()): ?>

                        <div id="no-posts">
                            <h2>No posts found.</h2>
                            <p>Sorry, we found 0 posts for your search, Please try searching again.</p>

                            <div class="map-search">

                                <form role="search" action="<?php echo site_url('/'); ?>" method="get" id="searchform">
                                    <input type="search" name="s" placeholder="Enter the name of your city"/>
                                    <button type="submit" alt="Search" value="">GO</button>
                                    <input type="hidden" name="post_type" value="cities" />

                                </form>
                            </div>
                            <!-- /.map-search -->

                        </div>
                        <!-- // no posts  -->

                        <?php endif; ?>		                
                    
                    </div>
                </div>
                <!-- // row  -->

                <div class="row" id="cities-results">

                <?php while ( have_posts() ) : the_post(); ?>

                    <div class="col-lg-4">

                        <div class="prepare-box">
                            <div class="prepare-image">
                                <?php
                                $imageID = get_field('background_image_city');
                                $image = wp_get_attachment_image_src( $imageID, 'blog-image' );
                                $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
                                ?> 

                                <img class="img-responsive" alt="<?php echo $alt_text; ?>" src="<?php echo $image[0]; ?>" /> 
                                <a href="<?php echo get_permalink(); ?>" tabindex="0"><span><i class="fal fa-long-arrow-right"></i></span></a>
                            </div>
                            <!-- /.prepare-content -->
                            <div class="prepare-content">
                                <h5><a href="<?php echo get_permalink(); ?>" tabindex="0"><?php the_title(''); ?></a></h5>
                            </div>
                            <!-- /.prepare-content -->
                        </div>
                        <!-- /.prepare-box -->

                    </div>

                <?php endwhile; // end of the loop. ?> 	

                </div>
                <!-- // row  -->

            </div>
            <!-- // container  -->
        </div>
        <!-- // search page  -->

    </div>
    <!-- // wrapper  -->




<?php get_footer(); ?>