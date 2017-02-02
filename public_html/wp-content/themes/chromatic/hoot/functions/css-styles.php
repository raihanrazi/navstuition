<?php
/**
 * Functions for building CSS styles to be printed.
 *
 * @package chromaticfw
 * @subpackage framework
 * @since chromaticfw 1.0.0
 */

/**
 * Create general CSS style
 *
 * @since 1.0.0
 * @access public
 * @param string $style name of the css property
 * @param string $value value of the css property
 * @param bool $echo
 * @return void|string
 */
function chromaticfw_css_rule( $style, $value, $echo = false ) {
	if ( empty( $style ) || empty( $value ) )
		return '';
	$output = " $style: $value; ";
	if ( true === $echo || 'true' === $echo )
		echo $output;
	else
		return $output;
}

/**
 * Create CSS styles from a background array.
 *
 * @since 1.0.0
 * @access public
 * @param array $background
 * @return string
 */
function chromaticfw_css_background( $background ) {
	$background_defaults = array(
		'color' => '',
		'type' => 'predefined',
		'pattern' => 0,
		'image' => '',
		'repeat' => '',
		'position' => '',
		'attachment' => '',
	);
	$background = wp_parse_args( $background, $background_defaults );
	extract( $background, EXTR_SKIP );

	$output = '';

	if ( !empty( $color ) ) {
		$color = chromaticfw_color_santize_hex( $color );
		if ( $color )
			$output .= chromaticfw_css_rule( 'background-color', $color );
	}

	if ( 'predefined' == $type ) {
		if ( !empty( $pattern ) ) { // skip if pattern = 0 (i.e. user has selected 'No Pattern')
			$background_image = 'url("' . trailingslashit( CHROMATICFW_IMAGES ) . 'patterns/' . $pattern . '")';
			$output .= chromaticfw_css_rule( 'background-image', $background_image );
			$output .= chromaticfw_css_rule( 'background-repeat', 'repeat' );
		}
	}

	if ( 'custom' == $type ) {
		if ( !empty( $image ) ) {
			$background_image = 'url("' . esc_url( $image ) . '")';
			$output .= chromaticfw_css_rule( 'background-image', $background_image );
			if ( !empty( $repeat ) ) {
				$output .= chromaticfw_css_rule( 'background-repeat', $repeat );
			}
			if ( !empty( $position ) ) {
				$output .= chromaticfw_css_rule( 'background-position', $position );
			}
			if ( !empty( $attachment ) ) {
				$output .= chromaticfw_css_rule( 'background-attachment', $attachment );
			}
		}
	}

	return $output;
}

/**
 * Create CSS styles from a typography array.
 *
 * @since 1.1.1
 * @access public
 * @param array $typography
 * @param bool $reset Reset earlier css rules from stylesheets etc.
 * @return string
 */
function chromaticfw_css_typography( $typography, $reset = false ) {
	$typography_defaults = array(
		'size' => '',
		'face' => '',
		'style' => '',
		'color' => '',
	);
	$typography = wp_parse_args( $typography, $typography_defaults );
	extract( $typography, EXTR_SKIP );

	$output = '';

	if ( !empty( $color ) ) {
		$color = chromaticfw_color_santize_hex( $color );
		if ( $color )
			$output .= chromaticfw_css_rule( 'color', $color );
	}

	if ( !empty( $size ) ) {
		$output .= chromaticfw_css_rule( 'font-size', $size );
	}

	if ( !empty( $face ) ) {
		$output .= chromaticfw_css_rule( 'font-family', $face );
	}

	if ( !empty( $style ) ) {
		switch ( $style ) {
			case 'italic':
				$output .= chromaticfw_css_rule( 'font-style', 'italic' );
				if ( $reset ) $output .= chromaticfw_css_rule( 'text-transform', 'none' );
				if ( $reset ) $output .= chromaticfw_css_rule( 'font-weight', 'normal' );
				break;
			case 'bold':
				$output .= chromaticfw_css_rule( 'font-weight', 'bold' );
				if ( $reset ) $output .= chromaticfw_css_rule( 'text-transform', 'none' );
				if ( $reset ) $output .= chromaticfw_css_rule( 'font-style', 'normal' );
				break;
			case 'bold italic':
				$output .= chromaticfw_css_rule( 'font-weight', 'bold' );
				$output .= chromaticfw_css_rule( 'font-style', 'italic' );
				if ( $reset ) $output .= chromaticfw_css_rule( 'text-transform', 'none' );
				break;
			case 'lighter':
				$output .= chromaticfw_css_rule( 'font-weight', 'lighter' );
				if ( $reset ) $output .= chromaticfw_css_rule( 'text-transform', 'none' );
				if ( $reset ) $output .= chromaticfw_css_rule( 'font-style', 'normal' );
				break;
			case 'lighter italic':
				$output .= chromaticfw_css_rule( 'font-weight', 'lighter' );
				$output .= chromaticfw_css_rule( 'font-style', 'italic' );
				if ( $reset ) $output .= chromaticfw_css_rule( 'text-transform', 'none' );
				break;
			case 'uppercase':
				$output .= chromaticfw_css_rule( 'text-transform', 'uppercase' );
				if ( $reset ) $output .= chromaticfw_css_rule( 'font-weight', 'normal' );
				if ( $reset ) $output .= chromaticfw_css_rule( 'font-style', 'normal' );
				break;
			case 'uppercase italic':
				$output .= chromaticfw_css_rule( 'text-transform', 'uppercase' );
				$output .= chromaticfw_css_rule( 'font-style', 'italic' );
				if ( $reset ) $output .= chromaticfw_css_rule( 'font-weight', 'normal' );
				break;
			case 'uppercase bold':
				$output .= chromaticfw_css_rule( 'text-transform', 'uppercase' );
				$output .= chromaticfw_css_rule( 'font-weight', 'bold' );
				if ( $reset ) $output .= chromaticfw_css_rule( 'font-style', 'normal' );
				break;
			case 'uppercase bold italic':
				$output .= chromaticfw_css_rule( 'text-transform', 'uppercase' );
				$output .= chromaticfw_css_rule( 'font-weight', 'bold' );
				$output .= chromaticfw_css_rule( 'font-style', 'italic' );
				break;
			case 'uppercase lighter':
				$output .= chromaticfw_css_rule( 'text-transform', 'uppercase' );
				$output .= chromaticfw_css_rule( 'font-weight', 'lighter' );
				if ( $reset ) $output .= chromaticfw_css_rule( 'font-style', 'normal' );
				break;
			case 'uppercase lighter italic':
				$output .= chromaticfw_css_rule( 'text-transform', 'uppercase' );
				$output .= chromaticfw_css_rule( 'font-weight', 'lighter' );
				$output .= chromaticfw_css_rule( 'font-style', 'italic' );
				break;
			case 'none': default:
				if ( $reset ) $output .= chromaticfw_css_rule( 'text-transform', 'none' );
				if ( $reset ) $output .= chromaticfw_css_rule( 'font-weight', 'normal' );
				if ( $reset ) $output .= chromaticfw_css_rule( 'font-style', 'normal' );
				break;
		}
	}

	return $output;
}

/**
 * Create CSS style from grid width.
 *
 * @since 1.0.0
 * @access public
 * @return string
 */
function chromaticfw_css_grid_width() {
	$output = '';

	$width = intval( chromaticfw_get_option( 'site_width' ) );
	$width = !empty( $width ) ? $width : 1260;

	$output .= chromaticfw_css_rule( 'max-width', $width . 'px' );

	return $output;
}