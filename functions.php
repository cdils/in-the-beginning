<?php

// Change this to your theme text domain, used for internationalising strings
$theme_text_domain = 'in-the-beginning';

add_action( 'after_setup_theme', 'in_the_beginning_i18n' );
/**
 * Load the child theme textdomain for internationalization.
 *
 * Must be loaded before Genesis Framework /lib/init.php is included.
 * Translations can be filed in the /languages/ directory.
 *
 * @since 1.0.0
 */
function in_the_beginning_i18n() {
    load_child_theme_textdomain( $theme_text_domain, get_stylesheet_directory() . '/languages' );
}

add_action( 'genesis_setup', 'in_the_beginning_setup', 15 );
/**
 * Theme setup.
 *
 * Attach all of the site-wide functions to the correct hooks and filters. All
 * the functions themselves are defined below this setup function.
 *
 * @since 1.0.0
 */
function in_the_beginning_setup() {

	//* Child theme (do not remove)
	define( 'CHILD_THEME_NAME', 'In the Beginning' );
	define( 'CHILD_THEME_URL', 'http://www.carriedils.com/' );
	define( 'CHILD_THEME_VERSION', '1.0.0' );

	//* Add HTML5 markup structure
	add_theme_support( 'html5', array( 'caption', 'comment-form', 'comment-list', 'gallery', 'search-form' ) );

	//* Add viewport meta tag for mobile browsers
	add_theme_support( 'genesis-responsive-viewport' );

	//* Add support for custom background
	add_theme_support( 'custom-background' );

	//* Add support for 3-column footer widgets
	add_theme_support( 'genesis-footer-widgets', 3 );

	//* Queue scripts used for the front end
	add_action( 'wp_enqueue_scripts', 'in_the_beginning_enqueue_assets' );
}

/**
 * Enqueue theme assets.
 *
 * @since 1.0.0
 */
function in_the_beginning_enqueue_assets() {

    // Load Google fonts
    wp_enqueue_style( 'in-the-beginning-fonts', in_the_beginning_fonts_url(), array(), null );

    // Check if the current locale is RTL script
    if ( is_rtl() ) {

        // Replace style.css with style-rtl.css for RTL languages
        wp_style_add_data( 'in-the-beginning', 'rtl', 'replace' );
    }
}

/**
 * Build Google fonts URL.
 *
 * This function enqueues Google fonts in such a way that translators can easily turn on/off
 * the fonts if they do not contain the necessary character sets. Hat tip to Frank Klein for
 * the tutorial.
 *
 * @link http://themeshaper.com/2014/08/13/how-to-add-google-fonts-to-wordpress-themes/
 *
 * @since  1.0.0
 */
function in_the_beginning_fonts_url() {
    $fonts_url = '';

    /* Translators: If there are characters in your language that are not
    * supported by Lato, translate this to 'off'. Do not translate
    * into your own language.
    */
    $lato = _x( 'on', 'Lato font: on or off', $theme_text_domain );

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
