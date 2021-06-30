<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<div class="review-box">
    <div class="review-person-info">
        <div class="review-image">

            <?php 
            $values = get_field( 'client_photo_test' );
            if ( $values ) { ?>

                <?php
                $imageID = get_field('client_photo_test');
                $image = wp_get_attachment_image_src( $imageID, 'test-image' );
                $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
                ?> 

                <img class="img-responsive" alt="<?php echo $alt_text; ?>" src="<?php echo $image[0]; ?>" /> 

            <?php 
            } else { ?>

                <img src="<?php bloginfo('template_directory'); ?>/img/misc/person.jpg" alt="">

            <?php } ?>
        
        </div>
        <!-- /.review-image -->
        <div class="review-content">
            <span class="name"><?php the_title(''); ?></span>
            <span class="date"><?php the_field('date_test'); ?></span>

            <span class="address"><?php the_field('city_test'); ?></span>
            <div class="rating">
                <span class="mr-star-rating"> 
                    <?php if (get_field('score_test') == '4') { ?>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fal fa-star"></i>
                    <?php } elseif (get_field('score_test') == '4.5') { ?>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    <?php } elseif (get_field('score_test') == '5') { ?>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    <?php } ?>    

                </span>
            </div>
            <!-- /.rating -->
        </div>
        <!-- /.review-content -->
    </div>
    <!-- /.review-person-info -->
    <div class="review-text">
        <?php the_field('testimonials_content_test'); ?>
    </div>
    <!-- /.review-text -->
</div>
<!-- /.review-box -->    