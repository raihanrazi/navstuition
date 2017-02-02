<?php 

/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */ 

function optionsframework_option_name() {
	// Change this to use your theme slug
	return 'optionsframework_i_am_one';
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'skt-iamone'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	// array of section content.
	$section_text = array(
		1 => array(
			'section_title'		=> 'Welcome to I Am One',
			'outerclass'		=> 'welcome-box-bg',
			'class'				=> 'welcome-box',
			'content'			=> '<h3>single page multipurpose responsive parallex<br/> landing page</h3>
									<h4>Featuring</h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu ultricies tellus. Etiam dignissim, risus ac interdum scelerisque, arcu tortor egestas tortor, nec blandit lectus neque eu ipsum. Praesent eget molestie justo. Ut consectetur tempor lacus nec elementum. Nunc in elit risus. In hac habitasse platea dictumst. Morbi in nisl vel quam fringilla mollis a ac ipsum.</p>
                                    <div class="clear"></div>',
			
		),

		2 => array(
			'section_title'	=> 'About Us',
			'menutitle'		=> 'About',
			'outerclass'	=> 'top-grey-box-bg',
			'class'			=> 'top-grey-box',
			'content'		=> '<h4>Introduction</h4><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu ultricies tellus. Etiam dignissim, risus ac interdum scelerisque, arcu tortor egestas tortor, nec blandit lectus neque eu ipsum. Praesent eget molestie justo. Ut consectetur tempor lacus nec elementum. Nunc in elit risus. In hac habitasse platea dictumst. Morbi in nisl vel quam fringilla mollis a ac ipsum.</p>',
		),

		3 => array(
			'section_title'	=> '',
			'outerclass'	=> 'work-section-bg',
			'class'			=> 'work-section',
			'content'		=> '<h4>How we Work</h4>
            	<div class="first-row">
						<div class="work-box">
								<div class="step-1"></div>
								<div class="work-info"><img src="'.get_template_directory_uri().'/images/icon-discuss.png" />
								<h3>Discuss</h3>
								Orci ut pretium imperdiet, nisl magna dictum dolor, et condie-ntum velit enim quis ligula. Duis a
								</div>
						</div><div class="work-box">
								<div class="step-2"></div>
								<div class="work-info"><img src="'.get_template_directory_uri().'/images/icon-design.png" />
								<h3>Desing &amp; Development</h3>
								Orci ut pretium imperdiet, nisl magna dictum dolor, et condie-ntum velit enim quis ligula. Duis a
								</div>
						</div><div class="work-box">
								<div class="step-2"></div>
								<div class="work-info"><img src="'.get_template_directory_uri().'/images/icon-deliver.png" />
								<h3>Deliver</h3>
								Orci ut pretium imperdiet, nisl magna dictum dolor, et condie-ntum velit enim quis ligula. Duis a
								</div>
						</div>
				</div>',
		),

		4 => array(
			'section_title'	=> 'Some Statistics About Us',
			'outerclass'	=> 'about-us-bg-back',
			'class'			=> 'about-us-bg',
			'content'		=> '<div class="counter">
									<div class="count-box">
											<div class="count-no">30</div>
											 <div class="count-content"><span>Countries We Have</span> Clients</div><div class="clear"></div>
									</div><div class="count-box">
											<div class="count-no">600</div>
											 <div class="count-content"><span>Completed</span> Projects</div><div class="clear"></div>
									</div><div class="count-box">
											<div class="count-no">1K</div>
											 <div class="count-content"><span>Sent To Client</span> Proposals</div><div class="clear"></div>
									</div><div class="count-box">
											<div class="count-no">100</div>
											 <div class="count-content"><span>Countries We Have</span> Clients</div><div class="clear"></div>
									</div>
                                    <div class="clear"></div></div>',
		),

		5 => array(
			'section_title'	=> 'Services',
			'menutitle'		=> 'Services',
			'outerclass'	=> 'top-grey-box-bg',
			'class'			=> 'top-grey-box',
			'content'		=> '<h4>Introduction</h4><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu ultricies tellus. Etiam dignissim, risus ac interdum scelerisque, arcu tortor egestas tortor, nec blandit lectus neque eu ipsum. Praesent eget molestie justo. Ut consectetur tempor lacus nec elementum. Nunc in elit risus. In hac habitasse platea dictumst. Morbi in nisl vel quam fringilla mollis a ac ipsum.</p>'
		),

		6 => array(
			'section_title'	=> '',
			'outerclass'	=> 'feature-services-bg',
			'class'			=> 'feature-services',
			'content'		=> '<div class="left-image"><img src="'.get_template_directory_uri().'/images/lappy-image.jpg" />
                         </div>
                        <div class="right-features"><h3>Featured Services</h3>
						<div class="feature-cell">
								<div class="feature-icon"><img src="'.get_template_directory_uri().'/images/icon-doc.png" /></div>
								<div class="feature-desc"><h5>Task Management</h5>
										Suspendisse sapien lacus, pharetra eu luctus et, ullamcorper nec arcu. Nullam cursus commodo felis et aliquet.
								</div><div class="clear"></div>
						</div><div class="feature-cell">
								<div class="feature-icon"><img src="'.get_template_directory_uri().'/images/icon-smartphone.png" /></div>
								<div class="feature-desc"><h5>Smartphone Apps</h5>
										Suspendisse sapien lacus, pharetra eu luctus et, ullamcorper nec arcu. Nullam cursus commodo felis et aliquet.
								</div><div class="clear"></div>
						</div><div class="feature-cell">
								<div class="feature-icon"><img src="'.get_template_directory_uri().'/images/icon-modern-layout.png" /></div>
								<div class="feature-desc"><h5>Modern Layout</h5>
										Suspendisse sapien lacus, pharetra eu luctus et, ullamcorper nec arcu. Nullam cursus commodo felis et aliquet.
								</div><div class="clear"></div>
						</div>
                        </div><div class="clear"></div>
						'
		),
		
		7 => array(
			'section_title'	=> 'What Our Client Said',
			'outerclass'	=> 'testimonial-section-bg',
			'class'			=> 'testimonial-section',
			'content'		=> '
			<div class="testimonial-box"><img src="'.get_template_directory_uri().'/images/client-john.jpg" />
						<h5>John Doe</h5>
						<span>Designer at amet ague</span>
						<div class="testimonial-content">
						<div class="testimonial-top"></div>
						<div class="testimonial-mid"><p>Aliquam eget ante dapibus iaculis ligula ac, sodales neque. Aenean sit amet porttitor purus. Maecenas tristique nec tellus eu feugiat. Donec nec fermentum metus. Fusce sed facilisis nisi. Donec et augue vel mauris tempor luctus eu non nisi.</p>
			</div>
						<div class="testimonial-bot">
						</div>
						</div>
		</div><div class="testimonial-box"><img src="'.get_template_directory_uri().'/images/client-mark.jpg" />
						<h5>Mark</h5>
						<span>Co-founder at Donec Co.</span>
						<div class="testimonial-content">
						<div class="testimonial-top"></div>
						<div class="testimonial-mid"><p>Aliquam eget ante dapibus iaculis ligula ac, sodales neque. Aenean sit amet porttitor purus. Maecenas tristique nec tellus eu feugiat. Donec nec fermentum metus. Fusce sed facilisis nisi. Donec et augue vel mauris tempor luctus eu non nisi.</p>
			</div>
						<div class="testimonial-bot">
						</div>
						</div>
		</div><div class="testimonial-box nomargin"><img src="'.get_template_directory_uri().'/images/client-martina.jpg" />
						<h5>MARTINA DOE</h5>
						<span>Founder at Lorem Co.</span>
						<div class="testimonial-content">
						<div class="testimonial-top"></div>
						<div class="testimonial-mid"><p>Aliquam eget ante dapibus iaculis ligula ac, sodales neque. Aenean sit amet porttitor purus. Maecenas tristique nec tellus eu feugiat. Donec nec fermentum metus. Fusce sed facilisis nisi. Donec et augue vel mauris tempor luctus eu non nisi.</p>
			</div>
						<div class="testimonial-bot">
						</div>
						</div>
		</div>'
		),
		
		8 => array(
			'section_title'	=> 'Recent Work',
			'menutitle'		=> 'Recent Work',
			'outerclass'	=> 'top-grey-box-bg',
			'class'			=> 'top-grey-box',
			'content'		=> '<h4>Our Best Projects and Case Studies</h4><p>bibendum. Pellentesque iaculis sagittis lorem. Nulla facilisi. Integer elementum fringilla consectetur. Nullam volutpat, metus tempus semper lobortis, diam urna commodo urna, nec auctor tortor sapien mollis nunc. Pellentesque rutrum lacinia porttitor. Quisque sit amet mauris nisl. Praesent arcu turpis, blandit non semper elementum, malesuada iaculis dolor.</p>'
		),
		
		9 => array(
			'section_title'	=> '',
			'outerclass'	=> 'photogalsection',
			'class'			=> '',
			'content'		=> '<div class="photobooth cf">
            <div class="gallery">
                <ul class="clean" id="portfolio">
							<li class="images">
								<strong>Image 1</strong><em><span>Image 1</span></em><a href="'.get_template_directory_uri().'/images/gallery/gallery-image1.jpg" rel="prettyPhoto[pp_gal]"><img src="'.get_template_directory_uri().'/images/gallery/gallery-image1.jpg" width="312" height="207" /></a></li>
								<li class="images">
								<strong>Image 2</strong><em><span>Image 2</span></em><a href="'.get_template_directory_uri().'/images/gallery/gallery-image2.jpg" rel="prettyPhoto[pp_gal]"><img src="'.get_template_directory_uri().'/images/gallery/gallery-image2.jpg" width="312" height="207" /></a></li>
								<li class="images">
								<strong>Image 3</strong><em><span>Image 3</span></em><a href="'.get_template_directory_uri().'/images/gallery/gallery-image3.jpg" rel="prettyPhoto[pp_gal]"><img src="'.get_template_directory_uri().'/images/gallery/gallery-image3.jpg" width="312" height="207" /></a></li>
								<li class="images">
								<strong>Image 4</strong><em><span>Image 4</span></em><a href="'.get_template_directory_uri().'/images/gallery/gallery-image4.jpg" rel="prettyPhoto[pp_gal]"><img src="'.get_template_directory_uri().'/images/gallery/gallery-image4.jpg" width="312" height="207" /></a></li>
								<li class="images">
								<strong>Image 5</strong><em><span>Image 5</span></em><a href="'.get_template_directory_uri().'/images/gallery/gallery-image5.jpg" rel="prettyPhoto[pp_gal]"><img src="'.get_template_directory_uri().'/images/gallery/gallery-image5.jpg" width="312" height="207" /></a></li>
								<li class="images">
								<strong>Image 6</strong><em><span>Image 6</span></em><a href="'.get_template_directory_uri().'/images/gallery/gallery-image6.jpg" rel="prettyPhoto[pp_gal]"><img src="'.get_template_directory_uri().'/images/gallery/gallery-image6.jpg" width="312" height="207" /></a></li>					
				</ul>
				</div>
				</div>'
		),
		

		10 => array(
			'section_title'	=> 'Contact',
			'menutitle'		=> 'Contact',
			'outerclass'	=> 'top-grey-box-bg',
			'class'			=> 'top-grey-box',
			'content'		=> '<h4>Call or Drop us an Email</h4><p>bibendum. Pellentesque iaculis sagittis lorem. Nulla facilisi. Integer elementum fringilla consectetur. Nullam volutpat, metus tempus semper lobortis, diam urna commodo urna, nec auctor tortor sapien mollis nunc. Pellentesque rutrum lacinia porttitor. Quisque sit amet mauris nisl. Praesent arcu turpis, blandit non semper elementum, malesuada iaculis dolor.</p>'
		),

		11 => array(
			'section_title'	=> '',
			'outerclass'	=> 'contact-form-section-bg',
			'class'			=> 'contact-form-section',
			'content'		=> '<div class="address">Some Street 123,<br />
									California USA<br /><br />
									<a href="'.esc_url(SKT_URL).'" target="_blank">www.sktthemes.net</a>
								</div>
								<div class="social-icons">
									<ul>
										<li><a href="'.esc_url('#facebook').'"><div class="icon-fb"></div></a></li>
										<li><a href="'.esc_url('#twitter').'"><div class="icon-twitt"></div></a></li>
										<li><a href="'.esc_url('#youtube').'"><div class="icon-ytube"></div></a></li>
										<li><a href="'.esc_url('#rss').'"><div class="icon-rss"></div></a></li>
										<li><a href="'.esc_url('#linkedin').'"><div class="icon-in"></div></a></li><div class="clear"></div>
									</ul>
								</div>'
		),
	);

	$options = array();

	//Basic Settings
	$options[] = array(
		'name' => __('Basic Settings', 'skt-iamone'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Logo', 'skt-iamone'),
		'desc' => __('Upload your main logo here', 'skt-iamone'),
		'id' => 'logo',
		'class' => '',
		'std'	=> '',
		'type' => 'upload');

	$options[] = array(
		'name' => __('Favicon', 'skt-iamone'),
		'desc' => __('Upload favicon for website', 'skt-iamone'),
		'id' => 'favicon',
		'class' => '',
		'std'	=> '',
		'type' => 'upload');

	$options[] = array(
		'name' => __('Custom CSS', 'skt-iamone'),
		'desc' => __('Some Custom Styling for your site. Place any css codes here instead of the style.css file.', 'skt-iamone'),
		'id' => 'style2',
		'std' => '',
		'type' => 'textarea');
		
	//Layout Settings
	$options[] = array(
		'name' => __('Sections', 'skt-iamone'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Number of Sections', 'skt-iamone'),
		'desc' => __('Select number of sections', 'skt-iamone'),
		'id' => 'numsection',
		'type' => 'select',
		'std' => '11',
		'options' => array_combine(range(1,11), range(1,11)) );

	$numsecs = of_get_option( 'numsection', 11 );

	for( $n=1; $n<=$numsecs; $n++){
		$options[] = array(
			'desc' => __("<h3>Section</h3>", 'skt-iamone'),
			'class' => 'toggle_title',
			'type' => 'info');	
	
		$options[] = array(
			'name' => __('Section Title', 'skt-iamone'),
			'id' => 'sectiontitle'.$n,
			'std' => ( ( isset($section_text[$n]['section_title']) ) ? $section_text[$n]['section_title'] : '' ),
			'type' => 'text');

		$options[] = array(
			'name' => __('Menu Title', 'skt-iamone'),
			'id' => 'menutitle'.$n,
			'std' => ( ( isset($section_text[$n]['menutitle']) ) ? $section_text[$n]['menutitle'] : '' ),
			'type' => 'text');

		$options[] = array(
			'name' => __('Section Outer CSS Class', 'skt-iamone'),
			'desc' => __('Set class for outer section.', 'skt-iamone'),
			'id' => 'outerclass'.$n,
			'std' => ( ( isset($section_text[$n]['outerclass']) ) ? $section_text[$n]['outerclass'] : '' ),
			'type' => 'text');

		$options[] = array(
			'name' => __('Section Inner CSS Class', 'skt-iamone'),
			'desc' => __('Set class for inner section.', 'skt-iamone'),
			'id' => 'sectionclass'.$n,
			'std' => ( ( isset($section_text[$n]['class']) ) ? $section_text[$n]['class'] : '' ),
			'type' => 'text');

		$options[] = array(
			'name' => __('Section Content', 'skt-iamone'),
			'id' => 'sectioncontent'.$n,
			'std' => ( ( isset($section_text[$n]['content']) ) ? $section_text[$n]['content'] : '' ),
			'type' => 'editor');
	}

	//SLIDER SETTINGS
	$options[] = array(
		'name' => __('Homepage Slider', 'skt-iamone'),
		'type' => 'heading');
		
	$options[] = array(
		'name' => __('Inner Page Slider', 'skt-iamone'),
		'desc' => __('Show / Hide inner page slider', 'skt-iamone'),
		'id' => 'innerpageslider',
		'type' => 'select',
		'std' => 'hide',
		'options' => array('show'=>'Show', 'hide'=>'Hide') );
		
	$options[] = array(
		'name' => __('Slider Title', 'skt-iamone'),
		'id' => 'header_title',
		'std' => '<h1>I am <span>One</span><br />CREATIVE & MODERN</h1>',
		'type' => 'editor');

	$options[] = array(
		'name' => __('Slider Image 1', 'skt-iamone'),
		'desc' => __('Upload / select image for slide 1', 'skt-iamone'),
		'id' => 'slide1',
		'class' => '',
		'std' => get_template_directory_uri()."/images/slides/slider1.jpg",
		'type' => 'upload');

	$options[] = array(
		'name' => __('Slider Image 2', 'skt-iamone'),
		'desc' => __('Upload / select image for slide 2', 'skt-iamone'),
		'id' => 'slide2',
		'class' => '',
		'std' => get_template_directory_uri()."/images/slides/slider2.jpg",
		'type' => 'upload');

	$options[] = array(
		'name' => __('Slider Image 3', 'skt-iamone'),
		'desc' => __('Upload / select image for slide 3', 'skt-iamone'),
		'id' => 'slide3',
		'class' => '',
		'std' => get_template_directory_uri()."/images/slides/slider3.jpg",
		'type' => 'upload');
		
	$options[] = array(
		'name' => __('Slider Image 4', 'skt-iamone'),
		'desc' => __('Upload / select image for slide 4', 'skt-iamone'),
		'id' => 'slide4',
		'class' => '',
		'std' => '',
		'type' => 'upload');
		
	$options[] = array(
		'name' => __('Slider Image 5', 'skt-iamone'),
		'desc' => __('Upload / select image for slide 5', 'skt-iamone'),
		'id' => 'slide5',
		'class' => '',
		'std' => '',
		'type' => 'upload');


	//Social SETTINGS
	$options[] = array(
		'name' => __('Social Settings', 'skt-iamone'),
		'type' => 'heading');

	$options[] = array(
		'desc' => __('Facebook Url', 'skt-iamone'),
		'id' => 'facebook',
		'std' => '#facebook',
		'type' => 'text',
		'subtype' => 'url');

	$options[] = array(
		'desc' => __('Twitter Url', 'skt-iamone'),
		'id' => 'twitter',
		'std' => '#twitter',
		'type' => 'text',
		'subtype' => 'url');

	$options[] = array(
		'desc' => __('YouTube Url', 'skt-iamone'),
		'id' => 'youtube',
		'std' => '#youtube',
		'type' => 'text',
		'subtype' => 'url');

	$options[] = array(
		'desc' => __('RSS Url', 'skt-iamone'),
		'id' => 'rss',
		'std' => '#rss',
		'type' => 'text',
		'subtype' => 'url');

	$options[] = array(
		'desc' => __('LinkedIn Url', 'skt-iamone'),
		'id' => 'linkedin',
		'std' => '#linkedin',
		'type' => 'text',
		'subtype' => 'url');


	// Support					
	$options[] = array(
		'name' => __('Our Themes', 'skt-iamone'),
		'type' => 'heading');

	$options[] = array(
		'desc' => __('SKT I Am One WordPress theme has been Designed and Created by SKT Themes.', 'skt-iamone'),
		'type' => 'info');	

	 $options[] = array(
		'desc' => __('<a href="'.esc_url(SKT_URL).'" target="_blank"><img src="'.get_template_directory_uri().'/images/sktskill.jpg"></a><p><em><a target="_blank" href="'.esc_url('http://sktthemes.net/themes/iamone-pro/', 'skt-iamone').'">Buy PRO version for only $30 with more features.</a></em></p>', 'skt-iamone'),
		'type' => 'info');	
	
	return $options;
}