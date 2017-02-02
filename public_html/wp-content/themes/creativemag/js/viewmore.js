// JavaScript Document


jQuery(document).ready(function(e) {
	
	jQuery(".view_more_comm").click(function(){
		
		jQuery(".hidden_comm").each(function(){
			jQuery(this).css("display","compact").hide();
			jQuery(this).show(200);
		});
		
		jQuery(".view_more_comm").hide();
	});

});