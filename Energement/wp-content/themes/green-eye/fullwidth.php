<?php

?>

<?php get_header(); ?>
<div id="container">
<div id="content-full">
 <?php if (have_posts()) : while (have_posts()) : the_post();?>
 <div class="post-container">
 <h1 id="post-<?php the_ID(); ?>" class="page-title"><?php the_title();?></h1>
 <div class="content-ver-sep"> </div>
 <div class="entrytext">
 <?php the_post_thumbnail('thumbnail'); ?>
 <?php green_content(); ?>
 </div><div class="clear"> </div>
 <?php edit_post_link(__('Edit This Entry','green-eye'), '<p>', '</p>'); ?>
 <?php if (green_get_option ('cpage', '' ) != '1' ): comments_template('', true); endif;?>
 <?php endwhile; endif; ?>
 


</div>
</div>
<?php get_footer(); ?>