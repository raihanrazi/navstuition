<?php
	/*
		Template Name: Full Width Page
	*/
?>
<?php
	get_header(); 
?> 
    <div id="two-columns" class="full-width">
		<div id="content" role="main">
			<div class="post">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'content', 'page' ); ?>
			<?php   
				if ( comments_open() || '0' != get_comments_number() )
					 
					comments_template(); 	?>
		<?php endwhile;  ?>
			</div>
		</div>    
<?php get_footer(); ?>
