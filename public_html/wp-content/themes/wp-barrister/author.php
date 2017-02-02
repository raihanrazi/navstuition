<?php get_header(); ?>

    <div id="content" class="clearfix">

			<?php if ( have_posts() ) : ?>

				<?php
					/* Queue the first post, that way we know
					 * what author we're dealing with (if that is the case).
					 *
					 * We reset this later so we can run the loop
					 * properly with a call to rewind_posts().
					 */
					the_post();
				?>

				<div id="wpb-banner" class="clearfix">
					<h1 class="page-title author"><?php printf( __( 'Author Archives: %s', 'wp-barrister' ), '<span class="vcard"><a class="url fn n" href="' . get_author_posts_url( get_the_author_meta( "ID" ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' ); ?></h1>
				</div><!-- #wpb-banner -->

				<?php
					/* Since we called the_post() above, we need to
					 * rewind the loop back to the beginning that way
					 * we can run the loop properly, in full.
					 */
					rewind_posts();
				?>


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