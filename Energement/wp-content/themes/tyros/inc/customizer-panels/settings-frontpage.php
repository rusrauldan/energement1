<?php

// ---------------------------------------------
// Frontpage - Customizer Panel
// ---------------------------------------------
$wp_customize->add_panel( 'tyros_frontpage_panel', array(
    'title'                 => __( 'Frontpage', 'tyros' ),
    'description'           => __( 'Customize the appearance of your site homepage', 'tyros' ),
    'priority'              => 10
) );

// Move Static Front Page
$wp_customize->add_section( 'static_front_page', array(
    'title'                 => __( 'Static Front Page', 'tyros' ),
    'panel'                 => 'tyros_frontpage_panel'
) );

// ---------------------------------------------
// Post-Slider Callout Banner
// ---------------------------------------------
$wp_customize->add_section( 'tyros_cta_header_section', array(
    'title'                 => __( 'Callout Banner', 'tyros'),
    'description'           => __( 'Customize the CTA banner that appears between the Slider and CTA Trio', 'tyros' ),
    'panel'                 => 'tyros_frontpage_panel'
) );

    // Show / Hide the CTA Header?
    $wp_customize->add_setting( 'tyros[tyros_post_slider_cta_bool]', array(
        'default'               => 'yes',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'tyros_sanitize_show_hide',
        'type'                  => 'option'
    ) );
    $wp_customize->add_control( 'tyros[tyros_post_slider_cta_bool]', array(
        'label'   => __( 'Show or hide the Callout Banner?', 'tyros' ),
        'section' => 'tyros_cta_header_section',
        'type'    => 'radio',
        'choices'    => array(
            'yes'   => __( 'Show', 'tyros' ),
            'no'    => __( 'Hide', 'tyros' ),
        )
    ));

    // Main Heading 
    $wp_customize->add_setting( 'tyros[tyros_cta_header_two]', array(
        'default'               => __( 'Tyros: Customizable, Professional, and Beautiful', 'tyros' ),
        'transport'             => 'refresh',
        'sanitize_callback'     => 'sanitize_text_field',
        'type'                  => 'option'
    ) );
    $wp_customize->add_control( 'tyros[tyros_cta_header_two]', array(
        'type'                  => 'text',
        'section'               => 'tyros_cta_header_section',
        'label'                 => __( 'Main Callout Heading', 'tyros' ),
    ) );

    // Button - Label
    $wp_customize->add_setting( 'tyros[tyros_cta_button_text]', array(
        'default'               => __( 'Learn More', 'tyros' ),
        'transport'             => 'refresh',
        'sanitize_callback'     => 'sanitize_text_field',
        'type'                  => 'option'
    ) );
    $wp_customize->add_control( 'tyros[tyros_cta_button_text]', array(
        'type'                  => 'text',
        'section'               => 'tyros_cta_header_section',
        'label'                 => __( 'Button - Label', 'tyros' ),
    ) );

    // Button - URL
    $wp_customize->add_setting( 'tyros[tyros_cta_button_link]', array(
        'default'               => '#',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'esc_url_raw',
        'type'                  => 'option'
    ) );
    $wp_customize->add_control( 'tyros[tyros_cta_button_link]', array(
        'type'                  => 'text',
        'section'               => 'tyros_cta_header_section',
        'label'                 => __( 'Button - URL', 'tyros' ),
    ) );

    // ---------------------------------------------
    // CTA Trio Section
    // ---------------------------------------------
    $wp_customize->add_section( 'tyros_cta_trio_section', array(
        'title'                 => __( 'CTA Trio Section', 'tyros'),
        'description'           => __( 'Customize the trio of icon CTAs on the frontpage', 'tyros' ),
        'panel'                 => 'tyros_frontpage_panel'
    ) );

        // Show / Hide the CTA Trio Section?
        $wp_customize->add_setting( 'tyros[tyros_cta_bool]', array(
            'default'               => 'yes',
            'transport'             => 'refresh',
            'sanitize_callback'     => 'tyros_sanitize_show_hide',
            'type'                  => 'option'
        ) );
        $wp_customize->add_control( 'tyros[tyros_cta_bool]', array(
            'label'   => __( 'Show or hide the CTA Trio section?', 'tyros' ),
            'section' => 'tyros_cta_trio_section',
            'type'    => 'radio',
            'choices'    => array(
                'yes'   => __( 'Show', 'tyros' ),
                'no'    => __( 'Hide', 'tyros' ),
            )
        ));
    
        // CTA 1 - Icon
        $wp_customize->add_setting( 'tyros[tyros_cta1_icon]', array(
            'default' => 'fa-gears',
            'transport' => 'refresh',
            'sanitize_callback' => 'tyros_sanitize_icon',
            'type'                  => 'option'
        ));
        $wp_customize->add_control( 'tyros[tyros_cta1_icon]', array(
            'label' => __('CTA 1 - Icon', 'tyros'),
            'section' => 'tyros_cta_trio_section',
            'type' => 'select',
            'choices' => smk_font_awesome('readable')
        ));
        
        // CTA 1 - Title
        $wp_customize->add_setting( 'tyros[tyros_cta1_title]', array(
            'default'               => __( 'Theme Options', 'tyros' ),
            'transport'             => 'refresh',
            'sanitize_callback'     => 'sanitize_text_field',
            'type'                  => 'option'
        ) );
        $wp_customize->add_control( 'tyros[tyros_cta1_title]', array(
            'type'                  => 'text',
            'section'               => 'tyros_cta_trio_section',
            'label'                 => __( 'CTA 1 - Title', 'tyros' ),
        ) );
        
        // CTA 1 - Tagline
        $wp_customize->add_setting( 'tyros[tyros_cta1_text]', array(
            'default'               => __( 'Change typography, colors, layouts...', 'tyros' ),
            'transport'             => 'refresh',
            'sanitize_callback'     => 'sanitize_text_field',
            'type'                  => 'option'
        ) );
        $wp_customize->add_control( 'tyros[tyros_cta1_text]', array(
            'type'                  => 'text',
            'section'               => 'tyros_cta_trio_section',
            'label'                 => __( 'CTA 1 - Tagline', 'tyros' ),
        ) );
        
        // CTA 1 - URL
        $wp_customize->add_setting( 'tyros[tyros_cta1_url]', array(
            'default'               => '',
            'transport'             => 'refresh',
            'sanitize_callback'     => 'sanitize_text_field',
            'type'                  => 'option'
        ) );
        $wp_customize->add_control( 'tyros[tyros_cta1_url]', array(
            'type'                  => 'text',
            'section'               => 'tyros_cta_trio_section',
            'label'                 => __( 'CTA 1 - Link/URL', 'tyros' ),
        ) );

        // CTA 1 - Link Text
        $wp_customize->add_setting( 'tyros[tyros_cta1_button_text]', array(
            'default'               => __( 'Click Here', 'tyros' ),
            'transport'             => 'refresh',
            'sanitize_callback'     => 'sanitize_text_field',
            'type'                  => 'option'
        ) );
        $wp_customize->add_control( 'tyros[tyros_cta1_button_text]', array(
            'type'                  => 'text',
            'section'               => 'tyros_cta_trio_section',
            'label'                 => __( 'CTA 1 - Link Text', 'tyros' ),
        ) );
    
        // CTA 2 - Icon
        $wp_customize->add_setting( 'tyros[tyros_cta2_icon]', array(
            'default' => 'fa-mobile',
            'transport' => 'refresh',
            'sanitize_callback' => 'tyros_sanitize_icon',
            'type'                  => 'option'
        ));
        $wp_customize->add_control( 'tyros[tyros_cta2_icon]', array(
            'label' => __('CTA 2 - Icon', 'tyros'),
            'section' => 'tyros_cta_trio_section',
            'type' => 'select',
            'choices' => smk_font_awesome('readable')
        ));
        
        // CTA 2 - Title
        $wp_customize->add_setting( 'tyros[tyros_cta2_title]', array(
            'default'               => __( 'Responsive Layout', 'tyros' ),
            'transport'             => 'refresh',
            'sanitize_callback'     => 'sanitize_text_field',
            'type'                  => 'option'
        ) );
        $wp_customize->add_control( 'tyros[tyros_cta2_title]', array(
            'type'                  => 'text',
            'section'               => 'tyros_cta_trio_section',
            'label'                 => __( 'CTA 2 - Title', 'tyros' ),
        ) );
        
        // CTA 2 - Tagline
        $wp_customize->add_setting( 'tyros[tyros_cta2_text]', array(
            'default'               => __( 'Looks great on different devices', 'tyros' ),
            'transport'             => 'refresh',
            'sanitize_callback'     => 'sanitize_text_field',
            'type'                  => 'option'
        ) );
        $wp_customize->add_control( 'tyros[tyros_cta2_text]', array(
            'type'                  => 'text',
            'section'               => 'tyros_cta_trio_section',
            'label'                 => __( 'CTA 2 - Tagline', 'tyros' ),
        ) );
        
        // CTA 2 - URL
        $wp_customize->add_setting( 'tyros[tyros_cta2_url]', array(
            'default'               => '',
            'transport'             => 'refresh',
            'sanitize_callback'     => 'sanitize_text_field',
            'type'                  => 'option'
        ) );
        $wp_customize->add_control( 'tyros[tyros_cta2_url]', array(
            'type'                  => 'text',
            'section'               => 'tyros_cta_trio_section',
            'label'                 => __( 'CTA 2 - Link/URL', 'tyros' ),
        ) );

        // CTA 2 - Link Text
        $wp_customize->add_setting( 'tyros[tyros_cta2_button_text]', array(
            'default'               => __( 'Click Here', 'tyros' ),
            'transport'             => 'refresh',
            'sanitize_callback'     => 'sanitize_text_field',
            'type'                  => 'option'
        ) );
        $wp_customize->add_control( 'tyros[tyros_cta2_button_text]', array(
            'type'                  => 'text',
            'section'               => 'tyros_cta_trio_section',
            'label'                 => __( 'CTA 2 - Link Text', 'tyros' ),
        ) );
    
        // CTA 3 - Icon
        $wp_customize->add_setting( 'tyros[tyros_cta3_icon]', array(
            'default' => 'fa-diamond',
            'transport' => 'refresh',
            'sanitize_callback' => 'tyros_sanitize_icon',
            'type'                  => 'option'
        ));
        $wp_customize->add_control( 'tyros[tyros_cta3_icon]', array(
            'label' => __('CTA 3 - Icon', 'tyros'),
            'section' => 'tyros_cta_trio_section',
            'type' => 'select',
            'choices' => smk_font_awesome('readable')
        ));
        
        // CTA 3 - Title
        $wp_customize->add_setting( 'tyros[tyros_cta3_title]', array(
            'default'               => __( 'Elegant Design', 'tyros' ),
            'transport'             => 'refresh',
            'sanitize_callback'     => 'sanitize_text_field',
            'type'                  => 'option'
        ) );
        $wp_customize->add_control( 'tyros[tyros_cta3_title]', array(
            'type'                  => 'text',
            'section'               => 'tyros_cta_trio_section',
            'label'                 => __( 'CTA 3 - Title', 'tyros' ),
        ) );
        
        // CTA 3 - Tagline
        $wp_customize->add_setting( 'tyros[tyros_cta3_text]', array(
            'default'               => __( 'Beautiful design to give your site an elegant look', 'tyros' ),
            'transport'             => 'refresh',
            'sanitize_callback'     => 'sanitize_text_field',
            'type'                  => 'option'
        ) );
        $wp_customize->add_control( 'tyros[tyros_cta3_text]', array(
            'type'                  => 'text',
            'section'               => 'tyros_cta_trio_section',
            'label'                 => __( 'CTA 3 - Tagline', 'tyros' ),
        ) );
        
        // CTA 3 - URL
        $wp_customize->add_setting( 'tyros[tyros_cta3_url]', array(
            'default'               => '',
            'transport'             => 'refresh',
            'sanitize_callback'     => 'sanitize_text_field',
            'type'                  => 'option'
        ) );
        $wp_customize->add_control( 'tyros[tyros_cta3_url]', array(
            'type'                  => 'text',
            'section'               => 'tyros_cta_trio_section',
            'label'                 => __( 'CTA 3 - Link/URL', 'tyros' ),
        ) );

        // CTA 3 - Link Text
        $wp_customize->add_setting( 'tyros[tyros_cta3_button_text]', array(
            'default'               => __( 'Click Here', 'tyros' ),
            'transport'             => 'refresh',
            'sanitize_callback'     => 'sanitize_text_field',
            'type'                  => 'option'
        ) );
        $wp_customize->add_control( 'tyros[tyros_cta3_button_text]', array(
            'type'                  => 'text',
            'section'               => 'tyros_cta_trio_section',
            'label'                 => __( 'CTA 3 - Link Text', 'tyros' ),
        ) );
    
    // ---------------------------------------------
    // Frontpage Content - Adds to Static Front Page
    // ---------------------------------------------
    
        // Show / Hide the Homepage Content?
        $wp_customize->add_setting( 'tyros[tyros_frontpage_content_bool]', array(
            'default'               => 'yes',
            'transport'             => 'refresh',
            'sanitize_callback'     => 'tyros_sanitize_show_hide',
            'type'                  => 'option'
        ) );
        $wp_customize->add_control( 'tyros[tyros_frontpage_content_bool]', array(
            'label'   => __( 'Show or hide the homepage content?', 'tyros' ),
            'section' => 'static_front_page',
            'type'    => 'radio',
            'choices'    => array(
                'yes'   => __( 'Show', 'tyros' ),
                'no'    => __( 'Hide', 'tyros' ),
            )
        ));
