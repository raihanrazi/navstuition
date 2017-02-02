<?php
/**
 * Template Name: Front Page
 */

get_header(); 
?>

	<?php
    if( of_get_option('numsection', true) ) { 
        $numSections = esc_attr( of_get_option('numsection', true) );
        for( $s=1; $s<=absint($numSections); $s++ ){ 
            $title 			= ( of_get_option('sectiontitle'.absint($s), true) != '' ) ? esc_html( of_get_option('sectiontitle'.absint($s), true) ) : '';
            $class			= ( of_get_option('sectionclass'.absint($s), true) != '' ) ? esc_html( of_get_option('sectionclass'.absint($s), true) ) : '';
            $content		= ( of_get_option('sectioncontent'.absint($s), true) != '' ) ? of_get_option('sectioncontent'.absint($s), true) : ''; 
            $outerclass		= ( of_get_option('outerclass'.absint($s), true) != '' ) ? of_get_option('outerclass'.absint($s), true) : '';
            ?>
            <section id="section<?php echo absint($s);?>" class="<?php echo esc_attr(( of_get_option('menutitle'.absint($s), true) != '' ) ? 'menu_page' : '');?> <?php if( $outerclass ) {  echo esc_attr($outerclass);} ?>">
                    <div class="<?php echo ( (absint($s>22)) && $class=='') ? 'top-grey-box' : $class; ?> middle-align">
                        <?php if( $title != '' ) { ?>
                        <h1><?php echo esc_html($title); ?></h1>
                    <?php } ?>
                    <?php skt_iamone_the_content_format($content); ?>
                     </div><!-- middle-align -->
                    <div class="clear"></div>
            </section><div class="clear"></div>
            <?php if($class == 'top-grey-box') { ?>
                <div class="bottom-shape"></div>
                <?php } ?>
            <?php 
        }
    }
    ?>

<?php get_footer(); ?>