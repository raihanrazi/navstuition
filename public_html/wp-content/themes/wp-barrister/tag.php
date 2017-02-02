<?php get_header(); ?>

    <div id="content" class="clearfix">

			<?php if ( have_posts() ) : ?>

				<div id="wpb-banner" class="clearfix">
					<h1 class="page-title"><?php
						printf( __( 'Tag Archives: %s', 'wp-barrister' ), '<span>' . single_tag_title( '', false ) . '</span>' );
					?></h1>

					<?php
						$tag_description = tag_description();
						if ( ! empty( $tag_description ) )
							echo apply_filters( 'tag_archive_meta', '<div class="wpb-content">' . $tag_description . '</div>' );
					?>
				</div><!-- #wpb-banner -->

				<?php rewind_posts(); ?>


				<div id="grid-wrap" class="clearfix">
				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
                  <div class="grid-box">
					<?php
						/* Include the Post-Format-specific template for the content.
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
            
            <div id="main" class="col620 clearfix" role="main">

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'wp-barrister' ); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content post-content">
						<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'wp-barrister' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->
                
                </div> <!-- end #main -->

       		<?php get_sidebar(); ?>

			<?php endif; ?>

    </div> <!-- end #content -->
        
<?php get_footer(); ?>