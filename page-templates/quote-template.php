<?php
/**
 * Template Name: Quote Template
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

    <div id="quote-page">
        <section id="booking-div" class="quote-page-div">
            <div class="form-wrapper">
                <div class="row">
                    <div class="col-md-12">
                        <h3><?php the_field('main_title_quote_page'); ?></h3>
                    </div>
                </div>
                <!-- /.row -->

                <div class="form-wrapper">

                    
                        <div class="row select-wrapper">

                            <ul class="nav nav-tabs" id="quote-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="autoquote-tab" data-toggle="tab" href="#auto-quote" role="tab" aria-controls="home" aria-selected="true"><img src="<?php bloginfo('template_directory'); ?>/img/ico/car.png" alt=""> <span><?php the_field('tab_title_tab_1', 'options'); ?></span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="movingquote-tab" data-toggle="tab" href="#moving-quote" role="tab" aria-controls="profile" aria-selected="false"><img src="<?php bloginfo('template_directory'); ?>/img/ico/house.png" alt=""> <span><?php the_field('tab_title_tab_2', 'options'); ?></span></a>
                                </li>
                            </ul>

                        </div>
                        <!-- // tab nav  -->

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="auto-quote" role="tabpanel" aria-labelledby="home-tab">

                                <?php the_field('form_code_tab_1', 'options'); ?>

                            </div>
                            <!-- // tab 1  -->

                            <div class="tab-pane fade" id="moving-quote" role="tabpanel" aria-labelledby="profile-tab">

                                <?php the_field('form_code_tab_2', 'options'); ?>

                            </div>
                            <!-- // tab 2  -->
                        </div>    
                        <!-- // tab content   -->

                </div>
                <!-- /.form-wrapper -->               
     

            </div>
            <!-- /.form-wrapper -->
        </section>
        <!-- /#booking-div -->
        
        <section id="intro-inner" class="about-intro">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="intro">
                            <h1><?php the_field('intro_title_quote_page'); ?></h1>
                            <?php the_field('intro_text_quote_page'); ?>
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
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">

                            <?php if( have_rows('content_layout_quote_page') ): ?>
                                <?php while( have_rows('content_layout_quote_page') ): the_row(); ?>

                                    <?php if( get_row_layout() == 'full_width_content' ): ?>

                                        <h3><?php the_sub_field('content_title'); ?></h3>
                                        <?php the_sub_field('content_block'); ?>

                                    <?php elseif( get_row_layout() == 'faq' ): ?>

                                        <div class="default-accordion">
                                            <?php if( have_rows('faq_list') ): ?>
                                                <?php while( have_rows('faq_list') ): the_row(); ?>

                                                    <div class="faq-box">
                                                        <h4><?php the_sub_field('question'); ?></h4>

                                                        <div>
                                                            <?php the_sub_field('answer'); ?>
                                                            <!-- /.faq-box -->
                                                        </div>
                                                        <!-- /.faq-box -->
                                                    </div>

                                                <?php endwhile; ?>
                                            <?php endif; ?>

                                        </div>
                                        <!-- /.default-accordion -->

                                    <?php endif; ?>
                                <?php endwhile; ?>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </section>
            <!-- /#auto-transport -->
            
            <?php include (TEMPLATEPATH . '/inc/why-inc.php' ); ?>

        </div>
        <!-- /#about-page -->
    </div>
    <!-- /#quote-page -->

<?php get_footer(); ?>
