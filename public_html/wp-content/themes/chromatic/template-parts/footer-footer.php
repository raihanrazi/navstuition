<footer <?php chromaticfw_attr( 'footer' ); ?> class="grid-stretch">
	<div class="grid">
		<div class="grid-row">
			<?php
			$columns = chromaticfw_get_option_footer();
			$alphas = range('a', 'e');
			$structure = chromaticfw_footer_structure();

			for ( $i=0; $i < $columns; $i++ ) { ?>
				<div class="<?php echo 'grid-span-' . $structure[ $i ] ; ?>">
					<?php dynamic_sidebar( 'footer-' . $alphas[ $i ] ); ?>
				</div><?php
			} ?>
		</div>
	</div>
</footer><!-- #footer -->