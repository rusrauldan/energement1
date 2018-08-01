<?php $tyros_options = tyros_get_options(); ?>

<article class="item-page">

    <h2 class="post-title">
        <?php the_title(); ?>
    </h2>

    <div class="entry-content">
        
        <?php if ( has_post_thumbnail() && $tyros_options['tyros_single_featured'] == 'on' ) : ?>

            <?php the_post_thumbnail( 'large' ); ?>

        <?php endif; ?>
        
        <?php the_content(); ?>
        
        <?php echo $tyros_options['tyros_single_date'] == 'on' ? __( 'Posted on: ', 'tyros' ) . esc_html( get_the_date() ) : ''; ?><?php echo $tyros_options['tyros_single_author'] == 'on' && $tyros_options['tyros_single_date'] == 'on' ? __( ', ', 'tyros' ) : ''; ?>

        <?php echo $tyros_options['tyros_single_author'] == 'on' ? __( 'by : ', 'tyros' ) . get_the_author_posts_link() : ''; ?>

        <?php 

        wp_link_pages(array(
            'before' => '<div class="page-links">' . __( 'Pages:', 'tyros' ),
            'after' => '</div>',
        ));

        if (comments_open() || '0' != get_comments_number()) :
            comments_template();
        endif;

        ?>

    </div>

</article>