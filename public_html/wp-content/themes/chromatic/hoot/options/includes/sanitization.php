<?php
/**
 * Sanitization functions for option types.
 * Each option type gets a 'chromaticfw_of_sanitize_' . $option['type'] filter applied during
 * validation (after the submit/reset button has been clicked) in ChromaticFw_Options_Admin
 *
 * @package chromaticfw
 * @subpackage options-framework
 * @since chromaticfw 1.0.0
 */

/**
 * Sanitization for text input
 *
 * @link http://developer.wordpress.org/reference/functions/sanitize_text_field/
 */
add_filter( 'chromaticfw_of_sanitize_text', 'sanitize_text_field' );

/**
 * Sanitization for password input
 *
 * @link http://developer.wordpress.org/reference/functions/sanitize_text_field/
 */
add_filter( 'chromaticfw_of_sanitize_password', 'sanitize_text_field' );

/**
 * Sanitization for select input
 *
 * Validates that the selected option is a valid option.
 */
add_filter( 'chromaticfw_of_sanitize_select', 'chromaticfw_of_sanitize_enum', 10, 2 );

/**
 * Sanitization for radio input
 *
 * Validates that the selected option is a valid option.
 */
add_filter( 'chromaticfw_of_sanitize_radio', 'chromaticfw_of_sanitize_enum', 10, 2 );

/**
 * Sanitization for image selector
 *
 * Validates that the selected option is a valid option.
 */
add_filter( 'chromaticfw_of_sanitize_images', 'chromaticfw_of_sanitize_enum', 10, 2 );

/**
 * Validates that the $input is one of the avilable choices
 * for that specific option.
 *
 * @param string $input
 * @returns string $output
 */
function chromaticfw_of_sanitize_enum( $input, $option ) {
	$output = '';
	if ( array_key_exists( $input, $option['options'] ) ) {
		$output = $input;
	}
	return $output;
}

/**
 * Sanitization for textarea field
 *
 * @param $input string
 * @return $output sanitized string
 */
function chromaticfw_of_sanitize_textarea( $input ) {
	global $allowedposttags;
	$output = wp_kses( $input, $allowedposttags);
	return $output;
}
add_filter( 'chromaticfw_of_sanitize_textarea', 'chromaticfw_of_sanitize_textarea' );

/**
 * Sanitization for checkbox input
 *
 * @param $input string (1 or empty) checkbox state
 * @return $output '1' or false
 */
function chromaticfw_of_sanitize_checkbox( $input ) {
	if ( $input ) {
		$output = '1';
	} else {
		$output = false;
	}
	return $output;
}
add_filter( 'chromaticfw_of_sanitize_checkbox', 'chromaticfw_of_sanitize_checkbox' );

/**
 * Sanitization for multicheck
 *
 * @param array of checkbox values
 * @return array of sanitized values ('1' or false)
 */
function chromaticfw_of_sanitize_multicheck( $input, $option ) {
	$output = '';
	if ( is_array( $input ) ) {
		foreach( $option['options'] as $key => $value ) {
			$output[$key] = false;
		}
		foreach( $input as $key => $value ) {
			if ( array_key_exists( $key, $option['options'] ) && $value ) {
				$output[$key] = '1';
			}
		}
	}
	return $output;
}
add_filter( 'chromaticfw_of_sanitize_multicheck', 'chromaticfw_of_sanitize_multicheck', 10, 2 );

/**
 * File upload sanitization.
 *
 * Returns a sanitized filepath if it has a valid extension.
 *
 * @param string $input filepath
 * @returns string $output filepath
 */
function chromaticfw_of_sanitize_upload( $input ) {
	$output = '';
	$filetype = wp_check_filetype( $input );
	if ( $filetype["ext"] ) {
		$output = esc_url( $input );
	}
	return $output;
}
add_filter( 'chromaticfw_of_sanitize_upload', 'chromaticfw_of_sanitize_upload' );

/**
 * Sanitization for color input.
 * If validation fails, we dont want to save empty string. Instead saving default value is more ideal.
 *
 * @param string $input Color value. "#" may or may not be prepended to the string.
 * @return string Color in hexidecimal notation. "#" is prepended
 */
