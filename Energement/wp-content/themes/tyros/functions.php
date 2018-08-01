<?php
/**
 * Tyros functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Tyros
 */

if ( ! function_exists( 'tyros_setup' ) ) :
    
    if( !defined( 'TYROS_VERSION' ) ) :
        define( 'TYROS_VERSION', '2.0.1' );
    endif;
    
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function tyros_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on Tyros, use a find and replace
         * to change 'tyros' to the name of your theme in all the template files.
         */
        load_theme_textdomain( 'tyros', get_template_directory() . '/languages' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support( 'post-thumbnails' );

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'primary' => esc_html__( 'Primary', 'tyros' ),
        ) );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ) );

        // Add theme support for selective refresh for widgets.
        add_theme_support( 'customize-selective-refresh-widgets' );

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support( 'custom-logo', array(
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        ) );
        
        add_theme_support( 'woocommerce' );
        add_theme_support( 'wc-product-gallery-zoom' );
        add_theme_support( 'wc-product-gallery-lightbox' );
        add_theme_support( 'wc-product-gallery-slider' );
        
        if( ! get_option( 'tyros' ) ) :
            
            // Options array does not exist from a previous version
            
            add_option( 'tyros', tyros_get_options() );
        
        else :
            
            if ( !get_option( 'tyros_migration_process' ) || get_option( 'tyros_migration_process' ) != 'completed' ) : 
            
                tyros_migration_process();
                
            endif;
            
        endif;
        
    }
endif;
add_action( 'after_setup_theme', 'tyros_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function tyros_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'tyros_content_width', 1170 );
}
add_action( 'after_setup_theme', 'tyros_content_width', 0 );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load the Font Awesome helper function.
 */
require get_template_directory() . '/inc/font-awesome.php';

/**
 * Load TGM
 */
 require get_template_directory() . '/inc/tgm.php';

/**
 * Load the main custom theme functions file.
 */
require get_template_directory() . '/inc/tyros/tyros.php';

/**
 * Retrieve options array.
 * 
 * @return type
 */
