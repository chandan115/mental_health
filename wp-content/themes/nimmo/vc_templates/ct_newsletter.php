<?php
extract(shortcode_atts(array(
    'form' => '',
    'button_label' => esc_html__('Subscribe', 'nimmo'),
    'email_label' => esc_html__('Your mail address', 'nimmo'),
    'animation'   => '',
    'el_class'   => '',
    'layout'   => 'layout1',
    'fr_title'   => '',
    'fr_sub_title'   => '',
), $atts));
$animation_tmp = isset($animation) ? $animation : '';
$animation_classes = $this->getCSSAnimation( $animation_tmp );
$defined_forms = array( 'form_1', 'form_2', 'form_3', 'form_4', 'form_5', 'form_6', 'form_7', 'form_8', 'form_9', 'form_10' );
if(class_exists('Newsletter')) { ?>
    <div class="ct-newsletter ct-newsletter-<?php echo esc_attr($layout); ?> <?php echo esc_attr( $el_class.' '.$animation_classes ); ?>">
        <div class="ct-newsletter-inner">
            <?php if($layout == 'layout2' && !empty($fr_title) || $layout == 'layout2' && !empty($fr_sub_title)) : ?>
                <div class="ct-newsletter-meta">
                    <h3><?php echo esc_attr($fr_title); ?></h3>
                    <span><?php echo esc_attr($fr_sub_title); ?></span>
                </div>
            <?php endif; ?>
            <?php
            if ( in_array( $form, $defined_forms ) ) {
                $form = str_replace( 'form_', '', $form );
                echo do_shortcode( '[newsletter_form form="' . esc_attr( $form ) . '"]' );
            } else {
                echo do_shortcode( '[newsletter_form button_label="'.$button_label.'"][newsletter_field name="email" label="'.$email_label.'"][/newsletter_form]' );
            } ?>
        </div>
        <?php if($layout == 'layout2') : ?>
            <div class="ct-newsletter-layer1"></div>
            <div class="ct-newsletter-layer2"></div>
        <?php endif; ?>
    </div>
<?php } ?>