<?php


?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>><head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head(); ?>

</head>

<body <?php body_class(); ?> >

  <?php if (is_front_page()): ?>
  <div id="header-fpage"><div class="header-content">
<!-- Site Titele and Description Goes Here -->
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php if ( get_header_image() !='' ): ?><img class="slogo site-logol" src="<?php header_image(); ?>"/><?php else: ?><h1 class="slogo site-logol"><?php echo bloginfo( 'name' ); ?></h1><?php endif; ?></a>
		<h2 class="site-title-hidden"><?php bloginfo( 'description' ); ?></h2>
        
        <div id="social">
		<?php  if (green_get_option('gplus-link', '#') !='') : ?>
		<a href="<?php echo green_get_option('gplus-link', '#'); ?>" class="gplus-link" target="_blank"></a>
		<?php  endif; if (green_get_option('li-link', '#') !='') : ?>
		<a href="<?php echo green_get_option('li-link', '#'); ?>" class="li-link" target="_blank"></a>
		<?php  endif; if (green_get_option('feed-link', '#') !='') : ?>
		<a href="<?php echo green_get_option('feed-link', '#'); ?>" class="feed-link" target="_blank"></a>
		<?php  endif; ?>
		</div>
        
        <?php get_search_form(); ?>	
        
      
</div></div>                
<div class="clear"> </div>        
        <!-- Slide Goes Here -->
 
	<div id="iebanner"><div id="iebcontent">
    <div id="iefc">
    <h3 class="ibcon"><?php echo green_get_option ( 'slide-image1-title', 'This is a Test Image Title'); ?></h3>
    <p class="ibcon"><?php echo green_get_option('slide-image1-caption', 'This is a Test Image for GREEN EYE Theme. If you feel any problem please contact with D5 Creation.'); ?></p>
    <?php if (green_get_option('slide-image1-link', '#')): ?><a class="jms-link" href="<?php echo green_get_option('slide-image1-link', '#'); ?>">Read more</a><?php endif; ?>
    </div><div id="iesc">
    <img class="ibcon" src="<?php echo green_get_option('slide-image1', get_template_directory_uri() . '/images/slide-image/1.png'); ?>" />
    </div></div></div>	

<div id ="header" class="large">
      <div class ="header-content">
		<nav id="green-main-menu">
		<?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'menu_class' => 'm-menu', 'fallback_cb' => 'green_page_menu'  )); ?>
        </nav>
      
      </div><!-- header-content -->
      </div><!-- header -->
  
   
  	<?php else: ?> 
      <div id ="header" class="small">
      <div class ="header-content">
		<!-- Site Titele and Description Goes Here -->
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php if ( get_header_image() !='' ): ?><img class="slogo site-logos" src="<?php header_image(); ?>"/><?php else: ?><h1 class="slogo site-logos"><?php echo bloginfo( 'name' ); ?></h1><?php endif; ?></a>
                
  		<h2 class="site-title-hidden"><?php bloginfo( 'description' ); ?></h2>
                
        
        <!-- Site Main Menu Goes Here -->
        <nav id="green-main-menu">
		<?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'menu_class' => 'm-menu', 'fallback_cb' => 'green_page_menu'  )); ?>
        </nav>
      
      </div><!-- header-content -->
      </div><!-- header -->
      <div class="clear"> </div>
      
    <?php endif; ?>  
	