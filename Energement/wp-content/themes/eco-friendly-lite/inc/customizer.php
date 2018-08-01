<?php
/**
 * Correct Lite Theme Customizer
 *
 * @package Eco Friendly Lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function eco_friendly_lite_customize_register( $wp_customize ) {
	//Add a class for titles
    class eco_friendly_lite_Info extends WP_Customize_Control {
        public $type = 'info';
        public $label = '';
        public function render_content() {
        ?>
			<h3 style="text-decoration: underline; color: #DA4141; text-transform: uppercase;"><?php echo esc_html( $this->label ); ?></h3>
        <?php
        }
    }

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->add_setting('color_scheme',array(
			'default'	=> '#393939',
			'sanitize_callback'	=> 'sanitize_hex_color'
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'color_scheme',array(
			'label' => esc_html__('Color Scheme','eco-friendly-lite'),			
			 'description'	=> esc_html__('More color options in PRO Version','eco-friendly-lite'),	
			'section' => 'colors',
			'settings' => 'color_scheme'
		))
	);
	
	// Slider Section		
	$wp_customize->add_section( 'slider_section', array(
            'title' => esc_html__('Slider Settings', 'eco-friendly-lite'),
            'priority' => null,
            'description'	=> wp_kses_post('<strong>Slider Display When Frontpage Is Selected.</strong> <br/><br/>Featured Image Size Should be ( 1400 X 585 ) More slider settings available in PRO Version','eco-friendly-lite'),		
        )
    );
	
	$wp_customize->add_setting('page-setting10',array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('page-setting10',array(
			'type'	=> 'dropdown-pages',
			'label'	=> esc_html__('Select page for slide one:','eco-friendly-lite'),
			'section'	=> 'slider_section'
	));	
	
	$wp_customize->add_setting('page-setting11',array(
			'default' => '0',
			'capability' => 'edit_theme_options',			
			'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('page-setting11',array(
			'type'	=> 'dropdown-pages',
			'label'	=> esc_html__('Select page for slide two:','eco-friendly-lite'),
			'section'	=> 'slider_section'
	));	
	
	$wp_customize->add_setting('page-setting12',array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('page-setting12',array(
			'type'	=> 'dropdown-pages',
			'label'	=> esc_html__('Select page for slide three:','eco-friendly-lite'),
			'section'	=> 'slider_section'
	));	
	
	$wp_customize->add_setting('slide_button',array(
			'default'	=> null,
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('slide_button',array(
			'label'	=> esc_html__('Add Slide Button Title Here','eco-friendly-lite'),
			'section'	=> 'slider_section',
			'setting'	=> 'slide_button'
	));	
	
	//Slider hide
	$wp_customize->add_setting('hide_slides',array(
			'sanitize_callback' => 'wp_validate_boolean',
			'default' => true,
	));	 

	$wp_customize->add_control( 'hide_slides', array(
    	   'section'   => 'slider_section',    	 
		   'label'	=> esc_html__('Check To Hide Slider','eco-friendly-lite'),
    	   'type'      => 'checkbox'
     )); // Slider Section	
	 
	// Home Section Two Four Boxes Section 	
	$wp_customize->add_section('section_third', array(
		'title'	=> esc_html__('Home Page Section 1 Five Boxes','eco-friendly-lite'),
		'description'	=> wp_kses_post('<strong>Section Display When Frontpage Is Selected.</strong> <br/><br/>Select pages from the dropdown for homepage section 1 boxes','eco-friendly-lite'),
		'priority'	=> null
	));	
	
	$wp_customize->add_setting('sec2-page-column5',	array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback' => 'absint',
		));
 
	$wp_customize->add_control(	'sec2-page-column5',array('type' => 'dropdown-pages',
			'section' => 'section_third',
	));	
	
	$wp_customize->add_setting('sec2-page-column6',	array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback' => 'absint',
		));
 
	$wp_customize->add_control(	'sec2-page-column6',array('type' => 'dropdown-pages',
			'section' => 'section_third',
	));
	
	$wp_customize->add_setting('sec2-page-column7',	array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback' => 'absint',
		));
 
	$wp_customize->add_control(	'sec2-page-column7',array('type' => 'dropdown-pages',
			'section' => 'section_third',
	));
	
	$wp_customize->add_setting('sec2-page-column8',	array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback' => 'absint',
		));
 
	$wp_customize->add_control(	'sec2-page-column8',array('type' => 'dropdown-pages',
			'section' => 'section_third',
	));	
	
	$wp_customize->add_setting('sec2-page-column9',	array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback' => 'absint',
		));
 
	$wp_customize->add_control(	'sec2-page-column9',array('type' => 'dropdown-pages',
			'section' => 'section_third',
	));		
	
	//Hide Page Boxes Column Section
	$wp_customize->add_setting('hide_pagefiveboxes',array(
			'sanitize_callback' => 'wp_validate_boolean',
			'default' => true,
	));	 

	$wp_customize->add_control( 'hide_pagefiveboxes', array(
    	   'section'   => 'section_third',    	 
		   'label'	=> esc_html__('Check To Hide Section','eco-friendly-lite'),
    	   'type'      => 'checkbox'
     )); // Home Section Two Four Boxes Section
	 
	// Home Three Boxes Section 	
	$wp_customize->add_section('section_second', array(
		'title'	=> esc_html__('Home Page Section 2','eco-friendly-lite'),
		'description'	=> wp_kses_post('<strong>Section Display When Frontpage Is Selected.</strong> <br/><br/>Select page from the dropdown for homepage section 2 area','eco-friendly-lite'),
		'priority'	=> null
	));	
	
	$wp_customize->add_setting('page-column1',	array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback' => 'absint',
		));
 
	$wp_customize->add_control(	'page-column1',array('type' => 'dropdown-pages',
			'section' => 'section_second',
	));	
	
	//Hide Page Content Section
	$wp_customize->add_setting('hide_pagecontentboxes',array(
			'sanitize_callback' => 'wp_validate_boolean',
			'default' => true,
	));	 

	$wp_customize->add_control('hide_pagecontentboxes', array(
    	   'section'   => 'section_second',    	 
		   'label'	=> esc_html__('Check To Hide Section','eco-friendly-lite'),
    	   'type'      => 'checkbox'
     ));
	 // Hide Page Boxes Column Section	 
    $wp_customize->add_setting('eco_friendly_lite_options[layout-info]', array(
            'type' => 'info_control',
            'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control( new eco_friendly_lite_Info( $wp_customize, 'layout_section', array(
        'section' => 'theme_layout_sec',
        'settings' => 'eco_friendly_lite_options[layout-info]',
        'priority' => null
        ) )
    );
	  
    $wp_customize->add_setting('eco_friendly_lite_options[font-info]', array(
            'type' => 'info_control',
            'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control( new eco_friendly_lite_Info( $wp_customize, 'font_section', array(
        'section' => 'theme_font_sec',
        'settings' => 'eco_friendly_lite_options[font-info]',
        'priority' => null
        ) )
    );	
	  
    $wp_customize->add_setting('eco_friendly_lite_options[info]', array(
            'type' => 'info_control',
            'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control( new eco_friendly_lite_Info( $wp_customize, 'doc_section', array(
        'section' => 'theme_doc_sec',
        'settings' => 'eco_friendly_lite_options[info]',
        'priority' => 10
        ) )
    );		
}
add_action( 'customize_register', 'eco_friendly_lite_customize_register' );
//setting inline css.
function eco_friendly_lite_custom_css() {
    wp_enqueue_style(
        'eco-friendly-lite-custom-style',
        get_template_directory_uri() . '/css/custom_script.css'
    );
        $color = esc_attr(get_theme_mod( 'color_scheme' )); //E.g. #FF0000
		$header_text_color = esc_attr(get_header_textcolor());
		
        $custom_css = "
                #sidebar ul li a:hover,
					.cols-3 ul li a:hover, .cols-3 ul li.current_page_item a,					
					.phone-no strong,					
					.left a:hover,
					.blog_lists h4 a:hover,
					.recent-post h6 a:hover,
					.postmeta a:hover,
					.recent-post .morebtn:hover{
                        color: {$color};
                }
				
                .pagination .nav-links span.current, .pagination .nav-links a:hover,
					#commentform input#submit:hover,
					.slide_info .slide_more:hover,													
					.wpcf7 input[type='submit'],					
					.social-icons a:hover,
					.benefitbox-4:hover .benefitbox-title,
					input.search-submit{
                        background-color: {$color};
                }
				
 				.logo h2{
					color: #$header_text_color;
				}										
				";
        wp_add_inline_style( 'eco-friendly-lite-custom-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'eco_friendly_lite_custom_css' );         

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function eco_friendly_lite_customize_preview_js() {
	wp_enqueue_script( 'eco_friendly_lite_customizer', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'eco_friendly_lite_customize_preview_js' );