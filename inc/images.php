<?php
/**
 * Custom image sizes
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// general
add_image_size('preview-image', 300, 200, TRUE);

// Homepage
add_image_size('slider-image', 1920, 550, TRUE);
add_image_size('service-image', 400, 320, TRUE);

// About
add_image_size('about-image', 1200, 9999, FALSE);
add_image_size('video-image', 835, 462, TRUE);

// Services
add_image_size('side-image', 630, 9999, FALSE);

// Blog
add_image_size('blog-image', 550, 400, TRUE);
add_image_size('blogfeat-image', 1000, 9999, FALSE);