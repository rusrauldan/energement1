jQuery(document).ready(function ($) {

    $('div#primary-menu > ul, ul#primary-menu').slicknav({
        appendTo: '#site-branding-sticky-wrap',
        allowParentLinks: true,
    }); 
    
    //¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯
    //  Camera Slider
    //__________________________________________________________________________

    if ( $('#tyros_slider_wrap').length > 0 ) {

        var overlayer_active = false,
            height_adjustment = false;

        $('#tyros_slider_wrap').camera({
            height: tyrosSlider.desktop_height + '%',
            pagination: ( tyrosSlider.pagination == 'on' ) ? true : false,
            navigation: ( tyrosSlider.navigation == 'on' ) ? true : false,
            fx: tyrosSlider.animation.toString(),
            time: parseInt(tyrosSlider.slide_timer),
            transPeriod: parseInt(tyrosSlider.animation_speed),
            hover: ( tyrosSlider.hover == 'on' ) ? true : false,
            thumbnails: false,
            overlayer: true,
            playPause : false,
            loader: tyrosSlider.loader.toString(),
            onLoaded: function() {
                if ( ! overlayer_active ) {
                    $('.camera_overlayer').animate({
                        opacity: 1,
                    }, 1000 );
                    overlayer_active = true;
                }
                if ( ! height_adjustment ) {
                    $('#parent-slider-wrap').css( 'height', 'auto' );    
                    height_adjustment = true;
                }
            }
        });

    }
    
    //¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯
    //  Blog Carousel
    //__________________________________________________________________________
//    $("#tyros-carousel-blog-wrap, .product_list_widget").owlCarousel({
//        items: 4,
//        autoPlay : false,
//        stopOnHover: false,
//        lazyLoad: true,
//        lazyFollow: true,
//        LazyEffect: 'fade',
//        pagination: true,
//        navigation: false,    
//    });
    
    $('#tyros-carousel-blog-wrap').owlCarousel({
        items: 4,
        navigation: false,
        pagination: false,
        slideSpeed : 1000,
        paginationSpeed : 1000,
        autoPlay : 6000
    });
    
    //¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯
    //  Match CTA Heights
    //__________________________________________________________________________
    $('.site-cta').hover( function() {
        $('.fa', this).addClass('hover');
    }, function(){
        $('.fa', this).removeClass('hover');
    });
    
    //¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯
    //  Masonry Blog Layouts
    //__________________________________________________________________________

    function doMasonry() {

        var $grid = $( "#masonry-blog-wrapper" ).imagesLoaded(function () {
            $grid.masonry({
                itemSelector: '.blog-roll-item',
                columnWidth: '.grid-sizer',
                percentPosition: true,
                gutter: '.gutter-sizer',
                transitionDuration: '.75s'
            });
        });
        
        if ( $( window ).width() >= 992 ) {  

            $('#masonry-blog-wrapper .gutter-sizer').css('width', '2%');
            $('#masonry-blog-wrapper .grid-sizer').css('width', '32%');
            $('#masonry-blog-wrapper .blog-roll-item').css('width', '32%');

        } else if ( $( window ).width() < 992 && $( window ).width() >= 768 ) {

            $('#masonry-blog-wrapper .gutter-sizer').css('width', '2%');
            $('#masonry-blog-wrapper .grid-sizer').css('width', '49%');
            $('#masonry-blog-wrapper .blog-roll-item').css('width', '49%');

        } else {

            $('#masonry-blog-wrapper .gutter-sizer').css('width', '0%');
            $('#masonry-blog-wrapper .grid-sizer').css('width', '100%');
            $('#masonry-blog-wrapper .blog-roll-item').css('width', '100%');

        }

    }

    /**
    * Call Masonry on window resize and load
    */
    $( window ).resize( function() {
        doMasonry();
    });
    doMasonry();
    
    //¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯
    //  Mobile Menu Collapse/Expand
    //__________________________________________________________________________

    $( 'div#mobile-menu-wrap ul#mobile-menu > li.menu-item-has-children' ).prepend( '<div class="submenu-button-wrap"><span class="fa fa-plus"></span></div>' );

    $( 'div#mobile-menu-wrap ul#mobile-menu > li.menu-item-has-children span' ).on( 'click', function() {
        $(this).parent().stop().toggleClass('submenu-rotated').find('span').toggleClass('fa-plus fa-minus');
        $(this).parent().parent().find( '> ul.sub-menu' ).stop().slideToggle( 400 );
    });
    
    //¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯
    //  Scroll to Top
    //__________________________________________________________________________
    
    $('.scroll-top').click(function () {
        $("html, body").animate({scrollTop: 0}, "slow");
        return false;
    });

    //¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯
    //  Resize Slider
    //__________________________________________________________________________
    
    //    function resize_slider() {
    //        var w = $('#main-slider').width();
    //        $('#slider_container,#slider_container > div').width(w);
    //    }

    //¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯
    //  Inject Hamburger Menu
    //__________________________________________________________________________

    $('.menu-toggle').html('<i class="fa fa-bars fa-lg"></i>');

    //¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯
    //  Initialize Wow.js
    //__________________________________________________________________________

    var wow = new WOW();
    wow.init();
    
    //¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯
    //  Sticky.js
    //__________________________________________________________________________
    
    $('#site-branding-sticky-wrap').sticky({
         topSpacing : ( $('body').hasClass('admin-bar') ? $('#wpadminbar').height() : '0' ),
    });
    
    $('#site-branding-sticky-wrap').on('sticky-start', function() { 
        $(this).addClass('animated fadeInDown');
    });
    
    $('#site-branding-sticky-wrap').on('sticky-end', function() { 
        $(this).removeClass('animated fadeInDown');
    });
    
    //¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯
    //  Masonry Style 2 Hover
    //__________________________________________________________________________

    //    $( 'div#tyros-alt-blog-wrap.masonry2 article').mouseenter( function() {
    //        
    //        $( this ).find('.bottom-meta').stop().animate({
    //            opacity: 1.0,
    //            bottom: "0px",
    //        }, 300 );
    //        
    //    }).mouseleave( function() {
    //       
    //        $( this ).find('.bottom-meta').stop().animate({
    //            opacity: 0,
    //            bottom: "-48px",
    //        }, 200 );
    //        
    //    });
    
    //¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯
    //  SlickNav Mobile Menu
    //__________________________________________________________________________
    
    var slicknav_open = false;
    $( "#slicknav-menu-toggle" ).click( function() {
        
        if ( slicknav_open ) {
            
            $("div.slicknav_menu").stop().animate({
                borderColor: "#fff"
            }, 500 );
            $('div#primary-menu > ul, ul#primary-menu').slicknav( 'toggle' );
            slicknav_open = false;
            
        } else {
          
            $("div.slicknav_menu").stop().animate({
                borderColor: "#cacaca"
            }, 1000 );
            $('div#primary-menu > ul, ul#primary-menu').slicknav( 'toggle' );
            slicknav_open = true;
            
        }
        
    });
    
});