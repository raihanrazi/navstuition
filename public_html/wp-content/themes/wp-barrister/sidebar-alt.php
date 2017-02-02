<?php
/**
 * The Sidebar (footer section) for the Alt Homepage.
 */
?>
		<div id="sidebar" class="widget-area alt clearfix" role="complementary">

			<?php if ( ! dynamic_sidebar( 'sidebar-alt' ) ) : ?>
                
                <aside id="recent-posts" class="widget">
					<div class="widget-title"><?php _e( 'Recent Posts', 'wp-barrister' ); ?></div>
					<ul>
						<?php
							$args = array( 'numberposts' => '5', 'post_status' => 'publish' );
							$recent_posts = wp_get_recent_posts( $args );
							
							foreach( $recent_posts as $recent ){
								if ($recent["post_title"] == '') {
									 $recent["post_title"] = __('Untitled', 'wp-barrister');
								}
								echo '<li><a href="' . get_permalink($recent["ID"]) . '" title="Look '.esc_attr($recent["post_title"]).'" >' . $recent["post_title"] .'</a> </li> ';
							}
						?>
                    </ul>
				</aside>

				<aside id="archives" class="widget">
					<div class="widget-title"><?php _e( 'Latest Archives', 'wp-barrister' ); ?></div>
					<ul>
						<?php wp_get_archives( array( 
							'type' => 'monthly',
							'limit' => '5'
						) ); ?>
					</ul>
				</aside>
                
                <aside id="popular-posts" class="widget">
					<div class="widget-title"><?php _e( 'Popular Posts', 'wp-barrister' ); ?></div>
					<ul>
						<?php $wp_barrister_pop_post = new WP_Query( array(
							'orderby' => 'comment_count',
							'posts_per_page' => 5,
							'ignore_sticky_posts' => 1
						) ); ?>
						 
						<?php while ($wp_barrister_pop_post->have_posts()) : $wp_barrister_pop_post->the_post(); ?>
                        
                        <li>
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php if(the_title( '', '', false ) !='') the_title(); else _e( 'Untitled', 'wp-barrister' ); ?></a>
                        </li>
 
						<?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    </ul>
				</aside>

			<?php endif; // end sidebar widget area ?>
		</div><!-- #sidebar .widget-area -->
