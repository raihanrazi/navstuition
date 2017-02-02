<?php
/**
 * Main ChromaticFw Options framework class
 *
 * @package chromaticfw
 * @subpackage options-framework
 * @since chromaticfw 1.0.0
 */

class ChromaticFw_Options {

	/**
	 * Plugin version, used for cache-busting of style and script file references.
	 *
	 * @since 1.0.0
	 * @type string
	 */
	const VERSION = CHROMATICFW_VERSION;

	/**
	 * Gets option name
	 *
	 * @since 1.0.0
	 */
	static function _get_option_name() {
		return chromaticoptions_option_name();
	}

	/**
	 * Wrapper for chromaticfw_get_theme_options_array()
	 *
	 * @return array
	 */
	static function _chromaticoptions_options() {
		return chromaticfw_get_theme_options_array();
	}

}