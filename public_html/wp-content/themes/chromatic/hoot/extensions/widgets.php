<?php
/**
 * Functions for registering and setting theme widgets. This file loads an abstract class to help
 * build widgets, and loads individual widget classes for building widgets into the backend and
 * loading their template for displaying in frontend
 *
 * 'init' hook is too late to load widgets since 'widgets_init' is used to initialize widgets.
 * Since this file is hooked at 'after_setup_theme' (priority 14), we can safely load widgets here.
 *
 * @package chromaticfw
 * @subpackage framework
 * @since chromaticfw 1.0.0
 */

/**
 * Loads all available widgets for the theme. Since these are extended classes of 'ChromaticFw_WP_Widget', hence
 * this function should only be called 'ChromaticFw_WP_Widget' class has been defined.
 *
 * @since 1.0.0
 * @access public
 */
function chromaticfw_load_widgets() {

	/* Loads all available widgets for the theme. */
	foreach ( glob( trailingslashit( CHROMATICFW_THEMEDIR ) . "admin/widget-*.php" ) as $filename ) {
		include_once( $filename );
	}

}

/**
 * Load widget stylesheets and scripts for the backend.
 *
 * @since  1.1
 * @access public
 */
if ( is_admin() ) {
	function chromaticfw_enqueue_admin_widget_styles_scripts( $hook ) {

		if ( 'widgets.php' == $hook ):
			/* Get the minified suffix */
			$suffix = chromaticfw_get_min_suffix();
			/* Enqueue Styles */
			wp_enqueue_style( 'chromaticfw-font-awesome' );
			wp_enqueue_style( 'chromaticfw-admin-widgets', trailingslashit( CHROMATICFW_CSS ) . "admin-widgets{$suffix}.css", array(),  CHROMATICFW_VERSION );
			/* Enqueue Scripts */
			wp_enqueue_script( 'chromaticfw-admin-widgets', trailingslashit( CHROMATICFW_JS ) . "admin-widgets{$suffix}.js", array( 'jquery' ), CHROMATICFW_VERSION, true ); // Load in footer to maintain script heirarchy
		endif;

	}
	add_action( 'admin_enqueue_scripts', 'chromaticfw_enqueue_admin_widget_styles_scripts' );
}

/**
 * Abstract Widgets Class for creating and displaying widgets. This file is only loaded if the theme supports
 * the 'chromaticfw-core-widgets' feature.
 * 
 * @credit() Derived from Vantage theme code by Greg Priday http://SiteOrigin.com
 *           Licensed under GPL
 * 
 * @since 1.0.0
 * @access public
 */
abstract class ChromaticFw_WP_Widget extends WP_Widget {

	protected $form_options;
	protected $repeater_html;

	/**
	 * Register the widget and load the Widget options
	 * 
	 * @since 1.0.0
	 */
	function __construct( $id, $name, $widget_options = array(), $control_options = array(), $form_options = array() ) {
		$this->form_options = $form_options;
		parent::WP_Widget( $id, $name, $widget_options, $control_options );

		$this->initialize();
	}

	/**
	 * Initialize this widget in whatever way we need to. Runs before rendering widget or form.
	 *
	 * @since 1.0.0
	 */
	function initialize(){ }

	/**
	 * Display the widget.
	 *
	 * @since 1.0.0
	 * @param array $args
	 * @param array $instance
	 */
	function widget( $args, $instance ) {
		$args = wp_parse_args( $args, array(
			'before_widget' => '',
			'after_widget' => '',
			'before_title' => '',
			'after_title' => '',
		) );

		$defaults = array();
		foreach( $this->form_options as $option ) {
			if ( isset( $option['id'] ) ) {
				$defaults[ $option['id'] ] = ( isset( $option['std'] ) ) ? $option['std'] : '';
			}
		}
		$instance = wp_parse_args( $instance, $defaults );

		echo $args['before_widget'];
			$title = ( !empty( $instance['title'] ) ) ? apply_filters( 'widget_title', $instance['title'] ) : '';
			$this->display_widget( $instance, $args['before_title'], $title, $args['after_title'] );
		echo $args['after_widget'];
	}

