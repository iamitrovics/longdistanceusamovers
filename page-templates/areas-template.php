<?php
/**
 * Template Name: Areas Template
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div id="find-us">
	<div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="intro">
                    <h1><?php the_field('main_title_areas_served'); ?></h1>
                    <?php the_field('intro_text_areas_served'); ?>
                </div>
            </div>
            <!-- /.col-md-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-12">
                <div class="map">
                    <div class="map-image">
                        <img src="<?php bloginfo('template_directory'); ?>/img/misc/map.svg" alt="">
                    </div>
                    <!-- /.map-image -->
                    <div class="map-filters">
                        <div class="row">
                           <div class="col-lg-6 offset-lg-3">
                               
                                <?php
                                
                                $categories = get_categories('taxonomy=states');
                                
                                $select = "<select name='cat' id='cat' class='postform selectpicker'>n";
                                $select.= "<option value='-1'>Select State</option>n";
                                
                                foreach($categories as $category){
                                    if($category->count > 0){
                                        $select.= "<option value='".$category->slug."'>".$category->name."</option>";
                                    }
                                }
                                
                                $select.= "</select>";
                                
                                echo $select;
                                ?>
                                
                                <script type="text/javascript"><!--
                                    var dropdown = document.getElementById("cat");
                                    function onCatChange() {
                                        if ( dropdown.options[dropdown.selectedIndex].value != -1 ) {
                                            location.href = "<?php echo home_url();?>/state/"+dropdown.options[dropdown.selectedIndex].value+"/";
                                        }
                                    }
                                    dropdown.onchange = onCatChange;
                                --></script>    

                           </div>
                           <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.map-filters -->
                    <div class="map-search">

                        <form role="search" action="<?php echo site_url('/'); ?>" method="get" id="searchform">
                            <input type="search" name="s" placeholder="Enter the name of your city"/>
                            <button type="submit" alt="Search" value="">GO</button>
                            <input type="hidden" name="post_type" value="cities" />

                        </form>
                    </div>
                    <!-- /.map-search -->
                    <div class="map-result">

                        <?php if( have_rows('areas_list_landing') ): ?>
                            <?php while( have_rows('areas_list_landing') ): the_row(); ?>
                                
                                <div class="area">
                                    <h2><?php the_sub_field('area_title'); ?></h2>
                                    <div class="row">

                                        <?php if( have_rows('countries') ): ?>
                                           <?php while( have_rows('countries') ): the_row(); ?>
                                               
                                                <div class="col-lg-2 col-md-3">
                                                    <h3><?php the_sub_field('country_name'); ?></h3>
                                                    <ul>
                                                        <?php if( have_rows('list_of_cities') ): ?>
                                                           <?php while( have_rows('list_of_cities') ): the_row(); ?>
                                                               <li><a href="<?php the_sub_field('link_to_city'); ?>"><?php the_sub_field('label'); ?></a></li>
                                                           <?php endwhile; ?>
                                                        <?php endif; ?>
                                                    </ul>
                                                </div>
                                                <!-- /.col-md-3 -->

                                           <?php endwhile; ?>
                                        <?php endif; ?>

                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- /.area -->

                            <?php endwhile; ?>
                        <?php endif; ?>


                    </div>
                    <!-- /.map-result -->
                </div>
                <!-- /.map -->
            </div>
            <!-- /.col-md-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</div>
<!-- /#error-page -->

<?php get_footer(); ?>
