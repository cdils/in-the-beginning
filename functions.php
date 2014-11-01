<?php

/**
 * Theme setup.
 *
 * Attach all of the site-wide functions to the correct hooks and filters. All
 * the functions themselves are defined below this setup function.
 *
 * @since 1.0.0
 */

//* Use copy of Genesis Framework language files for upgrade stability
define( 'GENESIS_LANGUAGES_DIR', trailingslashit( get_stylesheet_directory() ) . 'languages/genesis' );

// Must be added before Genesis Framework /lib/init.php is included
add_action( 'after_setup_theme', 'in_the_beginning_genesis_child_setup' );
function in_the_beginning_genesis_child_setup() {
    load_child_theme_textdomain( 'in_the_beginning', trailingslashit( get_stylesheet_directory() ) . 'languages' );
}

function in_the_beginning_child_theme_setup() {

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
	add_action( 'wp_enqueue_scripts', 'in_the_beginning_google_fonts' );
}
add_action( 'genesis_setup', 'in_the_beginning_child_theme_setup', 15 );


//* Enqueue Google Fonts
function in_the_beginning_google_fonts() {

    wp_enqueue_style( 'in-the-beginning-fonts', in_the_beginning_fonts_url(), array(), null );

}

/**
 * Build Google fonts URL.
 *
 * This function enqueues Google fonts in such a way that translators can easily turn on/off
 * the fonts if they do not contain the necessary character sets. Hat tip to Frank Klein for
 * showing this to me.
 *
 * @link http://themeshaper.com/2014/08/13/how-to-add-google-fonts-to-wordpress-themes/
 * @since  1.0.0
 */
function in_the_beginning_fonts_url() {
    $fonts_url = '';

    /* Translators: If there are characters in your language that are not
    * supported by Lato, translate this to 'off'. Do not translate
    * into your own language.
    */
    $lato = _x( 'on', 'Lato font: on or off', 'in-the-beginning' );

    if ( 'off' !== $lato ) {
        $font_families = array();

        if ( 'off' !== $lato ) {
            $font_families[] = 'Lato:300,400,700';
        }

        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );

        $fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
    }

    return $fonts_url;
}
