<?php
/**
 * Text String / Translatable string used in tamatebako
 * @since 0.1.0
 */
function tamatebako_string( $context ){

	/* Open Sesame ! */
	$text = array();

	/* Paged Title Tag
	 * Translators: 1 is the page title and separator. 2 is the page number.
	 * Example Output: "{post title} | Page {page number}"
	 */
	$text['paged'] = _x( '%1$s Page %2$s', 'paged title tag', 'press-start' );

	/* Skip to content (accessibility) */
	$text['skip-to-content'] = _x( 'Skip to content', 'skip to content (accessibility)', 'press-start' );

	/* Read More */
	$text['read-more'] = _x( 'Start reading', 'content read more', 'press-start' );

	/* Entry Permalink */
	$text['permalink'] = '';

	/* Next, Previous */
	$text['next'] = _x( 'Next', 'next in pagination and navigation (accessibility)', 'press-start' );
	$text['previous'] = _x( 'Previous', 'previous in pagination and navigation (accessibility)', 'press-start' );

	/* Search */
	$text['search'] = '';
	$text['search-button'] = '';
	$text['expand-search-form'] = '';

	/* Comments error */
	$text['comments-closed-pings-open'] = _x( 'Comments are closed, but trackbacks and pingbacks are open.', 'comments notice', 'press-start' );
	$text['comments-closed'] = _x( 'Comments are closed.', 'comments notice', 'press-start' );

	/* Content error */
	$text['error'] = _x( '404 Not Found', '404 title', 'press-start' );
	$text['error-msg'] = _x( 'Apologies, but no entries were found.', '404 content', 'press-start' );

	/* Theme Layout */
	$text['global-layout'] = _x( 'Global Layout', 'theme layouts', 'press-start' );
	$text['layout'] = _x( 'Layout', 'theme layouts', 'press-start' );

	$text = apply_filters( 'tamatebako_string', $text );

	/* Close Sesame ! */
	if ( isset( $text[$context] ) ){
		return $text[$context];
	}
	return '';
}


/**
 * Text String / Translatable string used in this theme
 * To keep track on language usage and separate from Hybrid Core.
 * @since 0.1.0
 */
function press_start_string( $context ){

	/* Open Sesame ! */
	$text = array();

	/* Register Menus */
	$text['menu-primary-name'] = _x( 'Navigation', 'nav menu location', 'press-start' );

	/* Register Sidebar */
	$text['sidebar-primary-name'] = _x( 'Sidebar', 'sidebar name', 'press-start' );

	$text = apply_filters( 'press_start_string', $text );

	/* Close Sesame ! */
	if ( isset( $text[$context] ) ){
		return $text[$context];
	}
	return '';
}
