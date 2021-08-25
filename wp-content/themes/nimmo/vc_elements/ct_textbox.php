<?php
vc_map(array(
    'name' => 'Text Box Single',
    'base' => 'ct_textbox',
    'class'    => 'ct-icon-element',
    'description' => esc_html__( 'Text Box Displayed', 'nimmo' ),
    'category' => esc_html__('CaseThemes Shortcodes', 'nimmo'),
    'params' => array(

        array(
            'type' => 'textfield',
            'heading' => esc_html__('Title', 'nimmo'),
            'param_name' => 'title',
            'description' => 'Enter title.',
        ),

        array(
            'type' => 'textarea',
            'heading' => esc_html__('Description', 'nimmo'),
            'param_name' => 'description',
            'description' => 'Enter description.',
        ),

        array(
            'type' => 'textfield',
            'heading' => esc_html__('Button Text', 'nimmo'),
            'param_name' => 'btn_text',
        ),

        array(
            'type' => 'vc_link',
            'class' => '',
            'heading' => esc_html__('Button Link', 'nimmo'),
            'param_name' => 'btn_link',
            'value' => '',
        ),

        array(
            'type' => 'css_editor',
            'heading' => esc_html__( 'Css', 'nimmo' ),
            'param_name' => 'css',
            'group' => esc_html__( 'Design options', 'nimmo' ),
        ),
        
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

class WPBakeryShortCode_ct_textbox extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>