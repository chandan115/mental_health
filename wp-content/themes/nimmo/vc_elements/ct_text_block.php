<?php
vc_map(array(
    'name' => 'Text Block',
    'base' => 'ct_text_block',
    'class'    => 'ct-icon-element',
    'description' => esc_html__( 'Text Displayed', 'nimmo' ),
    'category' => esc_html__('CaseThemes Shortcodes', 'nimmo'),
    'params' => array(
        array(
            'type' => 'textarea_html',
            'heading' => esc_html__('Content', 'nimmo'),
            'param_name' => 'content',
            'description' => 'Enter content.',
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Content Align', 'nimmo'),
            'param_name' => 'content_align',
            'value' => array(
                'Left' => 'text-left',
                'Center' => 'text-center',
                'Right' => 'text-right',
            ),
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Text Color', 'nimmo'),
            'param_name' => 'content_color',
            'value' => '',
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Link Color', 'nimmo'),
            'param_name' => 'link_color',
            'value' => '',
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Link Color Hover', 'nimmo'),
            'param_name' => 'link_color_hover',
            'value' => '',
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Font Size', 'nimmo'),
            'param_name' => 'font_size',
            'description' => 'Enter number.',
            'edit_field_class' => 'vc_col-sm-4 vc_column',
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Line Height', 'nimmo'),
            'param_name' => 'line_height',
            'description' => 'Enter number.',
            'edit_field_class' => 'vc_col-sm-4 vc_column',
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Font Weight', 'nimmo'),
            'param_name' => 'font_weight',
            'value' => array(
                'Default (Normal)' => '',
                'Medium' => 'fw500',
                'SemiBold' => 'fw600',
                'Bold' => 'fw700',
            ),
            'edit_field_class' => 'vc_col-sm-4 vc_column',
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
            'group' => esc_html__('Extra', 'nimmo'),
        ),
    )
));

class WPBakeryShortCode_ct_text_block extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>