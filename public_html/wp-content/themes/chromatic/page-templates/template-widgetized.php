<?php
/*
Template Name: Widgetized Template
*/

get_header(); // Loads the header.php template. ?>

<main <?php chromaticfw_attr( 'page_template_content' ); ?>>

	<?php
	// Get Sections List
	$sections = chromaticfw_get_option( 'widgetized_template_sections' );
	$sortlist = chromaticfw_map_sortlist( $sections );
	extract( $sortlist, EXTR_PREFIX_ALL, 'sections' );

	// Display Each Section according to ther sort order.
	foreach ( $sections_order as $key => $order ) :
		if ( !empty( $sections_display[ $key ] ) ):
			switch( $key ):

				// Display Widget Area A/B/C
				case 'area_a': case 'area_b': case 'area_c':

					if ( ! is_active_sidebar( 'widgetized-template-' . $key ) )
						continue; ?>

					<div id="widgetized-template-<?php echo sanitize_html_class( $key ); ?>" class="grid">
						<div class="grid-row">
							<div class="grid-span-12">
								<?php dynamic_sidebar( 'widgetized-template-' . $key ); ?>
							</div>
						</div>
					</div>

					<?php break;

				// Display Widget Area D
				case 'area_d':

					$area_d_left = is_active_sidebar( 'widgetized-template-area_d_1' );
					$area_d_right = is_active_sidebar( 'widgetized-template-area_d_2' );

					if ( !$area_d_left && !$area_d_right ) { // None has widgets
						continue;
					} elseif ( $area_d_left && $area_d_right ) { // Both has widgets
						$structure = chromaticfw_2_col_width_to_span( chromaticfw_get_option( 'widgetized_template_area_d_width' ) );
						$area_d_left_span = $structure[0];
						$area_d_right_span = $structure[1];
					} else { // Only 1 has widgets.
						$area_d_left_span = $area_d_right_span = 'grid-span-12';
					} ?>

					<div id="widgetized-template-<?php echo sanitize_html_class( $key ); ?>" class="grid">
						<div class="grid-row"><?php

							if ( $area_d_left ): ?>
								<div id="widgetized-template-area_d_left" class="<?php echo $area_d_left_span; ?>">
									<?php dynamic_sidebar( 'widgetized-template-area_d_1' ); ?>
								</div><?php
							endif;

							if ( $area_d_right ): ?>
								<div id="widgetized-template-area_d_right" class="<?php echo $area_d_right_span; ?>">
									<?php dynamic_sidebar( 'widgetized-template-area_d_2' ); ?>
								</div><?php
							endif; ?>

						</div>
					</div>

					<?php break;

				// Display Page Content
				case 'content': ?>

					<div id="widgetized-template-page-content" class="grid">
						<div class="grid-row">
							<div class="entry-content grid-span-12">
								<?php
								if ( have_posts() ) :
									while ( have_posts() ) : the_post();
										the_content();
									endwhile;
								endif;
								?>
							</div>
						</div>
					</div>

					<?php break;

				// Display HTML Slider
				case 'slider_html': 
					$slider_width = chromaticfw_get_option( 'wt_html_slider_width' );
					$slider_grid = ( 'stretch' == $slider_width ) ? 'grid-stretch' : 'grid'; ?>

					<div id="widgetized-template-html-slider" class="widgetized-template-slider <?php echo $slider_grid; ?>">
						<div class="grid-row">
							<div class="grid-span-12">
								<?php
								global $chromaticfw_theme;

								/* Reset any previous slider */
								$chromaticfw_theme->slider = array();
								$chromaticfw_theme->sliderSettings = array( 'class' => 'wt-slider' );

								/* Create slider object */
								$slides = chromaticfw_get_option( 'wt_html_slider' );
								foreach ( $slides as $slide ) {
									if ( !empty( $slide['image'] ) || !empty( $slide['content'] ) || !empty( $slide['url'] ) ) {
										$chromaticfw_theme->slider[] = $slide;
									}
								}

								/* Display Slider Template */
								get_template_part( 'template-parts/slider-html' );
								?>
							</div>
						</div>
					</div>

					<?php break;

				// Display Image Slider
				case 'slider_img': 
					$slider_width = chromaticfw_get_option( 'wt_img_slider_width' );
					$slider_grid = ( 'stretch' == $slider_width ) ? 'grid-stretch' : 'grid'; ?>

					<div id="widgetized-template-img-slider" class="widgetized-template-slider <?php echo $slider_grid; ?>">
						<div class="grid-row">
							<div class="grid-span-12">
								<?php
								global $chromaticfw_theme;

								/* Reset any previous slider */
								$chromaticfw_theme->slider = array();
								$chromaticfw_theme->sliderSettings = array( 'class' => 'wt-slider' );

								/* Create slider object */
								$slides = chromaticfw_get_option( 'wt_img_slider' );
								foreach ( $slides as $slide ) {
									if ( !empty( $slide['image'] ) ) {
										$chromaticfw_theme->slider[] = $slide;
									}
								}

								/* Display Slider Template */
								get_template_part( 'template-parts/slider-image' );
								?>
							</div>
						</div>
					</div>

					<?php break;

			endswitch;
		endif;
	endforeach;
	?>

</main><!-- #content -->

<?php get_footer(); // Loads the footer.php template. ?>