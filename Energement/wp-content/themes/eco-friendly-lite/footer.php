<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Eco Friendly Lite
 */
?>
<div id="footer-wrapper" aria-label="<?php _e( 'footer', 'eco-friendly-lite' ); ?>">
    	<div class="container footer">
            <?php if ( is_active_sidebar( 'fc-1' ) ) : ?>
            <div class="cols-3 widget-column-1">  
              <?php dynamic_sidebar( 'fc-1' ); ?>
            </div><!--end .widget-column-1-->                  
    		<?php endif; ?> 
			<?php if ( is_active_sidebar( 'fc-2' ) ) : ?>
            <div class="cols-3 widget-column-2">  
            <?php dynamic_sidebar( 'fc-2' ); ?>
            </div><!--end .widget-column-3-->
            <?php endif; ?> 
			<?php if ( is_active_sidebar( 'fc-3' ) ) : ?>    
            <div class="cols-3 widget-column-3">  
            <?php dynamic_sidebar( 'fc-3' ); ?>
            </div><!--end .widget-column-4-->
			<?php endif; ?> 
            <div class="clear"></div>
        </div><!--end .container--> 
         <div class="copyright-wrapper">
        	<div class="container">
            	 <div class="design-by"><?php printf('<a target="_blank" href="'.esc_url(ECO_FRIENDLY_LITE_FREE_THEME_URL).'" rel="nofollow">Eco Friendly Lite</a>' ); ?></div>
                 <div class="clear"></div>
            </div>           
        </div>
    </div><!--end .footer-wrapper-->
<?php wp_footer(); ?>
</body>
</html>