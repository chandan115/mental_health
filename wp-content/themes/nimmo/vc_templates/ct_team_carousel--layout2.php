<?php
extract(shortcode_atts(array(

    'content_list' => '',
    'el_class' => '',
    'animation' => '',

), $atts));
wp_enqueue_script( 'owl-carousel' );
wp_enqueue_script( 'nimmo-carousel' );
$html_id = cmsHtmlID('ct-team-carousel');
extract(nimmo_get_param_carousel($atts));
$el_content_list = array();
$el_content_list = (array) vc_param_group_parse_atts( $content_list );
$animation_tmp = isset($animation) ? $animation : '';
$animation_classes = $this->getCSSAnimation( $animation_tmp );

if(!empty($el_content_list)) : ?>
<div class="ct-team-carousel-wrap">
    <div id="<?php echo esc_attr($html_id);?>" class="ct-team-carousel-layout2 owl-carousel nav-middle <?php echo esc_attr( $el_class.' '.$animation_classes ); ?>" <?php echo !empty($carousel_data) ?  esc_attr($carousel_data) : '' ?>>
        <?php foreach ($el_content_list as $key => $value) {
            $title = isset($value['title']) ? $value['title'] : '';
            $position = isset($value['position']) ? $value['position'] : '';
            $social = isset($value['social']) ? $value['social'] : '';
            $el_social = (array) vc_param_group_parse_atts( $social );
            $image = isset($value['image']) ? $value['image'] : '';
            $img = wpb_getImageBySize( array(
                'attach_id'  => $image,
                'thumb_size' => '295x390',
                'class'      => 'image-default',
            ));
            $thumbnail = $img['thumbnail'];

            $img_small = wpb_getImageBySize( array(
                'attach_id'  => $image,
                'thumb_size' => '260x300',
                'class'      => 'image-small',
            ));
            $thumbnail_small = $img_small['thumbnail'];
            ?>
            <div class="ct-team-item <?php if($key == '1') { echo 'item-active';} ?>">
                <div class="ct-team-item-inner">
                    <div class="team-featured">
                        <?php echo wp_kses_post($thumbnail); ?>
                        <?php echo wp_kses_post($thumbnail_small); ?>
                    </div>
                    <div class="team-holder">
                        <h3 class="team-title">
                            <?php echo esc_attr($title); ?>
                        </h3>
                        <span class="team-position">
                            <?php echo esc_attr($position); ?>
                        </span>
                        <div class="team-social">
                            <?php foreach ($el_social as $key => $value) {
                                $social_link = isset($value['social_link']) ? $value['social_link'] : '';
                                $icon_class = isset($value['icon']) ? $value['icon'] : ''; ?>
                                <a href="<?php echo esc_url($social_link); ?>" target="_blank"><i class="<?php echo esc_attr( $icon_class ); ?>"></i></a>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="team-arrow"></div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<?php endif;?>