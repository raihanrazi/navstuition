<?php
/**
 * Miscellaneous template functions.
 * These functions are for use throughout the theme's various template files.
 * This file is loaded via the 'after_setup_theme' hook at priority '10'
 *
 * @package chromaticfw
 * @subpackage chromatic
 * @since chromatic 1.0
 */

/**
 * Display <title> tag in <head>
 * This function is for backward compatibility only. For WP version greater than 4.1, theme
 * support for 'title-tag' is added in /hoot-theme/hoot-theme.php
 *
 * @since 2.0
 * @access public
 * @return void
 */
function chromaticfw_title_tag() {
	echo "\n";
	?><title><?php wp_title(); ?></title><?php
	echo "\n";
}

/**
 * Outputs the favicon link.
 *
 * @since 1.0
 * @access public
 * @return void
 */
function chromaticfw_favicon() {
	$favicon = chromaticfw_get_option( 'favicon' );
	if ( !empty( $favicon ) ) {
		echo '<link rel="shortcut icon" href="' . esc_url( $favicon ) . '" type="image/x-icon">' . "\n";
	}
}

/**
 * Displays the branding logo
 *
 * @since 1.0
 * @access public
 * @return void
 */
function chromaticfw_logo() {
	$display = '';

	$chromaticfw_logo = chromaticfw_get_option( 'logo' );
	if ( 'text' == $chromaticfw_logo ) {

		$title_icon = chromaticfw_get_option( 'site_title_icon', NULL );
		$class = ( $title_icon ) ? ' class="site-logo-with-icon"' : '';
		$display .= '<div id="site-logo-text"' . $class . '>';

			if ( $title_icon )
				$title_icon = '<i class="fa ' . sanitize_html_class( $title_icon ) . '"></i>';

			$display .= chromaticfw_get_site_title( $title_icon );

			if ( chromaticfw_get_option( 'show_tagline' ) )
				$display .= chromaticfw_get_site_description();

		$display .= '</div><!--logotext-->';

	} elseif ( 'image' == $chromaticfw_logo ) {
		$display .= chromaticfw_get_logo_image();
	}

	echo apply_filters( 'chromaticfw_display_logo', $display );
}

/**
 * Returns the image logo
 *
 * @since 1.0
 * @access public
 * @return void
 */
function chromaticfw_get_logo_image() {
	$logo_image = chromaticfw_get_option( 'logo_image' );
	$title = get_bloginfo( 'name' );
	if ( !empty( $logo_image ) ) {
		return '<div id="site-logo-img">'
				. '<h1 ' . chromaticfw_get_attr( 'site-title' ) . '>'
				. '<a href="' . home_url() . '" rel="home">'
				. '<span class="hide-text forcehide">' . $title . '</span>'
				. '<img src="' . esc_url( $logo_image ) . '">'
				. '</a>'
				. '</h1>'
				.'</div>';
	}
}

/**
 * Display a friendly reminder to update outdated browser
 *
 * @since 2.0
 * @access public
 */
function chromaticfw_update_browser() {
	$notice = '<!--[if lte IE 8]><p class="chromeframe">' .
			  sprintf( __( 'You are using an outdated browser (IE 8 or before). For a better user experience, we recommend %1supgrading your browser today%2s or %3sinstalling Google Chrome Frame%4s', 'chromatic' ), '<a href="http://browsehappy.com/">', '</a>', '<a href="http://www.google.com/chromeframe/?redirect=true">', '</a>' ) .
			  '</p><![endif]-->';
	echo apply_filters( 'chromaticfw_update_browser_notice', $notice );
}

/**
 * Display the meta information HTML for single post/page
 *
 * @since 1.0
 * @access public
 * @param array $display information to display
 * @return void
 */
