<?php
/**
 * UnderStrap functions and definitions
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$understrap_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	// '/pagination.php',                      Custom pagination for this theme.
	'/hooks.php',                           // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	// '/custom-comments.php',                 Custom Comments file.
	// '/jetpack.php',                         Load Jetpack compatibility file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker. Trying to get deeper navigation? Check out: https://github.com/understrap/understrap/issues/567.
	// '/woocommerce.php',                     Load WooCommerce functions.
	'/editor.php',                          // Load Editor functions.
	'/deprecated.php',                      // Load deprecated functions.
	// Custom include files
	'/cleanup.php',                         // Cleaning worpdress garbage
	'/images.php',                          // Image sizes
	'/settings.php',                        // Theme Settings
	'/customize.php',                       // Customize theme
	'/ctp.php',                             // Custom Post Types	
);

foreach ( $understrap_includes as $file ) {
	require_once get_template_directory() . '/inc' . $file;
}

add_action('init', 'init_remove_support',100);
function init_remove_support(){
    $post_type = 'post';
    remove_post_type_support( $post_type, 'editor');
}

function na_remove_slug( $post_link, $post, $leavename ) {

    if ( 'cities' != $post->post_type || 'publish' != $post->post_status ) {
        return $post_link;
    }

    $post_link = str_replace( '/' . $post->post_type . '/', '/', $post_link );

    return $post_link;
}
add_filter( 'post_type_link', 'na_remove_slug', 10, 3 );


function na_remove_slug_movingto( $post_link, $post, $leavename ) {

    if ( 'movingto' != $post->post_type || 'publish' != $post->post_status ) {
        return $post_link;
    }

    $post_link = str_replace( '/' . $post->post_type . '/', '/', $post_link );

    return $post_link;
}
add_filter( 'post_type_link', 'na_remove_slug_movingto', 10, 3 );


function na_parse_request( $query ) {

    if ( ! $query->is_main_query() || 2 != count( $query->query ) || ! isset( $query->query['page'] ) ) {
        return;
    }

    if ( ! empty( $query->query['name'] ) ) {
        $query->set( 'post_type', array( 'post', 'cities',  'page', 'movingto' ) );
    }
}
add_action( 'pre_get_posts', 'na_parse_request' );

function cf7_post_to_third_party($form)
{
    $formMappings = array(
        'first_name' => array('your-first'),
		'last_name' => array('your-last'),
		'email' => array('your-email'),
		'phone' => array('your-tel'),
		'move_date' => array('your-date'),
		'move_size' => array('home-size'),
		'from_zip' => array('zip-from'),
		'to_zip' => array('zip-to'),
		'car_trailer' => array('your-trailer'),
		'car_make' => array('car-make'),
		'car_model' => array('car-model'),
		'car_year' => array('car-year'),
        'source_details[url]' => array('dynamichidden-672'),
        'source_details[title]' => array('dynamichidden-673')
    );
    $handler = new MovingSoftFormHandler($formMappings);
    $handler->setOrigin('https://flatpriceautotransport.com')->handleCF7($form, [71864, 71878, 71865, 71879]);
}
add_action('wpcf7_mail_sent', 'cf7_post_to_third_party', 10, 1);


function skip_mail_when_testing($f){
    $submission = WPCF7_Submission::get_instance();
    $handler = new MovingSoftFormHandler();
    
    return $handler->getIP() == '206.189.212.83'; //testing Bot IP address
}
add_filter('wpcf7_skip_mail','skip_mail_when_testing');

// Allow SVG
add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {

  global $wp_version;
  if ( $wp_version !== '4.7.1' ) {
     return $data;
  }

  $filetype = wp_check_filetype( $filename, $mimes );

  return [
      'ext'             => $filetype['ext'],
      'type'            => $filetype['type'],
      'proper_filename' => $data['proper_filename']
  ];

}, 10, 4 );

function cc_mime_types( $mimes ){
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );

function fix_svg() {
  echo '<style type="text/css">
        .attachment-266x266, .thumbnail img {
             width: 100% !important;
             height: auto !important;
        }
        </style>';
}
add_action( 'admin_head', 'fix_svg' );


add_filter('use_block_editor_for_post', '__return_false', 10);

add_filter( 'wpcf7_autop_or_not', '__return_false' );


function fb_filter_query( $query, $error = true ) {

    if ( is_search() ) {
        $query->is_search = false;
        $query->query_vars['s'] = false;
        $query->query['s'] = false;

        if ( $error == true )
            $query->is_404 = true;
    }
}

add_action( 'parse_query', 'fb_filter_query' );
add_filter( 'get_search_form', function() { return null;} );


// Add custom validation for CF7 form fields
function lead_check_zip_from($zip){ // Check against list of common public email providers & return true if the email provided *doesn't* match one of them

    $the_state = isset( $_POST['your-state'] ) ? trim( $_POST['your-state'] ) : '';

    if ( (substr($zip, 0,2) === '55' || substr($zip, 0,2) === '56' ) && $the_state == "MN" ) {
        return false; // It's a publicly available email address
    }
    elseif ( (substr($zip, 0,2) === '05' ) && $the_state == "VT" ) {
        return false; // It's a publicly available email address
    }
    elseif ( (substr($zip, 0,2) === '83' ) && $the_state == "ID" ) {
        return false; // It's a publicly available email address
    }   
    elseif ( (substr($zip, 0,2) === '57' || substr($zip, 0,2) === '58' ) && $the_state == "ND" ) {
        return false; // It's a publicly available email address
    }      
    elseif ( (substr($zip, 0,2) === '57' || substr($zip, 0,2) === '58' ) && $the_state == "SD" ) {
        return false; // It's a publicly available email address
    }   
    elseif ( (substr($zip, 0,2) === '59' ) && $the_state == "MT" ) {
        return false; // It's a publicly available email address
    }    
    elseif ( (substr($zip, 0,2) === '82' ) && $the_state == "WY" ) {
        return false; // It's a publicly available email address
    }  
    elseif ( (substr($zip, 0,2) === '70' || substr($zip, 0,2) === '71' ) && $the_state == "LA" ) {
        return false; // It's a publicly available email address
    }   
    elseif ( (substr($zip, 0,2) === '66' || substr($zip, 0,2) === '67' ) && $the_state == "KS" ) {
        return false; // It's a publicly available email address
    }  
    elseif ( (substr($zip, 0,2) === '63' || substr($zip, 0,2) === '64' || substr($zip, 0,2) === '65' ) && $the_state == "MO" ) {
        return false; // It's a publicly available email address
    }  
    elseif ( (substr($zip, 0,2) === '38' ) && $the_state == "MS" ) {
        return false; // It's a publicly available email address
    }           
    elseif ( (substr($zip, 0,2) === '87' || substr($zip, 0,2) === '88' ) && $the_state == "NM" ) {
        return false; // It's a publicly available email address
    }      
    elseif ( (substr($zip, 0,2) === '68' || substr($zip, 0,2) === '69' ) && $the_state == "NE" ) {
        return false; // It's a publicly available email address
    }     
    elseif ( (substr($zip, 0,2) === '29' ) && $the_state == "SC" ) {
        return false; // It's a publicly available email address
    }  
    elseif ( (substr($zip, 0,2) === '27' || substr($zip, 0,2) === '28' ) && $the_state == "NC" ) {
        return false; // It's a publicly available email address
    }   
    elseif ( (substr($zip, 0,2) === '19' ) && $the_state == "DE" ) {
        return false; // It's a publicly available email address
    } 
    elseif ( (substr($zip, 0,2) === '71' || substr($zip, 0,2) === '72' ) && $the_state == "AR" ) {
        return false; // It's a publicly available email address
    }      
    elseif ( (substr($zip, 0,2) === '35' || substr($zip, 0,2) === '36' ) && $the_state == "AL" ) {
        return false; // It's a publicly available email address
    }    
    elseif ( (substr($zip, 0,2) === '37' || substr($zip, 0,2) === '38' ) && $the_state == "TN" ) {
        return false; // It's a publicly available email address
    }     
    elseif ( (substr($zip, 0,2) === '73' || substr($zip, 0,2) === '74' ) && $the_state == "OK" ) {
        return false; // It's a publicly available email address
    }     
    elseif ( (substr($zip, 0,2) === '40' || substr($zip, 0,2) === '41' || substr($zip, 0,2) === '42' ) && $the_state == "KY" ) {
        return false; // It's a publicly available email address
    }                                      
    else {
        return true; // It's a publicly available email address
    }    
}

function isValidZipCode($zipCode) {
    return (preg_match('/^[0-9]{5}(-[0-9]{4})?$/', $zipCode)) ? true : false;
}

function utm_zip_from_validator($result, $tag) {  

    $tag = new WPCF7_Shortcode( $tag );
    if ( 'zip-from' == $tag->name ) {
        $the_value = isset( $_POST['zip-from'] ) ? trim( $_POST['zip-from'] ) : '';
        
        if(!lead_check_zip_from($the_value)){
            $result->invalidate( $tag, "Not available in Zip Codes" );
        }

        if(!isValidZipCode($the_value)){
            $result->invalidate( $tag, "Please provide 5 digits ZIP Code" );
        }		

    } 
       
    return $result;
 }

add_filter( 'wpcf7_validate_text', 'utm_zip_from_validator', 10, 2 );
add_filter( 'wpcf7_validate_text*', 'utm_zip_from_validator', 10, 2 );


// Add custom validation for CF7 form fields
function lead_check_zip_to($zip){ // Check against list of common public email providers & return true if the email provided *doesn't* match one of them

    $the_state = isset( $_POST['your-stateto'] ) ? trim( $_POST['your-stateto'] ) : '';

    if ( (substr($zip, 0,2) === '55' || substr($zip, 0,2) === '56' ) && $the_state == "MN" ) {
        return false; // It's a publicly available email address
    }
    elseif ( (substr($zip, 0,2) === '05' ) && $the_state == "VT" ) {
        return false; // It's a publicly available email address
    }
    elseif ( (substr($zip, 0,2) === '83' ) && $the_state == "ID" ) {
        return false; // It's a publicly available email address
    }   
    elseif ( (substr($zip, 0,2) === '57' || substr($zip, 0,2) === '58' ) && $the_state == "ND" ) {
        return false; // It's a publicly available email address
    }      
    elseif ( (substr($zip, 0,2) === '57' || substr($zip, 0,2) === '58' ) && $the_state == "SD" ) {
        return false; // It's a publicly available email address
    }   
    elseif ( (substr($zip, 0,2) === '59' ) && $the_state == "MT" ) {
        return false; // It's a publicly available email address
    }    
    elseif ( (substr($zip, 0,2) === '82' ) && $the_state == "WY" ) {
        return false; // It's a publicly available email address
    }                         
    else {
        return true; // It's a publicly available email address
    }    
}



function utm_zip_to_validator($result, $tag) {  

    $tag = new WPCF7_Shortcode( $tag );
    if ( 'zip-to' == $tag->name ) {
        $the_value = isset( $_POST['zip-to'] ) ? trim( $_POST['zip-to'] ) : '';
        
        if(!lead_check_zip_to($the_value)){
            $result->invalidate( $tag, "Not available in Zip Codes" );
        }

        if(!isValidZipCode($the_value)){
            $result->invalidate( $tag, "Please provide 5 digits ZIP Code" );
        }		

    } 
       
    return $result;
 }

add_filter( 'wpcf7_validate_text', 'utm_zip_to_validator', 10, 2 );
add_filter( 'wpcf7_validate_text*', 'utm_zip_to_validator', 10, 2 );
