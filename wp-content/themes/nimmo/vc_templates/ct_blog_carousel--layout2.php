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

<div id="<?php echo esc_attr($html_id) ?>" class="ct-blog-carousel-layout2 owl-carousel nav-middle <?php echo esc_attr($el_class); ?>" <?php echo !empty($carousel_data) ?  esc_attr($carousel_data) : '' ?>>

    <?php
    if (is_array($posts)):
        foreach ($posts as $key => $post) {
            the_post();
            ?>
                <div class="ct-carousel-item">
                    <div class="item-category">
                        <?php the_terms( $post->ID, 'category', '', ', ' ); ?>
                    </div>
                    <h3 class="item-title" style="<?php if(!empty($item_title_color)) { echo 'color:'.esc_attr($item_title_color).';'; } ?>">
                        <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo esc_attr(get_the_title($post->ID)); ?></a>
                    </h3>
                    <div class="item-date"><?php $date_formart = get_option('date_format'); echo get_the_date($date_formart, $post->ID); ?></div>
                    <div class="item-content">
                        <?php echo wp_trim_words( $post->post_excerpt, $num_words = 100, $more = null ); ?>
                    </div>
                    <div class="item-readmore">
                        <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                            <?php if(!empty($btn_text_more)) { 
                                echo esc_attr($btn_text_more);
                            } else { 
                                echo esc_html__( 'View now', 'nimmo' );
                            }?>  
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div>
            <?php }
    endif; ?>
    
</div>