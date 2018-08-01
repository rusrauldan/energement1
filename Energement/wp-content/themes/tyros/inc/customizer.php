<?php
/**
 * Tyros Theme Customizer
 *
 * @package Tyros
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function tyros_customize_register( $wp_customize ) {
    
    // Header
    require_once( 'customizer-panels/settings-header-footer.php' );

    // Frontpage
    require_once( 'customizer-panels/settings-frontpage.php' );

    // Slider
    require_once( 'customizer-panels/settings-slider.php' );

    // Blog
    require_once( 'customizer-panels/settings-blog.php' );

    // Single
    require_once( 'customizer-panels/settings-single.php' );
    
    // Appearance
    require_once( 'customizer-panels/settings-appearance.php' );
    
    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
    $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

    if ( isset( $wp_customize->selective_refresh ) ) {
        $wp_customize->selective_refresh->add_partial( 'blogname', array(
            'selector'        => '.site-title a',
            'render_callback' => 'tyros_customize_partial_blogname',
        ) );
        $wp_customize->selective_refresh->add_partial( 'blogdescription', array(
            'selector'        => '.site-description',
            'render_callback' => 'tyros_customize_partial_blogdescription',
        ) );
    }
    
}
add_action( 'customize_register', 'tyros_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function tyros_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function tyros_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function tyros_customize_preview_js() {
	wp_enqueue_script( 'tyros-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'tyros_customize_preview_js' );

/**
 * Sanitization Functions
 */
function tyros_sanitize_integer( $input ) {
    return intval( $input );
}

function tyros_sanitize_show_hide( $input ) {

    $valid_keys = array(
        'yes'   => __( 'Show', 'tyros' ),
        'no'    => __( 'Hide', 'tyros' ),
    );

    if ( array_key_exists( $input, $valid_keys ) ) {
        return $input;
    } else {
        return '';
    }

}

function tyros_sanitize_on_off( $input ) {

    $valid_keys = array(
        'on'    => __( 'Show', 'tyros' ),
        'off'   => __( 'Hide', 'tyros' ),
    );

    if ( array_key_exists( $input, $valid_keys ) ) {
        return $input;
    } else {
        return '';
    }

}

function tyros_sanitize_col_sidebar( $input ) {

    $valid_keys = array(
        'col1'      => __( 'No Sidebar', 'tyros' ),
        'col2r'     => __( 'Right Sidebar', 'tyros' ),
    );

    if ( array_key_exists( $input, $valid_keys ) ) {
        return $input;
    } else {
        return '';
    }

}

function tyros_sanitize_col_sidebar_left( $input ) {

    $valid_keys = array(
        'col1'      => __( 'No Sidebar', 'tyros' ),
        'col2l'     => __( 'Left Sidebar', 'tyros' ),
    );

    if ( array_key_exists( $input, $valid_keys ) ) {
        return $input;
    } else {
        return '';
    }

}

function tyros_sanitize_sidebar_off_on( $input ) {

    $valid_keys = array(
        'sidebar-off'   => __( 'No Sidebar', 'tyros' ),
        'sidebar-on'    => __( 'Right Sidebar', 'tyros' ),
    );

    if ( array_key_exists( $input, $valid_keys ) ) {
        return $input;
    } else {
        return '';
    }

}

function tyros_sanitize_icon( $input ) {

    $valid_keys = smk_font_awesome('readable');

    if ( array_key_exists( $input, $valid_keys ) ) {
        return $input;
    } else {
        return '';
    }

}