<?php
extract(shortcode_atts(array(

    'client_item' => '',
    'el_class' => '',

), $atts));

wp_enqueue_script( 'owl-carousel' );
wp_enqueue_script( 'nimmo-carousel' );
$html_id = cmsHtmlID('ct-client-carousel');
extract(nimmo_get_param_carousel($atts));
$clients = (array) vc_param_group_parse_atts($client_item);
if(!empty($clients)) : ?>
    <div id="<?php echo esc_attr($html_id);?>" class="ct-client-carousel default owl-carousel <?php echo esc_attr($el_class); ?>" <?php echo !empty($carousel_data) ?  esc_attr($carousel_data) : '' ?>>
        <?php foreach ($clients as $key => $value) {
            $image = isset($value['image']) ? $value['image'] : '';
            $image_url = '';
            if (!empty($image)) {
                $attachment_image = wp_get_attachment_image_src($image, 'thumbnail');
                $image_url = $attachment_image[0];
            }
            $client_link = isset($value['link']) ? $value['link'] : '';
            $link = vc_build_link($client_link);
            $a_href = '';
            $a_target = '';
            if ( strlen( $link['url'] ) > 0 ) {
                $a_href = $link['url'];
                $a_target = strlen( $link['target'] ) > 0 ? $link['target'] : '_self';
            } 
            ?>
            <div class="ct-client-item">
                <?php if(!empty($image_url)): ?>
                    <?php if(!empty($a_href)) { ?>
                        <a href="<?php echo esc_url($a_href);?>" target="<?php  echo esc_attr($a_target); ?>">
                    <?php } else { ?>
                        <div class="item--image">
                    <?php } ?>
                        <img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr($image); ?>" />
                    <?php if(!empty($a_href)) { ?>
                        </a>
                    <?php } else { ?>
                        </div>
                    <?php } ?>
                <?php endif; ?>
            </div>
        <?php } ?>
    </div>
<?php endif; ?>