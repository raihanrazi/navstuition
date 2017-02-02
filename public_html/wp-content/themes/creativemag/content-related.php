 <div class="related-post-box">
	<div class="related-post-img">
		<a href="<?php the_permalink(); ?>">
											<?php
												if(has_post_thumbnail())
													the_post_thumbnail('listing-thumb'); 
												else
													cwp_default_thumbnail();
											?>
										</a></div>  
			<div class="related-post-title">
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
			</div> 
		<div class="related-post-comments">
			<p class="comments"> 
				<?php echo comments_number(); ?>
			</p>
		</div> 									
</div>