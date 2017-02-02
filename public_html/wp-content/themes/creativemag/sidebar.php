
	<?php
		if(is_active_sidebar('right-sidebar' )) : 
		
	?>
		<div id="sidebar">
			<?php dynamic_sidebar("right-sidebar") ; ?>
		</div>
	<?php else:  ?>	<div id="sidebar">
		<aside  class="  sidebar-box clear">
		
			<header class="widget-title-sidebar-wrap"><h1 class="widget-title-sidebar"><?php
				_e("Subscribe","creativeMag");
			?></h1></header> 
			<?php
				the_widget ("FeedburnerEmailWidget");
			?>
		</aside> 
		
			
		<aside  class="  sidebar-box clear"> 			
			<?php
				the_widget ("TabsAreaWidget");
			?> 
		</aside>
		<aside  class="  sidebar-box clear">
			<header class="widget-title-sidebar-wrap"><h1 class="widget-title-sidebar"><?php
				_e("Social","creativeMag");
			?></h1></header>			
			<?php
				the_widget ("cwpSocial");
			?> 
		</aside>
		<aside  class="  sidebar-box clear">
			<header class="widget-title-sidebar-wrap"><h1 class="widget-title-sidebar"><?php
				_e("About me","creativeMag");
			?></h1></header>			
			<?php
				the_widget ("cwpAbout");
			?> 
		</aside>
	</div>  
	<?php endif; ?>
				
        
        