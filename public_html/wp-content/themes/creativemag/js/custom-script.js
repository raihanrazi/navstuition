jQuery(document).ready(function () {
  var full_width = 0;
 
    jQuery("#site-navigation-main ul#nav:first > li").each(function( index ) {    
 
        if((jQuery(this).width() + full_width) > 550) {
 
            jQuery(this).remove();
 
        }
 
        full_width = full_width + jQuery(this).width(); 
 
    });
});	