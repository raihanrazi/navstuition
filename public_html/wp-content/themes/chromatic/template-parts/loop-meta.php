<?php
/**
 * If viewing a multi post page 
 */
if ( !is_front_page() && !is_singular() && !chromaticfw_is_404() ) :
?>

	<div <?php chromaticfw_attr( 'loop-meta', '', 'grid-span-12' ); ?>>

		<h1 <?php chromaticfw_attr( 'loop-title' ); ?>><?php chromaticfw_loop_title(); // Displays title for archive type (multi post) pages. ?></h1>

		<?php if ( $desc = chromaticfw_get_loop_description() ) : ?>
			<div <?php chromaticfw_attr( 'loop-description' ); ?>>
				<?php echo $desc; // Displays description for archive type (multi post) pages. ?>
			</div><!-- .loop-description -->
		<?php endif; // End paged check. ?>

	</div><!-- .loop-meta -->

<?php
/**
 * If viewing a single post/page, and the page is not set as frontpage
 */
elseif ( !is_front_page() && is_singular() && !chromaticfw_is_404() ) :
?>

	<?php
	if ( have_posts() ) :
		// Begins the loop through found posts, and load the post data.
		while ( have_posts() ) : the_post(); ?>

			<div <?php chromaticfw_attr( 'loop-meta', '', 'grid-span-12' ); ?>>
				<div class="entry-header">

					<?php
					global $post;
					$pretitle = ( !isset( $post->post_parent ) || empty( $post->post_parent ) ) ? '' : get_the_title( $post->post_parent ) . ' &raquo; ';
					?>
					<h1 <?php chromaticfw_attr( 'loop-title' ); ?>><?php the_title( $pretitle ); ?></h1>

					<?php $show_loop_description = apply_filters( 'chromaticfw_show_loop_description', true ); ?>
					<?php if ( $show_loop_description && 'top' == chromaticfw_get_option( 'post_meta_location' ) && !is_attachment() ) : ?>
						<div <?php chromaticfw_attr( 'loop-description' ); ?>>
							<div class="entry-byline">
								<?php chromaticfw_meta_info_blocks( chromaticfw_get_option('post_meta') ); ?>
							</div><!-- .entry-byline -->
						</div><!-- .loop-description -->
					<?php endif; ?>

				</div><!-- .entry-header -->
			</div><!-- .loop-meta -->

		<?php
		endwhile;
		rewind_posts();
	endif; ?>

<?php endif; ?>