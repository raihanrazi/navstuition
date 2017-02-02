<?php
	get_header(); 
?>
	 <div id="two-columns">
		<div id="content" role="main">	 
			<?php get_template_part( 'no-results', 'index' ); ?>
			<div class="clear"></div>	
		</div>  
	<?php get_sidebar('right'); ?>
<?php get_footer(); ?>
 