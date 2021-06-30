<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>



	<?php if (is_singular('cities') ) { ?>

        <div id="bottom-cta">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <h6>Flat Price Moving & Auto Shipping - <?php the_title(); ?></h6>
                    </div>
                    <!-- /.col-md-4 -->
                    <div class="col-md-8">
                        <div class="contact">
                            <strong><?php the_field('phone_label_footer_cta', 'options'); ?></strong> 
                            <a href="tel:<?php the_field('phone_number_city_page'); ?>"><?php the_field('phone_number_city_page'); ?></a> <br>
                            <strong><?php the_field('email_label_footer_cta', 'options'); ?></strong> <a href="mailto:<?php the_field('email_address_footer_cta', 'options'); ?>"><?php the_field('email_address_footer_cta', 'options'); ?></a>
                        </div>
                        <!-- /.contact -->
                    </div>
                    <!-- /.col-md-8 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /#bottom-cta -->        

	<?php } elseif (is_singular('movingto') ) { ?>

        <div id="bottom-cta">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <h6>Flat Price Moving & Auto Shipping - <?php the_title(); ?></h6>
                    </div>
                    <!-- /.col-md-4 -->
                    <div class="col-md-8">
                        <div class="contact">
                            <strong><?php the_field('phone_label_footer_cta', 'options'); ?></strong> 
                            <a href="tel:<?php the_field('phone_number_city_page'); ?>"><?php the_field('phone_number_city_page'); ?></a> <br>
                            <strong><?php the_field('email_label_footer_cta', 'options'); ?></strong> <a href="mailto:<?php the_field('email_address_footer_cta', 'options'); ?>"><?php the_field('email_address_footer_cta', 'options'); ?></a>
                        </div>
                        <!-- /.contact -->
                    </div>
                    <!-- /.col-md-8 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /#bottom-cta -->     

    <?php } else { ?>

    <div id="bottom-cta">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h6><?php the_field('title_footer_cta', 'options') ;?></h6>
                </div>
                <!-- /.col-md-4 -->
                <div class="col-md-8">
                    <div class="contact">
                        <strong><?php the_field('phone_label_footer_cta', 'options'); ?></strong> 
                        <a href="tel:<?php the_field('phone_number_footer_cta', 'options'); ?>"><?php the_field('phone_number_footer_cta', 'options'); ?></a> <br>
                        <strong><?php the_field('email_label_footer_cta', 'options'); ?></strong> <a href="mailto:<?php the_field('email_address_footer_cta', 'options'); ?>"><?php the_field('email_address_footer_cta', 'options'); ?></a>
                        <address>
                            <strong><?php the_field('address_label_footer_cta', 'options'); ?></strong> <?php the_field('company_address_footer_cta', 'options'); ?>
                        </address>
                    </div>
                    <!-- /.contact -->
                </div>
                <!-- /.col-md-8 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /#bottom-cta -->

	<?php } ?>
   

    <footer id="page-footer">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="cert-secure">
                        <h4><?php the_field('block_title_cert_footer', 'options'); ?></h4>
                        <div class="ceritifactions">
                            <?php if( have_rows('cert_list_footer', 'options') ): ?>
                                <?php while( have_rows('cert_list_footer', 'options') ): the_row(); ?>

                                    <a href="<?php the_sub_field('url_to_review'); ?>" target="_blank"><img src="<?php the_sub_field('logo'); ?>" alt=""></a>

                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                        <!-- /.ceritifactions -->
                        <div class="cert__code">
                            <bbbseal class="bbbseal sevtbal"></bbbseal>
                            <script type="text/javascript">
                            (function () {
                                var bbb = document.createElement("script");
                                bbb.type = "text/javascript";
                                bbb.async = true;
                                bbb.src = "https://seal-boston.bbb.org/v3/logo/sevtbal/bbb-185897.js";
                                var s = document.getElementsByTagName("script")[0];
                                s.parentNode.insertBefore(bbb, s);
                            })();
                            </script>  
                        </div>
                        <!-- // code  -->
                        <span class="code"><?php the_field('company_code_footer', 'options'); ?></span>
                        <div class="security">
                            <?php if( have_rows('trust_logos_footer', 'options') ): ?>
                                <?php while( have_rows('trust_logos_footer', 'options') ): the_row(); ?>

                                    <img src="<?php the_sub_field('logo'); ?>" alt="">

                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                        <!-- /.security -->
                    </div>
                    <!-- /.cert-secure -->
                </div>
                <!-- /.col -->
                <div class="col">
                    <div class="newsletter">
                        <h4><?php the_field('block_title_nl_footer', 'options'); ?></h4>
                        <div class="form__wrapper">
                            <input type="email" placeholder="Your Email">
                            <button type="submit"><i class="fal fa-paper-plane"></i></button>
                            <!-- /.form__wrapper -->
                        </div>
                        <div class="footnote">
                            <?php the_field('newsletter_notice_footer', 'options'); ?>
                        </div>
                        <!-- /.footnote -->
                    </div>
                    <!-- /.newsletter -->
                </div>
                <!-- /.col -->
                <div class="col">
                    <div class="in-touch">
                        <h4><?php the_field('block_title_contact_footer', 'options'); ?></h4>
                            <?php if( have_rows('email_list_footer', 'options') ): ?>
                                <?php while( have_rows('email_list_footer', 'options') ): the_row(); ?>

                                    <a href="mailto:<?php the_sub_field('email_address'); ?>"><?php the_sub_field('email_address'); ?></a>

                                <?php endwhile; ?>
                            <?php endif; ?>
                    </div>
                    <!-- /.in-touch -->
                </div>
                <!-- /.col -->
                <div class="col">
                    <div class="follow-us">
                        <h4><?php the_field('block_title_socials_footer', 'options'); ?></h4>
                        <ul>
                            <?php if( have_rows('socials_list_footer', 'options') ): ?>
                                <?php while( have_rows('socials_list_footer', 'options') ): the_row(); ?>
                                    <li><a href="<?php the_sub_field('social_url'); ?>" target="_blank"><?php the_sub_field('icon_code'); ?></a></li>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <!-- /.follow-us -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </footer>
    <!-- /#page-footer -->
    <div class="copy-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="copy-bar-in">
                        <div class="footer-links">
                            <?php wp_nav_menu( array( 'theme_location' => 'footer' ) ); ?>
                        </div>
                        <!-- /.footer-links -->
                        <small>&copy; Copyright <?php echo(date('Y'));?> <?php the_field('copyright_text_footer', 'options'); ?></small>
                        <!-- /small -->
                    </div>
                    <!-- /.copy-bar-in -->
                </div>
                <!-- /.col-md-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.copy-bar -->
    </div>
    <!-- /.wraper -->

	<div id="cookie-notice">
		<div id="cookie-notice-in">
			<div class="notice-text">
				<?php the_field('notice_text_cookies', 'options'); ?>
			</div>
			<!-- /.notice-text -->
			<div class="notice-btns">
				<a href="#" id="accept-cookie"><?php the_field('button_1_label_cookies', 'options'); ?></a>
				<a href="<?php the_field('button_link_cooke_2', 'options'); ?>" target="_blank" id="more-info-cookie"><?php the_field('button_2_label_cooki', 'options'); ?></a>
			</div>
			<!-- /.notice-btns -->
			<a href="javascript:void(0);" id="close-notice"></a>
		</div>
		<!-- /#cookie-notice-in -->
	</div>
	<!-- /#cookie-notice -->

	<!-- Modal -->
	<div class="modal fade" id="tooltip-modal" tabindex="-1" role="dialog" aria-labelledby="tooltip-modalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
			<div class="modal-content">
			<div class="modal-body">
			
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true"><i class="fal fa-times"></i></span>
				</button>

				<?php the_field('tooltip_content_modal', 'options'); ?>

			</div>
			<!-- // body  -->
			</div>
		</div>
	</div>	  

<?php wp_footer(); ?>

	<?php if( get_field('footer_code_snippet', 'options') ): ?>
		<?php the_field('footer_code_snippet', 'options'); ?>
	<?php endif; ?>

    <script>
        $('#cookie-notice').addClass('slide-up');

        $('#close-notice, #accept-cookie').click(function(e) {
            e.preventDefault();
            $("#cookie-notice").removeClass("slide-up");
            $("#cookie-notice").addClass("slide-down");
        });
	
    </script>


</body>

</html>

