<?php

/**
 * Enqueue scripts and styles.
 */
function tyros_scripts() {
    
    wp_enqueue_style( 'tyros-style', get_stylesheet_uri() );
    
    // Get the Options array
    $tyros_options     = tyros_get_options();

    // Load Fonts from array
    $fonts              = tyros_fonts();
    $non_google_fonts   = tyros_non_google_fonts();
    
    // Are both fonts Google Fonts?
    if ( array_key_exists ( $tyros_options['tyros_font_family'], $fonts ) && !array_key_exists ( $tyros_options['tyros_font_family'], $non_google_fonts ) &&
        array_key_exists ( $tyros_options['tyros_font_family_secondary'], $fonts ) && !array_key_exists ( $tyros_options['tyros_font_family_secondary'], $non_google_fonts ) ) :
        
        if ( $tyros_options['tyros_font_family'] == $tyros_options['tyros_font_family_secondary'] ) :
            // Both fonts are Google Fonts and are the same, enqueue once
            wp_enqueue_style('google-fonts', '//fonts.googleapis.com/css?family=' . esc_attr( $fonts[ $tyros_options['tyros_font_family'] ] ), array(), TYROS_VERSION ); 
        else :
            // Both fonts are Google Fonts but are different, enqueue together
            wp_enqueue_style('google-fonts', '//fonts.googleapis.com/css?family=' . esc_attr( $fonts[ $tyros_options['tyros_font_family'] ] . '|' . $fonts[ $tyros_options['tyros_font_family_secondary'] ] ), array(), TYROS_VERSION ); 
        endif;
        
    elseif ( array_key_exists ( $tyros_options['tyros_font_family'], $fonts ) && !array_key_exists ( $tyros_options['tyros_font_family'], $non_google_fonts ) ) :
    
        // Only Primary is a Google Font. Enqueue it.
        wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=' . esc_attr( $fonts[ $tyros_options['tyros_font_family'] ] ), array(), TYROS_VERSION ); 
        
    elseif ( array_key_exists ( $tyros_options['tyros_font_family_secondary'], $fonts ) && !array_key_exists ( $tyros_options['tyros_font_family_secondary'], $non_google_fonts ) ) :
        
        // Only Secondary is a Google Font. Enqueue it.
        wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=' . esc_attr( $fonts[ $tyros_options['tyros_font_family_secondary'] ] ), array(), TYROS_VERSION ); 
        
    endif;
    
    // Styles
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/inc/css/bootstrap.min.css', array(), TYROS_VERSION );
    wp_enqueue_style( 'animate', get_template_directory_uri() . '/inc/css/animate.css', array(), TYROS_VERSION );
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/inc/css/font-awesome.min.css', array(), TYROS_VERSION );
    wp_enqueue_style( 'slicknav', get_template_directory_uri() . '/inc/css/slicknav.min.css', array(), TYROS_VERSION );
    wp_enqueue_style( 'camera', get_template_directory_uri() . '/inc/css/camera.css', array(), TYROS_VERSION );
    wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/inc/css/owl.carousel.css', array(), TYROS_VERSION );
    wp_enqueue_style( 'tyros-old-style', get_template_directory_uri() . '/inc/css/old_tyros.css', array(), TYROS_VERSION );
    wp_enqueue_style( 'tyros-main-style', get_template_directory_uri() . '/inc/css/tyros.css', array(), TYROS_VERSION );

    // Scripts
    wp_enqueue_script( 'jquery-easing', get_template_directory_uri() . '/inc/js/jquery.easing.1.3.js', array('jquery'), TYROS_VERSION, true );
    wp_enqueue_script( 'slicknav', get_template_directory_uri() . '/inc/js/jquery.slicknav.min.js', array('jquery'), TYROS_VERSION, true );
    wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/inc/js/owl.carousel.min.js', array('jquery'), TYROS_VERSION, true );
    wp_enqueue_script( 'sticky-js', get_template_directory_uri() . '/inc/js/jquery.sticky.js', array('jquery'), TYROS_VERSION, true );
    wp_enqueue_script( 'camera-js', get_template_directory_uri() . '/inc/js/camera.min.js', array('jquery'), TYROS_VERSION, true );
    wp_enqueue_script( 'wow', get_template_directory_uri() . '/inc/js/wow.min.js', array('jquery'), TYROS_VERSION, true );
    wp_enqueue_script( 'tyros-main-script', get_template_directory_uri() . '/inc/js/tyros.js', array('jquery', 'jquery-masonry'), TYROS_VERSION, true );

    $slider_array = array(
        'desktop_height'    => isset( $tyros_options['tyros_slider_height'] )     ? $tyros_options['tyros_slider_height']       : '42',
        'slide_timer'       => isset( $tyros_options['tyros_slider_time'] )       ? $tyros_options['tyros_slider_time']         : 4000, 
        'animation'         => isset( $tyros_options['sc_slider_fx'] )            ? $tyros_options['sc_slider_fx']           : 'simpleFade',
        'pagination'        => isset( $tyros_options['tyros_slider_pagination'] ) ? $tyros_options['tyros_slider_pagination']   : 'off',
        'navigation'        => isset( $tyros_options['tyros_slider_navigation'] ) ? $tyros_options['tyros_slider_navigation']   : 'on',
        'animation_speed'   => isset( $tyros_options['tyros_slider_trans_time'] ) ? $tyros_options['tyros_slider_trans_time']   : 2000,
        'hover'             => isset( $tyros_options['tyros_slider_hover'] )      ? $tyros_options['tyros_slider_hover']        : 'on',
        'loader'            => isset( $tyros_options['tyros_loader_style'] )      ? $tyros_options['tyros_loader_style']        : 'pie',
    );
    
    // Pass each JS object to the custom script using wp_localize_script
    wp_localize_script( 'tyros-main-script', 'tyrosSlider', $slider_array );
    
    // Other Scripts
    wp_enqueue_script( 'tyros-navigation', get_template_directory_uri() . '/js/navigation.js', array(), TYROS_VERSION, true );
    wp_enqueue_script( 'tyros-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), TYROS_VERSION, true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
    
}
add_action( 'wp_enqueue_scripts', 'tyros_scripts' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function tyros_widgets_init() {
    
    $tyros_options = tyros_get_options();
    
    $homepage_a_widths = isset( $tyros_options['homepage_a_widget_widths'] ) && function_exists( 'tyros_strap_pl' ) && tyros_strap_pl() ? $tyros_options['homepage_a_widget_widths'] : '12';
    $homepage_b_widths = isset( $tyros_options['homepage_b_widget_widths'] ) && function_exists( 'tyros_strap_pl' ) && tyros_strap_pl() ? $tyros_options['homepage_b_widget_widths'] : '12';
    $above_page_widths = isset( $tyros_options['above_page_widths'] ) && function_exists( 'tyros_strap_pl' ) && tyros_strap_pl() ? $tyros_options['above_page_widths'] : '12';
    $below_page_widths = isset( $tyros_options['below_page_widths'] ) && function_exists( 'tyros_strap_pl' ) && tyros_strap_pl() ? $tyros_options['below_page_widths'] : '12';
    $above_post_widths = isset( $tyros_options['above_post_widths'] ) && function_exists( 'tyros_strap_pl' ) && tyros_strap_pl() ? $tyros_options['above_post_widths'] : '12';
    $below_post_widths = isset( $tyros_options['below_post_widths'] ) && function_exists( 'tyros_strap_pl' ) && tyros_strap_pl() ? $tyros_options['below_post_widths'] : '12';
    
    // Homepage A
    register_sidebar(array(
        'name' => __('Homepage Widget Area - A', 'tyros'),
        'id' => 'sidebar-banner',
        'description' => '',
        'before_widget' => '<div class="col-sm-' . esc_attr( $homepage_a_widths ) . '"><aside id="%1$s" class="widget %2$s animated wow fadeIn">',
        'after_widget' => '</aside></div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    // Homepage B
    register_sidebar(array(
        'name' => __('Homepage Widget Area - B', 'tyros'),
        'id' => 'sidebar-bannerb',
        'description' => '',
        'before_widget' => '<div class="col-sm-' . esc_attr( $homepage_b_widths ) . '"><aside id="%1$s" class="widget %2$s animated wow fadeIn">',
        'after_widget' => '</aside></div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
    
    // Above Page  
    register_sidebar(array(
        'name' => __('Above Page Widget', 'tyros'),
        'id' => 'sidebar-above-page',
        'description' => '',
        'before_widget' => '<div class="col-sm-' . esc_attr( $above_page_widths ) . '"><aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside></div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
    
    // Below Page
    register_sidebar(array(
        'name' => __('Below Page Widget', 'tyros'),
        'id' => 'sidebar-below-page',
        'description' => '',
        'before_widget' => '<div class="col-sm-' . esc_attr( $below_page_widths ) . '"><aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside></div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
    
    // Above Post
    register_sidebar(array(
        'name' => __('Above Post Widget', 'tyros'),
        'id' => 'sidebar-above-post',
        'description' => '',
        'before_widget' => '<div class="col-sm-' . esc_attr( $above_post_widths ) . '"><aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside></div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
    
    // Below Post
    register_sidebar(array(
        'name' => __('Below Post Widget', 'tyros'),
        'id' => 'sidebar-below-post',
        'description' => '',
        'before_widget' => '<div class="col-sm-' . esc_attr( $below_post_widths ) . '"><aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside></div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
    
    // Right Sidebar
    register_sidebar(array(
        'name' => __('Right Sidebar', 'tyros'),
        'id' => 'sidebar-1',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    // Shop Sidebar
    register_sidebar(array(
        'name' => __('Shop Sidebar', 'tyros'),
        'id' => 'sidebar-shop',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s"><div class="col-sm-12">',
        'after_widget' => '</div></aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    // Footer
    register_sidebar(array(
        'name' => __('Footer', 'tyros'),
        'id' => 'sidebar-footer',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="' . esc_attr( $tyros_options['tyros_footer_columns'] ) . ' widget %2$s animated wow fadeIn">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
    
}
add_action( 'widgets_init', 'tyros_widgets_init' );

/**
 * Hex to rgb(a) converter function.
 */
function tyros_hex2rgba( $color, $opacity = false ) {

    $default = 'rgb(0,0,0)';

    // Return default if no color provided
    if ( empty( $color ) ) { return $default; }

    // Sanitize $color if "#" is provided
    if ( $color[0] == '#' ) { $color = substr( $color, 1 ); }

    // Check if color has 6 or 3 characters and get values
    if ( strlen( $color ) == 6 ) {
        $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
    } elseif ( strlen( $color ) == 3 ) {
        $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
    } else {
        return $default;
    }

    // Convert hexadec to rgb
    $rgb =  array_map( 'hexdec', $hex );

    // Check if opacity is set(rgba or rgb)
    if( $opacity ) {

        if( abs( $opacity ) > 1 ) { $opacity = 1.0; }
        $output = 'rgba('.implode(",",$rgb).','.$opacity.')';

    } else {

        $output = 'rgb('.implode(",",$rgb).')';

    }

    // Return rgb(a) color string
    return $output;

}

/**
 * Inject dynamic CSS rules with wp_head.
 */
function tyros_custom_css() { 

    $tyros_options = tyros_get_options(); ?>

    <style>

        #parent-slider-wrap {
            height: calc( (100vw - ( 100vw - 1140px) ) * <?php echo isset( $tyros_options['tyros_slider_height'] ) ? (int)$tyros_options['tyros_slider_height'] / 100 : (int)'42' / 100; ?>);
        }
        
        h1,h2,h3,h4,h5,h6 {
            font-family: <?php echo esc_attr( $tyros_options['tyros_font_family'] ); ?>;
        }
        
        body {
            font-size: <?php echo esc_attr( $tyros_options['tyros_font_size'] ); ?>px;
            font-family: <?php echo esc_attr( $tyros_options['tyros_font_family_secondary'] ); ?>;
        }
        
        div#masonry-blog-wrapper .post-category,
        div#masonry-blog-wrapper .post-meta,
        body.single-team_member .sc_personal_quote span.sc_personal_quote_content {
            font-family: <?php echo esc_attr( $tyros_options['tyros_font_family_secondary'] ); ?>;
        }
        
        /*
        ----- Header Heights ---------------------------------------------------------
        */

        @media (min-width:992px) {
            #site-branding,
            #site-navigation,
            #site-branding-sticky-wrap-sticky-wrapper
            {
               height: <?php echo intval( $tyros_options['tyros_branding_bar_height'] ); ?>px !important;
            }
            #site-branding img {
               max-height: <?php echo intval( $tyros_options['tyros_branding_bar_height'] ); ?>px;
            }
            div#primary-menu > ul > li,
            ul#primary-menu > li {
                line-height: <?php echo intval( $tyros_options['tyros_branding_bar_height'] ); ?>px;
            }
        }
        @media (max-width:991px) {
            #site-branding,
            #site-navigation,
            #site-branding-sticky-wrap-sticky-wrapper
            {
               height: <?php echo intval( $tyros_options['tyros_branding_bar_height_mobile'] ); ?>px !important;
            }
            #site-branding img {
               max-height: <?php echo intval( $tyros_options['tyros_branding_bar_height_mobile'] ); ?>px;
            }
            div#primary-menu > ul > li,
            ul#primary-menu > li {
                line-height: <?php echo intval( $tyros_options['tyros_branding_bar_height_mobile'] ); ?>px;
            }
        }
        
       
        /*
        ----- Theme Colors -----------------------------------------------------
        */
       
        <?php 
        
        $colors_array = tyros_get_theme_skin_colors();
        
        $primary_theme_color = $colors_array['primary'];
        $secondary_theme_color = $colors_array['accent']; 
        
        ?>
       
        /* --- Primary --- */
        
        a,
        a:visited,
        .primary-color,
        .btn-primary .badge,
        .btn-link,
        .sc-primary-color,
        .icon404,
        .nav-menu > li a:hover,
        .smartcat_team_member:hover h4,
        #site-navigation.main-navigation li a:hover,
        #site-navigation.main-navigation li.current_page_item > a,
        #site-cta .site-cta .fa,
        .feature-grid .fa,
        header#masthead div#primary-menu > ul > li:hover > a,
        header#masthead ul#primary-menu > li:hover > a,
        .woocommerce .woocommerce-breadcrumb a,
        .order-total .amount,
        aside.widget_product_categories ul.product-categories li a:hover 
        {
            color: <?php echo esc_attr( $primary_theme_color ); ?>;
        }
        
        .woocommerce-message::before,
        .sc_personal_quote span.sc_team_icon-quote-left,
        .sc_team_single_member .articles .article a,
        .woocommerce ins .amount {
            color: <?php echo esc_attr( $primary_theme_color ); ?> !important;
        }
        
        a.btn-primary,
        .btn-primary,
        .tyros-button,
        fieldset[disabled] .btn-primary.active,
        ul.social-icons li a:hover,
        #site-toolbar .row .social-bar a:hover,
        #main-heading,
        #site-cta .site-cta .fa.hover,
        #site-toolbar .social-bar a:hover,
        div#post-slider-cta,
        .btn, button, input[type="button"], input[type="reset"], input[type="submit"],
        #homepage-area-b .top-banner-text,
        .woocommerce a.button.add_to_cart_button,
        .woocommerce button.single_add_to_cart_button,
        .woocommerce a.button.product_type_simple,
        .woocommerce button.product_type_simple,
        .widget.woocommerce a.button,
        .woocommerce-cart .woocommerce a.button,
        .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,
        .woocommerce span.onsale, .woocommerce-page span.onsale,
        .wc-pagination ul span.page-numbers.current,
        .pagination-links .page-numbers.current,
        .woocommerce .widget_price_filter .ui-slider .ui-slider-handle, .woocommerce-page .widget_price_filter .ui-slider .ui-slider-handle,
        .woocommerce .widget_price_filter .ui-slider .ui-slider-range, .woocommerce-page .widget_price_filter .ui-slider .ui-slider-range,
        .woocommerce #respond input#submit.alt.disabled, .woocommerce #respond input#submit.alt.disabled:hover, .woocommerce #respond input#submit.alt:disabled, .woocommerce #respond input#submit.alt:disabled:hover, .woocommerce #respond input#submit.alt:disabled[disabled], .woocommerce #respond input#submit.alt:disabled[disabled]:hover, .woocommerce a.button.alt.disabled, .woocommerce a.button.alt.disabled:hover, .woocommerce a.button.alt:disabled, .woocommerce a.button.alt:disabled:hover, .woocommerce a.button.alt:disabled[disabled], .woocommerce a.button.alt:disabled[disabled]:hover, .woocommerce button.button.alt.disabled, .woocommerce button.button.alt.disabled:hover, .woocommerce button.button.alt:disabled, .woocommerce button.button.alt:disabled:hover, .woocommerce button.button.alt:disabled[disabled], .woocommerce button.button.alt:disabled[disabled]:hover, .woocommerce input.button.alt.disabled, .woocommerce input.button.alt.disabled:hover, .woocommerce input.button.alt:disabled, .woocommerce input.button.alt:disabled:hover, .woocommerce input.button.alt:disabled[disabled], .woocommerce input.button.alt:disabled[disabled]:hover,
        .sc_team_single_member .sc_team_single_skills .progress, .sc-tags .sc-single-tag
        {
            background: <?php echo esc_attr( $primary_theme_color ); ?>;
        }
        
        .woocommerce input[type="submit"].button,
        .woocommerce a.checkout-button.button,
        .woocommerce form input.submit,
        .woocommerce-message a.button
        {
            background: <?php echo esc_attr( $primary_theme_color ); ?> !important;
        }
        
        .sc-primary-border,
        .scroll-top:hover,
        #site-cta .site-cta .fa.hover {
            border-color: <?php echo esc_attr( $primary_theme_color ); ?>;
        }
        
        .woocommerce-message,
        .sc_team_single_member .articles .article {
            border-color: <?php echo esc_attr( $primary_theme_color ); ?> !important;
        }
        
        .site-branding .search-bar .search-field:focus {
            border-bottom: 1px solid <?php echo esc_attr( $primary_theme_color ); ?>;
        }
        
        #site-cta .site-cta .fa {
            border: 2px solid <?php echo esc_attr( $primary_theme_color ); ?>;
        }
               
        @media(max-width: 600px){
            .nav-menu > li.current_page_item > a{
                color: <?php echo esc_attr( $primary_theme_color ); ?>;
            }      
        }
        
        /* --- Secondary --- */
        
        a:hover
        {
            color: <?php echo esc_attr( $secondary_theme_color ); ?>;
        }
        
        .btn-primary:hover,
        .btn-primary:focus,
        .btn-primary:active,
        .btn-primary.active,
        .open .dropdown-toggle.btn-primary,
        .btn:hover,button:hover,
        input[type="button"]:hover,
        input[type="reset"]:hover,
        input[type="submit"]:hover,
        .woocommerce a.button.add_to_cart_button:hover,
        .woocommerce button.single_add_to_cart_button:hover,
        .woocommerce a.button.product_type_simple:hover,
        .woocommerce button.product_type_simple:hover,
        .widget.woocommerce a.button:hover,
        .woocommerce-cart .woocommerce a.button:hover,
        .woocommerce #respond input#submit.alt:hover, 
        .woocommerce a.button.alt:hover, 
        .woocommerce button.button.alt:hover, 
        .woocommerce input.button.alt:hover
        {
            background-color: <?php echo esc_attr( $secondary_theme_color ); ?>;
        }
        
        .woocommerce input[type="submit"].button:hover,
        .woocommerce a.checkout-button.button:hover,
        .woocommerce form input.submit:hover,
        .woocommerce-message a.button:hover
        {
            background: <?php echo esc_attr( $secondary_theme_color ); ?> !important;
        }
        
        .btn-primary:hover,
        .btn-primary:focus,
        .btn-primary:active,
        .btn-primary.active,
        .open .dropdown-toggle.btn-primary {
            border-color: <?php echo esc_attr( $secondary_theme_color ); ?> !important;
        }

        
    </style>

<?php }
add_action( 'wp_head', 'tyros_custom_css' );

/**
 * Returns all available fonts as an array
 *
 * @return array of fonts
 */
if( !function_exists( 'tyros_fonts' ) ) {

    function tyros_fonts() {

        $font_family_array = array(
            
            // Web Fonts
            'Arial, Helvetica, sans-serif'                      => 'Arial',
            'Arial Black, Gadget, sans-serif'                   => 'Arial Black',
            'Courier New, monospace'                            => 'Courier New',
            'Georgia, serif'                                    => 'Georgia',
            'Impact, Charcoal, sans-serif'                      => 'Impact',
            'Lucida Console, Monaco, monospace'                 => 'Lucida Console',
            'Lucida Sans Unicode, Lucida Grande, sans-serif'    => 'Lucida Sans Unicode',
            'MS Sans Serif, Tahoma, sans-serif'                 => 'MS Sans Serif',
            'MS Serif, New York, serif'                         => 'MS Serif',
            'Palatino Linotype, Book Antiqua, Palatino, serif'  => 'Palatino Linotype',
            'Tahoma, Geneva, sans-serif'                        => 'Tahoma',
            'Times New Roman, Times, serif'                     => 'Times New Roman',
            'Trebuchet MS, sans-serif'                          => 'Trebuchet MS',
            'Verdana, Geneva, sans-serif'                       => 'Verdana',
            
            // Google Fonts
            'Abel, sans-serif'                                  => 'Abel',
            'Arvo, serif'                                       => 'Arvo:400,400i,700',
            'Bangers, cursive'                                  => 'Bangers',
            'Courgette, cursive'                                => 'Courgette',
            'Domine, serif'                                     => 'Domine',
            'Dosis, sans-serif'                                 => 'Dosis:200,300,400',
            'Droid Sans, sans-serif'                            => 'Droid+Sans:400,700',
            'Economica, sans-serif'                             => 'Economica:400,700',
            'Josefin Sans, sans-serif'                          => 'Josefin+Sans:300,400,600,700',
            'Itim, cursive'                                     => 'Itim',
            'Lato, sans-serif'                                  => 'Lato:100,300,400,700,900,300italic,400italic',
            'Lobster Two, cursive'                              => 'Lobster+Two',
            'Lora, serif'                                       => 'Lora',
            'Lilita One, cursive'                               => 'Lilita+One',
            'Montserrat, sans-serif'                            => 'Montserrat:400,700',
            'Noto Serif, serif'                                 => 'Noto+Serif',
            'Old Standard TT, serif'                            => 'Old+Standard+TT:400,400i,700',
            'Open Sans, sans-serif'                             => 'Open Sans',
            'Open Sans Condensed, sans-serif'                   => 'Open+Sans+Condensed:300,300i,700',
            'Orbitron, sans-serif'                              => 'Orbitron',
            'Oswald, sans-serif'                                => 'Oswald:300,400',
            'Poiret One, cursive'                               => 'Poiret+One',
            'PT Sans Narrow, sans-serif'                        => 'PT+Sans+Narrow',
            'Rajdhani, sans-serif'                              => 'Rajdhani:300,400,500,600',
            'Raleway, sans-serif'                               => 'Raleway:200,300,400,500,700',
            'Roboto, sans-serif'                                => 'Roboto:100,300,400,500',
            'Roboto Condensed, sans-serif'                      => 'Roboto+Condensed:400,300,700',
            'Shadows Into Light, cursive'                       => 'Shadows+Into+Light',
            'Shrikhand, cursive'                                => 'Shrikhand',
            'Source Sans Pro, sans-serif'                       => 'Source+Sans+Pro:200,400,600',
            'Teko, sans-serif'                                  => 'Teko:300,400,600',
            'Titillium Web, sans-serif'                         => 'Titillium+Web:400,200,300,600,700,200italic,300italic,400italic,600italic,700italic',
            'Trirong, serif'                                    => 'Trirong:400,700',
            'Ubuntu, sans-serif'                                => 'Ubuntu',
            'Vollkorn, serif'                                   => 'Vollkorn:400,400i,700',
            'Voltaire, sans-serif'                              => 'Voltaire',
            
        );

        return apply_filters( 'tyros_fonts', $font_family_array );

    }

}

/**
 * Retrieve non-Google based fonts.
 */
function tyros_non_google_fonts() {
    
    return array(
            
        // Web Fonts
        'Arial, Helvetica, sans-serif'                      => 'Arial',
        'Arial Black, Gadget, sans-serif'                   => 'Arial Black',
        'Courier New, monospace'                            => 'Courier New',
        'Georgia, serif'                                    => 'Georgia',
        'Impact, Charcoal, sans-serif'                      => 'Impact',
        'Lucida Console, Monaco, monospace'                 => 'Lucida Console',
        'Lucida Sans Unicode, Lucida Grande, sans-serif'    => 'Lucida Sans Unicode',
        'MS Sans Serif, Tahoma, sans-serif'                 => 'MS Sans Serif',
        'MS Serif, New York, serif'                         => 'MS Serif',
        'Palatino Linotype, Book Antiqua, Palatino, serif'  => 'Palatino Linotype',
        'Tahoma, Geneva, sans-serif'                        => 'Tahoma',
        'Times New Roman, Times, serif'                     => 'Times New Roman',
        'Trebuchet MS, sans-serif'                          => 'Trebuchet MS',
        'Verdana, Geneva, sans-serif'                       => 'Verdana',

    );
    
}

/**
 * Render the toolbar in the header.
 */
add_action( 'tyros_toolbar', 'tyros_render_toolbar' );
function tyros_render_toolbar() {
    
    get_template_part('template-parts/layout', 'toolbar' );
    
}

/**
 * Render the slider on the frontpage.
 */
add_action( 'tyros_slider', 'tyros_render_slider', 10 );
function tyros_render_slider() {
    
    get_template_part('template-parts/layout', 'slider' );
    
}

/**
 * Render the CTA Trio on the frontpage.
 */
add_action( 'tyros_cta_trio', 'tyros_render_cta_trio' );
function tyros_render_cta_trio() {

    get_template_part('template-parts/layout', 'cta-trio' );

}

/**
 * Render the footer.
 */
add_action( 'tyros_footer', 'tyros_render_footer' );
function tyros_render_footer() {
    
    get_template_part('template-parts/layout', 'footer' );
    
}

/**
 * Render the free Widget Areas.
 */
add_action( 'tyros_free_widget_areas', 'tyros_render_free_widget_areas' );
function tyros_render_free_widget_areas() {
    
    get_template_part('template-parts/layout', 'homepage-areas' );
    
}

/**
 * Render the Callout Banner.
 */
add_action( 'tyros_callout_banner', 'tyros_render_callout_banner', 10 );
function tyros_render_callout_banner() {
    
    get_template_part('template-parts/layout', 'callout-banner' );
    
}

/**
 * Render the SC designer section.
 */
add_action( 'tyros_designer', 'tyros_add_designer', 10 );
function tyros_add_designer() { ?>
    
    <a href="https://smartcatdesign.net/" rel="designer" style="display: inline-block !important" class="rel">
        <?php printf( esc_html__( 'Designed by %s', 'tyros' ), 'Smartcat' ); ?> 
        <img id="scl" src="<?php echo get_template_directory_uri() . '/inc/images/cat_logo_mini.png'?>" alt="<?php printf( esc_attr__( '%s Logo', 'tyros' ), 'Smartcat' ); ?>" />
    </a>
    
<?php }

/**
 * 
 * Get an array containing the primary and accent colors in use by the theme.
 * 
 * @return String Array
 */
function tyros_get_theme_skin_colors() {
    
    $tyros_options = tyros_get_options();
    
    $colors_array = array();
    
    if ( isset( $tyros_options['tyros_use_custom_colors'] ) && $tyros_options['tyros_use_custom_colors'] == 'custom' && function_exists( 'tyros_strap_pl' ) && tyros_strap_pl() ) :
        
        $colors_array['primary'] = isset( $tyros_options['tyros_custom_primary'] ) ? $tyros_options['tyros_custom_primary'] : '#00c4aa';
        $colors_array['accent'] = isset( $tyros_options['tyros_custom_accent'] ) ? $tyros_options['tyros_custom_accent'] : '#009e8e';

    else :

        switch ( $tyros_options['tyros_theme_color'] ) :

            case 'red' :
                $colors_array['primary'] = '#DC8383';
                $colors_array['accent'] = '#DD5454';
                break;

            case 'green' :
                $colors_array['primary'] = '#83DCB0';
                $colors_array['accent'] = '#69B08D';
                break;

            case 'violet' :
                $colors_array['primary'] = '#8F83DC';
                $colors_array['accent'] = '#736AB2';
                break;

            default :
                $colors_array['primary'] = '#DC8383';
                $colors_array['accent'] = '#DD5454';
                break;

        endswitch;

    endif;
    
    return $colors_array;

}

add_filter( 'tyros_capacity', 'tyros_check_capacity', 10, 1 );
function tyros_check_capacity( $base_value = 1 ) {
    
    if ( function_exists( 'tyros_strap_pl' ) && tyros_strap_pl() ) :
        return $base_value + 6;
    else:
        return $base_value + 2;
    endif;
    
}

/**
 * Determine the width of columns based on left and right sidebar settings.
 */
function tyros_main_width( $override = 'default' ) {
    
    if ( $override == 'default' ) :
        
        // An override was not passed from the Page / Post calling this function, or default is set
        
        if( is_active_sidebar( 'sidebar-left' ) && is_active_sidebar( 1 ) ) :
            $width = 4;
        elseif( is_active_sidebar( 'sidebar-left' ) || is_active_sidebar( 1 ) ) :
            $width = 8;
        else:
            $width = 12;
        endif;
        
    else :

        // An override was passed from the Page / Post calling this function
        
        if( $override == 'leftright' && ( is_active_sidebar( 'sidebar-left' ) && is_active_sidebar( 1 ) ) ) :
            $width = 4;
        elseif( ( ( $override == 'left' || $override == 'leftright' ) && is_active_sidebar( 'sidebar-left' ) ) || ( ( $override == 'right' || $override == 'leftright' ) && is_active_sidebar( 1 ) ) ) :
            $width = 8;
        else:
            $width = 12;
        endif;
        
    endif;        
    
    return $width;

}

new Tyros_Sidebar_Location_Meta_Box();
class Tyros_Sidebar_Location_Meta_Box {

    public function __construct() {

        if ( is_admin() ) {
            add_action( 'load-post.php',        array ( $this, 'init_metabox' ) );
            add_action( 'load-post-new.php',    array ( $this, 'init_metabox' ) );
        }
        
    }

    public function init_metabox() {

        add_action( 'add_meta_boxes',           array ( $this, 'add_metabox' ) );
        add_action( 'save_post',                array ( $this, 'save_metabox' ), 10, 2 );
        
    }

    public function add_metabox() {

        add_meta_box( 
            'tyros_sidebar_location_meta_box', 
            __( 'Sidebar Locations', 'tyros' ), 
            array ( $this, 'render_tyros_sidebar_location_meta_box' ), 
            array( 'page', 'post'), 
            'normal', 
            'high' 
        );

    }

    public function render_tyros_sidebar_location_meta_box( $post ) {
        
        // Add nonce for security and authentication.
        wp_nonce_field( 'tyros_sidebar_location_meta_box_nonce_action', 'tyros_sidebar_location_meta_box_nonce' );

        // Retrieve an existing value from the database.
        $tyros_above_sidebar_toggle    = get_post_meta( $post->ID, 'tyros_above_sidebar_toggle', true );
        $tyros_below_sidebar_toggle    = get_post_meta( $post->ID, 'tyros_below_sidebar_toggle', true );
        $tyros_right_sidebar_toggle    = get_post_meta( $post->ID, 'tyros_right_sidebar_toggle', true );
        	
        // Set default values.
        if ( empty( $tyros_above_sidebar_toggle ) )    { $tyros_above_sidebar_toggle = 'on'; }
        if ( empty( $tyros_below_sidebar_toggle ) )    { $tyros_below_sidebar_toggle = 'on'; }
        if ( empty( $tyros_right_sidebar_toggle ) )    { $tyros_right_sidebar_toggle = 'on'; }
        
        // Form fields
        
        echo '<table class="form-table">';
            
        // Above
        echo '  <tr>';
        echo '      <th><label for="tyros_above_sidebar_toggle" class="tyros_above_sidebar_toggle_label">' . __( 'Sidebar  - Above Content', 'tyros' ) . '</label></th>';
        echo '      <td>';
        echo '          <select id="tyros_above_sidebar_toggle" name="tyros_above_sidebar_toggle" class="tyros_above_sidebar_toggle_field">';
        echo '          <option value="on" ' . esc_attr( selected( $tyros_above_sidebar_toggle, 'on', false ) ) . '> ' . __( 'On', 'tyros' ) . '</option>';
        echo '          <option value="off" ' . esc_attr( selected( $tyros_above_sidebar_toggle, 'off', false ) ) . '> ' . __( 'Off', 'tyros' ) . '</option>';
        echo '          </select>';
        echo '          <p class="description">' . __( 'Do you want to display a sidebar area above this post/page content?', 'tyros' ) . '</p>';
        echo '      </td>';
        echo '  </tr>';
        
        // Below
        echo '  <tr>';
        echo '      <th><label for="tyros_below_sidebar_toggle" class="tyros_below_sidebar_toggle_label">' . __( 'Sidebar  - Below Content', 'tyros' ) . '</label></th>';
        echo '      <td>';
        echo '          <select id="tyros_below_sidebar_toggle" name="tyros_below_sidebar_toggle" class="tyros_below_sidebar_toggle_field">';
        echo '          <option value="on" ' . esc_attr( selected( $tyros_below_sidebar_toggle, 'on', false ) ) . '> ' . __( 'On', 'tyros' ) . '</option>';
        echo '          <option value="off" ' . esc_attr( selected( $tyros_below_sidebar_toggle, 'off', false ) ) . '> ' . __( 'Off', 'tyros' ) . '</option>';
        echo '          </select>';
        echo '          <p class="description">' . __( 'Do you want to display a sidebar area below this post/page content?', 'tyros' ) . '</p>';
        echo '      </td>';
        echo '  </tr>';
        
        // Right
        echo '  <tr>';
        echo '      <th><label for="tyros_right_sidebar_toggle" class="tyros_right_sidebar_toggle_label">' . __( 'Right Sidebar', 'tyros' ) . '</label></th>';
        echo '      <td>';
        echo '          <select id="tyros_right_sidebar_toggle" name="tyros_right_sidebar_toggle" class="tyros_right_sidebar_toggle_field">';
        echo '          <option value="on" ' . esc_attr( selected( $tyros_right_sidebar_toggle, 'on', false ) ) . '> ' . __( 'On', 'tyros' ) . '</option>';
        echo '          <option value="off" ' . esc_attr( selected( $tyros_right_sidebar_toggle, 'off', false ) ) . '> ' . __( 'Off', 'tyros' ) . '</option>';
        echo '          </select>';
        echo '          <p class="description">' . __( 'Do you want to display a right sidebar area on this post/page?', 'tyros' ) . '</p>';
        echo '      </td>';
        echo '  </tr>';

        echo '</table>';
        
    }
    
    public function save_metabox( $post_id, $post ) {

        // Add nonce for security and authentication.
        $nonce_name     = isset( $_POST[ 'tyros_sidebar_location_meta_box_nonce' ] ) ? $_POST[ 'tyros_sidebar_location_meta_box_nonce' ] : '';
        $nonce_action   = 'tyros_sidebar_location_meta_box_nonce_action';

        // Check if a nonce is set and valid
        if ( !isset( $nonce_name ) ) { return; }
        if ( !wp_verify_nonce( $nonce_name, $nonce_action ) ) { return; }
            
        // Sanitize user input.
        $tyros_right_sidebar_toggle  = isset( $_POST[ 'tyros_right_sidebar_toggle' ] ) ? sanitize_text_field( $_POST[ 'tyros_right_sidebar_toggle' ] ) : '';
        $tyros_above_sidebar_toggle  = isset( $_POST[ 'tyros_above_sidebar_toggle' ] ) ? sanitize_text_field( $_POST[ 'tyros_above_sidebar_toggle' ] ) : '';
        $tyros_below_sidebar_toggle  = isset( $_POST[ 'tyros_below_sidebar_toggle' ] ) ? sanitize_text_field( $_POST[ 'tyros_below_sidebar_toggle' ] ) : '';
		
        // Update the meta field in the database
        update_post_meta( $post_id, 'tyros_right_sidebar_toggle', $tyros_right_sidebar_toggle );
        update_post_meta( $post_id, 'tyros_above_sidebar_toggle', $tyros_above_sidebar_toggle );
        update_post_meta( $post_id, 'tyros_below_sidebar_toggle', $tyros_below_sidebar_toggle );
        
    }
    
}

function tyros_is_homepage_sidebar_active( $homepage_id ) {
    
    $tyros_options = tyros_get_options();
    
    if ( isset( $homepage_id ) ) {
        
        if ( $homepage_id == 'a' ) : 
            $is_active = is_active_sidebar( 'sidebar-banner' );
        else: 
            $is_active = is_active_sidebar( 'sidebar-banner' . $homepage_id );
        endif;

        if ( !is_null( $is_active ) ) :
            
            if ( isset( $tyros_options['homepage_area_' . $homepage_id . '_toggle'] ) && $tyros_options['homepage_area_' . $homepage_id . '_toggle'] == 'on' && $is_active ) {
                return true;    // Is set to ON
            } elseif ( !isset( $tyros_options['homepage_area_' . $homepage_id . '_toggle'] ) && $is_active ) {
                return true;    // Is NOT set at all (Free)
            } else {
                return false;   // Is set to OFF
            }
            
        endif; 
        
    } else {
        
        return false;
        
    }
    
}

function tyros_custom_excerpt_length( $length ) {
    $tyros_options = tyros_get_options();
    return isset( $tyros_options['excerpt_word_trim'] ) ? $tyros_options['excerpt_word_trim'] : 55;
}
add_filter( 'excerpt_length', 'tyros_custom_excerpt_length', 999 );
