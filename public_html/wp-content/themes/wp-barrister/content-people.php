
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
    <header class="entry-header">
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'wp-barrister' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
	</header><!-- .entry-header -->
    
    <?php if ( has_post_thumbnail()) : ?>
        <div class="peoplethumb"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( array(640, 480) ); ?></a></div>
        <?php else : ?>
        <?php
        $postimgs =& get_children( array( 'post_parent' => $post->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order', 'order' => 'ASC' ) );
        if ( !empty($postimgs) ) {
            $firstimg = array_shift( $postimgs );
            $th_image = wp_get_attachment_image( $firstimg->ID, array(640, 480), false );
         ?>
            <div class="peoplethumb"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php echo $th_image; ?></a></div>
        <?php } else { ?>
			<div class="peoplethumb"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/library/images/profile-default.png" alt="" /></a></div>
		<?php } ?>
    <?php endif; ?>


	<footer class="entry-meta">
         <?php 
		  $job_title = get_post_meta( $post->ID, 'job_title', true ); 
		?>
        <?php if ( ! empty($job_title) ) : ?>
        	<div class="people-job-sm"><?php echo $job_title; ?></div>
        <?php endif; ?> 
	</footer><!-- #entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->
