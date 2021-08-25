<?php
$primary_color = nimmo_get_opt( 'primary_color', '#ff57a4' );
extract(shortcode_atts(array(                                  
    'image' => '',                                          
    'img_size' => 'full',                                       
    'img_style' => 'img-style1',                                       
    'image_link' => '',                                       
    'block_revealers' => 'no',                                        
    'direction' => 'lr',                                        
    'overlay_color' => $primary_color,                                        
    'hover_parallax' => '',                                        
    'source_type' => 'img',                                        
    'img_height' => '',                                     
    'img_max_height' => '',                                     
    'image_align' => 'text-left',                                        
    'el_class' => '',                                        
    'animation' => '',                                        
    'css' => '',                                        
), $atts));
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
$html_id = cmsHtmlID('ct-single-image');
$atts['html_id'] = $html_id;
$link = vc_build_link($image_link);
$a_href = '';
$a_target = '';
if ( strlen( $link['url'] ) > 0 ) {
    $a_href = $link['url'];
    $a_target = strlen( $link['target'] ) > 0 ? $link['target'] : '_self';
}
$image_url = '';
if (!empty($image)) {
    $attachment_image = wp_get_attachment_image_src($image, 'full');
    $image_url = $attachment_image[0];
}
$img = wpb_getImageBySize( array(
    'attach_id'  => $image,
    'thumb_size' => $img_size,
    'class'      => '',
));
$thumbnail = $img['thumbnail'];
$animation_tmp = isset($animation) ? $animation : '';
$animation_classes = $this->getCSSAnimation( $animation_tmp );

if($block_revealers == 'yes') {
	wp_enqueue_script( 'animate-image', get_template_directory_uri() . '/assets/js/animate.min.js', array( 'jquery' ), 'all', true );
	wp_enqueue_script( 'animate-scroll-monitor', get_template_directory_uri() . '/assets/js/animate-scroll-monitor.js', array( 'jquery' ), 'all', true );
	wp_enqueue_script( 'animate-main', get_template_directory_uri() . '/assets/js/animate-main.js', array( 'jquery' ), 'all', true );
} ?>

<div id="<?php echo esc_attr($atts['html_id']);?>" class="ct-single-image <?php echo esc_attr($hover_parallax); ?> <?php if($block_revealers == 'yes') { echo 'image-block-revealers'; } ?> <?php echo esc_attr($image_align.' '.$img_style.' '.$css_class.' '.$el_class.' '.$animation_classes); ?>" <?php if($block_revealers == 'yes') : ?> data-color="<?php echo esc_attr($overlay_color); ?>" data-direction="<?php echo esc_attr($direction); ?>" <?php endif; ?>>
	<?php if(!empty($img_max_height)) : ?>
        <div class="ct-inline-css"  data-css="
            #<?php echo esc_attr($atts['html_id']);?>.ct-single-image img {
                max-height: <?php echo esc_attr($img_max_height); ?>px;
            }
        "></div>
    <?php endif; ?>
    <?php if(!empty($a_href)) : ?><a href="<?php echo esc_url($a_href);?>" target="<?php  echo esc_attr($a_target); ?>"><?php endif; ?>
		<?php if($source_type == 'bg') { ?>
            <div class="bg-image" style="background-image: url(<?php echo esc_url($image_url); ?>);height:<?php echo esc_attr($img_height).'px'; ?>"></div>
        <?php } else {
            echo wp_kses_post($thumbnail);
        } ?>
	<?php if(!empty($a_href)) : ?></a><?php endif; ?>
</div>