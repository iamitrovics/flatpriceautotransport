<?php 
/**
 * Homepage / Front Page
**/
get_header(); ?>

    <header id="hero-banner">
        <div id="hero-content">
            <div class="overlay"></div>

                <?php 
                $image = get_field('featured_image_hero_home');
                $size = 'full'; // (thumbnail, medium, large, full or custom size)
                if( $image ) {
                    echo wp_get_attachment_image( $image, $size );
                }   
                ?>         

            <div class="caption">
                <div class="container">
                    <div class="caption__holder">
                        <h1><?php the_field('main_title_hero_banner') ;?></h1>
                        <?php the_field('hero_text_header_home'); ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#hero-content -->

        <div class="action-buttons">

            <?php 
            $values = get_field( 'phone_number_city_page' );
            if ( $values ) { ?>
                <a href="tel:<?php the_field('phone_number_city_page'); ?>" class="call"><i class="fas fa-phone-alt"></i></a>
            <?php 
            } else { ?>
                <a href="tel:<?php the_field('phone_number_general_cta', 'options') ;?>" class="call"><i class="fas fa-phone-alt"></i></a>
            <?php } ?>

            
            <a href="<?php the_field('button_link_top_cta_header', 'options'); ?>" class="quote"><?php the_field('button_label_top_cta_header', 'options'); ?></a>
        </div>
        <!-- /.action-buttons -->

        <?php include(TEMPLATEPATH . '/inc/quote-header.php'); ?>
        
    </header>
    <!-- /.hero-banner -->
    <div id="homepage">
        <section class="auto-transport">
            <div class="container">
                <div class="featured-services">

                    <?php
                        $post_objects = get_field('list_of_services_home');

                        if( $post_objects ): ?>
                            <?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
                                <?php setup_postdata($post); ?>

                            <div class="featured-box">
                                <div class="featured-image">
                                    <?php
                                    $imageID = get_field('featured_image_service_single');
                                    $image = wp_get_attachment_image_src( $imageID, 'service-image' );
                                    $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
                                    ?> 

                                    <img class="img-responsive" alt="<?php echo $alt_text; ?>" src="<?php echo $image[0]; ?>" /> 
                                    <a href="<?php echo get_permalink(); ?>" tabindex="0"><span><i class="fal fa-long-arrow-right"></i></span></a>
                                </div>
                                <div class="featured-content">
                                    <h4><a href="<?php echo get_permalink(); ?>" tabindex="0"><?php the_title(''); ?></a></h4>
                                    <?php the_field('intro_text_service_single'); ?>
                                </div>
                                <!-- /.featured-content -->
                            </div>
                            <!-- /.featured-box -->

                        <?php endforeach; ?>
                    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                <?php endif; ?>

                </div>
                <!-- /.featured-services -->
            </div>
        </section>
        <!-- /#auto-transport -->

        <section id="cd-timeline-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2><?php the_field('main_title_home_reasons'); ?></h2>
                    </div>
                </div>
            </div>
            <!-- /.container -->
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div id="cd-timeline">

                            <?php if( have_rows('list_of_items_reasons') ): ?>
                                <?php while( have_rows('list_of_items_reasons') ): the_row(); ?>

                                    <div class="cd-timeline-block">
                                        <div class="cd-timeline-num">
                                            <?php the_sub_field('number'); ?>
                                        </div> <!-- cd-timeline-num -->
                                    
                                        <div class="cd-timeline-content">
                                            <h3><?php the_sub_field('title'); ?></h3>
                                            <?php the_sub_field('text'); ?>
                                        </div> <!-- cd-timeline-content -->
                                    </div> 
                                    <!-- cd-timeline-block -->

                                <?php endwhile; ?>
                            <?php endif; ?>

                        </div>
                        <!-- /#cd-timeline -->
                    </div>
                    <!-- /.col-md-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->

        </section> 
        <!-- cd-timeline-wrap -->


        <section class="video-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <div class="video-in">
                            <a href="<?php the_field('video_code_homepage'); ?>">
                                <img src="<?php the_field('video_image_home'); ?>" alt="" class="img-video">
                                <img src="<?php bloginfo('template_directory'); ?>/img/ico/play-circle-light.svg" alt="" class="play-icon">
                            </a>
                        </div>
                        <!-- /.video-in -->
                    </div>
                    <!-- /.col-md-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
        </section>
        <!-- /.video-area -->
        <section id="reviews" style="background-image: url(<?php the_field('background_image_test_home'); ?>)">
            <div class="overlay"></div>
            <!-- /.overlay -->
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="review-content">
                            <h3><?php the_field('main_title_test_home'); ?></h3>

                                <?php
                                $post_objects = get_field('client_review_obj');

                                if( $post_objects ): ?>
                                    <?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
                                        <?php setup_postdata($post); ?>
            
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
                                        <!-- /.review-content -->

                                    <?php endforeach; ?>
                                <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                            <?php endif; ?>                            

                    </div>
                    <!-- /.col-md-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
        </section>
        <!-- /#reviews -->

        <?php include (TEMPLATEPATH . '/inc/why-inc.php' ); ?>
    
        <!-- /#why-us -->


    </div>
    <!-- /#homepage -->

<?php get_footer(); ?>