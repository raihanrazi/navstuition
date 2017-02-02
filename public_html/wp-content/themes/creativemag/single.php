<?php
 get_header(); 
?>
 
    <div id="two-columns">
		<div id="content" role="main">
			<div class="post">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'content', 'single' ); ?>
 
			<?php   
				if ( comments_open() || '0' != get_comments_number() )
					 
					comments_template(); 	?>
		<?php endwhile;  ?>
			
			</div>
			
		</div>  
<?php get_sidebar('right'); ?>
<?php get_footer(); ?>