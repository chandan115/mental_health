<?php
extract(shortcode_atts(array(

    'testimonial_item' => '',
    'title_color' => '',
    'content_color' => '',
    'position_color' => '',
    'el_class' => '',

), $atts));

wp_enqueue_script( 'owl-carousel' );
wp_enqueue_script( 'nimmo-carousel' );
$html_id = cmsHtmlID('ct-testimonial-carousel');
extract(nimmo_get_param_carousel($atts));
$testimonials = (array) vc_param_group_parse_atts($testimonial_item);
wp_enqueue_script( 'waypoints' );
wp_enqueue_script( 'vc_waypoints' );
wp_enqueue_style( 'vc_animate-css' );
if(!empty($testimonials)) : ?>

    <div id="<?php echo esc_attr($html_id);?>" class="ct-testimonial-carousel1 owl-carousel nav-middle <?php echo esc_attr( $el_class ); ?>" <?php echo !empty($carousel_data) ?  esc_attr($carousel_data) : '' ?>>
        <?php foreach ($testimonials as $key => $value) {
            $title = isset($value['title']) ? $value['title'] : '';
            $content = isset($value['content']) ? $value['content'] : '';
            $position = isset($value['position']) ? $value['position'] : '';
            $image = isset($value['image']) ? $value['image'] : '';
            $img_size = isset($value['img_size']) ? $value['img_size'] : '200x200';
            $img = wpb_getImageBySize( array(
                'attach_id'  => $image,
                'thumb_size' => $img_size,
                'class'      => '',
            ));
            $thumbnail = $img['thumbnail'];
            ?>
            <div class="ct-testimonial-item">
                <div class="grid-item-inner">
                    <?php if(!empty($image)) : ?>
                        <div class="testimonial-featured">
                            <?php echo wp_kses_post($thumbnail); ?>
                        </div>
                    <?php endif; ?>
                    <div class="testimonial-description" style="<?php if(!empty($content_color)) { echo 'color:'.esc_attr($content_color).';'; } ?>"><?php echo wp_kses_post( $content ); ?></div>
                    <h3 class="testimonial-title" style="<?php if(!empty($title_color)) { echo 'color:'.esc_attr($title_color).';'; } ?>">
                        <?php echo esc_attr($title); ?>
                    </h3>
                    <div class="testimonial-position" style="<?php if(!empty($position_color)) { echo 'color:'.esc_attr($position_color).';'; } ?>">
                        <?php echo esc_attr($position); ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

<?php endif;?>