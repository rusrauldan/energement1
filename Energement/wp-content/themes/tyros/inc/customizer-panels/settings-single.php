<?php

// ---------------------------------------------
// Single Post Section
// ---------------------------------------------
$wp_customize->add_section( 'tyros_single_post_section', array(
    'title'                 => __( 'Single Layout', 'tyros'),
    'description'           => __( 'Customize the single templates for Posts/Pages', 'tyros' ),
    'priority'              => 10
) );

    // Single Post Images
    $wp_customize->add_setting( 'tyros[tyros_single_featured]', array(
        'default'               => 'on',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'tyros_sanitize_on_off',
        'type'                  => 'option'
    ) );
    $wp_customize->add_control( 'tyros[tyros_single_featured]', array(
        'label'   => __( 'Show or Hide the Post images on single posts?', 'tyros' ),
        'section' => 'tyros_single_post_section',
        'type'    => 'radio',
        'choices'    => array(
            'on'    => __( 'Show', 'tyros' ),
            'off'   => __( 'Hide', 'tyros' ),
        )
    ));

    // Single Post Dates
    $wp_customize->add_setting( 'tyros[tyros_single_date]', array(
        'default'               => 'on',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'tyros_sanitize_on_off',
        'type'                  => 'option'
    ) );
    $wp_customize->add_control( 'tyros[tyros_single_date]', array(
        'label'   => __( 'Show or Hide the Date on single posts?', 'tyros' ),
        'section' => 'tyros_single_post_section',
        'type'    => 'radio',
        'choices'    => array(
            'on'    => __( 'Show', 'tyros' ),
            'off'   => __( 'Hide', 'tyros' ),
        )
    ));

    // Single Post Author
    $wp_customize->add_setting( 'tyros[tyros_single_author]', array(
        'default'               => 'on',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'tyros_sanitize_on_off',
        'type'                  => 'option'
    ) );
    $wp_customize->add_control( 'tyros[tyros_single_author]', array(
        'label'   => __( 'Show or Hide the Author on single posts?', 'tyros' ),
        'section' => 'tyros_single_post_section',
        'type'    => 'radio',
        'choices'    => array(
            'on'    => __( 'Show', 'tyros' ),
            'off'   => __( 'Hide', 'tyros' ),
        )
    ));

    