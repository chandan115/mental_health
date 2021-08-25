<?php
extract(shortcode_atts(array(
    'title' => '',
    'sub_title' => '',
    'title_link' => '',
    'banner_image' => '',
), $atts));
$banner_image_url = '';
if (!empty($banner_image)) {
    $attachment_image = wp_get_attachment_image_src($banner_image, 'full');
    $banner_image_url = $attachment_image[0];
}
$link = vc_build_link($title_link);
$a_href = '';
$a_target = '';
if ( strlen( $link['url'] ) > 0 ) {
    $a_href = $link['url'];
    $a_target = strlen( $link['target'] ) > 0 ? $link['target'] : '_self';
}
?>
<div class="ct-showcase">
	<div class="ct-showcase-inner">
		<?php if(!empty($banner_image_url)) { ?>
            <div class="ct-showcase-image">
                <a href="<?php echo esc_url($a_href);?>" target="<?php  echo esc_attr($a_target); ?>">
                    <img src="<?php echo esc_url( $banner_image_url ); ?>" alt="<?php echo esc_attr( $title ); ?>"/>
                </a>
                <?php if(!empty($sub_title)) : ?>
                    <span class="label"><?php echo esc_attr($sub_title); ?></span>
                <?php endif; ?>
            </div>
        <?php } ?>
        <h3 class="ct-showcase-title">
            <a href="<?php echo esc_url($a_href);?>" target="<?php  echo esc_attr($a_target); ?>">
                <?php echo wp_kses_post( $title ); ?>
            </a>
        </h3>
	</div>
</div>