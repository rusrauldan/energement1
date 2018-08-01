<?php 


?>
<div class="content-ver-sep"> </div><br /><br />
<div id="content">

<?php if (have_posts()) : while (have_posts()) : the_post();?>
	<div class="post-container">
    <?php if (!is_page()): ?>
    <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
 	<p class="postmetadataw"><?php echo __('Posted by:', 'green-eye'); ?> <?php the_author_posts_link() ?> | on <?php the_time('F j, Y'); ?></p><?php endif; ?>		
 	<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>
 		<div class="content-ver-sep"> </div>
 		
        <div class="entrytext">
 		<?php the_post_thumbnail('thumbnail'); ?>
 		<?php green_content(); ?>
 			<div class="clear"> </div>
 			 <?php if (!is_page()): ?>
             
             <div class="up-bottom-border">
             <?php  wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __('Pages:','green-eye') . '</span>', 'after' => '</div><br/>' ) ); ?>
 			<p class="postmetadata"><?php _e('Posted in', 'green-eye'); ?> <?php the_category(', ') ?> | <?php edit_post_link(__('Edit', 'green-eye'), '', ' | '); ?>  <?php comments_popup_link(__('No Comments &#187;', 'green-eye'), __('1 Comment &#187;', 'green-eye'), __('% Comments &#187;'.'green-eye')); ?> <?php the_tags(__('<br />Tags: ','green-eye'), ', ', '<br />'); ?></p>
 			</div>
			<?php endif; ?>	
 
		</div>
        <?php if (!is_page()): ?>
        </div>
		<?php endif; ?>
	</div>
 
 <?php endwhile; if (!is_page()): ?>

<div id="page-nav">
<div class="alignleft"><?php previous_posts_link(__('&laquo; Previous Entries','green-eye')) ?></div>
<div class="alignright"><?php next_posts_link(__('Next Entries &raquo;','green-eye'),'') ?></div>
</div>
 
<?php endif; endif; ?>
 
</div>
<?php get_sidebar(); ?>
<div class="clear"></div>