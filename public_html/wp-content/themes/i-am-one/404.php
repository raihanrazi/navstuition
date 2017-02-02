<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package SKT I Am One
 */

get_header(); ?>

<div class="content-area">
    <div class="middle-align">
        <div class="error-404 not-found" id="sitefull">
            <header class="page-header">
                <h1 class="title-404"><?php _e( '<strong>404</strong> Not Found', 'skt-iamone' ); ?></h1>
            </header><!-- .page-header -->
            <div class="page-content">
                <p class="text-404"><?php _e( 'Looks like you have taken a wrong turn.....<br />Don\'t worry... it happens to the best of us.', 'skt-iamone' ); ?></p>
                <?php get_search_form(); ?>
                <?php the_widget( 'WP_Widget_Recent_Posts' ); ?>
                <?php if ( skt_iamone_categorized_blog() ) : // Only show the widget if site has multiple categories. ?>
                    <div class="widget widget_categories">
                        <h2 class="widgettitle"><?php _e( 'Most Used Categories', 'skt-iamone' ); ?></h2>
                        <ul>
                            <?php
                            wp_list_categories( array(
                                'orderby'    => 'count',
                                'order'      => 'DESC',
                                'show_count' => 1,
                                'title_li'   => '',
                                'number'     => 10,
                            ) );
                            ?>
                        </ul>
                    </div><!-- .widget -->
                <?php endif; ?>
                <?php
                $archive_content = '<p>' . sprintf( __( 'Try looking in the monthly archives. %1$s', 'skt-iamone' ), convert_smilies( ':)' ) ) . '</p>';
                the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );
                ?>
                <?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>
            </div><!-- .page-content -->
        </div>
        <div class="clear"></div>
    </div>
</div>

<?php get_footer(); ?>