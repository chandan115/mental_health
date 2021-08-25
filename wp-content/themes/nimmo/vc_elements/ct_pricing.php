<?php
vc_map(array(
    'name' => 'Pricing',
    'base' => 'ct_pricing',
    'class'    => 'ct-icon-element',
    'description' => 'Pricing Displayed',
    'category' => esc_html__('CaseThemes Shortcodes', 'nimmo'),
    'params' => array(

        /* Layout Classic */
        array(    
            'type' => 'dropdown',
            'heading' => esc_html__("Item Feature", 'nimmo'),
            'param_name' => 'feature',
            'value' => array(
                'No' => 'item-normal',        
                'Yes' => 'is-feature',        
            ),
            "group" => esc_html__("Source Settings", 'nimmo'),
        ),  

        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Title', 'nimmo' ),
            'param_name' => 'title',
            'value' => '',
            'group' => esc_html__('Source Settings', 'nimmo'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Price', 'nimmo' ),
            'param_name' => 'price',
            'value' => '',
            'group' => esc_html__('Source Settings', 'nimmo'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Time', 'nimmo' ),
            'param_name' => 'time',
            'value' => '',
            'group' => esc_html__('Source Settings', 'nimmo'),
        ),
        array(
            'type' => 'param_group',
            'heading' => esc_html__( 'Description', 'nimmo' ),
            'param_name' => 'description',
            'value' => '',
            'group' => esc_html__('Source Settings', 'nimmo'),
            'params' => array(
                array(
                    "type" => "textfield",
                    "heading" =>esc_html__("Item", 'nimmo'),
                    "param_name" => "description_item",
                    'admin_label' => true,
                ),
            ),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Text Button', 'nimmo' ),
            'param_name' => 'text_button',
            'value' => '',
            'group' => esc_html__('Source Settings', 'nimmo'),
        ),
        array(
            'type' => 'vc_link',
            'heading' => esc_html__( 'Link Button', 'nimmo' ),
            'param_name' => 'link_button',
            'value' => '',
            'group' => esc_html__('Source Settings', 'nimmo'),
        ),

        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Style', 'nimmo'),
            'param_name' => 'style',
            'value' => array(
                'Light' => 'style-light',
                'Dark One' => 'style-dark',
                'Dark Two' => 'style-dark-2',
            ),
            'group' => esc_html__('Source Settings', 'nimmo'),
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

class WPBakeryShortCode_ct_pricing extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>