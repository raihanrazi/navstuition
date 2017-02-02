<?php
/**
 * The template for displaying searchform.
 */
?>
<form method="get" class="searchform formsearch" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="text" class="field" name="s" value="<?php _e( 'Enter search keyword' , 'kingdom' ); ?>" />
	<input type="submit" class="submit" name="submit" value="" />
</form>
