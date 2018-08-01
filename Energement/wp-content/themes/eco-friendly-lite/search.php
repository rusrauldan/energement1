<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package Eco Friendly Lite
 */
get_header(); ?>
<div class="container">
     <div class="page_content">
        <section class="site-main">
            <div class="blog-post">
				<?php if ( have_posts() ) : ?>
                    <header>
                        <h1 class="entry-title"><?php printf( __( 'Search Results for: %s', 'eco-friendly-lite' ), get_search_query() ); ?></h1>
                    </header>
                    <?php while ( have_posts() ) : the_post(); 
						get_template_part( 'content', 'search' ); ?>
                    <?php endwhile; 
						the_posts_pagination(); 
						else : ?>
                    <?php get_template_part( 'no-results', 'search' );
						endif; ?>
            </div><!-- blog-post -->
        </section>      
       <?php get_sidebar();?>       
        <div class="clear"></div>
    </div><!-- site-aligner -->
</div><!-- container -->
<?php get_footer(); ?>