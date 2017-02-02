<?php

        $direct_path =  get_bloginfo('wpurl')."/wp-content/plugins/wp-content-slideshow-reborn";
        $c_slideshow_class = c_slideshow_get_dynamic_class();

?>
<style>

#content-slideshow {
width: <?php $width = get_option('content_width'); if(!empty($width)) {echo $width;} else {echo "960";}?>px;
padding:0px !important;
background-color: #<?php $bg = get_option('content_bg'); if(!empty($bg)) {echo $bg;} else {echo "FFF";}?>;
height: <?php $height = get_option('content_height'); if(!empty($height)) {echo $height;} else {echo "310";}?>px;
overflow:hidden;
border: 9px solid #CCC;
position: relative;
margin-bottom: 30px;
}

#content-slideshow ul {
background:transparent !important;
margin: 0 !important;
border: none !important;
padding: 0 !important;
list-style-type: none !important;
position: relative;
}           

#content-slideshow .content_slideshow ul {
float:left;
overflow: hidden;
width: 600px;
margin: 0px !important;
padding: 0px !important;
height: 300px;
position: relative;
}

#content-slideshow .content_slideshow ul li {
display:none;
width: 578px !important;
height: 278px !important;
display:block;
position:relative;
top: 0px !important;
left: 0px !important;
float: left;
margin: 0px !important;
padding: 10px !important;
z-index:1;
border:solid 1px transparent;
}

#content-slideshow .content_slideshow ul li img {
border: none !important;
float: left;
width: <?php $img_width = get_option('content_img_width'); if(!empty($img_width)) {echo $img_width;} else {echo "300";}?>px;
position: absolute;
height: <?php $height = get_option('content_height'); if(!empty($height)) {echo $height;} else {echo "300";}?>px;
}

#content-slideshow .content_slideshow ul li .span6 img {
	width: 40px;
	height: 40px;
	float: left;
}
#content-slideshow  ul.slideshow-nav {
height:<?php $height = get_option('content_height'); if(!empty($height)) {echo $height;} else {echo "250";}?>px;
width:<?php $content_nav_width = get_option('content_nav_width'); if(!empty($content_nav_width)) {echo $content_nav_width;} else {echo "270";}?>px;
margin:0;
padding: 0;
float:right;
overflow:hidden;
}

#content-slideshow .slideshow-nav li {
display:block;
margin:0;
padding:0;
list-style-type:none;
display:block;
}

.slideme {
font-size: 9px;
float: right;
}

.slideme a {
font-size: 8px;
text-decoration: none;
color: #CCC;
}

#content-slideshow .slideshow-nav li {
width: <?php $content_nav_width = get_option('content_nav_width'); if(!empty($content_nav_width)) {echo $content_nav_width;} else {echo "270";}?>px;
display:block;
margin:0px !important;
float: left;
padding: 0px !important;
}

#content-slideshow .slideshow-nav li a {
width: <?php $content_nav_width = get_option('content_nav_width'); if(!empty($content_nav_width)) {echo $content_nav_width;} else {echo "270";}?>px;
display:block;
margin:0;
padding:9px;
list-style-type:none;
display:block;
height:<?php $content_nav_height = get_option('content_nav_height'); if(!empty($content_nav_height)) {echo $content_nav_height;} else {echo "62";}?>px;
color:#<?php $content_nav_color = get_option('content_nav_color'); if(!empty($content_nav_color)) {echo $content_nav_color;} else {echo "333";}?>;
overflow:hidden;
background-color: #<?php $content_nav_bg = get_option('content_nav_bg'); if(!empty($content_nav_bg)) {echo $content_nav_bg;} else {echo "EEE";}?>;
font-size: 14px;
font-weight: bold;
border-bottom: 1px solid #CCC;
line-height:1.35em;
}

#content-slideshow .slideshow-nav li p {
float: left;
font-size: 12px;
font-weight: normal;
padding-top: 1px;
}

#content-slideshow .slideshow-nav li.on a {
background-color: #<?php $nav_bg_active_color = get_option('content_nav_active_bg'); if(!empty($nav_bg_active_color)) {echo $nav_bg_active_color;} else {echo "CCC";}?>;
color:#fff;
}

#content-slideshow .slideshow-nav li a:hover,
#content-slideshow .slideshow-nav li a:active {
color:#<?php $nav_color = get_option('content_nav_active_color'); if(!empty($nav_color)) {echo $nav_color;} else {echo "FFF";}?>;
background-color: #<?php $nav_bg_active_color = get_option('content_nav_active_bg'); if(!empty($nav_bg_active_color)) {echo $nav_bg_active_color;} else {echo "CCC";}?>;
}

.<?php echo $c_slideshow_class;?> {
font-size: 10px;
float: right;
clear: both;
position: relative;
top: -2px;
background-color: #CCC;
padding: 3px 3px;
line-height: 10px !important;
}

