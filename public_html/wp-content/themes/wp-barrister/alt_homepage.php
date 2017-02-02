<?php
/**
 * Template Name: Alt_Homepage
 * Description: Alternative homepage template with footer widgets, and if there's a WP gallery present, the gallery images will be displayed as background image slider .
 */
get_header(); ?>

	<?php if( has_shortcode( $post->post_content, 'gallery' ) ) : ?>

	<div id="slide-wrap">

         <div class="cycle-slideshow" data-cycle-fx="fadeOut" data-cycle-slides="> div.slides" <?php
                  	if ( get_theme_mod('wp_barrister_slider_timeout') ) {
						$slider_timeout = wp_kses_post( get_theme_mod('wp_barrister_slider_timeout') );
						echo 'data-cycle-timeout="' . $slider_timeout . '000"';
					} else {
						echo 'data-cycle-timeout="5000"';
					}
				  ?> <?php
                  	if ( get_theme_mod('wp_barrister_slider_speed') ) {
						$slider_speed = wp_kses_post( get_theme_mod('wp_barrister_slider_speed') );
						echo 'data-cycle-speed="' . $slider_speed . '000"';
					} else {
						echo 'data-cycle-speed="1000"';
					}
				  ?> data-cycle-prev="#sliderprev" data-cycle-next="#slidernext">

            <?php while ( have_posts() ) : the_post();  ?>
            
            <?php 
			$gallery = get_post_gallery( $post, false );
			$ids = explode( ",", $gallery['ids'] );
			
			foreach( $ids as $id ) {
				$title = get_post_field('post_title', $id);
				$meta = get_post_field('post_excerpt', $id);
				$link = wp_get_attachment_url( $id );
				$image  = wp_get_attachment_image( $id, "full");
			?>
            
            <div class="slides">  
            
              <div id="post-<?php the_ID(); ?>" <?php post_class('post-theme'); ?>>
              
                  <div class="slide-thumb"><?php echo $image; ?></div>
   					
              </div>
            
            </div><!-- .slides -->  
            
            <?php } ?>
            
 			<?php endwhile; ?>
            
            <?php wp_reset_query(); ?>
            
        </div><!-- .cycle-slideshow -->

    </div><!-- #slide-wrap -->
    
    <?php endif; ?>
    
    <?php if ( have_posts() ) : ?>
    	<?php while ( have_posts() ) : the_post(); ?>
        <div id="wpb-banner" class="clearfix">
        	<h1 class="entry-title"><?php the_title(); ?></h1>
            <div class="wpb-content">
            <?php $content = wp_barrister_content(9999); ?>
			<?php $content = preg_replace(array('{<a[^>]*><img}','{/></a>}'), array('<img','/>'), $content); ?>
            <?php $content = preg_replace('/<img[^>]+./', '', $content); ?>
            <?php $content = preg_replace('#<p>\s*+(<br\s*/*>)?\s*</p>#i', '', $content); ?>
            <?php echo $content; ?>
            </div>
        </div>
    	<?php endwhile; ?>
        <?php wp_reset_query(); ?>
    <?php endif; ?>
    
    
    <?php get_sidebar('alt') ?>
    
        
<?php get_footer(); ?>