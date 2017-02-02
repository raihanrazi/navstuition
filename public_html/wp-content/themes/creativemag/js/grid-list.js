function equalHeight(group) {
	var tallest = 0;
	group.each(function() {
		
		var thisHeight = jQuery(this).height();
		if(thisHeight > tallest) {
			tallest = thisHeight;
		}
	});
	group.height(tallest);
}
/*
jQuery(document).ready(function(){
	var colors = ["#79c91e","#e5749f","#31c4ee","#ffbc00","#bf78cf"];
	
	
	jQuery('#nav li.has-drop-down').each(function() {
		jQuery(this).mouseover(function() {
			var rand = Math.floor(Math.random()*colors.length);
			var col = colors[rand];
			jQuery(this).css('border-top-color',colors[rand]);
			jQuery(this).css('border-top-width','2px');
			jQuery(this).css('border-top-style','solid');
		});
        jQuery(this).mouseout(function() {
			jQuery(this).css("border-top","none");
		});
    });
*/
jQuery(document).ready(function(){
	var borderclass = ["border-green","border-pink","border-blue","border-yellow","border-purple"];
	
	var i=0;
//	jQuery('#nav li.has-drop-down').each(function() {
	jQuery('#nav>li').each(function() {
		
		jQuery(this).addClass( borderclass[i] );
		
		if( i < 4) 	i++;
			else 	i-=4;
	});
	equalHeight(jQuery(".grid"));
	jQuery("li.switcher").bind("click", function(e){
		e.preventDefault();
		
		var theid = jQuery(this).attr("id");
		var theproducts = jQuery("article.test");
		var classNames = jQuery(this).attr('class').split(' ');
		
		//var gridthumb = "images/products/grid-default-thumb.png";
		//var listthumb = "images/products/list-default-thumb.png";
		
		if(jQuery(this).hasClass("active")) {
			// if currently clicked button has the active class
			// then we do nothing!
			return false;
		} else {
			// otherwise we are clicking on the inactive button
			// and in the process of switching views!
  			if(theid == "gridview") {
				window.name = "grid"; 
                            
				//jQuery(this).addClass("active");
				//jQuery("#listview").removeClass("active");
			
				//jQuery("#listview").children("img").attr("src","images/list-view.png");
			
				//var theimg = jQuery(this).children("img");
				//theimg.attr("src","images/grid-view-active.png");
			
				// remove the list class and change to grid
				theproducts.removeClass("list");
				theproducts.addClass("grid");
 
				equalHeight(jQuery(".grid"));
				
				if (jQuery(this).hasClass('gridview')) {
					jQuery(this).removeClass('gridview');
					jQuery(this).addClass('gridview-hover');
					jQuery('#listview').removeClass('listview-hover');
					jQuery('#listview').addClass('listview');
					
				}
				else if (jQuery(this).hasClass('gridview-hover')) {
					jQuery(this).removeClass('gridview-hover');
					jQuery(this).addClass('gridview');
					jQuery('#listview').removeClass('listview');
					jQuery('#listview').addClass('listview-hover');
				}
				
				// update all thumbnails to larger size
				//jQuery("img.thumb").attr("src",gridthumb);
			}
			
			else if(theid == "listview") {
				window.name = "list";
				//jQuery(this).addClass("active");
				//jQuery("#gridview").removeClass("active");
					
				//jQuery("#gridview").children("img").attr("src","images/grid-view.png");
					
				//var theimg = jQuery(this).children("img");
				//theimg.attr("src","images/list-view-active.png");
					
				// remove the grid view and change to list
				theproducts.removeClass("grid")
				theproducts.addClass("list");
//				jQuery(".margin-right").removeClass("margin-right");
				theproducts.css("height","auto");
				
				if (jQuery(this).hasClass('listview')) {
					jQuery(this).removeClass('listview');
					jQuery(this).addClass('listview-hover');
					jQuery('#gridview').removeClass('gridview-hover');
					jQuery('#gridview').addClass('gridview');
				}
				else if (jQuery(this).hasClass('listview-hover')) {
					jQuery(this).removeClass('listview-hover');
					jQuery(this).addClass('listview');
					jQuery('#gridview').removeClass('gridview');
					jQuery('#gridview').addClass('gridview-hover');
				}
				// update all thumbnails to smaller size
				//jQuery("img.thumb").attr("src",listthumb);
			} 
		}
	});
});