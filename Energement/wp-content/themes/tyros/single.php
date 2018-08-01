<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Tyros
 */

$tyros_options      = tyros_get_options();
$is_alternate       = get_post_meta( get_the_ID(), 'tyros_layout_style', true ) && get_post_meta( get_the_ID(), 'tyros_layout_style', true ) == 'alternate' && function_exists( 'tyros_strap_pl' ) && tyros_strap_pl() ? true : false;  
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
    
                <?php if ( $above_sidebar == 'on' && is_active_sidebar( 'sidebar-above-post' ) ) : ?>

                    <div class="row">
                        
                        <div class="col-md-12">
                        
                            <div class="above-post-area top-banner-text">
                                <?php get_sidebar( 'above-post' ) ?>
                            </div>           
                            
                        </div>            
                        
                    </div>

                    <div class="clear"></div>            

                <?php endif; ?>
            
                <div class="page-content row">
                    
                    <div class="col-md-<?php echo $right_sidebar == 'on' && is_active_sidebar( 1 ) ? '8' : '12'; ?>">
                    
                        <?php if ( $is_alternate ) : ?>
                        
                            <?php get_template_part( 'template-parts/content', 'single-alt' ); ?>
                        
                        <?php else : ?>
                        
                            <?php get_template_part( 'template-parts/content', 'single' ); ?>

                        <?php endif; ?>
                        
                    </div>

                    <?php if ( $right_sidebar == 'on' && is_active_sidebar( 1 ) ) : ?>

                        <div class="col-md-4 tyros-sidebar">
                            <?php get_sidebar( '1' ); ?>
                        </div>

                    <?php endif; ?>

                </div>
                    
                <?php if ( $below_sidebar == 'on' && is_active_sidebar( 'sidebar-below-post' ) ) : ?>

                    <div class="row">
                        
                        <div class="col-md-12">
                        
                            <div class="below-post-area top-banner-text">
                                <?php get_sidebar( 'below-post' ) ?>
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
