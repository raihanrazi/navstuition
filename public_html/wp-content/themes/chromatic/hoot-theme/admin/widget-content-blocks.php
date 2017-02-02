<?php
/**
 * Content Blocks Widget
 *
 * @package chromaticfw
 * @subpackage chromatic
 * @since chromatic 1.0
 */

/**
* Class ChromaticFw_Content_Blocks_Widget
*/
class ChromaticFw_Content_Blocks_Widget extends ChromaticFw_WP_Widget {

	function __construct() {
		parent::__construct(

			//id
			'chromaticfw-content-blocks-widget',

			//name
			__( 'Hoot > Content Blocks', 'chromaticfw' ),

			//widget_options
			array(
				'description'	=> __('Display Styled Content Blocks.', 'chromaticfw'),
				'class'			=> 'chromaticfw-content-blocks-widget', // CSS class applied to frontend widget container via 'before_widget' arg
			),

			//control_options
			array(),

			//form_options
			//'name' => can be empty or false to hide the name
			array(
				array(
					'name'		=> __( 'Blocks Style', 'chromaticfw' ),
					'id'		=> 'style',
					'type'		=> 'images',
					'std'		=> 'style1',
					'options'	=> array(
						'style1'	=> trailingslashit( CHROMATICFW_THEMEURI ) . 'admin/images/content-block-style-1.png',
						'style2'	=> trailingslashit( CHROMATICFW_THEMEURI ) . 'admin/images/content-block-style-2.png',
						'style3'	=> trailingslashit( CHROMATICFW_THEMEURI ) . 'admin/images/content-block-style-3.png',
						'style4'	=> trailingslashit( CHROMATICFW_THEMEURI ) . 'admin/images/content-block-style-4.png',
					),
				),
				array(
					'name'		=> __( 'No. Of Columns', 'chromaticfw' ),
					'id'		=> 'columns',
					'type'		=> 'select',
					'std'		=> '3',
					'options'	=> array(
						'1'	=> __( '1', 'chromaticfw' ),
						'2'	=> __( '2', 'chromaticfw' ),
						'3'	=> __( '3', 'chromaticfw' ),
						'4'	=> __( '4', 'chromaticfw' ),
						'5'	=> __( '5', 'chromaticfw' ),
					),
				),
				array(
					'name'		=> __( 'Icon Style', 'chromaticfw' ),
					'desc'		=> __( "Not applicable if 'Featured Image' is seected below.", 'chromaticfw' ),
					'id'		=> 'icon_style',
					'type'		=> 'select',
					'std'		=> 'circle',
					'options'	=> array(
						'none'		=> __( 'None', 'chromaticfw' ),
						'circle'	=> __( 'Circle', 'chromaticfw' ),
						'square'	=> __( 'Square', 'chromaticfw' ),
					),
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
				array(
					'name'		=> __( "Use 'Featured Image' of page instead of icons.", 'chromaticfw' ),
					'id'		=> 'image',
					'type'		=> 'checkbox',
				),
				array(
					'name'		=> __( 'Content Boxes', 'chromaticfw' ),
					'id'		=> 'boxes',
					'type'		=> 'group',
					'options'	=> array(
						'item_name'	=> __( 'Content Box', 'chromaticfw' ),
					),
					'fields'	=> array(
						array(
							'name'		=> __('Icon', 'chromaticfw'),
							'desc'		=> __( "Not applicable if 'Featured Image' is selected above.", 'chromaticfw' ),
							'id'		=> 'icon',
							'type'		=> 'icon'),
						array(
							'name'		=> __( 'Page', 'chromaticfw' ),
							'id'		=> 'page',
							'type'		=> 'select',
							'options'	=> ChromaticFw_WP_Widget::get_wp_list('page'),
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
		include( chromaticfw_locate_widget( 'content-blocks' ) ); // Loads the widget/content-blocks or template-parts/widget-content-blocks.php template.
	}

}

/**
 * Register Widget
 */
function chromaticfw_content_blocks_widget_register(){
	register_widget('ChromaticFw_Content_Blocks_Widget');
}
add_action('widgets_init', 'chromaticfw_content_blocks_widget_register');