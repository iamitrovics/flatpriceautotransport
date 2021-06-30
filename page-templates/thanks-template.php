<?php
/**
 * Template Name: Thanks Template
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
                    <h1><?php the_field('main_title_thanx'); ?></h1>
                    <h2><?php the_field('subtitle_tnx'); ?></h2>
                    <a href="<?php the_field('button_link_tnx'); ?>" class="back"><?php the_field('button_label_tnx'); ?></a>
                </div>
                <!-- /.col-md-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    
    </div>
    <!-- /#error-page -->
		
	<?php include (TEMPLATEPATH . '/inc/why-inc.php' ); ?>

<?php get_footer(); ?>
