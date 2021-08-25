<?php
vc_map(array(
    'name' => 'Heading',
    'base' => 'ct_heading',
    'class'    => 'ct-icon-element',
    'description' => esc_html__( 'Heading Displayed', 'nimmo' ),
    'category' => esc_html__('CaseThemes Shortcodes', 'nimmo'),
    'params' => array(
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Text Source', 'nimmo'),
            'param_name' => 'text_source',
            'value' => array(
                'Custom Text' => 'custom-text',
                'Post or Page Title' => 'post-page-title',
            ),
            'admin_label' => true,
            'group' => esc_html__('Title', 'nimmo'),
        ),
        array(
            'type' => 'textarea',
            'heading' => esc_html__( 'Text', 'nimmo' ),
            'param_name' => 'text',
            'value' => '',
            'admin_label' => true,
            'dependency' => array(
                'element'=>'text_source',
                'value'=>array(
                    'custom-text',
                )
            ),
            'group' => esc_html__('Title', 'nimmo'),
        ),
        array(
            'type' => 'textarea',
            'heading' => esc_html__( 'Text Letter Below', 'nimmo' ),
            'param_name' => 'text_below',
            'value' => '',
            'group' => esc_html__('Title', 'nimmo'),
        ),
        array(
            "type" => "textarea",
            "heading" => esc_html__("Typing Out", 'nimmo'),
            "param_name" => "typingout",
            'description' => 'Example: "designing", "developing", "marketing" ',
            'dependency' => array(
                'element'=>'text_source',
                'value'=>array(
                    'custom-text',
                )
            ),
            'group' => esc_html__('Title', 'nimmo'),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Typing Style', 'nimmo'),
            'param_name' => 'typing_style',
            'value' => array(
                'Style 1' => 'style1',
                'Style 2' => 'style2',
            ),
            'group' => esc_html__('Title', 'nimmo'),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Element tag', 'nimmo'),
            'param_name' => 'tag',
            'value' => array(
                'h1' => 'h1',
                'h2' => 'h2',
                'h3' => 'h3',
                'h4' => 'h4',
                'h5' => 'h5',
                'h6' => 'h6',
                'p' => 'p',
                'div' => 'div',
            ),
            'std' => 'h3',
            'group' => esc_html__('Title', 'nimmo'),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Text align large', 'nimmo'),
            'param_name' => 'align_lg',
            'value' => array(
                'left' => 'align-left',
                'right' => 'align-right',
                'center' => 'align-center',
            ),
            'edit_field_class' => 'vc_col-sm-3 vc_column',
            'group' => esc_html__('Title', 'nimmo'),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Text align medium', 'nimmo'),
            'param_name' => 'align_md',
            'value' => array(
                'left' => 'align-left-md',
                'right' => 'align-right-md',
                'center' => 'align-center-md',
            ),
            'edit_field_class' => 'vc_col-sm-3 vc_column',
            'group' => esc_html__('Title', 'nimmo'),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Text align small', 'nimmo'),
            'param_name' => 'align_sm',
            'value' => array(
                'left' => 'align-left-sm',
                'right' => 'align-right-sm',
                'center' => 'align-center-sm',
            ),
            'edit_field_class' => 'vc_col-sm-3 vc_column',
            'group' => esc_html__('Title', 'nimmo'),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Text align mini', 'nimmo'),
            'param_name' => 'align_xs',
            'value' => array(
                'left' => 'align-left-xs',
                'right' => 'align-right-xs',
                'center' => 'align-center-xs',
            ),
            'edit_field_class' => 'vc_col-sm-3 vc_column',
            'group' => esc_html__('Title', 'nimmo'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Margin top', 'nimmo'),
            'param_name' => 'margin_top',
            'description' => 'Enter number.',
            'edit_field_class' => 'vc_col-sm-3 vc_column',
            'group' => esc_html__('Title', 'nimmo'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Margin right', 'nimmo'),
            'param_name' => 'margin_right',
            'description' => 'Enter number.',
            'edit_field_class' => 'vc_col-sm-3 vc_column',
            'group' => esc_html__('Title', 'nimmo'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Margin bottom', 'nimmo'),
            'param_name' => 'margin_bottom',
            'description' => 'Enter number.',
            'edit_field_class' => 'vc_col-sm-3 vc_column',
            'group' => esc_html__('Title', 'nimmo'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Margin left', 'nimmo'),
            'param_name' => 'margin_left',
            'description' => 'Enter number.',
            'edit_field_class' => 'vc_col-sm-3 vc_column',
            'group' => esc_html__('Title', 'nimmo'),
        ),

        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Font size large', 'nimmo' ),
            'param_name' => 'font_size',
            'value' => '',
            'description' => 'Enter number.',
            'edit_field_class' => 'vc_col-sm-3 vc_column',
            'group' => esc_html__('Title', 'nimmo'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Font size medium', 'nimmo' ),
            'param_name' => 'font_size_md',
            'value' => '',
            'description' => 'Enter number.',
            'edit_field_class' => 'vc_col-sm-3 vc_column',
            'group' => esc_html__('Title', 'nimmo'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Font size small', 'nimmo' ),
            'param_name' => 'font_size_sm',
            'value' => '',
            'description' => 'Enter number.',
            'edit_field_class' => 'vc_col-sm-3 vc_column',
            'group' => esc_html__('Title', 'nimmo'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Font size mini', 'nimmo' ),
            'param_name' => 'font_size_xs',
            'value' => '',
            'description' => 'Enter number.',
            'edit_field_class' => 'vc_col-sm-3 vc_column',
            'group' => esc_html__('Title', 'nimmo'),
        ),

        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Line height large', 'nimmo' ),
            'param_name' => 'line_height',
            'value' => '',
            'description' => 'Enter number.',
            'edit_field_class' => 'vc_col-sm-3 vc_column',
            'group' => esc_html__('Title', 'nimmo'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Line height medium', 'nimmo' ),
            'param_name' => 'line_height_md',
            'value' => '',
            'description' => 'Enter number.',
            'edit_field_class' => 'vc_col-sm-3 vc_column',
            'group' => esc_html__('Title', 'nimmo'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Line height small', 'nimmo' ),
            'param_name' => 'line_height_sm',
            'value' => '',
            'description' => 'Enter number.',
            'edit_field_class' => 'vc_col-sm-3 vc_column',
            'group' => esc_html__('Title', 'nimmo'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Line height mini', 'nimmo' ),
            'param_name' => 'line_height_xs',
            'value' => '',
            'description' => 'Enter number.',
            'edit_field_class' => 'vc_col-sm-3 vc_column',
            'group' => esc_html__('Title', 'nimmo'),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Text Transform', 'nimmo'),
            'param_name' => 'text_transform',
            'value' => array(
                'None' => 'none',
                'Inherit' => 'inherit',
                'Uppercase' => 'uppercase',
                'Capitalize' => 'capitalize',
                'Lowercase' => 'lowercase',
            ),
            'std' => 'none',
            'group' => esc_html__('Title', 'nimmo'),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Font Weight', 'nimmo'),
            'param_name' => 'font_weight',
            'value' => array(
                'Default' => '',
                'Bold 700' => '700',
                'Bold 800' => '800',
                'SemiBold' => '600',
                'Medium' => '500',
                'Normal' => '400',
                'Light' => '300',
            ),
            'std' => 'none',
            'group' => esc_html__('Title', 'nimmo'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Letter Spacing', 'nimmo' ),
            'param_name' => 'letter_spacing',
            'value' => '',
            'description' => 'Enter ..px, ..em',
            'group' => esc_html__('Title', 'nimmo'),
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Text Color', 'nimmo'),
            'param_name' => 'text_color',
            'value' => '',
            'group' => esc_html__('Title', 'nimmo'),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Show Gap', 'nimmo'),
            'param_name' => 'show_gap',
            'value' => array(
                'Show' => 'show',
                'Hide' => 'hide',
            ),
            'group' => esc_html__('Title', 'nimmo'),
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Gap Color', 'nimmo'),
            'param_name' => 'gap_color',
            'value' => '',
            'group' => esc_html__('Title', 'nimmo'),
            'dependency' => array(
                'element'=>'show_gap',
                'value'=>array(
                    'show',
                )
            ),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Custom Google Fonts', 'nimmo'),
            'param_name' => 'custom_fonts',
            'value' => array(
                'No' => 'false',
                'Yes' => 'true',
            ),
            'group' => esc_html__('Title', 'nimmo'),
        ),
        array(
            'type' => 'google_fonts',
            'param_name' => 'google_fonts',
            'value' => 'font_family:Abril%20Fatface%3Aregular|font_style:400%20regular%3A400%3Anormal',
            'settings' => array(
                'fields' => array(
                    'font_family_description' => esc_html__( 'Select font family.', 'nimmo' ),
                    'font_style_description' => esc_html__( 'Select font styling.', 'nimmo' ),
                ),
            ),
            'dependency' => array(
                'element'=>'custom_fonts',
                'value'=>array(
                    'true',
                )
            ),
            'group' => esc_html__('Title', 'nimmo'),
        ),
        array(
            'type' => 'vc_link',
            'heading' => esc_html__( 'Link for title', 'nimmo' ),
            'param_name' => 'title_link',
            'value' => '',
            'group' => esc_html__('Title', 'nimmo'),
        ),
        
        /* Sub Title */
        array(
            'type' => 'textarea',
            'heading' => esc_html__( 'Sub Title', 'nimmo' ),
            'param_name' => 'subtitle',
            'value' => '',
            'group'      => esc_html__('Sub Title', 'nimmo'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Font Size', 'nimmo' ),
            'param_name' => 'subtitle_font_size',
            'value' => '',
            'description' => 'Enter number.',
            'group'      => esc_html__('Sub Title', 'nimmo'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Line Height', 'nimmo' ),
            'param_name' => 'subtitle_line_height',
            'value' => '',
            'description' => 'Enter number.',
            'group'      => esc_html__('Sub Title', 'nimmo'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Letter Spacing', 'nimmo' ),
            'param_name' => 'subtitle_letter_spacing',
            'value' => '',
            'description' => 'Ex: 0.3em or 3px',
            'group'      => esc_html__('Sub Title', 'nimmo'),
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Color', 'nimmo'),
            'param_name' => 'subtitle_color',
            'value' => '',
            'group'      => esc_html__('Sub Title', 'nimmo'),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Style', 'nimmo'),
            'param_name' => 'sub_title_style',
            'value' => array(
                'Style 1' => 'style1',
                'Style 2' => 'style2',
                'Style 3' => 'style3',
                'Style 4' => 'style4',
            ),
            'group' => esc_html__('Sub Title', 'nimmo'),
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Line Color', 'nimmo'),
            'param_name' => 'sub_line_color',
            'value' => '',
            'group'      => esc_html__('Sub Title', 'nimmo'),
            'dependency' => array(
                'element'=>'sub_title_style',
                'value'=>array(
                    'style4',
                )
            ),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Font Weight', 'nimmo'),
            'param_name' => 'font_weight_sub',
            'value' => array(
                'Default' => '',
                'Bold 700' => '700',
                'Bold 800' => '800',
                'SemiBold' => '600',
                'Medium' => '500',
                'Normal' => '400',
                'Light' => '300',
            ),
            'std' => 'none',
            'group' => esc_html__('Sub Title', 'nimmo'),
        ),
        /* End Sub Title */
        array(
            'type' => 'textarea',
            'heading' => esc_html__( 'Description', 'nimmo' ),
            'param_name' => 'description',
            'value' => '',
            'group'      => esc_html__('Description', 'nimmo'),
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Color', 'nimmo'),
            'param_name' => 'description_color',
            'value' => '',
            'group'      => esc_html__('Description', 'nimmo'),
        ),
        /* Extra */
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Extra class name', 'nimmo' ),
            'param_name' => 'el_class',
            'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in Custom CSS.', 'nimmo' ),
            'group'      => esc_html__('Extra', 'nimmo'),
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

class WPBakeryShortCode_ct_heading extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        $html_id = cmsHtmlID('ct-heading');
        $atts['html_id'] = $html_id;
        return parent::content($atts, $content);
    }
}

?>