// JavaScript Document
function menu1() {
	document.getElementById('tab1').className += ' active';
	document.getElementById('tab2').className += 'e tab';
	document.getElementById('tab3').className += 'e tab';
	document.getElementById('tab4').className += 'e tab';
	
	
	var obj1 = document.getElementById('ul1');
	var obj2 = document.getElementById('ul2');
	var obj3 = document.getElementById('ul3');
	var obj4 = document.getElementById('ul4');
	
	if (obj1.style.display != 'inline') {
		obj1.style.display = 'inline';
		obj2.style.display = 'none';
		obj3.style.display = 'none';
		obj4.style.display = 'none';
	}
}
function menu2() {
	document.getElementById('tab2').className += ' active';
	document.getElementById('tab1').className += 'e tab';
	document.getElementById('tab3').className += 'e tab';
	document.getElementById('tab4').className += 'e tab';
	
	var obj1 = document.getElementById('ul1');
	var obj2 = document.getElementById('ul2');
	var obj3 = document.getElementById('ul3');
	var obj4 = document.getElementById('ul4');
	
	if (obj2.style.display != 'inline') {
		obj2.style.display = 'inline';
		obj1.style.display = 'none';
		obj3.style.display = 'none';
		obj4.style.display = 'none';
	}
}

function menu3() {
	document.getElementById('tab3').className += ' active';
	document.getElementById('tab1').className += 'e tab';
	document.getElementById('tab2').className += 'e tab';
	document.getElementById('tab4').className += 'e tab';
	
	var obj1 = document.getElementById('ul1');
	var obj2 = document.getElementById('ul2');
	var obj3 = document.getElementById('ul3');
	var obj4 = document.getElementById('ul4');
	
	if (obj3.style.display != 'inline') {
		obj3.style.display = 'inline';
		obj1.style.display = 'none';
		obj2.style.display = 'none';
		obj4.style.display = 'none';
	}
}

function menu4() {
	document.getElementById('tab4').className += ' active';
	document.getElementById('tab1').className += 'e tab';
	document.getElementById('tab2').className += 'e tab';
	document.getElementById('tab3').className += 'e tab';
	
	var obj1 = document.getElementById('ul1');
	var obj2 = document.getElementById('ul2');
	var obj3 = document.getElementById('ul3');
	var obj4 = document.getElementById('ul4');
	
	if (obj4.style.display != 'inline') {
		obj4.style.display = 'inline';
		obj1.style.display = 'none';
		obj2.style.display = 'none';
		obj3.style.display = 'none';
	}
}




jQuery(function () {

	// Very Top Menu ( TinyNav.js )
	jQuery('#top-nav').tinyNav({
		header: 'Menu'
	});

	// Main Menu ( TinyNav.js )
	jQuery('#nav').tinyNav({
		header: 'Menu'
	});

});