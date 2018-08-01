<?php

// ---------------------------------------------
// Header - Customizer Panel
// ---------------------------------------------
$wp_customize->add_panel( 'tyros_header_panel', array(
    'title'                 => __( 'Header & Footer', 'tyros' ),
    'description'           => __( 'Customize the appearance of your Header', 'tyros' ),
    'priority'              => 10
) );

// Move Site Identity
$wp_customize->add_section( 'title_tagline', array(
    'title'                 => __( 'Site Title & Tagline', 'tyros' ),
    'panel'                 => 'tyros_header_panel'
) );

// ---------------------------------------------
// Toolbar Section
// ---------------------------------------------
$wp_customize->add_section( 'tyros_toolbar_section', array(
    'title'                 => __( 'Toolbar & Social Links', 'tyros'),
    'description'           => __( 'Customize the Toolbar in the Header and the Social Links it contains', 'tyros' ),
    'panel'                 => 'tyros_header_panel'
) );

    // Show / Hide the Toolbar?
    $wp_customize->add_setting( 'tyros[tyros_headerbar_bool]', array(
        'default'               => 'yes',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'tyros_sanitize_show_hide',
        'type'                  => 'option'
    ) );
    $wp_customize->add_control( 'tyros[tyros_headerbar_bool]', array(
        'label'   => __( 'Show or hide the Toolbar section?', 'tyros' ),
        'section' => 'tyros_toolbar_section',
        'type'    => 'radio',
        'choices'    => array(
            'yes'   => __( 'Show', 'tyros' ),
            'no'    => __( 'Hide', 'tyros' ),
        )
    ));

    // Facebook URL
    $wp_customize->add_setting( 'tyros[tyros_facebook_url]', array(
        'default'               => '',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'esc_url_raw',
        'type'                  => 'option'
    ) );
    $wp_customize->add_control( 'tyros[tyros_facebook_url]', array(
        'type'                  => 'text',
        'section'               => 'tyros_toolbar_section',
        'label'                 => __( 'Facebook URL', 'tyros' ),
    ) );

    // Twitter URL
    $wp_customize->add_setting( 'tyros[tyros_twitter_url]', array(
        'default'               => '',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'esc_url_raw',
        'type'                  => 'option'
    ) );
    $wp_customize->add_control( 'tyros[tyros_twitter_url]', array(
        'type'                  => 'text',
        'section'               => 'tyros_toolbar_section',
        'label'                 => __( 'Twitter URL', 'tyros' ),
    ) );

    // LinkedIn URL
    $wp_customize->add_setting( 'tyros[tyros_linkedin_url]', array(
        'default'               => '',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'esc_url_raw',
        'type'                  => 'option'
    ) );
    $wp_customize->add_control( 'tyros[tyros_linkedin_url]', array(
        'type'                  => 'text',
        'section'               => 'tyros_toolbar_section',
        'label'                 => __( 'LinkedIn URL', 'tyros' ),
    ) );

    // Google+ URL
    $wp_customize->add_setting( 'tyros[tyros_gplus_url]', array(
        'default'               => '',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'esc_url_raw',
        'type'                  => 'option'
    ) );
    $wp_customize->add_control( 'tyros[tyros_gplus_url]', array(
        'type'                  => 'text',
        'section'               => 'tyros_toolbar_section',
        'label'                 => __( 'Google+ URL', 'tyros' ),
    ) );

    // Instagram URL
    $wp_customize->add_setting( 'tyros[tyros_instagram_url]', array(
        'default'               => '',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'esc_url_raw',
        'type'                  => 'option'
    ) );
    $wp_customize->add_control( 'tyros[tyros_instagram_url]', array(
        'type'                  => 'text',
        'section'               => 'tyros_toolbar_section',
        'label'                 => __( 'Instagram URL', 'tyros' ),
    ) );

    // YouTube URL
    $wp_customize->add_setting( 'tyros[tyros_youtube_url]', array(
        'default'               => '',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'esc_url_raw',
        'type'                  => 'option'
    ) );
    $wp_customize->add_control( 'tyros[tyros_youtube_url]', array(
        'type'                  => 'text',
        'section'               => 'tyros_toolbar_section',
        'label'                 => __( 'YouTube URL', 'tyros' ),
    ) );
    
    // Pinterest URL
    $wp_customize->add_setting( 'tyros[tyros_pinterest_url]', array(
        'default'               => '',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'esc_url_raw',
        'type'                  => 'option'
    ) );
    $wp_customize->add_control( 'tyros[tyros_pinterest_url]', array(
        'type'                  => 'text',
        'section'               => 'tyros_toolbar_section',
        'label'                 => __( 'Pinterest URL', 'tyros' ),
    ) );
    
    // Store Link 1 - Text
    $wp_customize->add_setting( 'tyros[tyros_store_link1_text]', array(
        'default'               => '',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'sanitize_text_field',
        'type'                  => 'option'
    ) );
    $wp_customize->add_control( 'tyros[tyros_store_link1_text]', array(
        'type'                  => 'text',
        'section'               => 'tyros_toolbar_section',
        'label'                 => __( 'Store Link #1 - Text', 'tyros' ),
    ) );
    
    // Store Link 1 - URL
    $wp_customize->add_setting( 'tyros[tyros_store_link1_url]', array(
        'default'               => '',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'sanitize_text_field',
        'type'                  => 'option'
    ) );
    $wp_customize->add_control( 'tyros[tyros_store_link1_url]', array(
        'type'                  => 'text',
        'section'               => 'tyros_toolbar_section',
        'label'                 => __( 'Store Link #1 - URL', 'tyros' ),
    ) );
    
    // Store Link 2 - Text
    $wp_customize->add_setting( 'tyros[tyros_store_link2_text]', array(
        'default'               => '',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'sanitize_text_field',
        'type'                  => 'option'
    ) );
    $wp_customize->add_control( 'tyros[tyros_store_link2_text]', array(
        'type'                  => 'text',
        'section'               => 'tyros_toolbar_section',
        'label'                 => __( 'Store Link #2 - Text', 'tyros' ),
    ) );
    
    // Store Link 2 - URL
    $wp_customize->add_setting( 'tyros[tyros_store_link2_url]', array(
        'default'               => '',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'sanitize_text_field',
        'type'                  => 'option'
    ) );
    $wp_customize->add_control( 'tyros[tyros_store_link2_url]', array(
        'type'                  => 'text',
        'section'               => 'tyros_toolbar_section',
        'label'                 => __( 'Store Link #2 - URL', 'tyros' ),
    ) );
    
    // Store Link 3 - Text
    $wp_customize->add_setting( 'tyros[tyros_store_link3_text]', array(
        'default'               => '',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'sanitize_text_field',
        'type'                  => 'option'
    ) );
    $wp_customize->add_control( 'tyros[tyros_store_link3_text]', array(
        'type'                  => 'text',
        'section'               => 'tyros_toolbar_section',
        'label'                 => __( 'Store Link #3 - Text', 'tyros' ),
    ) );
    
    // Store Link 3 - URL
    $wp_customize->add_setting( 'tyros[tyros_store_link3_url]', array(
        'default'               => '',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'sanitize_text_field',
        'type'                  => 'option'
    ) );
    $wp_customize->add_control( 'tyros[tyros_store_link3_url]', array(
        'type'                  => 'text',
        'section'               => 'tyros_toolbar_section',
        'label'                 => __( 'Store Link #3 - URL', 'tyros' ),
    ) );
    
