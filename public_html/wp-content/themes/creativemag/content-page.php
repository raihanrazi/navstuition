 
<article id="post-<?php the_ID(); ?>" <?php post_class('post-box'); ?>>
					<div class="holder">
	<header class="entry-header  heading ">
		
								 
    
	                            	<h2 class="title-post"><span><?php the_title(); ?></span></h2>
	
	 
	</header> 
	<div class="entry-content content">
		
	<div class="foot-info">
		<?php the_author_posts_link() ?></span> 
		<span class="link"><?php the_time('F jS, Y') ?></span>
		<a href="<?php echo get_permalink(get_the_ID()); ?> " class="comments"><?php comments_number() ?></a>
	</div>
	
								<div class="text-box-s">
											<div class="text-holder-s post-body">
											
											<?php
												if(has_post_thumbnail())
													the_post_thumbnail( );  
											?>
										
												 <?php 
												the_content();
												
												wp_link_pages();
												?> 
                                                
											</div>
								</div> 
		 
	</div> 
	
                        <div class="clear"  ></div>
		</div>
		 
                        <div class="clear" ></div>
			<section class="about">
                        	<p class="title">
								<?php echo __( 'About the author', 'creativeMag' ) ; ?>
								<span><?php  the_author_posts_link(); ?></span>
							</p>
                                <p class="description"> <?php the_author_meta( 'description'); ?>  </p>
                            	<p class="img">
                                    <a href="<?php echo get_the_author_link(); ?> ">
                                        <?php echo get_avatar(get_the_author_meta("ID")); ?>
                                    </a>
								</p>
							<div class="clear" ></div>
			</section>
			 
			 
			           <div class="clear" ></div>
	
</article>  