	/**
	 * Echo the widget content
	 * Subclasses should over-ride this function to generate their widget code.
	 * Convention: Subclasses should include the template from the theme/widgets folder.
	 *
	 * @since 1.0.0
	 * @param array $args
	 */
	function display_widget( $instance, $before_title = '', $title='', $after_title = '' ) {
		die('function ChromaticFw_WP_Widget::display_widget() must be over-ridden in a sub-class.');
	}

	/**
	 * Update the widget instance.
	 *
	 * @param array $new_instance
	 * @param array $old_instance
	 * @return array|void
	 */
	/*public function update( $new_instance, $old_instance ) {
		return $new_instance;
	}*/

	/**
	 * Display the widget form.
	 *
	 * @since 1.0.0
	 * @param array $instance
	 * @return string|void
	 */
	public function form( $instance ) {
		$form_id = 'chromaticfw-widget-form-' . md5( uniqid( rand(), true ) );
		$class_name = str_replace( '_', '-', strtolower( get_class($this) ) ); ?>

		<div class="chromaticfw-widget-form chromaticfw-widget-form-<?php echo esc_attr( $class_name ) ?>" id="<?php echo $form_id ?>" data-class="<?php echo get_class($this) ?>">

			<?php if ( !empty( $this->widget_options['help'] ) ) : ?>
				<div class="chromaticfw-widget-form-help"><?php echo $this->widget_options['help']; ?></div>
			<?php endif;

			foreach( $this->form_options as $key => $field ) {
				$field = wp_parse_args( (array) $field, array( 	'name'     => '',
																'desc'     => '',
																'id'       => '',
																'type'     => '',
																'settings' => array(),
																'std'      => '',
																'options'  => array(),
																'fields'   => array(),
														) );
				if ( empty( $field['id'] ) || empty( $field['type'] ) ) continue;

				$value = false;
				if ( isset( $instance[ $field['id'] ] ) ) $value = $instance[ $field['id'] ];
				elseif ( !empty( $field['std'] ) ) $value = $field['std'];

				$this->render_field( $field, $value, false );
			} ?>
			<script type="text/javascript">
				( function($){
					if (typeof window.chromaticfw_widget_helper == 'undefined')
						window.chromaticfw_widget_helper = {};
					<?php /*if (typeof window.chromaticfw_widget_helper["<?php echo get_class($this) ?>"] == 'undefined')*/ // This creates unexpected results as the script is first instancized in template widget __i__ ?>
						window.chromaticfw_widget_helper["<?php echo get_class($this) ?>"] = <?php echo json_encode( $this->repeater_html ) ?>;
					if (typeof $.fn.chromaticfwSetupWidget != 'undefined') {
						$('#<?php echo $form_id ?>').chromaticfwSetupWidget();
					}
				} )( jQuery );
			</script>
		</div><?php
	}

