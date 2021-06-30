<?php
/**
 * Template Name: Services Template
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
						$values = get_field( 'custom_title_serv_page' );
						if ( $values ) { ?>
							<h1><?php the_field('custom_title_serv_page'); ?></h1>
						<?php 
						} else { ?>
							<h1><?php the_title(''); ?></h1>
						<?php } ?>
						<?php the_field('intro_text_serv_page'); ?>
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

    <div id="homepage">
        <section class="auto-transport">
            <div class="container">
                <div class="featured-services">

                    <?php
                        $loop = new WP_Query( array( 'post_type' => 'services', 'posts_per_page' => 15) ); ?>  
                        <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

                            <div class="featured-box feat-50">
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

                </div>
                <!-- /.featured-services -->
            </div>
        </section>
        <!-- /#auto-transport -->
    </div>
	
		
		<?php include (TEMPLATEPATH . '/inc/why-inc.php' ); ?>

<?php get_footer(); ?>
