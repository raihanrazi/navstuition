==================
WP BARRISTER THEME
==================
Copyright (c) 2013 by WP Dev Shed (http://wpdevshed.com/)
This Theme is distributed under the terms of the GNU GPL.

===========
ABOUT Theme
=========== 
WP Barrister is a corporate theme. It is especially well suited to professional services companies who want to profile their staff. It comes bundled with our optional People profile plugin which makes it easy to deploy an attractive staff profile page with links to individual staff profiles including images, biographies and social media links.

The theme is fully responsive and comes with many out of the box customization options inluding the ability to easily set your own logo, change the default theme colors, choose from a range of background images or upload your own, or choose an alternative home page layout with dedicated widget area and background slider. Of course you can also use it as a regular blog template as well. The default home page design features a contemporary mason style layout.

This theme is compatible with Wordpress Version 3.4 and above and it supports the new theme customization API (https://codex.wordpress.org/Theme_Customization_API).

Supported browsers: Firefox, Opera, Chrome, Safari and IE9+ (Some css3 styles like shadows, rounder corners and 2D transform are not supported by IE8 and below).

For free themes support, please contact us http://wpdevshed.com/contact/

============================================
Images and Graphics Copyright/License Info
============================================
 * All the image graphics and icons bundled with this theme are created by the author (WP Dev Shed) and licensed under the GNU GPL.


============================================
This theme uses Toolbox as a theme backbone
============================================
 * Toolbox (http://wordpress.org/extend/themes/toolbox)
 * Copyright (c) Automattic (http://automattic.com)
 * Available under the terms of GNU GPL.
 
 
======================================
This theme uses Bones as a design tool
======================================
 * Bones (http://themble.com/bones)
 * Copyright (c) Eddie Machado (http://eddiemachado.com/)
 * This is totally free and under WTFPL license (Please read http://themble.com/bones/ for more information)


=====================================
This theme is bundled with Modernizr 
=====================================
 * Modernizr v2.6.2 (www.modernizr.com)
 * Modernizr is a JavaScript library that detects HTML5 and CSS3 features in the user’s browser.
 * Copyright (c) Faruk Ates, Paul Irish, Alex Sexton
 * Available under the BSD and MIT licenses: www.modernizr.com/license/


=================================
This theme is bundled with Cycle2
=================================
 * Cycle2 v20130203 (http://jquery.malsup.com/cycle2/)
 * Cycle2 is a versatile slideshow plugin for jQuery built around ease-of-use. It supports a declarative initialization style that allows full customization without any scripting.
 * Copyright © 2012 M. Alsup (https://github.com/malsup)
 * The Cycle2 plugin is dual licensed under the MIT (http://malsup.github.com/mit-license.txt) and GPL (http://malsup.github.com/gpl-license-v2.txt) licenses.
 

=======================================
This theme is bundled with imagesLoaded
=======================================
 * imagesLoaded v3.0.2 (http://desandro.github.io/imagesloaded/)
 * JavaScript is all like "You images done yet or what?" Detect when images have been loaded.
 * Released under the MIT License. (http://desandro.mit-license.org/)
 * This project has a storied legacy (https://github.com/desandro/imagesloaded/graphs/contributors). Its current incarnation was developed by Tomas Sardyha @Darsain and David DeSandro @desandro.
 

==================================
This theme is bundled with Masonry
==================================
 * Masonry v3.0.0 (http://masonry.desandro.com)
 * Masonry is a JavaScript grid layout library. It works by placing elements in optimal position based on available vertical space, sort of like a mason fitting stones in a wall.
 * Released under the MIT license. (http://desandro.mit-license.org/)
 * Copyright David DeSandro (http://desandro.com/)
 

================================================
This theme is bundled with TGM-Plugin-Activation
================================================
 * TGM-Plugin-Activation v2.3.6 (https://github.com/thomasgriffin/TGM-Plugin-Activation)
 * Plugin installation and activation for WordPress themes.
 * Copyright (c) 2012, Thomas Griffin (thomas@thomasgriffinmedia.com)
 * http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 
 
=================================
CHANGELOG
=================================
Version 1.0.7
 * modified the email social icon to use the correct mailto protocol instead of http
 * replaced the 'is_email' with 'sanitize_email' for the email sanitize callback setting
 * added google+ social icon to the people profile template (single view)

Version 1.0.6
 * updated the pagination function to fix the  double slash (//) appearing on the URL when hovering on the pagination links
 
Version 1.0.5
 * added jquery fix for the footer issue in Safari
 * removed the bundled Masonry script and enqueued the built-in WP script instead (jquery-masonry), this also fixes the grid boxes layout issue on Safari
 * added unminified version of imagesLoaded script
 
Version 1.0.4
 * wp_barrister_pagination() now supports core paginate_links() function
 * used a proper secondary query in index.php and people-post-type-main.php
 * plugin activation script now refers to Plugins as recommended, not required
 * used pre_get_posts to filter main query to ignore sticky posts
 * added sanitize callbacks to customizer settings
 
Version 1.0.3
 * removed the bundled "People" custom post type plugin and used the one uploaded to WPORG repository instead (People Profile CPT)
 
Version 1.0.2
 * Resolved the missing images issue in media library when setting a featured image
 * Removed the default background images options
 
Version 1.0.1
 * Fixed Theme URI in styles.css
 * Some php error and code fixes
 * Footer credit updated
 
Version 1.0
 * First public release