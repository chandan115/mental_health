<?php
$args = array(
    'name' => 'Image Gallery Carousel',
    'base' => 'ct_gallery_carousel',
    'class'    => 'ct-icon-element',
    'description' => esc_html__( 'Image Gallery Displayed', 'nimmo' ),
    'category' => esc_html__('CaseThemes Shortcodes', 'nimmo'),
    'params' => array(

        array(
            'type' => 'attach_images',
            'heading' => esc_html__( 'Images', 'nimmo' ),
            'param_name' => 'images',
            'value' => '',
            'description' => esc_html__( 'Select images from media library.', 'nimmo' ),
        ),

        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Image size', 'nimmo' ),
            'param_name' => 'img_size',
            'value' => '',
            'description' => esc_html__( 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height).', 'nimmo' ),
        ),

        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Extra class name', 'nimmo' ),
            'param_name' => 'el_class',
            'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in Custom CSS.', 'nimmo' ),
        ),

        array(
            'type' => 'animation_style',
            'heading' => esc_html__( 'Animation Style', 'nimmo' ),
            'param_name' => 'animation',
            'description' => esc_html__( 'Choose your animation style', 'nimmo' ),
            'admin_label' => false,
            'weight' => 0,
        ),
    ));

$args = nimmo_add_vc_extra_param($args);
vc_map($args);

class WPBakeryShortCode_ct_gallery_carousel extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>