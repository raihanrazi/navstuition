<?php
/**
 * The template for displaying posts in the Link post format
 */
?>
<h3 class="kingdom-entry-title pf-title"><?php _e( 'Link', 'kingdom' ); ?></h3>
<div class="kingdom-entry-content">
	<?php the_content( __( 'Continue reading', 'kingdom' ) . '<span class="meta-nav">&rarr;</span>' ); ?>
</div><!-- .kingdom-entry-content -->
<div class="kingdom-entry-meta">
	<span class="meta-prep meta-prep-author"><?php _e( 'Posted on', 'kingdom' ); ?></span>
	<a rel="bookmark" title="<?php the_time(); ?>" href="<?php the_permalink(); ?>"><span class="kingdom-entry-date"><?php echo get_the_date(); ?></span></a>
	<?php $cat_list = get_the_category_list( ', ' );
	if ( ! empty( $cat_list ) ) { ?>
		<span class="kingdom-meta-sep"><?php _e( 'in', 'kingdom' ); ?></span>
		<span class="kingdom-cat-list"><?php echo $cat_list; ?></span>
	<?php } ?>
</div><!-- .kingdom-entry-meta -->
<!-- navigation links for post -->
<div class="kingdom-post-nav-link"><?php wp_link_pages(); ?> </div>
