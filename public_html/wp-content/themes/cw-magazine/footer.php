<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package cw-magazine
 */
?>
		<div class="clear"></div>
    </div><!-- .container -->
</div><!-- .wrapper -->
<footer class="site-footer">
	<div class="container">

        <?php if ( is_active_sidebar( 'Footer1' ) ) : ?>
		  <?php dynamic_sidebar( 'Footer1' ); ?>
        <?php endif; ?>
        <?php if ( is_active_sidebar( 'Footer2' ) ) : ?>
		  <?php dynamic_sidebar( 'Footer2' ); ?>
        <?php endif; ?>

        <?php if ( is_active_sidebar( 'Footer3' ) ) : ?>
		  <?php dynamic_sidebar( 'Footer3' ); ?>
        <?php endif; ?>

        <?php if ( is_active_sidebar( 'Footer4' ) ) : ?>
		  <?php dynamic_sidebar( 'Footer4' ); ?>
        <?php endif; ?>

		<div class="copyright">
			<?php
			if(get_theme_mod('cw_copyright')):
				echo get_theme_mod('cw_copyright');
			endif;
			?>
			<a href="http://themeisle.com/themes/cw-magazine/" target="_blank">CW Magazine</a><?php _e(' powered by ','cwp'); ?><a href="http://wordpress.org/" target="_blank"><?php _e('WordPress','cwp'); ?></a>
		</div>

        <div class="clear"></div>
    </div><!-- .container -->
</footer><!-- .site-footer -->

<?php wp_footer(); ?>
</body>
</html>