<?php
/**
 * The template for displaying search forms in Eco Friendly Lite
 *
 * @package Eco Friendly Lite
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <label for="s" class="screen-reader-text"><?php esc_attr_e( 'Search', 'eco-friendly-lite' ); ?></label> 
	<input type="search" class="search-field" placeholder="<?php esc_attr_e( 'Search...', 'eco-friendly-lite' ); ?>" value="<?php echo trim( get_search_query() ); ?>" name="s" id="s">
	<input type="submit" class="search-submit" value="<?php esc_attr_e( 'Search', 'eco-friendly-lite' ); ?>">
</form>