<?php
$topbar_left = is_active_sidebar( 'topbar-left' );
$topbar_right = is_active_sidebar( 'topbar-right' );

if ( !$topbar_left && !$topbar_right )
	return;

$topbar_span = ( $topbar_left && $topbar_right ) ? 'grid-span-6' : 'grid-span-12';
?>
<div id="topbar" class="grid-stretch invert-typo">
	<div class="grid">
		<div class="grid-row">
			<?php if ( $topbar_left ): ?>
				<div id="topbar-left" class="<?php echo $topbar_span; ?>">
					<?php dynamic_sidebar( 'topbar-left' ); ?>
				</div>
			<?php endif; ?>
			<?php if ( $topbar_right ): ?>
				<div id="topbar-right" class="<?php echo $topbar_span; ?>">
					<?php dynamic_sidebar( 'topbar-right' ); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>