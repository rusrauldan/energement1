<?php

?>

<div id="featured-boxs">

<?php 
$fboxclm = array("1","2","3","4","5","6","7","8");
foreach ($fboxclm as $fboxn) { 
if ( green_get_option('fbox-show' . $fboxn, '1') == '1' ) : ?>

<span class="featured-box"> 

<?php if (green_get_option('featured-image' . $fboxn, get_template_directory_uri() . '/images/featured-image.png') != '' ): ?>
<img class="box-image" src="<?php echo green_get_option('featured-image' . $fboxn, get_template_directory_uri() . '/images/featured-image.png'); ?>"/>
<?php ; endif; ?>

<h3><?php echo green_get_option('featured-title' . $fboxn, 'GREEN Environment'); ?></h3>

<p><?php echo green_get_option('featured-description' . $fboxn , 'The Color changing options of GREEN will give the WordPress Driven Site an attractive look. green is super elegant and Professional Responsive Theme which will create the business widely expressed.'); ?></p>
</span>



<?php ; endif; } ; ?>

</div> <!-- featured-boxs -->