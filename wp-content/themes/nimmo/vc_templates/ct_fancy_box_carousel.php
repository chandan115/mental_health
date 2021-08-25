<?php
extract(shortcode_atts(array(

    'fancy_box_item' => '',
    'el_class' => '',

), $atts));

wp_enqueue_script( 'owl-carousel' );
wp_enqueue_script( 'nimmo-carousel' );
$html_id = cmsHtmlID('ct-fancy-box-carousel');
extract(nimmo_get_param_carousel($atts));
$fancy_box_item = (array) vc_param_group_parse_atts($fancy_box_item);
wp_enqueue_script( 'waypoints' );
wp_enqueue_script( 'vc_waypoints' );
wp_enqueue_style( 'vc_animate-css' );
if(!empty($fancy_box_item)) : ?>

    <div id="<?php echo esc_attr($html_id);?>" class="ct-fancy-box-carousel1 owl-carousel nav-middle <?php echo esc_attr( $el_class ); ?>" <?php echo !empty($carousel_data) ?  esc_attr($carousel_data) : '' ?>>
        <?php foreach ($fancy_box_item as $key => $value) {
            $title = isset($value['title']) ? $value['title'] : '';
            $desc = isset($value['desc']) ? $value['desc'] : '';
            $btn_text = isset($value['btn_text']) ? $value['btn_text'] : '';
            $btn_link = isset($value['btn_link']) ? $value['btn_link'] : '';
            $link = vc_build_link($btn_link);
            $a_href = '';
            $a_target = '';
            if ( strlen( $link['url'] ) > 0 ) {
                $a_href = $link['url'];
                $a_target = strlen( $link['target'] ) > 0 ? $link['target'] : '_self';
            }
            $icon_list = isset($value['icon_list']) ? $value['icon_list'] : 'fontawesome';
            $icon_fontawesome = isset($value['icon_fontawesome']) ? $value['icon_fontawesome'] : '';
            $icon_material_design = isset($value['icon_material_design']) ? $value['icon_material_design'] : '';
            $icon_flaticon = isset($value['icon_flaticon']) ? $value['icon_flaticon'] : '';
            $icon_etline = isset($value['icon_etline']) ? $value['icon_etline'] : '';
            $icon_name = "icon_" . $icon_list;
            $icon_class = isset(${$icon_name}) ? ${$icon_name} : '';
            ?>
            <div class="ct-fancy-box-item">
                <div class="grid-item-inner">
                    <?php if($icon_class):?>
                        <div class="fancy-box-icon">
                            <i class="<?php echo esc_attr($icon_class); ?>"></i>
                        </div>
                    <?php endif; ?>
                    <div class="fancy-box-meta">
                        <h3 class="fancy-box-title">
                            <?php echo esc_attr($title); ?>
                        </h3>
                        <div class="fancy-box-description"><?php echo wp_kses_post( $desc ); ?></div>
                        <?php if(!empty($btn_text)) : ?>
                            <div class="fancy-box-button">
                                <a href="<?php echo esc_url($a_href);?>" target="<?php  echo esc_attr($a_target); ?>"><?php echo esc_attr($btn_text); ?><i class="fac fa-angle-right"></i></a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

<?php endif;?>