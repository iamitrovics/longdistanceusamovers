<?php
/**
 * Template Name: Contact Template
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div id="contact-page">
	<header id="inner-header">
	    <div class="container">
	        <h1><?php the_field('main_title_contact_page'); ?></h1>
	    </div>
	    <!-- /.container -->
	</header>
	<!-- /#inner-header -->
	<div class="container">
		<div class="row" id="contact-page-content">
			<div class="col-md-6">
				<div class="contact-form">
					<?php the_field('form_code_contact_page'); ?>
				</div>
				<!-- /.contact-form -->
			</div>
			<!-- /.col-md-6 -->		
			<div class="col-md-5 offset-md-1">
				<div class="contact-more-info">
                    <?php the_field('company_info_contact_page'); ?>
				</div>
				<!-- /.contact-more-info -->
			</div>
			<!-- /.col-md-6 -->
		</div>
		<!-- /.row -->
	</div>
	<!-- /.container -->
</div>
<!-- /#contact-page -->

<?php get_footer(); ?>
