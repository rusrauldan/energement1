<?php


 get_header(); ?>
	<div id="container">
	<div id="content">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="post-container">
		<div id="post-<?php the_ID(); ?>">
		<h1 class="page-title"><?php the_title(); ?></h1>
			<div class="content-ver-sep"> </div>
            <div class="entrytext">
 <?php if (green_get_option('tpage', '') != '1' ): the_post_thumbnail('thumbnail'); endif; ?>
 <?php green_content(); ?>

				<?php wp_link_pages(array('before' => __('<p><strong>Pages:</strong> ','green-eye'), 'after' => '</p>', 'next_or_number' => 'number')); ?>

			</div>
		</div>
		<?php endwhile; ?><div class="clear"> </div>
	<?php edit_post_link(__('Edit This Entry','green-eye'), '<p>', '</p>'); ?>
<?php if (green_get_option ('cpage', '' ) != '1' ): comments_template('', true); endif;?>
	<?php else: ?>
		<p><?php _e('Sorry, no pages matched your criteria','green-eye'); ?></p>
	<?php endif; ?>
	</div></div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>