<?php
/*
 * Posts Template
 * @author bilal hassan <info@smartcatdesign.net>
 * 
 */

$tyros_options = tyros_get_options();

?>

<div class="item-post carousel-blog-item">
    
    <?php if ( isset( $tyros_options['tyros_blog_featured'] ) && $tyros_options['tyros_blog_featured'] == 'on' && has_post_thumbnail() ) : ?>
    
        <div class="post-thumb">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail( 'large' ); ?>
            </a>
        </div>

        <div class="clear"></div>
    
    <?php endif; ?>
    
    <div class="inner">
    
        <h2 class="post-title">
            <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
            </a>
        </h2>

        <div class="post-content">
            <?php the_excerpt(); ?>
        </div>
        
    </div>
    
</div>