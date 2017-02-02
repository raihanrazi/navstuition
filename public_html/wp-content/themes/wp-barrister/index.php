<?php get_header(); ?>

	<?php
		$sticky = get_option( 'sticky_posts' );
		$args = array(
			'post__in'  => $sticky,
			'posts_per_page' => 1
		);
		$sticky_posts = new WP_Query($args);
    ?>
    <?php if ( $sticky_posts->have_posts() ) : ?>
    	
    	<?php while ( $sticky_posts->have_posts() ) : $sticky_posts->the_post(); ?>
        <div id="wpb-banner" class="clearfix">
        	<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'wp-barrister' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
            <div class="wpb-content">
            <?php echo wp_barrister_excerpt(40); ?>
            <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'wp-barrister' ), the_title_attribute( 'echo=0' ) ); ?>" class="wpb-more" rel="bookmark"><?php _e('Read More &rarr;', 'wp-barrister') ?></a>
            </div>
        </div><!-- #wpb-banner -->
    	<?php endwhile; ?>
        
    <?php wp_reset_postdata(); ?>
    
    <?php endif; ?>
    

    <div id="content" class="clearfix">
        
			<?php if ( have_posts() ) : ?>
            	<div id="grid-wrap" class="clearfix">
				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
				  <div class="grid-box">
					<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to overload this in a child theme then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'content', get_post_format() );
					?>
				  </div><!-- .grid-box -->
				<?php endwhile; ?>
                </div><!-- #grid-wrap -->

				<?php if (function_exists("wp_barrister_pagination")) {
							wp_barrister_pagination(); 
				} elseif (function_exists("wp_barrister_content_nav")) { 
							wp_barrister_content_nav( 'nav-below' );
				}?>

			<?php else : ?>

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'wp-barrister' ); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content post-content">
						<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'wp-barrister' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; ?>

    </div> <!-- end #content -->
        
<?php get_footer(); ?>