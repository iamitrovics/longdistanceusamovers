<?php
/**
 * The template for displaying search results pages.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();

$container = get_theme_mod( 'understrap_container_type' );

?>

	<?php
	/* Template Name: Search Results */
	$search_refer = $_GET["post_type"];
	if ($search_refer == 'post') { load_template(TEMPLATEPATH . '/search-blog.php'); }
	elseif ($search_refer == 'cities') { load_template(TEMPLATEPATH . '/search-cities.php'); };
	?>


<?php get_footer(); ?>
