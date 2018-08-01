<?php $tyros_options = tyros_get_options(); ?>

<div id="site-toolbar">

    <div class="social-bar col-sm-6">

        <?php if ( isset( $tyros_options['tyros_facebook_url'] ) && $tyros_options['tyros_facebook_url'] != '' ) : ?>
            <a href="<?php echo esc_url( $tyros_options['tyros_facebook_url'] ); ?>" target="_blank" class="icon-facebook">
                <i class="fa fa-facebook"></i>
            </a>
        <?php endif; ?>
        
        <?php if ( isset( $tyros_options['tyros_twitter_url'] ) && $tyros_options['tyros_twitter_url'] != '' ) : ?>
            <a href="<?php echo esc_url( $tyros_options['tyros_twitter_url'] ); ?>" target="_blank" class="icon-twitter">
                <i class="fa fa-twitter"></i>                            
            </a>
        <?php endif; ?>
        
        <?php if ( isset( $tyros_options['tyros_linkedin_url'] ) && $tyros_options['tyros_linkedin_url'] != '' ) : ?>
            <a href="<?php echo esc_url( $tyros_options['tyros_linkedin_url'] ); ?>" target="_blank" class="icon-linkedin">
                <i class="fa fa-linkedin"></i>                            
            </a>
        <?php endif; ?>
        
        <?php if ( isset( $tyros_options['tyros_gplus_url'] ) && $tyros_options['tyros_gplus_url'] != '' ) : ?>
            <a href="<?php echo esc_url( $tyros_options['tyros_gplus_url'] ); ?>" target="_blank" class="icon-gplus">
                <i class="fa fa-google-plus"></i>                            
            </a>
        <?php endif; ?>

        <?php if ( isset( $tyros_options['tyros_instagram_url'] ) && $tyros_options['tyros_instagram_url'] != '' ) : ?>
            <a href="<?php echo esc_url( $tyros_options['tyros_instagram_url'] ); ?>" target="_blank" class="icon-instagram">
                <i class="fa fa-instagram"></i>                            
            </a>
        <?php endif; ?>
        
        <?php if ( isset( $tyros_options['tyros_youtube_url'] ) && $tyros_options['tyros_youtube_url'] != '' ) : ?>
            <a href="<?php echo esc_url( $tyros_options['tyros_youtube_url'] ); ?>" target="_blank" class="icon-youtube">
                <i class="fa fa-youtube"></i>                            
            </a>
        <?php endif; ?>
        
        <?php if ( isset( $tyros_options['tyros_pinterest_url'] ) && $tyros_options['tyros_pinterest_url'] != '' ) : ?>
            <a href="<?php echo esc_url( $tyros_options['tyros_pinterest_url'] ); ?>" target="_blank" class="icon-pinterest">
                <i class="fa fa-pinterest"></i>                            
            </a>
        <?php endif; ?>


        







 

    </div>

    <div class="contact-bar col-sm-6">

        <?php if ( isset( $tyros_options['tyros_store_link1_url'] ) && $tyros_options['tyros_store_link1_url'] != '' ) : ?>
            <a href="<?php echo esc_url( $tyros_options['tyros_store_link1_url'] ); ?>" target="_blank">
                <?php echo esc_html( $tyros_options['tyros_store_link1_text'] ); ?>
            </a>
        <?php endif; ?>

        <?php if ( isset( $tyros_options['tyros_store_link2_url'] ) && $tyros_options['tyros_store_link2_url'] != '' ) : ?>
            <a href="<?php echo esc_url( $tyros_options['tyros_store_link2_url'] ); ?>" target="_blank">
                <?php echo esc_html( $tyros_options['tyros_store_link2_text'] ); ?>
            </a>
        <?php endif; ?>

        <?php if ( isset( $tyros_options['tyros_store_link3_url'] ) && $tyros_options['tyros_store_link3_url'] != '' ) : ?>
            <a href="<?php echo esc_url( $tyros_options['tyros_store_link3_url'] ); ?>" target="_blank">
                <?php echo esc_html( $tyros_options['tyros_store_link3_text'] ); ?>
            </a>
        <?php endif; ?>
        
    </div>
               
</div>