	/**
	 * Render a form field
	 *
	 * @since 1.0.0
	 * @param $field
	 * @param $value
	 * @param $repeater
	 */
	function render_field( $field, $value, $repeater = array() ){
		extract( $field, EXTR_SKIP );

		?><div class="chromaticfw-widget-field chromaticfw-widget-field-type-<?php echo ( strlen( $type ) < 15 ) ? sanitize_html_class( $type ) : 'custom' ?> chromaticfw-widget-field-<?php echo sanitize_html_class( $id ) ?>"><?php

		if ( !empty( $name ) && $type != 'checkbox' && $type != 'separator' && $type != 'group' ) { ?>
			<label for="<?php echo $this->chromaticfw_get_field_id( $id, $repeater ) ?>"><?php echo $name ?>:</label>
		<?php }

		switch( $type ) {
			case 'text' :
				if ( isset( $settings['size'] ) && is_numeric( $settings['size'] ) ) {
					$size = ' size="' . $settings['size'] . '"';
					$class = '';
				} else {
					$size = '';
					$class = ' widefat';
				}
				?><input type="text" name="<?php echo $this->chromaticfw_get_field_name( $id, $repeater ) ?>" id="<?php echo $this->chromaticfw_get_field_id( $id, $repeater ) ?>" value="<?php echo esc_attr( $value ) ?>" class="chromaticfw-widget-input<?php echo $class; ?>" <?php echo $size; ?> /><?php
				break;

			case 'textarea' :
				if ( isset( $settings['rows'] ) && is_numeric( $settings['rows'] ) ) {
					$rows = intval( $settings['rows'] );
				} else {
					$rows = 4;
				}
				?><textarea name="<?php echo $this->chromaticfw_get_field_name( $id, $repeater ) ?>" id="<?php echo $this->chromaticfw_get_field_id( $id, $repeater ) ?>" class="widefat chromaticfw-widget-input" rows="<?php echo $rows; ?>"><?php echo esc_textarea( $value ) ?></textarea><?php
				break;

			case 'separator' :
				?><div class="chromaticfw-widget-field-separator"></div><?php
				break;

			case 'checkbox':
				?><label for="<?php echo $this->chromaticfw_get_field_id( $id, $repeater ) ?>">
					<input type="checkbox" name="<?php echo $this->chromaticfw_get_field_name( $id, $repeater ) ?>" id="<?php echo $this->chromaticfw_get_field_id( $id, $repeater ) ?>" class="chromaticfw-widget-input" <?php checked( !empty( $value ) ) ?> />
					<?php echo $name ?>
				</label><?php
				break;

			case 'select':
				?><select name="<?php echo $this->chromaticfw_get_field_name( $id, $repeater ) ?>" id="<?php echo $this->chromaticfw_get_field_id( $id, $repeater ) ?>" class="chromaticfw-widget-input widefat">
					<?php foreach( $options as $k => $v ) : ?>
						<option value="<?php echo esc_attr($k) ?>" <?php selected($k, $value) ?>><?php echo esc_html($v) ?></option>
					<?php endforeach; ?>
				</select><?php
				break;

			case 'radio': case 'images':
				?><ul id="<?php echo $this->chromaticfw_get_field_id( $id, $repeater ) ?>-list" class="chromaticfw-widget-list chromaticfw-widget-list-<?php echo $type ?>">
					<?php foreach( $options as $k => $v ) : ?>
						<li class="chromaticfw-widget-list-item">
							<input type="radio" class="chromaticfw-widget-input" name="<?php echo $this->chromaticfw_get_field_name( $id, $repeater ) ?>" id="<?php echo $this->chromaticfw_get_field_id( $id, $repeater ) . '-' . sanitize_html_class( $k ) ?>" value="<?php echo esc_attr($k) ?>" <?php checked( $k, $value ) ?>>
							<label for="<?php echo $this->chromaticfw_get_field_id( $id, $repeater ) . '-' . sanitize_html_class( $k ) ?>"><?php echo ( 'radio' === $type ) ? $v : "<img class='chromaticfw-widget-image-picker-img' src='" . esc_url( $v ) . "'>" ?></label>
						</li>
					<?php endforeach; ?>
				</ul><?php
				break;

			case 'icon':
				?><input id="<?php echo $this->chromaticfw_get_field_id( $id, $repeater ) ?>" class="chromaticfw-of-icon" name="<?php echo $this->chromaticfw_get_field_name( $id, $repeater ) ?>" type="hidden" value="<?php echo esc_attr( $value ) ?>" />
				<div id="<?php echo $this->chromaticfw_get_field_id( $id, $repeater ) . '-icon-picked' ?>" class="chromaticfw-of-icon-picked"><i class="fa <?php echo esc_attr( $value ) ?>"></i><span><?php _e( 'Select Icon', 'chromaticfw' ) ?></span></div>
				<div id="<?php echo $this->chromaticfw_get_field_id( $id, $repeater ) . '-icon-picker-box' ?>" class="chromaticfw-of-icon-picker-box">
					<div class="chromaticfw-of-icon-picker-list"><i class="fa fa-ban chromaticfw-of-icon-none" data-value="0" data-category=""><span><?php _e( 'Remove Icon', 'chromaticfw' ) ?></span></i></div><?php
					// @todo remove dependency on ChromaticFw Options fw. This will be automatically resolved once Widgets fw is transformed to ChromaticFw Options Extension in future.
					if ( class_exists( 'ChromaticFw_Options_Helper' ) ) :
						$section_icons = ChromaticFw_Options_Helper::icons('icons');
						foreach ( ChromaticFw_Options_Helper::icons('sections') as $s_key => $s_title ) { ?>
							<h4><?php echo $s_title ?></h4>
							<div class="chromaticfw-of-icon-picker-list"><?php
							foreach ( $section_icons[$s_key] as $i_key => $i_class ) {
								$selected = ( $value == $i_class ) ? ' selected' : '';
								?><i class='fa <?php echo $i_class . $selected; ?>' data-value='<?php echo $i_class; ?>' data-category='<?php echo $s_key ?>'></i><?php
							} ?>
							</div><?php
						}
					endif; ?>
				</div><?php
				break;

			case 'group':
				$repeater[] = $id;
				?><div class="chromaticfw-widget-field-group" data-id="<?php echo esc_attr( $id ) ?>">
					<?php if ( !empty( $name ) ): ?>
						<div class="chromaticfw-widget-field-group-top">
							<h3><?php echo $name ?></h3>
						</div>
					<?php endif; ?>
					<?php $item_name = isset( $options['item_name'] ) ? $options['item_name'] : ''; ?>
					<div class="chromaticfw-widget-field-group-items">
						<?php
						if ( !empty( $value ) ) {
							foreach( $value as $k =>$v ) {
								$this->render_group( $k, $v, $fields, $item_name, $repeater );
							}
						} ?>
					</div>
					<?php
						ob_start();
						$this->render_group( 975318642, array(), $fields, $item_name, $repeater );
						$html = ob_get_clean();
						$this->repeater_html[$id] = $html;
					?>
					<div id="add-<?php echo rand(1000, 9999); ?>" class="chromaticfw-widget-field-group-add" data-iterator="<?php echo is_array( $value ) ? max( array_keys( $value ) ) : 0; ?>"><?php _e('Add', 'chromaticfw') ?></div>
				</div>
				<?php
				break;

			default:
				echo str_replace( array( '%id%', '%class%', '%name%', '%value%' ),
								  array( $this->chromaticfw_get_field_id( $id, $repeater ), 'chromaticfw-widget-input', $this->chromaticfw_get_field_name( $id, $repeater ), $value ),
								  $type );
				break;

		}

		if ( ! empty( $desc ) ) {
			echo '<div class="chromaticfw-widget-field-description"><small>' . esc_html( $desc ) . '</small></div>';
		}

		?></div><?php
	}

