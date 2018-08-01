<?php
/**
 * The template for displaying all pages
 *
 * @package Tyros
 */

$tyros_options     = tyros_get_options();
$above_sidebar      = get_post_meta( get_the_ID(), 'tyros_above_sidebar_toggle', true ) ? get_post_meta( get_the_ID(), 'tyros_above_sidebar_toggle', true ) : 'on';
$below_sidebar      = get_post_meta( get_the_ID(), 'tyros_below_sidebar_toggle', true ) ? get_post_meta( get_the_ID(), 'tyros_below_sidebar_toggle', true ) : 'on';
$right_sidebar      = get_post_meta( get_the_ID(), 'tyros_right_sidebar_toggle', true );
if ( empty( $right_sidebar ) ) {
    $right_sidebar = isset( $tyros_options['tyros_single_layout'] ) && $tyros_options['tyros_single_layout'] == 'col2r' ? 'on' : 'off';
}

get_header(); ?>

<div id="primary" class="content-area">

    <main id="main" class="site-main">

        <div class="container">
    
            <?php while ( have_posts() ) : the_post(); ?>
    
                <?php if ( $above_sidebar == 'on' && is_active_sidebar( 'sidebar-above-page' ) ) : ?>

                    <div class="row">
                        
                        <div class="col-md-12">
                        
                            <div class="above-page-area top-banner-text">
                                <?php get_sidebar( 'above-page' ) ?>
                            </div>           
                            
                        </div>            
                        
                    </div>

                    <div class="clear"></div>            

                <?php endif; ?>
            
                <div class="page-content row">
                    
                    <div class="col-md-<?php echo $right_sidebar == 'on' && is_active_sidebar( 1 ) ? '8' : '12'; ?>">
                    
                        <?php get_template_part( 'template-parts/content', 'page' ); ?>
                        
                    </div>

                    <?php if ( $right_sidebar == 'on' && is_active_sidebar( 1 ) ) : ?>

                        <div class="col-md-4 tyros-sidebar">
                            <?php get_sidebar( '1' ); ?>
                        </div>

                    <?php endif; ?>

                </div>
                    
                <?php if ( $below_sidebar == 'on' && is_active_sidebar( 'sidebar-below-page' ) ) : ?>

                    <div class="row">
                        
                        <div class="col-md-12">
                        
                            <div class="below-page-area top-banner-text">
                                <?php get_sidebar( 'below-page' ) ?>
                            </div>           
                            
                        </div>            
                        
                    </div>

                    <div class="clear"></div>            

                <?php endif; ?>

            <?php endwhile; // end of the loop. ?>

        </div>
        
    </main><!-- #primary -->
    
</div><!-- #primary -->

<?php get_footer();
