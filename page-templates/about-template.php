<?php
/**
 * Template Name: About Template
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
						$values = get_field( 'main_title_about_header' );
						if ( $values ) { ?>
							<h1><?php the_field('main_title_about_header'); ?></h1>
						<?php 
						} else { ?>
							<h1><?php the_title(''); ?></h1>
						<?php } ?>
						<?php the_field('content_block_about_page'); ?>
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
		<section class="auto-transport">

		<?php if( have_rows('content_layout_about') ): ?>
			<?php while( have_rows('content_layout_about') ): the_row(); ?>

				<?php if( get_row_layout() == 'full_width_content' ): ?>
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<?php the_sub_field('content_block'); ?>
						</div>
					</div>
				</div>
				<?php elseif( get_row_layout() == 'full_width_image' ): ;?>
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="image-holder">
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
				<?php elseif( get_row_layout() == 'services' ): ;?>

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

											<img class="img-responsive" alt="<?php the_title(''); ?>" src="<?php echo $image[0]; ?>" /> 
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

											<img class="img-responsive" alt="<?php the_title(''); ?>" src="<?php echo $image[0]; ?>" /> 
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
					<!-- /.featured-services -->	
				</div>

				<?php endif; ?>
			<?php endwhile; ?>
		<?php endif; ?>

		</section>
		<!-- /#auto-transport -->

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
                                $post_objects = get_field('client_reviews_about_page');

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
