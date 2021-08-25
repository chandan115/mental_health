<?php
extract(shortcode_atts(array(

    'testimonial_item' => '',
    'title_color' => '',
    'content_color' => '',
    'position_color' => '',
    'loop' => '',
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
<div class="ct-testimonial-wrap ct-testimonial-carousel3">

    <div class="ct-testimonial-nav owl-carousel <?php echo esc_attr( $el_class ); ?>" <?php echo !empty($carousel_data) ?  esc_attr($carousel_data) : '' ?> data-dotscontainer="true" data-mousedrag="false">
        <?php foreach ($testimonials as $key => $value) {
            $image = isset($value['image']) ? $value['image'] : '';
            $img = wpb_getImageBySize( array(
                'attach_id'  => $image,
                'thumb_size' => '165x165',
                'class'      => '',
            ));
            $thumbnail = $img['thumbnail'];
            $total = count($testimonials);
            ?>
            <div class="ct-testimonial-item item-<?php echo esc_attr($total); ?>-column">
                <div class="grid-item-inner">
                    <div class="testimonial-image">
                        <div class="testimonial-shape"></div>
                        <?php echo wp_kses_post($thumbnail); ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

    <div class="ct-testimonial-main owl-carousel nav-middle <?php echo esc_attr( $el_class ); ?>" data-item-xs="1" data-item-sm="1" data-item-md="1" data-item-lg="1" data-margin="30" data-loop="<?php echo esc_attr($loop); ?>" data-autoplay="false" data-autoplaytimeout="5000" data-smartspeed="250" data-center="true" data-arrows="true" data-bullets="true" data-stagepadding="0" data-rtl="false" data-dotscontainer="true" data-mousedrag="false">
        <?php foreach ($testimonials as $key => $value) {
            $title = isset($value['title']) ? $value['title'] : '';
            $content = isset($value['content']) ? $value['content'] : '';
            $position = isset($value['position']) ? $value['position'] : '';
            ?>
            <div class="ct-testimonial-item">
                <div class="grid-item-inner">
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
</div>
<?php endif;?>