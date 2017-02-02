<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package SKT I Am One
 */
?>

 <div id="footer">
        		<div class="footer-inner middle-align">
                			<h1><a href="#"><?php bloginfo('name'); ?></a></h1>
                            <p>Copyright <?php echo date('Y'); ?></p><br />
                            <p><?php skt_iamone_credit_link(); ?></p>
                </div><!-- footer-inner -->
        </div><!-- footer -->
        </div><!-- main-container -->
  
<?php wp_footer(); ?>
</body>
</html>