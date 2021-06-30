<?php
/**
 * Template Name: Regular Template
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

    <header id="hero-banner">
        <div id="hero-content">
            <div class="overlay"></div>
            <?php
            $imageID = get_field('background_image_regular');
            $image = wp_get_attachment_image_src( $imageID, 'slider-image' );
            $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
            ?> 

            <img class="img-responsive" alt="<?php the_field('main_title_regular'); ?>" src="<?php echo $image[0]; ?>" /> 
            <div class="caption">
                <div class="container">
                    <div class="caption__holder">
                        <h1><?php the_field('main_title_regular'); ?></h1>
                        <?php the_field('intro_text_regular'); ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#hero-content -->
        <div class="action-buttons">
            <a href="tel:<?php the_field('phone_number_general_cta', 'options') ;?>" class="call"><i class="fas fa-phone-alt"></i></a>
            <a href="<?php the_field('button_link_top_cta_header', 'options'); ?>" class="quote"><?php the_field('button_label_top_cta_header', 'options'); ?></a>
        </div>
        <!-- /.action-buttons -->

        <?php include(TEMPLATEPATH . '/inc/quote-header.php'); ?>

    </header>
    <!-- /.hero-banner -->

    <section id="regular__page">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="regular__content">

                        <?php if( have_rows('content_layout_regular') ): ?>
                            <?php while( have_rows('content_layout_regular') ): the_row(); ?>
                                <?php if( get_row_layout() == 'full_width_content' ): ?>

                                    <div class="content">
                                        <?php the_sub_field('content_block'); ?>
                                    </div>
                                    <!-- // content  -->

                                <?php elseif( get_row_layout() == 'full_width_image' ): ?>

                                    <div class="image__holder">
                                        <?php
                                        $imageID = get_sub_field('featured_image');
                                        $image = wp_get_attachment_image_src( $imageID, 'about-image' );
                                        $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
                                        ?> 

                                        <img class="img-responsive" alt="<?php echo $alt_text; ?>" src="<?php echo $image[0]; ?>" />                                         
                                    </div>
                                    <!-- // image holder  -->

                                <?php endif; ?>
                            <?php endwhile; ?>
                        <?php endif; ?>

                    </div>
                    <!-- // content  -->
                </div>
                <!-- // cok  -->
            </div>
            <!-- // row  -->
        </div>
        <!-- // container  -->
    </section>
    <!-- // regular page  -->

	<?php include (TEMPLATEPATH . '/inc/why-inc.php' ); ?>

<?php get_footer(); ?>
