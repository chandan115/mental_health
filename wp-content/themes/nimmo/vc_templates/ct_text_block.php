<?php
extract(shortcode_atts(array(
    'content_align' => 'text-left',
    'font_weight' => '',
    'content_color' => '',
    'link_color' => '',
    'link_color_hover' => '',
    'font_size' => '',
    'line_height' => '',
    'el_class' => '',
    'animation'             => '',
    'css' => '',
), $atts)); 
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
$animation_tmp = isset($animation) ? $animation : '';
$animation_classes = $this->getCSSAnimation( $animation_tmp );
$uqid = uniqid();
?>
<div id="ct-text-block-<?php echo esc_attr($uqid);?>" class="ct-text-block1 <?php echo esc_attr($css_class.' '.$font_weight.' '.$content_align.' '.$el_class.' '.$animation_classes); ?>" style="<?php if(!empty($content_color)) { echo 'color:'.esc_attr($content_color).';'; } if(!empty($font_size)) { echo 'font-size:'.esc_attr($font_size).'px;'; } if(!empty($line_height)) { echo 'line-height:'.esc_attr($line_height).'px;'; } ?>">
    <div class="ct-inline-css"  data-css="
        <?php if(!empty($link_color)) : ?>
            #ct-text-block-<?php echo esc_attr($uqid);?> a {
                color: <?php echo esc_attr($link_color); ?>;
            }
        <?php endif; ?>
        <?php if(!empty($link_color_hover)) : ?>
            #ct-text-block-<?php echo esc_attr($uqid);?> a:hover {
                color: <?php echo esc_attr($link_color_hover); ?>;
            }
        <?php endif; ?>">
    </div>
    <?php echo apply_filters('the_content', $content); ?>
</div>