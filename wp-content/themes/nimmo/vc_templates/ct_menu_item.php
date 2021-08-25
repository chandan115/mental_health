<?php
extract(shortcode_atts(array(
    'content_list' => '',
    'el_class' => '',
    'animation' => '',
), $atts));
$menu_items = (array) vc_param_group_parse_atts( $content_list );
$animation_tmp = isset($animation) ? $animation : '';
$animation_classes = $this->getCSSAnimation( $animation_tmp );
wp_enqueue_script( 'vc_waypoints' );
wp_enqueue_style( 'vc_animate-css' );
?>
<ul class="ct-menu-items <?php echo esc_attr($el_class); ?>">
    <?php foreach ($menu_items as $key => $value) {
        $item_text = isset($value['item_text']) ? $value['item_text'] : '';
        $item_label = isset($value['item_label']) ? $value['item_label'] : '';
        $item_link = isset($value['item_link']) ? $value['item_link'] : '';
        $link = vc_build_link($item_link);
        $a_href = '#';
        $a_target = '_self';
        if ( strlen( $link['url'] ) > 0 ) {
            $a_href = $link['url'];
            $a_target = strlen( $link['target'] ) > 0 ? $link['target'] : '_self';
        } if(!empty($item_text)) : ?>
            <li class="ct-menu-item <?php echo esc_attr($animation_classes); ?>">
                <a href="<?php echo esc_url($a_href);?>" target="<?php  echo esc_attr($a_target); ?>"><?php echo esc_attr($item_text); ?>
                    <?php if(!empty($item_label)) : ?>
                        <span><?php echo esc_attr($item_label); ?></span>
                    <?php endif; ?>
                </a>
            </li>
    <?php endif; } ?>
</ul>