<?php
/**
 * ACF Main Settings
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

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
            $result->invalidate( $tag, "Non-serviceable location at the moment. Sorry!" );
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
            $result->invalidate( $tag, "Non-serviceable location at the moment. Sorry!" );
        }

        if(!isValidZipCode($the_value)){
            $result->invalidate( $tag, "Please provide 5 digits ZIP Code" );
        }		

    } 
       
    return $result;
 }

add_filter( 'wpcf7_validate_text', 'utm_zip_to_validator', 10, 2 );
add_filter( 'wpcf7_validate_text*', 'utm_zip_to_validator', 10, 2 );


function cf7_post_to_third_party($form)
{
    $formMappings = array(
        'first_name' => array('your-first'),
		'last_name' => array('your-last'),
		'email' => array('your-email'),
		'phone' => array('your-tel'),
		'move_date' => array('your-date'),
		'move_size' => array('home-size'),
		'from_zip' => array('zip-from', 'zip-fromas'),
		'to_zip' => array('zip-to', 'zip-toas'),
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