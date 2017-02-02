<?php
/**
 * ChromaticFw theme development framework.
 *
 * @credit This framework is a derived and modified version of
 * * Hybrid Core Framework, Copyright 2008 - 2014, Justin Tadlock http://themehybrid.com/
 * * Options Framework, Copyright 2010 - 2014, WP Theming http://wptheming.com
 * Both Justin and Devin are WordPress rockstars!
 *
 * @package chromaticfw
 * @subpackage framework
 * @since chromaticfw 1.0.0
 */

/* Sets the framework version number. */
if ( ! defined( 'CHROMATICFW_VERSION' ) )
	define( 'CHROMATICFW_VERSION', '1.1' );

/**
 * The ChromaticFw class launches the framework.  It's the organizational structure and should be
 * loaded and initialized before anything else within the theme is called.  
 *
 * After calling the ChromaticFw class, parent themes should perform a theme setup function on the 
 * 'after_setup_theme' hook with a priority of 10.  Child themes can add theme setup function
 * with a priority of 11. This allows the class to load theme-supported features on the
 * 'after_setup_theme' hook with a priority of 12.
 * 
 * @since 1.0.0
 * @access public
 */
if ( !class_exists( 'ChromaticFw' ) ) {
	class ChromaticFw {

		/**
		 * Constructor method to controls the load order of the required files for running 
		 * the framework.
		 *
		 * @since 1.0.0
		 * @access public
		 * @return void
		 */
		function __construct() {

			/* Set up an empty class */
			global $chromaticfw;
			$chromaticfw = new stdClass;

			/* Define framework, parent theme, and child theme constants. */
			add_action( 'after_setup_theme', array( $this, 'constants' ), 1 );

			/* Load the core functions/classes required by the rest of the framework. */
			add_action( 'after_setup_theme', array( $this, 'core' ), 2 );

			/* Initialize the framework's default actions and filters. */
			add_action( 'after_setup_theme', array( $this, 'default_filters' ), 3 );

			/* Load the options framework. */
			add_action( 'after_setup_theme', array( $this, 'options' ), 4 );

			/* Handle theme supported features. */
			add_action( 'after_setup_theme', array( $this, 'theme_support' ), 12 );

			/* Load framework includes. */
			add_action( 'after_setup_theme', array( $this, 'includes' ), 13 );

			/* Load the framework extensions. */
			add_action( 'after_setup_theme', array( $this, 'extensions' ), 14 );

			/* Language functions and translations setup. */
			add_action( 'after_setup_theme', array( $this, 'i18n' ), 25 );

			/* Load admin files. */
			add_action( 'wp_loaded', array( $this, 'admin' ) );
		}

		/**
		 * Defines the constant paths for use within the core framework, parent theme, and child theme.  
		 * Constants prefixed with 'CHROMATICFW' are for use only within the core framework and don't 
		 * reference other areas of the parent or child theme.
		 *
		 * @since 1.0.0
		 * @access public
		 * @return void
		 */
		function constants() {

			/* Sets the path to the parent theme directory. */
			define( 'THEME_DIR', get_template_directory() );

			/* Sets the path to the parent theme directory URI. */
			define( 'THEME_URI', get_template_directory_uri() );

			/* Sets the path to the child theme directory. */
			define( 'CHILD_THEME_DIR', get_stylesheet_directory() );

			/* Sets the path to the child theme directory URI. */
			define( 'CHILD_THEME_URI', get_stylesheet_directory_uri() );

			/* Sets the path to the core framework directory. */
			define( 'CHROMATICFW_THEMEDIR', trailingslashit( THEME_DIR ) . 'hoot-theme' );

			/* Sets the path to the core framework directory URI. */
			define( 'CHROMATICFW_THEMEURI', trailingslashit( THEME_URI ) . 'hoot-theme' );

			/* Sets the path to the core framework directory. */
			define( 'CHROMATICFW_DIR', trailingslashit( THEME_DIR ) . 'hoot' );

			/* Sets the path to the core framework directory URI. */
			define( 'CHROMATICFW_URI', trailingslashit( THEME_URI ) . 'hoot' );

			/* Sets the path to the ChromaticFw Options framework directory. */
			define( 'CHROMATICFWOPTIONS_DIR', trailingslashit( CHROMATICFW_DIR ) . 'options' );

			/* Sets the path to the ChromaticFw Options framework directory URI. */
			define( 'CHROMATICFWOPTIONS_URI', trailingslashit( CHROMATICFW_URI ) . 'options' );

			// Set Additional Paths

			/* Sets the path to the core framework admin directory. */
			define( 'CHROMATICFW_ADMIN', trailingslashit( CHROMATICFW_DIR ) . 'admin' );

			/* Sets the path to the core framework classes directory. */
			define( 'CHROMATICFW_CLASSES', trailingslashit( CHROMATICFW_DIR ) . 'classes' );

			/* Sets the path to the core framework extensions directory. */
			define( 'CHROMATICFW_EXTENSIONS', trailingslashit( CHROMATICFW_DIR ) . 'extensions' );

			/* Sets the path to the core framework functions directory. */
			define( 'CHROMATICFW_FUNCTIONS', trailingslashit( CHROMATICFW_DIR ) . 'functions' );

			/* Sets the path to the core framework languages directory. */
			define( 'CHROMATICFW_LANGUAGES', trailingslashit( CHROMATICFW_DIR ) . 'languages' );

			// Set URI Locations

			/* Sets the path to the core framework CSS directory URI. */
			define( 'CHROMATICFW_CSS', trailingslashit( CHROMATICFW_URI ) . 'css' );

			/* Sets the path to the core framework images directory URI. */
			define( 'CHROMATICFW_IMAGES', trailingslashit( CHROMATICFW_URI ) . 'images' );

			/* Sets the path to the core framework JavaScript directory URI. */
			define( 'CHROMATICFW_JS', trailingslashit( CHROMATICFW_URI ) . 'js' );

			// Set Helper Constants

			/* Sets the default count of items (pages/posts) to show in a list option (query number). */
			define( 'CHROMATICFW_ADMIN_LIST_ITEM_COUNT', 75 );

			// Set theme details
			global $chromaticfw_theme;
			$chromaticfw_theme->theme = wp_get_theme();
			define( 'THEME_NAME', $chromaticfw_theme->theme->get( 'Name' ) );
			$theme_slug = strtolower( preg_replace( '/[^a-zA-Z0-9]+/', '_', trim( THEME_NAME ) ) );
			define( 'THEME_SLUG', preg_replace( '/_?premium$/', '', $theme_slug ) );
			define( 'THEME_VERSION', $chromaticfw_theme->theme->get( 'Version' ) );
			define( 'THEME_AUTHOR_URI', $chromaticfw_theme->theme->get( 'AuthorURI' ) );

		}

		/**
		 * Loads the core framework files. These files are needed before loading anything else in the 
		 * framework because they have required functions for use. Many of the files run filters that 
		 * may be removed in theme setup functions.
		 *
		 * @since 1.0.0
		 * @access public
		 * @return void
		 */
		function core() {

			/* Load the core framework functions. */
			require_once( trailingslashit( CHROMATICFW_FUNCTIONS ) . 'core.php' );

			/* Load the context-based functions. */
			require_once( trailingslashit( CHROMATICFW_FUNCTIONS ) . 'context.php' );

			/* Load the core framework internationalization functions. */
			require_once( trailingslashit( CHROMATICFW_FUNCTIONS ) . 'i18n.php' );

			/* Load the framework filters. */
			require_once( trailingslashit( CHROMATICFW_FUNCTIONS ) . 'filters.php' );

			/* Load the <head> functions. */
			require_once( trailingslashit( CHROMATICFW_FUNCTIONS ) . 'head.php' );

			/* Load media-related functions. */
			require_once( trailingslashit( CHROMATICFW_FUNCTIONS ) . 'media.php' );

			/* Load the sidebar functions. */
			require_once( trailingslashit( CHROMATICFW_FUNCTIONS ) . 'sidebars.php' );

			/* Load the scripts functions. */
			require_once( trailingslashit( CHROMATICFW_FUNCTIONS ) . 'scripts.php' );

			/* Load the styles functions. */
			require_once( trailingslashit( CHROMATICFW_FUNCTIONS ) . 'styles.php' );

			/* Load the utility functions. */
			require_once( trailingslashit( CHROMATICFW_FUNCTIONS ) . 'utility.php' );

			/* Load the color manipulation functions. */
			require_once( trailingslashit( CHROMATICFW_FUNCTIONS ) . 'color.php' );
		}

		/**
		 * Adds the default framework actions and filters.
		 *
		 * @since 1.0.0
		 * @access public
		 * @return void
		 */
		function default_filters() {
			global $wp_embed;

			/* Remove bbPress theme compatibility if current theme supports bbPress. */
			if ( current_theme_supports( 'bbpress' ) )
				remove_action( 'bbp_init', 'bbp_setup_theme_compat', 8 );

			/* Move the WordPress generator to a better priority. */
			remove_action( 'wp_head', 'wp_generator' );
			add_action( 'wp_head', 'wp_generator', 1 );

			/* Make text widgets shortcode aware. */
			add_filter( 'widget_text', 'do_shortcode' );

			/* Don't strip tags on single post titles. */
			remove_filter( 'single_post_title', 'strip_tags' );

			/* Use same default filters as 'the_content' with a little more flexibility. */
			add_filter( 'chromaticfw_loop_description', array( $wp_embed, 'run_shortcode' ),   5 );
			add_filter( 'chromaticfw_loop_description', array( $wp_embed, 'autoembed'     ),   5 );
			add_filter( 'chromaticfw_loop_description',                   'wptexturize',       10 );
			add_filter( 'chromaticfw_loop_description',                   'convert_smilies',   15 );
			add_filter( 'chromaticfw_loop_description',                   'convert_chars',     20 );
			add_filter( 'chromaticfw_loop_description',                   'wpautop',           25 );
			add_filter( 'chromaticfw_loop_description',                   'do_shortcode',      30 );
			add_filter( 'chromaticfw_loop_description',                   'shortcode_unautop', 35 );

			/* Filters for the audio transcript. */
			add_filter( 'chromaticfw_audio_transcript', 'wptexturize',   10 );
			add_filter( 'chromaticfw_audio_transcript', 'convert_chars', 20 );
			add_filter( 'chromaticfw_audio_transcript', 'wpautop',       25 );
		}

		/**
		 * Removes theme supported features from themes in the case that a user has a plugin installed
		 * that handles the functionality.
		 *
		 * @since 1.0.0
		 * @access public
		 * @return void
		 */
		function theme_support() {

			/* Adds core WordPress HTML5 support. */
			add_theme_support( 'html5', array( 'caption', 'comment-form', 'comment-list', 'gallery', 'search-form' ) );

			/* Remove support for the the Cleaner Gallery extension if the plugin is installed. */
			if ( function_exists( 'chromaticfw_cleaner_gallery' ) || class_exists( 'ChromaticFw_Cleaner_Gallery' ) )
				remove_theme_support( 'cleaner-gallery' );

		}

		/**
		 * Loads the framework files supported by themes and template-related functions/classes.  Functionality 
		 * in these files should not be expected within the theme setup function.
		 *
		 * @since 1.0.0
		 * @access public
		 * @return void
		 */
		function includes() {

			/* Load the HTML attributes functions. */
			require_once( trailingslashit( CHROMATICFW_FUNCTIONS ) . 'attr.php' );

			/* Load the CSS style builder functions. */
			require_once( trailingslashit( CHROMATICFW_FUNCTIONS ) . 'css-styles.php' );

			/* Load the template functions. */
			require_once( trailingslashit( CHROMATICFW_FUNCTIONS ) . 'template.php' );

			/* Load the comments functions. */
			require_once( trailingslashit( CHROMATICFW_FUNCTIONS ) . 'template-comments.php' );

			/* Load the general template functions. */
			require_once( trailingslashit( CHROMATICFW_FUNCTIONS ) . 'template-general.php' );

			/* Load the media template functions. */
			require_once( trailingslashit( CHROMATICFW_FUNCTIONS ) . 'template-media.php' );

			/* Load the post template functions. */
			require_once( trailingslashit( CHROMATICFW_FUNCTIONS ) . 'template-post.php' );

			/* Load the media meta class. */
			require_once( trailingslashit( CHROMATICFW_CLASSES ) . 'chromaticfw-media-meta.php' );

			/* Load the media grabber class. */
			require_once( trailingslashit( CHROMATICFW_CLASSES ) . 'chromaticfw-media-grabber.php' );

		}

		/**
		 * Load extensions (external projects).  Extensions are projects that are included within the 
		 * framework but are not a part of it.  They are external projects developed outside of the 
		 * framework.  Themes must use add_theme_support( $extension ) to use a specific extension 
		 * within the theme.  This should be declared on 'after_setup_theme' no later than a priority of 11.
		 *
		 * @since 1.0.0
		 * @access public
		 * @return void
		 */
		function extensions() {

			/* Load the Cleaner Gallery extension if supported. */
			require_if_theme_supports( 'cleaner-gallery', trailingslashit( CHROMATICFW_EXTENSIONS ) . 'cleaner-gallery.php' );

			/* Load the Cleaner Caption extension if supported. */
			require_if_theme_supports( 'cleaner-caption', trailingslashit( CHROMATICFW_EXTENSIONS ) . 'cleaner-caption.php' );

			/* Load the Loop Pagination extension if supported. */
			require_if_theme_supports( 'loop-pagination', trailingslashit( CHROMATICFW_EXTENSIONS ) . 'loop-pagination.php' );

			/* Load the Widgets extension if supported. */
			require_if_theme_supports( 'chromaticfw-core-widgets', trailingslashit( CHROMATICFW_EXTENSIONS ) . 'widgets.php' );

		}

		/**
		 * Load ChromaticFw Options framework.
		 *
		 * @since 1.0.0
		 * @access public
		 * @return void
		 */
		function options() {

			/* Load the ChromaticFw Options framework */
			require_once( trailingslashit( CHROMATICFWOPTIONS_DIR ) . 'chromaticfw-options.php' );

		}

		/**
		 * Loads both the parent and child theme translation files.  If a locale-based functions file exists
		 * in either the parent or child theme (child overrides parent), it will also be loaded.  All translation 
		 * and locale functions files are expected to be within the theme's '/languages' folder, but the 
		 * framework will fall back on the theme root folder if necessary.  Translation files are expected 
		 * to be prefixed with the template or stylesheet path (example: 'templatename-en_US.mo').
		 *
		 * @since 1.0.0
		 * @access public
		 * @return void
		 */
		function i18n() {
			global $chromaticfw;

			/* Get parent and child theme textdomains. */
			$parent_textdomain = chromaticfw_get_parent_textdomain();
			$child_textdomain  = chromaticfw_get_child_textdomain();

			/* Load theme textdomain. */
			$chromaticfw->textdomain_loaded[ $parent_textdomain ] = load_theme_textdomain( $parent_textdomain );

			/* Load child theme textdomain. */
			$chromaticfw->textdomain_loaded[ $child_textdomain ] = is_child_theme() ? load_child_theme_textdomain( $child_textdomain ) : false;

			/* Load the framework textdomain. */
			// @disabled: WordPress standards allow only 1 text domain (theme slug), so we will stick to that.
			// $chromaticfw->textdomain_loaded['chromaticfw'] = chromaticfw_load_framework_textdomain( 'chromaticfw' );
			// $chromaticfw->textdomain_loaded['chromaticfw'] = chromaticfw_load_framework_textdomain( 'chromaticfw' );

			/* Get the user's locale. */
			$locale = get_locale();

			/* Locate a locale-specific functions file. */
			$locale_functions = locate_template( array( "languages/{$locale}.php", "{$locale}.php" ) );

			/* If the locale file exists and is readable, load it. */
			if ( !empty( $locale_functions ) && is_readable( $locale_functions ) )
				require_once( $locale_functions );
		}

		/**
		 * Load admin files for the framework.
		 *
		 * @since 1.0.0
		 * @access public
		 * @return void
		 */
		function admin() {

			/* Check if in the WordPress admin. */
			if ( is_admin() ) {

				/* Load the main admin file. */
				require_once( trailingslashit( CHROMATICFW_ADMIN ) . 'admin.php' );

			}
		}

	} // end class
} // end if
