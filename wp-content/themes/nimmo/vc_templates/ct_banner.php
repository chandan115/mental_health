<?php
extract(shortcode_atts(array(
    'banner' => '',
    'banner_color' => '',
    'animation' => '',
    'el_class' => '',
), $atts));
$banner_url = '';
if (!empty($banner)) {
    $attachment_image = wp_get_attachment_image_src($banner, 'full');
    $banner_url = $attachment_image[0];
}
$animation_tmp = isset($animation) ? $animation : '';
$animation_classes = $this->getCSSAnimation( $animation_tmp );
$html_id = cmsHtmlID('ct-banner'); ?>

<?php if(!empty($banner_url)) : ?>
    <div id="<?php echo esc_attr($html_id);?>" class="ct-banner-layout1 <?php echo esc_attr( $banner_color.' '.$el_class.' '.$animation_classes ); ?>">
        <div class="ct-banner-inner">
            <div class="ct-banner-image">   
                <img src="<?php echo esc_url( $banner_url ); ?>" />
            </div>
        </div>
    </div>
<?php endif; ?>