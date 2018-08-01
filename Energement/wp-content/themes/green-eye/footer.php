<?php

?>


</div><!-- container -->

<div class="content-ver-sep"></div>
<div id="footer">

<div id="footer-content">

<?php
   	get_sidebar( 'footer' );
?>
</div> <!-- footer-content -->
</div> <!-- footer -->
<div class="content-ver-sep"></div>
<div id="creditline"><?php echo '&copy; ' . date("Y"). ': ' . get_bloginfo( 'name' ) . '  '; green_creditline(); ?></div>
<?php wp_footer(); ?>
</body>
</html>
<?php wp_nav_menu( array( 'theme_location' => 'new-menu' ) ); ?>