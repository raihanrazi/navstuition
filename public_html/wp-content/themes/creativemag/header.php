<?php
	global $creativemag_options;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="wrapper">
	<?php do_action( 'before' ); ?>
	
  	<div class="w1">
    
	<header id="masthead" class="site-header" role="banner">
			<div id="header">
				<div class="header-holder">
					<h1 class="logo">
                    	 
                        <?php if ( $creativemag_options['CMlogo'] != '' ):
								
						?>  
                  			<a href="<?php echo get_site_url(); ?>"><img class="special" src="<?php 
									echo $creativemag_options['CMlogo'];
										?>" /></a>  
						<?php else :  ?>
							<a href="<?php echo get_site_url(); ?>"><img class="special" src="<?php bloginfo("template_directory"); ?>/images/conceptdesign-logo.png" /></a>  
						<?php endif; ?> 
                    </h1>
                    
						<?php get_search_form(); ?>
				<nav id="site-navigation-top" class="navigation-main top-nav" role="navigation">
                    
                    <?php wp_nav_menu( array('container' => 'div', 'container_class' => 'menu-wrapper', 'container_id' => 'main-superfish-wrapper','menu_class'=> 'sf-menu', 'menu_id' => 'top-nav', 'theme_location' => 'main_nav','depth'=>1 ) ); ?>
 
                    
					</nav>
				</div>
                
				<div class="nav-block">
					
					<?php if(trim($creativemag_options['CMfb']) != '' || trim($creativemag_options['CMfb']) != '' ||  trim($creativemag_options['CMfb']) != '' ) { ?>
                    <ul class="social">
						<?php if(trim($creativemag_options['CMtw']) != '') { ?><li><a href="<?php echo $creativemag_options['CMtw']; ?>">twitter</a></li> <?php } ?>
						<?php if(trim($creativemag_options['CMfb']) != '') { ?><li><a href="<?php echo $creativemag_options['CMfb']; ?>" class="facebook">facebook</a></li> <?php } ?>
						<?php if(trim($creativemag_options['CMrss']) != '') { ?><li><a href="<?php echo $creativemag_options['CMrss']; ?>"  class="rss" >rss</a></li> <?php } ?> 
					</ul>
					
					<?php } ?> 
				<nav id="site-navigation-main" class="navigation-main" role="navigation">
                   
                    <?php wp_nav_menu( array('container' => 'div', 'container_class' => 'menu-wrapper', 'menu' => 'header-menu', 'container_id' => 'main-superfish-wrapper', 'menu_id' => 'nav','menu_class'=> 'sf-menu', 'theme_location' => 'drop_nav'  ,'depth'=>2) ); ?>
				</nav>
					
					<a href="<?php echo home_url(); ?> " class="home">Home</a>
				
					
				</div>
			</div>
<div class="clear" ></div>
	</header>
<div id="main">
	<div class="ad-blocks">
		<div class="ad-block">
				<?php 
				if(isset($creativemag_options['CMbh']))
						echo  $creativemag_options['CMbh'] ;
				?>
		</div>
	</div>	
 