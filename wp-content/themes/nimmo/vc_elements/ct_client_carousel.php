<?php
$args = array(
    'name' => 'Client Carousel',
    'base' => 'ct_client_carousel',
    'class'    => 'ct-icon-element',
    'description' => esc_html__( 'Clients Displayed', 'nimmo' ),
    'category' => esc_html__('CaseThemes Shortcodes', 'nimmo'),
    'params' => array(

        /* Template */
        array(
            'type' => 'param_group',
            'heading' => esc_html__( 'Client Item', 'nimmo' ),
            'value' => '',
            'param_name' => 'client_item',
            'params' => array(
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__( 'Image', 'nimmo' ),
                    'param_name' => 'image',
                    'value' => '',
                    'description' => esc_html__( 'Select image from media library.', 'nimmo' ),
                    'admin_label' => true,
                ),
                array(
                    'type' => 'vc_link',
                    'heading' => esc_html__( 'Link', 'nimmo' ),
                    'param_name' => 'link',
                    'value' => '',
                    'admin_label' => true,
                ),
            ),
        ),

        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Extra class name', 'nimmo' ),
            'param_name' => 'el_class',
            'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in Custom CSS.', 'nimmo' ),
        ),

    ));

$args = nimmo_add_vc_extra_param($args);
vc_map($args);

class WPBakeryShortCode_ct_client_carousel extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>