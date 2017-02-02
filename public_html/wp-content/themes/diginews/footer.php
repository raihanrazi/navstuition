
	<footer id="colophon" role="contentinfo">
		<div id="site-generator">
			<?php echo __('&copy; ', 'diginews' ) . esc_attr( get_bloginfo( 'name', 'display' ) );  ?>
            <?php if ( is_home() || is_front_page() ) : ?>
            <?php _e('- Powered by ', 'diginews' ); ?><a href="<?php echo esc_url( __( 'http://wordpress.org/', 'diginews'  ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'diginews'  ); ?>"><?php _e('Wordpress' ,'diginews' ); ?></a>
			<?php _e(' and ', 'diginews' ); ?><a href="<?php echo esc_url( __( 'http://citizenjournal.net/', 'diginews'  ) ); ?>"><?php _e('Citizen Journal', 'diginews' ); ?></a>
            <?php endif; ?>
		</div>
	</footer><!-- #colophon -->
</div><!-- #container -->

<?php wp_footer(); ?>

</body>
</html>