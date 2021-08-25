<?php
vc_map(array(
    "name" => 'Single Image',
    "base" => "ct_single_image",
    'class'    => 'ct-icon-element',
    'description' => esc_html__( 'Single Image', 'nimmo' ),
    'category' => esc_html__('CaseThemes Shortcodes', 'nimmo'),
    "params" => array(

        array(
            'type' => 'attach_image',
            'heading' => esc_html__( 'Image', 'nimmo' ),
            'param_name' => 'image',
            'value' => '',
            'description' => esc_html__( 'Select image from media library.', 'nimmo' ),
        ),

        array(
            "type" => "vc_link",
            "class" => "",
            "heading" => esc_html__("Link", 'nimmo'),
            "param_name" => "image_link",
            "value" => '',
        ),

        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Source Type', 'nimmo'),
            'param_name' => 'source_type',
            'value' => array(
                'Image' => 'img',
                'Background' => 'bg',
            ),
        ),

        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Image Height', 'nimmo' ),
            'param_name' => 'img_height',
            'value' => '',
            'description' => esc_html__( 'Enter number. Default: 300', 'nimmo' ),
            'dependency' => array(
                'element'=>'source_type',
                'value'=>array(
                    'bg',
                )
            ),
        ),

        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Image size', 'nimmo' ),
            'param_name' => 'img_size',
            'value' => '',
            'description' => esc_html__( 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height)).', 'nimmo' ),
            'dependency' => array(
                'element'=>'source_type',
                'value'=>array(
                    'img',
                )
            ),
        ),

        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Image max height', 'nimmo' ),
            'param_name' => 'img_max_height',
            'value' => '',
            'description' => esc_html__( 'Enter number.', 'nimmo' ),
            'dependency' => array(
                'element'=>'source_type',
                'value'=>array(
                    'img',
                )
            ),
        ),

        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Image Align', 'nimmo'),
            'param_name' => 'image_align',
            'value' => array(
                'Left' => 'text-left',
                'Center' => 'text-center',
                'Right' => 'text-right',
            ),
        ),

        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Image Hover Parallax', 'nimmo'),
            'param_name' => 'hover_parallax',
            'value' => array(
                'No' => '',
                'Yes' => 'hover-parallax',
            ),
        ),

        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Image Block Revealers', 'nimmo'),
            'param_name' => 'block_revealers',
            'value' => array(
                'No' => 'no',
                'Yes' => 'yes',
            ),
        ),

        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Direction', 'nimmo'),
            'param_name' => 'direction',
            'value' => array(
                'Left to Right' => 'lr',
                'Right to Left' => 'rl',
                'Top to Bottom' => 'tb',
                'Bottom to Top' => 'bt',
            ),
            'dependency' => array(
                'element'=>'block_revealers',
                'value'=>array(
                    'yes',
                )
            ),
        ),

        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Overlay Color', 'nimmo'),
            'param_name' => 'overlay_color',
            'value' => '',
            'dependency' => array(
                'element'=>'block_revealers',
                'value'=>array(
                    'yes',
                )
            ),
        ),

        array(
            'type' => 'css_editor',
            'heading' => esc_html__( 'Css', 'nimmo' ),
            'param_name' => 'css',
            'group' => esc_html__( 'Design options', 'nimmo' ),
        ),

        /* Extra */
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Extra class name', 'nimmo' ),
            'param_name' => 'el_class',
            'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in Custom CSS.', 'nimmo' ),
            'group'            => esc_html__('Extra', 'nimmo')
        ),
        array(
            'type' => 'animation_style',
            'heading' => esc_html__( 'Animation Style', 'nimmo' ),
            'param_name' => 'animation',
            'description' => esc_html__( 'Choose your animation style', 'nimmo' ),
            'admin_label' => false,
            'weight' => 0,
            "group" => esc_html__("Extra", 'nimmo'),
        ),
    )
));

class WPBakeryShortCode_ct_single_image extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>