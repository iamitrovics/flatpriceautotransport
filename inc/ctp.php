<?php
/**
 * ACF Main Settings
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

//  Locations
function wtp_testimonials() {

	$labels = array(
		'name'                  => _x( 'Testimonials', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Testimonials', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Testimonials', 'text_domain' ),
		'name_admin_bar'        => __( 'Edit Testimonials', 'text_domain' ),
		'archives'              => __( 'Аrchive', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All Testimonials', 'text_domain' ),
		'add_new_item'          => __( 'Add New Testimonial', 'text_domain' ),
		'add_new'               => __( 'Add New Testimonial', 'text_domain' ),
		'new_item'              => __( 'New Testimonial', 'text_domain' ),
		'edit_item'             => __( 'Edit Testimonial', 'text_domain' ),
		'update_item'           => __( 'Update Testimonial', 'text_domain' ),
		'view_item'             => __( 'View Testimonial', 'text_domain' ),
		'search_items'          => __( 'Search', 'text_domain' ),
		'not_found'             => __( 'Not Found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not Found', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'List of Cards', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Testimonials', 'text_domain' ),
		'description'           => __( 'Testimonials', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title'),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-format-quote',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'testimonials', $args );

}
add_action( 'init', 'wtp_testimonials', 0 );


//  View Reviews
function wtp_videoreviews() {

	$labels = array(
		'name'                  => _x( 'Video Reviews', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Video Reviews', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Video Reviews', 'text_domain' ),
		'name_admin_bar'        => __( 'Edit Video Reviews', 'text_domain' ),
		'archives'              => __( 'Аrchive', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All Reviews', 'text_domain' ),
		'add_new_item'          => __( 'Add New Review', 'text_domain' ),
		'add_new'               => __( 'Add New Review', 'text_domain' ),
		'new_item'              => __( 'New Review', 'text_domain' ),
		'edit_item'             => __( 'Edit Review', 'text_domain' ),
		'update_item'           => __( 'Update Review', 'text_domain' ),
		'view_item'             => __( 'View Review', 'text_domain' ),
		'search_items'          => __( 'Search', 'text_domain' ),
		'not_found'             => __( 'Not Found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not Found', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'List of Cards', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Reviews', 'text_domain' ),
		'description'           => __( 'Reviews', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title'),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-video-alt3',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'videoreviews', $args );

}
add_action( 'init', 'wtp_videoreviews', 0 );


//  Cities
function wtp_cities() {

	$labels = array(
		'name'                  => _x( 'Cities', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Cities', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Cities', 'text_domain' ),
		'name_admin_bar'        => __( 'Edit Cities', 'text_domain' ),
		'archives'              => __( 'Аrchive', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All Cities', 'text_domain' ),
		'add_new_item'          => __( 'Add New City', 'text_domain' ),
		'add_new'               => __( 'Add New City', 'text_domain' ),
		'new_item'              => __( 'New City', 'text_domain' ),
		'edit_item'             => __( 'Edit City', 'text_domain' ),
		'update_item'           => __( 'Update City', 'text_domain' ),
		'view_item'             => __( 'View City', 'text_domain' ),
		'search_items'          => __( 'Search', 'text_domain' ),
		'not_found'             => __( 'Not Found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not Found', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'List of Cards', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Cities', 'text_domain' ),
		'description'           => __( 'Cities', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title'),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-location-alt',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'with_front' => false,
	);
	register_post_type( 'cities', $args );

}
add_action( 'init', 'wtp_cities', 0 );


add_action( 'init', 'create_cities_hierarchical_taxonomy', 0 );

//create a custom taxonomy name it cities for your posts

function create_cities_hierarchical_taxonomy() {

// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI

  $labels = array(
    'name' => _x( 'States', 'taxonomy general name' ),
    'singular_name' => _x( 'States', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search' ),
    'all_items' => __( 'All States' ),
    'parent_item' => __( 'Parent' ),
    'parent_item_colon' => __( 'Parent of Category:' ),
    'edit_item' => __( 'Edit State' ), 
    'update_item' => __( 'Update State' ),
    'add_new_item' => __( 'Add State' ),
    'new_item_name' => __( 'New State' ),
    'menu_name' => __( 'States' ),
  ); 	

// Now register the taxonomy

  register_taxonomy('states',array('cities'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
	'query_var' => true,
	'rewrite' => array( 'slug' => 'state' )
  ));

}



//  Services
function wtp_services() {

	$labels = array(
		'name'                  => _x( 'Services', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Services', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Services', 'text_domain' ),
		'name_admin_bar'        => __( 'Edit Services', 'text_domain' ),
		'archives'              => __( 'Аrchive', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All Services', 'text_domain' ),
		'add_new_item'          => __( 'Add New Service', 'text_domain' ),
		'add_new'               => __( 'Add New Service', 'text_domain' ),
		'new_item'              => __( 'New Service', 'text_domain' ),
		'edit_item'             => __( 'Edit Service', 'text_domain' ),
		'update_item'           => __( 'Update Service', 'text_domain' ),
		'view_item'             => __( 'View Service', 'text_domain' ),
		'search_items'          => __( 'Search', 'text_domain' ),
		'not_found'             => __( 'Not Found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not Found', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'List of Cards', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Services', 'text_domain' ),
		'description'           => __( 'Services', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title'),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-editor-spellcheck',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'with_front' => false,
	);
	register_post_type( 'services', $args );

}
add_action( 'init', 'wtp_services', 0 );

//  Cities
function wtp_movingto() {

	$labels = array(
		'name'                  => _x( 'Moving To', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Moving To', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Moving To', 'text_domain' ),
		'name_admin_bar'        => __( 'Edit Moving To', 'text_domain' ),
		'archives'              => __( 'Аrchive', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All Moving To', 'text_domain' ),
		'add_new_item'          => __( 'Add New Item', 'text_domain' ),
		'add_new'               => __( 'Add New Item', 'text_domain' ),
		'new_item'              => __( 'New Item', 'text_domain' ),
		'edit_item'             => __( 'Edit Item', 'text_domain' ),
		'update_item'           => __( 'Update Item', 'text_domain' ),
		'view_item'             => __( 'View Item', 'text_domain' ),
		'search_items'          => __( 'Search', 'text_domain' ),
		'not_found'             => __( 'Not Found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not Found', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'List of Cards', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Moving To', 'text_domain' ),
		'description'           => __( 'Moving To', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title'),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-redo',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',

	);
	register_post_type( 'movingto', $args );

}
add_action( 'init', 'wtp_movingto', 0 );
