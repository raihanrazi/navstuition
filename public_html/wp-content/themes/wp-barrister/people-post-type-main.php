<?php 
/**
 * Template Name: People Profile Template
 * Description: Main Page Template for the "People" Custom Post Type.
 */
get_header(); ?>

	<?php if ( have_posts() ) : ?>
    	<?php while ( have_posts() ) : the_post(); ?>
        <div id="wpb-banner" class="clearfix">
        	<h1 class="entry-title"><?php the_title(); ?></h1>
            <div class="wpb-content">
            <?php echo the_content(); ?>
            </div>
        </div>
    	<?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    <?php endif; ?>

    <div id="content" class="people-main clearfix">

        <?php if (post_type_exists('people')) : ?>
        	<?php 
				if ( get_query_var('paged') ) {
                        $paged = get_query_var('paged');
                } elseif ( get_query_var('page') ) {
                        $paged = get_query_var('page');
                } else {
                        $paged = 1;
                }

				$args = array(
					'orderby' => 'title',
					'order' => 'ASC',
					'post_type' => 'people',
					'people_category' => '',
					'paged' => $paged
				);
				$people_query = new WP_Query($args);
			?>
            
			<?php if ($people_query->have_posts() ) : ?>
            	<div id="grid-wrap" class="clearfix">
				<?php /* Start the Loop */ ?>
				<?php while ( $people_query->have_posts() ) : $people_query->the_post(); ?>
				  	<div class="grid-box">
                    
					<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to overload this in a child theme then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'content', 'people' );
					?>
				  	</div>
				<?php endwhile; ?>
                
                </div>

				<?php if (function_exists("wp_barrister_pagination")) {
							wp_barrister_pagination(); 
				} elseif (function_exists("wp_barrister_content_nav")) { 
							wp_barrister_content_nav( 'nav-below' );
				}?>
                
                <?php wp_reset_postdata(); ?>

			<?php else : ?>

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'No People Found!', 'wp-barrister' ); ?></h1>
					</header><!-- .entry-header -->
					<div class="noimg"></div>
                    <div class="entry-content post-content">
						<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'wp-barrister' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; ?>
            
        <?php else : ?>
        
        	<article id="post-0" class="post no-results not-found">
                <header class="entry-header">
                    <h1 class="entry-title"><?php _e( 'No People Found!', 'wp-barrister' ); ?></h1>
                </header><!-- .entry-header -->
				<div class="noimg"></div>
                <div class="entry-content post-content">
                    <p><?php _e( 'Please make sure that the WP barrister People CPT Plugin is installed and activated.', 'wp-barrister' ); ?></p>
                </div><!-- .entry-content -->
            </article><!-- #post-0 -->
        
        <?php endif; ?>

    </div> <!-- end #content -->
        
<?php get_footer(); ?>