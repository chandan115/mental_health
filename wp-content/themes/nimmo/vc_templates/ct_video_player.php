<?php
extract(shortcode_atts(array(
    'intro' => '',
    'video_link' => '',
    'animation' => '',
    'el_class' => '',
    'video_button_style' => 'style1',
), $atts));
$html_id = cmsHtmlID('ct-video');
$link = vc_build_link($video_link);
$a_href = 'https://www.youtube.com/watch?v=SF4aHwxHtZ0';
if ( strlen( $link['url'] ) > 0 ) {
    $a_href = $link['url'];
}
$animation_tmp = isset($animation) ? $animation : '';
$animation_classes = $this->getCSSAnimation( $animation_tmp ); 
?>

<div id="<?php echo esc_attr($html_id);?>" class="ct-video-wrapper <?php echo esc_attr( $video_button_style.' '.$el_class.' '.$animation_classes ); ?>">
    <div class="ct-video-inner">
        <?php if(!empty($intro)) :      
            $img = wpb_getImageBySize( array(
                'attach_id'  => $intro,
                'thumb_size' => 'full',
                'class'      => '',
            ));
            $thumbnail = $img['thumbnail'];
            echo wp_kses_post( $thumbnail ); 
        endif; ?>
        <a class="ct-video-button" href="<?php echo esc_url($a_href);?>">
            <i class="fa fa-play"></i>
            <?php if($video_button_style == 'style2') : ?>
                <span class="line-video-animation"></span>
                <span class="line-video-2 line-video-animation"></span>
                <span class="line-video-3 line-video-animation"></span>
            <?php endif; ?>
        </a>
    </div>
</div>