	
	</div><!-- #container -->

	<div class="push"></div>

</div><!-- #wrapper -->

<footer id="colophon" role="contentinfo">
    <div id="site-generator">

        <?php echo __('&copy; ', 'wp-barrister') . esc_attr( get_bloginfo( 'name', 'display' ) );  ?>
        <?php if ( is_front_page() && ! is_paged() ) : ?>
        <?php _e('- Powered by ', 'wp-barrister'); ?><a href="<?php echo esc_url( __( 'http://wordpress.org/', 'wp-barrister' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'wp-barrister' ); ?>"><?php _e('WordPress.' ,'wp-barrister'); ?></a>
        <?php _e(' Theme by ', 'wp-barrister'); ?><a href="<?php echo esc_url( __( 'http://wpdevshed.com/', 'wp-barrister' ) ); ?>"><?php _e('WP Dev Shed', 'wp-barrister'); ?></a>
        <?php endif; ?>
        <?php wp_barrister_footer_nav(); ?>
        
    </div>
</footer><!-- #colophon -->

<?php wp_footer(); ?>


</body>
</html>