<?php
extract(shortcode_atts(array(
    'content_list' => '',
    'icon_list' => 'fontawesome',
    'icon_fontawesome' => '',
    'icon_fontawesome5' => '',
    'icon_material_design' => '',
    'icon_flaticon' => '',
    'icon_weight' => '',
    'el_class' => '',
    'animation' => '',
), $atts));
$icon_name = "icon_" . $icon_list;
$icon_class = isset(${$icon_name}) ? ${$icon_name} : '';
$animation_tmp = isset($animation) ? $animation : '';
$animation_classes = $this->getCSSAnimation( $animation_tmp );
wp_enqueue_script( 'vc_waypoints' );
wp_enqueue_style( 'vc_animate-css' );
?>
<div class="ct-list-icon1 <?php echo esc_attr($el_class.' '.$animation_classes); ?>">
    <?php if($icon_class):?>
        <div class="list-icon">
            <i class="text-gradient <?php echo esc_attr($icon_class); ?> <?php if($icon_list == 'fontawesome5' && !empty($icon_weight)) { echo esc_attr($icon_weight); } ?>"></i>
        </div>
    <?php endif;?>
	<div class="list-content">
        <?php echo wp_kses_post( $content_list ); ?>
    </div>
</div>