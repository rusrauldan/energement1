<?php $tyros_options = tyros_get_options(); ?>

<div id="site-cta-wrap">

    <div id="site-cta" class="<?php echo $tyros_options['tyros_slider_bool'] == 'yes' ? '' : 'no-slider'; ?>"><!-- #CTA boxes -->
        
        <div class="col-md-4 site-cta wow animated fadeInUp" data-wow-delay=".2s">
            
            <div class="center">
                <i class="fa <?php echo esc_attr( $tyros_options['tyros_cta1_icon'] ); ?>"></i>
            </div>
                
            <h3><?php echo esc_attr( $tyros_options['tyros_cta1_title'] ); ?></h3>
            
            <p class="text">
                <?php echo esc_attr( $tyros_options['tyros_cta1_text'] ); ?>
            </p>
            
            <p class="link">
                <a href="<?php echo esc_url( $tyros_options['tyros_cta1_url'] ); ?>"><?php echo esc_attr( $tyros_options['tyros_cta1_button_text'] );  ?></a>
            </p>                                
                
        </div>
        
        <div class="col-md-4 site-cta wow animated fadeInUp">
            
            <div class="center">
                <i class="fa <?php echo esc_attr( $tyros_options['tyros_cta2_icon']); ?>"></i>
            </div>

            <h3><?php echo esc_attr( $tyros_options['tyros_cta2_title'] ); ?></h3>
            
            <p class="text">
                <?php echo esc_attr( $tyros_options['tyros_cta2_text'] ); ?>
            </p>
            
            <p class="link">
                <a href="<?php echo esc_url( $tyros_options['tyros_cta2_url'] ); ?>" class=""><?php echo esc_attr( $tyros_options['tyros_cta2_button_text'] );  ?></a>
            </p>                                

        </div>

        <div class="col-md-4 site-cta wow animated fadeInUp" data-wow-delay=".2s">
            
            <div class="center">
                <i class="fa <?php echo esc_attr( $tyros_options['tyros_cta3_icon'] ); ?>"></i>
            </div>

            <h3><?php echo esc_attr( $tyros_options['tyros_cta3_title'] ); ?></h3>
            
            <p class="text">
                <?php echo esc_attr( $tyros_options['tyros_cta3_text'] ); ?>
            </p>
            
            <p class="link">
                <a href="<?php echo esc_url( $tyros_options['tyros_cta3_url'] ); ?>" class=""><?php echo esc_attr( $tyros_options['tyros_cta3_button_text'] );  ?></a>
            </p>

        </div>
        
        <div class="clear"></div>
        
    </div><!-- #CTA boxes -->
    
    <div class="clear"></div>
        
</div>