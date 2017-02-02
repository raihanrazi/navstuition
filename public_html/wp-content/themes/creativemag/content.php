 
<article id="post-<?php the_ID(); ?>" <?php post_class(array('test')); ?>>
 
					<div class="holder">
						<header class="entry-header heading"> 
							<em class="date"><?php the_time('M') ?><br/><strong><?php the_time('j') ?></strong><br/><?php the_time('Y') ?></em><div class="overflow-data">
								<?php $cats = get_the_category(get_the_ID());
									 foreach($cats as $cat){
								?>
								<a href="<?php echo get_category_link( get_cat_ID($cat->cat_name) ); ?>" class="design"><?php echo strtoupper($cat->cat_name); ?></a>
								<?php }  ?>
                                	<h2><a href="<?php echo get_permalink(get_the_ID()); ?>"><?php the_title(); ?></a></h2>
								</div>
						</header> 
                        <div class="content">
								<div class="photo">
									<div class="photo-holder">
										<a href="<?php the_permalink() ?>">
											
											<?php
												if(has_post_thumbnail())
													the_post_thumbnail('listing-thumb'); 
												else
													cwp_default_thumbnail();
											?>
										
										</a>
									</div>
								</div>
                                <div class="text-box">
											<div class="text-holder">
												<?php echo creativemag_excerpt(250); ?>                                                
											</div>
 
											<div class="foot-info-hp">
												<span class="link-l author-link"><?php the_author_posts_link() ?></span>
												<a href="<?php echo get_permalink(get_the_ID()); ?> " class="comments-l"><?php comments_number() ?></a>
												<a id="more"  href="<?php echo get_permalink(get_the_ID()); ?>"><?php  echo __( 'Continue reading', 'creativeMag' );  ?></a>
											</div>
								</div>
                        </div>
                     </div> 
				<div class="clear"></div>
 </article>
