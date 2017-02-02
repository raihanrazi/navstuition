<?php
/**
 * Add custom css to frontend.
 *
 * @package chromaticfw
 * @subpackage chromatic
 * @since chromatic 1.0
 */

// Hook into 'wp_enqueue_scripts' as 'wp_add_inline_style()' requires stylesheet $handle to be already registered.
// Main stylesheet with handle 'style' is registered by the framework via 'wp_enqueue_scripts' hook at priority 0
add_action( 'wp_enqueue_scripts', 'chromaticfw_custom_css', 99 );

/**
 * Custom CSS built from user theme options
 * For proper sanitization, always use functions from hoot/functions/css-styles.php
 *
 * @since 1.0
 * @access public
 */
function chromaticfw_custom_css() {
	$css = '';
	$accent_color = chromaticfw_get_option( 'accent_color' );
	$accent_color_dark = chromaticfw_color_increase( $accent_color, 20, 20 );
	$accent_font = chromaticfw_get_option( 'accent_font' );

	$cssrules = array();

	// ChromaticFw Grid
	$cssrules['.grid'] = chromaticfw_css_grid_width();

	// Base Typography and HTML
	$cssrules['a'] = chromaticfw_css_rule( 'color', $accent_color ); // Overridden by chromaticfw_premium_custom_cssrules()
	$cssrules['.invert-typo'] = array(
		chromaticfw_css_rule( 'background', $accent_color ),
		chromaticfw_css_rule( 'color', $accent_font ),
		);
	$cssrules['.invert-typo a, .invert-typo a:hover, .invert-typo h1, .invert-typo h2, .invert-typo h3, .invert-typo h4, .invert-typo h5, .invert-typo h6, .invert-typo .title'] = chromaticfw_css_rule( 'color', $accent_font );
	$cssrules['input[type="submit"], #submit, .button'] = array(
		chromaticfw_css_rule( 'background', $accent_color ),
		chromaticfw_css_rule( 'color', $accent_font ),
		);
	$cssrules['input[type="submit"]:hover, #submit:hover, .button:hover'] = array(
		chromaticfw_css_rule( 'background', $accent_color_dark ),
		chromaticfw_css_rule( 'color', $accent_font ),
		);
	$cssrules['#submit a, .button a'] = chromaticfw_css_rule( 'color', $accent_font );

	// Layout
	$content_bg = chromaticfw_get_option( 'background' );
	$cssrules['body'][] = chromaticfw_css_background( $content_bg );
	if ( chromaticfw_get_option( 'site_layout' ) == 'boxed' ) {
		$content_bg = chromaticfw_get_option( 'box_background' );
		$cssrules['#page-wrapper'] = chromaticfw_css_background( $content_bg );
	}

	// Header
	$cssrules['#site-title, #site-title a'] = chromaticfw_css_rule( 'color', $accent_color ); // Overridden by chromaticfw_premium_custom_cssrules()

	// Shortcodes
	$cssrules['#page-wrapper ul.shortcode-tabset-nav li.current'] = chromaticfw_css_rule( 'border-bottom-color', $content_bg['color'] );

	// Sidebars and Widgets
	$cssrules['.content-block-icon'] = array(
		chromaticfw_css_rule( 'color', $accent_color ),
		chromaticfw_css_rule( 'background', $accent_font ),
		chromaticfw_css_rule( 'border-color', $accent_color ),
		);
	$cssrules['.content-block-icon.icon-style-square'] = array(
		chromaticfw_css_rule( 'color', $accent_font ),
		chromaticfw_css_rule( 'background', $accent_color ),
		);
	$cssrules['.content-blocks-widget .content-block:hover .content-block-icon.icon-style-circle'] = array(
		chromaticfw_css_rule( 'color', $accent_font ),
		chromaticfw_css_rule( 'background', $accent_color ),
		);
	$cssrules['.content-blocks-widget .content-block:hover .content-block-icon.icon-style-square'] = array(
		chromaticfw_css_rule( 'color', $accent_color ),
		chromaticfw_css_rule( 'background', $accent_font ),
		);

	// Light Slider
	$cssrules['.lSSlideOuter .lSPager.lSpg > li:hover a, .lSSlideOuter .lSPager.lSpg > li.active a'] = chromaticfw_css_rule( 'background-color', $accent_color );

	// Allow CSS to be modified
	$cssrules = apply_filters( 'chromaticfw_dynamic_cssrules', $cssrules );


	/** Print CSS Rules **/

	foreach ( $cssrules as $selector => $rules ) {
		if ( !empty( $selector ) ) {
			$css .= $selector . ' {';
			if ( is_array( $rules ) ) {
				foreach ( $rules as $rule ) {
					$css .= $rule . ' ';
				}
			} else {
				$css .= $rules;
			}
			$css .= ' }' . "\n";
		}
	}

	//@todo add media queries to preceding code
	if ( chromaticfw_get_option( 'site_layout' ) == 'boxed' )
		$box_bg = chromaticfw_get_option( 'box_background' );
	else
		$box_bg = chromaticfw_get_option( 'background' );
	if ( isset( $box_bg['color'] ) && !empty( $box_bg['color'] ) )
		$css .= '@media only screen and (min-width: 768px) { .sticky-wrapper #header.stuck{ background-color: '.$box_bg['color'].'; } }' . "\n";

	// Allow CSS to be modified
	$cssrules = apply_filters( 'chromaticfw_dynamic_css', $css );

	$custom_css = chromaticfw_get_option( 'custom_css', '' );
	if ( !empty( $custom_css ) ) {
		$css .= $custom_css . "\n";
	}

	if ( !empty( $css ) ) {
		wp_add_inline_style( 'style', $css );
	}

}