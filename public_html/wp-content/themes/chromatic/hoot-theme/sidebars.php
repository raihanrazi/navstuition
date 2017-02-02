<?php
/**
 * Register sidebar widget areas for the theme
 * This file is loaded via the 'after_setup_theme' hook at priority '10'
 *
 * Dynamic widget areas (like template areas, footers) are handled by the framework. To override them,
 * remove actions 'chromaticfw_footer_register_sidebars' and 'chromaticfw_widgetized_template_register_sidebars' from
 * 'widgets_init' hook, and add custom sidebars here using 'chromaticfw_register_sidebar'.
 *
 * @package chromaticfw
 * @subpackage chromatic
 * @since chromatic 1.0
 */

/* Register sidebars. */
add_action( 'widgets_init', 'chromaticfw_base_register_sidebars', 5 );

/**
 * Registers sidebars.
 *
 * @since 1.0
 * @access public
 * @return void
 */
function chromaticfw_base_register_sidebars() {

	chromaticfw_register_sidebar(
		array(
			'id'          => 'primary-sidebar',
			'name'        => _x( 'Primary Sidebar', 'sidebar', 'chromaticfw' ),
			'description' => __( 'The main sidebar throughout the site.', 'chromaticfw' )
		)
	);

	chromaticfw_register_sidebar(
		array(
			'id'          => 'topbar-left',
			'name'        => _x( 'Topbar Left', 'sidebar', 'chromaticfw' ),
			'description' => __( 'Leave empty if you dont want to show topbar.', 'chromaticfw' )
		)
	);

	chromaticfw_register_sidebar(
		array(
			'id'          => 'topbar-right',
			'name'        => _x( 'Topbar Right', 'sidebar', 'chromaticfw' ),
			'description' => __( 'Leave empty if you dont want to show topbar.', 'chromaticfw' )
		)
	);

	chromaticfw_register_sidebar(
		array(
			'id'          => 'sub-footer',
			'name'        => _x( 'Sub Footer', 'sidebar', 'chromaticfw' ),
			'description' => __( 'Leave empty if you dont want to show subfooter.', 'chromaticfw' )
		)
	);

}