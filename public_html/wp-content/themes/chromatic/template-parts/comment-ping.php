<li <?php chromaticfw_attr( 'comment' ); ?>>

	<header class="comment-meta comment-ping">
		<cite <?php chromaticfw_attr( 'comment-author' ); ?>><?php comment_author_link(); ?></cite>
		<br />
		<div class="comment-meta-block">
			<time <?php chromaticfw_attr( 'comment-published' ); ?>><?php printf( __( '%s ago', 'chromatic' ), human_time_diff( get_comment_time( 'U' ), current_time( 'timestamp' ) ) ); ?></time>
		</div>
		<div class="comment-meta-block">
			<a <?php chromaticfw_attr( 'comment-permalink' ); ?>><?php _e( 'Permalink', 'chromatic' ); ?></a>
		</div>
		<?php edit_comment_link(); ?>
	</header><!-- .comment-meta -->

<?php /* No closing </li> is needed.  WordPress will know where to add it. */ ?>