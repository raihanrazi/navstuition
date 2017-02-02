<?php
/**
 * Handle media (i.e. images, attachments) for the theme.
 * This file is loaded via the 'after_setup_theme' hook at priority '10'
 *
 * @package chromaticfw
 * @subpackage chromatic
 * @since chromatic 1.0
 */

/* Filter the Frameworks's default custom image sizes to be used through the theme */
add_filter( 'chromaticfw_custom_image_sizes', 'chromaticfw_theme_custom_image_sizes', 5 );

/**
 * Add custom image sizes to be used throughout the theme.
 * Also define whether to show the custom image size in the Image Editor in the Post Editor.
 *
 * Note, When using chromaticfw_get_image_size_name(), any span below 3 gets upgraded to span3, thereby
 * getting bigger images which display much better on smaller screens (where all spans become 100%)
 * Effectively, this means on a grid of 1260, custom images sizes should have atleast 315px width as
 * images below this width would not be used by this function.
 *
 * Note, order of sizes in this array matters. chromaticfw_get_image_size_name() automatically returns the
 * first image size it finds matching the width needed (and matching crop criteria).
 *
 * @since 1.0
 * @access public
 * @param array $sizes Default custom image sizes.
 * @return array
 */
function chromaticfw_theme_custom_image_sizes( $sizes ) {
	$sizes = array(
		// 240 x 180 (suitable for span3, calculated using logic of chromaticfw_get_image_size_name fn)
		'chromaticfw-small-preview' => array(
			'label'          => __( 'Small Preview', 'chromaticfw' ),
			'width'          => 315,
			'height'         => 230,
			'crop'           => true,
			'show_in_editor' => false,
		),
		// 393 x 180 (suitable for span4, calculated using logic of chromaticfw_get_image_size_name fn)
		'chromaticfw-large-preview' => array(
			'label'          => __( 'Large Preview', 'chromaticfw' ),
			'width'          => 420,
			'height'         => 190,
			'crop'           => true,
			'show_in_editor' => false,
		),
		// 393 x 180 (comes after 'chromaticfw-large-preview', so that 'chromaticfw-large-preview' stays as default for span4. 'chromaticfw-medium-preview' is used for archive-medium post thumbnails)
		'chromaticfw-medium-preview' => array(
			'label'          => __( 'Medium Preview', 'chromaticfw' ),
			'width'          => 420,
			'height'         => 550,
			'crop'           => false,
			'show_in_editor' => false,
		),
		// 740 x 340 (suitable for span8, calculated using logic of chromaticfw_get_image_size_name fn)
		'chromaticfw-wide' => array(
			'label'          => __( 'Wide', 'chromaticfw' ),
			'width'          => 840,
			'height'         => 385,
			'crop'           => true,
			'show_in_editor' => false,
		),
		// 835 x 340 (suitable for span9, calculated using logic of chromaticfw_get_image_size_name fn)
		'chromaticfw-extra-wide' => array(
			'label'          => __( 'Extra Wide', 'chromaticfw' ),
			'width'          => 945,
			'height'         => 385,
			'crop'           => true,
			'show_in_editor' => false,
		),
	);
	return $sizes;
}
