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

    <article id="blog__single">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <header>
                        <h1><?php the_title(''); ?></h1>
                        <div class="metas">
                            <span class="blog-date"><i class="fal fa-calendar-alt"></i> <?php echo get_the_date( 'F j, Y' ); ?></span><br>
                            <span class="meta-author-cat">Posted in
                            
                                <?php
                                global $post;
                                $categories = get_the_category($post->ID);
                                $cat_link = get_category_link($categories[0]->cat_ID);
                                echo '<a href="'.$cat_link.'">'.$categories[0]->cat_name.'</a>' 
                                ?>   /                            
                                By <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a>
                            </span>
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

                                    <?php endif; ?>
                            
                            <?php endwhile; ?>

                        <?php endif; ?> 

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
