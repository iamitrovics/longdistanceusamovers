<?php
/**
 * Custom image sizes
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// general
add_image_size('preview-image', 300, 200, TRUE);

// Home
add_image_size('slider-image', 1920, 1080, TRUE);
add_image_size('video-image', 480, 360, TRUE);
add_image_size('test-image', 116, 116, TRUE);

// Blog
add_image_size('blog-image', 500, 245, TRUE);

// City
add_image_size('side-image', 960, 650, TRUE);
add_image_size('fullwidth-image', 1100, 9999, FALSE);

// Services
add_image_size('imageleft-image', 550, 425, TRUE);
add_image_size('long-image', 800, 600, TRUE);
