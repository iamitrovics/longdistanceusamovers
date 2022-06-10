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

    <?php 
    $values = get_field( 'phone_number_per_city' );
    if ( $values ) { ?>

        <div id="fixed-cta">
            
            <a href="tel:<?php the_field('phone_number_per_city') ?>">
                <em><i class="fal fa-phone-alt"></i></em>
                <div class="phone-text">
                    <small class="label">Get a Free Estimate</small>
                    <span><?php the_field('phone_number_per_city') ?></span>
                </div>
                <!-- // text  -->
            </a>

        </div>
        <!-- // fixed cta  -->

    <?php 
    } else { ?>

    <div id="fixed-cta">
        
        <a href="tel:<?php the_field('button_link_top_cta_header', 'options') ?>">
            <em><i class="fal fa-phone-alt"></i></em>
            <div class="phone-text">
                <small class="label">Get a Free Estimate</small>
                <span><?php the_field('button_link_top_cta_header', 'options') ?></span>
            </div>
            <!-- // text  -->
        </a>

    </div>
    <!-- // fixed cta  -->

    <?php } ?>	

    <script>

jQuery(document).ready(function($) {

    //Add pins on page load
    $('input[name="your-state"]').parent().addClass('pinned');
    $('input[name="your-stateto"]').parent().addClass('pinned');

    // Add pins when field has no value, either on change or blur (leaving the field)
    $('input[name="zip-from"]').on('change', function() {
      if ($(this).val().length === 0) {
        $(this).parent('span').siblings('span').addClass('pinned');
        $(this).parent('span').siblings('span').find('input[name="your-state"]').val('');
      }
    });
    $('input[name="zip-from"]').blur(function() {
      if ($(this).val().length === 0) {
        $(this).parent('span').siblings('span').addClass('pinned');
        $(this).parent('span').siblings('span').find('input[name="your-state"]').val('');
      }
    });
    $('input[name="zip-to"]').on('change', function() {
      if ($(this).val().length === 0) {
        $(this).parent('span').siblings('span').addClass('pinned');
        $(this).parent('span').siblings('span').find('input[name="your-stateto"]').val('');
      }
    });
    $('input[name="zip-to"]').blur(function() {
      if ($(this).val().length === 0) {
        $(this).parent('span').siblings('span').addClass('pinned');
        $(this).parent('span').siblings('span').find('input[name="your-stateto"]').val('');
      }
    });

    //Trigger API check for Zip from state
    $('input[name="zip-from"]').mouseout(function(){
        var zip = $(this).val();
        var stateFrom = $(this).parent('span').siblings('span').find('input[name="your-state"]');

        var api_key = 'AIzaSyAkitxoIA55jYyfHIt871IKgOUK4EV4KG0';
        if(zip.length){
            //make a request to the google geocode api with the zipcode as the address parameter and your api key
            $.get('https://maps.googleapis.com/maps/api/geocode/json?address='+zip+'&key='+api_key).then(function(response){
            //parse the response for a list of matching city/state
            var possibleLocalities = geocodeResponseToCityState(response, stateFrom);
            //Add state letters to State field
            $(stateFrom).val(possibleLocalities[0].state);
            });
        }
    });

    //Trigger API check for Zip to state
    $('input[name="zip-to"]').mouseout(function(){
        var zip = $(this).val();
        var stateTo = $(this).parent('span').siblings('span').find('input[name="your-stateto"]');

        var api_key = 'AIzaSyAkitxoIA55jYyfHIt871IKgOUK4EV4KG0';
        if(zip.length){
            //make a request to the google geocode api with the zipcode as the address parameter and your api key
            $.get('https://maps.googleapis.com/maps/api/geocode/json?address='+zip+'&key='+api_key).then(function(response){
            //parse the response for a list of matching city/state
            var possibleLocalities = geocodeResponseToCityState(response, stateTo);
            //fillCityAndStateFields(possibleLocalities, stateTo);
            $(stateTo).val(possibleLocalities[0].state);
            });
        }
    });


    function geocodeResponseToCityState(geocodeJSON, state) { //will return and array of matching {city,state} objects
      var parsedLocalities = [];
      $(state).parent().removeClass('pinned');
      //$('#state').parent().removeClass('pinned');
      if(geocodeJSON.results.length) {
        for(var i = 0; i < geocodeJSON.results.length; i++){
          var result = geocodeJSON.results[i];

          var locality = {};
          for(var j=0; j<result.address_components.length; j++){
            var types = result.address_components[j].types;
            for(var k = 0; k < types.length; k++) {
              if(types[k] == 'locality') {
                locality.city = result.address_components[j].long_name;
              } else if(types[k] == 'administrative_area_level_1') {
                locality.state = result.address_components[j].short_name;
              }
            }
          }
          parsedLocalities.push(locality);

          //check for additional cities within this zip code
          if(result.postcode_localities){
            for(var l = 0; l<result.postcode_localities.length;l++) {
              parsedLocalities.push({city:result.postcode_localities[l],state:locality.state});
            }
          }
        }
      } else {
        // $('#state').parent().addClass('pinned');
        // $('#state').val('');
        $(state).parent().addClass('pinned');
        $(state).val('');
        console.log('error: no address components found');
      }
      return parsedLocalities;
    }

});

  </script>	

	<?php wp_footer(); ?>

</body>
</html>

