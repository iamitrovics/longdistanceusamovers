<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="icon" type="image/png"  href="<?php echo get_template_directory_uri(); ?>/img/ico/favicon.png">
    <meta name="ahrefs-site-verification" content="b6d355d34cf2473a151d4e7ec88ef43d1605fe1652e09c0e20b9c0f07a7e0e27">
    
    <!-- Facebook Pixel Code -->
    <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window,document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '262998300890158'); 
    fbq('track', 'PageView');
    </script>
    <noscript>
    <img height="1" width="1"
    src="https://www.facebook.com/tr?id=262998300890158&ev=PageView
    &noscript=1"/>
    </noscript>
    <!-- End Facebook Pixel Code -->


<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PSB8KKL');</script>
<!-- End Google Tag Manager -->

    <?php wp_head(); ?>
        
    
</head>

<body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PSB8KKL"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->


    <?php 
    $values = get_field( 'phone_number_per_city' );
    if ( $values ) { ?>
    
        <script type="application/ld+json"> {
        "@context" : "http://schema.org",
        "@type" : "MovingCompany",
        "name":"<?php the_field('custom_title_city_header'); ?>",
        "url":"<?php echo get_permalink(); ?>",
        "email":"info@longdistanceusamovers.com",
        "image":"https://longdistanceusamovers.com/wp-content/uploads/2020/05/logo.png",
        "telephone":"<?php the_field('phone_number_per_city'); ?>",
        "openingHours": [
        "Mon - Sat: 8:00 - 19:00"],
        "aggregateRating":{
        "@type":"AggregateRating",
        "ratingValue":"5",
        "reviewCount":"52"}
        } </script>

    <?php 
    } else { ?>

   
        <script type="application/ld+json">
        {
        "@context": "https://schema.org/", 
        "@type" : "MovingCompany",
        "name":"Long Distance Movers",
        "url":"https://longdistanceusamovers.com/",
        "email":"info@longdistanceusamovers.com",
        "image":"https://longdistanceusamovers.com/wp-content/uploads/2020/05/logo.png",
        "telephone":"8772993827",
        
        "openingHours": [
        "Mon - Sat: 8:00 - 19:00"],
        
        "aggregateRating": {
            "@type": "AggregateRating",
            "ratingValue": "5",
            "bestRating": "5",
            "worstRating": "1",
            "ratingCount": "6",
            "reviewCount": "6"
        },
        "review": [
        
            <?php
            $loop = new WP_Query( array( 'post_type' => 'testimonials', 'posts_per_page' => 6) ); ?>  

            <?php $rowCount = 6; //GET THE COUNT ?>
            <?php $i = 1; ?>
            <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>


                {
                    "@type": "Review",
                    "name": "<?php the_field('city_test'); ?>",
                    "reviewBody": "<?php the_field('testimonials_content_test', false, false); ?>",
                    "reviewRating": {
                    "@type": "Rating",
                    "ratingValue": "5",
                    "bestRating": "5",
                    "worstRating": "1"
                    },
                    "datePublished": "<?php the_field('date_test'); ?>",
                    "author": {"@type": "Person", "name": "<?php the_title(''); ?>"},
                    "publisher": {"@type": "Organization", "name": "Long Distance Movers"}
                }

                <?php if($i < $rowCount): ?>
                    ,
                <?php endif; ?>

          
                <?php $i++; ?>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>              
        
        ]
        }
        </script>

    <?php } ?>

    <?php the_field('global_rich_snippet_schema_code', 'options'); ?>


	<div class="menu-overlay"></div>
	<div class="main-menu-sidebar visible-xs visible-sm visible-md" id="menu">

		<header>
			<a href="javascript:;" class="close-menu-btn"><img src="<?php bloginfo('template_directory'); ?>/img/ico/close-x.svg" alt=""></a>
		</header>
		<!-- // header  -->


		<nav id="sidebar-menu-wrapper">
			<div id="menu">    
				<ul class="nav-links">
					<?php
					wp_nav_menu( array(
						'menu'              => 'mobile',
						'theme_location'    => 'mobile',
						'depth'             => 2,
						'container'         => false,
						'container_class'   => 'collapse navbar-collapse',
						'container_id'      => false,
						'menu_class'        => 'nav navbar-nav',
						'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
						'items_wrap' => '%3$s',
						'walker'            => new wp_bootstrap_navwalkermobile())
					);
					?>  
				</ul>
			</div>
			<!-- // menu  -->

		</nav> 
		<!-- // sidebar menu wrapper  -->

	</div>
	<!-- // main menu sidebar  -->	

        <div id="menu_area" class="menu-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <nav class="navbar navbar-light navbar-expand-lg mainmenu">
                            <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php the_field('website_logo_general', 'options'); ?>" alt=""></a>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav ml-auto">
                                    
                                    <?php if( have_rows('menu_items_header_main', 'options') ): ?>
                                        <?php while( have_rows('menu_items_header_main', 'options') ): the_row(); ?>
                                            <?php if (get_sub_field('link_type') == 'Single Item') { ?>
                                                <li><a href="<?php the_sub_field('link_to_page'); ?>"><?php the_sub_field('item_label'); ?></a></li>
                                            <?php } elseif (get_sub_field('link_type') == 'Dropdown') { ?>

                                                <li class="dropdown">
                                                <a class="dropdown-toggle--re" href="<?php the_sub_field('link_to_page'); ?>" id="navbarDropdown" role="button"  aria-haspopup="true" aria-expanded="false"><?php the_sub_field('item_label'); ?></a>
                                                <ul class="dropdown-menu fade" aria-labelledby="navbarDropdown">
                                                <?php if( have_rows('dropdown_items') ): ?>
                                                    <?php while( have_rows('dropdown_items') ): the_row(); ?>
                                                        <li><a href="<?php the_sub_field('link_to_page'); ?>"><?php the_sub_field('label'); ?></a></li>
                                                    <?php endwhile; ?>
                                                <?php endif; ?>
                                                </ul>
                                            </li>

                                            <?php } elseif (get_sub_field('link_type') == 'Dropdown Multilevel') { ?>

                                                <li class="dropdown">
                                                <a class="dropdown-toggle--re" href="<?php the_sub_field('link_to_page'); ?>" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php the_sub_field('item_label'); ?></a>
                                                <ul class="dropdown-menu fade" aria-labelledby="navbarDropdown">                                 

                                                <?php if( have_rows('multilevel_items') ): ?>
                                                <?php while( have_rows('multilevel_items') ): the_row(); ?>

                                                    <?php if (get_sub_field('type_of_item') == 'Single Items') { ?>
                                                        <li><a href="<?php the_sub_field('item_link'); ?>"><?php the_sub_field('item_label_sub'); ?></a></li>
                                                    <?php } elseif (get_sub_field('type_of_item') == 'Dropdown Items') { ?>
                                                
                                                        <li class="dropdown">
                                                            <a class="dropdown-toggle--re" href="<?php the_sub_field('item_link'); ?>" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php the_sub_field('item_label_sub'); ?></a>
                                                            <ul class="dropdown-menu fade" aria-labelledby="navbarDropdown">
                                                            <?php if( have_rows('dropdown_items_sub') ): ?>
                                                                <?php while( have_rows('dropdown_items_sub') ): the_row(); ?>
                                                                    <li><a href="<?php the_sub_field('link_sub_sub'); ?>"><?php the_sub_field('label_sub_sub'); ?></a></li>
                                                                <?php endwhile; ?>
                                                            <?php endif; ?>
                                                            </ul>
                                                        </li>     

                                                    <?php } ?>      
                                                    <!-- // select of 3rd level    -->
                                    
                                                <?php endwhile; ?>
                                                <?php endif; ?>

                                                </ul>
                                            </li>                                 

                                            <?php } ?>                                     
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                </ul>

                                <div class="call-btn">

                                    <?php 
                                    $values = get_field( 'phone_number_per_city' );
                                    if ( $values ) { ?>

                                        <a href="tel:<?php the_field('phone_number_per_city'); ?>"><i class="fas fa-phone-alt"></i> <span><?php the_field('phone_number_per_city'); ?></span></a>

                                    <?php 
                                    } else { ?>
                                        <a href="tel:<?php the_field('button_link_top_cta_header', 'options'); ?>"><i class="fas fa-phone-alt"></i> <span><?php the_field('button_label_top_cta_header', 'options'); ?></span></a>
                                    <?php } ?>

                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>

            <div id="mobile-menu--btn" class="d-lg-none">
                <a href="javascript:;">
                    <span></span>
                    <span></span>
                    <span></span>
                    <div class="clearfix"></div>
                </a>
            </div>
            <!-- // mobile  -->	

        </div>