<?php
/*
 * Alternate Posts Template
 * @author bilal hassan <info@smartcatdesign.net>
 * 
 */

$tyros_options = tyros_get_options(); ?>

<div class="col-sm-12 item-post-wrap">

    <div class="item-post <?php echo has_post_thumbnail() && $tyros_options['tyros_blog_featured'] == 'on' ? '' : 'text-left'; ?>">

        <div class="inner">
        
            <div class="row">
            
                <?php if ( has_post_thumbnail() && $tyros_options['tyros_blog_featured'] == 'on' ) : ?>

                    <div class="post-thumb col-sm-3">
                        <div class="inner">
                        
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('large'); ?>
                            </a>
                            
                            
                        </div>
                        <div class="clear"></div>
                    </div>

                <?php endif; ?>

                <div class="col-sm-<?php echo has_post_thumbnail() && $tyros_options['tyros_blog_featured'] == 'on' ? '9' : '12'; ?>">
                    <div class="inner-content">
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

                <div class="clear"></div>
        
            </div>
                
        </div>
            
    </div>

</div>