function tyros_get_options() {
    
    return get_option( 'tyros', array(
        
        // GENERAL
        
        'tyros_headerbar_bool'                  => 'yes',           
        'tyros_logo_image'                      => '',      // Custom Logo
//        'sc_favicon'                      => '',      // Favicon
//        'sc_custom_code                   => '',      // JS Analytics Code
        
        // HEADER
        
        'tyros_branding_bar_height'             => 80,                                                      // New
        'tyros_branding_bar_height_mobile'      => 80,                                                      // New
        
        // SOCIAL
        
        'tyros_facebook_url'                    => '',
        'tyros_twitter_url'                     => '',
        'tyros_linkedin_url'                    => '',
        'tyros_gplus_url'                       => '',
        'tyros_instagram_url'                   => '',                                                      // New
        'tyros_youtube_url'                     => '',                                                      // New
        'tyros_pinterest_url'                   => '',                                                      // New
        'tyros_store_link1_text'                => '',
        'tyros_store_link1_url'                 => '',
        'tyros_store_link2_text'                => '',
        'tyros_store_link2_url'                 => '',
        'tyros_store_link3_text'                => '',
        'tyros_store_link3_url'                 => '',

        // FOOTER
        
        'tyros_footer_columns'                  => 'col-md-4',
        'tyros_paypal'                          => 'on',
        'tyros_visa'                            => 'on',
        'tyros_mastercard'                      => 'on',
        'tyros_footer_text'                     => __( '© 2017 Your Company Name', 'tyros' ),
        
        // APPEARANCE
        
        'tyros_theme_color'                     => 'red',                          
        'tyros_theme_background_pattern'        => 'halftone',                          
        'tyros_font_size'                       => 14,                              
        'tyros_font_family'                     => 'Josefin Sans, sans-serif',      
        'tyros_font_family_secondary'           => 'Lato, sans-serif',                                      // New
        
        // SINGLE LAYOUT
        
        'tyros_single_layout'                   => 'col2r',                         
        'tyros_single_featured'                 => 'on',                            
        'tyros_single_date'                     => 'on',                            
        'tyros_single_author'                   => 'on',        
        'tyros_homepage_sidebar'                => 'sidebar-off',        
        
        // BLOG LAYOUT
        
        'tyros_blog_layout'                     => 'col2r',
        'tyros_blog_featured'                   => 'on',
        
        // SLIDER
        
        'tyros_slider_bool'                     => 'yes',
        
        'tyros_slide1_image'                    => get_template_directory_uri() . '/inc/images/tyros_demo.jpg',
        'tyros_slide1_text'                     => __( 'Welcome to Tyros', 'tyros' ),
        'tyros_slide1_text2'                    => __( 'A professional, multi-purpose WordPress theme', 'tyros' ),
        'tyros_slide1_button_text'              => __( 'Click Here', 'tyros' ),
        'tyros_slide1_button_url'               => '',
        
        'tyros_slide2_image'                    => get_template_directory_uri() . '/inc/images/tyros_demo.jpg',
        'tyros_slide2_text'                     => __( 'Welcome to Tyros', 'tyros' ),
        'tyros_slide2_text2'                    => __( 'A professional, multi-purpose WordPress theme', 'tyros' ),
        'tyros_slide2_button_text'              => __( 'Click Here', 'tyros' ),
        'tyros_slide2_button_url'               => '',
        
        'tyros_slide3_image'                    => '',                                                                      // New
        'tyros_slide4_image'                    => '',                                                                      // New
        'tyros_slide5_image'                    => '',                                                                      // New
        'tyros_slide6_image'                    => '',                                                                      // New

        // CALLOUT BANNER
        
        'tyros_post_slider_cta_bool'            => 'yes',                                                                   // New
        'tyros_cta_header_two'                  => __( 'Tyros: Customizable, Professional, and Beautiful', 'tyros' ),
        'tyros_cta_button_text'                 => __( 'Learn More', 'tyros' ),
        'tyros_cta_button_link'                 => '#',
        
        // CTA TRIO
        
        'tyros_cta_bool'                        => 'yes',
        
        'tyros_cta1_title'                      => __( 'WooCommerce Supported', 'tyros' ),
        'tyros_cta1_icon'                       => 'fa-shopping-cart',
        'tyros_cta1_text'                       => __( 'Compatible with WooCommerce', 'tyros' ),
        'tyros_cta1_url'                        => '',
        'tyros_cta1_button_text'                => __( 'Click Here', 'tyros' ),
        
        'tyros_cta2_title'                      => __( 'Responsive Layout', 'tyros' ),
        'tyros_cta2_icon'                       => 'fa-mobile',
        'tyros_cta2_text'                       => __( 'Fully responsive, & mobile-ready', 'tyros' ),
        'tyros_cta2_url'                        => '',
        'tyros_cta2_button_text'                => __( 'Click Here', 'tyros' ),  
        
        'tyros_cta3_title'                      => __( 'Easy Customization', 'tyros' ),
        'tyros_cta3_icon'                       => 'fa-cogs',
        'tyros_cta3_text'                       => __( 'Build the perfect site with ease', 'tyros' ),
        'tyros_cta3_url'                        => '',
        'tyros_cta3_button_text'                => __( 'Click Here', 'tyros' ),
        
        // FRONTPAGE
        
        'tyros_frontpage_content_bool'          => 'yes',                                                    // New
       
    ) );
    
}

/**
 * Migration process - add missing defaults if updating
 */
