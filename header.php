<?php
/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="icon" type="image/png"  href="<?php echo get_template_directory_uri(); ?>/img/ico/favicon.png">
	<?php if( get_field('head_code_snippet', 'options') ): ?>
		<?php the_field('head_code_snippet', 'options'); ?>
	<?php endif; ?>	
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php understrap_body_attributes(); ?>>
<?php do_action( 'wp_body_open' ); ?>

	<?php if( get_field('body_code_snippet', 'options') ): ?>
		<?php the_field('body_code_snippet', 'options'); ?>
	<?php endif; ?>

	<div class="wraper">
        <div class="menu-overlay"></div>
        <div class="main-menu-sidebar">
            <header class="visible-xs visible-sm visible-md">
                <a href="javascript:;" class="close-menu-btn">Close</a>
            </header>
            <!-- // header  -->        
            <div id="mobile__brand">
                <img src="<?php the_field('white_logo_general', 'options'); ?>" alt="<?php bloginfo('name'); ?>">
            </div>
            <!-- // brand  -->
            <div id="menu">
                <ul>

                     <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li>
                     <?php if( have_rows('menu_items_header_main', 'options') ): ?>
                        <?php while( have_rows('menu_items_header_main', 'options') ): the_row(); ?>
                           ;
                           
                        <?php if (get_sub_field('link_type') == 'Single Item') { ?>
                           <li><a href="<?php the_sub_field('link_to_page'); ?>"><?php the_sub_field('item_label'); ?> </a></li>
                        <?php } elseif (get_sub_field('link_type') == 'Dropdown') { ?>

                     
                           <li>
                        <a href="<?php the_sub_field('link_to_page'); ?>"><?php the_sub_field('item_label'); ?></a>
                        <ul>
                           <?php if( have_rows('dropdown_items') ): ?>
                              <?php while( have_rows('dropdown_items') ): the_row(); ?>
                                 <li><a href="<?php the_sub_field('link_to_page'); ?>"><?php the_sub_field('label'); ?></a></li>
                              <?php endwhile; ?>
                           <?php endif; ?>
                        
                        </ul>
                     </li>               

				<?php } elseif (get_sub_field('link_type') == 'Dropdown Multilevel') { ?>
			
					<li>
						<a href="<?php the_sub_field('link_to_page'); ?>"><?php the_sub_field('item_label'); ?></a>
						<ul>

						<?php if( have_rows('multilevel_items') ): ?>
							<?php while( have_rows('multilevel_items') ): the_row(); ?>


									<?php if (get_sub_field('type_of_item') == 'Single Items') { ?>

										<li><a href="<?php the_sub_field('item_link'); ?>"><?php the_sub_field('item_label_sub'); ?></a></li>

									<?php } elseif (get_sub_field('type_of_item') == 'Dropdown Items') { ?>
							
										<li>
											<a href="<?php the_sub_field('item_link'); ?>"><?php the_sub_field('item_label_sub'); ?></a>
											<ul>
												<?php if( have_rows('dropdown_items_sub') ): ?>
												<?php while( have_rows('dropdown_items_sub') ): the_row(); ?>
													<li><a href="<?php the_sub_field('link_sub_sub'); ?>"><?php the_sub_field('label_sub_sub'); ?></a></li>
												<?php endwhile; ?>
												<?php endif; ?>
											</ul>
										</li>

									<?php } ?>      
									<!-- // select of 3rd level    -->                  
								
							<?php endwhile; ?>
						<?php endif; ?>
						</ul>
						
					</li>
				<?php } ?>   

            <?php endwhile; ?>
         <?php endif; ?>

                </ul>
            </div>
        </div>
        <!-- // mobile menu  -->
        <div id="menu_area" class="menu-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <nav class="navbar navbar-light navbar-expand-lg mainmenu">

							<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
								<img src="<?php the_field('website_logo_branding', 'options'); ?>" width="175" alt="<?php bloginfo('name'); ?>">
							</a>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav ml-auto">

									<?php if( have_rows('menu_items_header_main', 'options') ): ?>
										<?php while( have_rows('menu_items_header_main', 'options') ): the_row(); ?>
											<?php if (get_sub_field('link_type') == 'Single Item') { ?>
												<li><a href="<?php the_sub_field('link_to_page'); ?>"><?php the_sub_field('item_label'); ?></a></li>
											<?php } elseif (get_sub_field('link_type') == 'Dropdown') { ?>

												<li class="dropdown">
												<a class="dropdown-toggle--re" href="<?php the_sub_field('link_to_page'); ?>" id="navbarDropdown" role="button"  aria-haspopup="true" aria-expanded="false"><?php the_sub_field('item_label'); ?></a>
												<ul class="dropdown-menu fade" aria-labelledby="navbarDropdown">
												<?php if( have_rows('dropdown_items') ): ?>
													<?php while( have_rows('dropdown_items') ): the_row(); ?>
														<li><a href="<?php the_sub_field('link_to_page'); ?>"><?php the_sub_field('label'); ?></a></li>
													<?php endwhile; ?>
												<?php endif; ?>
												</ul>
											</li>

											<?php } elseif (get_sub_field('link_type') == 'Dropdown Multilevel') { ?>

												<li class="dropdown">
												<a class="dropdown-toggle--re" href="<?php the_sub_field('link_to_page'); ?>" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php the_sub_field('item_label'); ?></a>
												<ul class="dropdown-menu fade" aria-labelledby="navbarDropdown">                                 

												<?php if( have_rows('multilevel_items') ): ?>
												<?php while( have_rows('multilevel_items') ): the_row(); ?>

													<?php if (get_sub_field('type_of_item') == 'Single Items') { ?>
														<li><a href="<?php the_sub_field('item_link'); ?>"><?php the_sub_field('item_label_sub'); ?></a></li>
													<?php } elseif (get_sub_field('type_of_item') == 'Dropdown Items') { ?>
												
														<li class="dropdown">
															<a class="dropdown-toggle--re" href="<?php the_sub_field('item_link'); ?>" id="navbarDropdown" role="button"  aria-haspopup="true" aria-expanded="false"><?php the_sub_field('item_label_sub'); ?></a>
															<ul class="dropdown-menu fade" aria-labelledby="navbarDropdown">
															<?php if( have_rows('dropdown_items_sub') ): ?>
																<?php while( have_rows('dropdown_items_sub') ): the_row(); ?>
																	<li><a href="<?php the_sub_field('link_sub_sub'); ?>"><?php the_sub_field('label_sub_sub'); ?></a></li>
																<?php endwhile; ?>
															<?php endif; ?>
															</ul>
														</li>     

													<?php } ?>      
													<!-- // select of 3rd level    -->
									
												<?php endwhile; ?>
												<?php endif; ?>

												</ul>
											</li>                                 

											<?php } ?>                                     
										<?php endwhile; ?>
									<?php endif; ?>
									
								</ul>
								<?php 
								$values = get_field( 'phone_number_city_page' );
								if ( $values ) { ?>
                                	<a href="tel:<?php the_field('phone_number_city_page'); ?>" class="call"><i class="fas fa-phone-alt"></i> <?php the_field('phone_number_city_page') ;?></a>
								<?php 
								} else { ?>
                                	<a href="tel:<?php the_field('phone_number_general_cta', 'options') ;?>" class="call"><i class="fas fa-phone-alt"></i> <?php the_field('phone_number_general_cta', 'options') ;?></a>
								<?php } ?>
																
                                <a href="<?php the_field('button_link_top_cta_header', 'options'); ?>" class="quote"><?php the_field('button_label_top_cta_header', 'options'); ?></a>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
            <div id="mobile-menu--btn" class="visible-xs">
                <span class="menu-btn">
                <a href="javascript:;" class="open">
                <span></span>
                <span></span>
                <span></span>
                </a>
                </span> 
            </div>
        </div>