<?php $tyros_options = tyros_get_options(); ?>

<footer id="colophon" class="site-footer " role="contentinfo">
        
    <?php if ( is_active_sidebar( 'sidebar-footer' ) ) : ?>
    
        <div class="footer-boxes">
            
            <div class="container">

                <div class="row ">
                
                    <div class="col-md-12">

                    <?php dynamic_sidebar( 'sidebar-footer' ); ?>
            
                    </div>  
                    
                </div>  

            </div>        
            
        </div>

    <?php endif; ?>
    
    <div class="site-info">
        
        <div class="container">
        
            <div class="row">
    
                <div class="col-sm-12 boxed-wrap">
            
                    <div class="col-xs-6 text-left payment-gateways">

                        <?php if( $tyros_options[ 'tyros_paypal'] == 'on') : ?>
                            <i class="fa fa-cc-paypal"></i>
                        <?php endif; ?>

                        <?php if( $tyros_options[ 'tyros_visa' ] == 'on') : ?>
                            <i class="fa fa-cc-visa"></i>
                        <?php endif; ?>

                        <?php if( $tyros_options[ 'tyros_mastercard' ] == 'on') : ?>
                            <i class="fa fa-cc-mastercard"></i>
                        <?php endif; ?>                       

                    </div>

                    <div class="col-xs-6 text-right">

                        <div class="tyros-copyright">
                            <?php echo esc_html( $tyros_options['tyros_footer_text'] ); ?>
                        </div>

                        <div>
                            <?php do_action( 'tyros_designer' ); ?>
                        </div>

                    </div>              
                
                </div>              
                
            </div>              
                
        </div>
            
    </div><!-- .site-info -->
        
</footer><!-- #colophon -->
