<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Tyros
 */

?>
<?php $tyros_options = tyros_get_options(); ?>

<article class="item-page">

    <h2 class="post-title">
        <?php the_title(); ?>
    </h2>

    <div class="entry-content">
        
        <?php the_content(); ?>
        
        <?php 

        wp_link_pages(array(
            'before' => '<div class="page-links">' . __( 'Pages:', 'tyros' ),
            'after' => '</div>',
        ));

        ?>

    </div>

</article>