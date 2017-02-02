<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package CreativeMag
 */
get_header(); ?>
<div id="main">
	<div id="two-columns">
		<div id="content" role="main">
			<div class="page-heading">
				 
				<?php
                            $searchquery = trim( get_search_query() );
                            if ( !empty($searchquery) ) {
									echo '<h2>';
									_e('SEARCH RESULTS ','creativeMag');
									echo '"<span>'.get_search_query().'</span>"';
									echo '</h2>';
                                  
                            } else {
								echo "<h2>";
								_e("Oops - you didn't specify a search term",'creativeMag');
                                echo "</h2>";
                                $searchquery = trim( get_search_query() ); 
								echo "<p>";
								_e("Please try searching again by entering one or two words on the subject that you are trying to find more information on.",'creativeMag');
								echo "</p>";
                            } ?>
				
				
			</div>
		
            <div class="post">
				<div class="post-box">
							<div class="holder">
								<?php if ( have_posts() ) : ?>
							
					
						
									<?php while ( have_posts() ) : the_post(); ?>
										
								 
										<?php get_template_part( 'content', 'search' ); ?>
									<?php endwhile; 
										
											creativemag_content_nav( 'nav-below' );
									
									?>
									 
									<?php else : ?>
									<?php
										echo '<h2>';
										_e("Nothing Found","creativeMag");
										echo '</h2>';
										echo '<p>';
										_e("Sorry, but nothing matched your search criteria. Please try again with some different keywords.","creativeMag");
										echo '</p>';
									?>
							
									<?php endif; ?>
							</div> <!-- holder div -->
							<br class="clear">
						</div> <!-- post-box div -->
				<div class="post-box-bottom"></div>
			</div> 
		 </div>  
       
<?php get_sidebar('right'); ?>
<?php get_footer(); ?>