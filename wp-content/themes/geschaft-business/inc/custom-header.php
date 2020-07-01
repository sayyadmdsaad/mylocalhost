<?php
/**
 * Custom header implementation
 */

function geschaft_business_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'geschaft_business_custom_header_args', array(

		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1600,
		'height'                 => 400,
		'wp-head-callback'       => 'geschaft_business_header_style',
	) ) );
}

add_action( 'after_setup_theme', 'geschaft_business_custom_header_setup' );

if ( ! function_exists( 'geschaft_business_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see geschaft_business_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'geschaft_business_header_style' );
function geschaft_business_header_style() {
	//Check if user has defined any header image.
	if ( get_header_image() ) :
	$custom_css = "
        .wrap_figure{
			background-image:url('".esc_url(get_header_image())."');
			background-position: center top;
		}";
	   	wp_add_inline_style( 'geschaft-business-style', $custom_css );
	endif;
}
endif; // geschaft_business_header_style