function chromaticfw_of_sanitize_color( $input, $option ) {
	$default = ( isset( $option['std'] ) ) ? $option['std'] : '';
	$output = apply_filters( 'chromaticfw_of_sanitize_hex', $input, $default );
	return $output;
}
add_filter( 'chromaticfw_of_sanitize_color', 'chromaticfw_of_sanitize_color', 10, 2 );

/**
 * Sanitize a color represented in hexidecimal notation.
 * Used to sanitize color value for color fields in color, typography, background options
 *
 * @param string Color in hexidecimal notation. "#" may or may not be prepended to the string.
 * @param string The value that this function should return if it cannot be recognized as a color.
 * @return string Color in hexidecimal notation. "#" is prepended
 */
function chromaticfw_of_sanitize_hex( $hex, $default = '' ) {
	if ( $hex = chromaticfw_color_santize_hex( $hex ) ) {
		return $hex;
	}
	if ( !is_array( $default ) ) {
		if ( $default = chromaticfw_color_santize_hex( $default ) ) {
			return $default;
		}
	}
	return null;
}
add_filter( 'chromaticfw_of_sanitize_hex', 'chromaticfw_of_sanitize_hex', 10, 2 );

/**
 * Sanitization for editor input.
 *
 * Returns unfiltered HTML if user has permissions.
 *
 * @param string $input
 * @returns string $output
 */
function chromaticfw_of_sanitize_editor( $input ) {
	if ( current_user_can( 'unfiltered_html' ) ) {
		$output = $input;
	}
	else {
		// global $allowedtags;
		// $output = wpautop( wp_kses( $input, $allowedtags ) );
		global $allowedposttags;
		$output = wpautop( wp_kses( $input, $allowedposttags ) );
	}
	return $output;
}
add_filter( 'chromaticfw_of_sanitize_editor', 'chromaticfw_of_sanitize_editor' );

/**
 * Sanitization of input with allowed tags and wpautotop.
 *
 * Allows allowed tags in html input and ensures tags close properly.
 *
 * @param string $input
 * @returns string $output
 */
function chromaticfw_of_sanitize_allowedtags( $input ) {
	global $allowedtags;
	$output = wpautop( wp_kses( $input, $allowedtags ) );
	return $output;
}

/**
 * Sanitization of input with allowed post tags and wpautotop.
 *
 * Allows allowed post tags in html input and ensures tags close properly.
 *
 * @param string $input
 * @returns string $output
 */
function chromaticfw_of_sanitize_allowedposttags( $input ) {
	global $allowedposttags;
	$output = wpautop( wp_kses( $input, $allowedposttags) );
	return $output;
}

/**
 * Sanitization for sortlist
 *
 * @param array of values
 * @return array of sanitized values
 */
function chromaticfw_of_sanitize_sortlist( $input, $option ) {
	$output = '';
	if ( is_array( $input ) ) {
		$order=999;
		foreach( $option['options'] as $key => $value ) {
			$order++;
			if ( isset( $input[$key] ) ) {
				$parts = array_map( 'intval', explode( ",", $input[$key] ) );
				$output[$key] =( $parts[0] > 0 && $parts[0] <= count( $option['options'] ) && ( $parts[1] === 0 || $parts[1] === 1) ) ?
					$parts[0] . ',' . $parts[1] :
					$order . ',1';
			} else {
				$output[$key] = $order . ',1';
			}
		}
	}
	return $output;
}
add_filter( 'chromaticfw_of_sanitize_sortlist', 'chromaticfw_of_sanitize_sortlist', 10, 2 );

/**
 * Sanitization for icon
 *
 * @returns string $input if it is valid
 */
function chromaticfw_of_sanitize_icon( $input, $option ) {
	$recognized = chromaticfw_of_recognized_icons();
	if ( in_array( $input, $recognized ) ) {
		return $input;
	}
	return apply_filters( 'chromaticfw_of_default_icon', '' );
}
add_filter( 'chromaticfw_of_sanitize_icon', 'chromaticfw_of_sanitize_icon', 10, 2 );

