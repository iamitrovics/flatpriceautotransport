<?php
/*
 * Template Name: Parent Child Template
 * Template Post Type: post
 */
  
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

    <article id="blog__single">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <header>
                        <h1><?php the_title(''); ?></h1>
                        <div class="metas">
                            <span class="blog-date"><i class="fal fa-calendar-alt"></i> <?php echo get_the_date( 'F j, Y' ); ?></span>
                        </div>
                        <!-- // metas  -->
                    </header>
                    <div class="blog__content">

                    <?php
                        // check if the flexible content field has rows of data
                        if( have_rows('content_layout_blog') ):
                            // loop through the rows of data
                            while ( have_rows('content_layout_blog') ) : the_row();

                                if( get_row_layout() == 'intro_text' ): ?>

                                    <div class="intro__content">
                                        <?php the_sub_field('intro_content'); ?>
                                    </div>
                                    <!-- // intro  -->							

                                <?php elseif( get_row_layout() == 'full_width_content' ): ?>

                                    <div class="main__content">
                                        <?php the_sub_field('content_block'); ?>
                                    </div>

                                <?php elseif( get_row_layout() == 'full_width_image' ): ?>

                                    <div class="image__inner">
                                        <?php
                                        $imageID = get_sub_field('featured_image');
                                        $image = wp_get_attachment_image_src( $imageID, 'blogfeat-image' );
                                        $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
                                        ?> 

                                        <?php 
                                        $values = get_sub_field( 'image_alt_text' );
                                        if ( $values ) { ?>
                                            <img class="img-responsive" alt="<?php the_sub_field('image_alt_text'); ?>" src="<?php echo $image[0]; ?>" /> 
                                        <?php 
                                        } else { ?>
                                            <img class="img-responsive" alt="<?php echo $alt_text; ?>" src="<?php echo $image[0]; ?>" /> 
                                        <?php } ?>

                                        <?php if( get_sub_field('caption') ): ?>
                                        <div class="image__caption">
                                            <span><?php the_sub_field('caption'); ?></span>
                                        </div>
                                        <?php endif; ?>     

                                    </div>
                                    <!-- // inner image  -->

                                <?php elseif( get_row_layout() == 'half_width_image' ): ?>

                                    <div class="image__half">
                                            <?php
                                            $imageID = get_sub_field('featured_image');
                                            $image = wp_get_attachment_image_src( $imageID, 'blogfeat-image' );
                                            $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
                                            ?> 

                                            <img class="img-responsive" alt="<?php echo $alt_text; ?>" src="<?php echo $image[0]; ?>" /> 
                                        </div>
                                        <!-- // inner image  -->
                                    </div>

                                <?php elseif( get_row_layout() == 'table_of_contents' ): ?>

                                    <div class="blog__toc">
                                        <span class="title">Table of Contents</span>
                                        <ul>
                                            <?php if( have_rows('table_content') ): ?>
                                                <?php while( have_rows('table_content') ): the_row(); ?>
                                                    
                                                <li><a href="#<?php the_sub_field('id_anchor'); ?>"><?php the_sub_field('main_heading'); ?></a>
                                                
                                                    <?php if( have_rows('subheadings') ): ?>
                                                        <ul>
                                                    <?php while( have_rows('subheadings') ): the_row(); ?>
                                                        <li><a href="#<?php the_sub_field('id_of_section'); ?>"><?php the_sub_field('subheading'); ?></a></li>
                                                    <?php endwhile; ?>
                                                    </ul>
                                                    <?php endif; ?>

                                                </li>
                                                <?php endwhile; ?>
                                            <?php endif; ?>
                                        
                                        </ul>
                                    </div>
                                    <!-- // toc  -->																

                                <?php elseif( get_row_layout() == 'quote' ): ?>	

                                    <blockquote>
                                        <?php the_sub_field('quotation_content'); ?>
                                        <?php if( get_sub_field('source') ): ?>
                                        <span class="author">- <?php the_sub_field('source'); ?></span>
                                        <?php endif; ?>
                                    </blockquote>	

                                    <?php elseif( get_row_layout() == 'quote' ): ?>	

                                    <blockquote>
                                        <?php the_sub_field('quotation_content'); ?>
                                        <?php if( get_sub_field('source') ): ?>
                                        <span class="author">- <?php the_sub_field('source'); ?></span>
                                        <?php endif; ?>
                                    </blockquote>	

                                <?php elseif( get_row_layout() == 'video' ): ?>	

                                    <div class="video__holder">
                                        <?php the_sub_field('embedded_code'); ?>
                                    </div>	

                                <?php elseif( get_row_layout() == 'accordion' ): ?>		

                                    <div class="blog__accordion">
                                        <h3><?php the_sub_field('accordion_title'); ?></h3>
                                        <div class="accordion__list">
                                            <?php if( have_rows('accordion_list') ): ?>
                                                <?php while( have_rows('accordion_list') ): the_row(); ?>
                                                    <button class="accordion"><h4><?php the_sub_field('heading'); ?></h4></button>
                                                    <div class="panel">
                                                        <div class="panel__content">
                                                        <?php the_sub_field('content'); ?>
                                                        </div>
                                                    </div>
                                                <?php endwhile; ?>
                                            <?php endif; ?>
                                        </div>
                                        <!-- // list  -->
                                    </div>
                                    <!-- // accordion  -->

                                <?php endif;
                            endwhile;
                        else :
                        endif;
                        ?>

                    </div>
                    <div class="author__card">
                        <span>Written By: </span> <strong><?php the_author(); ?></strong>
                    </div>
                    <!-- // card  -->
                </div>
                <!-- // col  -->
            </div>
            <!-- // row  -->
        </div>
        <!-- // container  -->
    </article>
    <!-- // single  -->

<?php
get_footer();
