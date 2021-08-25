<?php
extract(shortcode_atts(array(
    'feature' => 'item-normal',
    'title' => '',
    'price' => '',
    'time' => '',
    'description' => '',
    'text_button' => '',
    'link_button' => '',
    'el_class' => '',
    'animation' => '',
    'style' => 'style-light',
), $atts));
$link = vc_build_link($link_button);
$a_href = '';
$a_target = '_self';
if ( strlen( $link['url'] ) > 0 ) {
    $a_href = $link['url'];
    $a_target = strlen( $link['target'] ) > 0 ? $link['target'] : '_self';
} 
$description = (array) vc_param_group_parse_atts($description);
$animation_tmp = isset($animation) ? $animation : '';
$animation_classes = $this->getCSSAnimation( $animation_tmp );
wp_enqueue_script( 'waypoints' );
wp_enqueue_script( 'vc_waypoints' );
wp_enqueue_style( 'vc_animate-css' ); ?>
<div class="ct-pricing-default <?php echo esc_attr($style.' '.$el_class.' '.$animation_classes.' '.$feature); ?>">
    <div class="ct-pricing-meta">
        <h3 class="ct-pricing-title"><?php echo esc_attr($title);?></h3>
        <?php if(!empty($price)) : ?>
            <div class="ct-pricing-price">
                <?php echo esc_attr($price);?>  
            </div>
        <?php endif;?>
        <?php if(!empty($time)) : ?>
            <div class="ct-pricing-time"><?php echo esc_attr($time);?></div>
        <?php endif;?>
    </div>
    <div class="ct-pricing-holder">
        <?php if(!empty($description)) : ?>
            <ul class="ct-pricing-content">
                <?php foreach ($description as $key => $value) { 
                    $description_item = isset($value['description_item']) ? $value['description_item'] : '';
                    ?>
                    <li><?php echo esc_html($description_item); ?></li>
                <?php } ?>
            </ul>
        <?php endif;?>
        <?php if(!empty($text_button)) : ?>
            <div class="ct-pricing-button">
                <a class="btn" href="<?php echo esc_url($a_href);?>" target="<?php echo esc_attr( $a_target ); ?>">
                    <?php echo esc_attr($text_button);?>
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>