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
				<h2>
				<?php 
					_e("LATEST ARTICLES","creativeMag");
				?>
				</h2>
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