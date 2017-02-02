<li <?php chromaticfw_attr( 'comment' ); ?>>

	<article>
		<header class="comment-avatar">
			<?php echo get_avatar( $comment ); ?>
			<?php global $post;
			if ( $comment->user_id === $post->post_author ) { ?>
				<div class="comment-by-author"><?php _e( 'Author', 'chromatic' ); ?></div>
			<?php } ?>
		</header><!-- .comment-avatar -->

		<div class="comment-content-wrap">

			<div <?php chromaticfw_attr( 'comment-content' ); ?>>
				<?php comment_text(); ?>
			</div><!-- .comment-content -->

			<footer class="comment-meta">
				<div class="comment-meta-block">
					<cite <?php chromaticfw_attr( 'comment-author' ); ?>><?php comment_author_link(); ?></cite>
				</div>
				<div class="comment-meta-block">
					<time <?php chromaticfw_attr( 'comment-published' ); ?>><?php printf( __( '%s ago', 'chromatic' ), human_time_diff( get_comment_time( 'U' ), current_time( 'timestamp' ) ) ); ?></time>
				</div>
				<div class="comment-meta-block">
					<a <?php chromaticfw_attr( 'comment-permalink' ); ?>><?php _e( 'Permalink', 'chromatic' ); ?></a>
				</div>
				<?php if ( comments_open() ) : ?>
					<div class="comment-meta-block">
						<?php chromaticfw_comment_reply_link(); ?>
					</div>
				<?php endif; ?>
				<?php edit_comment_link(); ?>
			</footer><!-- .comment-meta -->

		</div><!-- .comment-content-wrap -->

	</article>

<?php /* No closing </li> is needed.  WordPress will know where to add it. */ ?>