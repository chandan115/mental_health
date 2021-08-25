<?php
vc_map(array(
    "name" => 'Image Section',
    "base" => "ct_image_section",
    'class'    => 'ct-icon-element',
    'description' => esc_html__( 'Image Section', 'nimmo' ),
    'category' => esc_html__('CaseThemes Shortcodes', 'nimmo'),
    "params" => array(

        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Image Align', 'nimmo'),
            'param_name' => 'image_align',
            'value' => array(
                'Grid Based' => 'grid-based',
                'Slide Based' => 'slide-based',
            ),
        ),
        array(
            'type' => 'attach_image',
            'heading' => esc_html__( 'Image', 'nimmo' ),
            'param_name' => 'image',
            'value' => '',
            'description' => esc_html__( 'Select image from media library.', 'nimmo' ),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Position Top', 'nimmo' ),
            'param_name' => 'p_top',
            'description' => esc_html__( 'Enter: ..px, ..%', 'nimmo' ),
            'edit_field_class' => 'vc_col-sm-3 vc_column',
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Position Right', 'nimmo' ),
            'param_name' => 'p_right',
            'description' => esc_html__( 'Enter: ..px, ..%', 'nimmo' ),
            'edit_field_class' => 'vc_col-sm-3 vc_column',
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Position Bottom', 'nimmo' ),
            'param_name' => 'p_bottom',
            'description' => esc_html__( 'Enter: ..px, ..%', 'nimmo' ),
            'edit_field_class' => 'vc_col-sm-3 vc_column',
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Position Left', 'nimmo' ),
            'param_name' => 'p_left',
            'description' => esc_html__( 'Enter: ..px, ..%', 'nimmo' ),
            'edit_field_class' => 'vc_col-sm-3 vc_column',
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Hide Tablet (991px > Device > 768px)', 'nimmo'),
            'param_name' => 'hide_md',
            'value' => array(
                'No' => '',
                'Yes' => 'hidde-md',
            ),
            'edit_field_class' => 'vc_col-sm-6 vc_column',
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Hide Mobile (Device < 767px)', 'nimmo'),
            'param_name' => 'hide_sm',
            'value' => array(
                'No' => '',
                'Yes' => 'hidde-sm',
            ),
            'edit_field_class' => 'vc_col-sm-6 vc_column',
        ),

        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Parallax Mouse Move', 'nimmo'),
            'param_name' => 'el_parallax',
            'value' => array(
                'No' => 'no',
                'Yes' => 'yes',
            ),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Parallax Speed', 'nimmo'),
            'param_name' => 'parallax_speed',
            'description' => 'Enter number. Default 5',
            'edit_field_class' => 'vc_col-sm-6 vc_column',
            'dependency' => array(
                'element'=>'el_parallax',
                'value'=>array(
                    'yes',
                )
            ),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Parallax Move', 'nimmo'),
            'param_name' => 'parallax_move',
            'description' => 'Enter number. Default 40',
            'edit_field_class' => 'vc_col-sm-6 vc_column',
            'dependency' => array(
                'element'=>'el_parallax',
                'value'=>array(
                    'yes',
                )
            ),
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

class WPBakeryShortCode_ct_image_section extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>