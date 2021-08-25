<?php
$atts_extra = shortcode_atts(array(
    'content_list'                  => '',
    'col_xl'               => 4,
    'col_lg'               => 4,
    'col_md'               => 3,
    'col_sm'               => 2,
    'col_xs'               => 1,
    'el_class'             => '',
    'animation'             => '',
    'img_size'             => '371x403',
), $atts);
$atts = array_merge($atts_extra, $atts);
extract($atts);
$animation_tmp = isset($animation) ? $animation : '';
$animation_classes = $this->getCSSAnimation( $animation_tmp );
$col_xl = 12 / $col_xl;
$col_lg = 12 / $col_lg;
$col_md = 12 / $col_md;
$col_sm = 12 / $col_sm;
$col_xs = 12 / $col_xs;
$grid_sizer = "col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
wp_enqueue_script('isotope');
wp_enqueue_script('imagesloaded');
wp_enqueue_script('nimmo-isotope', get_template_directory_uri() . '/assets/js/isotope.ct.js', array('jquery'), '1.0.0', true);
$team_content_list = (array) vc_param_group_parse_atts( $content_list );
wp_enqueue_script( 'vc_waypoints' );
wp_enqueue_style( 'vc_animate-css' );
?>

<div id="<?php echo esc_attr($html_id) ?>" class="ct-grid ct-grid-team1 <?php echo esc_attr($el_class); ?>">

    <div class="ct-grid-inner ct-grid-masonry row animation-time" data-gutter="15">
        <div class="grid-sizer <?php echo esc_attr($grid_sizer); ?>"></div>
        <?php foreach ($team_content_list as $key => $value) {
            $title = isset($value['title']) ? $value['title'] : '';
            $position = isset($value['position']) ? $value['position'] : '';
            $item_link = isset($value['item_link']) ? $value['item_link'] : '';
            $link = vc_build_link($item_link);
            $a_href = '#';
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
            $thumbnail = $img['thumbnail'];
            $item_class = "grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            $social = isset($value['social']) ? $value['social'] : '';
            $el_social = (array) vc_param_group_parse_atts( $social );
            ?>
            <div class="<?php echo esc_attr($item_class); ?>">
                <div class="grid-item-inner <?php echo esc_attr($animation_classes); ?>">
                    <?php if(!empty($image)) { ?>
                        <div class="team-featured">
                            <div class="team-featured-link">
                                <a href="<?php echo esc_url($a_href);?>" target="<?php  echo esc_attr($a_target); ?>"><?php echo wp_kses_post($thumbnail); ?></a>
                                <div class="team-social">
                                    <?php foreach ($el_social as $key => $value) {
                                        $social_link = isset($value['social_link']) ? $value['social_link'] : '';
                                        $icon_class = isset($value['icon']) ? $value['icon'] : ''; ?>
                                        <a href="<?php echo esc_url($social_link); ?>" target="_blank"><i class="<?php echo esc_attr( $icon_class ); ?>"></i></a>
                                    <?php } ?>
                                </div>  
                            </div>
                            <div class="team-shape"></div>
                        </div>
                        <div class="team-holder">
                            <div class="team-meta">
                                <h3 class="team-title">
                                    <a href="<?php echo esc_url($a_href);?>" target="<?php  echo esc_attr($a_target); ?>"><?php echo esc_attr($title); ?></a>
                                </h3>
                                <div class="team-position">
                                    <?php echo esc_attr($position); ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
    </div>

</div>