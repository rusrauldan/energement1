<?php
/*
 * Alternate Masonry Posts Template
 * @author bilal hassan <info@smartcatdesign.net>
 * 
 */

$tyros_options = tyros_get_options(); ?>

<div class="blog-roll-item alternate-masonry">

    <article data-link="<?php echo esc_url( get_the_permalink( get_the_ID() ) ); ?>" id="post-<?php echo esc_attr( get_the_ID() ); ?>" <?php post_class(); ?>>

        <?php if ( isset( $tyros_options['tyros_blog_featured'] ) && $tyros_options['tyros_blog_featured'] == 'on' && has_post_thumbnail() ) : ?>
        
            <div class="image">
                
                <a href="<?php echo esc_url( get_the_permalink() ); ?>">
                    <?php the_post_thumbnail( 'large' ); ?>
                </a>
                
                <div class="bottom-meta">

                    <?php if ( get_theme_mod( 'vivita_blog_roll_author', 'show' ) == 'show' ) : ?>
                        <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" class="ext-link" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr( get_the_author() ); ?>">
                            <div class="meta-author-section">
                                <i class="fa fa-user"></i>    
                            </div>
                        </a>
                    <?php endif; ?>

                    <?php if ( get_theme_mod( 'vivita_blog_roll_date', 'show' ) == 'show' ) : ?>
                        <div class="meta-section" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr( date( get_option( 'date_format' ), get_post_time() ) ); ?>">
                            <i class="fa fa-calendar"></i>
                        </div>
                    <?php endif; ?>

                    <?php if ( get_theme_mod( 'vivita_blog_roll_comments', 'show' ) == 'show' ) : ?>
                        <a href="<?php echo esc_url( get_permalink() . '#comments' ); ?>" class="ext-link" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr( $comment_data['approved'] . ' comment(s)' ); ?>">
                            <div class="meta-comments-section">
                                <i class="fa fa-comment"></i>    
                            </div>
                        </a>
                    <?php endif; ?>

                    <a href="<?php echo esc_url( get_permalink() ); ?>" class="ext-link">
                        <div class="ext-link-section">
                            <i class="fa fa-external-link"></i>    
                        </div>
                    </a>

                </div>
            
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

                    <hr>
                    
                    <div class="post-content">
                        <?php the_excerpt(); ?>
                    </div>

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
                
            </div>
        
        <?php else : ?>
        
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

                <hr>

                <div class="post-content">
                    <?php the_excerpt(); ?>
                </div>

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
        
        <?php endif; ?>
        

    </article>

</div>