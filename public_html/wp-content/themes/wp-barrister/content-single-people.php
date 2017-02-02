	<div id="wpb-banner" class="clearfix">
        <h1 class="entry-title"><?php the_title(); ?></h1>
        <div class="wpb-content">
        <?php 
      $job_title = get_post_meta( $post->ID, 'job_title', true ); 
    ?>
    <?php if ( ! empty($job_title) ) : ?>
        <div class="people-job"><?php echo $job_title; ?></div>
    <?php endif; ?>
        </div>
    </div>
        
    <article id="post-<?php the_ID(); ?>" <?php post_class('people-post'); ?>>
    
     <div class="people-info-left col300">
	<?php if ( has_post_thumbnail()) : ?>
        <div class="peoplethumb"><?php the_post_thumbnail( array(640, 480) ); ?></div>
        <?php else : ?>
        <?php
        $postimgs =& get_children( array( 'post_parent' => $post->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order', 'order' => 'ASC' ) );
        if ( !empty($postimgs) ) {
            $firstimg = array_shift( $postimgs );
            $th_image = wp_get_attachment_image( $firstimg->ID, array(640, 480), false );
         ?>
            <div class="peoplethumb"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php echo $th_image; ?></a></div>
        <?php } else { ?>
			<div class="peoplethumb"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/library/images/profile-default.png" alt="" /></a></div>
		<?php } ?>
    <?php endif; ?>
    
    <?php 
			  $linkedin = get_post_meta( $post->ID, 'linkedin', true );
			  $twitter = get_post_meta( $post->ID, 'twitter', true );
			  $facebook = get_post_meta( $post->ID, 'facebook', true );
			  $googleplus = get_post_meta( $post->ID, 'googleplus', true );
			  $mailto = get_post_meta( $post->ID, 'email', true );
			  $avvo = get_post_meta( $post->ID, 'avvo', true );
			?>
            
            <div id="social-media" class="people-social clearfix">
				<?php if ( ! empty($linkedin) ) : ?>
                <a href="<?php echo esc_url($linkedin); ?>" class="social-li"><?php _e('LinkedIn', 'wp-barrister') ?></a>
                <?php endif; ?>
                
                <?php if ( ! empty($twitter) ) : ?>
                <a href="<?php echo esc_url($twitter); ?>" class="social-tw"><?php _e('Twitter', 'wp-barrister') ?></a>
                <?php endif; ?>
                
                <?php if ( ! empty($facebook) ) : ?>
                <a href="<?php echo esc_url($facebook); ?>" class="social-fb"><?php _e('Facebook', 'wp-barrister') ?></a>
                <?php endif; ?>
                
                <?php if ( ! empty($googleplus) ) : ?>
                <a href="<?php echo esc_url($googleplus); ?>" class="social-gp"><?php _e('Google+', 'wp-barrister') ?></a>
                <?php endif; ?>
                
                <?php if ( ! empty($avvo) ) : ?>
                <a href="<?php echo esc_url($avvo); ?>" class="social-av"><?php _e('Avvo', 'wp-barrister') ?></a>
                <?php endif; ?>
                
                <?php if ( ! empty($mailto) ) : ?>
                <a href="<?php _e('mailto:', 'wp-barrister'); echo sanitize_email($mailto); ?>" class="social-em"><?php _e('Mailto', 'wp-barrister') ?></a>
                <?php endif; ?>
            </div>

	</div>

    
    <div class="people-info-right col620">
        
        <?php 
		  $phone = get_post_meta( $post->ID, 'phone_number', true );
		  $email = get_post_meta( $post->ID, 'email', true ); 
		?>
        
        <?php if ( ! empty($phone) ) : ?>
        	<div class="people-phone"><?php echo wp_kses_post($phone); ?></div>
        <?php endif; ?>
        
        <?php if ( ! empty($email) ) : ?>
        	<div class="people-email"><?php echo sanitize_email($email); ?></div>
        <?php endif; ?>
        
        <?php if ( ! empty($phone) || ! empty($email) ) : ?>
        	<div class="people-divider"></div>
        <?php endif; ?>
                
        <div class="entry-content post-content">
			<?php the_content(); ?>
            <?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'wp-barrister' ), 'after' => '</div>' ) ); ?>
            
        </div><!-- .entry-content -->
        
     </div>
        
    
	<div class="clearfix"></div>
        
    </article><!-- #post-<?php the_ID(); ?> -->



