<?php
// Return if no boxes to show
if ( empty( $boxes ) || !is_array( $boxes ) )
	return;

// Get border classes
$top_class = chromaticfw_widget_border_class( $border, 0, 'topborder-');
$bottom_class = chromaticfw_widget_border_class( $border, 1, 'bottomborder-');

// Get total columns and set column counter
$columns = ( intval( $columns ) >= 1 && intval( $columns ) <= 5 ) ? intval( $columns ) : 3;
$column = 1;

// Get an array of page ids for custom WP Query
$page_ids = array();
foreach ( $boxes as $key => $box ) {
	$box['page'] = ( isset( $box['page'] ) ) ? intval( $box['page'] ) : '';
	if ( !empty( $box['page'] ) )
		$page_ids[] = $box['page'];
}

// Style-3 exceptions: doesnt work great with icons of 'None' style. So revert to Style-2 for this scenario.
if ( $icon_style == 'none' && $style == 'style3' ) $style = 'style2';
// Style-3 exceptions: doesnt work great with images. So revert to Style-2 for this scenario.
if ( $image && $style == 'style3' ) $style = 'style2';

// Create a custom WP Query
$content_blocks_query = new WP_Query( array( 'post_type' => 'page', 'post__in' => $page_ids, 'posts_per_page' => -1 ) );
?>

<div class="content-blocks-widget-wrap <?php echo sanitize_html_class( $top_class ); ?>">
	<div class="content-blocks-widget-box <?php echo sanitize_html_class( $bottom_class ); ?>">
		<div class="content-blocks-widget <?php echo sanitize_html_class( 'content-blocks-' . $style ); ?>">

			<?php foreach ( $boxes as $key => $box ) : ?>
				<div class="content-block-column <?php echo 'column-1-' . $columns; ?>">
					<div class="content-block">
						<?php $box['page'] = ( isset( $box['page'] ) ) ? intval( $box['page'] ) : ''; ?>
						<?php if ( !empty( $box['page'] ) ) :

							global $post;
							$no_visual = true;

							foreach( $content_blocks_query->posts as $post ) :
								if ( intval( $box['page'] ) == $post->ID ) :
									setup_postdata( $post );

									if ( $image ) :
										if ( has_post_thumbnail() ) :
											$no_visual = false; ?>
											<div class="content-block-visual content-block-image">
											<?php chromaticfw_post_thumbnail( 'content-block-img', 'column-1-' . $columns ); ?>
											</div><?php
										endif;
									elseif ( !empty( $box['icon'] ) ):
										$invert_class = ( 'square' == $icon_style ) ? ' invert-typo ' : '';
										$no_visual = false; ?>
										<div class="content-block-visual content-block-icon <?php echo 'icon-style-' . esc_attr( $icon_style ); echo $invert_class; ?>">
											<i class="fa <?php echo sanitize_html_class( $box['icon'] ); ?>"></i>
										</div><?php
									endif; ?>

									<div class="content-block-content <?php if ( $no_visual ) echo 'no-visual' ?>">
										<h4><?php the_title(); ?></h4>
										<div class="content-block-text"><?php the_content(); ?></div>
									</div><?php

								break;
								endif;
							endforeach;

							wp_reset_postdata(); ?>

						<?php endif; ?>
					</div>
				</div>
				<?php $column++;
				if ( $column > $columns ) {
					$column = 1;
					echo '<div class="clearfix"></div>';
				} ?>
			<?php endforeach; ?>

			<div class="clearfix"></div>
		</div>
	</div>
</div>