/**
 * Sanitization for group
 *
 * @returns string $input if it is valid
 */
function chromaticfw_of_sanitize_group( $input, $option ) {
	$output = array();

	foreach( $input as $groupID => $groupInput ) {
		$groupID = preg_replace( '/[^a-zA-Z0-9._\-]/', '', strtolower( $groupID ) );

		if ( isset( $option['fields'] ) ) :
		foreach ( $option['fields'] as $field ) {

			if ( ! isset( $field['id'] ) ) {
				continue;
			}

			// Edge case. Generally speaking, a group should not contain export/import feature.
			if ( ! isset( $field['type'] ) || $field['type'] == 'heading' || $field['type'] == 'subheading' || $field['type'] == 'info' || $field['type'] == 'html' || $field['type'] == 'import' || $field['type'] == 'export' ) {
				continue;
			}

			$fieldID = preg_replace( '/[^a-zA-Z0-9._\-]/', '', strtolower( $field['id'] ) );

			// Set checkbox to false if it wasn't sent in the $_POST
			if ( 'checkbox' == $field['type'] && ! isset( $groupInput[$fieldID] ) ) {
				$groupInput[$fieldID] = false;
			}

			// Set each item in the multicheck to false if it wasn't sent in the $_POST
			if ( 'multicheck' == $field['type'] && ! isset( $groupInput[$fieldID] ) ) {
				foreach ( $field['options'] as $key => $value ) {
					$groupInput[$fieldID][$key] = false;
				}
			}

			// If this is a regular save (even when a user has input an 'empty' value)
			// Or this is a reset, and the group 'std' has a 'gN' array with the field value also in it
			if ( isset ( $groupInput[$fieldID] ) )
				$subfield_val = $groupInput[$fieldID];
			// Else, this is a reset. Check if group-field has a 'std' of its own.
			elseif ( isset( $field['std'] ) )
				$subfield_val = $field['std'];
			// Else, this is a reset. And we have no standard values available.
			else
				$subfield_val = null;

			if ( has_filter( 'chromaticfw_of_sanitize_' . $field['type'] ) ) {
				$output[$groupID][$fieldID] = apply_filters( 'chromaticfw_of_sanitize_' . $field['type'], $subfield_val, $field );
			}

		}
		endif;

	}
	return $output;
}
add_filter( 'chromaticfw_of_sanitize_group', 'chromaticfw_of_sanitize_group', 10, 2 );

/**
 * Sanitization for background option.
 *
 * @returns array $output
 */
function chromaticfw_of_sanitize_background( $input, $option ) {

	$output = wp_parse_args( $input, array(
		'color' => '',
		'type' => 'predefined',
		'pattern' => '0',
		'image'  => '',
		'repeat'  => 'repeat',
		'position' => 'top center',
		'attachment' => 'scroll'
	) );

	$color_default = ( isset( $option['std']['color'] ) ) ? $option['std']['color'] : '';

	$output['color'] = apply_filters( 'chromaticfw_of_sanitize_hex', $output['color'], $color_default );
	$output['type'] = apply_filters( 'chromaticfw_of_sanitize_background_type', $output['type'] );
	$output['pattern'] = apply_filters( 'chromaticfw_of_sanitize_background_pattern', $output['pattern'] );
	$output['image'] = apply_filters( 'chromaticfw_of_sanitize_upload', $output['image'] );
	$output['repeat'] = apply_filters( 'chromaticfw_of_sanitize_background_repeat', $output['repeat'] );
	$output['position'] = apply_filters( 'chromaticfw_of_sanitize_background_position', $output['position'] );
	$output['attachment'] = apply_filters( 'chromaticfw_of_sanitize_background_attachment', $output['attachment'] );

	return $output;
}
add_filter( 'chromaticfw_of_sanitize_background', 'chromaticfw_of_sanitize_background', 10, 2 );

/**
 * Sanitization for background type
 *
 * @returns $value if it is valid
 */
