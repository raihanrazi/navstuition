"use strict";
require(["jquery","jquery-easing","after-scroll","common","prettyPhoto"],
function( $      , jquery_easing , after_scroll , common , prettyPhoto){

	var $window = $(window);
	

	// Background image

	function resize_top_container(){
		$('#main_top_container').css({
			height: $window.height(),
			width: $window.width()
		});
	}

	$(function() {
		resize_top_container();
	});

	var window_width;
	$window.on('resize',function(){
		var current_width = $window.width();
		if (current_width !== window_width){
			window_width = current_width;
			resize_top_container();
		}
	});



	// Tuition animation

	$(function(){

		var $animation_elements = $('.pl_container');
		var $animation_elements_odd = $('.pl_container_odd');
		var $arrow_trigger = $('.arrow_trigger');

		function check_if_in_view(){
			var window_height = $window.height();
			var window_top_position = $window.scrollTop() - 100;
			var window_bottom_position = (window_top_position + window_height);

			var element_height = $animation_elements.outerHeight();
			var element_top_position = $animation_elements.offset().top;
			var element_bottom_position = (element_top_position + element_height);

			var arrow_trigger_height = $arrow_trigger.outerHeight();	
			var arrow_trigger_top_position = $arrow_trigger.offset().top;
			var arrow_trigger_bottom_position = (arrow_trigger_top_position + arrow_trigger_height);
			
			if (arrow_trigger_bottom_position >= window_top_position &&
					arrow_trigger_top_position <= window_bottom_position){			
				$('.more_arrow_box').addClass('fadeOut');
				setTimeout(function(){
					$("#more_arrow_container").css('display', 'none');
				},500);			
			}

			if (element_bottom_position >= window_top_position &&
					element_top_position <= window_bottom_position){
				// Don't even check again
				after_scroll.off(check_if_in_view);
				$.each($animation_elements, function(){
					var $element = $(this);
					if ($element.hasClass('pl_container_odd')){
						$element.addClass('fadeInDown animate_fadeIn');
					} else {
						$element.addClass('fadeInUp animate_fadeIn');
					}
				});
			} else {
			}
		}

		$window.on('resize', check_if_in_view);
		after_scroll.on(check_if_in_view);
		check_if_in_view();
	});
	
	

	// Pricing animation

	$(function(){

		var $animation_elements = $('.pricing_box');

		function check_if_in_view(){
			var window_height = $window.height();
			var window_top_position = $window.scrollTop() - 100;
			var window_bottom_position = (window_top_position + window_height);

			var element_height = $animation_elements.outerHeight();
			var element_top_position = $animation_elements.offset().top;
			var element_bottom_position = (element_top_position + element_height);


			if (element_bottom_position >= window_top_position &&
					element_top_position <= window_bottom_position){
				// Don't even check again
				after_scroll.off(check_if_in_view);
				$.each($animation_elements, function(){
					var $element = $(this);
					if ($element.hasClass('pricing_box')){
						$element.addClass('zoomIn animate_zoomIn');
					}
				});
			}else{
			}
		}

		$window.on('resize', check_if_in_view);
		after_scroll.on(check_if_in_view);
		check_if_in_view();
	});	



	// Contact animation

	$(function(){

		var $animation_elements = $('.contact_side_image');

		function check_if_in_view(){
			var window_height = $window.height();
			var window_top_position = $window.scrollTop() - 100;
			var window_bottom_position = (window_top_position + window_height);

			var element_height = $animation_elements.outerHeight();
			var element_top_position = $animation_elements.offset().top;
			var element_bottom_position = (element_top_position + element_height);


			if (element_bottom_position >= window_top_position &&
					element_top_position <= window_bottom_position){
				// Don't even check again
				after_scroll.off(check_if_in_view);
				$.each($animation_elements, function(){
					var $element = $(this);
					if ($element.hasClass('contact_side_image')){
						$element.addClass('fadeIn animate_fadeIn');
					}
				});
			}else{
			}
		}

		$window.on('resize', check_if_in_view);
		after_scroll.on(check_if_in_view);
		check_if_in_view();
	});	
	
	
	// Register complete, hide form and scroll to section

	function register_complete(){
		$("#register_form_container").css('display', 'none');	
		$("#register_form_container_complete").css('display', 'block');			
		$('html, body').animate({				
			scrollTop: $('#register').offset().top
		}, 'slow');
	};


	/**
	// Same height expertise containers
	
	$(document).ready(function() {
		var pr_container_01 = $('#pr_container_01');
		var pr_container_02 = $('#pr_container_02');
		var pr_container_03 = $('#pr_container_03');		
		pr_container_02.height(pr_container_01.height());
		pr_container_03.height(pr_container_01.height());		
	});
	**/
	
	
	// Same height expertise containers	
	
	$(document).ready(function(){
		var height = Math.max($("#pr_container_01").height(), $("#pr_container_02").height(), $("#pr_container_03").height(), $("#pr_container_04").height());
		$("#pr_container_01").height(height);
		$("#pr_container_02").height(height);
		$("#pr_container_03").height(height);
		$("#pr_container_04").height(height);			
	});
	
	$window.on('resize',function(){	
		$("#pr_container_01").css('height','auto');
		$("#pr_container_02").css('height','auto');
		$("#pr_container_03").css('height','auto');
		$("#pr_container_04").css('height','auto');				
		
		var height = Math.max($("#pr_container_01").height(), $("#pr_container_02").height(), $("#pr_container_03").height(), $("#pr_container_04").height());
		$("#pr_container_01").height(height);
		$("#pr_container_02").height(height);
		$("#pr_container_03").height(height);
		$("#pr_container_04").height(height);		
	});
	
	
	// demo videos
	
	$(document).ready(function(){
		$("#demo_lectures_btn a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'fast',slideshow:10000,hideflash:true});
	});	
	

	// Numbers only
	
	function numbersonly(myfield, e, dec){
		alert('boo');
		var key;
		var keychar;
		if (window.event)
			key = window.event.keyCode;
		else if (e)
			key = e.which;
		else
			return true;
			
		keychar = String.fromCharCode(key);
		if ((key==null) || (key==0) || (key==8) || (key==9) || (key==13) || (key==27) )
			return true;
		
		else if ((("0123456789").indexOf(keychar) > -1))
			return true;
		
		else if (dec && (keychar == ".")){
			myfield.form.elements[dec].focus();
			return false;
		}
		else
			return false;
	}
	
});



	
	

	
	
	
	