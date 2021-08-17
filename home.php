<?php get_header(); ?>

    <header class="blog-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Blogs</h1>
                </div>
            </div>
        </div>
    </header>
    <!-- /.blog-header -->

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="blog-filters">
                    <ul>
                        <li><a href="<?php bloginfo('url'); ?>/blog" class="active">All</a></li>
                        <?php wp_list_categories('title_li='); ?>
                    </ul>
                </div>
                <!-- /.blog-filters -->
            </div>
            <!-- /.col-md-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->

    <section id="blog__listing">
        <div class="container">

            <?php
                $current_page = (get_query_var('paged')) ? get_query_var('paged') : 1; // get current page number
                $args = array(
                    'posts_per_page' => 10, // the value from Settings > Reading by default
                    'paged'          => $current_page // current page
                );
                query_posts( $args );
                
                $wp_query->is_archive = true;
                $wp_query->is_home = false;
                
                while(have_posts()): the_post(); ?>
                                    
                    <article class="blog__card">
                        <div class="blog__image">
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
                            <?php } ?>
                            <a href="<?php echo get_permalink(); ?>" tabindex="0"><span><i class="fal fa-long-arrow-right"></i></span></a>
                        </div>
                        <!-- // image  -->
                        <div class="blog__content">
                            <span class="blog-date"><i class="fal fa-calendar-alt"></i> <?php echo get_the_date( 'F j, Y' ); ?></span>
                            <h3><a href="<?php echo get_permalink(); ?>"><?php the_title(''); ?></a></h3>

                            <?php 
                            $values = get_field( 'excerpt_text' );
                            if ( $values ) { ?>
                                <?php the_field('excerpt_text'); ?>
                                <a href="<?php echo get_permalink(); ?>" class="more-btn">Continue reading</a>
                            <?php 
                            } else { ?>
                            <?php the_excerpt(); ?>
                            <a href="<?php echo get_permalink(); ?>" class="more-btn">Continue reading</a>
                            <?php } ?>
                        </div>
                        <!-- // content  -->
                    </article>
                    <!-- // blog card -->
                
                <?php endwhile; ?>

                <nav class="pagination-block">
                    <?php if( function_exists('wp_pagenavi') ) wp_pagenavi(); // WP-PageNavi function ?>
                </nav>    
                <!-- // pagination  -->

        </div>
        <!-- // container  -->
    </section>
    <!-- // blog listing  -->

<?php get_footer(); ?>