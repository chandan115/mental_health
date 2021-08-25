<?php
$atts_extra = shortcode_atts(array(
    'source'               => '',
    'orderby'              => 'date',
    'order'                => 'DESC',
    'limit'                => '6',
    'gap'                  => '30',
    'post_ids'             => '',
    'col_lg'               => 4,
    'col_md'               => 3,
    'col_sm'               => 2,
    'col_xs'               => 1,
    'layout'               => 'basic',
    'pagination_type'      => 'pagination',
    'load_more_text'      => '',
    'filter'               => 'true',
    'filter_default_title' => 'All',
    'filter_alignment'     => 'center',
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
    if($pagination_type == 'loadmore' || $pagination_type === 'pagination') {
        $html_id = str_replace('-', '_', $html_id);
        wp_enqueue_script('ct-loadmore-grid', get_template_directory_uri() . '/assets/js/ct-loadmore-grid.js', array('jquery'), 'all', true);
        wp_localize_script('ct-loadmore-grid', 'ct_load_more_' . $html_id, array(
            'startPage' => $paged,
            'maxPages'  => $max,
            'total'     => $total,
            'perpage'   => $limit,
            'nextLink'  => $next_link,
            'layout'    => $layout
        ));
    }
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

<div id="<?php echo esc_attr($html_id) ?>" class="ct-grid ct-grid-blog-layout1 <?php echo esc_attr($el_class); ?>">

    <?php if ($filter == "true" and $layout == 'masonry'): ?>
        <div class="grid-filter-wrap align-<?php echo esc_attr($filter_alignment); ?>">
            <span class="filter-item active" data-filter="*"><?php echo esc_html($filter_default_title); ?></span>
            <?php foreach ($categories as $category): ?>
                <?php $category_arr = explode('|', $category); ?>
                <?php $tax[] = $category_arr[1]; ?>
                <?php $term = get_term_by('slug',$category_arr[0], $category_arr[1]); ?>

                <span class="filter-item" data-filter="<?php echo esc_attr('.' . $term->slug); ?>">
                    <?php echo esc_html($term->name); ?>
                </span>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <div class="<?php echo esc_attr($grid_class); ?> animation-time" data-gutter="<?php echo esc_attr($gap_item); ?>">
        <?php if ($layout == 'masonry') : ?>
            <div class="grid-sizer <?php echo esc_attr($grid_sizer); ?>"></div>
        <?php endif; ?>
        <?php
        if (is_array($posts)):
            $sizes = explode(',',$img_size);
            $i = 0;
            foreach ($posts as $key => $post) {
                the_post();
                $default_size = end($sizes);
                if(!empty($sizes[$i])){
                    $default_size = $sizes[$i];
                }
                $img_id = get_post_thumbnail_id($post->ID);
                $img = wpb_getImageBySize( array(
                    'attach_id'  => $img_id,
                    'thumb_size' => $default_size,
                    'class'      => '',
                ));
                $thumbnail = $img['thumbnail'];
                $item_class = "grid-item col-xl-{$col_lg} col-lg-{$col_md} col-md-{$col_sm} col-sm-{$col_xs} col-{$col_xs}";
                $filter_class = cms_get_term_of_post_to_class($post->ID, array_unique($tax));
                $url_video = get_post_meta($post->ID, 'url_video', true);
                ?>
                    <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                        <div class="grid-item-inner wpb_animate_when_almost_visible wpb_fadeIn fadeIn">
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
                            <div class="item-readmore"><a class="btn" href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo esc_html__( 'View now', 'nimmo' ) ?></a></div>
                        </div>
                    </div>
                <?php $i++;
            }
        endif; ?>
    </div>
    <?php if ($layout == 'masonry' && $pagination_type == 'pagination') { ?>
        <div class="ct-grid-pagination">
            <?php nimmo_posts_pagination(); ?>
        </div>
    <?php } ?>
    <?php if (!empty($next_link) && $layout == 'masonry' && $pagination_type == 'loadmore') { ?>
        <div class="ct-load-more">
           <span class="btn">
                <i class=""></i>
                <?php if(!empty($load_more_text)) {
                    echo esc_attr($load_more_text);
                } else {
                    echo esc_html__('More News', 'nimmo');
                } ?>
            </span>
        </div>
    <?php } ?>
</div>