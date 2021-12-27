<?php
/**
 * Template Name: Cities Template
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

        <section id="intro-inner" class="about-intro">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="intro">
                            <?php 
                            $values = get_field( 'main_title_cities_header' );
                            if ( $values ) { ?>
                                <h1><?php the_field('main_title_cities_header'); ?></h1>
                            <?php 
                            } else { ?>
                                <h1><?php the_title(''); ?></h1>
                            <?php } ?>
                        </div>
                        <!-- /.intro -->
                        
                    </div>
                    <!-- /.col-md-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
        </section>
        <!-- /#intro-inner -->

	    <div id="about-page">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="location-list">
                            <ul>
                            <?php
                            $loop = new WP_Query( array( 'post_type' => 'cities', 'posts_per_page' => 1115, 'orderby' => 'post_title',
                            'order' => 'ASC') ); ?>  
                            <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

                                <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>

                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>      
                            </ul>					
                        </div>
                        <!-- // list  -->
                    </div>
                    <!-- /.col-md-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
		</div>
		

		<section id="reviews" style="background-image: url(<?php the_field('background_image_test_image_gen', 'options'); ?>)">
			<div class="overlay"></div>
			<!-- /.overlay -->
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="review-content">
							<h3><?php the_field('main_title_test_gen_test', 'options'); ?></h3>
							
							<?php
                                $post_objects = get_field('client_reviews_cities_page');

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

<?php get_footer(); ?>
