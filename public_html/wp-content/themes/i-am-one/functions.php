<?php
/**
 * SKT I Am One functions and definitions
 *
 * @package SKT I Am One
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */

if ( ! function_exists( 'skt_iamone_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function skt_iamone_setup() {
	global $content_width;
	if ( ! isset( $content_width ) )
		$content_width = 640; /* pixels */
	
	load_theme_textdomain( 'skt-iamone', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'woocommerce' );
	add_image_size('homepage-thumb',240,145,true);
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'skt-iamone' ),
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => '000000'
	) );
	add_editor_style( 'editor-style.css' );
}
endif; // skt_iamone_setup
add_action( 'after_setup_theme', 'skt_iamone_setup' );


function skt_iamone_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'skt-iamone' ),
		'description'   => __( 'Appears on blog page sidebar', 'skt-iamone' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

}
add_action( 'widgets_init', 'skt_iamone_widgets_init' );

define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
require_once dirname( __FILE__ ) . '/inc/options-framework.php';

// Loads options.php from child or parent theme
$optionsfile = locate_template( 'options.php' );
load_template( $optionsfile );

function skt_iamone_font_url(){
		$font_url = '';
		
	/* Translators: If there are characters in your language that are not
    * supported by Open Sans, translate this to 'off'. Do not translate
    * into your own language.
    */
	$open_sans = _x('on', 'Open Sans font:on or off', 'skt-iamone');
	
	/* Translators: If there has characters in your language that are not
	* supported by Roboto, translate this to 'off'. Do not translate
	* into your own language.
	*/
	$roboto = _x('on', 'Roboto font:on or off', 'skt-iamone');
	
	/* Translators: If there has characters in your language that are
	* not supported by Lobster, translate this to 'off'. Do not translate
	* into your own language.
	*/
	$lobster = _x('on', 'Lobster font:on or off', 'skt-iamone');
	
	/* Translators: If there has characters in your language that are not
	* supported by Open Sans Condensed, translate this to 'off'. Do not translate
	* into your own language.
	*/
	$open_sans_condensed = _x('on', 'Open Sans Condensed font: on or off', 'skt-iamone');
	
	/* Translators: If there has characters in your language that are not
	* suported by Lato, translate this to 'off'. Do not translate
	* into your own language.
	*/
	$lato = _x('on', 'Lato font: on or off', 'skt-iamone');
	
	if('off' !== $lobster){
		$font_families = array();
		
		if('off' !== $open_sans){
			$font_families[] = 'Open sans:400,600,700';
		}
		if('off' !== $roboto){
			$font_families[] = 'Roboto:400,100,300,500,700';
		}
		if('off' !== $lobster){
			$font_families[] = 'Lobster';
		}
		if('off' !== $open_sans_condensed){
			$font_families[] = 'Open Sans Condensed:300';
		}
		if('off' !== $lato){
			$font_families[] = 'Lato:300,300italic,400,400italic,700,700italic,900';
		}
		
		$query_args = array(
			'family'	=> urlencode(implode('|',$font_families)),
		);
		
		$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
	}
		return $font_url;
	
	}


function skt_iamone_scripts() {
	wp_enqueue_style( 'skt-iamone-font', skt_iamone_font_url(), array() );
	
	wp_enqueue_style( 'skt_iamone-basic-style', get_stylesheet_uri() );
	wp_enqueue_style( 'skt_iamone-editor-style', get_template_directory_uri().'/editor-style.css' );
	wp_enqueue_style( 'skt_iamone-base-style', get_template_directory_uri().'/css/style_base.css' );
	if ( is_front_page() || get_option('page_for_posts') && get_option('page_on_front') && of_get_option('innerpageslider',true) != 'hide' ) { 
		wp_enqueue_style( 'skt_iamone-supersized-default-theme', get_template_directory_uri().'/css/supersized.css' );
		wp_enqueue_style( 'skt_iamone-supersized-style', get_template_directory_uri().'/css/supersized.shutter.css' );
		wp_enqueue_script( 'skt_iamone-supersized-easing', get_template_directory_uri() . '/js/jquery.easing.min.js', array('jquery') );
		wp_enqueue_script( 'skt_iamone-supersized-slider', get_template_directory_uri() . '/js/supersized.3.2.7.min.js', array('jquery') );
		wp_enqueue_script( 'skt_iamone-supersized-shutter', get_template_directory_uri() . '/js/supersized.shutter.js', array('jquery') );
	}
	wp_enqueue_style( 'skt_iamone-prettyphoto-style', get_template_directory_uri().'/css/prettyPhoto.css' );
	wp_enqueue_script( 'skt_iamone-prettyphoto-script', get_template_directory_uri() . '/js/jquery.prettyPhoto.js', array('jquery') );
	wp_enqueue_script( 'skt_iamone-customscripts', get_template_directory_uri() . '/js/custom.js', array('jquery') );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'skt_iamone_scripts' );

