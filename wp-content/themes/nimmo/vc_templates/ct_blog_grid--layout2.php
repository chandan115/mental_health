<?php
$atts_extra = shortcode_atts(array(
    'source'               => '',
    'orderby'              => 'date',
    'order'                => 'DESC',
    'limit'                => '5',
    'gap'                  => '30',
    'post_ids'             => '',
    'col_lg'               => 4,
    'col_md'               => 3,
    'col_sm'               => 2,
    'col_xs'               => 1,
    'layout'               => 'masonry',
    'el_class'             => '',
    'img_size'             => '600x316',
), $atts);
$atts = array_merge($atts_extra, $atts);
extract($atts);
$tax = array();
extract(cms_get_posts_of_grid('post', $atts));
$filter_default_title = !empty($filter_default_title) ? $filter_default_title : 'All';
$col_lg = 12 / $col_lg;
$col_md = 12 / $col_md;
$col_sm = 12 / $col_sm;
$col_xs = 12 / $col_xs;
$grid_sizer = "col-xl-{$col_lg} col-lg-{$col_md} col-md-{$col_sm} col-sm-{$col_xs} col-{$col_xs}";

$gap_item = intval($gap / 2);

wp_enqueue_style(
    'inline-style',
    get_template_directory_uri() . '/assets/css/inline-style.css'
);
$grid_class = '';
if ($layout == 'masonry') {
    wp_enqueue_script('isotope');
    wp_enqueue_script('imagesloaded');
    wp_enqueue_script('nimmo-isotope', get_template_directory_uri() . '/assets/js/isotope.ct.js', array('jquery'), '1.0.0', true);
    $grid_class = 'ct-grid-inner ct-grid-masonry row';
} else {
    $grid_class = 'ct-grid-inner row';
}
$html_id_el = '#'.$html_id;
$custom_css = "
        $html_id_el .ct-grid-inner {
            margin: 0 -{$gap_item}px;
        }
        $html_id_el .ct-grid-inner .grid-item, $html_id_el .ct-grid-inner .grid-sizer {
            padding: {$gap_item}px;
        }";
wp_add_inline_style('inline-style', $custom_css);
wp_enqueue_script( 'waypoints' );
wp_enqueue_script( 'vc_waypoints' );
wp_enqueue_style( 'vc_animate-css' );
?>

<div id="<?php echo esc_attr($html_id) ?>" class="ct-grid ct-grid-blog-layout2 <?php echo esc_attr($el_class); ?>">

    <div class="<?php echo esc_attr($grid_class); ?> animation-time" data-gutter="<?php echo esc_attr($gap_item); ?>">
        <?php if ($layout == 'masonry') : ?>
            <div class="grid-sizer <?php echo esc_attr($grid_sizer); ?>"></div>
        <?php endif; ?>
        <?php
        if (is_array($posts)):
            foreach ($posts as $key => $post) {
                the_post();
                if($key == 1) {
                    $img_size = '600x482';
                    $item_class = "grid-item col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12";
                } else {
                    $img_size = '600x414';
                    $item_class = "grid-item col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12";
                }
                $img_id = get_post_thumbnail_id($post->ID);
                $img = wpb_getImageBySize( array(
                    'attach_id'  => $img_id,
                    'thumb_size' => $img_size,
                    'class'      => '',
                ));
                $thumbnail = $img['thumbnail'];
                $video_url = get_post_meta($post->ID, 'url_video', true);
                $author = get_user_by('id', $post->post_author);
                ?>
                    <div class="<?php echo esc_attr($item_class); ?>">
                        <div class="grid-item-inner <?php if($key == 1) { echo 'item-lg'; } ?>">
                            <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): ?>
                                <div class="entry-featured">
                                    <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo wp_kses_post($thumbnail); ?></a>
                                    <?php if($key == 1) { ?>
                                        <div class="ct-video-overlay">
                                            <a class="ct-video-button" href="<?php echo esc_url($video_url); ?>">
                                                <i class="fa fa-play"></i>
                                            </a>
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php endif; ?>
                            <div class="entry-body">
                                <div class="entry-holder">
                                    <h3 class="entry-title"><a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo esc_attr(get_the_title($post->ID)); ?></a></h3>
                                    <ul class="entry-meta">
                                        <li class="item-author"><a href="<?php echo esc_url(get_author_posts_url($post->post_author, $author->user_nicename)); ?>"><?php echo esc_html($author->display_name); ?></a></li>
                                        <li class="item-date"><?php $date_formart = get_option('date_format'); echo get_the_date($date_formart, $post->ID); ?></li>
                                    </ul>
                                    <?php if($key == 1) { ?>
                                        <div class="item--content">
                                            <?php echo wp_trim_words( $post->post_excerpt, 30, $more = null ); ?>
                                        </div>
                                    <?php } else { ?>
                                        <div class="entry-readmore">
                                            <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                                                <?php echo esc_html__('Read more', 'nimmo'); ?><i class="fac fa-angle-double-right"></i>
                                            </a>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }
        endif; ?>
    </div>
</div>