function chromaticfw_meta_info_blocks( $display = array() ) {
	$default_display = array(
		'author' => true,
		'date' => true,
		'cats' => true,
		'tags' => true,
		'comments' => true,
	);
	$display = wp_parse_args( $display, $default_display );

	if ( !is_singular() && !empty( $display['date'] ) ) : ?>
		<div class="entry-byline-block entry-byline-intro">
			<span><?php echo the_time( 'd' ); ?></span>
			<span><?php echo the_time( 'F' ); ?></span>
		</div><?php
	endif;

	if ( !empty( $display['author'] ) ) : ?>
		<div class="entry-byline-block entry-byline-author">
			<span class="entry-byline-label"><?php _e( 'By', 'chromatic' ) ?> </span>
			<span <?php chromaticfw_attr( 'entry-author' ); ?>><?php the_author_posts_link(); ?></span>
		</div><?php
	endif;

	if ( !empty( $display['date'] ) ) : ?>
		<div class="entry-byline-block entry-byline-date">
			<span class="entry-byline-label"><?php _e( 'On', 'chromatic' ) ?> </span>
			<time <?php chromaticfw_attr( 'entry-published' ); ?>><?php echo get_the_date(); ?></time>
		</div><?php
	endif;

	if ( ! is_page() ) :
		if ( !empty( $display['cats'] ) ) : ?>
			<div class="entry-byline-block entry-byline-cats">
				<span class="entry-byline-label"><?php _e( 'In', 'chromatic' ) ?> </span>
				<?php the_category(', '); ?>
			</div><?php
		endif;
		if ( !empty( $display['tags'] ) ) : ?>
			<div class="entry-byline-block entry-byline-tags">
				<span class="entry-byline-label"><?php _e( 'Tagged', 'chromatic' ) ?> </span>
				<?php ( ! get_the_tags() ) ? _e( 'No Tags', 'chromatic' ) : the_tags('', ', ', ''); ?>
			</div><?php
		endif;
	endif;

	if ( !empty( $display['comments'] ) && comments_open() ) : ?>
		<div class="entry-byline-block entry-byline-comments">
			<span class="entry-byline-label"><?php _e( 'With', 'chromatic' ) ?> </span>
			<?php comments_popup_link(	__( '0 Comments', 'chromatic' ),
										__( '1 Comment', 'chromatic' ),
										__( '% Comments', 'chromatic' ), 'comments-link', '' );?>
		</div><?php
	endif;

	if ( $edit_link = get_edit_post_link() ) : ?>
		<div class="entry-byline-block entry-byline-editlink">
			<a href="<?php echo $edit_link; ?>"><?php _e( 'Edit This', 'chromatic' ) ?></a>
		</div><?php
	endif;
}

/**
 * Display the post thumbnail image
 *
 * @since 1.0
 * @access public
 * @param string $classes additional classes
 * @param string $size span or column size or actual image size name. Default is content width span.
 * @param bool $crop true|false|null Using null will return closest matched image irrespective of its crop setting
 * @return void
 */
function chromaticfw_post_thumbnail( $classes = '', $size = '', $crop = NULL ) {

	/* Add custom Classes if any */
	$custom_class = '';
	if ( !empty( $classes ) ) {
		$classes = explode( " ", $classes );
		foreach ( $classes as $class ) {
			$custom_class .= ' ' . sanitize_html_class( $class );
		}
	}

	/* Calculate the size to display */
	if ( !empty( $size ) ) {
		if ( 0 === strpos( $size, 'span-' ) || 0 === strpos( $size, 'column-' ) )
			$thumbnail_size = chromaticfw_get_image_size_name( $size, $crop );
		else
			$thumbnail_size = $size;
	} else {
		$size = 'span-' . chromaticfw_main_layout( 'content' );
		$thumbnail_size = chromaticfw_get_image_size_name( $size, $crop );
	}

	/* Finally display the image */
	the_post_thumbnail( $thumbnail_size, array( 'class' => "attachment-$thumbnail_size $custom_class" ) );

}

/**
 * Utility function to extract border class for widget based on user option.
 *
 * @since 1.0
 * @access public
 * @param string $val string value separated by spaces
 * @param int $index index for value to extract from $val
 * @prefix string $prefix prefixer for css class to return
 * @return void
 */
function chromaticfw_widget_border_class( $val, $index=0, $prefix='' ) {
	$val = explode( " ", trim( $val ) );
	if ( isset( $val[ $index ] ) )
		return $prefix . trim( $val[ $index ] );
	else
		return '';
}

/**
 * Utility function to map footer sidebars structure to CSS span architecture.
 *
 * @since 1.0
 * @access public
 * @return void
 */
function chromaticfw_footer_structure() {
	$footers = chromaticfw_get_option( 'footer' );
	$structure = array(
				'1-1' => array( 12, 12, 12, 12 ),
				'2-1' => array(  6,  6, 12, 12 ),
				'2-2' => array(  4,  8, 12, 12 ),
				'2-3' => array(  8,  4, 12, 12 ),
				'3-1' => array(  4,  4,  4, 12 ),
				'3-2' => array(  6,  3,  3, 12 ),
				'3-3' => array(  3,  6,  3, 12 ),
				'3-4' => array(  3,  3,  6, 12 ),
				'4-1' => array(  3,  3,  3,  3 ),
				);
	if ( isset( $structure[ $footers ] ) )
		return $structure[ $footers ];
	else
		return array( 12, 12, 12, 12 );
}

/**
 * Utility function to map 2 column widths to CSS span architecture.
 *
 * @since 1.0
 * @access public
 * @return void
 */
