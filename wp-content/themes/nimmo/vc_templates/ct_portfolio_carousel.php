<?php
$atts_extra = shortcode_atts(array(
    'content_list'             => '',
    'el_class'             => '',
    'img_size'             => '700x724',
), $atts);
$atts = array_merge($atts_extra, $atts);
extract($atts);
extract(nimmo_get_param_carousel($atts));
wp_enqueue_script( 'owl-carousel' );
wp_enqueue_script( 'nimmo-carousel' );
wp_enqueue_script( 'waypoints' );
wp_enqueue_script( 'vc_waypoints' );
wp_enqueue_style( 'vc_animate-css' );
$portfolio_content_list = (array) vc_param_group_parse_atts( $content_list );
?>

<div id="<?php echo esc_attr($html_id) ?>" class="ct-carousel-portfolio1 owl-carousel <?php echo esc_attr($el_class); ?>" <?php echo !empty($carousel_data) ?  esc_attr($carousel_data) : '' ?>>

    <?php foreach ($portfolio_content_list as $key => $value) {
        $title = isset($value['title']) ? $value['title'] : '';
        $subtitle = isset($value['subtitle']) ? $value['subtitle'] : '';
        $item_link = isset($value['item_link']) ? $value['item_link'] : '';
        $link = vc_build_link($item_link);
        $a_href = '';
        $a_target = '_self';
        if ( strlen( $link['url'] ) > 0 ) {
            $a_href = $link['url'];
            $a_target = strlen( $link['target'] ) > 0 ? $link['target'] : '_self';
        }
        $image = isset($value['image']) ? $value['image'] : '';
        $img = wpb_getImageBySize( array(
            'attach_id'  => $image,
            'thumb_size' => $img_size,
            'class'      => '',
        ));
        $thumbnail = $img['thumbnail']; ?>
        <div class="ct-portfolio-item">
            <div class="grid-item-inner ct-portfolio-item-inner">
                <?php if(!empty($image)) { ?>
                    <div class="portfolio-featured">
                        <a href="<?php echo esc_url($a_href);?>" target="<?php  echo esc_attr($a_target); ?>">
                            <?php echo wp_kses_post($thumbnail); ?>
                        </a>
                    </div>
                <?php } ?>
                <div class="portfolio-holder">
                    <div class="portfolio-meta">
                        <h4 class="portfolio-title">
                            <a href="<?php echo esc_url($a_href);?>" target="<?php  echo esc_attr($a_target); ?>"><?php echo esc_attr($title); ?></a>
                        </h4>
                        <?php if(!empty($subtitle)) : ?>
                            <div class="portfolio-subtitle"><?php echo esc_attr($subtitle); ?></div>
                        <?php endif; ?>
                    </div>
                    <?php if(!empty($a_href)) : ?>
                        <div class="portfolio-more">
                            <a href="<?php echo esc_url($a_href);?>" target="<?php  echo esc_attr($a_target); ?>">+</a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php } ?>
    
</div>