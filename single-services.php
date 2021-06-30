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
            $imageID = get_field('background_image_service_single');
            $image = wp_get_attachment_image_src( $imageID, 'slider-image' );
            $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
            ?> 

            <img class="img-responsive" alt="<?php the_field('main_title_service_single'); ?>" src="<?php echo $image[0]; ?>" /> 
            <div class="caption">
                <div class="container">
                    <div class="caption__holder">
                        <h1><?php the_field('main_title_service_single'); ?></h1>
                        <?php the_field('intro_text_servic_single'); ?>
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

    <div id="autotransport-inner">

        <?php if( have_rows('content_layout_service_page') ): ?>
            <?php while( have_rows('content_layout_service_page') ): the_row(); ?>
                <?php if( get_row_layout() == 'paragraph' ): ?>

                <?php elseif( get_row_layout() == 'content_left_image_right' ):  ?>

                    <section id="shipping">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="shipping-content">
                                        <?php if( get_sub_field('main_title') ): ?>
                                            <h2><?php the_sub_field('main_title'); ?></h2>
                                        <?php endif; ?>
                                        <?php the_sub_field('content_block'); ?>
                                    </div>
                                    <!-- /.shipping-content -->
                                </div>
                                <!-- /.col-lg-6 -->
                                <div class="col-lg-6">
                                    <div class="shpping-photo">
                                        <?php
                                        $imageID = get_sub_field('featured_image');
                                        $image = wp_get_attachment_image_src( $imageID, 'side-image' );
                                        $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
                                        ?> 

                                        <img class="img-responsive" alt="<?php the_sub_field('main_title'); ?>" src="<?php echo $image[0]; ?>" /> 
                                    </div>
                                    <!-- /.shpping-photo -->
                                </div>
                                <!-- /.col-lg-6 -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.container -->
                    </section>
                    <!-- /#shipping -->

                <?php elseif( get_row_layout() == 'why_us' ):  ?>

                    <section id="why-us-auto">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="intro">
                                        <h3><?php the_sub_field('main_title'); ?></h3>
                                        <?php the_sub_field('intro_text'); ?>
                                    </div>
                                </div>
                                <!-- /.col-md-12 -->
                            </div>
                            <!-- /.row -->
                            <div class="row why-boxes">
                                <?php if( have_rows('why_us_list') ): ?>
                                    <?php while( have_rows('why_us_list') ): the_row(); ?>

                                        <div class="col-md-4">
                                            <div class="why-box">
                                                <h5><?php the_sub_field('title_box'); ?></h5>
                                                <div class="why-text">
                                                    <?php the_sub_field('description_box'); ?>
                                                </div>
                                                <!-- /.why-text -->
                                            </div>
                                            <!-- /.why-box -->
                                        </div>
                                        <!-- /.col-md-4 -->

                                    <?php endwhile; ?>
                                <?php endif; ?>

                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.container -->
                    </section>
                    <!-- /#why-us-auto -->     
                
                <?php elseif( get_row_layout() == 'main_content' ):  ?>

                    <section id="types">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="intro">
                                        <h3><?php the_sub_field('main_title'); ?></h3>
                                        <?php the_sub_field('intro_text'); ?>
                                    </div>
                                    <!-- /.intro -->
                                </div>
                                <!-- /.col-md-12 -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.container -->
                        <div class="container">
                            <div id="type-boxes">

                                <?php if( have_rows('content_blocks') ): ?>
                                    <?php while( have_rows('content_blocks') ): the_row(); ?>

                                        <div class="type-box">
                                            <div class="type-content">
                                                <h4><?php the_sub_field('title'); ?></h4>
                                                <div class="type-text">
                                                    <?php the_sub_field('content_block'); ?>
                                                </div>
                                                <!-- /.type-text -->
                                            </div>
                                            <!-- /.type-content -->
                                            <div class="type-photo">
                                                <?php
                                                $imageID = get_sub_field('featured_image');
                                                $image = wp_get_attachment_image_src( $imageID, 'side-image' );
                                                $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
                                                ?> 

                                                <img class="img-responsive" alt="<?php the_sub_field('title'); ?>" src="<?php echo $image[0]; ?>" /> 
                                            </div>
                                            <!-- /.type-photo -->
                                        </div>
                                        <!-- /.type-box -->

                                    <?php endwhile; ?>
                                <?php endif; ?>

                            </div>
                            <!-- /.type-boxes -->
                        </div>
                        <!-- /.container -->
                    </section>
                    <!-- /#types -->  
                    
                <?php elseif( get_row_layout() == 'faq' ):  ?>

                    <?php if ( get_sub_field( 'remove_top_margin' ) ): ?>
                        <section id="faq" class="no-margin--top">
                    <?php else: ?>
                        <section id="faq">
                    <?php endif; ?>

                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="intro">
                                        <h3><?php the_sub_field('main_title'); ?></h3>
                                        <?php the_sub_field('intro_text'); ?>
                                    </div>
                                    <!-- /.intro -->
                                </div>
                                <!-- /.col-md-12 -->
                            </div>
                            <!-- /.row -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="faq-accordion">
                                        <?php if( have_rows('faq') ): ?>
                                            <?php while( have_rows('faq') ): the_row(); ?>

                                                <div class="faq-box">
                                                    <h4><?php the_sub_field('question'); ?></h4>
                                                    <div>
                                                        <?php the_sub_field('answer'); ?>
                                                    </div>
                                                </div>
                                                <!-- /.faq-box -->
                                            <?php endwhile; ?>
                                        <?php endif; ?>

                                    </div>
                                    <!-- /#faq-accordion -->
                                </div>
                                <!-- /.col-md-12 -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.container -->
                    </section>
                    <!-- /#faq -->    
                    
                <?php elseif( get_row_layout() == 'full_width_content' ):  ?>

                    <section id="at-bottom-content">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <?php if( get_sub_field('main_title_full') ): ?>
                                        <h3><?php the_sub_field('main_title_full'); ?></h3>
                                    <?php endif; ?>

                                    <?php the_sub_field('content_block_full'); ?>

                                </div>
                                <!-- /.col-md-12 -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.container -->
                    </section>
                    <!-- /#at-bottom-content -->                    

                <?php endif; ?>
            <?php endwhile; ?>
        <?php endif; ?>

        <?php include(TEMPLATEPATH . '/inc/formbottom-inc.php'); ?>
        
    </div>
    <!-- /#autotransport-inner -->


<?php
get_footer();
