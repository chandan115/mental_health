<?php
vc_map(array(
    'name' => 'Pie Chart',
    'base' => 'ct_pie_chart',
    'class'    => 'ct-icon-element',
    'description' => esc_html__( 'Pie Chart Displayed', 'nimmo' ),
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
            'type' => 'textfield',
            'heading' => esc_html__( 'Percentage Value', 'nimmo' ),
            'param_name' => 'percentage_value',
            'value' => '',
            'description' => esc_html__( 'Enter number.', 'nimmo' ),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Chart Size', 'nimmo' ),
            'param_name' => 'chart_size',
            'value' => '',
            'description' => esc_html__( 'Enter number.', 'nimmo' ),
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Bar Color', 'nimmo'),
            'param_name' => 'bar_color',
            'value' => '',
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Track Color', 'nimmo'),
            'param_name' => 'track_color',
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

class WPBakeryShortCode_ct_pie_chart extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        $html_id = cmsHtmlID('ct-wg-title');
        $atts['html_id'] = $html_id;
        return parent::content($atts, $content);
    }
}

?>