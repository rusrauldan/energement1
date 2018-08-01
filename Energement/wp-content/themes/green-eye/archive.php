<?php 


get_header(); ?>
<div id="container">
<div id="content">
	<?php if (have_posts()) : ?>
		<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
		<?php /* If this is a category archive */ if (is_category()) { ?>
		<h1 class="arc-post-title"><?php single_cat_title(); ?></h1><h3 class="arc-src"><?php echo __('now browsing by category', 'green-eye'); ?></h3>
		<?php if(trim(category_description()) != "<br />" && trim(category_description()) != '') { ?>
		<div id="description"><?php echo category_description(); ?></div>
		<?php }?>
		<div class="clear">&nbsp;</div>
		<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
		<h1 class="arc-post-title"><?php single_tag_title(); ?></h1><h3 class="arc-src"><?php echo __('now browsing by tag', 'green-eye'); ?></h3>
		<div class="clear">&nbsp;</div>
		<div class="tagcloud"><?php wp_tag_cloud(''); ?></div>
		<div class="clear">&nbsp;</div>
		<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h1 class="arc-post-title"><?php echo get_the_date('l, F jS, Y'); ?></h1><h3 class="arc-src"><?php echo __('now browsing by day', 'green-eye'); ?></h3>
		<div class="clear">&nbsp;</div>
		<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h1 class="arc-post-title"><?php echo get_the_date('F, Y'); ?></h1><h3 class="arc-src"><?php echo __('now browsing by month', 'green-eye'); ?></h3>
		<div class="clear">&nbsp;</div>
		<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h1 class="arc-post-title"><?php echo get_the_date('Y'); ?></h1><h3 class="arc-src"><?php echo __('now browsing by year', 'green-eye'); ?></h3>
		<div class="clear">&nbsp;</div>
		<?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h1 class="arc-post-title">Archives</h1><h3 class="arc-src"><?php echo __('now browsing by author', 'green-eye'); ?></h3>
		<div class="clear">&nbsp;</div>
		<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h1 class="arc-post-title">Archives</h1><h3 class="arc-src"><?php echo __('now browsing the general archives', 'green-eye'); ?></h3>
 	 	<?php } ?>


		<?php while (have_posts()) : the_post(); ?>
			<div class="post-container">
			<div <?php post_class(); ?>>
				<p class="postmetadataw"><?php echo __('Posted by:', 'green-eye'); ?> <?php the_author_posts_link() ?> | <?php echo __(' on', 'green-eye'); ?> <?php the_time('F j, Y'); ?></p>
                <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>
				<div class="content-ver-sep"> </div>	
				<div class="entrytext"><?php the_post_thumbnail('thumbnail'); ?>
  <?php green_content(); ?>
				</div>
				<div class="clear"> </div>
                <div class="up-bottom-border">
				<p class="postmetadata"><?php echo __('Posted in', 'green-eye'); ?> <?php the_category(', ') ?> | <?php edit_post_link( __('Edit', 'green-eye'), '', ' | '); ?>  <?php comments_popup_link(__('No Comments &#187;', 'green-eye'), __('1 Comment &#187;', 'green-eye'), __('% Comments &#187;', 'green-eye')); ?> <?php the_tags('<br />'. __('Tags: ', 'green-eye'), ', ', '<br />'); ?></p>
				</div>
            
		                
                </div><!--close post class-->
                </div>
	
		<?php endwhile; ?>
			
	<div id="page-nav">
	<div class="alignleft"><?php previous_posts_link(__('&laquo; Previous Entries', 'green-eye')) ?></div>
	<div class="alignright"><?php next_posts_link(__('Next Entries &raquo;', 'green-eye')) ?></div>
	</div>

	<?php else : ?>

		<h1 class="page-title"><?php _e('Not Found', 'green-eye'); ?></h1>
		<h3 class="arc-src"><span><?php _e('Apologies, but the page you requested could not be found. Perhaps searching will help', 'green-eye'); ?></span></h3>

		<?php get_search_form(); ?>
		<p><a href="<?php echo home_url(); ?>" title="Browse the Home Page">&laquo; <?php _e('Or Return to the Home Page', 'green-eye'); ?></a></p><br /><br />

		<h2 class="post-title-color"><?php _e('You can also Visit the Following. These are the Featured Contents', 'green-eye'); ?></h2>
		<div class="content-ver-sep"></div><br />
		<?php get_template_part( 'featured-box' ); ?>

	<?php endif; ?>

</div><!--close content id-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
