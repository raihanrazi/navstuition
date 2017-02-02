<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title><?php wp_title('|', true, 'left'); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<?php if ( ! get_theme_mod('wp_barrister_shadow') ) {
	$shadow_class = ' class="wpb-shadow"';
} else {
	$shadow_class = '';
}
?>

<div id="wrapper"<?php echo $shadow_class; ?>>

	<div id="container">

	<header id="branding" role="banner">
    
    	<div id="social-media" class="clearfix">
        
        	<?php if ( get_theme_mod( 'wp_barrister_facebook' ) ) : ?>
            <a href="<?php echo esc_url( get_theme_mod( 'wp_barrister_facebook' ) ); ?>" class="social-fb" title="<?php echo esc_url( get_theme_mod( 'wp_barrister_facebook' ) ); ?>"><?php _e('Facebook', 'wp-barrister') ?></a>
            <?php endif; ?>
            
            <?php if ( get_theme_mod( 'wp_barrister_twitter' ) ) : ?>
            <a href="<?php echo esc_url( get_theme_mod( 'wp_barrister_twitter' ) ); ?>" class="social-tw" title="<?php echo esc_url( get_theme_mod( 'wp_barrister_twitter' ) ); ?>"><?php _e('Twitter', 'wp-barrister') ?></a>
            <?php endif; ?>
			
            <?php if ( get_theme_mod( 'wp_barrister_google' ) ) : ?>
            <a href="<?php echo esc_url( get_theme_mod( 'wp_barrister_google' ) ); ?>" class="social-gp" title="<?php echo esc_url( get_theme_mod( 'wp_barrister_google' ) ); ?>"><?php _e('Google+', 'wp-barrister') ?></a>
            <?php endif; ?>
            
            <?php if ( get_theme_mod( 'wp_barrister_pinterest' ) ) : ?>
            <a href="<?php echo esc_url( get_theme_mod( 'wp_barrister_pinterest' ) ); ?>" class="social-pi" title="<?php echo esc_url( get_theme_mod( 'wp_barrister_pinterest' ) ); ?>"><?php _e('Pinterest', 'wp-barrister') ?></a>
            <?php endif; ?>
            
            <?php if ( get_theme_mod( 'wp_barrister_linkedin' ) ) : ?>
            <a href="<?php echo esc_url( get_theme_mod( 'wp_barrister_linkedin' ) ); ?>" class="social-li" title="<?php echo esc_url( get_theme_mod( 'wp_barrister_linkedin' ) ); ?>"><?php _e('Linkedin', 'wp-barrister') ?></a>
            <?php endif; ?>
            
			<?php if ( get_theme_mod( 'wp_barrister_youtube' ) ) : ?>
            <a href="<?php echo esc_url( get_theme_mod( 'wp_barrister_youtube' ) ); ?>" class="social-yt" title="<?php echo esc_url( get_theme_mod( 'wp_barrister_youtube' ) ); ?>"><?php _e('Youtube', 'wp-barrister') ?></a>
            <?php endif; ?>
            
            <?php if ( get_theme_mod( 'wp_barrister_tumblr' ) ) : ?>
            <a href="<?php echo esc_url( get_theme_mod( 'wp_barrister_tumblr' ) ); ?>" class="social-tu" title="<?php echo esc_url( get_theme_mod( 'wp_barrister_tumblr' ) ); ?>"><?php _e('Tumblr', 'wp-barrister') ?></a>
            <?php endif; ?>
            
            <?php if ( get_theme_mod( 'wp_barrister_instagram' ) ) : ?>
            <a href="<?php echo esc_url( get_theme_mod( 'wp_barrister_instagram' ) ); ?>" class="social-in" title="<?php echo esc_url( get_theme_mod( 'wp_barrister_instagram' ) ); ?>"><?php _e('Instagram', 'wp-barrister') ?></a>
            <?php endif; ?>
            
            <?php if ( get_theme_mod( 'wp_barrister_flickr' ) ) : ?>
            <a href="<?php echo esc_url( get_theme_mod( 'wp_barrister_flickr' ) ); ?>" class="social-fl" title="<?php echo esc_url( get_theme_mod( 'wp_barrister_flickr' ) ); ?>"><?php _e('Instagram', 'wp-barrister') ?></a>
            <?php endif; ?>
            
            <?php if ( get_theme_mod( 'wp_barrister_vimeo' ) ) : ?>
            <a href="<?php echo esc_url( get_theme_mod( 'wp_barrister_vimeo' ) ); ?>" class="social-vi" title="<?php echo esc_url( get_theme_mod( 'wp_barrister_vimeo' ) ); ?>"><?php _e('Vimeo', 'wp-barrister') ?></a>
            <?php endif; ?>
            
            <?php if ( get_theme_mod( 'wp_barrister_yelp' ) ) : ?>
            <a href="<?php echo esc_url( get_theme_mod( 'wp_barrister_yelp' ) ); ?>" class="social-ye" title="<?php echo esc_url( get_theme_mod( 'wp_barrister_yelp' ) ); ?>"><?php _e('Yelp', 'wp-barrister') ?></a>
            <?php endif; ?>
            
            <?php if ( get_theme_mod( 'wp_barrister_avvo' ) ) : ?>
            <a href="<?php echo esc_url( get_theme_mod( 'wp_barrister_avvo' ) ); ?>" class="social-av" title="<?php echo esc_url( get_theme_mod( 'wp_barrister_avvo' ) ); ?>"><?php _e('Avvo', 'wp-barrister') ?></a>
            <?php endif; ?>
            
            <?php if ( get_theme_mod( 'wp_barrister_rss' ) ) : ?>
            <a href="<?php echo esc_url( get_theme_mod( 'wp_barrister_rss' ) ); ?>" class="social-rs" title="<?php echo esc_url( get_theme_mod( 'wp_barrister_rss' ) ); ?>"><?php _e('RSS', 'wp-barrister') ?></a>
            <?php endif; ?>
            
            <?php if ( get_theme_mod( 'wp_barrister_email' ) ) : ?>
            <a href="<?php _e('mailto:', 'wp-barrister'); echo sanitize_email( get_theme_mod( 'wp_barrister_email' ) ); ?>" class="social-em" title="<?php _e('mailto:', 'wp-barrister'); echo sanitize_email( get_theme_mod( 'wp_barrister_email' ) ); ?>"><?php _e('Email', 'wp-barrister') ?></a>
            <?php endif; ?>

        </div><!-- .social-media -->
    
    	<?php if ( get_theme_mod('wp_barrister_search') ) {
			$search_class = ' wpb-search-hide';
		} else {
			$search_class = '';
		}
		?>
    
      <div id="inner-header" class="clearfix<?php echo $search_class; ?>">
      
		<div id="site-heading">
			<?php if ( get_theme_mod( 'wp_barrister_logo' ) ) : ?>
            <div id="site-logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo esc_url( get_theme_mod( 'wp_barrister_logo' ) ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" /></a></div>
            <?php else : ?>
            <div id="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></div>
            <?php endif; ?>
        </div>

		<nav id="access" role="navigation">
			<h1 class="assistive-text section-heading"><?php _e( 'Main menu', 'wp-barrister' ); ?></h1>
			<div class="skip-link screen-reader-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'wp-barrister' ); ?>"><?php _e( 'Skip to content', 'wp-barrister' ); ?></a></div>
			<?php wp_barrister_main_nav(); // Adjust using Menus in Wordpress Admin ?>
			<?php get_search_form(); ?>
		</nav><!-- #access -->
        
      </div>
     
	</header><!-- #branding -->
