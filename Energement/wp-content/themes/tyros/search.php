<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Tyros
 */

get_header(); 

$tyros_options      = tyros_get_options();
$alternate_blog     = isset( $tyros_options['index_blog_layout_style'] ) ? $tyros_options['index_blog_layout_style'] : 'masonry'; 
$strap_check        = function_exists( 'tyros_strap_pl' ) && tyros_strap_pl() ? true : false;

?>

<section id="primary" class="content-area">

    <main id="main" class="site-main">

        <div class="container">
            
            <div class="page-content row">
    
                    <?php
                    if ( have_posts() ) : ?>

                        <div class="col-md-12">
                
                            <header class="page-header">
                                <h1>
                                    <?php printf( esc_html__( 'Search Results for: %s', 'tyros' ), '<span>' . get_search_query() . '</span>' ); ?>
                                </h1>
                            </header><!-- .page-header -->
                            
                        </div>

                        <div class="col-md-<?php echo is_active_sidebar( 1 ) ? '8' : '12'; ?>">
                        
                            <?php if ( $alternate_blog == 'carousel' && $strap_check ) : ?>

                                <div id="tyros-carousel-blog-wrap" class="owl-carousel owl-theme">

                            <?php elseif ( $alternate_blog == 'alternate' && $strap_check ) : ?>

                                <div id="tyros-main-blog-wrap" class="row">

                            <?php else : ?>

                                <div id="tyros-alt-blog-wrap" class="<?php echo $alternate_blog == 'masonry2' && $strap_check ? 'masonry2' : ''; ?>">

                                    <div id="masonry-blog-wrapper">

                                        <div class="grid-sizer"></div>
                                        <div class="gutter-sizer"></div>

                            <?php endif; ?>
                            
                                <?php
                                /* Start the Loop */
                                while ( have_posts() ) : the_post();

                                    if ( $alternate_blog == 'carousel' && $strap_check ) { 
                                        get_template_part('template-parts/content', 'posts' );
                                    } elseif ( $alternate_blog == 'alternate' && $strap_check ) {  
                                        get_template_part('template-parts/content', 'posts-alt' );
                                    } elseif ( $alternate_blog == 'masonry2' && $strap_check ) {  
                                        get_template_part('template-parts/content', 'posts-masonry2' );
                                    } else {
                                        get_template_part('template-parts/content', 'posts-masonry' );
                                    }    

                                endwhile; ?>
                            
                            <?php if ( $strap_check && ( $alternate_blog == 'carousel' || $alternate_blog == 'alternate' ) ) : ?>

                                </div>  
                                
                                <div class="clear"></div>

                            <?php else : ?>

                                    </div>

                                </div>

                            <?php endif; ?>

                            <?php if ( $alternate_blog != 'carousel' || !$strap_check ) : ?>

                                <div class="pagination-links">
                                    <?php echo the_posts_pagination( array( 'mid_size' => 1 ) ); ?>
                                </div>

                            <?php endif; ?>
                                        
                        </div>
                        
                        <?php if ( is_active_sidebar( 1 ) ) : ?>

                            <div class="col-md-4 tyros-sidebar">
                                <?php get_sidebar( '1' ); ?>
                            </div>

                        <?php endif; ?>

                    <?php else : ?>

                        <div class="col-md-<?php echo is_active_sidebar( 1 ) ? '8' : '12'; ?>">
                        
                            <?php get_template_part( 'template-parts/content', 'none' ); ?>

                        </div>
                        
                        <?php if ( is_active_sidebar( 1 ) ) : ?>

                            <div class="col-md-4 tyros-sidebar">
                                <?php get_sidebar( '1' ); ?>
                            </div>

                        <?php endif; ?>
                            
                    <?php endif; ?>
                
            </div>
                    
        </div>

    </main><!-- #main -->
        
</section><!-- #primary -->

<?php get_footer();