function skt_iamone_media_css_hook(){
	wp_enqueue_style('skt-iamone-computer-style', get_template_directory_uri().'/css/computer.css','','','screen and (min-width:940px)');
	wp_enqueue_style('skt-iamone-tab-style', get_template_directory_uri().'/css/tablet.css','','','screen and (min-width: 720px) and (max-width:939px)');
	wp_enqueue_style('skt-iamone-mobhor-style', get_template_directory_uri().'/css/mobile_hz.css','','','screen and (min-width: 480px) and (max-width:719px)');
	wp_enqueue_style('skt-iamone-mobile-style', get_template_directory_uri().'/css/mobile.css','','','screen and (max-width: 479px)');
	

	if ( (of_get_option('innerpageslider', true) != 'hide') || is_home() || is_front_page() ) {

		$slAr = array();
		for ($i=1; $i<6; $i++) {
			if ( of_get_option('slide'.$i, true) != "" ) {
				$imgUrl 	= of_get_option('slide'.$i, true);
				$imgTitle	= of_get_option('slidetitle'.$i, true);
				if ( strlen($imgUrl) > 3 ) $slAr[$i] = of_get_option('slide'.$i, true);
			}
		}
		?>
		<script>
		jQuery(document).ready(function(){ 
			jQuery.supersized({
				// Functionality
				slideshow               :   1,			// Slideshow on/off
				autoplay				:	1,			// Determines whether slideshow begins playing when page is loaded. 
				start_slide             :   1,			// Start slide (0 is random)
				stop_loop				:	0,			// Pauses slideshow on last slide
				random					: 	0,			// Randomize slide order (Ignores start slide)
				slide_interval          :   5000,		// Length between transitions
				transition              :   1, 			// 0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
				transition_speed		:	1000,		// Speed of transition
				new_window				:	1,			// Image links open in new window/tab
				pause_hover             :   0,			// Pause slideshow on hover
				keyboard_nav            :   1,			// Keyboard navigation on/off
				performance				:	1,			// 0-Normal, 1-Hybrid speed/quality, 2-Optimizes image quality, 3-Optimizes transition speed // (Only works for Firefox/IE, not Webkit)
				image_protect			:	0,			// Disables image dragging and right click with Javascript
				
				// Size & Position
				min_width		        :   0,			// Min width allowed (in pixels)
				min_height		        :   0,			// Min height allowed (in pixels)
				vertical_center         :   1,			// Vertically center background
				horizontal_center       :   1,			// Horizontally center background
				fit_always				:	0,			// Image will never exceed browser width or height (Ignores min. dimensions)
				fit_portrait         	:   1,			// Portrait images will not exceed browser height
				fit_landscape			:   0,			// Landscape images will not exceed browser width
				
				// Components 				
				slide_links				:	'blank',	// Individual links for each slide (Options: false, 'num', 'name', 'blank')
				thumb_links				:	1,			// Individual thumb links for each slide
				thumbnail_navigation    :   0,			// Thumbnail navigation
				slides 					:  	[			// Slideshow Images
												<?php
												$n = 0;
												foreach( $slAr as  $sv ){
													$n++;
													echo "{image : '".$sv."', title : '', thumb : '".esc_attr($sv)."', url : ''}".( (count($slAr) == $n) ? '' : ',' )."\n";
												}
												?>
											],
				// Theme Options 
				progress_bar			:	1,			// Timer for each slide							
				mouse_scrub				:	0
			});
		});
		</script><?php 
	}
}
add_action('wp_head','skt_iamone_media_css_hook');



function skt_iamone_custom_head_codes() { 
	if ( function_exists('of_get_option') ){
		if ( of_get_option('style2', true) != '' ) {
			echo "<style>". of_get_option('style2', true) ."</style>";
		}
	}
}
add_action('wp_head', 'skt_iamone_custom_head_codes');


function skt_iamone_pagination() {
	global $wp_query;
	$big = 12345678;
	$page_format = paginate_links( array(
	    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	    'format' => '?paged=%#%',
	    'current' => max( 1, get_query_var('paged') ),
	    'total' => $wp_query->max_num_pages,
	    'type'  => 'array'
	) );
	if( is_array($page_format) ) {
		$paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
		echo '<div class="pagination"><div><ul>';
		echo '<li><span>'. $paged . ' of ' . $wp_query->max_num_pages .'</span></li>';
		foreach ( $page_format as $page ) {
			echo "<li>$page</li>";
		}
		echo '</ul></div></div>';
	}
}
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


/**
 * Load custom functions file.
 */
require get_template_directory() . '/inc/custom-functions.php';


function skt_iamone_credit_link(){
		printf( __('I am one theme by <a href="%s" target="_blank">SKTThemes.</a>', 'skt-iamone' ), esc_url('http://www.sktthemes.net') );
	}