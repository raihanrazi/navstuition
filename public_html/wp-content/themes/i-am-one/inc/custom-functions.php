<?php
/**
 * @package SKT I Am One
 * Setup the WordPress core custom functions feature.
 *
*/

add_action('admin_enqueue_scripts', 'skt_iamone_optionsframework_custom_scripts');
	function skt_iamone_optionsframework_custom_scripts( $hook ) {
    if ( 'appearance_page_iamone-options' != $hook ) {
        return;
    }
    wp_enqueue_script( 'skt-iamone-option-script', get_template_directory_uri().'/js/optionframework-custom.js' );
}
	

// custom javascript for head
function skt_iamone_hook_custom_javascript(){
	wp_enqueue_script('skt_iamone_cus', get_template_directory_uri().'/js/hook-custom-script.js');	
}
add_action('wp_enqueue_scripts','skt_iamone_hook_custom_javascript');

// get_the_content format text
function skt_iamone_get_the_content_format( $str ){
	$raw_content = apply_filters( 'the_content', $str );
	$content = str_replace( ']]>', ']]&gt;', $raw_content );
	return $content;
}
// the_content format text
function skt_iamone_the_content_format( $str ){
	echo skt_iamone_get_the_content_format( $str );
}


function skt_iamone_is_google_font( $font ){
	$notGoogleFont = array( 'Arial', 'Comic Sans MS', 'FreeSans', 'Georgia', 'Lucida Sans Unicode', 'Palatino Linotype', 'Symbol', 'Tahoma', 'Trebuchet MS', 'Verdana' );
	if( in_array($font, $notGoogleFont) ){
		return false;
	}else{
		return true;
	}
}

// subhead section function
function skt_iamone_sub_head_section( $more ) {
	$pgs = 0;
	do {
		$pgs++;
	} while ($more > $pgs);
	return $pgs;
}


// remove excerpt more
function skt_iamone_new_excerpt_more( $more ) {
	return '... ';
}
add_filter('excerpt_more', 'skt_iamone_new_excerpt_more');

// get post categories function
function skt_iamone_get_post_categories(){
	$categories = get_the_category();
	$catOut = '';
	$separator = ', ';
	$catOutput = '';
	if($categories){
		foreach($categories as $category) {
			$catOutput .= '<a href="'.esc_url(get_category_link( $category->term_id )).'" title="' . esc_attr( sprintf( __( "View all posts in %s", 'skt-iamone' ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
		}
		$catOut = __('Categories: ','skt-iamone').trim($catOutput, $separator);
	}
	return $catOut;
}

// replace last occurance of a string.
function skt_iamone_str_lreplace($search, $replace, $subject){
	$pos = strrpos($subject, $search);
	if($pos !== false){
		$subject = substr_replace($subject, $replace, $pos, strlen($search));
	}
	return $subject;
}

define('SKT_URL','http://www.sktthemes.net');
define('SKT_THEME_URL','http://www.sktthemes.net/themes');
define('SKT_THEME_DOC','http://sktthemesdemo.net/documentation/i-am-one-documentation/');