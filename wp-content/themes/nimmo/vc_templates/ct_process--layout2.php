<?php
extract(shortcode_atts(array(
    'ct_process_list2' => '',
    'title_color' => '',
    'description_color' => '',
    'animation' => '',
    'el_class' => '',
), $atts));
$ct_process = (array) vc_param_group_parse_atts($ct_process_list2);
$count_process = count($ct_process);
$animation_tmp = isset($animation) ? $animation : '';
$animation_classes = $this->getCSSAnimation( $animation_tmp );
$html_id = cmsHtmlID('ct-process');
if(!empty($ct_process)) : ?>
    <div id="<?php echo esc_attr($html_id);?>" class="ct-process-layout2 ct-process-<?php echo esc_attr($count_process); ?>-items <?php echo esc_attr( $el_class.' '.$animation_classes ); ?>">
        <?php foreach ($ct_process as $key => $value) {
            $title = isset($value['title']) ? $value['title'] : '';
            $description = isset($value['description']) ? $value['description'] : '';
            $icon_type = isset($value['icon_type']) ? $value['icon_type'] : '';
            $icon_image = isset($value['icon_image']) ? $value['icon_image'] : '';
            $icon_list = isset($value['icon_list']) ? $value['icon_list'] : '';
            $icon_material_design = isset($value['icon_material_design']) ? $value['icon_material_design'] : '';
            $icon_fontawesome = isset($value['icon_fontawesome']) ? $value['icon_fontawesome'] : '';
            $icon_flaticon = isset($value['icon_flaticon']) ? $value['icon_flaticon'] : '';
            $icon_etline = isset($value['icon_etline']) ? $value['icon_etline'] : '';
            $icon_image_url = '';
            if (!empty($icon_image)) {
                $attachment_image = wp_get_attachment_image_src($icon_image, 'full');
                $icon_image_url = $attachment_image[0];
            }
            $icon_name = "icon_" . $icon_list;
            $icon_class = isset(${$icon_name}) ? ${$icon_name} : '';
            $gradient_color1 = isset($value['gradient_color1']) ? $value['gradient_color1'] : '';
            $gradient_color2 = isset($value['gradient_color2']) ? $value['gradient_color2'] : '';
            ?>
            <div id="ct-process-item-<?php echo esc_attr($key);?>" class="ct-process-item process-<?php echo esc_attr( $key + 1 ); ?>">
                <?php if(!empty($icon_image_url) && $icon_type == 'image' ) { ?>
                    <div class="ct-process-icon" <?php if(!empty($gradient_color1) && !empty($gradient_color2)) : ?>style="
                        <?php echo 'box-shadow: 0 7px 18px '.nimmo_rgba($gradient_color2, 0.39).';'; echo '-webkit-box-shadow: 0 7px 18px '.nimmo_rgba($gradient_color2, 0.39).';'; ?>
                        background-image: -webkit-gradient(linear, left top, right top, from(<?php echo esc_attr($gradient_color1); ?>), to(<?php echo esc_attr($gradient_color2); ?>));
                        background-image: -webkit-linear-gradient(center left, <?php echo esc_attr($gradient_color1); ?>, <?php echo esc_attr($gradient_color2); ?>);
                        background-image:    -moz-linear-gradient(center left, <?php echo esc_attr($gradient_color1); ?>, <?php echo esc_attr($gradient_color2); ?>);
                        background-image:     -ms-linear-gradient(center left, <?php echo esc_attr($gradient_color1); ?>, <?php echo esc_attr($gradient_color2); ?>);
                        background-image:      -o-linear-gradient(center left, <?php echo esc_attr($gradient_color1); ?>, <?php echo esc_attr($gradient_color2); ?>);
                        background-image:         linear-gradient(center left, <?php echo esc_attr($gradient_color1); ?>, <?php echo esc_attr($gradient_color2); ?>);
                        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?php echo esc_attr($gradient_color1); ?>', endColorstr='<?php echo esc_attr($gradient_color2); ?>', GradientType=1 );
                        background-color: transparent;"<?php endif; ?>>
                       <img class="icon-main" src="<?php echo esc_url( $icon_image_url ); ?>" alt="<?php echo esc_attr( $title ); ?>"/>
                    </div>
                <?php } else { ?>
                    <?php if($icon_class) : ?>
                        <div class="ct-process-icon" <?php if(!empty($gradient_color1) && !empty($gradient_color2)) : ?>style="
                        <?php echo 'box-shadow: 0 7px 18px '.nimmo_rgba($gradient_color2, 0.39).';'; echo '-webkit-box-shadow: 0 7px 18px '.nimmo_rgba($gradient_color2, 0.39).';'; ?>
                        background-image: -webkit-gradient(linear, left top, right top, from(<?php echo esc_attr($gradient_color1); ?>), to(<?php echo esc_attr($gradient_color2); ?>));
                        background-image: -webkit-linear-gradient(center left, <?php echo esc_attr($gradient_color1); ?>, <?php echo esc_attr($gradient_color2); ?>);
                        background-image:    -moz-linear-gradient(center left, <?php echo esc_attr($gradient_color1); ?>, <?php echo esc_attr($gradient_color2); ?>);
                        background-image:     -ms-linear-gradient(center left, <?php echo esc_attr($gradient_color1); ?>, <?php echo esc_attr($gradient_color2); ?>);
                        background-image:      -o-linear-gradient(center left, <?php echo esc_attr($gradient_color1); ?>, <?php echo esc_attr($gradient_color2); ?>);
                        background-image:         linear-gradient(center left, <?php echo esc_attr($gradient_color1); ?>, <?php echo esc_attr($gradient_color2); ?>);
                        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?php echo esc_attr($gradient_color1); ?>', endColorstr='<?php echo esc_attr($gradient_color2); ?>', GradientType=1 );
                        background-color: transparent;"<?php endif; ?>>
                           <i class="<?php echo esc_attr($icon_class); ?>"></i>
                        </div>
                    <?php endif; ?>
                <?php } ?>
                <?php if($title):?>
                    <h3 class="ct-process-title" style="<?php if(!empty($title_color)) { echo 'color:'.esc_attr($title_color).';'; } ?>">
                        <?php echo apply_filters('the_title',$title);?>
                    </h3>
                <?php endif;?>
                <?php if(!empty($description)) : ?>
                    <div class="ct-process-desc" style="<?php if(!empty($description_color)) { echo 'color:'.esc_attr($description_color).';'; } ?>">
                        <?php echo wp_kses_post( $description ); ?>
                    </div>
                <?php endif;?>
            </div>
        <?php } ?>
    </div>
<?php endif; ?>