<?php
/*
 * Masonry Posts Template
 * @author bilal hassan <info@smartcatdesign.net>
 * 
 */

$tyros_options = tyros_get_options(); ?>

<div class="blog-roll-item">

    <article data-link="<?php echo esc_url( get_the_permalink( get_the_ID() ) ); ?>" id="post-<?php echo esc_attr( get_the_ID() ); ?>" <?php post_class(); ?>>

        <?php if ( isset( $tyros_options['tyros_blog_featured'] ) && $tyros_options['tyros_blog_featured'] == 'on' && has_post_thumbnail() ) : ?>
        
            <div class="image">
                <a href="<?php echo esc_url( get_the_permalink() ); ?>">
                    <?php the_post_thumbnail( 'large' ); ?>
                </a>
                <div class="clear"></div>
            </div>
            
        <?php endif; ?>
        
        <div class="inner <?php echo isset( $tyros_options['tyros_blog_featured'] ) && $tyros_options['tyros_blog_featured'] == 'on' && has_post_thumbnail() ? 'has-image' : ''; ?>">

            <h3 class="post-title">
                <a href="<?php echo esc_url( get_the_permalink() ); ?>">
                    <?php echo esc_html( get_the_title() ); ?>
                </a>
            </h3>
            <?php if ( isset( $tyros_options['alt_blog_show_date'] ) && $tyros_options['alt_blog_show_date'] == 'on' || isset( $tyros_options['alt_blog_show_author'] ) && $tyros_options['alt_blog_show_author'] == 'on' ) : ?>
                <h5 class="post-meta">
                    <?php echo isset( $tyros_options['alt_blog_show_date'] ) && $tyros_options['alt_blog_show_date'] == 'on' ? esc_html( get_the_date( get_option( 'date_format' ) ) ) : ''; ?>
                    <?php if ( isset( $tyros_options['alt_blog_show_author'] ) && $tyros_options['alt_blog_show_author'] == 'on' ) : ?>    
                        <?php _e( 'by', 'tyros' ); ?> <span class="post-author"><?php the_author_posts_link(); ?></span>
                    <?php endif; ?>
                </h5>
            <?php endif; ?>
            
            <?php $words = isset( $tyros_options['alt_blog_word_trim'] ) ? $tyros_options['alt_blog_word_trim'] : 40; ?>
            
            <?php if ( $words > 0 ) : ?>
                <div class="post-content">
                    <?php the_excerpt(); ?>
                </div>
            <?php endif; ?>

            <?php if ( isset( $tyros_options['alt_blog_show_category'] ) && $tyros_options['alt_blog_show_category'] == 'on' ) : ?>  
                <h6 class="post-category">
                    <?php $categories = get_the_category(); ?>
                    <?php if ( ! empty( $categories ) ) : ?>

                        <a href="<?php echo esc_url( get_category_link( $categories[0]->term_id ) ); ?>">
                            <?php echo esc_html( $categories[0]->name ); ?>
                        </a>

                    <?php endif; ?>
                </h6>
            <?php endif; ?>
            
        </div>

    </article>

</div>