<?php
	global $creativemag_options;
	
	
?>						</div>
					</div>
					<div id="fb-root"></div>
				</div> 
				<footer id="colophon" class="site-footer" role="contentinfo">
					<div id="footer">
						<div class="footer-holder">
						<strong class="logo">
								  
								<?php if ( $creativemag_options['CMlogof']  != '' ): ?>  
									<a href="<?php echo get_site_url(); ?>"><img width="227" height="65" class="special-footer" src="<?php 
									
										echo $creativemag_options['CMlogof'];
										?>" /></a>  
								<?php else: ?>
									<a href="<?php echo get_site_url(); ?>"><img class="special" src="<?php bloginfo("template_directory"); ?>/images/conceptdesign-logo.png" /></a>  
								<?php endif; ?> 
						</strong> 
						<ul>
							<?php wp_nav_menu( array('container' => 'div','theme_location' => 'bottom_nav',"depth"=>1  ) ); ?>
						</ul>
						<p class="copyr">&copy;<?php echo date("Y"); ?> <?php bloginfo('name'); ?>. 
						<?php 
						_e('Theme developed by', 'creativeMag');
						?>
						<a href="http://themeisle.com/themes/creativemag/?utm_source=themefooter&utm_medium=logo&utm_campaign=themefooter" target="_blank">ThemeIsle</a><?php _e(' powered by ','cwp'); ?><a href="http://wordpress.org/" target="_blank"><?php _e('WordPress','cwp'); ?></a>
						</p>
						</div>
					</div>
				</footer>
			</div> 
			<div class="color-line-footer"></div> 
			<div id="fb-root"></div>
		</div> 
	</div> 
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script> 
<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
 }(document, 'script', 'facebook-jssdk'));</script>	
 <script src="http://platform.twitter.com/widgets.js" type="text/javascript"></script>
 <script type="text/javascript">
 (function() {
  var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
  po.src = 'https://apis.google.com/js/plusone.js';
	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
 })();
 </script>
<?php wp_footer(); ?>
 </body>
</html>