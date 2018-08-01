<?php


get_header(); ?>
<div id="container">
<h1 class="page-title"><?php _e ('Not Found', 'green-eye'); ?></h1><br /><br />
<h3 class="arc-src"><span><?php _e ('Apologies, but the page you requested could not be found. Perhaps searching will help.', 'green-eye'); ?></span></h3>
<?php get_search_form(); ?>
<p><a href="<?php echo home_url(); ?>" title="<?php _e ('Browse the Home Page', 'green-eye'); ?>">&laquo; <?php _e ('Or Return to the Home Page', 'green-eye'); ?></a></p><br /><br />

<h2 class="post-title-color"><?php _e ('You can also Visit the Following. These are the Featured Contents', 'green-eye'); ?></h2>
<div class="content-ver-sep"></div><br />
<?php get_template_part( 'featured-box' ); ?>
 
<?php get_footer(); ?>