<?php
/**
 * Filter Eco Friendly Lite custom-header support arguments.
 *
 * @package Eco Friendly Lite
 *
 * @param array $args {
 *     An array of custom-header support arguments.
 *
 *     @type string $default_text_color      Default color of the header text.
 *     @type int    $width                   Width in pixels of the custom header image. Default 954.
 *     @type int    $height                  Height in pixels of the custom header image. Default 1300.
 *     @type string $wp-head-callback        Callback function used to styles the header image and text
 *                                           displayed on the blog.
 *	   @type string $admin-head-callback     Call on custom background administration screen.
 *	   @type string $admin-preview-callback  Output a custom background image div on the custom background administration                                                 screen. Optional.
 * }

 */

function eco_friendly_lite_custom_header_setup()
{
	add_theme_support('custom-header', apply_filters('eco_friendly_lite_custom_header_args', array(
		'default-text-color' => '393939',
		'width' => 1600,
		'height' => 200,
		'wp-head-callback' => 'eco_friendly_lite_header_style',
		'admin-head-callback' => 'eco_friendly_lite_admin_header_style',
		'admin-preview-callback' => 'eco_friendly_lite_admin_header_image',
	)));
}

add_action('after_setup_theme', 'eco_friendly_lite_custom_header_setup');

if (!function_exists('eco_friendly_lite_header_style')):
	/**
	 * Styles the header image and text displayed on the blog
	 *
	 * @see eco_friendly_lite_custom_header_setup().
	 */
	function eco_friendly_lite_header_style()
	{
		$header_text_color = get_header_textcolor();
?>
	<style type="text/css">
	<?php
		// Check if user has defined any header image.
		if (get_header_image()):
	?>
		.header {
			background: url(<?php
			echo esc_url(get_header_image()); ?>) no-repeat;
			background-position: center top;
		}
	<?php
		endif; ?>	
	</style>
	<?php
	}
endif; // eco_friendly_lite_header_style

if (!function_exists('eco_friendly_lite_admin_header_style')):
	/**
	 * Styles the header image displayed on the Appearance > Header admin panel.
	 *
	 * @see eco_friendly_lite_custom_header_setup().
	 */
	function eco_friendly_lite_admin_header_style()
	{ ?>
	<style type="text/css">
	.appearance_page_custom-header #headimg { border: none; }
	</style><?php
	}

endif; // eco_friendly_lite_admin_header_style

if (!function_exists('eco_friendly_lite_admin_header_image')):
	/**
	 * Custom header image markup displayed on the Appearance > Header admin panel.
	 *
	 * @see eco_friendly_lite_custom_header_setup().
	 */
	function eco_friendly_lite_admin_header_image()
	{
?>
	<div id="headimg">
		<?php
		if (get_header_image()): ?>
		<img src="<?php
			header_image(); ?>" alt="">
		<?php
		endif; ?>
	</div>
<?php
	}
endif; // eco_friendly_lite_admin_header_image