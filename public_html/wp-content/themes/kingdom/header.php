<?php
/**
 * The Header for our theme.
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<!--[if lt IE 9]> 
			<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
		<![endif]-->
		<?php wp_head();?>
	</head>
	<body <?php body_class(); ?>>
		<div id="page" class="site">
			<!-- header -->
			<div class="kingdom-bg-header">
				<header id="masthead" class="site-header" role="banner">
					<!-- site title -->
					<div class="hgroup">
						<h1 class="kingdom-site-title">
							<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
						</h1>
						<h2 class="kingdom-site-description"><?php bloginfo( 'description' ); ?></h2>
					</div><!-- .hgroup -->
					<!-- site menu -->
					<nav id="access" role="navigation" class="access">
						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'kingdom_main_menu' ) ); ?>
						<div class="clear"></div>
					</nav><!-- .access -->
					<div class="clear"></div>
				</header><!-- #masthead -->
			</div><!-- .kingdom-bg-header -->
			<!-- main -->
			<div class="wrapper_main">