function chromaticfw_of_sanitize_background_type( $value ) {
	$recognized = chromaticfw_of_recognized_background_type();
	if ( array_key_exists( $value, $recognized ) ) {
		return $value;
	}
	return apply_filters( 'chromaticfw_of_default_background_type', current( $recognized ) );
}
add_filter( 'chromaticfw_of_sanitize_background_type', 'chromaticfw_of_sanitize_background_type' );

/**
 * Sanitization for background pattern
 *
 * @returns $value if it is valid
 */
function chromaticfw_of_sanitize_background_pattern( $value ) {
	$recognized = chromaticfw_of_recognized_background_pattern();
	if ( array_key_exists( $value, $recognized ) ) {
		return $value;
	}
	return apply_filters( 'chromaticfw_of_default_background_pattern', current( $recognized ) );
}
add_filter( 'chromaticfw_of_sanitize_background_pattern', 'chromaticfw_of_sanitize_background_pattern' );

/**
 * Sanitization for background repeat
 *
 * @returns string $value if it is valid
 */
function chromaticfw_of_sanitize_background_repeat( $value ) {
	$recognized = chromaticfw_of_recognized_background_repeat();
	if ( array_key_exists( $value, $recognized ) ) {
		return $value;
	}
	return apply_filters( 'chromaticfw_of_default_background_repeat', current( $recognized ) );
}
add_filter( 'chromaticfw_of_sanitize_background_repeat', 'chromaticfw_of_sanitize_background_repeat' );

/**
 * Sanitization for background position
 *
 * @returns string $value if it is valid
 */
function chromaticfw_of_sanitize_background_position( $value ) {
	$recognized = chromaticfw_of_recognized_background_position();
	if ( array_key_exists( $value, $recognized ) ) {
		return $value;
	}
	return apply_filters( 'chromaticfw_of_default_background_position', current( $recognized ) );
}
add_filter( 'chromaticfw_of_sanitize_background_position', 'chromaticfw_of_sanitize_background_position' );

/**
 * Sanitization for background attachment
 *
 * @returns string $value if it is valid
 */
function chromaticfw_of_sanitize_background_attachment( $value ) {
	$recognized = chromaticfw_of_recognized_background_attachment();
	if ( array_key_exists( $value, $recognized ) ) {
		return $value;
	}
	return apply_filters( 'chromaticfw_of_default_background_attachment', current( $recognized ) );
}
add_filter( 'chromaticfw_of_sanitize_background_attachment', 'chromaticfw_of_sanitize_background_attachment' );

/**
 * Sanitization for typography option.
 */
function chromaticfw_of_sanitize_typography( $input, $option ) {

	$output = wp_parse_args( $input, array(
		'size'  => '',
		'face'  => '',
		'style' => '',
		'color' => ''
	) );

	$options = wp_parse_args( $option['options'], array(
		'size'  => array(),
		'face'  => array(),
		'style' => array(),
		'color' => true,
	) );

	// Skip if ['options']['face'] is set to false
	if ( ! $options['face'] === false )
		$output['face']  = apply_filters( 'chromaticfw_of_sanitize_font_face', $output['face'], $options['face'] );

	// Skip if ['options']['size'] is set to false
	if ( ! $options['size'] === false )
		$output['size']  = apply_filters( 'chromaticfw_of_sanitize_font_size', $output['size'], $options['size'] );

	// Skip if ['options']['style'] is set to false
	if ( ! $options['style'] === false )
		$output['style'] = apply_filters( 'chromaticfw_of_sanitize_font_style', $output['style'], $options['style'] );

	// Skip if ['options']['color'] is set to false
	if ( ! $options['color'] === false )
		$output['color'] = apply_filters( 'chromaticfw_of_sanitize_hex', $output['color'] );

	return $output;
}
add_filter( 'chromaticfw_of_sanitize_typography', 'chromaticfw_of_sanitize_typography', 10, 2 );

/**
 * Sanitization for font face
 */
