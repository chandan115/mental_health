<?php
extract(shortcode_atts(array(
    'title' => '',
    'description' => '',
    'btn_text' => '',
    'btn_link' => '',
    'animation' => '',
    'el_class' => '',
    'css' => '',
), $atts));
$animation_tmp = isset($animation) ? $animation : '';
$animation_classes = $this->getCSSAnimation( $animation_tmp );
$link = vc_build_link($btn_link);
$a_href = '';
$a_target = '';
if ( strlen( $link['url'] ) > 0 ) {
    $a_href = $link['url'];
    $a_target = strlen( $link['target'] ) > 0 ? $link['target'] : '_self';
}
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
?>
<div class="ct-textbox-default <?php echo esc_attr($css_class.' '.$el_class.' '.$animation_classes); ?>">
    <div class="ct-textbox-inner">
        <?php if(!empty($title)) : ?>
            <h3 class="ct-textbox-title">
                <?php echo wp_kses_post( $title ); ?>
            </h3>
        <?php endif;?>
        <?php if(!empty($description)) : ?>
            <div class="ct-textbox-desc">
                <?php echo wp_kses_post( $description ); ?>
            </div>
        <?php endif;?>
        <?php if ( !empty($btn_text) ) { ?>
            <a class="btn" href="<?php echo esc_url($a_href);?>" target="<?php  echo esc_attr($a_target); ?>"><?php echo esc_attr($btn_text); ?></a>
        <?php } ?>    
    </div>
</div>