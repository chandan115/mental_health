<?php
extract(shortcode_atts(array(
    'title' => '',
    'title_color' => '',

    'animation' => '',
    'el_class' => '',

    'title_link' => '',
), $atts));
if(!empty($title)) : ?>
<h3 class="ct-wg-title <?php echo esc_attr( $el_class ); ?>" <?php if(!empty($title_color)) : ?>style="color:<?php echo esc_attr($title_color); ?>"<?php endif; ?>>
    <span><?php echo wp_kses_post($title); ?></span>
    <i></i>
</h3>
<?php endif; ?>