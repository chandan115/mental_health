<?php
extract(shortcode_atts(array(
    'icon' => '',
    'align' => 'left',
    'style' => '1',
    'el_class' => '',
), $atts));
$ct_icon = array();
$ct_icon = (array) vc_param_group_parse_atts( $icon );

if(!empty($ct_icon)) : ?>
    <div class="ct-icon<?php echo esc_attr($style); ?> text-<?php echo esc_attr($align); ?> <?php echo esc_attr($el_class); ?>">
        <?php foreach ($ct_icon as $key => $value) {
            $icon_link = isset($value['icon_link']) ? $value['icon_link'] : '';
            $icon_class = isset($value['icon']) ? $value['icon'] : ''; ?>
            <a href="<?php echo esc_url($icon_link); ?>" target="_blank"><i class="<?php echo esc_attr( $icon_class ); ?>"></i></a>
        <?php } ?>
    </div>
<?php endif;?>