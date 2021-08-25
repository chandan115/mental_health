<?php
extract(shortcode_atts(array(

    'title'         => '',
    'title_color'         => '',
    'grouping'         => '0',
    'separator'         => '',
    'digit'         => '',
    'digit_color'         => '',
    'prefix'         => '',
    'suffix'         => '',
    'icon_type' => 'icon',
    'icon_list' => 'fontawesome',
    'icon_fontawesome' => '',
    'icon_material_design' => '',
    'icon_flaticon' => '',
    'icon_etline' => '',
    'icon_image' => '',
    'icon_color' => '',
    'icon_font_size' => '',
    'el_class'         => '',
    'animation'         => '',
    'layout'         => 'default',
    'box_image' => '',
    'font_weight_title' => '',
    'font_weight_digit' => '',

), $atts));
wp_enqueue_script( 'waypoints' );
wp_enqueue_script( 'nimmo-counter-lib' );
wp_enqueue_script( 'nimmo-counter' );
$html_id = cmsHtmlID('ct-counter');
$icon_image_url = '';
if (!empty($icon_image)) {
    $attachment_image = wp_get_attachment_image_src($icon_image, 'full');
    $icon_image_url = $attachment_image[0];
}
$icon_name = "icon_" . $icon_list;
$icon_class = isset(${$icon_name}) ? ${$icon_name} : '';
$animation_tmp = isset($animation) ? $animation : '';
$animation_classes = $this->getCSSAnimation( $animation_tmp );
$box_image_url = '';
if (!empty($box_image)) {
    $box_attachment_image = wp_get_attachment_image_src($box_image, 'full');
    $box_image_url = $box_attachment_image[0];
}
?>
<div id="<?php echo esc_attr($html_id);?>" class="ct-counter ct-counter-<?php echo esc_attr($layout); ?> <?php echo esc_attr( $animation_classes.' '.$el_class ); ?>">
    <?php if($layout == 'layout2' && !empty($box_image_url)) : ?>
        <div class="ct-counter-box-img bg-image" style="background-image: url(<?php echo esc_url($box_image_url); ?>);"></div>
    <?php endif; ?>
    <div class="ct-counter-inner">
        <?php if(!empty($icon_image_url) && $icon_type == 'image' ) { ?>
            <div class="ct-counter-icon">
                <img class="icon-main" src="<?php echo esc_url( $icon_image_url ); ?>" alt="<?php echo esc_attr( $title ); ?>"/>
            </div>
        <?php } else { ?>
            <?php if($icon_class):?>
                <div class="ct-counter-icon">
                    <i class="<?php if(empty($icon_color)) { echo 'text-gradient'; } ?> <?php echo esc_attr($icon_class); ?>" style="<?php if(!empty($icon_color)) { echo 'color:'.esc_attr($icon_color).';'; } if(!empty($icon_font_size)) { echo 'font-size:'.esc_attr($icon_font_size).'px;'; } ?>"></i>
                </div>
            <?php endif;?>
        <?php } ?>
        <div class="ct-counter-holder">
            <span id="<?php echo esc_attr($html_id);?>-digit" class="ct-counter-digit" data-grouping="<?php echo esc_attr($grouping); ?>" data-separator="<?php echo esc_attr($separator); ?>" data-digit="<?php echo esc_attr($digit);?>" data-prefix="<?php echo esc_attr($prefix);?>" data-suffix="<?php echo esc_attr($suffix);?>" style="<?php if(!empty($font_weight_digit)) { echo 'font-weight:'.esc_attr($font_weight_digit).';'; } if(!empty($digit_color)) { echo 'color:'.esc_attr($digit_color).';'; } ?>"></span>
            <?php if(!empty($title)) : ?>
                <h3 class="ct-counter-title" style="<?php if(!empty($title_color)) { echo 'color:'.esc_attr($title_color).';'; } if(!empty($font_weight_title)) { echo 'font-weight:'.esc_attr($font_weight_title).';'; } ?>">
                    <?php echo apply_filters('the_title', $title);?>
                </h3>
            <?php endif;?>
        </div>
    </div>
</div>