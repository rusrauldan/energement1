<?php $tyros_options = tyros_get_options(); ?>

<div id="post-slider-cta">

    <?php if ( $tyros_options['tyros_cta_header_two'] ) : ?>
        <h3 class="main-heading wow fadeInUp">
            <?php echo esc_html( $tyros_options['tyros_cta_header_two'] ); ?>
        </h3>
    <?php endif; ?>

    <?php if ( $tyros_options['tyros_cta_button_text'] && $tyros_options['tyros_cta_button_link'] ) : ?>
        <div class="cta-button-wrap">
            <div class="inner-wrap  wow fadeInUp animated">
                <div class="inner">
                    <a href="<?php echo esc_url( $tyros_options['tyros_cta_button_link'] ); ?>" class="tyros-button">
                        <?php echo esc_html( $tyros_options['tyros_cta_button_text'] ); ?>
                    </a>
                </div>
            </div>
        </div>
    <?php endif; ?>

</div>