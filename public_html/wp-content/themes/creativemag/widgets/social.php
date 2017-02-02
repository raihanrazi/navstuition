<?php
 
class cwpSocial extends WP_Widget {
    function cwpSocial() {
        $widget_ops = array(
            'classname' => 'cwpSocial',
            'description' => 'Add a social box to your sidebar'
        );
        $this->WP_Widget('cwpSocial', 'Social box widget', $widget_ops);
    }
    function form($instance) {
        $instance = wp_parse_args((array) $instance, array(
                'fb' => '',
                'twt' => '',
                'gplus' => '',
                'title' => '' 
            )
        );
        $fb = esc_attr($instance['fb']);
        $twt = esc_attr($instance['twt']);
        $gplus = esc_attr($instance['gplus']); 
        $title = esc_attr($instance['title']); 
?> 
        <div id="<?php echo $this->get_field_id('fb'); ?>_div" style="display: block;">
            <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','creativeMag'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('fb'); ?>"><?php _e('Facebook page:','creativeMag'); ?> <input class="widefat" id="<?php echo $this->get_field_id('fb'); ?>" name="<?php echo $this->get_field_name('fb'); ?>" type="text" value="<?php echo $fb; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('twt'); ?>"><?php _e('Twitter username:','creativeMag'); ?> <input class="widefat" id="<?php echo $this->get_field_id('twt'); ?>" name="<?php echo $this->get_field_name('twt'); ?>" type="text" value="<?php echo $twt; ?>" /></label></p>          
            <p><label for="<?php echo $this->get_field_id('gplus'); ?>"><?php _e('Google+  page:','creativeMag'); ?> <input class="widefat" id="<?php echo $this->get_field_id('gplus'); ?>" name="<?php echo $this->get_field_name('gplus'); ?>" type="text" value="<?php echo $gplus; ?>" /></label></p>  
        </div>   
<?php
    }
    function update($new_instance, $old_instance) {
        return $new_instance;
    }
    function widget($args, $instance) {
        echo $this->generate($args, $instance);
    }
    function generate($args, $instance) {
        extract($args, EXTR_SKIP);
        $html = $before_widget;
        // Grab the settings from $instance and full them with default values if we can't find any
        $fb = empty($instance['fb']) ? 'http://www.facebook.com/codeinwp' : $instance['fb']; 
        $twt = empty($instance['twt']) ? 'codeinwp' : $instance['twt']; 
        $gplus = empty($instance['gplus']) ? 'http://codeinwp.com/' : $instance['gplus']; 
        $title = empty($instance['title']) ? '' : apply_filters('widget_title',$instance['title']);
 
        
            if (!empty($title)) {
                if(!isset($before_title)) {
                    $before_title = '';
                }
                if(!isset($after_title)) {
                    $after_title = '';
                }
                $html .= $before_title . trim($title) . $after_title;
            } 
		
        $html .= $after_widget; 
		$html .= '<div class="social-box">
					<div class="holder social-box"><div class="line fb-line">
			<div class="fb-like-box fb_iframe_widget" data-href="'.esc_attr($fb).'" data-width="292" data-show-faces="false" data-stream="false" data-header="false" fb-xfbml-state="rendered"><span style="height: 62px; width: 292px;"><iframe src="//www.facebook.com/plugins/likebox.php?href='.urlencode($fb).'&amp;width=292&amp;height=62&amp;colorscheme=light&amp;show_faces=false&amp;header=true&amp;stream=false&amp;show_border=false&amp;appId=106740626139347" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:292px; height:62px;" allowTransparency="true"></iframe></span></div>
						</div>
				<div class="line">
			<iframe allowtransparency="true" frameborder="0" scrolling="no" src="http://platform.twitter.com/widgets/follow_button.1363148939.html#_=1366054452195&amp;id=twitter-widget-0&amp;lang=en&amp;screen_name='.$twt.'&amp;show_count=true&amp;show_screen_name=true&amp;size=m" class="twitter-follow-button twitter-follow-button" style="width: 228px; height: 20px;" title="Twitter Follow Button" data-twttr-rendered="true"></iframe>
						</div>
						<div class="line">
			<div style="text-indent: 0px; margin: 0px; padding: 0px; background-color: transparent; border-style: none; float: none; line-height: normal; font-size: 1px; vertical-align: baseline; display: inline-block; width: 450px; height: 24px; background-position: initial initial; background-repeat: initial initial;" id="___plusone_0"><iframe frameborder="0" hspace="0" marginheight="0" marginwidth="0" scrolling="no" style="position: static; top: 0px; width: 450px; margin: 0px; border-style: none; left: 0px; visibility: visible; height: 24px;" tabindex="0" vspace="0" width="100%" id="I0_1366054452140" name="I0_1366054452140" src="https://plusone.google.com/_/+1/fastbutton?bsv&amp;annotation=inline&amp;hl=en-US&amp;url='.$gplus.'&amp;ic=1&amp;jsh=m%3B%2F_%2Fscs%2Fapps-static%2F_%2Fjs%2Fk%3Doz.gapi.en.bWxQSf2kQAs.O%2Fm%3D__features__%2Fam%3DQQ%2Frt%3Dj%2Fd%3D1%2Frs%3DAItRSTOS6nBCafq-raWF75KQ80Y4TivnGA#_methods=onPlusOne%2C_ready%2C_close%2C_open%2C_resizeMe%2C_renderstart%2Concircled&amp;id=I0_1366054452140&amp;rpctoken=36401221" allowtransparency="true" data-gapiattached="true" title="+1"></iframe></div>
						</div>
					<strong class="tw-icon"></strong>	
					</div>
					</div>';
		
        return $html;
    }
}
// Tell WordPress about our widget
add_action('widgets_init', create_function('', 'return register_widget(\'cwpSocial\');'));
 