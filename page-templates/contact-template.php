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
        <div class="container">
            <div class="row reverse-mob">
                <div class="col-md-6 map-wrap">
                    <div class="map">
                        <?php the_field('map_code_contact_page'); ?>
                    </div>
                    <!-- /.map -->
                </div>
                <!-- /.col-md-12 -->
                <div class="col-md-6">
                    <div class="contact-form">
                        <h1><?php the_field('main_title_contact_page'); ?></h1>
                        <?php the_field('form_shortcode_contact_page'); ?>
                    </div>
                    <!-- /.contact-form --> 
                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    
    </div>
    <!-- /#error-page -->

<?php get_footer(); ?>
