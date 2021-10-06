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

    <header id="hero-banner">
        <div id="hero-content">
            <div class="overlay"></div>
            <?php
            $imageID = get_field('header_image_parent_child');
            $image = wp_get_attachment_image_src( $imageID, 'slider-image' );
            $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
            ?> 

            <img class="img-responsive" alt="<?php echo $alt_text; ?>" src="<?php echo $image[0]; ?>" /> 
            <div class="caption">
                <div class="container">
                    <div class="caption__holder">

                        <?php 
                        $values = get_field( 'custom_title_parent_child' );
                        if ( $values ) { ?>
                            <h1><?php the_field('custom_title_parent_child'); ?></h1>
                        <?php 
                        } else { ?>
                            <h1><?php the_title(); ?></h1>
                        <?php } ?>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- /#hero-content -->

        <?php include(TEMPLATEPATH . '/inc/quote-header.php'); ?>

    </header>
    <!-- /.hero-banner -->

    <div id="city-nav">
        <div class="container">
            <?php if( have_rows('list_of_posts_parent') ): ?>
                <?php while( have_rows('list_of_posts_parent') ): the_row(); ?>

                    <div class="nav-col">
                        <a href="<?php the_sub_field('link_to_post'); ?>">
                            <div class="icon">
                                <img src="<?php the_sub_field('icon'); ?>" alt="">
                            </div>
                            <span><?php the_sub_field('label'); ?></span>
                        </a>
                    </div>
                    <!-- // col  -->

                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
    <!-- // cta nav  -->

    <article id="blog__single">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">

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
                                    
                                <?php elseif( get_row_layout() == 'featured_article' ): ?>    
                                    <?php
                                        $post_objects = get_sub_field('featured_article_list');

                                        if( $post_objects ): ?>
                                            <?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
                                                <?php setup_postdata($post); ?>
                                                    
                                                <div class="featured-article-box">
                                                    <article class="blog__card">
                                                        <div class="blog__image">
                                                            <a href="<?php echo get_permalink(); ?>" tabindex="0" target="_blank">
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
                                                                <img src="<?php bloginfo('template_directory') ?>/img/misc/placeholder.jpg" alt="<?php the_title(''); ?>" class="img-responsive">
                                                            <?php } ?></a>
                                                        </div>
                                                        <!-- // image  -->
                                                        <div class="blog__content">
                                                            <h3><a href="<?php echo get_permalink(); ?>" target="_blank"><?php the_title(''); ?></a></h3>
                                                            <a href="<?php echo get_permalink(); ?>" class="read-more" target="_blank">Continue reading</a>
                                                        </div>
                                                        <!-- // content  -->
                                                    </article>
                                                    <!-- // blog card -->
                                                </div>
                                                <!-- /.featured-article -->
                                                    
                                            <?php endforeach; ?>
                                        <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                                    <?php endif; ?>
                                <?php wp_reset_postdata(); ?>

                                <?php elseif( get_row_layout() == 'accordion' ): ?>		

                                    <div class="default-accordion blog__acc">
                                            <h3><?php the_sub_field('accordion_title'); ?></h3>
                                            <?php if( have_rows('accordion_list') ): ?>
                                                <?php while( have_rows('accordion_list') ): the_row(); ?>

                                                    <div class="faq-box">
                                                        <h4><?php the_sub_field('heading'); ?></h4>

                                                        <div>
                                                            <?php the_sub_field('content'); ?>
                                                            <!-- /.faq-box -->
                                                        </div>
                                                        <!-- /.faq-box -->
                                                    </div>

                                                <?php endwhile; ?>
                                            <?php endif; ?>
                                        </div>
                                        <!-- /.default-accordion --> 


                                    <?php elseif( get_row_layout() == 'quote_cta' ): ?>

                                        <div class="quote-cta--single">
                                            <span class="title"><?php the_sub_field('cta_title'); ?></span>
                                            <a href="#bottom-form" class="btn-cta"><?php the_sub_field('button_label'); ?></a>
                                        </div>
                                        <!-- // single  -->                                           

                                    <?php elseif( get_row_layout() == 'table' ): ?>

                                    <table style="width:100%" class="single-table">
                                        <thead>
                                            <tr role="row">

                                            <?php

                                                // check if the repeater field has rows of data
                                                if(have_rows('table_head_cells')):

                                                    // loop through the rows of data
                                                    while(have_rows('table_head_cells')) : the_row();

                                                        $hlabel = get_sub_field('table_cell_label_thead');

                                                        ?>  

                                                        <th tabindex="0" rowspan="1" colspan="1"><?php echo $hlabel; ?></th>

                                                    <?php endwhile;

                                                else :
                                                    echo 'No data';
                                                endif;
                                                ?>

                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php while ( have_posts() ) : the_post(); ?>

                                            <?php 

                                            // check for rows (parent repeater)
                                            if( have_rows('table_body_row') ): ?>
                                                
                                                <?php 

                                                // loop through rows (parent repeater)
                                                while( have_rows('table_body_row') ): the_row(); ?>

                                                        <?php 

                                                        // check for rows (sub repeater)
                                                        if( have_rows('table_body_cells') ): ?>
                                                            <tr>
                                                                <?php 

                                                                // loop through rows (sub repeater)
                                                                while( have_rows('table_body_cells') ): the_row();

                                                                    
                                                                    ?>
                                                                    <td><?php the_sub_field('table_cell_label_tbody'); ?></td>
                                                                <?php endwhile; ?>
                                                            </tr>
                                                        <?php endif; //if( get_sub_field('') ): ?>

                                                <?php endwhile; // while( has_sub_field('') ): ?>
                                                    
                                            <?php endif; // if( get_field('') ): ?>

                                            <?php endwhile; // end of the loop. ?>
                                            
                                        </tbody>
                                    </table>  

                                <?php endif;
                            endwhile;
                        else :
                        endif;
                        ?>

                    </div>
                </div>
                <!-- // col  -->
            </div>
            <!-- // row  -->
        </div>
        <!-- // container  -->
    </article>
    <!-- // single  -->

    <div id="bottom-form">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">

                    <?php include(TEMPLATEPATH . '/inc/quote-header.php'); ?>

                </div>
            </div>
            <!-- // row  -->

        </div>
        <!-- // container  -->
    </div>
    <!-- // bototm form  -->

<?php
get_footer();
