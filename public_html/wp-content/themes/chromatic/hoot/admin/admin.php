<?php
/**
 * Theme administration functions used with other components of the framework admin.  This file is for 
 * setting up any basic features and holding additional admin helper functions.
 *
 * @package chromaticfw
 * @subpackage framework
 * @since chromaticfw 1.0.0
 */

/* Add the admin setup function to the 'admin_menu' hook. */
add_action( 'admin_menu', 'chromaticfw_admin_setup' );

/**
 * Sets up the adminstration functionality for the framework and themes.
 *
 * @since 1.0.0
 * @access public
 * @return void
 */
function chromaticfw_admin_setup() {

	/* Registers admin stylesheets for the framework. */
	add_action( 'admin_enqueue_scripts', 'chromaticfw_admin_register_styles', 1 );

	/* Loads admin stylesheets for the framework. */
	add_action( 'admin_enqueue_scripts', 'chromaticfw_admin_enqueue_styles' );

	/* Registers admin scripts for the framework. */
	add_action( 'admin_enqueue_scripts', 'chromaticfw_admin_register_scripts', 1 );

	/* Loads admin scripts for the framework. */
	add_action( 'admin_enqueue_scripts', 'chromaticfw_admin_enqueue_scripts' );
}

/**
 * Registers the framework stylesheet files.  The function does not load the stylesheet.  
 * It merely registers it with WordPress.
 *
 * @since 1.0.0
 * @access public
 * @return void
 */
function chromaticfw_admin_register_styles() {

	/* Get the minified suffix */
	$suffix = chromaticfw_get_min_suffix();

	wp_register_style( 'chromaticfw-font-awesome', trailingslashit( CHROMATICFW_CSS ) . "font-awesome{$suffix}.css", false, '4.2.0' );
}

/**
 * Loads the stylesheet files for proper screens.
 *
 * @since 1.0.0
 * @access public
 * @return void
 */
function chromaticfw_admin_enqueue_styles( $hook ) {

	$options_page = 'appearance_page_' . chromaticoptions_option_name();

	if ( $options_page == $hook )
		wp_enqueue_style( 'chromaticfw-font-awesome' );
}

/**
 * Registers the framework's script file. The function does not load the scripts.  
 * It merely registers it with WordPress.
 *
 * @since 1.0.0
 * @access public
 * @return void
 */
function chromaticfw_admin_register_scripts() {
}

/**
 * Loads the script files for proper screens.
 *
 * @since 1.0.0
 * @access public
 * @return void
 */
function chromaticfw_admin_enqueue_scripts( $hook ) {
}