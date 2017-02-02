<?php
/**
 * Template to display single post content on archive pages
 * Archive Post Style: Big Thumbnail (default)
 */
?>

<article <?php chromaticfw_attr( 'post', '', 'archive-big' ); ?>>

	<?php $img_size = apply_filters( 'chromaticfw_post_image_archive_big', '' );
	chromaticfw_post_thumbnail( 'entry-content-featured-img entry-grid-featured-img', $img_size ); ?>

	<div class="entry-grid grid">

		<div class="entry-grid-side grid-span-3">
			<?php if ( is_sticky() ) : ?>
				<div class="entry-sticky-tag"><?php _e( 'Sticky', 'chromatic' ) ?></div>
			<?php endif; ?>
			<div class="entry-byline">
				<?php chromaticfw_meta_info_blocks( chromaticfw_get_option('archive_post_meta') ); ?>
			</div><!-- .entry-byline -->
		</div>

		<div class="entry-grid-content grid-span-9">

			<header class="entry-header">
				<?php the_title( '<h2 ' . chromaticfw_get_attr( 'entry-title' ) . '><a href="' . get_permalink() . '" rel="bookmark" itemprop="url">', '</a></h2>' ); ?>
			</header><!-- .entry-header -->

			<div <?php chromaticfw_attr( 'entry-summary' ); ?>>
				<?php
				if ( 'full-content' == chromaticfw_get_option('archive_post_content') )
					the_content();
				else
					the_excerpt();
				?>
			</div><!-- .entry-summary -->

		</div><!-- .entry-grid-content -->

	</div><!-- .entry-grid -->

</article><!-- .entry -->