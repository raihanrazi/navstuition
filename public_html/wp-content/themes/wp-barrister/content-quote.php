
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'wp-barrister' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
	</header><!-- .entry-header -->
    
    <?php if ( has_post_thumbnail()) : ?>
        <div class="imgthumb"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( array(640, 480) ); ?></a></div>
    <?php endif; ?>

	<div class="entry-content post-content">
	<?php if (has_excerpt()) : ?>
		<?php the_excerpt(); ?>
        <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'wp-barrister' ), the_title_attribute( 'echo=0' ) ); ?>" class="wpb-more" rel="bookmark"><?php _e('Read More &rarr;', 'wp-barrister') ?></a>
     <?php else : ?>
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'wp-barrister' ) ); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'wp-barrister' ), 'after' => '</div>' ) ); ?>
    <?php endif; ?>
	</div><!-- .entry-content -->

	<footer class="entry-meta">
		<?php wp_barrister_posted_on(); ?>
        <?php if ( is_single() ) : ?>
			<?php if ( comments_open() || ( '0' != get_comments_number() && ! comments_open() ) ) : ?>
            <span class="sep"> | </span>
            <span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'wp-barrister' ), __( '1 Comment', 'wp-barrister' ), __( '% Comments', 'wp-barrister' ) ); ?></span>
            <?php endif; ?>
        <?php endif; ?>
        <?php if ( is_single() ) : ?>
		<?php edit_post_link( __( 'Edit', 'wp-barrister' ), '<span class="sep"> | </span><span class="edit-link">', '</span>' ); ?>
        <?php endif; ?>
	</footer><!-- #entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->
