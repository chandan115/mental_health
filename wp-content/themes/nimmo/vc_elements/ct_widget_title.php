<?php
vc_map(array(
    'name' => 'Widget Title',
    'base' => 'ct_widget_title',
    'class'    => 'ct-icon-element',
    'description' => esc_html__( 'Title Displayed', 'nimmo' ),
    'category' => esc_html__('CaseThemes Shortcodes', 'nimmo'),
    'params' => array(
        array(
            'type' => 'textarea',
            'heading' => esc_html__( 'Title', 'nimmo' ),
            'param_name' => 'title',
            'value' => '',
            'admin_label' => true,
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Title Color', 'nimmo'),
            'param_name' => 'title_color',
            'value' => '',
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

class WPBakeryShortCode_ct_widget_title extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        $html_id = cmsHtmlID('ct-wg-title');
        $atts['html_id'] = $html_id;
        return parent::content($atts, $content);
    }
}

?>