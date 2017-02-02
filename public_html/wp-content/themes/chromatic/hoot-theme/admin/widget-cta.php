<?php
/**
 * Call To Action Widget
 *
 * @package chromaticfw
 * @subpackage chromatic
 * @since chromatic 1.0
 */

/**
* Class ChromaticFw_CTA_Widget
*/
class ChromaticFw_CTA_Widget extends ChromaticFw_WP_Widget {

	function __construct() {
		parent::__construct(

			//id
			'chromaticfw-cta-widget',

			//name
			__( 'Hoot > Call To Action', 'chromaticfw' ),

			//widget_options
			array(
				'description'	=> __('Display Call To Action block.', 'chromaticfw'),
				'class'			=> 'chromaticfw-cta-widget', // CSS class applied to frontend widget container via 'before_widget' arg
			),

			//control_options
			array(),

			//form_options
			//'name' => can be empty or false to hide the name
			array(
				array(
					'name'		=> __( 'Headline', 'chromaticfw' ),
					'id'		=> 'headline',
					'type'		=> 'text',
				),
				array(
					'name'		=> __( 'Description', 'chromaticfw' ),
					'id'		=> 'description',
					'type'		=> 'textarea',
				),
				array(
					'name'		=> __( 'Button Text', 'chromaticfw' ),
					'desc'		=> __( 'Leave empty if you dont want to show button', 'chromaticfw' ),
					'id'		=> 'button_text',
					'type'		=> 'text',
					'std'		=> __( '-- LEARN MORE --', 'chromaticfw' ),
				),
				array(
					'name'		=> __( 'URL', 'chromaticfw' ),
					'desc'		=> __( 'Leave empty if you dont want to show button', 'chromaticfw' ),
					'id'		=> 'url',
					'type'		=> 'text',
				),
				array(
					'name'		=> __( 'Border', 'chromaticfw' ),
					'desc'		=> __( 'Top and bottom borders.', 'chromaticfw' ),
					'id'		=> 'border',
					'type'		=> 'select',
					'std'		=> 'none none',
					'options'	=> array(
						'line line'	=> __( 'Top - Line || Bottom - Line', 'chromaticfw' ),
						'line shadow'	=> __( 'Top - Line || Bottom - Shadow', 'chromaticfw' ),
						'line none'	=> __( 'Top - Line || Bottom - None', 'chromaticfw' ),
						'shadow line'	=> __( 'Top - Shadow || Bottom - Line', 'chromaticfw' ),
						'shadow shadow'	=> __( 'Top - Shadow || Bottom - Shadow', 'chromaticfw' ),
						'shadow none'	=> __( 'Top - Shadow || Bottom - None', 'chromaticfw' ),
						'none line'	=> __( 'Top - None || Bottom - Line', 'chromaticfw' ),
						'none shadow'	=> __( 'Top - None || Bottom - Shadow', 'chromaticfw' ),
						'none none'	=> __( 'Top - None || Bottom - None', 'chromaticfw' ),
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
		include( chromaticfw_locate_widget( 'cta' ) ); // Loads the widget/cta or template-parts/widget-cta.php template.
	}

}

/**
 * Register Widget
 */
function chromaticfw_cta_widget_register(){
	register_widget('ChromaticFw_CTA_Widget');
}
add_action('widgets_init', 'chromaticfw_cta_widget_register');