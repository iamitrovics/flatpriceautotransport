<?php
/**
 * The template for displaying all single posts
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>


    <header id="hero-banner">
        <div id="hero-content">
            <div class="overlay"></div>
            <?php
            $imageID = get_field('background_image_single_city');
            $image = wp_get_attachment_image_src( $imageID, 'slider-image' );
            $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
            ?> 

            <img class="img-responsive" alt="<?php echo $alt_text; ?>" src="<?php echo $image[0]; ?>" /> 
            <div class="caption">
                <div class="container">
                    <div class="caption__holder">
                        <h1><?php the_field('main_title_city_single'); ?></h1>
                        <?php the_field('intro_text_city_single'); ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#hero-content -->
        <div class="action-buttons">
            <a href="tel:<?php the_field('phone_number_city_page'); ?>" class="call"><i class="fas fa-phone-alt"></i></a>
            <a href="<?php the_field('button_link_top_cta_header', 'options'); ?>" class="quote"><?php the_field('button_label_top_cta_header', 'options'); ?></a>
        </div>
        <!-- /.action-buttons -->

        <?php include(TEMPLATEPATH . '/inc/quote-header.php'); ?>

    </header>
    <!-- /.hero-banner -->

    <?php if( have_rows('page_layout_city') ): ?>
        <?php while( have_rows('page_layout_city') ): the_row(); ?>

            <?php if( get_row_layout() == 'city_guides' ): ?>

                <section id="city-guides">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
								<?php 
								$values = get_sub_field( 'main_title' );
								if ( $values ) { ?>
									<h2><?php the_sub_field('main_title'); ?></h2>
								<?php 
								} else { ?>
									<h2>City Guides</h2>
								<?php } ?>
                            </div>
                            <!-- /.col-md-12 -->
                        </div>
                        <!-- /.row -->
                        <div class="row">
                            <div class="col-md-12">
                                <div id="guides-slider">

									<?php
										$post_objects = get_sub_field('choose_guides');
										if( $post_objects ): ?>
											<?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
												<?php setup_postdata($post); ?>

                                                <div class="guide-box">
                                                    <div class="guide-image">
                                                        <?php 
                                                        $values = get_field( 'featured_image_blog' );
                                                        if ( $values ) { ?>
                                                        <?php
                                                        $imageID = get_field('featured_image_blog');
                                                        $image = wp_get_attachment_image_src( $imageID, 'blog-image' );
                                                        $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
                                                        ?> 
                                                        <img class="img-responsive" alt="<?php the_title(''); ?>" src="<?php echo $image[0]; ?>" /> 
                                                        <?php 
                                                        } else { ?>
                                                            <img src="<?php bloginfo('template_directory'); ?>/img/sliders/guide.jpg" alt="" class="img-responsive">
                                                        <?php } ?>

                                                        <a href="<?php echo get_permalink(); ?>" tabindex="0"><span><i class="fal fa-long-arrow-right"></i></span></a>
                                                    </div>
                                                    <div class="guide-content">
                                                        <h4><a href="<?php echo get_permalink(); ?>" tabindex="0"><?php the_title(''); ?></a></h4>
                                                    </div>
                                                    <!-- /.guide-content -->
                                                </div>
                                                <!-- /.guide-box -->

											<?php endforeach; ?>
										<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
									<?php endif; ?>	

                                </div>
                                <!-- /#guides-slider -->
                            </div>
                            <!-- /.col-md-12 -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container -->
                </section>
                <!-- /#city-guides -->

            <?php elseif( get_row_layout() == 'full_width_content' ):  ?>

                <section class="auto-transport city-single--wrapper">
                    <div class="container">

                        <div class="row">
                            <div class="col-md-10 offset-md-1">
                                <div class="main__content">
                                    <?php if( get_sub_field('main_title') ): ?>
                                    <h3><?php the_sub_field('main_title'); ?></h3>
                                    <?php endif; ?>
                                    <?php the_sub_field('content_block'); ?>
                                </div>
                            </div>
                        </div>
                      </div>
                </section>       

            <?php elseif( get_row_layout() == 'full_width_image' ):  ?>

                <div class="section city__image">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-10 offset-md-1">
                                <?php
                                $imageID = get_sub_field('featured_image');
                                $image = wp_get_attachment_image_src( $imageID, 'about-image' );
                                $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
                                ?> 

                                <img class="img-responsive" alt="<?php echo $alt_text; ?>" src="<?php echo $image[0]; ?>" /> 
                            </div>
                        </div>

                    </div>
                </div>
                <!-- // image  -->

            <?php elseif( get_row_layout() == 'services' ):  ?>

                <section class="auto-services">
                    <div class="container">
                    
                        <div class="services-list">
                            <h4><?php the_sub_field('main_title_services'); ?></h4>
                            <?php the_sub_field('content_block_before_serivces'); ?>
                            <ul>
                                <?php if( have_rows('services_list') ): ?>
                                    <?php while( have_rows('services_list') ): the_row(); ?>

                                        <li><a href="<?php the_sub_field('link'); ?>"><?php the_sub_field('label'); ?></a></li>

                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </ul>
                        </div>
                        <!-- /.services-list -->

                    </div>
                    <!-- // container  -->
                </section>
                <!-- // services  -->

            <?php elseif( get_row_layout() == 'main_services' ):  ?>

                <div class="auto-transport city-single--wrapper">
                    <div class="container">
                        <div class="featured-services">
                            <?php 
                            $values = get_sub_field( 'services_list' );
                            if ( $values ) { ?>


                                <?php
                                $post_objects = get_sub_field('services_list');

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


                            <?php 
                            } else { ?>

                                <?php
                                    $loop = new WP_Query( array( 'post_type' => 'services', 'posts_per_page' => 15) ); ?>  
                                    <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

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

                                    <?php endwhile; ?>
                                <?php wp_reset_postdata(); ?>    

                            <?php } ?>                            
                        </div>
                    </div>
                    <!-- // container  -->
                </div>
                <!-- // auto transport  -->

                <?php elseif( get_row_layout() == 'video_review' ):  ?>

                    <section id="testimonials">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3><?php the_sub_field('main_title_video'); ?></h3>
                                </div>
                                <!-- /.col-md-12 -->
                            </div>
                            <!-- /.row -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="testimonial-video">
                                        <?php the_sub_field('video_code_video'); ?>
                                    </div>
                                    <!-- /.testimonial-video -->
                                </div>
                                <!-- /.col-md-12 -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.container -->
                    </section>
                    <!-- /#testimonials -->     
                    
                 <?php elseif( get_row_layout() == 'testimonial' ):  ?>

                    <section id="reviews" style="background-image: url(<?php the_field('background_image_test_image_gen', 'options'); ?>)">
                        <div class="overlay"></div>
                        <!-- /.overlay -->
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="review-content">
                                        <h3><?php the_field('main_title_test_gen_test', 'options'); ?></h3>

                                        <?php
                                        $post_objects = get_sub_field('client_review');

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
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.container -->
                    </section>
                    <!-- /#reviews -->                    

            <?php endif; ?>
        <?php endwhile; ?>
    <?php endif; ?>


    <?php include (TEMPLATEPATH . '/inc/why-inc.php' ); ?>

<?php
get_footer();