	/**
	 * Render a group field
	 *
	 * @since 1.0.0
	 * @param $field
	 * @param $value
	 * @param $repeater
	 */
	function render_group( $key, $value, $fields, $item_name = '', $repeater = array() ){
		if ( empty( $fields ) ) return;

		$repeater[] = intval( $key ); ?>
		<div class="chromaticfw-widget-field-group-item">
			<div class="chromaticfw-widget-field-group-item-top">
				<div class="chromaticfw-widget-field-remove">X</div>
				<h4><i class="fa fa-caret-down"></i> <?php echo esc_html( $item_name ) ?></h4>
			</div>
			<div class="chromaticfw-widget-field-group-item-form">
				<?php foreach( $fields as $field ) {
					$field = wp_parse_args( (array) $field, array( 	'name'     => '',
																	'desc'     => '',
																	'id'       => '',
																	'type'     => '',
																	'settings' => array(),
																	'std'      => '',
																	'options'  => array(),
																	'fields'   => array(),
															) );
					$this->render_field(
						$field,
						isset( $value[ $field['id'] ] ) ? $value[ $field['id'] ] : false,
						$repeater
					);
				} ?>
			</div>
		</div><?php
	}

	/**
	 * @since 1.0.0
	 * @param $id
	 * @param array $repeater
	 * @return mixed|string
	 */
	public function chromaticfw_get_field_name( $id, $repeater = array() ) {
		if ( empty( $repeater ) ) return $this->get_field_name( $id );
		else {
			$repeater_extras = '';
			foreach( $repeater as $r )
				$repeater_extras .= '[' . $r . ']';
			$repeater_extras .= '[' . esc_attr( $id ) . ']';
			$name = $this->get_field_name('{{{FIELD_NAME}}}');
			$name = str_replace( '[{{{FIELD_NAME}}}]', $repeater_extras, $name );
			return $name;
		}
	}

