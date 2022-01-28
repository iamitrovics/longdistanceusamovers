<?php get_header(); ?>

<header id="inner-header">
        <div class="container">
            <h1><?php single_cat_title(); ?></h1>
            <div class="breadcrumb">
                <ul>
                    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li>
                    <?php
					 global $post;
					 $categories = get_the_category($post->ID);
					 $cat_link = get_category_link($categories[0]->cat_ID);
					 echo '<li><a href="'.$cat_link.'">'.$categories[0]->cat_name.'</a></li>' 
					 ?>
                </ul>
            </div>
        </div>
        <!-- /.container -->
    </header>
    <!-- /#inner-header -->

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="blog-filters">
                    <ul>
                        <li><a href="<?php bloginfo('url'); ?>/classic-blog/">All</a></li>
                        <?php wp_list_categories('title_li='); ?>
                    </ul>
                </div>
                <!-- /.blog-filters -->
            </div>
            <!-- /.col-md-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->

    <div id="blog-listing">
        <div class="container">
            <div class="row blog-list">

            <?php while ( have_posts() ) : the_post(); ?>
                                    
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
                            <p><?php the_field('excerpt_text'); ?></p>
                        </div>
                        <!-- /.guide-content -->
                    </div>
                    <!-- /.guide-box -->
                </div>
                <!-- /.col-lg-4 col-md-6 -->                          
                
                 <?php endwhile; // end of the loop. ?> 

            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="pagination">
                        <?php if( function_exists('wp_pagenavi') ) wp_pagenavi(); // WP-PageNavi function ?>
                    </div>
                    <!-- /.pagination -->
                </div>
                <!-- /.col-md-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /#blog-listing --> 

<?php get_footer(''); ?>