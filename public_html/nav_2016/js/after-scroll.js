/**
*** Copyright (C) 2014 Ben Schmidt. MIT License.
**/

"use strict";
define(['jquery'],
function($      ){

	var inhibit = false;
	var callbacks = [];
	var delay = 30;

	function on(callback) {
		callbacks.push(callback);
	}

	function off(callback) {
		for (var c=0;c<callbacks.length;c++) {
			if (callbacks[c]===callback) {
				callbacks.splice(c,1);
				break;
			}
		}
	}

	function maxPerSecond(fps) {
		if (fps > 500) delay = 0;
		else delay = Math.floor(1000 / fps);
	}

	function onScroll(event) {
		if (inhibit) return true;
		inhibit = true;
		setTimeout(function(){
			inhibit = false;
			for (var c=0;c<callbacks.length;c++) callbacks[c](event);
		},delay);
		return true;
	}

	$(window).scroll(onScroll);

	return {
		on: on,
		off: off,
		maxPerSecond: maxPerSecond
	}
});
