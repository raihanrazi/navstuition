<?php
	get_header(); 
?>
	<div id="two-columns">
		<div id="content" role="main">
			<div class="page-heading">
				<ul class="view">
					<li id="listview" class="switcher listview"><a href="#"></a></li>
					<li id="gridview" class="switcher gridview-hover"><a href="#"></a></li>
				</ul>
				<h2>	<?php
						if ( is_category() ) :
							printf( __( 'Category Archives: %s', 'creativeMag' ), '<span>' . single_cat_title( '', false ) . '</span>' );
						elseif ( is_tag() ) :
							printf( __( 'Tag Archives: %s', 'creativeMag' ), '<span>' . single_tag_title( '', false ) . '</span>' );
						elseif ( is_author() ) :
							/* Queue the first post, that way we know
							 * what author we're dealing with (if that is the case).
							*/
							the_post();
							printf( __( 'Author Archives: %s', 'creativeMag' ), '<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' );
							/* Since we called the_post() above, we need to
							 * rewind the loop back to the beginning that way
							 * we can run the loop properly, in full.
							 */
							rewind_posts();
						elseif ( is_day() ) :
							printf( __( 'Daily Archives: %s', 'creativeMag' ), '<span>' . get_the_date() . '</span>' );
						elseif ( is_month() ) :
							printf( __( 'Monthly Archives: %s', 'creativeMag' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );
						elseif ( is_year() ) :
							printf( __( 'Yearly Archives: %s', 'creativeMag' ), '<span>' . get_the_date( 'Y' ) . '</span>' );
						elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
							_e( 'Asides', 'creativeMag' );
						elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
							_e( 'Images', 'creativeMag');
						elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
							_e( 'Videos', 'creativeMag' );
						elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
							_e( 'Quotes', 'creativeMag' );
						elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
							_e( 'Links', 'creativeMag' );
						else :
							_e( 'Archives', 'creativeMag' );
						endif;
					?></h2>
			</div>
            <div class="post-list">
 
		<?php if ( have_posts() ) : ?>
 
                 <script type="text/javascript">
					jQuery(document).ready(function(){
						if (window.name == 'grid') {
							jQuery(".test").addClass('grid');
							jQuery('#listview').removeClass('listview');
							jQuery('#listview').addClass('listview-hover');
							jQuery('#gridview').addClass('gridview');
						}
						else {
							jQuery(".test").addClass('list');
							jQuery('#gridview').removeClass('gridview');
							jQuery('#gridview').addClass('gridview-hover');
							jQuery('#listview').addClass('listview');
						}
					});
				 </script>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php  
					get_template_part( 'content', get_post_format() );
				?>
			<?php endwhile; ?>
                <div class="clear">
				</div> 
				<?php 
						 
							creativemag_content_nav( 'nav-below' );
					 
				?>
		<?php else : ?>
			<?php get_template_part( 'no-results', 'index' ); ?>
		<?php endif; ?>
 
                <div class="clear">
				</div>
				
				</div> 
			</div>
   
					
<?php get_sidebar('right'); ?>
<?php get_footer(); ?>
 