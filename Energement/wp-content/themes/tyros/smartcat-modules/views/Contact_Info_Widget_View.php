<div class="tyros-contact-info <?php echo isset( $instance['scmod_contact_info_width'] ) ? 'col-sm-' . $instance['scmod_contact_info_width'] : 'col-sm-12'; ?>">

    <div class="widget">

        <div class="inner">
            
            <h2 class="widget-title cpt-widget-title">
                <?php echo !empty( $instance['scmod_contact_info_title'] ) ? esc_html( $instance['scmod_contact_info_title'] ) : ''; ?>
            </h2>
           
            <div class="detail">
                <?php echo !empty( $instance['scmod_contact_info_detail'] ) ? esc_html( $instance['scmod_contact_info_detail'] ) : ''; ?>
            </div>

            <div class="row">
            
                <?php if( !empty( $instance['scmod_contact_info_phone'] ) ) : ?>

                        <div class="contact-row col-md-4">
                            <div class="detail">
                                <span class="fa fa-mobile-phone"></span>
                                <a href="tel:<?php echo !empty( $instance['scmod_contact_info_phone'] ) ? preg_replace( '/[^0-9]/', '', $instance['scmod_contact_info_phone'] ) : ''; ?>">
                                    <?php echo !empty( $instance['scmod_contact_info_phone'] ) ? esc_html ( $instance['scmod_contact_info_phone'] ) : ''; ?>
                                </a>
                            </div>
                        </div>

                <?php endif; ?>

                <?php if( !empty( $instance['scmod_contact_info_email'] ) ) : ?>

                        <div class="contact-row col-md-4">
                            <div class="detail">
                                <span class="fa fa-envelope-o"></span>
                                <a href="mailto:<?php echo !empty( $instance['scmod_contact_info_email'] ) ? esc_html( $instance['scmod_contact_info_email'] ) : ''; ?>">
                                    <?php echo !empty( $instance['scmod_contact_info_email'] ) ? esc_html( $instance['scmod_contact_info_email'] ) : ''; ?>
                                </a>
                            </div>    
                        </div>

                <?php endif; ?>

                <?php if( !empty( $instance['scmod_contact_info_address'] ) ) : ?>

                        <div class="contact-row col-md-4">
                            <div class="detail">
                                <span class="fa fa-map-marker"></span>
                                <a target="_BLANK" href="https://www.google.com/maps/search/?api=1&query=<?php echo urlencode( $instance['scmod_contact_info_address'] ); ?>">
                                    <?php echo !empty( $instance['scmod_contact_info_address'] ) ? $instance['scmod_contact_info_address'] : ''; ?>
                                </a>
                            </div>
                        </div>

                <?php endif; ?>
            
            </div>
            
        </div>

    </div>
        
</div>