function tyros_migration_process() {
    
    // Options array exists from a previous version, set defaults on newer Customizer options

    $existing_tyros_options = tyros_get_options();

    // If exists (strip extra "fa " from old theme option values)
    
    if ( array_key_exists( 'tyros_cta1_icon', $existing_tyros_options ) && strpos( $existing_tyros_options['tyros_cta1_icon'], 'fa ' ) !== false ) :
        $existing_tyros_options['tyros_cta1_icon'] = str_replace( 'fa ', '', $existing_tyros_options['tyros_cta1_icon'] );
    endif; 

    if ( array_key_exists( 'tyros_cta2_icon', $existing_tyros_options ) && strpos( $existing_tyros_options['tyros_cta2_icon'], 'fa ' ) !== false ) :
        $existing_tyros_options['tyros_cta2_icon'] = str_replace( 'fa ', '', $existing_tyros_options['tyros_cta2_icon'] );
    endif; 

    if ( array_key_exists( 'tyros_cta3_icon', $existing_tyros_options ) && strpos( $existing_tyros_options['tyros_cta3_icon'], 'fa ' ) !== false ) :
        $existing_tyros_options['tyros_cta3_icon'] = str_replace( 'fa ', '', $existing_tyros_options['tyros_cta3_icon'] );
    endif; 

    // If not exists
    
    if ( ! array_key_exists( 'tyros_post_slider_cta_bool', $existing_tyros_options ) ) :
        $existing_tyros_options['tyros_post_slider_cta_bool'] = 'yes';
    endif; 

    if ( ! array_key_exists( 'tyros_frontpage_content_bool', $existing_tyros_options ) ) :
        $existing_tyros_options['tyros_frontpage_content_bool'] = 'yes';
    endif; 

    if ( ! array_key_exists( 'tyros_font_family_secondary', $existing_tyros_options ) ) :
        $existing_tyros_options['tyros_font_family_secondary'] = $existing_tyros_options['tyros_font_family'];
    endif; 

    if ( ! array_key_exists( 'tyros_branding_bar_height', $existing_tyros_options ) ) :
        $existing_tyros_options['tyros_branding_bar_height'] = 80;
    endif; 
    
    if ( ! array_key_exists( 'tyros_branding_bar_height_mobile', $existing_tyros_options ) ) :
        $existing_tyros_options['tyros_branding_bar_height_mobile'] = 80;
    endif; 

    if ( ! array_key_exists( 'tyros_instagram_url', $existing_tyros_options ) ) :
        $existing_tyros_options['tyros_instagram_url'] = '';
    endif; 

    if ( ! array_key_exists( 'tyros_youtube_url', $existing_tyros_options ) ) :
        $existing_tyros_options['tyros_youtube_url'] = '';
    endif; 

    if ( ! array_key_exists( 'tyros_pinterest_url', $existing_tyros_options ) ) :
        $existing_tyros_options['tyros_pinterest_url'] = '';
    endif; 
    
    if ( ! array_key_exists( 'tyros_slide3_image', $existing_tyros_options ) ) :
        $existing_tyros_options['tyros_slide3_image'] = '';
    endif; 
    
    if ( ! array_key_exists( 'tyros_slide4_image', $existing_tyros_options ) ) :
        $existing_tyros_options['tyros_slide4_image'] = '';
    endif; 
    
    if ( ! array_key_exists( 'tyros_slide5_image', $existing_tyros_options ) ) :
        $existing_tyros_options['tyros_slide5_image'] = '';
    endif; 
    
    if ( ! array_key_exists( 'tyros_slide6_image', $existing_tyros_options ) ) :
        $existing_tyros_options['tyros_slide6_image'] = '';
    endif; 
    
    if ( array_key_exists( 'tyros_font_size', $existing_tyros_options ) ) : 

        switch ( $existing_tyros_options['tyros_font_size'] ):

            case '10px' :
                $existing_tyros_options['tyros_font_size'] = 10;
                break;

            case '12px' :
                $existing_tyros_options['tyros_font_size'] = 12;
                break;

            case '14px' :
                $existing_tyros_options['tyros_font_size'] = 14;
                break;

            case '16px' :
                $existing_tyros_options['tyros_font_size'] = 16;
                break;

            case '18px' :
                $existing_tyros_options['tyros_font_size'] = 18;
                break;

            default :
                $existing_tyros_options['tyros_font_size'] = 14;

        endswitch;

    endif;

    if ( array_key_exists( 'tyros_font_family', $existing_tyros_options ) ) : 

        switch ( $existing_tyros_options['tyros_font_family'] ):

            case 'Lobster, cursive' :
                $existing_tyros_options['tyros_font_family'] = 'Lobster Two, cursive';
                break;

            default :
                break;

        endswitch;

    endif;

    update_option( 'tyros', $existing_tyros_options );
    update_option( 'tyros_migration_process', 'completed' );
    
}

$strap_check = function_exists( 'tyros_strap_pl' ) && tyros_strap_pl() ? true : false;

if( ! $strap_check ) {
    require_once( trailingslashit( get_template_directory() ) . 'trt-customize-pro/example-1/class-customize.php' );    
}