function chromaticfw_of_sanitize_font_face( $value, $recognized = array() ) {
	$recognized = ( is_array( $recognized ) && !empty( $recognized ) ) ? $recognized : chromaticfw_of_recognized_font_faces();
	$value = stripslashes( $value );
	if ( array_key_exists( $value, $recognized ) ) { 
		return $value;
	}
	return apply_filters( 'chromaticfw_of_default_font_face', current( array_keys( $recognized ) ) );
}
add_filter( 'chromaticfw_of_sanitize_font_face', 'chromaticfw_of_sanitize_font_face', 10, 2 );

/**
 * Sanitization for font size
 */
function chromaticfw_of_sanitize_font_size( $value, $recognized = array() ) {
	$recognized = ( is_array( $recognized ) && !empty( $recognized ) ) ? $recognized : chromaticfw_of_recognized_font_sizes();
	$value_check = preg_replace('/px/','', $value);
	if ( in_array( (int) $value_check, $recognized ) ) {
		return $value;
	}
	//return apply_filters( 'chromaticfw_of_default_font_size', $recognized ); // bug:returns an array. Example case: default is set to 15px, and custom typography only has 6 to 13px. On save, an array ($recognized) gets stores instead of string.
	return apply_filters( 'chromaticfw_of_default_font_size', '', $recognized );
}
add_filter( 'chromaticfw_of_sanitize_font_size', 'chromaticfw_of_sanitize_font_size', 10, 2 );

/**
 * Sanitization for font style
 */
function chromaticfw_of_sanitize_font_style( $value, $recognized = array() ) {
	$recognized = ( is_array( $recognized ) && !empty( $recognized ) ) ? $recognized : chromaticfw_of_recognized_font_styles();
	if ( array_key_exists( $value, $recognized ) ) {
		return $value;
	}
	return apply_filters( 'chromaticfw_of_default_font_style', current( $recognized ) );
}
add_filter( 'chromaticfw_of_sanitize_font_style', 'chromaticfw_of_sanitize_font_style', 10, 2 );


/** ================================================================================ **/


/**
 * Get recognized background repeat settings
 *
 * @return   array
 */
function chromaticfw_of_recognized_icons() {
	$default = ChromaticFw_Options_Helper::icons();
	return apply_filters( 'chromaticfw_of_recognized_icons', $default );
}

/**
 * Get recognized background repeat settings
 *
 * @return   array
 */
function chromaticfw_of_recognized_background_repeat() {
	$default = array(
		'no-repeat' => __( 'No Repeat', 'chromaticfw' ),
		'repeat-x'  => __( 'Repeat Horizontally', 'chromaticfw' ),
		'repeat-y'  => __( 'Repeat Vertically', 'chromaticfw' ),
		'repeat'    => __( 'Repeat All', 'chromaticfw' ),
		);
	return apply_filters( 'chromaticfw_of_recognized_background_repeat', $default );
}

/**
 * Get recognized background positions
 *
 * @return   array
 */
function chromaticfw_of_recognized_background_position() {
	$default = array(
		'top left'      => __( 'Top Left', 'chromaticfw' ),
		'top center'    => __( 'Top Center', 'chromaticfw' ),
		'top right'     => __( 'Top Right', 'chromaticfw' ),
		'center left'   => __( 'Middle Left', 'chromaticfw' ),
		'center center' => __( 'Middle Center', 'chromaticfw' ),
		'center right'  => __( 'Middle Right', 'chromaticfw' ),
		'bottom left'   => __( 'Bottom Left', 'chromaticfw' ),
		'bottom center' => __( 'Bottom Center', 'chromaticfw' ),
		'bottom right'  => __( 'Bottom Right', 'chromaticfw')
		);
	return apply_filters( 'chromaticfw_of_recognized_background_position', $default );
}

/**
 * Get recognized background types
 *
 * @return   array
 */
function chromaticfw_of_recognized_background_type() {
	$default = array(
		'predefined' => __( 'Predefined Pattern', 'chromaticfw' ),
		'custom'     => __( 'Custom Image', 'chromaticfw' ),
		);
	return apply_filters( 'chromaticfw_of_recognized_background_type', $default );
}

