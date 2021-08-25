<?php
$atts_extra = shortcode_atts(array(
    'source'               => '',
    'orderby'              => 'date',
    'order'                => 'DESC',
    'limit'                => '6',
    'post_ids'             => '',
    'el_class'             => '',
    'img_size'             => '600x316',
    'btn_text_more'             => '',
    'style'             => 'style-light',
), $atts);
$atts = array_merge($atts_extra, $atts);
extract($atts);
extract(cms_get_posts_of_grid('post', $atts));
extract(nimmo_get_param_carousel($atts));
wp_enqueue_script( 'owl-carousel' );
wp_enqueue_script( 'nimmo-carousel' );
wp_enqueue_script( 'waypoints' );
wp_enqueue_script( 'vc_waypoints' );
wp_enqueue_style( 'vc_animate-css' );
?>

<div id="<?php echo esc_attr($html_id) ?>" class="ct-blog-carousel-layout1 owl-carousel nav-middle <?php echo esc_attr($style.' '.$el_class); ?>" <?php echo !empty($carousel_data) ?  esc_attr($carousel_data) : '' ?>>

    <?php
    if (is_array($posts)):
        foreach ($posts as $key => $post) {
            the_post();
            $img_id       = get_post_thumbnail_id( $post->ID );
            $img          = wpb_getImageBySize( array(
                'attach_id'  => $img_id,
                'thumb_size' => $img_size,
                'class'      => '',
            ) );
            $thumbnail    = $img['thumbnail'];
            $url_video = get_post_meta($post->ID, 'url_video', true);
            ?>
                <div class="ct-carousel-item">
                    <div class="grid-item-inner">
                        <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)) : ?>
                            <div class="item-featured">
                                <a class="overlay" href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                                    <?php echo wp_kses_post( $thumbnail ); ?>
                                </a>
                                <?php if(!empty($url_video)) : ?>
                                    <a class="ct-video-button" href="<?php echo esc_url($url_video); ?>"><i class="fa fa-play"></i></a>
                                <?php endif;  ?>
                            </div>
                        <?php endif; ?>
                        <div class="item-body">
                            <ul class="item-meta">
                                <li><i class="fa fa-calendar"></i><?php $date_formart = get_option('date_format'); echo get_the_date($date_formart, $post->ID); ?></li>
                                <li><i class="fa fa-user"></i><span><?php echo esc_html__('By', 'nimmo').' '; ?></span><?php the_author_posts_link(); ?></li>
                            </ul>
                            <h3 class="item-title" style="<?php if(!empty($item_title_color)) { echo 'color:'.esc_attr($item_title_color).';'; } ?>">
                                <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo esc_attr(get_the_title($post->ID)); ?></a>
                            </h3>
                        </div>
                        <div class="item-readmore">
                            <a class="btn" href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                                <?php if(!empty($btn_text_more)) { 
                                    echo esc_attr($btn_text_more);
                                } else { 
                                    echo esc_html__( 'View now', 'nimmo' );
                                }?>  
                            </a>
                        </div>
                    </div>
                </div>
            <?php }
    endif; ?>
    
</div>