<?php
/**
 * Template Name: Reviews Template
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
            $imageID = get_field('background_image_reviews_header');
            $image = wp_get_attachment_image_src( $imageID, 'slider-image' );
            $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
            ?> 

            <img class="img-responsive" alt="<?php the_field('main_title_reviews_page'); ?>" src="<?php echo $image[0]; ?>" /> 
            <div class="caption">
                <div class="container">
                    <div class="caption__holder">
                        <h1><?php the_field('main_title_reviews_page'); ?></h1>
                        <?php the_field('intro_text_reviews_header'); ?>
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

    <div id="reviews-page">
        <section id="video-reviews">
            <div class="container">
                <div class="row">
                    <?php
                    $loop = new WP_Query( array( 'post_type' => 'videoreviews', 'posts_per_page' => 15) ); ?>  
                    <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

                        <div class="col-md-6">
                           <?php the_field('video_code_review_single'); ?>
                        </div>
                        <!-- /.col-md-6 -->

                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>                      
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
        </section>
        <!-- /#video-reviews -->
        <section id="textual-reviews">
            <div class="container">
                <div class="row">

                    <?php
                    $loop = new WP_Query( array( 'post_type' => 'testimonials', 'posts_per_page' => 55) ); ?>  
                    <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

                        <div class="col-md-6 col-lg-4">
                            <div class="review-box">
                                <h3><?php the_field('review_title_title'); ?></h3>
                                <div class="review-text">
                                    <?php the_field('client_review_text'); ?>
                                </div>
                                <!-- /.review-text -->
                                <footer>
                                    <div class="rating">
                                        <span class="mr-star-rating"> 
                                            <?php if (get_field('review_score_test') == '4') { ?>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fal fa-star"></i>
                                            <?php } elseif (get_field('review_score_test') == '4.5') { ?>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star-half-alt"></i>
                                            <?php } elseif (get_field('review_score_test') == '5') { ?>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            <?php } ?>   
                                        </span>
                                    </div>
                                    <!-- /.rating -->
                                    <div class="author">
                                        <?php the_title(''); ?>
                                    </div>
                                    <!-- /.author -->
                                </footer>
                            </div>
                            <!-- /.review-box -->
                        </div>
                        <!-- /.col-md-6 .col-lg-4 -->

                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>      
                  
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
        </section>
        <!-- /#textual-reviews -->
    </div>
    <!-- /#reviews-page -->

<?php get_footer(); ?>
