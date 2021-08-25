<?php
vc_map(array(
    'name' => 'Menu Item',
    'base' => 'ct_menu_item',
    'class'    => 'ct-icon-element',
    'description' => esc_html__( 'Menu Item Displayed', 'nimmo' ),
    'category' => esc_html__('CaseThemes Shortcodes', 'nimmo'),
    'params' => array(

        array(
            'type' => 'param_group',
            'heading' => esc_html__( 'Content', 'nimmo' ),
            'param_name' => 'content_list',
            'description' => esc_html__( 'Enter values for menu item', 'nimmo' ),
            'value' => '',
            'group' => esc_html__('Source Settings', 'nimmo'),
            'params' => array(
                array(
                    'type' => 'textfield',
                    'heading' =>esc_html__('Text', 'nimmo'),
                    'param_name' => 'item_text',
                    'admin_label' => true,
                ),
                array(
                    'type' => 'textfield',
                    'heading' =>esc_html__('Label', 'nimmo'),
                    'param_name' => 'item_label',
                ),
                array(
                    'type' => 'vc_link',
                    'class' => '',
                    'heading' => esc_html__('Link', 'nimmo'),
                    'param_name' => 'item_link',
                    'value' => '',
                ),
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
            'group' => esc_html__('Extra', 'nimmo'),
        ),
    )
));

class WPBakeryShortCode_ct_menu_item extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>