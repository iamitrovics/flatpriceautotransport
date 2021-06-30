<?php
/**
 * Template Name: Add Review Template
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
            $imageID = get_field('background_image_add_review');
            $image = wp_get_attachment_image_src( $imageID, 'slider-image' );
            $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
            ?> 

            <img class="img-responsive" alt="<?php the_title(''); ?>" src="<?php echo $image[0]; ?>" /> 
            <div class="caption">
                <div class="container">
                    <div class="caption__holder">
                        <h1><?php the_field('main_title_add_review'); ?></h1>
                        <?php the_field('intro_text_add_review'); ?>
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
    </header>
    <!-- /.hero-banner -->

    <section id="add__review">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="form__wrapper">
                        <h3><?php the_field('form_title_add_review'); ?></h3>
                        <?php the_field('form_code_short_add_review'); ?>
                    </div>
                    <!-- // form wrapper  -->
                </div>
            </div>
        </div>
        <!-- // container  -->
    </section>
    <!-- // add review  -->

<?php get_footer(); ?>
