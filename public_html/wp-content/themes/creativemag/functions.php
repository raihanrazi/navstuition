<?php
 
if ( ! isset( $content_width ) )
	$content_width = 640; 
 
$creativemag_options = array();
function creativemag_setup() { 
	global 	$creativemag_options;
	/**
	 * Custom template tags for this theme.
	 */
	require( get_template_directory() . '/inc/template-tags.php' );
	require( get_template_directory() . '/admin/functions.php' ); 
  
	load_theme_textdomain( 'creativeMag', get_template_directory() . '/languages' );
	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' ); 
	/**
	 * Enable support for Post Thumbnails on posts and pages
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'listing-thumb', 280, 160, true ); 
	global $wp_version;
	$args = array(
		'default-color' => 'ffffff',
		'default-image' => get_template_directory_uri() . '/images/bg-page.gif',
	);
	if ( version_compare( $wp_version, '3.4', '>=' ) ) :
		add_theme_support( 'custom-background',$args ); 
	else :
		add_custom_background( $args );
	endif;
	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
		register_nav_menus(
			array(
				'main_nav' => 'Top Main Navigation Menu',
				'drop_nav' => 'Top Drop Down Navigation Menu',
				'bottom_nav' => 'Bottom Navigation Menu'
			)
		);
	$creativemag_options = cwp();
 
	include_once(get_template_directory().'/widgets/newsletter.php');
	include_once(get_template_directory().'/widgets/social.php');
	include_once(get_template_directory().'/widgets/aboutme.php');
	include_once(get_template_directory().'/widgets/tabs-area.php');
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );
	
} 
add_action( 'after_setup_theme', 'creativemag_setup' );

add_action('admin_notices', 'creativemag_admin_notice');
 
function creativemag_admin_notice() { 
    global $current_user ; 
        $user_id = $current_user->ID; 
    if ( ! get_user_meta($user_id, 'creativemag_ignore_notice') ) { 
        echo '<div class="updated"><p>'; 
        printf(__('We just released a pro version. Make sure you <a href="https://themeisle.com/themes/creativemag-pro/?r=wporg"> check it out</a> !  | <a href="%1$s">Hide Notice</a>'), '?example_nag_ignore=0'); 
        echo "</p></div>"; 
    } 
} 
add_action('admin_init', 'creativemag_nag_ignore');

function creativemag_nag_ignore() {
 
    global $current_user;
 
        $user_id = $current_user->ID;
 
        if ( isset($_GET['creativemag_nag_ignore']) && '0' == $_GET['creativemag_nag_ignore'] ) {
 
             add_user_meta($user_id, 'creativemag_ignore_notice', 'true', true); 
    } 
}
   
function creativemag_widgets_init() {
	 
	register_sidebar(array(
		'name' => 'Right Sidebar',
		'id' => 'right-sidebar',
        'before_widget' => ' <aside  class="widget sidebar-box clear">',
        'after_widget' => '</aside>', 
        'before_title' => '<header class="widget-title-sidebar-wrap"><h1 class="widget-title-sidebar">',
        'after_title' => '</h1></header><div class="widget-content">',
    ));
}
add_action( 'widgets_init', 'creativemag_widgets_init' );
function creativemag_excerpt($count){
			global $post;
		  $permalink = get_permalink($post->ID);
		  $excerpt = get_the_content();
		  $excerpt = strip_tags($excerpt);
		  $excerpt = substr($excerpt, 0, $count);
		  $excerpt = strip_shortcodes($excerpt);
		  return $excerpt;
}
 
function creativemag_scripts() {
	wp_enqueue_style( 'CreativeMag-style', get_stylesheet_uri() );
 
	wp_enqueue_script( 'CreativeMag-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	
	wp_enqueue_script( 'CreativeMag-menu', get_template_directory_uri() . '/js/menu.js', array('jquery'), '20130115', true );
	wp_enqueue_script( 'CreativeMag-main-jquery', get_template_directory_uri() . '/js/jquery-main.js', array('jquery'), '20130115', true );
	
	wp_enqueue_script( 'CreativeMag-grid-list', get_template_directory_uri() . '/js/grid-list.js', array('jquery'), '20130115', true );
	wp_enqueue_script( 'CreativeMag-customscript', get_template_directory_uri() . '/js/custom-script.js', array('jquery'), '20130115', true );
	
	wp_enqueue_script( 'CreativeMag-viewmore', get_template_directory_uri() . '/js/viewmore.js', array('jquery'), '20130115', true );
	
	wp_enqueue_script( 'tinynav', get_template_directory_uri() . '/js/tinynav.min.js', array('jquery'), 'v1.1', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'CreativeMag-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
}
add_action( 'wp_enqueue_scripts', 'creativemag_scripts' );
function creativemag_add_editor_styles() {
    add_editor_style( 'editor-style.css' );
}
add_action( 'init', 'creativemag_add_editor_styles' );
add_filter("the_title",'creativemag_default_title');

function creativemag_default_title($title){
	if(empty($title))
		return 'No title';
	else 
		return $title;
}	
