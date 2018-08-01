<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Tyros
 */

get_header(); ?>

<div id="primary" class="content-area">

    <main id="main" class="site-main">

        <div class="container">
            
            <div class="page-content row">

                <div class="col-md-<?php echo is_active_sidebar( 1 ) ? '8' : '12'; ?>">

                    <section class="error-404 not-found">

                        <header class="page-header">
                            <h1><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'tyros' ); ?></h1>
                        </header><!-- .page-header -->

                        <div class="page-content">

                            <p>
                                <?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'tyros' ); ?>
                            </p>

                            <?php get_search_form(); ?>

                        </div><!-- .page-content -->

                    </section><!-- .error-404 -->

                </div>

                <?php if ( is_active_sidebar( 1 ) ) : ?>

                    <div class="col-md-4 tyros-sidebar">
                        <?php get_sidebar( '1' ); ?>
                    </div>

                <?php endif; ?>

            </div>
                    
        </div>
        
    </main><!-- #primary -->
    
</div><!-- #primary -->

<?php get_footer();
