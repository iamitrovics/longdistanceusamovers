<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$container = get_theme_mod( 'understrap_container_type' );
?>

	<footer id="page-footer">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="cert-secure">
						<div class="ceritifactions">
							<?php if( have_rows('cert_list_footer', 'options') ): ?>
							<?php while( have_rows('cert_list_footer', 'options') ): the_row(); ?>
								<a href="<?php the_sub_field('link_to_cert'); ?>"><img src="<?php the_sub_field('icon'); ?>" alt=""></a>
							<?php endwhile; ?>
							<?php endif; ?>
						</div>
						<!-- /.ceritifactions -->
						<?php the_field('html_certs_footer', 'options'); ?>
						<span class="code"><?php the_field('licence_code_footer', 'options'); ?></span>
					</div>
					<!-- /.cert-secure -->
				</div>
				<!-- /.col -->
				<div class="col">
					<div class="timings">
						<h4><?php the_field('title_footer_hours', 'options'); ?></h4>
						<a href="tel:<?php the_field('phone_number_footer', 'options'); ?>"><?php the_field('phone_number_footer', 'options'); ?></a>
						<span><?php the_field('work_hours_footer', 'options'); ?></span>
					</div>
					<!-- /.newsletter -->
				</div>
				<!-- /.col -->
				<div class="col">
					<div class="footer-sitemap">
						<h4><?php the_field('title_footer_services', 'options'); ?></h4>
						<?php wp_nav_menu( array( 'theme_location' => 'services-sitemap' ) ); ?>
					</div>
					<!-- /.in-touch -->
				</div>
				<!-- /.col -->
				<div class="col">
					<div class="follow-us">
						<ul>
							<?php if( have_rows('social_networks_general', 'options') ): ?>
							   <?php while( have_rows('social_networks_general', 'options') ): the_row(); ?>
								   <li><a href="<?php the_sub_field('link_to_social'); ?>" target="_blank"><?php the_sub_field('icon_code'); ?></a></li>
							   <?php endwhile; ?>
							<?php endif; ?>
						</ul>
						<div class="footnote">
							<?php the_field('about_company_footer', 'options'); ?>
						</div>
						<!-- /.footnote -->
					</div>
					<!-- /.follow-us -->
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container -->
	</footer>
	<!-- /#page-footer -->
	<div class="copy-bar">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="copy-bar-in">
						<small>&copy; Copyright <?php echo(date('Y'));?> <?php the_field('copyright_notice', 'options'); ?></small>
						<div class="footer-links">
							<?php wp_nav_menu( array( 'theme_location' => 'footer-sitemap' ) ); ?>
						</div>
						<!-- /.footer-links -->
					</div>
					<!-- /.copy-bar-in -->
				</div>
				<!-- /.col-md-12 -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container -->
	</div>
	<!-- /.copy-bar -->

    
    <div id="quote-full">
        <div class="quote-wrapper">
            <div class="container">
                <header>
                    <h5><?php the_field('main_title_form_pop', 'options'); ?></h5>
                    <p><?php the_field('subtitle_form_pop', 'options'); ?></p>
                </header>
                <div class="form-holder">
                    <?php the_field('form_code_get_pop', 'options'); ?>
                </div>
            </div>
            <!-- // container  -->
        </div>
        <!-- // wrapper  -->
    </div>
    <!-- // quote full  -->

	<?php wp_footer(); ?>

</body>
</html>

