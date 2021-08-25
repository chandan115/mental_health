<?php
extract(shortcode_atts(array(                                  
    'image_align' => 'grid-based',                                                                              
    'image' => '',                                                                              
    'p_top' => '',                                                                              
    'p_right' => '',                                                                              
    'p_bottom' => '',                                                                              
    'p_left' => '',                                                                              
    'el_parallax' => 'no',                                                                              
    'parallax_speed' => '5',                                                                              
    'parallax_move' => '40',                                                                              
    'hide_md' => '',                                                                              
    'hide_sm' => '',                                                                              
    'el_class' => '',                                        
    'animation' => '',                                        
), $atts));
$html_id = cmsHtmlID('ct-image-section');
$atts['html_id'] = $html_id;
$img = wpb_getImageBySize( array(
    'attach_id'  => $image,
    'thumb_size' => 'full',
    'class'      => '',
));
$thumbnail = $img['thumbnail'];
$animation_tmp = isset($animation) ? $animation : '';
$animation_classes = $this->getCSSAnimation( $animation_tmp ); 

$style = array(
    'top'   => $p_top,
    'right'   => $p_right,
    'bottom'   => $p_bottom,
    'left'   => $p_left,
);
$styles = '';
foreach ($style as $key => $value) {
    if (!empty($value) && $value != 'px') {
        $styles .= $key . ':' . $value . ';';
    }
}
if($el_parallax == 'yes') {
    wp_enqueue_script('el-parallax', get_template_directory_uri() . '/assets/js/el-parallax.js', array('jquery'), 'all', true);
}
?>

<div id="<?php echo esc_attr($atts['html_id']);?>" class="ct-image-section <?php if($el_parallax == 'yes') { echo 'el-parallax'; } ?> <?php echo esc_attr($image_align.' '.$hide_md.' '.$hide_sm.' '.$el_class.' '.$animation_classes); ?>" <?php echo !empty($styles) ? 'style="' . esc_attr($styles) . '"' : '' ?> <?php if($el_parallax == 'yes') { ?>data-speed="<?php echo esc_attr($parallax_speed); ?>" data-move="<?php echo esc_attr($parallax_move); ?>"<?php } ?>>
	<?php echo wp_kses_post($thumbnail); ?>
</div>