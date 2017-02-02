<?php
	class cwpConfig{
		public static $admin_page_menu_name ;
		public static  $admin_page_title 	;
		public static  $admin_page_header 	;
		public static  $admin_template_directory ;
		public static  $admin_template_directory_uri ;
		public static  $admin_uri 	;
		public static $admin_path  ;
		public static  $menu_slug 	;
		public static $structure;
		public static function init(){
			self::$admin_page_menu_name 	 = "Theme Options";
			self::$admin_page_title 		 = "Theme Options";
			self::$admin_page_header	 	 = "Theme Options for CreativeMag";
			self::$admin_template_directory_uri  = get_template_directory_uri() . '/admin/layout';
			self::$admin_template_directory  = get_template_directory() . '/admin/layout';
			self::$admin_uri  		= 	get_template_directory_uri() . '/admin/'; 
			self::$admin_path 	 	= 	get_template_directory() . '/admin/';
			self::$menu_slug  		= 	"theme_options";
			self::$structure	= array(
						array(
							 "type"=>"tab",
							 "name"=>"General",
							 "options"=>array(
								array(
									"type"=>"image",
									"name"=>"Header logo",
									"description"=>"Select the logo image for the header",
									"id"=>"CMlogo",
									"default"=>get_template_directory_uri()."/images/conceptdesign-logo.png"
								),
								array(
									
									"type"=>"image",
									"name"=>"Footer logo",
									"description"=>"Select the logo for the footer",
									"id"=>"CMlogof", 
									"default"=>get_template_directory_uri()."/images/conceptdesign-logo.png"
								),
								array(
									
									"type"=>"textarea_disabled",
									"name"=>"Custom javascript",
									"description"=>"Available in the PRO version",
									"id"=>"CMjs", 
									"default"=>""
								),
								array(
									
									"type"=>"textarea_disabled",
									"name"=>"Custom CSS",
									"description"=>"Available in the PRO version",
									"id"=>"CMcss", 
									"default"=>""
								),
							)
						),array(
							"type"=>"tab",
							"name"=>"Socials",
							"options"=>array(
								array(
									"type"=>"input_text",
									"name"=>"Facebook",
									"description"=>"Url of your facebook page",
									"id"=>"CMfb",
									"default"=>""
								),
								array(
									"type"=>"input_text",
									"name"=>"Twitter",
									"description"=>"Url of your twitter page",
									"id"=>"CMtw",
									"default"=>""
								),
								array(
									"type"=>"input_text",
									"name"=>"RSS",
									"description"=>"Url of rss feed",
									"id"=>"CMrss",
									"default"=>""
								), 
								array(
									"type"=>"input_text_disabled",
									"name"=>"GooglePlus",
									"description"=>"Available in the PRO version",
									"id"=>"CMgplus",
									"default"=>""
								), 
								array(
									"type"=>"input_text_disabled",
									"name"=>"Pinterest",
									"description"=>"Available in the PRO version",
									"id"=>"CMpinterest",
									"default"=>""
								) 
							)
						
						),array(
							"type"=>"tab",
							"name"=>"Banner",
							"options"=>array(
								array(
									"type"=>"textarea",
									"name"=>"Banner header",
									"description"=>"Code for your banner from header (max.970 x 90 ) ",
									"id"=>"CMbh",
									"default"=>""
								) 
							)
						
						) 
			
					); 
			 
		}	 
	
	} 
