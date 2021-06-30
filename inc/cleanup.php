<?php
/**
 * Clean the wordpress
 *
 * @package custom
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
// Emoji detection script.
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
// Emoji styles.
remove_action( 'wp_print_styles', 'print_emoji_styles' );

/*
Show less info to users on failed login for security.
(Will not let a valid username be known.)
*/
function show_less_login_info() { 
    return "<strong>ERROR</strong>: Stop guessing!"; }
add_filter( 'login_errors', 'show_less_login_info' );

/*
Do not generate and display WordPress version
*/
function no_generator()  { 
    return ''; }
add_filter( 'the_generator', 'no_generator' );  

function author_link(){
    global $comment;
    $comment_ID = $comment->user_id;
    $author = get_comment_author( $comment_ID );
    $url = get_comment_author_url( $comment_ID );
    if ( empty( $url ) || 'http://' == $url )
      $return = $author;
    else
      $return = "$author";
    return $return;
  }
  add_filter('get_comment_author_link', 'author_link');
  
  
  // Remove WP version from RSS.
  if ( ! function_exists( 'blanktheme_remove_rss_version' ) ) :
  function blanktheme_remove_rss_version() { return ''; }
  endif;
  
  // Remove injected CSS for recent comments widget.
  if ( ! function_exists( 'blanktheme_remove_wp_widget_recent_comments_style' ) ) :
  function blanktheme_remove_wp_widget_recent_comments_style() {
    if ( has_filter( 'wp_head', 'wp_widget_recent_comments_style' ) ) {
      remove_filter( 'wp_head', 'wp_widget_recent_comments_style' );
    }
  }
  endif;
  
  // Remove injected CSS from recent comments widget.
  if ( ! function_exists( 'blanktheme_remove_recent_comments_style' ) ) :
  function blanktheme_remove_recent_comments_style() {
    global $wp_widget_factory;
    if ( isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments']) ) {
    remove_action( 'wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style') );
    }
  }
  endif;

/**
 * Hide editor on specific pages.
 *
 */
add_action( 'admin_init', 'hide_editor' );
function hide_editor() {
  // Get the Post ID.
  $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
  if( !isset( $post_id ) ) return;
  // Hide the editor on the page titled 'Homepage'
  $homepgname = get_the_title($post_id);
  if($homepgname == 'Home'){ 
    remove_post_type_support('page', 'editor');
  }
  // Hide the editor on a page with a specific page template
  // Get the name of the Page Template file.
  $template_file = get_post_meta($post_id, '_wp_page_template', true);
  if($template_file == 'front-page.php' 
  || $template_file == 'page-templates/contact-template.php'
  || $template_file == 'page-templates/about-template.php'){ // the filename of the page template
    remove_post_type_support('page', 'editor');
  }
}

// remove comments menu 
function remove_admin_menu_items() {
	$remove_menu_items = array(__('Comments'));
	global $menu;
	end ($menu);
	while (prev($menu)){
		$item = explode(' ',$menu[key($menu)][0]);
		if(in_array($item[0] != NULL?$item[0]:"" , $remove_menu_items)){
		unset($menu[key($menu)]);}
	}
}

add_action('admin_menu', 'remove_admin_menu_items');

function my_footer_remover() {
  remove_filter( 'update_footer', 'core_update_footer' ); 
}

add_action( 'admin_menu', 'my_footer_remover' );

add_action('admin_head', 'remove_content_editor');
/**
 * Remove the content editor from ALL pages 
 */
function remove_content_editor()
{ 
    remove_post_type_support('page', 'editor');        
}