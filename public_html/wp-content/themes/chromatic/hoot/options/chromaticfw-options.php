<?php
/**
 * ChromaticFw Options framework is an extended version of the
 * Options Framework, Copyright 2010 - 2014, WP Theming http://wptheming.com
 * and is licensed under GPLv2
 *
 * This file is loaded at 'after_setup_theme' hook with 4 priority.
 *
 * @package chromaticfw
 * @subpackage options-framework
 * @since chromaticfw 1.0.0
 */

/* Include Helper functions */
require_once( trailingslashit( CHROMATICFWOPTIONS_DIR ) . 'includes/helpers.php' );

/**
 * Inititalize ChromaticFw Options
 *
 * @since 1.0.0
 */
if ( is_admin() && ! function_exists( 'chromaticoptions_init' ) ) :

	function chromaticoptions_init() {

		//  If user can't edit theme options, exit
		if ( ! current_user_can( 'edit_theme_options' ) ) {
			return;
		}

		// Loads the required ChromaticFw Options Framework classes.
		require trailingslashit( CHROMATICFWOPTIONS_DIR ) . 'includes/class-chromaticfw-options.php';
		require trailingslashit( CHROMATICFWOPTIONS_DIR ) . 'includes/class-chromaticfw-options-admin.php';
		require trailingslashit( CHROMATICFWOPTIONS_DIR ) . 'includes/class-chromaticfw-options-interface.php';
		require trailingslashit( CHROMATICFWOPTIONS_DIR ) . 'includes/class-chromaticfw-options-media-uploader.php';
		require trailingslashit( CHROMATICFWOPTIONS_DIR ) . 'includes/sanitization.php';

		// Instantiate the options page.
		$chromaticfw_options_admin = new ChromaticFw_Options_Admin;
		$chromaticfw_options_admin->init();

		// Instantiate the media uploader class
		$chromaticfw_options_media_uploader = new ChromaticFw_Options_Media_Uploader;
		$chromaticfw_options_media_uploader->init();

	}

	add_action( 'init', 'chromaticoptions_init', 20 );

endif;