<?php
/**
 * The template for displaying Search Results pages.
 */
get_header(); ?>

    <div id="content" class="clearfix">

			<?php if ( have_posts() ) : ?>

				<div id="wpb-banner" class="clearfix">
					<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'wp-barrister' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				</div><!-- #wpb-banner -->

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
						<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'wp-barrister' ); ?></p>
						<?php get_search_form(); ?>
                        
                        <p><?php _e('Or you can try these links below.', 'wp-barrister'); ?></p>
                        
                        <?php the_widget( 'WP_Widget_Recent_Posts' ); ?>

					<div class="widget">
						<h2 class="widget-title"><?php _e( 'Most Used Categories', 'wp-barrister' ); ?></h2>
						<ul>
						<?php wp_list_categories( array( 'orderby' => 'count', 'order' => 'DESC', 'show_count' => 1, 'title_li' => '', 'number' => 10 ) ); ?>
						</ul>
					</div>

					<?php
					/* translators: %1$s: smilie */
					$archive_content = '<p>' . sprintf( __( 'Try looking in the monthly archives. %1$s', 'wp-barrister' ), convert_smilies( ':)' ) ) . '</p>';
					the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );
					?>

					<?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->
                
            </div> <!-- end #main -->

        	<?php get_sidebar(); ?>

		<?php endif; ?>

    </div> <!-- end #content -->
        
<?php get_footer(); ?>