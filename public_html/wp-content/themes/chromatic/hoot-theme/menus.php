<?php
/**
 * Register custom theme menus
 * This file is loaded via the 'after_setup_theme' hook at priority '10'
 *
 * @package chromaticfw
 * @subpackage chromatic
 * @since chromatic 1.0
 */

/* Register custom menus. */
add_action( 'init', 'chromaticfw_base_register_menus', 5 );

/**
 * Registers nav menu locations.
 *
 * @since 1.0
 * @access public
 * @return void
 */
function chromaticfw_base_register_menus() {
	register_nav_menu( 'primary', _x( 'Primary Navigation', 'nav menu location', 'chromaticfw' ) );
}