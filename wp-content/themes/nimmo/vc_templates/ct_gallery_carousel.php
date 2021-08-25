<?php
extract(shortcode_atts(array(

    'layout' => 'layout1',
    'images' => '',
    'img_size' => '475x600',
    'el_class' => '',
    'animation' => '',

), $atts));
$animation_tmp = isset($animation) ? $animation : '';
$animation_classes = $this->getCSSAnimation( $animation_tmp );
$ct_images = explode( ',', $images );
wp_enqueue_script( 'owl-carousel' );
wp_enqueue_script( 'nimmo-carousel' );
extract(nimmo_get_param_carousel($atts));
?>
<div class="ct-gallery-carousel-<?php echo esc_attr($layout); ?> images-light-box owl-carousel <?php echo esc_attr( $el_class.' '.$animation_classes ); ?>" <?php echo !empty($carousel_data) ?  esc_attr($carousel_data) : '' ?>>
    <?php foreach ($ct_images as $img_id) :
        $img = wpb_getImageBySize( array(
            'attach_id'  => $img_id,
            'thumb_size' => $img_size,
            'class'      => '',
        ));
        $thumbnail = $img['thumbnail'];
        ?>
        <div class="ct-image-gallery-item">
            <a class="light-box" href="<?php echo esc_url(wp_get_attachment_image_url($img_id, 'full'));?>"><?php echo wp_kses_post($thumbnail); ?></a>
        </div> 
    <?php endforeach; ?> 
</div>