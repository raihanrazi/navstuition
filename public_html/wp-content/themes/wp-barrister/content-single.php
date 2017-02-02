
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>

		<div class="entry-meta">
			<?php wp_barrister_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content post-content">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'wp-barrister' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->
    
    <?php if (get_theme_mod('wp_barrister_author_bio') ) : ?>
    <!--BEGIN .author-bio-->
	<div class="author-bio clearfix">        
		<?php 
		$author_avatar = get_avatar( get_the_author_meta('email'), '75' );
		if ($author_avatar) : ?>
        	<div class="author-thumb"><?php echo $author_avatar; ?></div>
        <?php endif; ?>
        
        <div class="author-info">
        	<?php $author_posts_url = get_author_posts_url( get_the_author_meta( 'ID' )); ?> 
            <h4 class="author-title"><?php _e('Written by ', 'wp-barrister'); ?><a href="<?php echo esc_url($author_posts_url); ?>" title="<?php printf( __( 'View all posts by %s', 'wp-barrister' ), get_the_author() ) ?>"><?php the_author(); ?></a></h4>
            <?php $author_desc = get_the_author_meta('description');
			if ( $author_desc ) : ?>
            <p class="author-description"><?php echo $author_desc; ?></p>
            <?php endif; ?>
            <?php $author_url = get_the_author_meta('user_url');
			if ( $author_url ) : ?>
            <p><?php _e('Website: ', 'wp-barrister') ?><a href="<?php echo $author_url; ?>"><?php echo $author_url; ?></a></p>
            <?php endif; ?>
        </div>
    </div>
	<!--END .author-bio-->
    <?php endif; ?>

	<footer class="entry-meta">
		<?php
			/* translators: used between list items, there is a space after the comma */
			$category_list = get_the_category_list( __( ', ', 'wp-barrister' ) );

			/* translators: used between list items, there is a space after the comma */
			$tag_list = get_the_tag_list( '', ', ' );

			if ( ! wp_barrister_categorized_blog() ) {
				// This blog only has 1 category so we just need to worry about tags in the meta text
				if ( '' != $tag_list ) {
					$meta_text = __( 'Tagged %2$s.', 'wp-barrister' );
				}

			} else {
				// But this blog has loads of categories so we should probably display them here
				if ( '' != $tag_list ) {
					$meta_text = __( 'Posted in %1$s and Tagged %2$s.', 'wp-barrister' );
				} else {
					$meta_text = __( 'Posted in %1$s.', 'wp-barrister' );
				}

			} // end check for categories on this blog

			printf(
				$meta_text,
				$category_list,
				$tag_list,
				get_permalink(),
				the_title_attribute( 'echo=0' )
			);
		?>

		<?php edit_post_link( __( 'Edit', 'wp-barrister' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
    
</article><!-- #post-<?php the_ID(); ?> -->
