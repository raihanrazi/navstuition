<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package SKT I Am One
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE">
<meta name="viewport" content="width=device-width">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="icon" type="image/x-icon" href="<?php echo esc_url( of_get_option('favicon', false) ); ?>" />
<!--[if lt IE 9]>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/ie.css" type="text/css" media="all" />
<![endif]-->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php if( is_front_page() || get_option('page_for_posts') && get_option('page_on_front') && of_get_option('innerpageslider',true) != 'hide')  { ?>
    <div id="slider">
        <?php if( of_get_option( 'header_title', true ) != '' ) { ; ?>
        	<?php if(of_get_option('header_title',true) == 1) { ?>
            		<div class="top-bar">
 							<h1><?php _e('Go to Appearance >> Theme Options >> Restore Defaults','skt-iamone'); ?></h1>              
            		</div><!-- top-bar -->
            <?php } else { ?>
            <div class="top-bar">
                <?php echo of_get_option( 'header_title', true ) ; ?>
            </div><!-- top-bar -->
        <?php } } ?>
    
        <div class="control-nav">
            <a id="prevslide" class="load-item"><i class="font-icon-arrow-simple-left"></i></a>
            <a id="nextslide" class="load-item"><i class="font-icon-arrow-simple-right"></i></a>
            <ul id="slide-list"></ul>
            <a id="nextsection" href="#work"><i class="font-icon-arrow-simple-down"></i></a>
        </div>
    </div><!-- slider -->
<?php } ?>

<div class="header">
            		<div class="header-inner">
                    		<div class="logo">
                            		<a href="<?php echo esc_url( home_url('/')); ?><?php if(is_home() || is_front_page()){ ?>#top<?php }?>">
                                    	<?php if( true == of_get_option('logo' )) { ; ?>
 	                                       <img src="<?php echo esc_url( of_get_option( 'logo', true )); ?>" / >
                                        <?php } else { ?>
    	                                    <h1><?php bloginfo('name'); ?></h1>
                                        <?php } ?>
                                    </a>
                             </div><!-- logo -->
                            <div class="toggle">
                            <a class="toggleMenu" href="#">Menu</a>
                            </div><!-- toggle -->
                            <div class="nav">
								<?php 
                                $navMenu = wp_nav_menu( array('theme_location'  => 'primary', 'echo' => false ) );
                                if ( is_page() && ! is_page_template('template-front.php') ) :
                                    echo $navMenu;
                                else : 
                                    if( of_get_option('numsection', true) > 0 ) { 
                                        $menu_list = '';
                                        $numSections = esc_attr( of_get_option('numsection', true) );
                                        for( $s=1; $s<=$numSections; $s++ ){ 
                                            $menutitle	= ( of_get_option('menutitle'.$s, true) != '' ) ? esc_html( of_get_option('menutitle'.$s, true) ) : '';
                                            $menu_list .= ( $menutitle != '' ) ? '<li><a href="'.esc_url(home_url('/')).'#section'.$s.'">'.strtoupper($menutitle).'</a></li>' : '';
                                        }
                                    }
                                    echo skt_iamone_str_lreplace('</ul>', $menu_list.'</ul>', $navMenu );
                                endif;
                                ?>
                            </div><!-- nav --><div class="clear"></div>
                    </div><!-- header-inner -->
            </div><!-- header -->
      <div class="main-container">
         <?php if( function_exists( 'is_woocommerce' ) && is_woocommerce() ) { ?>
		 	<div class="content-area">
                <div class="middle-align content_sidebar">
                	<div id="sitemain" class="site-main">
         <?php } ?>