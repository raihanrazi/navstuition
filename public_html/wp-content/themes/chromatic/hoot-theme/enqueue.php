<?php
/**
 * Enqueue scripts and styles for the theme.
 * This file is loaded via the 'after_setup_theme' hook at priority '10'
 *
 * @package chromaticfw
 * @subpackage chromatic
 * @since chromatic 1.0
 */

/* Add custom scripts. Set priority to 11 so that the theme's main js is loaded after default scripts which are loaded at priority 10 */
add_action( 'wp_enqueue_scripts', 'chromaticfw_base_enqueue_scripts', 11 );

/* Add custom styles. Set priority to default 10 so that theme's main style is loaded after these styles (at priority 11), and can thus easily override any style without over-qualification.  */
add_action( 'wp_enqueue_scripts', 'chromaticfw_base_enqueue_styles', 10 );

/* Dequeue font awesome */
add_action( 'wp_enqueue_scripts', 'chromaticfw_base_dequeue_fontawesome', 99 );

/**
 * Load scripts for the front end.
 *
 * @since 1.0
 * @access public
 * @return void
 */
function chromaticfw_base_enqueue_scripts() {

	/* Gets ".min" suffix. */
	$suffix = chromaticfw_get_min_suffix();

	/* Load jquery */
	wp_enqueue_script( 'jquery' );

	/* Load modernizr */
	wp_enqueue_script( 'modernizr', trailingslashit( THEME_URI ) . "js/modernizr.custom{$suffix}.js", array(), '2.8.3' );

	/* Load Superfish and WP's hoverIntent */
	// WordPress prior to v3.6 uses an older version of HoverIntent which doesn't support event delegation :( 
	wp_enqueue_script( 'hoverIntent' );
	wp_enqueue_script( 'superfish', trailingslashit( THEME_URI ) . "js/jquery.superfish{$suffix}.js", array( 'jquery', 'hoverIntent'), '1.7.5', true );

	/* Load lightSlider if 'light-slider' is active. */
	if ( current_theme_supports( 'light-slider' ) ) {
		wp_enqueue_script( 'lightSlider', trailingslashit( THEME_URI ) . "js/jquery.lightSlider{$suffix}.js", array( 'jquery' ), '1.1.1', true );
	}

	/* Load fitvids */
	wp_enqueue_script( 'fitvids', trailingslashit( THEME_URI ) . "js/jquery.fitvids{$suffix}.js", array(), '1.1', true );

	/* Load Theme Javascript */
	wp_enqueue_script( 'chromaticfw-theme', trailingslashit( THEME_URI ) . "js/hoot.theme{$suffix}.js", array(), THEME_VERSION, true );
	// Localize Theme Javascript - Must be called after the script has been registered.
	chromaticfw_localize_theme_script();

}

/**
 * Pass data to Theme Javascript
 *
 * @since 2.0
 * @access public
 * @return void
 */
function chromaticfw_localize_theme_script() {
	$chromaticfwdata = array();

	if ( !empty( $chromaticfwdata ) )
		wp_localize_script( 'chromaticfw-theme', 'hootData', $chromaticfwdata );
}

/**
 * Load stylesheets for the front end.
 *
 * @since 1.0
 * @access public
 * @return void
 */
function chromaticfw_base_enqueue_styles() {

	/* Gets ".min" suffix. */
	$suffix = chromaticfw_get_min_suffix();

	/* Load Google Fonts if 'google-fonts' is active. */
	if ( current_theme_supports( 'google-fonts' ) ) {
		wp_enqueue_style( 'chromaticfw-google-fonts', chromaticfw_google_fonts_enqueue_url(), array(), null );
	}

	/* Load lightSlider style if 'light-slider' is active. */
	if ( current_theme_supports( 'light-slider' ) ) {
		wp_enqueue_style( 'lightSlider', trailingslashit( THEME_URI ) . "css/lightSlider{$suffix}.css", false, '1.1.0' );
	}

	/* Load gallery style if 'cleaner-gallery' is active. */
	if ( current_theme_supports( 'cleaner-gallery' ) ) {
		wp_enqueue_style( 'gallery', trailingslashit( CHROMATICFW_CSS ) . "gallery{$suffix}.css" );
	}

	/* Load font awesome if 'font-awesome' is active. */
	if ( current_theme_supports( 'font-awesome' ) ) {
		wp_enqueue_style( 'font-awesome', trailingslashit( CHROMATICFW_CSS ) . "font-awesome{$suffix}.css", false, '4.2.0' );
	}

}

/**
 * Build URL for loading Google Fonts
 * @credit http://themeshaper.com/2014/08/13/how-to-add-google-fonts-to-wordpress-themes/
 *
 * @since 1.0
 * @access public
 * @return void
 */
function chromaticfw_google_fonts_enqueue_url() {
	$fonts_url = '';
	$query_args = array();
 
	/* Translators: If there are characters in your language that are not
	* supported by this font, translate this to 'off'. Do not translate
	* into your own language.
	*/
	$lato = _x( 'on', 'Lato font: on or off', 'chromaticfw' );

	/* Translators: If there are characters in your language that are not
	* supported by this font, translate this to 'off'. Do not translate
	* into your own language.
	*/
	$open_sans = _x( 'off', 'Open Sans font: on or off', 'chromaticfw' );

	if ( 'off' !== $lato || 'off' !== $open_sans ) {
		$font_families = array();

		if ( 'off' !== $lato ) {
			$font_families[] = 'Lato:300,300italic,400,400italic,700,700italic';
		}

		if ( 'off' !== $open_sans ) {
			$font_families[] = 'Open Sans:300,400,400italic,700';
		}

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			//'subset' => urlencode( 'latin,latin-ext' ),
			'subset' => urlencode( 'latin' ),
		);

	}

	if ( !empty( $query_args ) )
		$fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
 
	return $fonts_url;
}

/**
 * Dequeue font awesome from frontend if a similar handle exists (registered by another plugin)
 * but it is already enqueued using the theme
 *
 * @since 1.0
 * @access public
 * @return void
 */
function chromaticfw_base_dequeue_fontawesome() {
	if ( current_theme_supports( 'font-awesome' ) && wp_style_is( 'fontawesome' ) )
		wp_dequeue_style( 'fontawesome' );
}