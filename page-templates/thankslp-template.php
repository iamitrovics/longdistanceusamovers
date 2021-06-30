<?php
/**
 * Template Name: Thank You  Template
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header('lp');
$container = get_theme_mod( 'understrap_container_type' );
?>

	<div id="error-page">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1><?php the_field('main_title_thank_you'); ?></h1>
					<p><?php the_field('content_block_thank_you'); ?></p>
				</div>
				<!-- /.col-md-12 -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container -->
		<img src="<?php bloginfo('template_directory'); ?>/img/bg/404.svg" alt="">
	</div>
	<!-- /#error-page -->

<?php get_footer('lp'); ?>
