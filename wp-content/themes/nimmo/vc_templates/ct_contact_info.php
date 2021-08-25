<?php
extract(shortcode_atts(array(
    'icon' => '',
    'el_class' => '',
), $atts));
$ct_icon = array();
$ct_icon = (array) vc_param_group_parse_atts( $icon );
$uqid = uniqid();
if(!empty($ct_icon)) : ?>
    <ul id="ct-contact-info-<?php echo esc_attr($uqid);?>" class="ct-contact-info1 <?php echo esc_attr($el_class); ?>">
        <?php foreach ($ct_icon as $key => $value) {
            $icon_class = isset($value['icon']) ? $value['icon'] : '';
            $content_info = isset($value['content_info']) ? $value['content_info'] : ''; ?>
            <li>
                <i class="<?php echo esc_attr( $icon_class ); ?>"></i>
                <span><?php echo wp_kses_post($content_info); ?></span>
            </li>
        <?php } ?>
    </ul>
<?php endif;?>