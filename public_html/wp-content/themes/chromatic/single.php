<?php get_header(); // Loads the header.php template. ?>

<div class="grid">

	<div class="grid-row">

		<?php get_template_part( 'template-parts/loop-meta' ); // Loads the template-parts/loop-meta.php template to display Title Area with Meta Info (of the loop) ?>

		<main <?php chromaticfw_attr( 'content' ); ?>>

			<?php
			// Checks if any posts were found.
			if ( have_posts() ) :

				// Begins the loop through found posts, and load the post data.
				while ( have_posts() ) : the_post();

					// Loads the template-parts/content-{$post_type}.php template.
					chromaticfw_get_content_template();

				// End found posts loop.
				endwhile;

				// Loads the template-parts/loop-nav.php template.
				if ( chromaticfw_get_option( 'post_prev_next_links' ) )
					get_template_part( 'template-parts/loop-nav' );

				// Loads the comments.php template
				if ( !is_attachment() ) {
					comments_template( '', true );
				};

			// If no posts were found.
			else :

				// Loads the template-parts/error.php template.
				get_template_part( 'template-parts/error' );

			// End check for posts.
			endif;
			?>

		</main><!-- #content -->

		<?php chromaticfw_get_sidebar( 'primary' ); // Loads the template-parts/sidebar-primary.php template. ?>

	</div><!-- .grid-row -->

</div><!-- .grid -->

<?php get_footer(); // Loads the footer.php template. ?>