</style>


	<div id="content-slideshow">

		<div class="content_slideshow">

			<ul>

			<?php
                        
                        $counting = 1;
                        
                        $sort = get_option('content_sort'); if(empty($sort)){$sort = "post_date";}
                        $order = get_option('content_order'); if(empty($order)){$order = "DESC";}
                        
                        global $wpdb;
                
                        global $post;
                        
                        $args = array( 'meta_key' => 'content_slider', 'meta_value'=> '1', 'suppress_filters' => 0, 'post_type' => array('post', 'page'), 'orderby' => $sort, 'order' => $order);
                        
                        $myposts = get_posts( $args );
                        
                        foreach( $myposts as $post ) :	setup_postdata($post);
                                				
				$custom = get_post_custom($post->ID);
				
				$thumb = get_generated_thumb("content_slider");
				
				$author = get_the_author("content_slider");

				$authorimg = get_avatar("content_slider");

			?>

				<li id="main-post-<?php echo $counting;?>" onclick="location.href='<?php the_permalink(); ?>';" title="<?php _e("Permanent Link to"); ?> <?php the_title(); ?>">
					<img src="<?php echo $thumb;?>" style="width: 280px; height: 280px; float: left; border:20px solid transparent;" />
					<div class="mypostcontent" style="float: right; width: 300px; height: 300px;">
						<a href="#main-post-<?php echo $counting; ?>" title="<?php the_title(); ?>" style="margin-bottom: 40px;">
							<h1 style="float: left; margin-left: 20px; font-size:25px; margin-top: 20px;"><?php echo cut_content_feat(get_the_title(), 35, ""); ?></h1><br />
							<?php $excerpt = get_the_excerpt();?>
							<p style="float: left; margin-left: 20px; margin-top: 20px;"><?php echo cut_content_feat($excerpt, 48, "..."); ?> </p> 
						</a>
						<div style="width: 300px; height: 100px; margin-top: 40px;">
							<div class="span6" style="width: 40px; height: 40px; float: left; margin-top: 20px;">
			                	<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'twentytwelve_author_bio_avatar_size', 62 ) ); ?>
			                </div>
			            	<div class="span6" style="float: left; width:60px; margin-top: 20px; margin-left: 10px; ">
								<?php the_author_posts_link(); ?>
								<div style="margin-top:2px;">
								
									<?php $author_id = get_the_author_meta( 'ID' ); 
									$author_fb = get_field('facebook_code', 'user_'. $author_id );
									$author_twitter = get_field('twitter_code', 'user_'. $author_id );
									
									?>
									
									<?php echo $author_fb; ?>
									<?php echo $author_twitter; ?>
									
								</div>
			                </div>
						</div>
					</div>
				</li>

			<?php
			
			$counting = $counting + 1;
			
			endforeach; ?>

			</ul>

		</div>

		<ul class="slideshow-nav">

			<?php
                        
			global $wpdb;
			
			$counting = 1;
			
			global $post;
                        
                        $args = array( 'meta_key' => 'content_slider', 'meta_value'=> '1', 'suppress_filters' => 0, 'post_type' => array('post', 'page'), 'orderby' => $sort, 'order' => $order);
                        
                        $myposts = get_posts( $args );
                        
                        foreach( $myposts as $post ) :	setup_postdata($post);
                                				
				$custom = get_post_custom($post->ID);

				$thumb = get_generated_thumb("content_slider");
                                
                        ?>

			<?php if ( $counting == 1 ) { ?>
				<li class="on clearfix" id="post-<?php echo $counting; ?>" style="width:300px; margin-left: -50px">
					<a href="#main-post-<?php echo $counting; ?>" title="<?php the_title(); ?>">
						<img src="<?php echo $thumb;?>" style="margin: 0;width: 82px; height: 82px; float: left;" />
						<div style="float: left; width:180px; margin-left: 10px;">
							<?php echo cut_content_feat(get_the_title(), 35, ""); ?><br />
							<?php $excerpt = get_the_excerpt();?>
							<p><?php echo cut_content_feat($excerpt, 48, "..."); ?> </p>
						</div> 
					</a>
				</li>
			<?php } else { ?>
				<li id="post-<?php echo $counting; ?>" class="clearfix" style="width:300px; margin-left: -50px">
					<a href="#main-post-<?php echo $counting; ?>" title="<?php the_title(); ?>">
						<img src="<?php echo $thumb;?>" style="margin: 0;width: 82px; height: 82px; float: left;" />
						<div style="float: left; width:180px; margin-left: 10px;">
							<?php echo cut_content_feat(get_the_title(), 35, ""); ?><br />
							<?php $excerpt = get_the_excerpt();?>
							<p><?php echo cut_content_feat($excerpt, 48, "..."); ?> </p>
						</div>
					</a>
				</li>
			<?php } ?>

			<?php
			
			$counting = $counting + 1;
			
			endforeach; ?>

		</ul>

	</div>
        
