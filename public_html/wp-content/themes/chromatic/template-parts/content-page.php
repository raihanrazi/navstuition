<?php
/**
 * Template to display single static page content
 */
?>

<article <?php chromaticfw_attr( 'page' ); ?>>

	<?php /* The current template displays heading outside the article. So to conform to html5 structure (document outline i.e. <header> is inside <article>) we add the Article Heading as assistive-text */ ?>
	<header class="entry-header assistive-text">
		<h1 <?php chromaticfw_attr( 'entry-title' ); ?>><?php single_post_title(); ?></h1>
	</header><!-- .entry-header -->

	<div <?php chromaticfw_attr( 'entry-content' ); ?>>

		<?php
		if ( chromaticfw_get_option( 'post_featured_image' ) && !chromaticfw_is_404() ) {
			chromaticfw_post_thumbnail( 'entry-content-featured-img' );
		}
		?>
		<div class="entry-the-content">
			<?php the_content(); ?>
		</div>
		<?php wp_link_pages(); ?>

	</div><!-- .entry-content -->

	<?php $show_entry_footer = apply_filters( 'chromaticfw_show_entry_footer', true ); ?>
	<?php if ( $show_entry_footer && 'bottom' == chromaticfw_get_option( 'post_meta_location' ) ): ?>
		<footer class="entry-footer">
			<?php chromaticfw_meta_info_blocks( chromaticfw_get_option('post_meta') ); ?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>

</article><!-- .entry -->