
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<header class="entry-header">
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'wp-barrister' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		<?php if ( is_single() ) : ?>
		  <?php if ( 'post' == get_post_type() ) : ?>
		    <div class="entry-meta">
			  <?php wp_barrister_posted_on(); ?>
		    </div><!-- .entry-meta -->
		  <?php endif; ?>
        <?php endif; ?>
	</header><!-- .entry-header -->

	<?php if ( has_post_thumbnail()) : ?>
        <div class="imgthumb"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( array(640, 480) ); ?></a></div>
        <?php else : ?>
        <?php
        $postimgs =& get_children( array( 'post_parent' => $post->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order', 'order' => 'ASC' ) );
        if ( !empty($postimgs) ) {
            $firstimg = array_shift( $postimgs );
            $th_image = wp_get_attachment_image( $firstimg->ID, array(640, 480), false );
         ?>
            <div class="imgthumb"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php echo $th_image; ?></a></div>
        <?php } else { ?>
			<div class="noimg"></div>
		<?php } ?>
    <?php endif; ?>
    
	<div class="entry-content post-content">
        <?php if (has_excerpt()) : ?>
			<?php the_excerpt(); ?>
        <?php else : ?>
      		<?php echo wp_barrister_excerpt(20); ?>
        <?php endif; ?>
        <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'wp-barrister' ), the_title_attribute( 'echo=0' ) ); ?>" class="wpb-more" rel="bookmark"><?php _e('Read More &rarr;', 'wp-barrister') ?></a>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
