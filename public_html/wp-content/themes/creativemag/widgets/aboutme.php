<?php 
class cwpAbout extends WP_Widget {
    function cwpAbout() {
        $widget_ops = array(
            'classname' => 'cwpAbout',
            'description' => 'Add an "About Me" box to the sidebar'
        );
        $this->WP_Widget('cwpAbout', 'About me box', $widget_ops);
    }
    function form($instance) {
        $instance = wp_parse_args((array) $instance, array(
                'title' => '',
                'name' => '',
                'photo' => '',
                'quote' => '',
                'description' => '' 
            )
        );
        $title = esc_attr($instance['title']);
        $name = esc_attr($instance['name']);
        $photo = esc_attr($instance['photo']); 
        $quote = esc_attr($instance['quote']);
        $description = esc_attr($instance['description']); 
?> 
        <div id="<?php echo $this->get_field_id('fb'); ?>_div" style="display: block;">
            <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','creativeMag'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('name'); ?>"><?php _e('Your name:','creativeMag'); ?> <input class="widefat" id="<?php echo $this->get_field_id('name'); ?>" name="<?php echo $this->get_field_name('name'); ?>" type="text" value="<?php echo $name; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('photo'); ?>"><?php _e('Your photo url:','creativeMag'); ?> <input class="widefat" id="<?php echo $this->get_field_id('photo'); ?>" name="<?php echo $this->get_field_name('photo'); ?>" type="text" value="<?php echo $photo; ?>" /></label></p>          
            <p><label for="<?php echo $this->get_field_id('description'); ?>"><?php _e('your description:','creativeMag'); ?> <input class="widefat" id="<?php echo $this->get_field_id('description'); ?>" name="<?php echo $this->get_field_name('description'); ?>" type="text" value="<?php echo $description; ?>" /></label></p>  
            <p><label for="<?php echo $this->get_field_id('quote'); ?>"><?php _e('Testimonial:','creativeMag'); ?> <input class="widefat" id="<?php echo $this->get_field_id('quote'); ?>" name="<?php echo $this->get_field_name('quote'); ?>" type="text" value="<?php echo $quote; ?>" /></label></p>  
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
        $name = empty($instance['name']) ? 'Ionut Neagu' : $instance['name']; 
        $description = empty($instance['description']) ? 'My name is Ionut Neagu. I am the CEO of codeinWP.com, and I will personally verify that each project is done in time and that you will be happy with our work (as were the last 100+ clients). ' : $instance['description']; 
        $quote = empty($instance['quote']) ? 'Ionut and his team are wonderful people. They keep working until their client is 100% satisfied' : $instance['quote']; 
        $photo = empty($instance['photo']) ? 'http://creativemag.codeinwp.com/wp-content/uploads/2013/04/coverprofile3.jpg' :   $instance['photo'] ;
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
		$html .= '<div class="sub-box">
			<div class="content">
				<div class="photo-box">
					<div class="holder">
						<a  ><img src="'.$photo.'" alt="image description" width="90" height="90"></a>
									</div>
								</div>
								<div class="text-box">
									<h2 class="text-alex-roman"><a  >'.$name.'</a></h2>
									<p>'.$description.'</p>
								</div>
							</div>
							<div class="info">
								<div class="blockquote">
									<blockquote cite="#">
										<q>'.$quote.'<span class="quote"></span></q>
									</blockquote>
								</div>
								
							</div>
			</div>';
		
        return $html;
    }
}
// Tell WordPress about our widget
add_action('widgets_init', create_function('', 'return register_widget(\'cwpAbout\');'));
 