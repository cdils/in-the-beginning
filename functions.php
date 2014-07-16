<?php

/**
 * Theme setup.
 * 
 * Attach all of the site-wide functions to the correct hooks and filters. All 
 * the functions themselves are defined below this setup function.
 *
 * @since 1.0.0
 */
function itb_child_theme_setup() {

	//* Child theme (do not remove)
	define( 'CHILD_THEME_NAME', 'In the Beginning' );
	define( 'CHILD_THEME_URL', 'http://www.carriedils.com/' );
	define( 'CHILD_THEME_VERSION', '0.2.0' );
	
	//* Add HTML5 markup structure
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

	//* Add viewport meta tag for mobile browsers
	add_theme_support( 'genesis-responsive-viewport' );

	//* Add support for custom background
	add_theme_support( 'custom-background' );

	//* Add support for 3-column footer widgets
	add_theme_support( 'genesis-footer-widgets', 3 );
	
	//* Enqueue Google Fonts
	add_action( 'wp_enqueue_scripts', 'itb_google_fonts' );
}
add_action( 'genesis_setup', 'itb_child_theme_setup', 15 );


//* Enqueue Google Fonts
function itb_google_fonts() {

	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Lato:300,400,700', array(), CHILD_THEME_VERSION );

}


