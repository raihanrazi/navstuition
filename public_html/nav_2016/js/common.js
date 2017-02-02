"use strict";
define(["jquery","jquery-easing","after-scroll"],
function( $     , jquery_easing , after_scroll){

	after_scroll.maxPerSecond(10);

	var $window = $(window);


	// Scrolling hash links

	$(function() {
		$('a[href*=#]:not([href=#])').click(function() {
			if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {

				var target = $(this.hash);
				target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
				if (target.length) {
					$('html,body').animate({
						scrollTop: target.offset().top-40
					}, 1000);
					return false;
				}
			}
		});
	});


	// Back-to-top

	var showingBackToTop; // = undefined
	after_scroll.on(function(){
		if ($window.scrollTop() > 1500) {
			if (showingBackToTop !== true) {
				$('a.back-to-top').fadeIn('slow');
				showingBackToTop = true;
			}
		} else {
			if (showingBackToTop !== false) {
				$('a.back-to-top').fadeOut('slow');
				showingBackToTop = false;
			}
		}
	});

	$(function(){
		$('a.back-to-top, a.simple-back-to-top').click(function(e){
			$('html, body').animate({
				scrollTop: 0
			},700);
			e.preventDefault();
		});
	});


	// Menu icon

	var showingMenuIcon; // = undefined
	after_scroll.on(function(){
		if ($window.scrollTop() > 180) {
			if (showingMenuIcon !== true) {
				//$('#header').addClass('navbar_expand');
				$('#scrolled_nav').addClass('scrolled_nav_opacity');
				$('#mobile_menu').addClass('mobile_menu_opacity');					
				showingMenuIcon = true;
			}
		} else {
			if (showingMenuIcon !== false) {
				//$('#header').removeClass('navbar_expand');
				$('#scrolled_nav').removeClass('scrolled_nav_opacity');
				$('#mobile_menu').removeClass('mobile_menu_opacity');
				document.getElementById('mobile_box').style.display = 'none';			
				showingMenuIcon = false;				
			}
		}
	});

	$(function() {
		var $mobile_menu = $('#mobile_menu');
		var $mobile_box = $('#mobile_box');

		function hide_account_box() {
			$window.off('mouseup.account_box touchend.account_box');

			$mobile_menu.css("backgroundPosition","0 0");
			$mobile_box.css("display","none");
		}

		function show_account_box() {
			$mobile_menu.css("background-position",'0 100%');
			$mobile_box.css("display","block");

			$window.on('mouseup.account_box touchend.account_box', hide_account_box);
		}

		$mobile_menu.click(show_account_box);

		$mobile_box.on("mouseup touchend",function(e){
			e.stopPropagation();
		});
	});

	
	// Allow numbers only

    $(".cf_num").keydown(function(e) {
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
            (e.keyCode == 65 && ( e.ctrlKey === true || e.metaKey === true ) ) || 
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                 return;
        }
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });

	
	/** put in later
	// Tawk script

	var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
	(function(){
		var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
		s1.async=true;
		s1.src='https://embed.tawk.to/56c5125bda3dc74759135c44/default';
		s1.charset='UTF-8';
		s1.setAttribute('crossorigin','*');
		s0.parentNode.insertBefore(s1,s0);
	})();
	**/

	
});

	
	
	