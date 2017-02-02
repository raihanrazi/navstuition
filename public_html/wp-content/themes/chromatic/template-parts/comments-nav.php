<?php if ( get_option( 'page_comments' ) && 1 < get_comment_pages_count() ) : // Check for paged comments. ?>

	<nav class="comments-nav" role="navigation" aria-labelledby="comments-nav-title">

		<h3 id="comments-nav-title" class="assistive-text"><?php _e( 'Comments Navigation', 'chromatic' ); ?></h3>

		<?php previous_comments_link( _x( '&larr; Previous', 'comments navigation', 'chromatic' ) ); ?>

		<span class="page-numbers"><?php 
			/* Translators: Comments page numbers. 1 is current page and 2 is total pages. */
			printf( __( 'Page %1$s of %2$s', 'chromatic' ), get_query_var( 'cpage' ) ? absint( get_query_var( 'cpage' ) ) : 1, get_comment_pages_count() ); 
		?></span>

		<?php next_comments_link( _x( 'Next &rarr;', 'comments navigation', 'chromatic' ) ); ?>

	</nav><!-- .comments-nav -->

<?php endif; // End check for paged comments. ?>