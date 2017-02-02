<?php
global $chromaticfw_theme;

if ( !isset( $chromaticfw_theme->slider ) || empty( $chromaticfw_theme->slider ) )
	return;

// Ok, so we have a slider to show. Now, lets display the slider.

/* Create Data attributes for javascript settings for this slider */
$atts = $class = '';
if ( isset( $chromaticfw_theme->sliderSettings ) && is_array( $chromaticfw_theme->sliderSettings ) ) {
	if ( isset( $chromaticfw_theme->sliderSettings['class'] ) )
		$class .= ' ' . sanitize_html_class( $chromaticfw_theme->sliderSettings['class'] );
	if ( isset( $chromaticfw_theme->sliderSettings['id'] ) )
		$atts .= ' id="' . sanitize_html_class( $chromaticfw_theme->sliderSettings['id'] ) . '"';
	foreach ( $chromaticfw_theme->sliderSettings as $setting => $value )
		$atts .= ' data-' . $setting . '="' . esc_attr( $value ) . '"';
}

/* Start Slider Template */ ?>
<ul class="lightSlider<?php echo $class; ?>"<?php echo $atts; ?>><?php
	foreach ( $chromaticfw_theme->slider as $slide ) :
		if ( !empty( $slide['content'] ) || !empty( $slide['image'] ) ) :

			$slide_bg = chromaticfw_css_background( $slide['background'] );
			$is_custom_bg = ( isset( $slide['background']['type'] ) && 'custom' == $slide['background']['type'] ) ? ' is-custom-bg ' : '';
			$column = ( !empty( $slide['image'] ) ) ? ' column-1-2 ' : ' column-1-1 ';
			$slide['button'] = empty( $slide['button'] ) ? __('Learn More', 'chromatic') : $slide['button'];

			?><li class="lightSlide hootslider-html-slide <?php echo $is_custom_bg; ?>" style="<?php echo esc_attr( $slide_bg ); ?>">
				<div class="grid">

					<?php if ( !empty( $slide['content'] ) || !empty( $slide['url'] ) ) { ?>
						<div class="<?php echo $column; ?> hootslider-html-slide-left">
							<?php if ( !empty( $slide['content'] ) ) { ?>
								<div class="hootslider-html-slide-content linkstyle">
									<?php echo wpautop( $slide['content'] ); ?>
								</div>
							<?php } ?>
							<?php if ( !empty( $slide['url'] ) ) { ?>
								<a class="hootslider-html-slide-button button" href="<?php echo esc_url( $slide['url'] ); ?>"><?php echo $slide['button']; ?></a>
							<?php } ?>
						</div>
					<?php } ?>

					<?php if ( !empty( $slide['image'] ) ) { ?>
						<div class="<?php echo $column; ?> hootslider-html-slide-right">
							<img class="hootslider-html-slide-img" src="<?php echo esc_url( $slide['image'] ); ?>">
						</div>
					<?php } ?>

					<div class="clearfix"></div>
				</div>
			</li><?php

		endif;
	endforeach; ?>
</ul>