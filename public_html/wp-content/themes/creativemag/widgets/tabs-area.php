<?php
 
 
class TabsAreaWidget extends WP_Widget
{
  function TabsAreaWidget()
  {
    $widget_ops = array('classname' => 'TabsAreaWidget', 'description' => 'Tabs area widget, Popular Posts, Recent Posts, Comments, Tags' );
    $this->WP_Widget('TabsAreaWidget', 'Tabs area widget', $widget_ops);
  }
 
  function form($instance)
  {
    $instance = wp_parse_args( (array) $instance, array( 'user' => '' ) );
    $user = $instance['user'];
?>
	<p>
		<label >Popular Posts, Recent Posts, Comments, Tags</label>
	</p>
	
<?php
  }
 
  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
    $instance['user'] = $new_instance['user'];
    return $instance;
  }
 
  function widget($args, $instance)
  {
    extract($args, EXTR_SKIP);
 
    echo $before_widget;
    $user = empty($instance['user']) ? ' ' : apply_filters('widget_user', $instance['user']);
 
//    if (!empty($user))
	echo'				<br class="clear">
						<div class="tabs-area">
							<div class="tabs-holder">
								<ul class="tabset">
									<li><a href="#" class="tab active"  id="tab1" onclick="menu1();return false">'.__("Popular",'creativeMag').'</a></li>
									<li><a href="#" class="tab" id="tab2"  onclick="menu2();return false">'.__("Recent",'creativeMag').'</a></li>
									<li><a href="#" class="tab" id="tab3" onclick="menu3();return false">'.__("Comments",'creativeMag').'</a></li>
									<li><a href="#" class="tab" id="tab4" onclick="menu4();return false">'.__("Tags",'creativeMag').'</a></li>
								</ul>
							</div>
                             
							
								<ul class="item-list" id="ul1" style="display:inline;">';                    
?>		 
		 
                                <?php
						 
						  $popular = new WP_Query('orderby=comment_count&posts_per_page=4'); ?>
						  <?php while ($popular->have_posts()) : $popular->the_post(); ?> 
					<li>
						<a href="<?php the_permalink(); ?>" class="item-post-recent" title="<?php the_title_attribute(); ?>">
						<?php if(has_post_thumbnail()) : ?>
							<?php 
								the_post_thumbnail(); ?>
						<?php else: ?>
								<?php cwp_default_thumbnail(); ?>
						<?php endif; ?>
						 </a>
						<p><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></p>
						<div class="info">
							<span class="comments"><?php comments_number('0','1','%'); ?></span>
							<span class="mark"></span>
						</div>
					</li> 
						  
						  <?php endwhile; 
							wp_reset_query();
						  ?>  
   
                                    
		 		
		<?php
        echo '</ul>  
							
                            
                            <!-- LATEST POSTS -->
							
		<ul class="item-list" id="ul2" style="display:none;">
		';
		
	
   	
		$nr_posts = 5;
	
   		$args = array( 'numberposts' => $nr_posts );
		$recent_posts = wp_get_recent_posts( $args );
		foreach( $recent_posts as $recent ){
			echo '<li>
				<a href="'.get_permalink($recent["ID"]).'" class="item-post-recent" title="'.esc_attr($recent["post_title"]).'">'; ?>
						<?php if(has_post_thumbnail($recent["ID"])) : ?>
							<?php 
								the_post_thumbnail($recent["ID"]); ?>
						<?php else: ?>
								<?php cwp_default_thumbnail(); ?>
						<?php endif;  
				echo '</a>
				<p><a href="'.get_permalink($recent["ID"]).'" title="'.esc_attr($recent["post_title"]).'">'.esc_attr($recent["post_title"]).'</a></p>
					<div class="info">
						<span class="comments">'.get_comments_number($recent["ID"]).'</span>
						<span class="mark"></span>
					</div>
			</li>';
		}
		
		echo '						</ul>
							
                            
                            <!-- COMMENTS -->
							
                            	<ul class="item-list" id="ul3" style="display:none;">
          ';  
 											 $comments = $all_comments=get_comments( array('status' => 'approve', 'number'=>'8') );    
											 foreach ($comments as $comment) { 
											   $postid = $comment->comment_post_ID;			   
							
											   $output .= '<li><strong>'. $comment->comment_author . ' said</strong> :<a href="'.get_permalink($postid).'">"' . substr( strip_tags($comment->comment_content) ,0 , 70) .'..."</a></li>';
											   }
											 
											 echo $output; 
											
									
            
			echo '                    </ul>
											
                            	<ul class="item-list" id="ul4" style="display:none;">
				  <div>
			';
			$tag_cloud=wp_tag_cloud('format=array');
			if(is_array($tag_cloud)) : 
			foreach($tag_cloud as $tags) :
			  echo $tags.', ';
			endforeach;				
			
			endif;					
             
				  echo '</div>';
			 echo '                   </ul>
							
							
						</div>';
  
   
    echo $after_widget;
  }
 
}
add_action( 'widgets_init', create_function('', 'return register_widget("TabsAreaWidget");') );?>