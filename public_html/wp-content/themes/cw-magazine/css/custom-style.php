<?php
	include_once "../../../../wp-load.php";
	header("Content-type: text/css");
?>


<?php

	//header
	if(get_theme_mod('margin_v') && get_theme_mod('margin_v')):
		$margin_v = get_theme_mod('margin_v').'px';
	else:	
		$margin_v = '0px';
	endif;
	
	if(get_theme_mod('margin_h') && get_theme_mod('margin_h')):
		$margin_h = get_theme_mod('margin_h').'px';
	else:	
		$margin_h = '0px';
	endif;

		if(get_theme_mod('header_color_1')):
			$header_color_1 = get_theme_mod('header_color_1');
		endif;	
        if(get_theme_mod('header_color_2')):
			$header_color_2 = get_theme_mod('header_color_2');
		endif;
        if(get_theme_mod('header_color_3')):
			$header_color_3 = get_theme_mod('header_color_3');
		endif;
        if(get_theme_mod('header_color_4')):
			$header_color_4 = get_theme_mod('header_color_4');
		endif;
        if(get_theme_mod('header_color_5')):
			$header_color_5 = get_theme_mod('header_color_5');
		endif;
        if(get_theme_mod('header_color_6')):
			$header_color_6 = get_theme_mod('header_color_6');
		endif;
        if(get_theme_mod('header_color_7')):
			$header_color_7 = get_theme_mod('header_color_7');
		endif;
        if(get_theme_mod('header_color_8')):
			$header_color_8 = get_theme_mod('header_color_8');
		endif;
        if(get_theme_mod('header_color_9')):
			$header_color_9 = get_theme_mod('header_color_9');
		endif;
        if(get_theme_mod('header_color_11')):
			$header_color_11 = get_theme_mod('header_color_11');
		endif;
        if(get_theme_mod('header_color_12')):
			$header_color_12 = get_theme_mod('header_color_12');
		endif;
		
		if(get_theme_mod('footer_color_1')):
			$footer_color_1 = get_theme_mod('footer_color_1');
		endif;
		if(get_theme_mod('footer_color_2')):
			$footer_color_2 = get_theme_mod('footer_color_2');
		endif;
		if(get_theme_mod('footer_color_3')):
			$footer_color_3 = get_theme_mod('footer_color_3');
		endif;
		if(get_theme_mod('footer_color_4')):
			$footer_color_4 = get_theme_mod('footer_color_4');
		endif;
		if(get_theme_mod('footer_color_5')):
			$footer_color_5 = get_theme_mod('footer_color_5');
		endif;
		
        if(get_theme_mod('site_color_1')):
			$site_color_1 = get_theme_mod('site_color_1');
		endif;	
		if(get_theme_mod('site_color_2')):
			$site_color_2 = get_theme_mod('site_color_2');
		endif;	
		if(get_theme_mod('site_color_3')):
			$site_color_3 = get_theme_mod('site_color_3');
		endif;	
        if(get_theme_mod('site_color_4')):
			$site_color_4 = get_theme_mod('site_color_4');
		endif;	
        if(get_theme_mod('site_color_5')):
			$site_color_5 = get_theme_mod('site_color_5');
		endif;	
		if(get_theme_mod('site_color_6')):
			$site_color_6 = get_theme_mod('site_color_6');
		endif;	
        if( get_theme_mod('site_bg_1') == '')
            $site_bg_1 = ' ';
        else
            $site_bg_1 = get_theme_mod('site_bg_1');
        
	if( !get_theme_mod('color_scheme') || (get_theme_mod('color_scheme') == 'cw_magazine' ) || (get_theme_mod('color_scheme') == 'none' ) ){	
		$header_color_1 = ' ';
        $header_color_2 = ' ';
        $header_color_3 = ' ';
        $header_color_4 = ' ';
        $header_color_5 = ' ';
        $header_color_6 = ' ';
        $header_color_7 = ' ';
        $header_color_8 = ' ';
        $header_color_9 = ' ';
        $header_color_11 = ' ';
        $header_color_12 = ' ';
        $footer_color_1 = ' ';
        $footer_color_2 = ' ';
        $footer_color_3 = ' ';
        $footer_color_4 = ' ';
        $footer_color_5 = ' ';
        $site_color_1 = ' ';
        $site_color_2 = ' ';
        $site_color_3 = ' ';
        $site_color_4 = ' ';
        $site_color_5 = ' ';
        $site_color_6 = ' ';
        $site_bg_1 = ' ';
	   }
	else
	if( get_theme_mod('color_scheme') && (get_theme_mod('color_scheme') == 'red_style' )){	
		$header_color_1 = '#dd3333';
        $header_color_2 = '#6c1a1a';
        $header_color_3 = '#ddc3c3';
        $header_color_4 = '#ffffff';
        $header_color_5 = '#282828';
        $header_color_6 = '#ddcccc';
        $header_color_7 = '#ffffff';
        $header_color_8 = '#ddcccc';
        $header_color_9 = '#dd3333';
        $header_color_11 = '#ffffff';
        $header_color_12 = '#ddafaf';
        $footer_color_1 = '#6c1a1a';
        $footer_color_2 = '#ffffff';
        $footer_color_3 = '#dda1a1';
        $footer_color_4 = '#ffdddd';
        $footer_color_5 = '#ffffff';
        $site_color_1 = '#6c1a1a';
        $site_color_2 = '#ffffff';
        $site_color_3 = '#dd3333';
        $site_color_4 = '#6c1a1a';
        $site_color_5 = '#dd3333';	
		$site_color_6 = '#f2eee7';
        $site_bg_1 = '../images/bg-site_red.jpg';
		
	}
	else
	if( get_theme_mod('color_scheme') && (get_theme_mod('color_scheme') == 'fashion_style' )){	
		$header_color_1 = '#e62750';
        $header_color_2 = '#ffbdcb';
        $header_color_3 = '#961934';
        $header_color_4 = '#e62750';
        $header_color_5 = '#ffbdcb';
        $header_color_6 = '#961934';
        $header_color_7 = '#e62750';
        $header_color_8 = '#961934';
        $header_color_9 = '#e62750';
        $header_color_11 = '#ffffff';
        $header_color_12 = '#e5a0ae';
        $footer_color_1 = '#e62750';
        $footer_color_2 = '#ffffff';
        $footer_color_3 = '#e5c7cd';
        $footer_color_4 = '#fff2f2';
        $footer_color_5 = '#ffffff';
        $site_color_1 = '#e62750';
        $site_color_2 = '#ffffff';
        $site_color_3 = '#e62750';
        $site_color_4 = '#f2dfe5';
        $site_color_5 = '#dd3333';
        $site_color_6 = '#e5d3d7';
        $site_bg_1 = '../images/bg-site_pink.jpg';				
	}
	else
	if( get_theme_mod('color_scheme') && (get_theme_mod('color_scheme') == 'sports_blog' )){	
		$header_color_1 = '#32a546';
        $header_color_2 = '#282828';
        $header_color_3 = '#ceeacf';
        $header_color_4 = '#ffffff';
        $header_color_5 = '#282828';
        $header_color_6 = '#32a546';
        $header_color_7 = '#ffffff';
        $header_color_8 = '#32a546';
        $header_color_9 = '#ffffff';
        $header_color_11 = '#ffffff';
        $header_color_12 = '#ceeacf';
        $footer_color_1 = '#282828';
        $footer_color_2 = '#32a546';
        $footer_color_3 = '#ceeacf';
        $footer_color_4 = '#32a546';
        $footer_color_5 = '#ffffff';
        $site_color_1 = '#32a546';
        $site_color_2 = '#ffffff';
        $site_color_3 = '#32a546';
        $site_color_4 = '#32a546';
        $site_color_5 = '#dd3333';
        $site_color_6 = '#F9F9F9';
        $site_bg_1 = '../images/bg-site_green.jpg';		
    }

