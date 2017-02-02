
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
      <?php if ( is_single() ) : ?>
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'wp-barrister' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
        
        <div class="entry-meta">
			<?php wp_barrister_posted_on(); ?>
		</div><!-- .entry-meta -->
      <?php else : ?>
        <h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'wp-barrister' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
      <?php endif; ?>
	</header><!-- .entry-header -->

    
    <div class="entry-content post-content">
		<?php if (has_excerpt()) : ?>
            <?php the_excerpt(); ?>
        <?php else : ?>
            <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'wp-barrister' ) ); ?>
            <?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'wp-barrister' ), 'after' => '</div>' ) ); ?>
        <?php endif; ?>

	</div><!-- .entry-content -->


	<?php if ( is_single() ) : ?>
    <footer class="entry-meta">
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'wp-barrister' ) );
				if ( $categories_list && wp_barrister_categorized_blog() ) :
			?>
			<span class="cat-links">
				<?php printf( __( 'Posted in %1$s', 'wp-barrister' ), $categories_list ); ?>
			</span>
			<span class="sep"> | </span>
			<?php endif; // End if categories ?>

			<?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'wp-barrister' ) );
				if ( $tags_list ) :
			?>
			<span class="tag-links">
				<?php printf( __( 'Tagged %1$s', 'wp-barrister' ), $tags_list ); ?>
			</span>
			<span class="sep"> | </span>
			<?php endif; // End if $tags_list ?>
		<?php endif; // End if 'post' == get_post_type() ?>

		<?php if ( comments_open() || ( '0' != get_comments_number() && ! comments_open() ) ) : ?>
		<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'wp-barrister' ), __( '1 Comment', 'wp-barrister' ), __( '% Comments', 'wp-barrister' ) ); ?></span>
		<span class="sep"> | </span>
		<?php endif; ?>

		<?php edit_post_link( __( 'Edit', 'wp-barrister' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- #entry-meta -->
    <?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
