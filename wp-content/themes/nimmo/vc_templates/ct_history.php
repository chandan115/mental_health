<?php
extract(shortcode_atts(array(

    'history' => '',
    'btn_text' => '',
    'el_class' => '',

), $atts));

wp_enqueue_script( 'owl-carousel' );
wp_enqueue_script( 'nimmo-carousel' );
$html_id = cmsHtmlID('ct-history-carousel');
extract(nimmo_get_param_carousel($atts));
$history = (array) vc_param_group_parse_atts($history);
wp_enqueue_script( 'waypoints' );
wp_enqueue_script( 'vc_waypoints' );
wp_enqueue_style( 'vc_animate-css' );
if(!empty($history)) : ?>
<div class="ct-history-wrap">
    <div id="<?php echo esc_attr($html_id);?>" class="ct-history1 owl-carousel <?php echo esc_attr( $el_class ); ?>" <?php echo !empty($carousel_data) ?  esc_attr($carousel_data) : '' ?>>
        <?php foreach ($history as $key => $value) {
            $title = isset($value['title']) ? $value['title'] : '';
            $desc = isset($value['desc']) ? $value['desc'] : '';
            ?>
            <div class="ct-history-item">
                <div class="history-meta">
                    <h3 class="history-title">
                        <?php echo esc_attr($title); ?>
                    </h3>
                    <div class="history-description"><?php echo wp_kses_post( $desc ); ?></div>
                </div>
            </div>
        <?php } ?>
    </div>
    <div class="ct-history-more"><?php if(!empty($btn_text)) { echo esc_attr($btn_text); } else { echo esc_html__('See more', 'nimmo'); } ?><i class="fac fa-angle-right"></i></div>
</div>

<?php endif;?>