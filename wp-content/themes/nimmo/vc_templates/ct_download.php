<?php
extract(shortcode_atts(array(
    'title' => '',
    'link' => '',
    'icon_list' => 'fontawesome',
    'icon_fontawesome' => '',
    'icon_fontawesome5' => '',
    'icon_material_design' => '',
    'icon_flaticon' => '',
    'icon_weight' => '',
    'el_class' => '',
    'animation' => '',
), $atts));
$link = vc_build_link($link);
$a_href = '';
$a_target = '';
if ( strlen( $link['url'] ) > 0 ) {
    $a_href = $link['url'];
    $a_target = strlen( $link['target'] ) > 0 ? $link['target'] : '_self';
}
$icon_name = "icon_" . $icon_list;
$icon_class = isset(${$icon_name}) ? ${$icon_name} : '';
$animation_tmp = isset($animation) ? $animation : '';
$animation_classes = $this->getCSSAnimation( $animation_tmp );
wp_enqueue_script( 'vc_waypoints' );
wp_enqueue_style( 'vc_animate-css' );
if(!empty($title)) :?>
    <div class="ct-download-layout1 <?php echo esc_attr($el_class.' '.$animation_classes); ?>">
        <a href="<?php echo esc_url($a_href);?>" target="<?php  echo esc_attr($a_target); ?>">
            <span>
                <i class="<?php echo esc_attr($icon_class); ?> <?php if($icon_list == 'fontawesome5' && !empty($icon_weight)) { echo esc_attr($icon_weight); } ?>"></i>
            </span>
            <?php echo esc_attr($title); ?>
        </a>
    </div>
<?php endif; ?>