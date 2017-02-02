<?php
/**
 * Template to display 'single' content (post / custom post type / attachment)
 *     - on archive pages (multi post list)
 *     - on single post page
 *
 * This is the default template for 'singular' heirarchy. To customize it, you can duplicate
 * it in the same folder and rename it as 'content-{$post-type}', and the new template will
 * be used for that particular {$post-type}
 * Example : Create 'content-page.php' for content displayed on pages.
 *           Create 'content-attachment.php' for displaying content on attachment pages.
 *           And so on for any other custom post type.
 */


/**
 * If viewing a single post/cpt/attachment
 */
if ( is_singular( get_post_type() ) ) :
?>

	<article <?php chromaticfw_attr( 'post' ); ?>>

		<?php /* The current template displays heading outside the article. So to conform to html5 structure (document outline i.e. <header> is inside <article>) we add the Article Heading as assistive-text */ ?>
		<header class="entry-header assistive-text">
			<h1 <?php chromaticfw_attr( 'entry-title' ); ?>><?php single_post_title(); ?></h1>
		</header><!-- .entry-header -->

		<div <?php chromaticfw_attr( 'entry-content' ); ?>>

			<?php
			if ( chromaticfw_get_option( 'post_featured_image' ) ) {
				chromaticfw_post_thumbnail( 'entry-content-featured-img' );
			}
			?>
			<div class="entry-the-content">
				<?php global $post;
				if ( is_attachment() ) {
					echo wp_get_attachment_image( $post->ID, 'full' );
					the_excerpt();
					the_content();
				}
				else
					the_content(); ?>
			</div>
			<?php wp_link_pages(); ?>
		</div><!-- .entry-content -->

		<?php $show_entry_footer = apply_filters( 'chromaticfw_show_entry_footer', true ); ?>
		<?php if ( $show_entry_footer && 'bottom' == chromaticfw_get_option( 'post_meta_location' ) && !is_attachment() ): ?>
			<footer class="entry-footer">
				<?php chromaticfw_meta_info_blocks( chromaticfw_get_option('post_meta') ); ?>
			</footer><!-- .entry-footer -->
		<?php endif; ?>

	</article><!-- .entry -->

<?php
/**
 * If not viewing a single post i.e. viewing the post in a list index (archive etc.)
 */
else :

	$archive_type = 'big';

	// Loads the template-parts/content-archive-{type}.php template.
	get_template_part( 'template-parts/content-archive', $archive_type );

endif;
?>