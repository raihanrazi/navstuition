<?php
/**
 * Social Icons Widget
 *
 * @package chromaticfw
 * @subpackage chromatic
 * @since chromatic 1.0
 */

/**
* Class ChromaticFw_Social_Icons_Widget
*/
class ChromaticFw_Social_Icons_Widget extends ChromaticFw_WP_Widget {

	function __construct() {
		parent::__construct(

			//id
			'chromaticfw-social-icons-widget',

			//name
			__( 'Hoot > Social Icons', 'chromaticfw' ),

			//widget_options
			array(
				'description'	=> __('Display Social Icons', 'chromaticfw'),
				'class'			=> 'chromaticfw-social-icons-widget', // CSS class applied to frontend widget container via 'before_widget' arg
			),

			//control_options
			array(),

			//form_options
			//'name' => can be empty or false to hide the name
			array(
				array(
					'name'		=> __( 'Icon Size', 'chromaticfw' ),
					'id'		=> 'size',
					'type'		=> 'select',
					'std'		=> 'medium',
					'options'	=> array(
						'small'		=> __( 'Small', 'chromaticfw' ),
						'medium'	=> __( 'Medium', 'chromaticfw' ),
						'large'		=> __( 'Large', 'chromaticfw' ),
						'huge'		=> __( 'Huge', 'chromaticfw' ),
					),
				),
				array(
					'name'		=> __( 'Social Icons', 'chromaticfw' ),
					'id'		=> 'icons',
					'type'		=> 'group',
					'options'	=> array(
						'item_name'	=> __( 'Icon', 'chromaticfw' ),
					),
					'fields'	=> array(
						array(
							'name'		=> __( 'Social Icon', 'chromaticfw' ),
							'id'		=> 'icon',
							'type'		=> 'select',
							'options'	=> array(
								'fa-behance'	=> __( 'Behance', 'chromaticfw' ),
								'fa-bitbucket'	=> __( 'Bitbucket', 'chromaticfw' ),
								'fa-btc'		=> __( 'BTC', 'chromaticfw' ),
								'fa-codepen'	=> __( 'Codepen', 'chromaticfw' ),
								'fa-delicious'	=> __( 'Delicious', 'chromaticfw' ),
								'fa-deviantart'	=> __( 'Deviantart', 'chromaticfw' ),
								'fa-digg'		=> __( 'Digg', 'chromaticfw' ),
								'fa-dribbble'	=> __( 'Dribbble', 'chromaticfw' ),
								'fa-dropbox'	=> __( 'Dropbox', 'chromaticfw' ),
								'fa-envelope'	=> __( 'Email', 'chromaticfw' ),
								'fa-facebook'	=> __( 'Facebook', 'chromaticfw' ),
								'fa-flickr'		=> __( 'Flickr', 'chromaticfw' ),
								'fa-foursquare'	=> __( 'Foursquare', 'chromaticfw' ),
								'fa-github'		=> __( 'Github', 'chromaticfw' ),
								'fa-google-plus'=> __( 'Google Plus', 'chromaticfw' ),
								'fa-instagram'	=> __( 'Instagram', 'chromaticfw' ),
								'fa-lastfm'		=> __( 'Last FM', 'chromaticfw' ),
								'fa-linkedin'	=> __( 'Linkedin', 'chromaticfw' ),
								'fa-pinterest'	=> __( 'Pinterest', 'chromaticfw' ),
								'fa-reddit'		=> __( 'Reddit', 'chromaticfw' ),
								'fa-rss'		=> __( 'RSS', 'chromaticfw' ),
								'fa-skype'		=> __( 'Skype', 'chromaticfw' ),
								'fa-slack'		=> __( 'Slack', 'chromaticfw' ),
								'fa-slideshare'	=> __( 'Slideshare', 'chromaticfw' ),
								'fa-soundcloud'	=> __( 'Soundcloud', 'chromaticfw' ),
								'fa-stack-exchange'	=> __( 'Stack Exchange', 'chromaticfw' ),
								'fa-stack-overflow'	=> __( 'Stack Overflow', 'chromaticfw' ),
								'fa-steam'		=> __( 'Steam', 'chromaticfw' ),
								'fa-stumbleupon'=> __( 'Stumbleupon', 'chromaticfw' ),
								'fa-tumblr'		=> __( 'Tumblr', 'chromaticfw' ),
								'fa-twitch'		=> __( 'Twitch', 'chromaticfw' ),
								'fa-twitter'	=> __( 'Twitter', 'chromaticfw' ),
								'fa-vimeo-square'=> __( 'Vimeo', 'chromaticfw' ),
								'fa-wordpress'	=> __( 'Wordpress', 'chromaticfw' ),
								'fa-yelp'		=> __( 'Yelp', 'chromaticfw' ),
								'fa-youtube'	=> __( 'Youtube', 'chromaticfw' ),
							),
						),
						array(
							'name'		=> __( 'URL', 'chromaticfw' ),
							'id'		=> 'url',
							'type'		=> 'text',
						),
					),
				),
			)
		);
	}

	/**
	 * Echo the widget content
	 */
	function display_widget( $instance, $before_title = '', $title='', $after_title = '' ) {
		extract( $instance, EXTR_SKIP );
		include( chromaticfw_locate_widget( 'social-icons' ) ); // Loads the widget/social-icons or template-parts/widget-social-icons.php template.
	}

}

/**
 * Register Widget
 */
function chromaticfw_social_icons_widget_register(){
	register_widget('ChromaticFw_Social_Icons_Widget');
}
add_action('widgets_init', 'chromaticfw_social_icons_widget_register');