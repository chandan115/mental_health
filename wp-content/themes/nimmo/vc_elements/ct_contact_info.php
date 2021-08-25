<?php
$args = array(
    'name' => 'Contact Info',
    'base' => 'ct_contact_info',
    'class'    => 'ct-icon-element',
    'category' => esc_html__('CaseThemes Shortcodes', 'nimmo'),
    'params' => array(
        
        array(
            'type' => 'param_group',
            'heading' => esc_html__( 'Content', 'nimmo' ),
            'param_name' => 'icon',
            'description' => esc_html__( 'Enter values for team item', 'nimmo' ),
            'value' => '',
            'params' => array(
                array(
                    'type' => 'iconpicker',
                    'heading' => esc_html__( 'Icon', 'nimmo' ),
                    'param_name' => 'icon',
                    'value' => '',
                    'settings' => array(
                        'emptyIcon' => true,
                        'type' => 'fontawesome',
                        'iconsPerPage' => 200,
                    ),
                    'description' => esc_html__( 'Select icon from library.', 'nimmo' ),
                    'admin_label' => true,
                ),
                array(
                    'type' => 'textarea',
                    'heading' => esc_html__('Content', 'nimmo'),
                    'param_name' => 'content_info',
                ),
            ),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Extra class name', 'nimmo' ),
            'param_name' => 'el_class',
            'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in Custom CSS.', 'nimmo' ),
            'group'      => esc_html__('Extra', 'nimmo'),
        ),
    ));
vc_map($args);

class WPBakeryShortCode_ct_contact_info extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>