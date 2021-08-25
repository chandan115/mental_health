<?php
extract(shortcode_atts(array(

    'text_box_item' => '',
    'el_class' => '',

), $atts));

wp_enqueue_script( 'owl-carousel' );
wp_enqueue_script( 'nimmo-carousel' );
$html_id = cmsHtmlID('ct-textbox-carousel');
extract(nimmo_get_param_carousel($atts));
$text_box_items = (array) vc_param_group_parse_atts($text_box_item);
wp_enqueue_script( 'waypoints' );
wp_enqueue_script( 'vc_waypoints' );
wp_enqueue_style( 'vc_animate-css' );
if(!empty($text_box_items)) : ?>

    <div id="<?php echo esc_attr($html_id);?>" class="ct-textbox-carousel default owl-carousel nav-middle <?php echo esc_attr( $el_class ); ?>" <?php echo !empty($carousel_data) ?  esc_attr($carousel_data) : '' ?>>
        <?php foreach ($text_box_items as $key => $value) {
            $title = isset($value['title']) ? $value['title'] : '';
            $content = isset($value['content']) ? $value['content'] : '';
            $button_text = isset($value['button_text']) ? $value['button_text'] : '';
            $button_link = isset($value['button_link']) ? $value['button_link'] : '';
            $link = vc_build_link($button_link);
            $a_href = '';
            $a_target = '';
            if ( strlen( $link['url'] ) > 0 ) {
                $a_href = $link['url'];
                $a_target = strlen( $link['target'] ) > 0 ? $link['target'] : '_self';
            }
            ?>
            <div class="ct-textbox-item">
                <div class="grid-item-inner">
                    <h3 class="ct-textbox-title">
                        <?php echo wp_kses_post($title); ?>
                    </h3>
                    <div class="ct-textbox-description"><?php echo wp_kses_post( $content ); ?></div>
                    <?php if(!empty($button_text)) : ?>
                        <div class="ct-textbox-button">
                            <a class="btn no-shadow" href="<?php echo esc_url($a_href);?>" target="<?php  echo esc_attr($a_target); ?>"><?php echo esc_attr($button_text); ?></a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php } ?>
    </div>

<?php endif;?>