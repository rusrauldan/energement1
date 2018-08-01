<?php
// about theme info
add_action('admin_menu', 'eco_friendly_lite_abouttheme');
function eco_friendly_lite_abouttheme()
	{
	add_theme_page(esc_html__('Theme Info', 'eco-friendly-lite') , esc_html__('Theme Info', 'eco-friendly-lite') , 'edit_theme_options', 'eco_friendly_lite_guide', 'eco_friendly_lite_mostrar_guide');
	}
// guidline for about theme
function eco_friendly_lite_mostrar_guide()
	{
// custom function about theme customizer
	$return = add_query_arg(array());
?>
<style type="text/css">
@media screen and (min-width: 800px) {
.col-left {float:left; width: 99%; text-align:center;}
}
</style>
<div class="wrapper-info">
	<div class="col-left">
   		   <div style="font-size:16px; font-weight:bold; padding-bottom:10px; border-bottom:1px solid #ccc; margin-bottom:15px; margin-top:10px;">
			  <?php esc_html_e('Theme Info', 'eco-friendly-lite'); ?>
		   </div>
           <div style="text-align:center; font-weight:bold;">
				<a href="<?php echo esc_url(ECO_FRIENDLY_LITE_LIVE_DEMO); ?>" target="_blank"><?php esc_html_e('Live Demo', 'eco-friendly-lite'); ?></a> | 
				<a href="<?php echo esc_url(ECO_FRIENDLY_LITE_PRO_THEME_URL); ?>"><?php esc_html_e('Buy Pro', 'eco-friendly-lite'); ?></a> | 
				<a href="<?php echo esc_url(ECO_FRIENDLY_LITE_THEME_DOC); ?>" target="_blank"><?php esc_html_e('Documentation', 'eco-friendly-lite'); ?></a>
                <div style="height:5px"></div>
			</div>
          <p><?php
	esc_html_e('Eco Friendly Lite is a green template and suitable for nature, eco natural, herbal, fresh, organic, conservation, environment friendly, and other types of similar websites. Since its a dynamic template can be used as multipurpose template. WPML, qTranslate X and Polylang plugins can be used for multilingual and page builders like visual composer, Divi, Elementor and Live composer can be used to set up fancy content on the website. WooCommerce compatible and Contact form friendly.', 'eco-friendly-lite'); ?></p>
	<a href="<?php
	echo esc_url(ECO_FRIENDLY_LITE_FREE_THEME_URL); ?>"><img src="<?php
	echo esc_url(get_template_directory_uri()); ?>/images/free-vs-pro.jpg" alt="" /></a>
	</div><!-- .col-left -->
	<!-- .col-right -->
</div><!-- .wrapper-info -->
<?php } ?>