/**
 * Get recognized background patterns
 *
 * @return   array
 */
function chromaticfw_of_recognized_background_pattern() {
	$default = array(
		0 => trailingslashit( CHROMATICFW_IMAGES ) . 'patterns/0_preview.jpg',
		'1.png' => trailingslashit( CHROMATICFW_IMAGES ) . 'patterns/1_preview.jpg',
		'2.png' => trailingslashit( CHROMATICFW_IMAGES ) . 'patterns/2_preview.jpg',
		'3.png' => trailingslashit( CHROMATICFW_IMAGES ) . 'patterns/3_preview.jpg',
		'4.png' => trailingslashit( CHROMATICFW_IMAGES ) . 'patterns/4_preview.jpg',
		'5.png' => trailingslashit( CHROMATICFW_IMAGES ) . 'patterns/5_preview.jpg',
		'6.png' => trailingslashit( CHROMATICFW_IMAGES ) . 'patterns/6_preview.jpg',
		'7.png' => trailingslashit( CHROMATICFW_IMAGES ) . 'patterns/7_preview.jpg',
		'8.png' => trailingslashit( CHROMATICFW_IMAGES ) . 'patterns/8_preview.jpg',
		);
	return apply_filters( 'chromaticfw_of_recognized_background_pattern', $default );
}

/**
 * Get recognized background attachment
 *
 * @return   array
 */
function chromaticfw_of_recognized_background_attachment() {
	$default = array(
		'scroll' => __( 'Scroll Normally', 'chromaticfw' ),
		'fixed'  => __( 'Fixed in Place', 'chromaticfw')
		);
	return apply_filters( 'chromaticfw_of_recognized_background_attachment', $default );
}

/**
 * Get recognized font sizes.
 *
 * Returns an indexed array of all recognized font sizes.
 * Values are integers and represent a range of sizes from
 * smallest to largest.
 *
 * @return   array
 */

function chromaticfw_of_recognized_font_sizes() {
	$sizes = range( 9, 82 );
	$sizes = apply_filters( 'chromaticfw_of_recognized_font_sizes', $sizes );
	$sizes = array_map( 'absint', $sizes );
	return $sizes;
}

/**
 * Get recognized font faces.
 *
 * Returns an array of all recognized font faces.
 * Keys are intended to be stored in the database
 * while values are ready for display in in html.
 *
 * @return   array
 */
function chromaticfw_of_recognized_font_faces() {
	$default = array_merge( ChromaticFw_Options_Helper::fonts('websafe'), ChromaticFw_Options_Helper::fonts('google-fonts') );
	return apply_filters( 'chromaticfw_of_recognized_font_faces', $default );
}

/**
 * Get recognized font styles.
 *
 * Returns an array of all recognized font styles.
 * Keys are intended to be stored in the database
 * while values are ready for display in in html.
 *
 * @return   array
 */
function chromaticfw_of_recognized_font_styles() {
	$default = array(
		'none'                     => __( 'None', 'chromaticfw' ),
		'italic'                   => __( 'Italic', 'chromaticfw' ),
		'bold'                     => __( 'Bold', 'chromaticfw' ),
		'bold italic'              => __( 'Bold Italic', 'chromaticfw' ),
		'lighter'                  => __( 'Light', 'chromaticfw' ),
		'lighter italic'           => __( 'Light Italic', 'chromaticfw' ),
		'uppercase'                => __( 'Uppercase', 'chromaticfw' ),
		'uppercase italic'         => __( 'Uppercase Italic', 'chromaticfw' ),
		'uppercase bold'           => __( 'Uppercase Bold', 'chromaticfw' ),
		'uppercase bold italic'    => __( 'Uppercase Bold Italic', 'chromaticfw' ),
		'uppercase lighter'        => __( 'Uppercase Light', 'chromaticfw' ),
		'uppercase lighter italic' => __( 'Uppercase Light Italic', 'chromaticfw' )
		);
	return apply_filters( 'chromaticfw_of_recognized_font_styles', $default );
}