	/**
	 * Get the ID of this field.
	 *
	 * @since 1.0.0
	 * @param $id
	 * @param array $repeater
	 * @return string
	 */
	public function chromaticfw_get_field_id( $id, $repeater = array() ) {
		if ( empty( $repeater ) ) return $this->get_field_id( $id );
		else {
			$ids = $repeater;
			$ids[] = $id;
			return $this->get_field_id( implode( '-', $ids ) );
		}
	}

	/**
	 * Helper function to get a list for option values
	 *
	 * @since 1.0.0
	 * @param $post_type
	 * @param $number Set to -1 to show all
	 *                @see: http://codex.wordpress.org/Class_Reference/WP_Query#Pagination_Parameters
	 * @return array
	 */
	// @todo more post types and taxonomies
	static function get_wp_list( $post_type = 'page', $number = false ) {
		$number = intval( $number );
		if ( false === $number || empty( $number ) ) {
			$number = CHROMATICFW_ADMIN_LIST_ITEM_COUNT;

			if ( $post_type == 'page' ) {
				static $options_pages = array(); // cache
				if ( empty( $options_pages ) )
					$options_pages = self::get_pages( $number );
				return $options_pages;
			}

		} else {

			if ( $post_type == 'page' ) {
				$pages = self::get_pages( $number );
				return $pages;
			}

		}
	}

	/**
	 * Helper function to get a list of taxonomies
	 *
	 * @since 1.1.1
	 * @param $taxonomy
	 * @return array
	 */
	static function get_tax_list( $taxonomy = 'category' ) {
		static $options_tax = array(); // cache
		if ( empty( $options_tax[ $taxonomy ] ) )
			$options_tax[ $taxonomy ] = get_terms( $taxonomy, array( 'fields' => 'id=>name' ) );
		return $options_tax[ $taxonomy ];
	}

	/**
	 * Get pages array
	 *
	 * @since 1.0.0
	 * @param int $number Set to -1 for all pages
	 * @param string $post_type for custom post types
	 * @return array
	 */
	static function get_pages( $number, $post_type = 'page' ){
		// Doesnt allow -1 as $number
		// $options_pages_obj = get_pages("sort_column=post_parent,menu_order&number=$number");
		// $options_pages[''] = __( 'Select a page:', 'chromaticfw' );
		$options_pages = array();
		$number = intval( $number );
		$the_query = new WP_Query( array( 'post_type' => $post_type, 'posts_per_page' => $number, 'orderby' => 'post_title', 'order' => 'ASC' ) );
		if ( $the_query->have_posts() ) :
			while ( $the_query->have_posts() ) : $the_query->the_post();
				$options_pages[ get_the_ID() ] = get_the_title();
			endwhile;
			wp_reset_postdata();
		endif;
		return $options_pages;
	}

}


/* Loads all available widget classes for the theme. */
chromaticfw_load_widgets();