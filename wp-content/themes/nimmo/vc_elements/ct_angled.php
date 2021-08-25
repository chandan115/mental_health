<?php
vc_map(array(
    'name' => 'Row Angled',
    'base' => 'ct_angled',
    'class'    => 'ct-icon-element',
    'description' => esc_html__( 'Angled Displayed', 'nimmo' ),
    'category' => esc_html__('CaseThemes Shortcodes', 'nimmo'),
    'params' => array(
        array(
            'type' => 'dropdown',
            'class' => '',
            'heading' => esc_html__('Angled Style', 'nimmo'),
            'admin_label' => true,
            'param_name' => 'angled_style',
            'value' => array(
                'Angled Arrow 1' => 'style1',
                'Angled Arrow 2' => 'style2',
                'Angled Curved 1' => 'style3',
                'Angled Curved 2' => 'style4',
            ),
            'group' => esc_html__('Angled Settings', 'nimmo'),
        ),
        array(
            'type' => 'dropdown',
            'class' => '',
            'heading' => esc_html__('Angled Position', 'nimmo'),
            'admin_label' => true,
            'param_name' => 'angled_pos',
            'value' => array(
                'Top' => 'top',
                'Bottom' => 'bottom',
            ),
            'group' => esc_html__('Angled Settings', 'nimmo'),
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Angled Color', 'nimmo'),
            'param_name' => 'angled_color',
            'value' => '',
            'group' => esc_html__('Angled Settings', 'nimmo')
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Angled Height', 'nimmo' ),
            'param_name' => 'angled_height',
            'value' => '',
            'description' => 'Enter number.',
            'group' => esc_html__('Angled Settings', 'nimmo')
        ),
    )
));

class WPBakeryShortCode_ct_angled extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>