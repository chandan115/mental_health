<?php
$primary_color = nimmo_get_opt( 'gradient_color3' );
extract(shortcode_atts(array(
    'title' => '',
    'percentage_value' => '',
    'chart_size' => '140',
    'bar_color' => '',
    'track_color' => '',
    'el_class' => '',
    'animation' => '',
), $atts));
$animation_tmp = isset($animation) ? $animation : '';
$animation_classes = $this->getCSSAnimation( $animation_tmp );
wp_enqueue_script('easy-pie-chart', get_template_directory_uri() . '/assets/js/easy-pie-chart.js', array('jquery'), '2.1.1', true);
wp_enqueue_script('ct-pie-chart', get_template_directory_uri() . '/assets/js/ct-pie-chart.js', array('jquery'), '1.0.0', true);
?>
<div class="ct-piechart ct-piechart-layout1 <?php echo esc_attr($el_class.' '.$animation_classes); ?>">
    <div class="item--value percentage" style="min-height: <?php echo esc_attr($chart_size); ?>px;max-width: <?php echo esc_attr($chart_size); ?>px;" data-size="<?php echo esc_attr($chart_size); ?>" data-bar-color="<?php if(!empty($bar_color)) { echo esc_attr($bar_color); } else { echo esc_attr($primary_color['from']); } ?>" data-track-color="" data-line-width="15" data-percent="-<?php echo esc_attr($percentage_value); ?>">
        <i style="border-color:<?php if(!empty($track_color)) { echo esc_attr($track_color); } else { echo '#e5e5ff'; } ?>;"></i>
        <span><?php echo esc_attr($percentage_value); ?>%</span>
    </div>
    <h3 class="item--title"><?php echo esc_attr($title); ?></h3>
</div>