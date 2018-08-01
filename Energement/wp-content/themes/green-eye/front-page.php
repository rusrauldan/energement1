<?php

get_header(); ?>       
<div id="container">
<h1 id="heading"><?php echo green_get_option('heading_text', 'Welcome to the World of Creativity!'); ?></h1>
<p class="heading-desc"><?php echo green_get_option('heading_des', 'WordPress is web software you can use to create a <a href="#">beautiful website or blog</a>. We like to say that <a href="http://wordpress.org/">WordPress</a> is both free and priceless at the same time.'); ?></p>

<?php get_template_part( 'featured-box' ); get_template_part( 'fcontent' ); ?> 

<div class="content-ver-sep"></div>


<div class="fpage-quote">
<div class="customers-comment">
<ul><li> <?php echo '<q>' . green_get_option('bottom-quotation', 'All the developers of D5 Creation have come from the disadvantaged part or group of the society. All have established themselves after a long and hard struggle in their life ----- D5 Creation Team') . '</q>'; ?></li></ul>
</div></div>

<?php get_footer(); ?>