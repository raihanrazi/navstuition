<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package cw-magazine
 */
get_header(); ?>
	<section id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
		<?php if ( have_posts() ) : ?>
			<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'cw-magazine' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'search' ); ?>
			<?php endwhile; ?>
			        <div class="navigation">
						<?php if (function_exists("pagination")) {
    						pagination();
						}else{ 
                        	cwp_content_nav( 'nav-below' ); 
						} ?>
					</div> <!-- end navigation --> 
		<?php else : ?>
			<?php get_template_part( 'no-results', 'search' ); ?>
		<?php endif; ?>
		</div><!-- #content -->
	</section><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>