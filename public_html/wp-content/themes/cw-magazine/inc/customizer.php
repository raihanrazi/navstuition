<?php
/**
 * cw-magazine Theme Customizer
 *
 * @package cw-magazine
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function cw_magazine_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	/* theme notes */
	$wp_customize->add_section( 'codeinwp_theme_notes' , array(
		'title'      => __('ThemeIsle theme notes','cw-magazine'),
		'description' => sprintf( __( "Thank you for being part of this! We've spent almost 6 months building ThemeIsle without really knowing if anyone will ever use a theme or not, so we're very grateful that you've decided to work with us. Wanna <a href='http://themeisle.com/contact/' target='_blank'>say hi</a>?
		<br/><br/><a href='http://themeisle.com/demo/?theme=CW Magazine' target='_blank' />View Theme Demo</a> | <a href='http://themeisle.com/forums/forum/cw-magazine/' target='_blank'>Get theme support</a>")),
		'priority'   => 30,
	));
	$wp_customize->add_setting(
        'cwp_theme_notice' 
		
		
	);
	
	$wp_customize->add_control(
    'cwp_theme_notice',
    array(
        'section' => 'codeinwp_theme_notes',
		'type'  => 'read-only',
    ));
	
	/* front page slider */
	
	$wp_customize->add_section( 'cw_slider_section' , array(
    	'title'       => __( 'Front page slider', 'cw-magazine' ),
    	'priority'    => 30
	) );

	$wp_customize->add_setting( 'cwp_slide_img1', array( 'sanitize_callback' => 'esc_url_raw' )  );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_slider_image1', array(
	    'label'    => __( 'Slider image 1', 'cw-magazine' ),
	    'section'  => 'cw_slider_section',
	    'settings' => 'cwp_slide_img1',
		'priority' => 1
	) ) );
	
	$wp_customize->add_setting( 'cwp_slide_link1', array( 'sanitize_callback' => 'esc_url_raw' ) );
	$wp_customize->add_control( 'cwp_slide_link1', array(
	    'label'    => __( 'Slider link 1', 'cw-magazine' ),
	    'section'  => 'cw_slider_section',
	    'settings' => 'cwp_slide_link1',
		'priority'    => 2,
	) );
	
	$wp_customize->add_setting( 'cwp_slide_caption_title1', array( 'sanitize_callback' => 'esc_attr' )  );
	$wp_customize->add_control( 'cwp_slide_caption_title1', array(
	    'label'    => __( 'Slider caption title 1', 'cw-magazine' ),
	    'section'  => 'cw_slider_section',
	    'settings' => 'cwp_slide_caption_title1',
		'priority'    => 3,
	) );
	
	$wp_customize->add_setting( 'cwp_slide_caption_text1', array( 'sanitize_callback' => 'esc_attr' )  );
	$wp_customize->add_control( 'cwp_slide_caption_text1', array(
	    'label'    => __( 'Slider caption text 1', 'cw-magazine' ),
	    'section'  => 'cw_slider_section',
	    'settings' => 'cwp_slide_caption_text1',
		'priority'    => 4,
	) );
	
	$wp_customize->add_setting( 'cwp_slide_img2' , array( 'sanitize_callback' => 'esc_url_raw' ) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_slider_image2', array(
	    'label'    => __( 'Slider image 2', 'cw-magazine' ),
	    'section'  => 'cw_slider_section',
	    'settings' => 'cwp_slide_img2',
		'priority' => 5
	) ) );
	
	$wp_customize->add_setting( 'cwp_slide_link2', array( 'sanitize_callback' => 'esc_url_raw' ) );
	$wp_customize->add_control( 'cwp_slide_link2', array(
	    'label'    => __( 'Slider link 2', 'cw-magazine' ),
	    'section'  => 'cw_slider_section',
	    'settings' => 'cwp_slide_link2',
		'priority'    => 6,
	) );
	
	$wp_customize->add_setting( 'cwp_slide_caption_title2', array( 'sanitize_callback' => 'esc_attr' )  );
	$wp_customize->add_control( 'cwp_slide_caption_title2', array(
	    'label'    => __( 'Slider caption title 2', 'cw-magazine' ),
	    'section'  => 'cw_slider_section',
	    'settings' => 'cwp_slide_caption_title2',
		'priority'    => 7,
	) );
	
	$wp_customize->add_setting( 'cwp_slide_caption_text2', array( 'sanitize_callback' => 'esc_attr' )  );
	$wp_customize->add_control( 'cwp_slide_caption_text2', array(
	    'label'    => __( 'Slider caption text 2', 'cw-magazine' ),
	    'section'  => 'cw_slider_section',
	    'settings' => 'cwp_slide_caption_text2',
		'priority'    => 8,
	) );
	
	$wp_customize->add_setting( 'cwp_slide_img3', array( 'sanitize_callback' => 'esc_url_raw' )  );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_slider_image3', array(
	    'label'    => __( 'Slider image 3', 'cw-magazine' ),
	    'section'  => 'cw_slider_section',
	    'settings' => 'cwp_slide_img3',
		'priority' => 9
	) ) );
	
	$wp_customize->add_setting( 'cwp_slide_link3', array( 'sanitize_callback' => 'esc_url_raw' ) );
	$wp_customize->add_control( 'cwp_slide_link3', array(
	    'label'    => __( 'Slider link 3', 'cw-magazine' ),
	    'section'  => 'cw_slider_section',
	    'settings' => 'cwp_slide_link3',
		'priority'    => 10,
	) );
	
	$wp_customize->add_setting( 'cwp_slide_caption_title3', array( 'sanitize_callback' => 'esc_attr' )  );
	$wp_customize->add_control( 'cwp_slide_caption_title3', array(
	    'label'    => __( 'Slider caption title 3', 'cw-magazine' ),
	    'section'  => 'cw_slider_section',
	    'settings' => 'cwp_slide_caption_title3',
		'priority'    => 11,
	) );
	
	$wp_customize->add_setting( 'cwp_slide_caption_text3', array( 'sanitize_callback' => 'esc_attr' )  );
	$wp_customize->add_control( 'cwp_slide_caption_text3', array(
	    'label'    => __( 'Slider caption text 3', 'cw-magazine' ),
	    'section'  => 'cw_slider_section',
	    'settings' => 'cwp_slide_caption_text3',
		'priority'    => 12,
	) );
	
	$wp_customize->add_setting( 'cwp_slide_img4', array( 'sanitize_callback' => 'esc_url_raw' )  );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_slider_image4', array(
	    'label'    => __( 'Slider image 4', 'cw-magazine' ),
	    'section'  => 'cw_slider_section',
	    'settings' => 'cwp_slide_img4',
		'priority' => 13
	) ) );
	
	$wp_customize->add_setting( 'cwp_slide_link4', array( 'sanitize_callback' => 'esc_url_raw' ));
	$wp_customize->add_control( 'cwp_slide_link4', array(
	    'label'    => __( 'Slider link 4', 'cw-magazine' ),
	    'section'  => 'cw_slider_section',
	    'settings' => 'cwp_slide_link4',
		'priority'    => 14,
	) );
	
	$wp_customize->add_setting( 'cwp_slide_caption_title4' , array( 'sanitize_callback' => 'esc_attr' ) );
	$wp_customize->add_control( 'cwp_slide_caption_title4', array(
	    'label'    => __( 'Slider caption title 4', 'cw-magazine' ),
	    'section'  => 'cw_slider_section',
	    'settings' => 'cwp_slide_caption_title4',
		'priority'    => 15,
	) );
	
	$wp_customize->add_setting( 'cwp_slide_caption_text4' , array( 'sanitize_callback' => 'esc_attr' ) );
	$wp_customize->add_control( 'cwp_slide_caption_text4', array(
	    'label'    => __( 'Slider caption text 4', 'cw-magazine' ),
	    'section'  => 'cw_slider_section',
	    'settings' => 'cwp_slide_caption_text4',
		'priority'    => 16,
	) );
	
	
	/* front page categories */
	$cat_slugs = array();
	$categories = get_categories();
	foreach($categories as $categ):
		$cat_slugs[$categ->cat_ID] = $categ->slug;
	endforeach;
	
	
	$wp_customize->add_section( 'cw_fp_categories_section1' , array(
    	'title'       => __( 'Categories displayed on the custom front page template - First section', 'cw-magazine' ),
    	'priority'    => 31
	) );
	
	
	$wp_customize->add_setting( 'cat1_slug', array('sanitize_callback' => 'cwp_cat_slug_sanitization') );
	$wp_customize->add_control(
		'cat1_slug',
		array(
			'type' => 'radio',
			'label' => 'First Section slug',
			'section' => 'cw_fp_categories_section1',
			'choices' => $cat_slugs,
		)
	);
	
	$wp_customize->add_section( 'cw_fp_categories_section2' , array(
    	'title'       => __( 'Categories displayed on the custom front page template - Second section', 'cw-magazine' ),
    	'priority'    => 32
	) );
	
	$wp_customize->add_setting( 'cat2_slug', array('sanitize_callback' => 'cwp_cat_slug_sanitization') );
	$wp_customize->add_control(
		'cat2_slug',
		array(
			'type' => 'radio',
			'label' => 'Second Section slug',
			'section' => 'cw_fp_categories_section2',
			'choices' => $cat_slugs,
		)
	);
	
	
	$wp_customize->add_section( 'cw_fp_categories_section3' , array(
    	'title'       => __( 'Categories displayed on the custom front page template - Third section', 'cw-magazine' ),
    	'priority'    => 33
	) );
	
	$wp_customize->add_setting( 'cat3_slug', array('sanitize_callback' => 'cwp_cat_slug_sanitization') );
	$wp_customize->add_control(
		'cat3_slug',
		array(
			'type' => 'radio',
			'label' => 'Third Section slug',
			'section' => 'cw_fp_categories_section3',
			'choices' => $cat_slugs,
		)
	);
	
	$wp_customize->add_section( 'cw_fp_categories_section4' , array(
    	'title'       => __( 'Categories displayed on the custom front page template - Fourth section', 'cw-magazine' ),
    	'priority'    => 34
	) );
	
	$wp_customize->add_setting( 'cat4_slug', array('sanitize_callback' => 'cwp_cat_slug_sanitization') );
	$wp_customize->add_control(
		'cat4_slug',
		array(
			'type' => 'radio',
			'label' => 'Fourth Section slug',
			'section' => 'cw_fp_categories_section4',
			'choices' => $cat_slugs,
		)
	);
	
	$wp_customize->add_section( 'cw_socials_section' , array(
    	'title'       => __( 'Social icons', 'cw-magazine' ),
    	'priority'    => 35
	) );
	
	$wp_customize->add_setting( 'facebook_link', array( 'sanitize_callback' => 'esc_url_raw' ));
	$wp_customize->add_control( 'facebook_link', array(
	    'label'    => __( 'Facebook link', 'cw-magazine' ),
	    'section'  => 'cw_socials_section',
	    'settings' => 'facebook_link',
		'priority'    => 1,
	) );
	
	$wp_customize->add_setting( 'gplus_link', array( 'sanitize_callback' => 'esc_url_raw' ));
	$wp_customize->add_control( 'gplus_link', array(
	    'label'    => __( 'Google Plus link', 'cw-magazine' ),
	    'section'  => 'cw_socials_section',
	    'settings' => 'gplus_link',
		'priority'    => 2,
	) );
	
	$wp_customize->add_setting( 'twitter_link', array( 'sanitize_callback' => 'esc_url_raw' ));
	$wp_customize->add_control( 'twitter_link', array(
	    'label'    => __( 'Twitter link', 'cw-magazine' ),
	    'section'  => 'cw_socials_section',
	    'settings' => 'twitter_link',
		'priority'    => 3,
	) );
	
	$wp_customize->add_setting( 'linkedin_link', array( 'sanitize_callback' => 'esc_url_raw' ));
	$wp_customize->add_control( 'linkedin_link', array(
	    'label'    => __( 'Linkedin link', 'cw-magazine' ),
	    'section'  => 'cw_socials_section',
	    'settings' => 'linkedin_link',
		'priority'    => 4,
	) );
	
	$wp_customize->add_setting( 'youtube_link', array( 'sanitize_callback' => 'esc_url_raw' ));
	$wp_customize->add_control( 'youtube_link', array(
	    'label'    => __( 'Youtube link', 'cw-magazine' ),
	    'section'  => 'cw_socials_section',
	    'settings' => 'youtube_link',
		'priority'    => 5,
	) );
	
	$wp_customize->add_setting( 'rss_link', array( 'sanitize_callback' => 'esc_url_raw' ));
	$wp_customize->add_control( 'rss_link', array(
	    'label'    => __( 'RSS link', 'cw-magazine' ),
	    'section'  => 'cw_socials_section',
	    'settings' => 'rss_link',
		'priority'    => 6,
	) );
	
	$wp_customize->add_setting( 'vimeo_link', array( 'sanitize_callback' => 'esc_url_raw' ));
	$wp_customize->add_control( 'vimeo_link', array(
	    'label'    => __( 'Vimeo link', 'cw-magazine' ),
	    'section'  => 'cw_socials_section',
	    'settings' => 'vimeo_link',
		'priority'    => 7,
	) );
	
	$wp_customize->add_setting( 'yelp_link', array( 'sanitize_callback' => 'esc_url_raw' ));
	$wp_customize->add_control( 'yelp_link', array(
	    'label'    => __( 'Yelp link', 'cw-magazine' ),
	    'section'  => 'cw_socials_section',
	    'settings' => 'yelp_link',
		'priority'    => 8,
	) );
	
	$wp_customize->add_setting( 'pinterest_link', array( 'sanitize_callback' => 'esc_url_raw' ));
	$wp_customize->add_control( 'pinterest_link', array(
	    'label'    => __( 'Pinterest link', 'cw-magazine' ),
	    'section'  => 'cw_socials_section',
	    'settings' => 'pinterest_link',
		'priority'    => 9,
	) );
	
	$wp_customize->add_setting( 'stumbleupon_link', array( 'sanitize_callback' => 'esc_url_raw' ));
	$wp_customize->add_control( 'stumbleupon_link', array(
	    'label'    => __( 'Stumbleupon link', 'cw-magazine' ),
	    'section'  => 'cw_socials_section',
	    'settings' => 'stumbleupon_link',
		'priority'    => 10,
	) );
	
	$wp_customize->add_setting( 'tumblr_link', array( 'sanitize_callback' => 'esc_url_raw' ));
	$wp_customize->add_control( 'tumblr_link', array(
	    'label'    => __( 'Tumblr link', 'cw-magazine' ),
	    'section'  => 'cw_socials_section',
	    'settings' => 'tumblr_link',
		'priority'    => 11,
	) );
	
	$wp_customize->add_section( 'cw_logo_section' , array(
    	'title'       => __( 'Logo', 'cw-magazine' ),
    	'priority'    => 36
	) );
	
	/* Logo */
	
	$wp_customize->add_setting( 'logo_header' );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_logo', array(
	    'label'    => __( 'Logo', 'cw-magazine' ),
	    'section'  => 'cw_logo_section',
	    'settings' => 'logo_header'
	) ) );
	
	/* Copyright */
	
	$wp_customize->add_section( 'cw_copyright_section' , array(
    	'title'       => __( 'Copyright', 'cw-magazine' ),
    	'priority'    => 37
	) );
	
	$wp_customize->add_setting( 'cw_copyright' );
	$wp_customize->add_control( 'cw_copyright', array(
	    'label'    => __( 'Copyright', 'cw-magazine' ),
	    'section'  => 'cw_copyright_section',
	    'settings' => 'cw_copyright'
	) );
	
	/* Template */
	
	$wp_customize->add_section( 'cw_template_section' , array(
    	'title'       => __( 'Select template', 'cw-magazine' ),
    	'priority'    => 38
	) );
	
	$wp_customize->add_setting( 'select_template');
	$wp_customize->add_control(
		'select_template',
		array(
			'type' => 'radio',
			'label' => 'Template',
			'section' => 'cw_template_section',
			'choices' => array(
					'sidebar_right' => 'Sidebar right',
					'sidebar_left' => 'Sidebar left',
					'full_width' => 'Full width'
					),
		)
	);
	
	/* Color scheme */
	$wp_customize->add_section( 'cw_colorscheme_section' , array(
    	'title'       => __( 'Color scheme', 'cw-magazine' ),
    	'priority'    => 39
	) );
	
	$wp_customize->add_setting( 'color_scheme');
	$wp_customize->add_control(
		'color_scheme',
		array(
			'type' => 'radio',
			'label' => 'Color scheme',
			'section' => 'cw_colorscheme_section',
			'choices' => array(
					'none' => 'None',
					'cw_magazine' => 'CW Magazine',
					'red_style' => 'Red style',
					'fashion_style' => 'Fashion style',
					'sports_blog' => 'Sports blog'
					),
		)
	);
	
	/* Header margins */
	$wp_customize->add_section( 'cw_margins_section' , array(
    	'title'       => __( 'Header margins', 'cw-magazine' ),
    	'priority'    => 40
	) );
	
	$wp_customize->add_setting( 'margin_h' );
	$wp_customize->add_control( 'margin_h', array(
	    'label'    => __( 'Header horizontal margin', 'cw-magazine' ),
	    'section'  => 'cw_margins_section',
	    'settings' => 'margin_h',
		'priority'    => 1,
	) );
	
	$wp_customize->add_setting( 'margin_v' );
	$wp_customize->add_control( 'margin_v', array(
	    'label'    => __( 'Header vertical margin', 'cw-magazine' ),
	    'section'  => 'cw_margins_section',
	    'settings' => 'margin_v',
		'priority'    => 2,
	) );
	
	/* Site colors */
	$wp_customize->add_section( 'cw_sitecolors_section' , array(
    	'title'       => __( 'Site colors', 'cw-magazine' ),
    	'priority'    => 41
	) );
	$wp_customize->add_setting( 'site_color_3' );
	$wp_customize->add_control( 
		new WP_Customize_Color_Control( 
		$wp_customize, 
		'site_color_3', 
		array(
			'label'      => __( 'Page title', 'cw-magazine' ),
			'section'    => 'cw_sitecolors_section',
			'settings'   => 'site_color_3',
		) )
	);
	
	$wp_customize->add_setting( 'site_color_2' );
	$wp_customize->add_control( 
		new WP_Customize_Color_Control( 
		$wp_customize, 
		'site_color_2', 
		array(
			'label'      => __( 'Widget title', 'cw-magazine' ),
			'section'    => 'cw_sitecolors_section',
			'settings'   => 'site_color_2',
		) )
		
	);
	
	$wp_customize->add_setting( 'site_color_1' );
	$wp_customize->add_control( 
		new WP_Customize_Color_Control( 
		$wp_customize, 
		'site_color_1', 
		array(
			'label'      => __( 'Background widget title', 'cw-magazine' ),
			'section'    => 'cw_sitecolors_section',
			'settings'   => 'site_color_1',
		) )
		
	);
	
	$wp_customize->add_setting( 'site_color_4' );
	$wp_customize->add_control( 
		new WP_Customize_Color_Control( 
		$wp_customize, 
		'site_color_4', 
		array(
			'label'      => __( 'Links color', 'cw-magazine' ),
			'section'    => 'cw_sitecolors_section',
			'settings'   => 'site_color_4',
		) )
		
	);
	
	$wp_customize->add_setting( 'site_color_5' );
	$wp_customize->add_control( 
		new WP_Customize_Color_Control( 
		$wp_customize, 
		'site_color_5', 
		array(
			'label'      => __( 'Links color (mouse over)', 'cw-magazine' ),
			'section'    => 'cw_sitecolors_section',
			'settings'   => 'site_color_5',
		) )
		
	);
	
	$wp_customize->add_setting( 'site_color_6' );
	$wp_customize->add_control( 
		new WP_Customize_Color_Control( 
		$wp_customize, 
		'site_color_6', 
		array(
			'label'      => __( 'Color background page', 'cw-magazine' ),
			'section'    => 'cw_sitecolors_section',
			'settings'   => 'site_color_6',
		) )
		
	);

	$wp_customize->add_setting( 'site_bg_1' );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_site_bg_1', array(
	    'label'    => __( 'Image background page', 'cw-magazine' ),
	    'section'  => 'cw_sitecolors_section',
	    'settings' => 'site_bg_1'
	) ) );
	
	/* Header colors */
	$wp_customize->add_section( 'cw_headercolors_section' , array(
    	'title'       => __( 'Header colors', 'cw-magazine' ),
    	'priority'    => 42
	) );
	$wp_customize->add_setting( 'header_color_1' );
	$wp_customize->add_control( 
		new WP_Customize_Color_Control( 
		$wp_customize, 
		'header_color_1', 
		array(
			'label'      => __( 'Background', 'cw-magazine' ),
			'section'    => 'cw_headercolors_section',
			'settings'   => 'header_color_1',
		) )
	);
	
	$wp_customize->add_setting( 'header_color_11' );
	$wp_customize->add_control( 
		new WP_Customize_Color_Control( 
		$wp_customize, 
		'header_color_11', 
		array(
			'label'      => __( 'Site title color', 'cw-magazine' ),
			'section'    => 'cw_headercolors_section',
			'settings'   => 'header_color_11',
		) )
		
	);
	
	$wp_customize->add_setting( 'header_color_12' );
	$wp_customize->add_control( 
		new WP_Customize_Color_Control( 
		$wp_customize, 
		'header_color_12', 
		array(
			'label'      => __( 'Site Tagline color', 'cw-magazine' ),
			'section'    => 'cw_headercolors_section',
			'settings'   => 'header_color_12',
		) )
		
	);
	
	$wp_customize->add_setting( 'header_color_2' );
	$wp_customize->add_control( 
		new WP_Customize_Color_Control( 
		$wp_customize, 
		'header_color_2', 
		array(
			'label'      => __( 'Main menu background', 'cw-magazine' ),
			'section'    => 'cw_headercolors_section',
			'settings'   => 'header_color_2',
		) )
		
	);
	
	$wp_customize->add_setting( 'header_color_3' );
	$wp_customize->add_control( 
		new WP_Customize_Color_Control( 
		$wp_customize, 
		'header_color_3', 
		array(
			'label'      => __( 'Main menu links', 'cw-magazine' ),
			'section'    => 'cw_headercolors_section',
			'settings'   => 'header_color_3',
		) )
		
	);
	
	$wp_customize->add_setting( 'header_color_4' );
	$wp_customize->add_control( 
		new WP_Customize_Color_Control( 
		$wp_customize, 
		'header_color_4', 
		array(
			'label'      => __( 'Main menu links (mouse over)', 'cw-magazine' ),
			'section'    => 'cw_headercolors_section',
			'settings'   => 'header_color_4',
		) )
		
	);
	
	$wp_customize->add_setting( 'header_color_5' );
	$wp_customize->add_control( 
		new WP_Customize_Color_Control( 
		$wp_customize, 
		'header_color_5', 
		array(
			'label'      => __( 'Very top menu background', 'cw-magazine' ),
			'section'    => 'cw_headercolors_section',
			'settings'   => 'header_color_5',
		) )
		
	);
	
	$wp_customize->add_setting( 'header_color_6' );
	$wp_customize->add_control( 
		new WP_Customize_Color_Control( 
		$wp_customize, 
		'header_color_6', 
		array(
			'label'      => __( 'Very top menu links', 'cw-magazine' ),
			'section'    => 'cw_headercolors_section',
			'settings'   => 'header_color_6',
		) )
		
	);
	
	$wp_customize->add_setting( 'header_color_7' );
	$wp_customize->add_control( 
		new WP_Customize_Color_Control( 
		$wp_customize, 
		'header_color_7', 
		array(
			'label'      => __( 'Very top menu links (mouse over)', 'cw-magazine' ),
			'section'    => 'cw_headercolors_section',
			'settings'   => 'header_color_7',
		) )
		
	);
	
	$wp_customize->add_setting( 'header_color_8' );
	$wp_customize->add_control( 
		new WP_Customize_Color_Control( 
		$wp_customize, 
		'header_color_8', 
		array(
			'label'      => __( 'Social icon links', 'cw-magazine' ),
			'section'    => 'cw_headercolors_section',
			'settings'   => 'header_color_8',
		) )
		
	);
	
	$wp_customize->add_setting( 'header_color_9' );
	$wp_customize->add_control( 
		new WP_Customize_Color_Control( 
		$wp_customize, 
		'header_color_9', 
		array(
			'label'      => __( 'Social icon links (mouse over)', 'cw-magazine' ),
			'section'    => 'cw_headercolors_section',
			'settings'   => 'header_color_9',
		) )
		
	);
	
	/* Footer Text colors */
	$wp_customize->add_section( 'cw_footertextcolors_section' , array(
    	'title'       => __( 'Footer colors', 'cw-magazine' ),
    	'priority'    => 43
	) );
	$wp_customize->add_setting( 'footer_color_1' );
	$wp_customize->add_control( 
		new WP_Customize_Color_Control( 
		$wp_customize, 
		'footer_color_1', 
		array(
			'label'      => __( 'Background', 'cw-magazine' ),
			'section'    => 'cw_footertextcolors_section',
			'settings'   => 'footer_color_1',
		) )
	);
	
	$wp_customize->add_setting( 'footer_color_2' );
	$wp_customize->add_control( 
		new WP_Customize_Color_Control( 
		$wp_customize, 
		'footer_color_2', 
		array(
			'label'      => __( 'Title color', 'cw-magazine' ),
			'section'    => 'cw_footertextcolors_section',
			'settings'   => 'footer_color_2',
		) )
		
	);
	
	$wp_customize->add_setting( 'footer_color_3' );
	$wp_customize->add_control( 
		new WP_Customize_Color_Control( 
		$wp_customize, 
		'footer_color_3', 
		array(
			'label'      => __( 'Text color', 'cw-magazine' ),
			'section'    => 'cw_footertextcolors_section',
			'settings'   => 'footer_color_3',
		) )
		
	);
	
	$wp_customize->add_setting( 'footer_color_4' );
	$wp_customize->add_control( 
		new WP_Customize_Color_Control( 
		$wp_customize, 
		'footer_color_4', 
		array(
			'label'      => __( 'Link color', 'cw-magazine' ),
			'section'    => 'cw_footertextcolors_section',
			'settings'   => 'footer_color_4',
		) )
		
	);
	
	$wp_customize->add_setting( 'footer_color_5' );
	$wp_customize->add_control( 
		new WP_Customize_Color_Control( 
		$wp_customize, 
		'footer_color_5', 
		array(
			'label'      => __( 'Link color (mouse over)', 'cw-magazine' ),
			'section'    => 'cw_footertextcolors_section',
			'settings'   => 'footer_color_5',
		) )
		
	);
}
add_action( 'customize_register', 'cw_magazine_customize_register' );

function cwp_cat_slug_sanitization( $input ) {
    $cat_slugs = array();
	$categories = get_categories();
	foreach($categories as $categ):
		$cat_slugs[$categ->cat_ID] = $categ->slug;
	endforeach;
	
    if ( array_key_exists( $input, $cat_slugs ) ) {
        return $input;
    } else {
        return '';
    }
}
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function cw_magazine_customize_preview_js() {
	wp_enqueue_script( 'cw_magazine_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'cw_magazine_customize_preview_js' );
