<?php
$args = array(
    'name' => 'Text Box Carousel',
    'base' => 'ct_text_box_carousel',
    'class'    => 'ct-icon-element',
    'description' => esc_html__( 'Text Box Displayed', 'nimmo' ),
    'category' => esc_html__('CaseThemes Shortcodes', 'nimmo'),
    'params' => array(
        
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Extra class name', 'nimmo' ),
            'param_name' => 'el_class',
            'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in Custom CSS.', 'nimmo' ),
            'group'            => esc_html__('Template', 'nimmo')
        ),

        array(
            'type' => 'param_group',
            'heading' => esc_html__( 'Content', 'nimmo' ),
            'value' => '',
            'param_name' => 'text_box_item',
            'params' => array(
                array(
                    'type' => 'textarea',
                    'heading' =>esc_html__('Title', 'nimmo'),
                    'param_name' => 'title',
                    'admin_label' => true,
                ),
                array(
                    'type' => 'textarea',
                    'heading' => esc_html__('Content', 'nimmo'),
                    'param_name' => 'content',
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Text', 'nimmo' ),
                    'param_name' => 'button_text',
                    'value' => '',
                ),
                array(
                    'type' => 'vc_link',
                    'class' => '',
                    'heading' => esc_html__('Link', 'nimmo'),
                    'param_name' => 'button_link',
                    'value' => '',
                ),
            ),
        ),
    ));

$args = nimmo_add_vc_extra_param($args);
vc_map($args);

class WPBakeryShortCode_ct_text_box_carousel extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>