?>


/* =Page template 
-------------------------------------------------*/
<?php 
	// page template
	if(!get_theme_mod('select_template') || (get_theme_mod('select_template') && (get_theme_mod('select_template') == 'sidebar_left' ) ) ||
	(get_theme_mod('select_template') && (get_theme_mod('select_template') == 'sidebar_right' ) )){
			$sidebar_width =  '34%';
			$content_width =  '63%'; 
			
			if(get_theme_mod('select_template') && (get_theme_mod('select_template') == 'sidebar_right' ) ) {
				$sidebar_align =  'right';
				$content_align =  'left';
			}
			else {
				$sidebar_align =  'left';
				$content_align =  'right';
			}
?>
.template-page .content-area{
	float: <?php echo $content_align; ?>;
    width: <?php echo $content_width; ?>;
	}
.template-page .sidebar{
	float: <?php echo $sidebar_align; ?>;
    width: <?php echo $sidebar_width; ?>;
	}
<?php
		}
		else if(get_theme_mod('select_template') && (get_theme_mod('select_template') == 'full_width' ) ) {
			$content_align = 'left';
			$content_width = '98%';
?>
.template-page .content-area{
	float: <?php echo $content_align; ?>;
    width: <?php echo $content_width; ?>;
	}
.template-page .sidebar{
	display: none !important;
	}
<?php } ?> 




