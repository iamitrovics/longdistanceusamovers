<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

	<div id="error-page">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1><?php the_field('main_title_ermac', 'options'); ?></h1>
					<h2><?php the_field('subtitle_ermac', 'options'); ?></h2>
				</div>
				<!-- /.col-md-12 -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container -->
		<img src="<?php bloginfo('template_directory'); ?>/img/bg/404.svg" alt="">
	</div>
	<!-- /#error-page -->

<?php get_footer(); ?>
