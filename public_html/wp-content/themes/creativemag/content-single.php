 
<article id="post-<?php the_ID(); ?>" <?php post_class('post-box'); ?>>
					<div class="holder">
	<header class="entry-header  heading ">
		
								<?php $cats = get_the_category(get_the_ID());
									 foreach($cats as $cat){
								?>
                            	<a href="<?php echo get_category_link( get_cat_ID($cat->cat_name) ); ?>" class="design"><?php echo strtoupper($cat->cat_name); ?></a>
								<?php } ?>
    
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
												the_content();
												
												wp_link_pages();
												?> 
                                                
											</div>
								</div> 
		 
	</div> 
	
                        <div class="clear"  ></div>
		</div>
		
	<footer class="entry-meta tags-a">
		    
                            <div class="name">
								<?php echo __( 'Tags', 'creativeMag' ) ; ?>:</div>
                            <div class="the-tags">
	
                            <?php the_tags( ' ', ', ', '' ); ?>
                            
                            </div>
                    
	</footer> 
                        <div class="clear" ></div>
			<section class="about">
                        	<p class="title">
								<?php echo __( 'About the author', 'creativeMag' ) ; ?>
								<span><?php  the_author_posts_link(); ?></span>
							</p>
                                <p class="description"> <?php the_author_meta( 'description'); ?>  </p>
                            	<p class="img">
                                    
                                        <?php echo get_avatar(get_the_author_meta("ID")); ?>
                                    
								</p>
							<div class="clear" ></div>
			</section>
			
                        <div class="clear" ></div>
			<section>
				<?php creativemag_related_posts(); ?>
			</section>
			           <div class="clear" ></div>
	
</article>  
