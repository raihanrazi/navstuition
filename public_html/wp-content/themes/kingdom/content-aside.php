<?php
/**
 * The template for displaying posts in the Aside post format
 */
?>
<div class="aside">
	<h3 class="kingdom-entry-title">
		<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'kingdom' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
	</h3>
	<div class="kingdom-entry-content">
		<?php the_content( __( "Continue reading", "kingdom" ) . ' <span class="meta-nav">&rarr;</span>' ); ?>
	</div><!-- .kingdom-entry-content -->
</div><!-- .aside -->

<div class="kingdom-entry-meta alignleft">
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
