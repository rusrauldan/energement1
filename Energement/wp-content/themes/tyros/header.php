<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Tyros
 */

$tyros_options = tyros_get_options(); 

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <?php wp_head(); ?>
    
</head>

<?php $bg_image_src = get_template_directory_uri() . '/inc/images/bg/' . esc_attr( $tyros_options['tyros_theme_background_pattern'] ) . '.png'; ?>

<body <?php body_class(); ?> style="background-image: url(<?php echo esc_url( $bg_image_src ); ?>);">
    
    <div id="page" class="site">
        
	<header id="masthead" class="site-header">
            
            <div id="header-box-wrap">
            
                <div class="container">

                    <div class="row">

                        <div class="col-sm-12 boxed-wrap">

                            <?php if ( $tyros_options['tyros_headerbar_bool'] == 'yes' ) : ?>

                                <?php do_action( 'tyros_toolbar' ); ?>

                            <?php endif; ?>

                            <div id="site-branding-sticky-wrap">

                                <div id="site-branding">

                                    <div class="branding">

                                        <?php if ( function_exists( 'has_custom_logo' ) && has_custom_logo() ) : ?>

                                            <?php the_custom_logo(); ?>

                                        <?php else : ?>

                                            <?php if ( get_bloginfo( 'name' ) ) : ?>

                                                <h2 class="site-title">
                                                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                                        <?php bloginfo( 'name' );?>
                                                    </a>
                                                </h2>

                                            <?php endif; ?>

                                            <?php if ( get_bloginfo( 'description' ) ) : ?>

                                                <h5 class="site-description">
                                                    <?php echo get_bloginfo( 'description' ); ?>
                                                </h5>

                                            <?php endif; ?>

                                        <?php endif; ?>

                                    </div>

                                    <div class="navigation">

                                        <nav id="site-navigation" class="main-navigation" role="navigation">

                                            <?php wp_nav_menu( array(
                                                'theme_location' => 'primary',
                                                'menu_id'        => 'primary-menu',
                                            ) ); ?>

                                        </nav><!-- #site-navigation -->

                                    </div>
                                    
                                    <div id="slicknav-menu-toggle">

                                        <img src="<?php echo esc_url( get_template_directory_uri() . '/inc/images/menu-bars-sqr.png' ); ?>">

                                    </div>

                                </div>
                                
                            </div>

                        </div>

                    </div>

                </div>
                
            </div>
            
	</header><!-- #masthead -->

	<div id="content" class="site-content">
