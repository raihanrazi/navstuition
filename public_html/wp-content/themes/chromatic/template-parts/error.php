<article <?php chromaticfw_attr( 'post' ); ?>>

	<header class="entry-header">
		<h1 class="entry-title"><?php _e( 'Nothing found', 'chromatic' ); ?></h1>
	</header><!-- .entry-header -->

	<div <?php chromaticfw_attr( 'entry-content' ); ?>>
		<?php echo wpautop( __( 'Apologies, but no entries were found.', 'chromatic' ) ); ?>
	</div><!-- .entry-content -->

</article><!-- .entry -->