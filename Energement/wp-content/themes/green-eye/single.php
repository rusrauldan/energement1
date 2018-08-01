<?php


get_header(); ?>
<div id="container">
<div id="content">
          <div class="post-container">
		  <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
          	<h1 class="page-title"><?php the_title(); ?></h1>
            <p class="postmetadataw"><?php _e('Posted by:', 'green-eye'); ?> <?php the_author_posts_link() ?> | on <?php the_time('F j, Y'); ?></p>
                        
            <div class="content-ver-sep"> </div>
            <div class="entrytext"><?php the_post_thumbnail('thumbnail'); ?>
			<?php the_content(); ?>
            </div>
            <div class="clear"> </div>
            <div class="up-bottom-border">
            <?php  wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __('Pages:','green-eye') . '</span>', 'after' => '</div><br/>' ) ); ?>
            
            <p class="postmetadata"><?php _e('Posted in', 'green-eye'); ?> <?php the_category(', ') ?> | <?php edit_post_link(__('Edit', 'green-eye'), '', ' | '); ?>  <?php comments_popup_link(__('No Comments &#187;', 'green-eye'), __('1 Comment &#187;', 'green-eye'), __('% Comments &#187;'.'green-eye')); ?> <?php the_tags(__('<br />Tags: ','green-eye'), ', ', '<br />'); ?></p><br />
            <div class="floatleft"><?php previous_post_link('&laquo; %link'); ?></div>
			<div class="floatright"><?php next_post_link('%link &raquo;'); ?></div><br /><br />
            
            <?php if ( is_attachment() ): ?>
            <div class="floatleft"><?php previous_image_link( false, __('&laquo; Previous Image','green-eye') ); ?></div>
			<div class="floatright"><?php next_image_link( false, __('Next Image &raquo;','green-eye') ); ?></div> 
            <?php endif; ?>
          	</div>
			
			<?php endwhile;?>
          	            
          <!-- End the Loop. -->          
        	
			<?php if (green_get_option ('cpost', '' ) != '1' ): comments_template('', true); endif;?>
            
</div></div>			
<?php get_sidebar(); ?>
<?php get_footer(); ?>