function chromaticfw_2_col_width_to_span( $col_width ) {
	$return = array();
	switch( $col_width ):
		case '33-66':
			$return[0] = 'grid-span-4';
			$return[1] = 'grid-span-8';
			break;
		case '66-33':
			$return[0] = 'grid-span-8';
			$return[1] = 'grid-span-4';
			break;
		case '25-75':
			$return[0] = 'grid-span-3';
			$return[1] = 'grid-span-9';
			break;
		case '75-25':
			$return[0] = 'grid-span-9';
			$return[1] = 'grid-span-3';
			break;
		case '50-50': default:
			$return[0] = $return[1] = 'grid-span-6';
	endswitch;
	return $return;
}

/**
 * Wrapper function for chromaticfw_main_layout() to get the class names for current context.
 * Can only be used after 'posts_selection' action hook i.e. in 'wp' hook or later.
 *
 * @since 2.0
 * @access public
 * @param string $context content|primary-sidebar|sidebar|sidebar-primary
 * @return string
 */
function chromaticfw_main_layout_class( $context ) {
	return chromaticfw_main_layout( $context, 'class' );
}

/**
 * Utility function to return layout size or classes for the context.
 * Can only be used after 'posts_selection' action hook i.e. in 'wp' hook or later.
 *
 * @since 1.0
 * @access public
 * @param string $context content|primary-sidebar|sidebar|sidebar-primary
 * @param string $return class|size return class name or just the span size integer
 * @return string
 */
function chromaticfw_main_layout( $context, $return = 'size' ) {

	// Set layout
	global $chromaticfw_theme;
	if ( !isset( $chromaticfw_theme->currentlayout ) )
		chromaticfw_set_main_layout();

	$span_sidebar = $chromaticfw_theme->currentlayout['sidebar'];
	$span_content = $chromaticfw_theme->currentlayout['content'];

	// Return Class or Span Size for the Content/Sidebar
	if ( $context == 'content' ) {

		if ( $return == 'class' ) {
			$extra_class = ( empty( $span_sidebar ) ) ? ' no-sidebar' : '';
			return ' grid-span-' . $span_content . $extra_class . ' ';
		} elseif ( $return == 'size' ) {
			return intval( $span_content );
		}

	} elseif ( $context == 'primary-sidebar' || $context == 'sidebar' ||  $context == 'sidebar-primary' ) {

		if ( $return == 'class' ) {
			if ( !empty( $span_sidebar ) )
				return ' grid-span-' . $span_sidebar . ' ';
			else
				return '';
		} elseif ( $return == 'size' ) {
			return intval( $span_sidebar );
		}

	}

	return '';

}

/**
 * Utility function to calculate and set main (content+aside) layout according to the sidebar layout
 * set by user for the current view.
 * Can only be used after 'posts_selection' action hook i.e. in 'wp' hook or later.
 *
 * @since 2.0
 * @access public
 */
function chromaticfw_set_main_layout() {

	if ( is_singular( 'post' ) ) {
		// Apply Sidebar Layout for Posts
		$sidebar = chromaticfw_get_option( 'sidebar_posts' );
	} elseif ( is_page() ) {
		if ( chromaticfw_is_404() )
			// Apply 'Full Width' if this page is being displayed as a custom 404 page
			$sidebar = 'none';
		else
			// Apply Sidebar Layout for Pages
			$sidebar = chromaticfw_get_option( 'sidebar_pages' );
	} elseif ( is_attachment() ) {
		// Apply 'Full Width'
		$sidebar = 'none';
	} else {
		// Apply Sidebar Layout for Site
		$sidebar = chromaticfw_get_option( 'sidebar' );
	}

	/* Allow for custom manipulation of the layout by child themes */
	$sidebar = apply_filters( 'chromaticfw_main_layout', $sidebar );
	$spans = apply_filters( 'chromaticfw_main_layout_spans', array(
		'none' => array(
			'content' => 9,
			'sidebar' => 0,
		),
		'narrow-right' => array(
			'content' => 9,
			'sidebar' => 3,
		),
		'wide-right' => array(
			'content' => 8,
			'sidebar' => 4,
		),
		'default' => array(
			'content' => 8,
			'sidebar' => 4,
		),
	) );

	/* Finally, set the layout for current view */
	global $chromaticfw_theme;
	if ( isset( $spans[ $sidebar ] ) ) {
		$chromaticfw_theme->currentlayout['content'] = $spans[ $sidebar ]['content'];
		$chromaticfw_theme->currentlayout['sidebar'] = $spans[ $sidebar ]['sidebar'];
	} else {
		$chromaticfw_theme->currentlayout['content'] = $spans['default']['content'];
		$chromaticfw_theme->currentlayout['sidebar'] = $spans['default']['sidebar'];
	}

}