// ---------------------------------------------
// Header Height Section
// ---------------------------------------------
$wp_customize->add_section( 'tyros_header_height_section', array(
    'title'                 => __( 'Branding & Nav Bar', 'tyros'),
    'description'           => __( 'Customize the Branding & Navigation bar in the Header', 'tyros' ),
    'panel'                 => 'tyros_header_panel'
) );

    // Branding Bar Height
    $wp_customize->add_setting( 'tyros[tyros_branding_bar_height]', array (
        'default'               => 80,
        'transport'             => 'refresh',
        'sanitize_callback'     => 'tyros_sanitize_integer',
        'type'                  => 'option'
    ) );
    $wp_customize->add_control( 'tyros[tyros_branding_bar_height]', array(
        'type'                  => 'number',
        'section'               => 'tyros_header_height_section',
        'label'                 => __( 'Branding & Nav Bar Height', 'tyros' ),
        'description'           => __( 'Adjust the height of the branding & navigation bar in the Header', 'tyros' ),
        'input_attrs'           => array(
            'min' => 80,
            'max' => 400,
            'step' => 1,
    ) ) );

// ---------------------------------------------
// Footer Section
// ---------------------------------------------
$wp_customize->add_section( 'tyros_footer_section', array(
    'title'                 => __( 'Footer', 'tyros'),
    'description'           => __( 'Customize the Footer', 'tyros' ),
    'panel'                 => 'tyros_header_panel'
) );

    // Footer Widget Area Columns
    $wp_customize->add_setting( 'tyros[tyros_footer_columns]', array(
        'default'               => 'col-md-4',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'sanitize_text_field',
        'type'                  => 'option'
    ) );
    $wp_customize->add_control( 'tyros[tyros_footer_columns]', array(
        'label'   => __( 'Footer Widget Area - Columns', 'tyros' ),
        'label'   => __( 'Save changes and reload to preview column changes', 'tyros' ),
        'section' => 'tyros_footer_section',
        'type'    => 'radio',
        'choices'    => array(
            'col-md-12'     => __( 'One', 'tyros' ),
            'col-md-6'      => __( 'Two', 'tyros' ),
            'col-md-4'      => __( 'Three', 'tyros' ),
            'col-md-3'      => __( 'Four', 'tyros' ),
        )
    ));
    
    // Footer Copyright Text
    $wp_customize->add_setting( 'tyros[tyros_footer_text]', array(
        'default'               => __( '© 2017 Your Company Name', 'tyros' ),
        'transport'             => 'refresh',
        'sanitize_callback'     => 'sanitize_text_field',
        'type'                  => 'option'
    ) );
    $wp_customize->add_control( 'tyros[tyros_footer_text]', array(
        'type'                  => 'text',
        'section'               => 'tyros_footer_section',
        'label'                 => __( 'Copyright Area Text', 'tyros' ),
    ) );
    