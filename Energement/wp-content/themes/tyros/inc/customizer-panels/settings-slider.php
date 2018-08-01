<?php

// ---------------------------------------------
// Slider - Customizer Panel
// ---------------------------------------------
$wp_customize->add_panel( 'tyros_slider_panel', array(
    'title'                 => __( 'Slider', 'tyros' ),
    'description'           => __( 'Customize the appearance of your Slider', 'tyros' ),
    'priority'              => 10
) );

// ---------------------------------------------
// Slide Settings Section
// ---------------------------------------------
$wp_customize->add_section( 'tyros_slider_settings_section', array(
    'title'                 => __( 'Slider Settings', 'tyros'),
    'description'           => __( 'Customize the general settings for the Slider', 'tyros' ),
    'panel'                 => 'tyros_slider_panel'
) );

    // Show / Hide Slider?
    $wp_customize->add_setting( 'tyros[tyros_slider_bool]', array(
        'default'               => 'yes',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'tyros_sanitize_show_hide',
        'type'                  => 'option'
    ) );
    $wp_customize->add_control( 'tyros[tyros_slider_bool]', array(
        'label'   => __( 'Show or hide the Slider?', 'tyros' ),
        'section' => 'tyros_slider_settings_section',
        'type'    => 'radio',
        'choices'    => array(
            'yes'   => __( 'Show', 'tyros' ),
            'no'    => __( 'Hide', 'tyros' ),
        )
    ));

// ---------------------------------------------
// Slides Loop
// ---------------------------------------------

for ( $ctr = 1; $ctr < apply_filters( 'tyros_capacity', 1 ); $ctr++ ) :

    // ---------------------------------------------
    // Slide Section
    // ---------------------------------------------
    $wp_customize->add_section( 'tyros_slide_' . $ctr . '_section', array(
        'title'                 => __( 'Slide #', 'tyros') . $ctr,
        'description'           => __( 'Customize slide #', 'tyros' ) . $ctr,
        'panel'                 => 'tyros_slider_panel'
    ) );

        // Slide - Image            
        $wp_customize->add_setting( 'tyros[tyros_slide' . $ctr . '_image]', array(
            'default'               => $ctr > 3 ? '' : get_template_directory_uri() . '/inc/images/tyros_demo.jpg',
            'transport'             => 'refresh',
            'sanitize_callback'     => 'esc_url_raw',
            'type'                  => 'option'
        ) );
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'tyros[tyros_slide' . $ctr . '_image]', array(
            'mime_type'             => 'image',
            'settings'              => 'tyros[tyros_slide' . $ctr . '_image]',
            'section'               => 'tyros_slide_' . $ctr . '_section',
            'label'                 => __( 'Slide Image', 'tyros' ),
        ) ) );

        // Slide - Caption Heading
        $wp_customize->add_setting( 'tyros[tyros_slide' . $ctr . '_text]', array(
            'default'               => __( 'Welcome to Tyros', 'tyros' ),
            'transport'             => 'refresh',
            'sanitize_callback'     => 'sanitize_text_field',
            'type'                  => 'option'
        ) );
        $wp_customize->add_control( 'tyros[tyros_slide' . $ctr . '_text]', array(
            'type'                  => 'text',
            'section'               => 'tyros_slide_' . $ctr . '_section',
            'label'                 => __( 'Caption Heading', 'tyros' ),
        ) );

        // Slide - Caption Subheading
        $wp_customize->add_setting( 'tyros[tyros_slide' . $ctr . '_text2]', array(
            'default'               => __( 'A professional, multi-purpose WordPress theme', 'tyros' ),
            'transport'             => 'refresh',
            'sanitize_callback'     => 'sanitize_text_field',
            'type'                  => 'option'
        ) );
        $wp_customize->add_control( 'tyros[tyros_slide' . $ctr . '_text2]', array(
            'type'                  => 'text',
            'section'               => 'tyros_slide_' . $ctr . '_section',
            'label'                 => __( 'Caption Subheading', 'tyros' ),
        ) );
        
        // Slide - Button
        $wp_customize->add_setting( 'tyros[tyros_slide' . $ctr . '_button_text]', array(
            'default'               => __( 'Click Here', 'tyros' ),
            'transport'             => 'refresh',
            'sanitize_callback'     => 'sanitize_text_field',
            'type'                  => 'option'
        ) );
        $wp_customize->add_control( 'tyros[tyros_slide' . $ctr . '_button_text]', array(
            'type'                  => 'text',
            'section'               => 'tyros_slide_' . $ctr . '_section',
            'label'                 => __( 'Button - Label', 'tyros' ),
        ) );
        
        // Slide - Link/URL
        $wp_customize->add_setting( 'tyros[tyros_slide' . $ctr . '_button_url]', array(
            'default'               => '',
            'transport'             => 'refresh',
            'sanitize_callback'     => 'sanitize_text_field',
            'type'                  => 'option'
        ) );
        $wp_customize->add_control( 'tyros[tyros_slide' . $ctr . '_button_url]', array(
            'type'                  => 'text',
            'section'               => 'tyros_slide_' . $ctr . '_section',
            'label'                 => __( 'Button - Link/URL', 'tyros' ),
        ) );

endfor;
