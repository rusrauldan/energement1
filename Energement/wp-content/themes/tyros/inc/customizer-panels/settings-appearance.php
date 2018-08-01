<?php

// ---------------------------------------------
// Appearance - Customizer Panel
// ---------------------------------------------
$wp_customize->add_panel( 'tyros_appearance_panel', array(
    'title'                 => __( 'Appearance', 'tyros' ),
    'description'           => __( 'Customize the appearance of your site', 'tyros' ),
    'priority'              => 10
) );

// ---------------------------------------------
// Colors Section
// ---------------------------------------------
$wp_customize->add_section( 'tyros_colors_section', array(
    'title'                 => __( 'Skin Color', 'tyros'),
    'description'           => __( 'Customize the colors of your site', 'tyros' ),
    'panel'                 => 'tyros_appearance_panel'
) );

    // Theme Color
    $wp_customize->add_setting( 'tyros[tyros_theme_color]', array(
        'default'               => 'red',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'sanitize_text_field',
        'type'                  => 'option'
    ) );
    $wp_customize->add_control( 'tyros[tyros_theme_color]', array(
        'label'   => __( 'Select the theme skin color', 'tyros' ),
        'section' => 'tyros_colors_section',
        'type'    => 'radio',
        'choices'    => array(
            'red'      => __( 'Red', 'tyros' ),
            'green'     => __( 'Green', 'tyros' ),
            'violet'       => __( 'Violet', 'tyros' ),
        )
    ));

// ---------------------------------------------
// Background Pattern
// ---------------------------------------------
$wp_customize->add_section( 'tyros_pattern_section', array(
    'title'                 => __( 'Background Pattern', 'tyros'),
    'description'           => __( 'Customize the background pattern of your site', 'tyros' ),
    'panel'                 => 'tyros_appearance_panel'
) );

    // Background Pattern
    $wp_customize->add_setting( 'tyros[tyros_theme_background_pattern]', array(
        'default'               => 'halftone',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'sanitize_text_field',
        'type'                  => 'option'
    ) );
    $wp_customize->add_control( 'tyros[tyros_theme_background_pattern]', array(
        'label'   => __( 'Select the theme background pattern', 'tyros' ),
        'section' => 'tyros_pattern_section',
        'type'    => 'radio',
        'choices'    => array(
            'brickwall'             => __( 'White Brick', 'tyros' ),
            'confectionary'         => __( 'Confectionary', 'tyros' ),
            'food'                  => __( 'Food', 'tyros' ),
            'halftone'              => __( 'Beige Halftone', 'tyros' ),
            'skulls'                => __( 'Illustrations', 'tyros' ),
            'stardust'              => __( 'Dark Stardust', 'tyros' ),
            'texturetastic_gray'    => __( 'Grey Texture', 'tyros' ),
            'tweed'                 => __( 'Tweed', 'tyros' ),
            'witewall_3'            => __( 'White Wall', 'tyros' ),
        )
    ));

// ---------------------------------------------
// Fonts Section
// ---------------------------------------------
$wp_customize->add_section( 'tyros_fonts_section', array(
    'title'                 => __( 'Fonts', 'tyros'),
    'description'           => __( 'Customize the site\'s fonts', 'tyros' ),
    'panel'                 => 'tyros_appearance_panel'
) );

    // Primary Font Family
    $wp_customize->add_setting( 'tyros[tyros_font_family]', array(
        'default'               => 'Josefin Sans, sans-serif',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'sanitize_text_field',
        'type'                  => 'option'
    ) );
    $wp_customize->add_control( 'tyros[tyros_font_family]', array(
        'label'   => __( 'Select the primary font family (Headings)', 'tyros' ),
        'section' => 'tyros_fonts_section',
        'type'    => 'select',
        'choices' => tyros_fonts()
    ));

    // Secondary Font Family
    $wp_customize->add_setting( 'tyros[tyros_font_family_secondary]', array(
        'default'               => 'Lato, sans-serif',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'sanitize_text_field',
        'type'                  => 'option'
    ) );
    $wp_customize->add_control( 'tyros[tyros_font_family_secondary]', array(
        'label'   => __( 'Select the secondary font family (Body)', 'tyros' ),
        'section' => 'tyros_fonts_section',
        'type'    => 'select',
        'choices' => tyros_fonts()
    ));
    
    // Main Font Size
    $wp_customize->add_setting( 'tyros[tyros_font_size]', array (
        'default'               => 14,
        'transport'             => 'refresh',
        'sanitize_callback'     => 'tyros_sanitize_integer',
        'type'                  => 'option'
    ) );
    $wp_customize->add_control( 'tyros[tyros_font_size]', array(
        'type'                  => 'number',
        'section'               => 'tyros_fonts_section',
        'label'                 => __( 'Body Font Size', 'tyros' ),
        'input_attrs'           => array(
            'min' => 10,
            'max' => 40,
            'step' => 1,
    ) ) );
