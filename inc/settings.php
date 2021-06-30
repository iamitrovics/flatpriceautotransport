<?php
/**
 * ACF Main Settings
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Main Options',
		'menu_title'	=> 'Main Options',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Header Options',
		'menu_title'	=> 'Header Options',
		'parent_slug'	=> 'theme-general-settings',
	));	

	acf_add_options_sub_page(array(
		'page_title' 	=> '404 Options',
		'menu_title'	=> '404 Options',
		'parent_slug'	=> 'theme-general-settings',
	));			

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Why Us Options',
		'menu_title'	=> 'Why Us Options',
		'parent_slug'	=> 'theme-general-settings',
	));			

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Quote Form Options',
		'menu_title'	=> 'Quote Form Options',
		'parent_slug'	=> 'theme-general-settings',
	));		
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Testimonials Options',
		'menu_title'	=> 'Testimonials Options',
		'parent_slug'	=> 'theme-general-settings',
	));		

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Footer Options',
		'menu_title'	=> 'Footer Options',
		'parent_slug'	=> 'theme-general-settings',
	));		

}