/* =Header Colors
-------------------------------------------------*/
.header-middle-wrap{
    background-color: <?php echo $header_color_1; ?>;
}
.logo a,
.logo a:hover{
    color: <?php echo $header_color_11; ?>;
}
.logo a span{
    color: <?php echo $header_color_12; ?>;
}
.main-menu,
.main-menu .main-navigation ul ul{
    background-color: <?php echo $header_color_2; ?>;
}
.main-menu .main-navigation a{
    color: <?php echo $header_color_3; ?>;
}
.main-menu .main-navigation li:hover > a,
.main-menu .main-navigation ul ul a:hover{
    color: <?php echo $header_color_4; ?>;
}
.header-top{
    background: <?php echo $header_color_5; ?>;
}
.header-top .main-navigation ul ul{
    background-color: <?php echo $header_color_5; ?>;
}
.header-top .main-navigation a,
.header-top .main-navigation .current_page_item a{
    color: <?php echo $header_color_6; ?>;
}
.header-top .main-navigation ul ul a:hover,
.header-top .main-navigation li:hover > a{
    color: <?php echo $header_color_7; ?>;
}
.social-icons-header a span{
    color: <?php echo $header_color_8; ?>;
}
.social-icons-header a span:hover{
    color: <?php echo $header_color_9; ?>;
}





/* =Footer Colors
-------------------------------------------------*/

.site-footer {
    background-color: <?php echo $footer_color_1; ?>;
}
.footer-title{
    color: <?php echo $footer_color_2; ?>;
}
.widget-footer ul li:before{
    color: <?php echo $footer_color_2; ?>;
}
.widget-footer, 
.widget-footer li, 
.widget-footer ul li a,
.copyright{
    color: <?php echo $footer_color_3; ?>;
}
.site-footer .textwidget a,
.copyright a,
.copyright strong{
    color: <?php echo $footer_color_4; ?>;
}
.widget-footer ul li a:hover,
.site-footer .textwidget a:hover,
.copyright a:hover{
    color: <?php echo $footer_color_5; ?>;
}




/* =General 
-------------------------------------------------*/
.wrapper{
    background-image: url(<?php echo $site_bg_1; ?>);
    background-color: <?php echo $site_color_6; ?>;
}
.title-categ span,
.widget-title span,
.readmore{
    background-color: <?php echo $site_color_1; ?>;
}
.front-page-boxes ul li.title-categ,
.widget-title{
    border-color: <?php echo $site_color_1; ?>;
}
.title-categ span,
.title-categ span a,
.title-categ span,
.widget-title span,
.readmore{
    color: <?php echo $site_color_2; ?> !important;
}
.hp-slider-wrap {
    border-top-color: <?php echo $site_color_1; ?>;
}
.callbacks_here a {
    background-color: <?php echo $header_color_1; ?>;
    border: 3px solid <?php echo $header_color_1; ?>;
}
.btn-slider {
    background: <?php echo $header_color_1; ?>;
}
.callbacks_tabs li a:hover{
	background-color: <?php echo $header_color_1; ?>;
}
article .entry-content{
    border-top-color: <?php echo $header_color_2; ?>;
}
.pagination .current,
.pagination a:hover{
	background-color: <?php echo $header_color_2; ?>;
}
h1.entry-title,
h1.page-title{
    color: <?php echo $site_color_3; ?>;
}
input[type="submit"] {
    background-color: <?php echo $header_color_1; ?>;
}
input[type="submit"]:hover {
    background-color: <?php echo $header_color_2; ?>;
}
.widget ul li{
    color: <?php echo $header_color_2; ?>;
}
h1.entry-title a{
    color: <?php echo $header_color_2; ?>;
}
.read-more-btn{
    background: <?php echo $header_color_1; ?>;
}

a {
    color: <?php echo $site_color_4; ?>;
}
.widget ul li a:hover,
.entry-meta a:hover,
.front-page-boxes ul li a:hover,
a:hover {
    color: <?php echo $site_color_5; ?>;
}
