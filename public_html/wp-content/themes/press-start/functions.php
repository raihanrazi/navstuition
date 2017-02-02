<?php
/**
 * Genbu Theme Functions
** ---------------------------- */

/* Load text string used in theme */
require_once( trailingslashit( get_template_directory() ) . 'includes/string.php' );

/* Load base theme functionality. */
require_once( trailingslashit( get_template_directory() ) . 'includes/tamatebako.php' );

/* Load theme general setup */
add_action( 'after_setup_theme', 'press_start_setup' );

/**
 * General Setup
 * @since 0.1.0
 */
function press_start_setup(){

	/* === DEBUG === */
	$debug_args = array(
		'mobile'         => 1,
		'no-js'          => 0,
		'media-queries'  => 0,
	);
	//add_theme_support( 'tamatebako-debug', $debug_args );

	/* === Theme Layouts === */
	$layouts = array(
		/* Two Columns */
		'content-sidebar1' => 'Content / Sidebar 1',
		'sidebar1-content' => 'Sidebar 1 / Content',
	);
	$layouts_args = array(
		'default'   => 'content-sidebar1',
		'customize' => true,
		'post_meta' => true,
	);
	add_theme_support( 'theme-layouts', $layouts, $layouts_args );

	/* === Register Sidebars === */
	$sidebars_args = array(
		"primary" => array( "name" => press_start_string( 'sidebar-primary-name' ), "description" => "" ),
	);
	add_theme_support( 'tamatebako-sidebars', $sidebars_args );

	/* === Register Menus === */
	$menus_args = array(
		"primary" => press_start_string( 'menu-primary-name' ),
	);
	add_theme_support( 'tamatebako-menus', $menus_args );

	/* === Load Stylesheet === */
	$style_args = array(
		'theme-open-sans-font',
		'dashicons',
		'theme-reset',
		'parent',
		'style',
		'media-queries'
	);
	add_theme_support( 'hybrid-core-styles', $style_args );

	/* === Editor Style === */
	$editor_css = array(
		'css/reset.min.css',
		'style.css',
		tamatebako_google_open_sans_font_url()
	);
	add_editor_style( $editor_css );

	/* === Customizer Mobile View === */
	add_theme_support( 'tamatebako-customize-mobile-view' );

	/* === Custom Background === */
	add_theme_support( 'custom-background', array( 'default-color' => 'ffffff' ) );

	/* === Set Content Width === */
	hybrid_set_content_width( 900 );
}


do_action( 'press_start_after_setup_theme' );