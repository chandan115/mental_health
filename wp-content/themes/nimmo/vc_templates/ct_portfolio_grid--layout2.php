<?php
$atts_extra = shortcode_atts(array(
    'source'               => '',
    'orderby'              => 'date',
    'order'                => 'DESC',
    'limit'                => '8',
    'gap'                  => '30',
    'post_ids'             => '',
    'col_xl'               => 4,
    'col_lg'               => 4,
    'col_md'               => 3,
    'col_sm'               => 1,
    'col_xs'               => 1,
    'layout'               => 'masonry',
    'pagination_type'      => 'false',
    'filter'               => 'true',
    'filter_default_title' => 'All',
    'el_class'             => '',
    'img_size'             => '600x600',
    'custom_column'        => 'false',
    'cms_list_column'        => '',
    'animation'        => '',
), $atts);
$atts = array_merge($atts_extra, $atts);
extract($atts);
$tax = array();
extract(cms_get_posts_of_grid('portfolio', $atts, array('portfolio-category')));
$filter_default_title = !empty($filter_default_title) ? $filter_default_title : 'All';

$col_xl = 12 / $col_xl;
$col_lg = 12 / $col_lg;
$col_md = 12 / $col_md;
$col_sm = 12 / $col_sm;
$col_xs = 12 / $col_xs;
$grid_sizer = "col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-xs-{$col_xs}";

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
$cms_list_columns = array();
$cms_list_columns = (array) vc_param_group_parse_atts( $cms_list_column );
$animation_tmp = isset($animation) ? $animation : '';
$animation_classes = $this->getCSSAnimation( $animation_tmp );
?>

<div id="<?php echo esc_attr($html_id) ?>" class="ct-grid ct-grid-portfolio-layout2 <?php echo esc_attr($el_class); ?>">

    <?php if ($filter == "true" and $layout == 'masonry'): ?>
        <div class="grid-filter-wrap layout2">
            <span class="filter-item active" data-filter="*">
                <?php echo esc_html($filter_default_title); ?>
            </span>
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

    <div class="<?php echo esc_attr($grid_class); ?>" data-gutter="<?php echo esc_attr($gap_item); ?>" style="margin-top:-<?php echo esc_attr($gap_item).'px'; ?>">
        <?php if ($layout == 'masonry') : ?>
            <div class="grid-sizer <?php echo esc_attr($grid_sizer); ?>"></div>
        <?php endif; ?>
        <?php
        if (is_array($posts)):
            $sizes = explode(',',$img_size);
            $i = 0;
            foreach ($posts as $key => $post) {
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

                $item_class   = "grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-xs-{$col_xs}";
                if($custom_column == 'true' && !empty($cms_list_columns[$key])){
                    $custom_col_xl = 12 / $cms_list_columns[$key]['custom_col_xl'];
                    $custom_col_lg = 12 / $cms_list_columns[$key]['custom_col_lg'];
                    $custom_col_md = 12 / $cms_list_columns[$key]['custom_col_md'];
                    $custom_col_xs = 12 / $cms_list_columns[$key]['custom_col_xs'];
                    $custom_col_sm = 12 / $cms_list_columns[$key]['custom_col_sm'];
                    $item_class   = "grid-item col-xl-{$custom_col_xl} col-lg-{$custom_col_lg} col-md-{$custom_col_md} col-sm-{$custom_col_sm} col-xs-{$custom_col_xs}";
                }
                $filter_class = cms_get_term_of_post_to_class($post->ID, array_unique($tax));
                ?>
                <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                    <div class="grid-item-inner <?php echo esc_attr($animation_classes); ?>">
                        <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)) : ?>
                            <?php  $thumbnail_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full', false); ?>
                            <div class="item--featured">
                                <?php echo wp_kses_post($thumbnail); ?>
                            </div>
                        <?php endif; ?>
                        <div class="item--holder">
                            <div class="item--meta">
                                <h3 class="item--title"><a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo esc_attr(get_the_title($post->ID)); ?></a></h3>
                                <div class="item--category"><?php the_terms( $post->ID, 'portfolio-category', '', ', ' ); ?></div>
                            </div>
                            <div class="item--readmore"><a href="<?php echo esc_url(get_permalink( $post->ID )); ?>">+</a></div>
                        </div>
                    </div>
                </div>
            <?php $i++; } 
        endif; ?>
    </div>

    <?php if ($layout == 'masonry' && $pagination_type == 'pagination') { ?>
        <div class="ct-grid-pagination">
            <?php nimmo_posts_pagination(); ?>
        </div>
    <?php } ?>
    <?php if (!empty($next_link) && $layout == 'masonry' && $pagination_type == 'loadmore') { ?>
        <div class="ct-load-more text-center">
            <span class="btn">
                <i class=""></i>
                <?php echo esc_html__('Load more', 'nimmo') ?>
            </span>
        </div>
    <?php } ?>

</div>